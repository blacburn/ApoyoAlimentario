<?php
session_start();
include '../DB/ConexionDB.php';
include '../logica/ControlFacultad.php';
include '../logica/ControlConvocatoria.php';
include '../logica/ControlBeneficiadoValidado.php';
include '../logica/ControlProcesos.php';
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
        $cProcesos = new ControlProcesos();
        ?>

        <div class="containerl">
            <br><br>

            <form id="form" method="post" action="#">

                <div >

                    <h3>Generar Lista beneciados:</h3>

                    <label for="subject">Sleccione la convocatoria a la que se desea generar:</label>

                </div>
                <br><br><br>

              <select id="subject" name="id_convocatoriasol" class="form-control" required="required">
                                            <?php
                                            //->verFacultades();
                                            //$facul=new Facultad();
                                            $convo = new Convocatoria();

                                            foreach ($cConvocatoria->verConvocatoriasActivas() as $convo) {
                                                echo $convo->getCupos() . '  ' . $convo->getPeriodo();
                                                $facul = $cFacultad->buscarFacultad($convo->getId_facultad());
                                                echo '<option value="' . $convo->getId_convocatoria() . '">Convocatoria  ' . $facul->getNombre_facultad() . '  cupos:  ' . $convo->getCupos() .
                                                '  inicio:  ' . $convo->getFecha_inicio() . '  fin:  ' . $convo->getFecha_fin() . '</option>';
                                            }

                                            /* foreach ($cFacultad->verFacultades() as $fa) {
                                              echo '<option value="' . $fa->getId_facultad() . '">' . $fa->getNombre_facultad() . '</option>';
                                              } */
                                            ?> 
                                        </select>
                

<!--                <input type="file" name="archivo" id="archivo" /><br/>-->
                

                
                
                
                
               <div class="col-sm-6" style="padding-top: 20%"> 
                    
                <button class= "btn btn-primary btn-block" type="submit" name="generar">Generar</button>
                
               
                </div>
                <div class="col-sm-6" style="padding-top: 20%"> 
                    
                <a class= "btn btn-primary btn-block" href="verListado.php" target='_blank' onClick="window.open(this.href, this.target, 'width=700 , height=400'); return false;">Ver</a>
                
                 </div>
                
               
                
            </form>
            
        </div>
        <?php 
        
                      
                      if (isset($_POST['generar'])) {
                          $cProcesos->ejecutarlistadoBeneficiados($_POST['id_convocatoriasol']);
                          
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