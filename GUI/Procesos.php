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
        }
        
        $cProceso =new ControlProcesos();
        $cFacultad=new ControlFacultad();
        $cConvocatoria=new ControlConvocatoria();
        
        ?>
        
        <div class="col-sm-10">
            <center><h1>AREA DE PROCESOS SOBREEL SISTEMA</h1></center>
            
            
            <center><div class="col-sm-6">
                <br><br><br>
                <form id="form" method="post" >
                    <div class="header">
                        <h3>Crear Condición</h3>                    
                    </div>
                    <br>
                    <label for="subject">Seleccione la facultad</label>
                    <br>
                    <select id="subject" name="facultad" class="form-control" required="required" onchange="submit();">
                    <?php
                    //->verFacultades();
                    //$fa=new Facultad();
                    foreach ($cFacultad->verFacultades() as $fa) {
                        echo '<option value="' . $fa->getId_facultad() . '">' . $fa->getNombre_facultad() . '</option>';
                    }
                    ?> 
                </select>
                </form>
                
                <?php 
                 if (isset($_POST['submit'])) {
                 echo $_POST['facultad'];
                     
                 }
                 
?>
            </div>
        </div>
    </body>
</html>
