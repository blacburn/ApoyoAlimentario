<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlProcesos.php';
include '../logica/ControlConvocatoria.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlPersona.php';
include '../logica/ControlFuncionario.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crear Actividad</title>
        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/index_style.css">
        <link rel="stylesheet" href="../public/css/style.css" type="text/css">        
        <script src="../public/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include './headerlog.php';
        include './menuLateral.php';
        ?>
        <?php
        $conn = new ConexionDB($_SESSION['usuario_login'], $_SESSION['password_login']);
        if ($conn->conectarDB()) {
            $sesion = $conn->getConn();
            $_SESSION['sesion_logueado'] = $sesion; 
            $cPersona = new ControlPersona();
            $persona = new Persona();
            $persona = $cPersona->buscarPersonaxUsuario($_SESSION['usuario_login']);
        }
        
        $cProceso =new ControlProcesos();
        $cFacultad=new ControlFacultad();
        $cFuncionario= new ControlFuncionario();
        $cConvocatoria=new ControlConvocatoria();
        
        ?>
        
        <div class="col-sm-10">
            <center><h1>AREA DE PROCESOS SOBRE EL SISTEMA</h1></center>
            
            
            <center><div class="col-sm-12">
                <br><br><br>
                <form id="form" method="post" >
                    <div class="header">
                        <h3>Crear Condición</h3>                    
                    </div>
                    <br>
                    <label for="subject">Seleccione la convocatoria sobre la cual se ejecutara el proceso</label>
                    <br>
                    <table class="table table-bordered">
                                            <?php
                                            //->verFacultades();
                                            //$facul=new Facultad();
                                            $convo = new Convocatoria();
                                   echo '<thead><tr><th><center><h3>Convocatoria</h3></center></th><th><center><h3>Facultad</h3></center></th><th><center><h3>Periodo</h3></center></th>'.
                                            '<th><center><h3>Cupos</h3></center></th><th><center><h3>Inicio</h3></center></th><th><center><h3>fin</h3></center></th><th><center><h3>Seleccionar</h3></center></th></tr></head>';
                                    echo '<tbody>';                                            

                                            foreach ($cConvocatoria->verConvocatorias() as $convo) {
                                                //echo $convo->getCupos() . '  ' . $convo->getPeriodo();
                                                $facul = $cFacultad->buscarFacultad($convo->getId_facultad());
                                                echo '<tr><td>'. $convo->getId_convocatoria() .'</td><td>' . $facul->getNombre_facultad() . '</td><td>' . $convo->getPeriodo().
                                                       '</td><td>' . $convo->getCupos() .'</td><td> ' . $convo->getFecha_inicio() . '</td><td>' . $convo->getFecha_fin() . '</td>'
                                                        . '<td><center><input type="checkbox" name="seleccion[]" value="' . $convo->getId_convocatoria() . '"/></center></td></tr>';
                                            }
                                               echo '</tbody>';
                            

                                            /* foreach ($cFacultad->verFacultades() as $fa) {
                                              echo '<option value="' . $fa->getId_facultad() . '">' . $fa->getNombre_facultad() . '</option>';
                                              } */
                                            ?> 
                   </table>
                    <div class="col-sm-4" style="padding-top: 10%"> 
                                            <button class= "btn btn-primary btn-block" type="submit" name="svalidacion">Validacion</button>  
                    </div>
                    <div class="col-sm-4" style="padding-top: 10%"> 
                                            <button class= "btn btn-primary btn-block" type="submit" name="spuntaje">Puntaje</button>  
                    </div>                    
                    <div class="col-sm-4" style="padding-top: 10%"> 
                                            <button class= "btn btn-primary btn-block" type="submit" name="sbeneficio">Beneficio</button>  
                    </div>
                </form>
                
                <?php 
                 if (isset($_POST['svalidacion'])) {
                       foreach ($_POST['seleccion'] as $sel) {                                    
                                    $cProceso->ejecutarValidarSolicitudes($sel);
                                   }      
                 }
                 if (isset($_POST['spuntaje'])) {
                 foreach ($_POST['seleccion'] as $sel) {                                    
                                    $cProceso->ejecutarAsignacionPuntaje($sel);
                                  }                             
                 }
                 if (isset($_POST['sbeneficio'])) {
                     
                 foreach ($_POST['seleccion'] as $sel) {
                                   // echo $cFuncionario->buscarFuncionarioDocumento($persona->getDocumento_persona())->getId_funcionario();
                                    //$persona = new Persona();
                                    $cProceso->ejecutarValidarSolicitudes($sel,$cFuncionario->buscarFuncionarioDocumento($persona->getDocumento_persona())->getId_funcionario());
                                  }                              
                 }
                 
                 
?>
            </div>
        </div>
    </body>
</html>
