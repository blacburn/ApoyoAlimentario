<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php 
session_start();
include '../logica/ControlCondicion_SE.php';
include '../logica/ControlTipoCondicion_SE.php';
include '../DB/ConexionDB.php';

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php
                                
                                $conn = new ConexionDB($_SESSION['usuario_login'], $_SESSION['password_login']);
                                if ($conn->conectarDB()) {
                                    $sesion = $conn->getConn();
                                    $_SESSION['sesion_logueado'] = $sesion;
                                    //echo $sesion;
                                    
                                }
                                ?>
        <h1>Andrey :D</h1>
        <form>
            <div class="container">
                                        
                                            <?php
                                            //$tipo = new Tipo_Condicion_SE();
                                            //$contador=0;
                                            $tipo_cond = new ControlTipoCondicion_SE();
                                            $cond = new ControlCondicion_SE();
                                            foreach ($tipo_cond->verTipos_Condiciones() as $tipo) {
                                                echo '<div class="containerl2">';
                                                echo '';
                                                echo '<div class="container" style="width: 1075px">';
                                                echo '<center><h3 class="form-signin-heading">' . $tipo->getNombre_tipo_condicion() . '</h3></center>';
                                                //$condi=new Condicion_SE();
                                                foreach ($cond->verCondiciones_SE($tipo->getId_tipo_condicion()) as $condi) {
                                                    echo '<div class="col-sm-6">';
                                                    echo '<br>';
                                                    echo '<input type="checkbox" name="seleccion[]" value="' . $condi->getId_condicion() . '"/><h4 class="form-signin-heading">' . $condi->getNombre_condicion() . '</h4></br>';
                                                    echo '<br>';
                                                    //echo '<input type="radio" name="hogar" checked="" value="si"><label for="name">SI</label>';
                                                    //echo '<br>';
                                                    //echo '<input type="radio" name="hogar" value="no"><label for="name">NO</label>';
                                                    echo '</div>';
                                                    //$contador+=1;
                                                }
                                               
                                            echo '<br> <input name="file" type="file"  /></center>';
                                                echo '</div>';

                                                echo '<hr>';
                                                echo '</div>';
                                            }
                                            ?>
                                            <div class="col-sm-6">
            
        </form>
        
    </body>
</html>
