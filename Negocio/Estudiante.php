<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Estudiante{
    
    private $codigo_estudiante;
    private $documento_estudiante;
    private $matriculas_estudiante;
    private $activo_estudiante;
    private $carrera_estudiante;
    private $promedio_estudiante;
    private $aval_solicitud;
    
    public function __construct() {
        
    }
    
    function getCodigo_estudiante() {
        return $this->codigo_estudiante;
    }

    function getDocumento_estudiante() {
        return $this->documento_estudiante;
    }

    function getMatriculas_estudiante() {
        return $this->matriculas_estudiante;
    }

    function getActivo_estudiante() {
        return $this->activo_estudiante;
    }

    function getCarrera_estudiante() {
        return $this->carrera_estudiante;
    }

    function getPromedio_estudiante() {
        return $this->promedio_estudiante;
    }

    function getAval_solicitud() {
        return $this->aval_solicitud;
    }

    function setCodigo_estudiante($codigo_estudiante) {
        $this->codigo_estudiante = $codigo_estudiante;
    }

    function setDocumento_estudiante($documento_estudiante) {
        $this->documento_estudiante = $documento_estudiante;
    }

    function setMatriculas_estudiante($matriculas_estudiante) {
        $this->matriculas_estudiante = $matriculas_estudiante;
    }

    function setActivo_estudiante($activo_estudiante) {
        $this->activo_estudiante = $activo_estudiante;
    }

    function setCarrera_estudiante($carrera_estudiante) {
        $this->carrera_estudiante = $carrera_estudiante;
    }

    function setPromedio_estudiante($promedio_estudiante) {
        $this->promedio_estudiante = $promedio_estudiante;
    }

    function setAval_solicitud($aval_solicitud) {
        $this->aval_solicitud = $aval_solicitud;
    }


    
    
}