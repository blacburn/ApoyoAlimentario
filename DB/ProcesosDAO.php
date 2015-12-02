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

    public function ejecutarAsignacionPuntaje(){  
        
        $sqltxt="";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
    public function ejecutarValidarSolicitudes(){  
        
        $sqltxt="";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
     public function ejecutarAsignarBeneficiados(){  
        
        $sqltxt="";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
    }
    
    
    
    
    
}
