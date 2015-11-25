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
include '../Negocio/Funcionario.php';

class FuncionarioDAO {
    //put your code here
    public function __construct() {
        
    }

    public function buscarFuncionarioxDocumento($documento) {
        
        $funcionario = new Funcionario();
        $sqltxt = "select * from s_funcionario where k_documento = ".$documento."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        while(oci_fetch($stid)) {
            //$persona->setCodigo_persona(oci_result($stid, 'CODIGO'));
            $funcionario->setId_funcionario(oci_result($stid, 'K_IDFUNCIONARIO'));
            $funcionario->setDocumento_funcionario(oci_result($stid, 'K_DOCUMENTO'));
            $funcionario->setCargo_funcionario(oci_result($stid, 'N_CARGO'));
        }
        //echo (string)$estudiante->getCodigo_estudiante();
        //echo $estudiante->getCarrera_estudiante();
        //echo $estudiante->getMatriculas_estudiante();
        //echo $estudiante->getCodigo_estudiante();
        //echo $persona->getApellido_persona();
        return $funcionario;
    }
    
   
    
 
   
}

?>
