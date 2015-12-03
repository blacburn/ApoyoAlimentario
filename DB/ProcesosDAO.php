<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProcesosDAO
 *
 * @author Sptn2
 */
class ProcesosDAO {
    //put your code here
    
    public function __construct() {
        
    }

    public function ejecutarAsignacionPuntaje($convocatoria){  
        
        $sqltxt="execute PR_ASIGNAR_PUNTAJE(".$convocatoria.")";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
    public function ejecutarValidarSolicitudes($convocatoria){  
        
        $sqltxt="execute PR_VALIDARSOLICITUDES(".$convocatoria.")";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
     public function ejecutarAsignarBeneficiados($convocatoria,$funcionario){  
        
        $sqltxt="execute PR_ASIGNAR_BENEFICIO(".$convocatoria.",".$funcionario.")";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
     public function ejecutarListaBeneficiados(){  
        
        $sqltxt="BEGIN PK_PROCESOS.ESCRIBIR; END;";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
    
    
    
    
    
}
