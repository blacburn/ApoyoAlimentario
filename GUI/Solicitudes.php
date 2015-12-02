<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlSolicitud.php';
include '../logica/ControlEstudiante.php';
include '../logica/ControlConvocatoria.php';
include '../logica/ControlPersona.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlCondicionxSolicitud.php';
include '../logica/ControlCondicion_SE.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Solicitudes</title>
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/index_style.css">
        <link rel="stylesheet" href="../public/css/style.css" type="text/css"> 
        
        <link rel="stylesheet" href="../public/css/jquery-ui.css" type="text/css"> 
        <link rel="stylesheet" href="../public/css/jquery.dataTables.css" type="text/css"> 
        
        <script src="../public/js/jquery.js"></script> 
        <script src="../public/js/jquery.dataTables.js"></script> 
        <script src="../public/js/jquery.dataTables.min.js"></script> 
        <script language="javascript" type="text/javascript" >
    

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#reporte tfoot th').each( function () {
        var title = $(this).text();
        
        $(this).html( '<input type="text" placeholder="'+title+'" size="2"/>' );
    } );
 
    // DataTable
    var table = $('#reporte').DataTable();
    
    $('#reporte tbody')
        .on( 'mouseenter', 'td', function () {
            var colIdx = table.cell(this).index().column;
 
            $( table.cells().nodes() ).removeClass( 'highlight' );
            $( table.column( colIdx ).nodes() ).addClass( 'highlight' );
        } );
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
    </script>
    </head>
    <body>
        <?php
        include './headerlog.php';
        include './menuLateral.php';
        // put your code here
        ?>
        
        
        
        <form action="#"  method="post">
            <div>
                    <h3>Solicitudes</h3>
            </div>
            
<!--            <SELECT name='categoria' SIZE='1' onchange='' class="col-sm-2">
               
               <OPTION VALUE="Todos">Todas las categorias</option>
               <OPTION VALUE="Convocatoria">Convocatoria</option>
               <OPTION VALUE="Carrera">Carrera</option>
               
               
               <OPTION VALUE="estadoValidado">Estado</option>
               <OPTION VALUE="Puntaje">Puntaje</option>
               <OPTION VALUE="Codigo">Codigo Estudiante</option>
               <OPTION VALUE="Periodo">Periodo</option>
               
            </SELECT>-->
            
            
<!--            <input type="text"  name="usuario_login" placeholder="filtro" autofocus class="col-sm-1"/>
            
                    <div class="col-sm-2"> 
                        <button class= "btn btn-primary btn-block" type="submit" name="submit">Buscar</button>  
                    </div>-->

        </form>
        
        <div class="col-sm-10">
            <?php
            
        $conn = new ConexionDB($_SESSION['usuario_login'], $_SESSION['password_login']);
        $cSolicitud=new ControlSolicitud();
        $cEstudiante=new ControlEstudiante();
        $cConvocatoria=new ControlConvocatoria();
        $cFacultad=new ControlFacultad();
        $cPersona=new ControlPersona();
        $cCondicionxsolicitud=new ControlCondicionxSolicitud();
        $cCondicion_SE= new ControlCondicion_SE();
        $A=new Condicion_SE();
        if ($conn->conectarDB()) {
            $sesion = $conn->getConn();
            $_SESSION['sesion_logueado'] = $sesion;
           
//            if(!isset($_POST['categoria']) || ($_POST['categoria']=="Todos")){
//                echo '<br><br>';
                TablaReporte($cSolicitud,$cEstudiante,$cConvocatoria,$cFacultad,$cPersona);
                
                
                
                
//            }
//            else{ 
//                echo '<SELECT name="subcategoria" SIZE="1" onchange="" class="col-sm-2"><OPTION VALUE="estadoValidado">Estado</option><OPTION VALUE="Puntaje">Puntaje</option><OPTION VALUE="Codigo">Codigo Estudiante</option><OPTION VALUE="Periodo">Periodo</option></SELECT><br><br> ';
//                
//                if(!isset($_POST['subcategoria'])){
//                    TablaReporte($cSolicitud,$cEstudiante,$cConvocatoria,$cFacultad,$cPersona);
//                }
//                else{
//                    if(($_POST['subcategoria']=="estadoValidado")){
//                      
//                    }
//                    
//                    
//                    
//                }
//                    
//                    
//                
//                
//                
//            }
        }
        
        function TablaReporte($cSolicitud,$cEstudiante,$cConvocatoria,$cFacultad,$cPersona){
            $cSolicitud->verSolicitudes();
            
            echo '<table id="reporte" class="display" cellspacing="0" width="100%"> '
                 . '<thead><tr><th>'."ID SOL".'</th><th>'."CODIGO ESTUDIANTE".'</th> <th>'."NOMBRE".'</th> <th>'."APELLIDO".'</th> <th>'."FACULTAD".'</th><th>'."CARRERA".'</th><th>'."CONV".'</th><th>'."PERIODO".'</th><th>'."CUPOS".'</th><th>'."PUNTAJE".'</th><th>'."VAL SOLICITUD".'</th><th>'."VALIDAR".'</th></tr></thead>
                    <tfoot>
            <tr>
                <th>id sol</th>
                <th>cod estudiante</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>facultad</th>
                <th>carrera</th>
                <th>convocatoria</th>
                <th>carrera</th>
                <th>periodo</th>
                <th>cupos</th>
                <th>puntaje</th>
                <th>val solicitud</th>
            </tr>
        </tfoot>    
                    <tbody>';
                        foreach($cSolicitud->verSolicitudes() as $soli){
                            
                            $i=1;
                            $estu=$cEstudiante->buscarEstudiantexCodigo($soli->getCodigo_estudiante());
                            $conv=$cConvocatoria->buscarConvocatoriaxId($soli->getId_convocatoria());
                            $facu=$cFacultad->buscarFacultad($conv->getId_facultad());
                            $pers=$cPersona->buscarPersonaxDocumento($estu->getDocumento_estudiante());
                           
                            
                            echo '<tr><td>'.$soli->getId_solicitud(). ' </td> <td>'.$soli->getCodigo_estudiante().'  </td> <td>'.$pers->getNombre_persona().'  </td> <td>'.$pers->getApellido_persona().'  </td> <td>'.$facu->getNombre_facultad().' </td> <td>'.$estu->getCarrera_estudiante().' </td> <td>'.$soli->getId_convocatoria().' </td> <td>'.$conv->getPeriodo().' </td> <td>'.$conv->getCupos().' </td>  <td>'.$soli->getPuntaje().' </td> <td>'.$soli->getVal_solicitud().' </td><td><a href="destino.php'.$hola='hg'.'">Validar</a> </td></tr>';
                            $i+=1;
                            
                        }
                        
                        '</tbody></table>';
                        
            
        }
        
        
        
        
        ?>
            
            
            
            
            
            
        
        </div>
        
        
        
        
    </body>
    
</html>