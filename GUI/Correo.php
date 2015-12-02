<?php
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlConvocatoria.php';
include '../logica/ControlBeneficiadoValidado.php';
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
        $cBeneficiadoValidado=new ControlBeneficiadoValidado();
        $cFacultad = new ControlFacultad();
        $cConvocatoria = new ControlConvocatoria();
        ?>

        <div class="containerl">
            <br><br>

            <form id="form" method="post" action="#">

                <div >

                    <h3>Notificar beneciados:</h3>

                    <label for="subject">Llena el  asunto y el mensaje:</label>

                </div>
                <br>

                <br>
                <input type="text" name="asunto"  class="form-control" placeholder="Asunto" />
                <br>
                <textarea name="mensaje"  placeholder="Escriba aqui el mensaje" rows="10" cols="40"></textarea> 
                <!--<input type="text" name="mensaje" class="form-control" placeholder="mensaje" />-->
                <br>
                


                

                <div class="col-sm-12" style="padding-top: 10%"> 
                    <button class= "btn btn-primary btn-block" type="submit" name="submit">Enviar</button>  
                </div>
            </form>
        </div>
        <?php 
        require("../GUI/PHPMailer_5.2.4/PHPMailer_5.2.4/class.phpmailer.php");
        if (isset($_POST['submit'])) {
            
                         $cBeneficiadoValidado->verBeneficiadoValidado();
                         foreach($cBeneficiadoValidado->verBeneficiadoValidado() as $bene){
                              $i=1;
                            echo $bene->getCorreo_persona();
        error_reporting(E_ALL);

$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->SMTPDebug  = 2; 
$mail->From = "apoyoalimentarioUD@gmail.com";
$mail->FromName = "Apoyo Alimentario UD";
$mail->Host = "smtp.gmail.com"; // specif smtp server
$mail->SMTPSecure= "ssl"; // Used instead of TLS when only POP mail is selected
$mail->Port = 465; // Used instead of 587 when only POP mail is selected
$mail->SMTPAuth = true;
$mail->Username = "apoyoalimentarioUD@gmail.com"; // SMTP username
$mail->Password = "apoyo20152"; // SMTP password
$mail->AddAddress($bene->getCorreo_persona(), "".$bene->getNombre_persona().",".$bene->getApellido_persona().""); //replace myname and mypassword to yours
$mail->AddReplyTo("apoyoalimentarioUD@gmail.com", "Apoyo Alimentario UD");
$mail->WordWrap = 50; // set word wrap
//$mail->AddAttachment("c:\\temp\\js-bak.sql"); // add attachments
//$mail->AddAttachment("c:/temp/11-10-00.zip");

$mail->IsHTML(true); // set email format to HTML
$mail->Subject = $_POST['asunto'];
$mail->Body = $_POST['mensaje'];

if($mail->Send()) {echo "Send mail successfully";}
else {echo "Send mail fail";} 
                           
                            
                            
                            $i+=1;
                            
                        }
            
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