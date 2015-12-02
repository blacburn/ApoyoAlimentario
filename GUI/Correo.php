<?php
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlConvocatoria.php';
?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->

<html>
    <head>
        <meta charset="UTF-8">
        <title>Correo</title>
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
        $cFacultad = new ControlFacultad();
        $cConvocatoria = new ControlConvocatoria();
        ?>

        <div class="containerl">
            <br><br>

            <form id="form" method="post" action="#">

                <div >

                    <h3>Enviar Correo</h3>

                    <label for="subject">Llena el  asunto y el mensaje:</label>

                </div>
                <br>

                <br>
                <input type="text" name="asuntos"  class="form-control" placeholder="asunto" />
                <br>
                <input type="text" name="mensaje" class="form-control" placeholder="mensaje" />
                <br>
                


                

                <div class="col-sm-12" style="padding-top: 10%"> 
                    <button class= "btn btn-primary btn-block" type="submit" name="submit">Enviar</button>  
                </div>
            </form>
        </div>
        <?php 
        if (isset($_POST['submit'])) {
            //$id_facu= (string)$_POST['facultad'];
            //echo $id_facu;
            $cConvocatoria->crearConvocatoria($_POST['cupos'],$_POST['fechaI'],$_POST['fechaF'], $_POST['periodo'],$_POST['facultad'],'SI');
            //echo $_POST['facultad'];
            //echo $_POST['cupos'];
            //echo $_POST['periodo'];
            //echo $_POST['fechaI'];
            //echo $_POST['fechaF'];
            
                      } 
        ?>
        
        
        
        <div id="footer">
            <div>
                <br></br>
                <br></br>
                <center><p>&#169; 2015 Bases de Datos 2.</p></center>


            </div>
        </div>
    </body>

</html>