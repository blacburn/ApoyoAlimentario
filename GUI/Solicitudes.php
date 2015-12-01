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
        
        <script src="../public/js/bootstrap.min.js"></script> 
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
            
            <SELECT name='categoria' SIZE='1' onchange='' class="col-sm-2">
               
               <OPTION VALUE="Todos">Todas las categorias</option>
               <OPTION VALUE="Convocatoria">Convocatoria</option>
               <OPTION VALUE="Carrera">Carrera</option>
               
<!--               <OPTION VALUE="estadoValidado">Estado</option>
               <OPTION VALUE="Puntaje">Puntaje</option>
               <OPTION VALUE="Codigo">Codigo Estudiante</option>
               <OPTION VALUE="Periodo">Periodo</option>-->
               
            </SELECT>   
                    <div class="col-sm-2"> 
                        <button class= "btn btn-primary btn-block" type="submit" name="submit">Buscar</button>  
                    </div>

        </form>
        
        <div class="col-sm-10">
            <?php
            
        $conn = new ConexionDB($_SESSION['usuario_login'], $_SESSION['password_login']);
        $cSolicitud=new ControlSolicitud();
        $cCondicionxsolicitud=new ControlCondicionxSolicitud();
        $cCondicion_SE= new ControlCondicion_SE();
        $A=new Condicion_SE();
        if ($conn->conectarDB()) {
            $sesion = $conn->getConn();
            $_SESSION['sesion_logueado'] = $sesion;
           
            if(!isset($_POST['categoria']) || ($_POST['categoria']=="Todos")){
                echo '<br><br>';
                TablaReporte($cSolicitud);
                
                
                
                
            }
            else{ 
                echo '<SELECT name="subcategoria" SIZE="1" onchange="" class="col-sm-2"><OPTION VALUE="estadoValidado">Estado</option><OPTION VALUE="Puntaje">Puntaje</option><OPTION VALUE="Codigo">Codigo Estudiante</option><OPTION VALUE="Periodo">Periodo</option></SELECT><br><br> ';
                
                if(($_POST['subcategoria']=="estadoValidado")){
                     TablaReporte($cSolicitud);
                }
                
                
                
            }
        }
        
        function TablaReporte($cSolicitud){
            $cSolicitud->verSolicitudes();
            echo '<table id="reporte" class="table table-bordered"> '
                 . '<thead><tr><th>'."ID SOLICITUD".'</th><th>'."CODIGO ESTUDIANTE".'</th><th>'."CONVOCATORIA".'</th><th>'."PUNTAJE".'</th><th>'."VAL SOLICITUD".'</th></tr></thead>'
                        . '<tbody>';
                        foreach($cSolicitud->verSolicitudes() as $soli){
                            
                            $i=1;
                            echo '<tr><td>'.$soli->getId_solicitud(). ' </td> <td>'.$soli->getCodigo_estudiante().'  </td> <td>'.$soli->getId_convocatoria().' </td> <td>'.$soli->getPuntaje().' </td> <td>'.$soli->getId_solicitud().' </td></tr>';
                            $i+=1;
                        }
                        '</tbody></table>';
            
        }
        
        
        
        
        ?>
            
            
            
            
            
            
        <table class="table table-bordered">
            <thead>
                <tr><th>Id Convocatoria</th><th> Codigo estudiante</th><th>link</th><th>Condiciones</th></tr>
            </thead>
            <tbody>
                <?php 
                //$soli=new Solicitud();
                $A=new Condicion_SE();
                //$A->getPuntaje()
                echo '';
                foreach($cSolicitud->verSolicitudes() as $soli){
                    echo '<tr><th>'.$soli->getId_convocatoria().'</th><th>'.$soli->getCodigo_estudiante().
                           '</th>'; 
                    echo '<th><a href="C:\Users\ANDREY\Documents\archivos/'.$soli->getSoportes_solicitud().
                           '">'.$soli->getSoportes_solicitud().'</a></th>';//'</th><th>'.
                           echo '<th>';
                     $i=1;
                    foreach ($cCondicionxsolicitud->verCondicionxSolicitudxSolicitud($soli) as $conxsol){
                        $condic=$cCondicion_SE->verCondiciones_SExid($conxsol->getId_condicion());
                    echo $i.')'.$condic->getNombre_condicion().'____puntaje:'.$condic->getPuntaje().'.<br>';                    
                
                    $i+=1;
                    }            
                    echo '</th></tr>';
                    
                }
               // $conxsol=new CondicionxSolicitud();
                
                ?>
            </tbody>
        </table>
        </div>
        
        
        
        
    </body>
</html>
