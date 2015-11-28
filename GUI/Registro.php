<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlEstudiante.php';
include '../logica/ControlFuncionario.php'; 
include '../logica/ControlPersona.php'; 
include '../logica/ControlTipoCondicion_SE.php';
include '../logica/ControlCondicion_SE.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registrar</title>
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
//        $auxPersona = new Persona();
        $cPersona = new ControlPersona();
        $cTipoCondicion_SE = new ControlTipoCondicion_SE();
        $cCondicion_SE = new ControlCondicion_SE();
        ?>
        
        <div class="col-sm-8">
            <center><div class="col-sm-6">
                <br><br><br>
                <form id="form" method="post" >
                    <div class="header">
                        <h3>Registrar </h3>                    
                    </div>
                    <br>
                    <br>
                    <label for="subject">Documento Persona :</label>
                    <br><br>
                    <input type="text" name="documento_persona" class="form-control" placeholder="" />
                    <br>
                    
                    <div class="col-sm-6" style="padding-top: 15%"> 
                        <button class= "btn btn-primary btn-block" type="submit" name="submit">Registar</button>  
                    </div>
                    
                </form> 
                
       <?php 
        if (isset($_POST['submit'])) {
            
            $auxPersona=$cPersona->buscarPersonaxDocumento($_POST['documento_persona']);
            echo $auxPersona->getTipo_persona();
            $aca=$auxPersona->getTipo_persona();
            if(!empty($aca)){
                echo "<script>alert('Registrado')</script>";
                $cPersona->registrarPersona($auxPersona);
                
            }
            else {
                echo "<script>alert('Errorrrrrrr' )</script>";
                
            }
            
            
            
            
                      } 
        
        ?>
         </div></center>
           </div>
    </body>
</html>
