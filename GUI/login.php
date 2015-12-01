<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
//session_start();
include '../DB/ConexionDB.php';
//include '../logica/ControlPersona.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login Apoyo</title>
        <link rel="stylesheet" href="../public/css/style.css" type="text/css">
    </head>
    <body>        
        <div id="header">
            <div>
                <a href="index.php" id="logo"><img src="../public/images/bienestar.png" alt="logo" height="90"></a>
                <ul>
                    <li >
                        <a href="index.php">Inicio</a>
                    </li>
                    <li >
                        <a href="info.php">Info</a>
                    </li>
                    <li class="selected">
                        <a href="login.php">Entrar</a>
                    </li>
                    <li >
                        <a href="registro.php">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
        <br><br>
        <?php
        if (isset($_POST['submit'])) {
//            error_reporting(E_ALL);
//require("../GUI/PHPMailer_5.2.4/PHPMailer_5.2.4/class.phpmailer.php");
//$mail = new PHPMailer();
//$mail->IsSMTP(); // set mailer to use SMTP
//$mail->SMTPDebug  = 2; 
//$mail->From = "andreyblue14@gmail.com";
//$mail->FromName = "Andrey";
//$mail->Host = "smtp.gmail.com"; // specif smtp server
//$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
//$mail->Port = 465; // Used instead of 587 when only POP mail is selected
//$mail->SMTPAuth = true;
//$mail->Username = "andreyblue14@gmail.com"; // SMTP username
//$mail->Password = "Blacburnfulham14"; // SMTP password
//$mail->AddAddress("andreysa0114@hotmail.com", "andreysa0114@hotmail.com"); //replace myname and mypassword to yours
//$mail->AddReplyTo("jiansentest@gmail.com", "Jiansen");
//$mail->WordWrap = 50; // set word wrap
////$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
////$mail->AddAttachment("c:/temp/11-10-00.zip");
//
//$mail->IsHTML(true); // set email format to HTML
//$mail->Subject = 'Apoyo Alimentario';
//$mail->Body = 'Le comunicamos que ha sido beneficiado del apoyo alimentario';
//
//if($mail->Send()) {echo "Send mail successfully";}
//else {echo "Send mail fail";} 
//            mail( "andreyblue14@gmail.com" , "Correo" , "Holaaaaa" );
            //include '../DB/ConexionDB.php';
            $conn = new ConexionDB($_POST['usuario_login'], $_POST['password_login']);
            if ($conn->conectarDB()) {
                $usuario_login = $_POST['usuario_login'];
                $usuario_password = $_POST['password_login'];
                session_start();
                $sesion = $conn->getConn();
                $_SESSION['sesion_logueado'] = $conn->getConn();
                $_SESSION['usuario_login'] = $usuario_login;
                $_SESSION['password_login'] = $usuario_password;
                
               
                //$_SESSION['sesion_logueado'];
                /*$cPersona=  new ControlPersona();
                $persona=new Persona();
                $persona=  $cPersona->buscarPersonaxUsuario($usuario_login);
                echo $persona->getApellido_persona();//->getNombre_persona()." ".$persona->getTipo_persona();*/
                header("Location: menu.php");
            } else {
                echo '<center><h1>ingerese un usuario o contrasena validos</h1></center>';
                //header("Location: ../GUI/login.php");
            }
        } 
        ?>
<br><br>
        <div class="containerl">

            <form action="#" id="signup" method="post">

                <div class="header">

                    <h3>Entrar</h3>

                    <p>Entra para obtener nuestros beneficios</p>

                </div>

                <div class="sep"></div>

                <div class="inputs">

                    <input type="text"  name="usuario_login" placeholder="user" autofocus />

                    <input type="password" name="password_login" placeholder="Password" />

                    <input type="submit" id="submit" name="submit"/>
                </div>

            </form>
        </div>
<?php 
 include './footer.php';
 ?>
    </body>
</html>