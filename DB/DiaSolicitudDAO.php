<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DiaSolicitudDAO
 *
 * @author Sptn2
 */
include '../Negocio/DiaSolicitud.php';

class DiaSolicitudDAO {
    //put your code here
        
    public function __construct() {
        
    }

    public function verDias(){       
        $dias = array();
        $i=0;
        $sqltxt = "select * from s_dia";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $dia = new DiaSolicitud();
            $dia->setId_dia(oci_result($stid, 'K_IDDIA'));
            $dia->setNombre_dia(oci_result($stid, 'N_NOMDIA'));
            $dias[$i]=$dia; 
            $i+=1;
        }
        return $dias;
    }
    
    public function asignarDiaSolicitud($iddia,$idsolicitud){
        $dia = new DiaSolicitud();
        $sqltxt = "insert into s_diasolicitud values(".$idsolicitud.",".$iddia.")";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
    }
    
    
    
    
}
