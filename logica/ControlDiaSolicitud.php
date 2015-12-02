<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../DB/DiaSolicitudDAO.php';

class ControlDiaSolicitud{
    
    private $diaSolicitud;
    private $diaSolicitudDAO;
    
    public function __construct() {
        $this->diaSolicitudDAO=new DiaSolicitudDAO();
        
    }

    
     public function verDias(){       
        
        return $this->diaSolicitudDAO->verDias();
    }
    
    public function asignarDiaSolicitud($iddia,$idsolicitud){
        $this->diaSolicitudDAO->asignarDiaSolicitud($iddia,$idsolicitud);
    }
    
    
    
}