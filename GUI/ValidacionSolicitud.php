<?php
session_start();
//include '../logica/ControlPersona.php';
include '../DB/ConexionDB.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlPersona.php';
include '../logica/ControlTipoCondicion_SE.php';
include '../logica/ControlCondicion_SE.php';
include '../logica/ControlSolicitud.php';
include '../logica/ControlConvocatoria.php';
include '../logica/ControlEstudiante.php';
include '../logica/ControlCondicionxSolicitud.php';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Formulario</title>

        <link href="../public/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/css/index_style.css">
        <link rel="stylesheet"  href="../public/css/style.css"/>
        <script src="../public/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <?php
        include 'headerlog.php';
        ?>

        <?php
        include 'menuLateral.php';
        ?>

        <div class="container">
            <div class="col-sm-8">

                <form id="form" method = "POST" > 
                    <div class="col-sm-8">

                        <div><br><br><br>

                            <div>
                                <?php
                                $cFacultad = new ControlFacultad();
                                $cConvocatoria = new ControlConvocatoria();
                                //$cSolicitud = new ControlSolicitud();
                                $conn = new ConexionDB($_SESSION['usuario_login'], $_SESSION['password_login']);
                                if ($conn->conectarDB()) {
                                    $sesion = $conn->getConn();
                                    $_SESSION['sesion_logueado'] = $sesion;
                                    //echo $sesion;
                                    $cPersona = new ControlPersona();
                                    $persona = new Persona();
                                    $idpersona =$_GET["doc"];
                                    //$codigoestudiante=$HTTP_GET_VARS["codigo"];
                                    $persona = $cPersona->buscarPersonaxDocumento($idpersona);

                                    $cSolictud = new ControlSolicitud();
                                    //$persona_documento = $persona->getDocumento_persona();

                                    $cEstudiante = new ControlEstudiante();
                                    $estudiante = $cEstudiante->buscarEstudiantexDocumento($persona->getDocumento_persona());
                                    $estudiante_codigo = $estudiante->getCodigo_estudiante();

                                    $cCondicionxSolicitud = new ControlCondicionxSolicitud();

                                    //echo $persona->getNombre_persona()." ".$persona->getApellido_persona(); //->getNombre_persona()." ".$persona->getTipo_persona();
                                    //echo $_SESSION['usuario_logueado'];
                                }
                                ?>
                                <div class="focus" style="width: 1075px">
                                    <center><h3 class="form-signin-heading">Informacion Personal</h3></center>
                                    <div class="col-sm-6"><center><?php
                                            echo '<h3 class="form-signin-heading"> Nombre: ' . $persona->getNombre_persona() . ' ' . $persona->getApellido_persona() . '</h3>';
                                            ?></center></div>

                                    <div class="col-sm-6"><center><?php
                                            echo '<h3 class="form-signin-heading"> Documento: ' . $persona->getDocumento_persona() . '</h3>';
                                            ?></center></div>
                                    <div class="col-sm-6"><center><?php
                                            echo '<h3 class="form-signin-heading"> Codigo: ' . $estudiante_codigo . '</h3>';
                                            ?></center></div>
                                    <div class="col-sm-6"><center><?php
                                            echo '<h3 class="form-signin-heading"> Sexo: ' . $persona->getGenero_persona() . '</h3>';
                                            ?></center></div>

                                </div>
                                <hr>
                            </div>

                            <form>
                            <div>
                                <br>

                                <div>
                                    <div class="container">
                                    

                                    <?php
                                    //$tipo = new Tipo_Condicion_SE();
                                    //$contador=0;
                                    $tipo_cond = new ControlTipoCondicion_SE();
                                    $cCondicion_se = new ControlCondicion_SE();
                                    $idconvoc = $_GET["conv"];
                                    $solicitud = $cSolictud->buscarSolicitudxId($cSolictud->buscarIdSolicitud($estudiante->getCodigo_estudiante(), $idconvoc));
                                    
                                    foreach ($tipo_cond->verTipos_Condiciones() as $tipo) {
                                        echo '<div class="containerl2">';
                                        echo '<div class="col-sm-12">';
                                        echo '<div class="container" style="width: 1075px">';
                                        echo '<center><h3 class="form-signin-heading">' . $tipo->getNombre_tipo_condicion() . '</h3></center></div>';
                                        $cond_sol = new CondicionxSolicitud();
                                        $condicion = new Condicion_SE();
                                        foreach ($cCondicion_se->verCondiciones_SE($tipo->getId_tipo_condicion()) as $condicion) {
                                            foreach ($cCondicionxSolicitud->verCondicionxSolicitudxSolicitud($solicitud) as $cond_sol) {
                                                if ($cond_sol->getId_condicion() == $condicion->getId_condicion()) {
                                                    echo '<div class="col-sm-6">';
                                                    echo '<br>';
                                                    echo '<div class="col-sm-6"><h3>' . $condicion->getNombre_condicion() . '</h3></div>';
                                                    echo '<div class="col-sm-6"><input type="checkbox" name="seleccion[]" value="' . $condicion->getId_condicion() . '"/><h4 class="form-signin-heading">Validar</h4></div></br>';
                                                    echo '<br><br><br><br><br><br>';
                                                    echo '</div>';
                                                }
                                            }
                                        }                                        
                                       echo '<div class="col-sm-12"><center>';
                                        echo "<br> <a href ='\ApoyoAlimentario\public/".$cond_sol->getSoportes_solicitud()."' target='_blank' class='btn btn-danger'>Soporte</a></center></div>";

                                        echo '</div>';
                                        echo '<hr>';
                                        echo '</div>';
                                    }
                                    ?>
                                        <div class="col-sm-6">
                                        </div>                     


                                    </div>

                                    <div class="container" >
                                        <br>
                                        <div class="col-sm-12"> </div>
                                        <div class="col-sm-12" style="padding-top: 10%"> 
                                            <button class= "btn btn-primary btn-block" type="submit" name="submit">Confirmar</button>  
                                        </div>
                                        <div class="col-sm-12" style="padding-left:10%"> </div>
                                    </div>


                                </div>                         
                            </div> 
                            </form>
                            
                             <?php
                            if (isset($_POST['submit'])) {
                                echo "hola";
                            }
                            ?>

                        </div>
                    </div>
                    <br><br>

                    <div id="footer">
                        <div>
                            <br></br>
                            <br></br>

                            <center><p>&#169; 2015 Bases de Datos 2.</p></center>


                        </div>
                    </div>
                    </body>

                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                    <!-- Include all compiled plugins (below), or include individual files as needed -->
                    <script src="public/js/bootstrap.min.js"></script> 
                    </html>
