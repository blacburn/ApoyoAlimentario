<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlxSolicitudDAO
 *
 * @author Sptn2
 */
include '../Negocio/Beneficiado_Validado.php';
//include '../Negocio/Solicitud.php';
class BeneficiadoValidadoDAO {
    //put your code here
    
    public function __construct() {
        
    }

    public function verBeneficiadoValidado(){
        //$condicionxsolicitud=new CondicionxSolicitud();
        
        $sqltxt="insert into s_CondicionSolicitud values(".$condicionxsolicitud->getId_condicion().",".$condicionxsolicitud->getId_solicitud().",'".
                $condicionxsolicitud->getDescripcion()."','".$condicionxsolicitud->getSoportes_solicitud()."','".$condicionxsolicitud->getValidado()."')";
        //echo $sqltxt;
        $stid = oci_parse($_SESSION['sesion_logueado'],$sqltxt);
        oci_execute($stid);
        
    }
    
   
    
}