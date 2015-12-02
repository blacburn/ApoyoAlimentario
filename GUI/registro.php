<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<?php
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
        <title>Registrarse</title>
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
                    <li >
                        <a href="login.php">Entrar</a>
                    </li>
                    <li class="selected">
                        <a href="registro.php">Registrarse</a>
                    </li>
                </ul>
            </div>
        </div>
        <br><br>
        <?php
        $cPersona = new ControlPersona();
        if (isset($_POST['submit'])) {
            //include '../DB/ConexionDB.php';
            $conn = new ConexionDB("Registro", "Registro");
            if ($conn->conectarDB()) {
                $usuario_login = "Registro";
                $usuario_password = "Registro";
                session_start();
                $sesion = $conn->getConn();
                $_SESSION['sesion_logueado'] = $conn->getConn();
                $_SESSION['usuario_login'] = $usuario_login;
                $_SESSION['password_login'] = $usuario_password;
//                $auxPersona = new Persona();
                $auxPersona=$cPersona->buscarPersonaxDocumento($_POST['documento_persona']);
                echo $auxPersona->getTipo_persona();
                $aca=$auxPersona->getTipo_persona();
                if(!empty($aca)){
                    
                   if(($auxPersona->getUsuario_persona())== $_POST['usuario_anterior']){
                       if(  (($auxPersona->getUsuario_persona())!= $_POST['usuario_persona']) || (($auxPersona->getCorreo_persona())!= $_POST['correo_persona']) ){
                       $cPersona->actualizarPersona($_POST['documento_persona'],$_POST['usuario_persona'],$_POST['correo_persona']);
                   }
                       $cPersona->registrarPersonaxUC($auxPersona->getTipo_persona(),$_POST['usuario_persona'],$_POST['clave_persona']);
//                       $cPersona->registrarPersona($auxPersona);  
                       echo "<script>alert('Registrado')</script>"; 
                       
                   } 
                   else{
                       
                       echo "<script>alert('Error en el usuario de condor')</script>"; 
                   }
                    
                   
                }
                else {
                echo "<script>alert('Errorrrrrrr' )</script>";
                }
                //$_SESSION['sesion_logueado'];
                /*$cPersona=  new ControlPersona();
                $persona=new Persona();
                $persona=  $cPersona->buscarPersonaxUsuario($usuario_login);
                echo $persona->getApellido_persona();//->getNombre_persona()." ".$persona->getTipo_persona();*/
               
                
                
                
                
            } 
            
            
            
           
            session_destroy();
        } 
        ?>
<br><br>
        <div class="containerl">

            <form action="#" id="signup" method="post">

                <div class="header">

                    <h3>Registro</h3>


                </div>

               <br>
                    <br>
                    <label for="subject">Documento :</label>
                    <br><br>
                    <input type="text" name="documento_persona" class="form-control" placeholder="" />
                    <br>
                    <label for="subject">Usuario Anterior:</label>
                    <br><br>
                    <input type="text" name="usuario_anterior" class="form-control" placeholder="" />
                    <br>
                    <label for="subject">Usuario nuevo :</label>
                    <br><br>
                    <input type="text" name="usuario_persona" class="form-control" placeholder="" />
                    <br>
                    <label for="subject">Clave :</label>
                    <br><br>
                    <input type="text" name="clave_persona" class="form-control" placeholder="" />
                    <br>
                    <label for="subject">Correo :</label>
                    <br><br>
                    <input type="text" name="correo_persona" class="form-control" placeholder="" />
                    <br>
                    <div class="col-sm-6" style="padding-top: 15%"> 
                        <button class= "btn btn-primary btn-block" type="submit" name="submit">Registrarme</button>  
                    </div>

            </form>
        </div>
<?php 
 include './footer.php';
 ?>
    </body>
</html>