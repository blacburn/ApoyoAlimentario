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
include '../Negocio/CondicionxSolicitud.php';
//include '../Negocio/Solicitud.php';
class CondicionxSolicitudDAO {
    //put your code here
    
    public function __construct() {
        
    }

    public function crearCondicionxSolicitud($condicionxsolicitud){
        //$condicionxsolicitud=new CondicionxSolicitud();
        
        $sqltxt="insert into s_CondicionSolicitud values(".$condicionxsolicitud->getId_condicion().",".$condicionxsolicitud->getId_solicitud().",'".
                $condicionxsolicitud->getDescripcion()."','".$condicionxsolicitud->getSoportes_solicitud()."','".$condicionxsolicitud->getValidado()."')";
        //echo $sqltxt;
        $stid = oci_parse($_SESSION['sesion_logueado'],$sqltxt);
        oci_execute($stid);
        
    }
    
    public function verTipoCondicionxSolicitud($idcond){
        
        $idtipo;
        $sqltxt="select t_condicion from s_condicion_se where k_idcondicion = ".$idcond;
        $stid = oci_parse($_SESSION['sesion_logueado'],$sqltxt);        
        oci_execute($stid);
        
          while(oci_fetch($stid)) {
              $idtipo=oci_result($stid, 'T_CONDICION');
          }
          return $idtipo;
    }


    public function verCondicionxSolicitudxSolicitud($solicitud){
        
        $condiciones = array();
        //$solicitud=new Solicitud();
        $i=0;
        //$facultades=new ArrayObject($array);
        $sqltxt = "select * from s_condicionsolicitud where k_solicitud =".$solicitud->getId_solicitud();
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch_array($stid)) {
            $condicionxsolicitud = new CondicionxSolicitud();
            $condicionxsolicitud->setId_condicion(oci_result($stid, 'K_CONDICION'));
            $condicionxsolicitud->setId_solicitud(oci_result($stid, 'K_SOLICITUD'));            
            $condicionxsolicitud->setDescripcion(oci_result($stid, 'N_DESCRIPCION'));
            $condicionxsolicitud->setSoportes_solicitud(oci_result($stid, 'N_SOPORTE'));
            $condicionxsolicitud->setValidado(oci_result($stid, 'N_VALIDADO'));


            $condiciones[$i]=$condicionxsolicitud;
            //echo $facultades[$i]->getNombre_facultad();
            $i+=1;
        }        
        return $condiciones;
        
        
    }
    
    
    
}
