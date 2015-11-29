<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../DB/SolicitudDAO.php';
class ControlSolicitud{
    private $solicitud;
    private $solicitudDAO;
    
    public function __construct() {
        $this->solicitudDAO=new SolicitudDAO();       
    }
    
    function CrearSolicitud($id_estudiante,$id_convocatoria){//,$puntaje,$val_solicitud){
        $this->solicitud = new Solicitud();
        //$this->solicitud->setId_solicitud($id_solicitud);
        $this->solicitud->setCodigo_estudiante($id_estudiante);
        $this->solicitud->setId_convocatoria($id_convocatoria);
        //$this->solicitud->setPuntaje($puntaje);
        $this->solicitud->setVal_solicitud("NO");
        
        $this->solicitudDAO->crearSolicitud($this->solicitud); 
    }
    
    public function buscarSolicitudxId($id_solicitud){
        return $this->solicitudDAO->buscarSolicitudxId($id_solicitud);      
    }
    
//    public function buscarSolicitudxFacultad($id_facultad){
//        return $this->solicitudDAO->buscarSolicitudxFacultad($id_facultad);      
//    }
    
    public function verSolicitudes(){
        return $this->solicitudDAO->buscarSolicitudes();
    }
            
      function modificarSolicitud($id_solicitud,$id_estudiante,$id_convocatoria,$puntaje,$val_solicitud){
        $this->solicitud = new Solicitud();
        $this->solicitud->setId_solicitud($id_solicitud);
        $this->solicitud->setCodigo_estudiante($id_estudiante);
        $this->solicitud->setId_convocatoria($id_convocatoria);
        $this->solicitud->setPuntaje($puntaje);
        $this->solicitud->setVal_solicitud($val_solicitud);
        $this->solicitudDAO->modificarSolicitud($this->solicitud); 
    }  
     public function eliminarSolicitud($id_solicitud){
        return $this->solicitudDAO->eliminarSolicitud($id_solicitud);      
    }
    
}