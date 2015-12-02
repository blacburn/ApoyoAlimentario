<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dia_tiquetera
 *
 * @author ANDREY
 */
class DiaSolicitud {
    //put your code here
    private $id_dia;
    private $solicitud;
    private $nombre_dia;
    public function getId_dia() {
        return $this->id_dia;
    }

    public function getSolicitud() {
        return $this->solicitud;
    }

    public function getNombre_dia() {
        return $this->nombre_dia;
    }

    public function setId_dia($id_dia) {
        $this->id_dia = $id_dia;
    }

    public function setSolicitud($solicitud) {
        $this->solicitud = $solicitud;
    }

    public function setNombre_dia($nombre_dia) {
        $this->nombre_dia = $nombre_dia;
    }
}    