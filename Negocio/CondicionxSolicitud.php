<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Condicion_Solicitud
 *
 * @author ANDREY
 */
class CondicionxSolicitud {
    //put your code here
    
    private $id_condicion;
    private $id_solicitud;
    private $descripcion;
    private $soportes_solicitud;
    private $validado;

    
    public function __construct() {
        
    }

    public function getId_condicion() {
        return $this->id_condicion;
    }

    public function getId_solicitud() {
        return $this->id_solicitud;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getSoportes_solicitud() {
        return $this->soportes_solicitud;
    }

    public function getValidado() {
        return $this->validado;
    }

    public function setId_condicion($id_condicion) {
        $this->id_condicion = $id_condicion;
    }

    public function setId_solicitud($id_solicitud) {
        $this->id_solicitud = $id_solicitud;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setSoportes_solicitud($soportes_solicitud) {
        $this->soportes_solicitud = $soportes_solicitud;
    }

    public function setValidado($validado) {
        $this->validado = $validado;
    }




}

?>
