<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SolicitudDAO
 *
 * @author ANDREY
 */
include '../Negocio/Solicitud.php';
class SolicitudDAO {
    //put your code here
    public function __construct() {
        
    }
    public function buscarSolicitudxId($id_solicitud) {
        
        $solicitud = new Solicitud();
        $sqltxt = "select * from s_solicitud where k_idsolicitud = ".$id_solicitud."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $solicitud->setId_solicitud(oci_result($stid, 'K_IDSOLICITUD'));
            $solicitud->setCodigo_estudiante(oci_result($stid, 'K_ESTUDIANTE'));
            $solicitud->setId_convocatoria(oci_result($stid, 'K_CONVOCATORIA'));
            $solicitud->setPuntaje(oci_result($stid, 'C_PUNTAJE'));
            $solicitud->setVal_solicitud(oci_result($stid, 'N_VALSOLICITUD'));
        }
        //echo $persona->getApellido_persona();
        return $solicitud;
    }
    
//    public function buscarSolicitudxFacultad($id_facultad) {
//        
//        $solicitud = new Solicitud();
//        $sqltxt = "select * from s_solicitud where id_facultad = ".$id_facultad."";
//        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
//        oci_execute($stid);
//        while(oci_fetch($stid)) {
//            $solicitud->setCodigo_estudiante(oci_result($stid, 'CODIGO'));
//            $solicitud->setId_convocatoria(oci_result($stid, 'ID_CONVOCATORIA'));
//            $solicitud->setId_facultad(oci_result($stid, 'ID_FACULTAD'));
//            $solicitud->setSoportes_solicitud(oci_result($stid, 'SOPORTES'));
//        }
//        //echo $persona->getApellido_persona();
//        return $solicitud;
//    }
    
    public function buscarSolicitudes(){
        $solicitudes=array();
        $i=0;
        $sqltxt = "select * from s_solicitud";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $solicitud = new Solicitud();
            $solicitud->setId_solicitud(oci_result($stid, 'K_IDSOLICITUD'));
            $solicitud->setCodigo_estudiante(oci_result($stid, 'K_ESTUDIANTE'));
            $solicitud->setId_convocatoria(oci_result($stid, 'K_CONVOCATORIA'));
            $solicitud->setPuntaje(oci_result($stid, 'C_PUNTAJE'));
            $solicitud->setVal_solicitud(oci_result($stid, 'N_VALSOLICITUD'));
            $solicitudes[$i]=$solicitud;
            $i+=1;
        }  
        return $solicitudes;
    }

    public function buscarIdSolicitud($idestu, $idconvoc){
         $idsol;       
        $sqltxt = "select k_idsolicitud from s_solicitud where k_estudiante = '".$idestu."' and k_convocatoria =".$idconvoc;
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $idsol=oci_result($stid, 'K_IDSOLICITUD');            
        }
        return $idsol;
        
    }

    public function CrearSolicitud($solicitud) {
//        $solicitud=NEW Solicitud();
        $sqltx="insert into s_solicitud values(SQ_IDSOLICITUD.nextval,'".$solicitud->getCodigo_estudiante()."',".$solicitud->getId_convocatoria().",NULL,'".$solicitud->getVal_solicitud()."')";
        echo $sqltx;
        $stmt = oci_parse($_SESSION['sesion_logueado'],$sqltx);
        oci_execute($stmt);
               
    }
    
     public function modificarSolicitud($solicitud) {
//         $solicitud=NEW Solicitud();
        $sqltxt="update s_solicitud set k_estudiante=".$solicitud->getCodigo_estudiante().",k_convocatoria=".$solicitud->getId_convocatoria().",c_puntaje=".$solicitud->getPuntaje().",n_valsolicitud=".$solicitud->getVal_solicitud()." where k_idsolicitud=".$solicitud->getId_solicitud()."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
    }
    
     public function eliminarSolicitud($id_solicitud) {
        $sqltxt="delete FROM s_solicitud where k_idsolicitud=".$id_solicitud."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
    }
}

?>
