<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteDAO
 *
 * @author ANDREY
 */
include '../Negocio/Estudiante.php';

class EstudianteDAO {
    //put your code here
    public function __construct() {
        
    }

    public function buscarEstudiantexDocumento($documento) {
        
        $estudiante = new Estudiante();
        $sqltxt = "select * from s_estudiante where k_documento = ".$documento."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        while(oci_fetch($stid)) {
            //$persona->setCodigo_persona(oci_result($stid, 'CODIGO'));
            $estudiante->setCodigo_estudiante(oci_result($stid, 'K_CODIGO_EST'));
            $estudiante->setDocumento_estudiante(oci_result($stid, 'K_DOCUMENTO'));
            $estudiante->setMatriculas_estudiante(oci_result($stid, 'C_MATRICULA'));
            $estudiante->setActivo_estudiante(oci_result($stid, 'N_ACTIVO'));
            $estudiante->setCarrera_estudiante(oci_result($stid, 'N_CARRERA'));            
            $estudiante->setPromedio_estudiante(oci_result($stid, 'C_PROMEDIO'));
            $estudiante->setAval_solicitud(oci_result($stid, 'B_AVALSOL'));
        }
        //echo (string)$estudiante->getCodigo_estudiante();
        //echo $estudiante->getCarrera_estudiante();
        //echo $estudiante->getMatriculas_estudiante();
        //echo $estudiante->getCodigo_estudiante();
        //echo $persona->getApellido_persona();
        return $estudiante;
    }
    
    public function buscarEstudiantexCodigo($codigo) {
        
        $estudiante = new Estudiante();
        $sqltxt = "select * from s_estudiante where k_codigo_est = ".$codigo."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        while(oci_fetch($stid)) {
            //$persona->setCodigo_persona(oci_result($stid, 'CODIGO'));
            $estudiante->setCodigo_estudiante(oci_result($stid, 'K_CODIGO_EST'));
            $estudiante->setDocumento_estudiante(oci_result($stid, 'K_DOCUMENTO'));
            $estudiante->setMatriculas_estudiante(oci_result($stid, 'C_MATRICULA'));
            $estudiante->setActivo_estudiante(oci_result($stid, 'N_ACTIVO'));
            $estudiante->setCarrera_estudiante(oci_result($stid, 'N_CARRERA'));            
            $estudiante->setPromedio_estudiante(oci_result($stid, 'C_PROMEDIO'));
            $estudiante->setAval_solicitud(oci_result($stid, 'B_AVALSOL'));
        }
        //echo (string)$estudiante->getCodigo_estudiante();
        //echo $estudiante->getCarrera_estudiante();
        //echo $estudiante->getMatriculas_estudiante();
        //echo $estudiante->getCodigo_estudiante();
        //echo $persona->getApellido_persona();
        return $estudiante;
    }
    
    public function banderaActivo_solicitud($estudiante){
        //$estudiante = new Estudiante();
        $sqltxt = "Update s_estudiante set b_avalsol = '".$estudiante->getAval_solicitud()."' where "
                . "k_codigo_est = ".$estudiante->getCodigo_estudiante()."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        
    }
    
 
   
}

?>

