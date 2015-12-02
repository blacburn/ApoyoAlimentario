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
include '../Negocio/Persona.php';
//include '../Negocio/Solicitud.php';
class BeneficiadoValidadoDAO {
    //put your code here
    
    public function __construct() {
        
    }

    public function verBeneficiadoValidado(){
        //$condicionxsolicitud=new CondicionxSolicitud();
        $beneficiados = array();
        $i=0;
        $sqltxt = "SELECT n_nomper, n_apeper, n_correo FROM s_BeneficiarioValidado B, s_Solicitud S, s_Estudiante E, s_Persona P WHERE B.k_idsolicitud = S.k_idsolicitud AND S.k_estudiante = E.k_codigo_est AND E.k_documento = P.k_documento";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $persona = new Persona();
            $persona->setNombre_persona(oci_result($stid, 'N_NOMPER'));
            $persona->setApellido_persona(oci_result($stid, 'N_APEPER'));
            $persona->setCorreo_persona(oci_result($stid, 'N_CORREO'));
            $beneficiados[$i]=$persona;
            $i+=1;
        }  
        return $beneficiados;
    }
    
   
    
}