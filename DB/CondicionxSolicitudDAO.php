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
        
        $sqltxt="insert into s_CondicionxSolicitud values(".$condicionxsolicitud->getId_condicion().",'".$condicionxsolicitud->getCodigo_est()."',".
                $condicionxsolicitud->getId_convocatoria().",'".$condicionxsolicitud->getDescripcion()."')";
        //echo $sqltxt;
        $stid = oci_parse($_SESSION['sesion_logueado'],$sqltxt);
        oci_execute($stid);
        
    }
    
    public function verCondicionxSolicitudxSolicitud($solicitud){
        
        $condiciones = array();
        //$solicitud=new Solicitud();
        $i=0;
        //$facultades=new ArrayObject($array);
        $sqltxt = "select * from s_condicionxsolicitud where codigo_est ='".$solicitud->getCodigo_estudiante().
                "' and id_convocatoria=".$solicitud->getId_convocatoria();
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch_array($stid)) {
            $condicionxsolicitud = new CondicionxSolicitud();
            $condicionxsolicitud->setCodigo_est(oci_result($stid, 'CODIGO_EST'));
            $condicionxsolicitud->setId_condicion(oci_result($stid, 'ID_CONDICION'));
            $condicionxsolicitud->setId_convocatoria(oci_result($stid, 'ID_CONVOCATORIA'));
            $condicionxsolicitud->setDescripcion(oci_result($stid, 'DESCRIPCION'));


            $condiciones[$i]=$condicionxsolicitud;
            //echo $facultades[$i]->getNombre_facultad();
            $i+=1;
        }        
        return $condiciones;
        
        
    }
    
    
    
}
