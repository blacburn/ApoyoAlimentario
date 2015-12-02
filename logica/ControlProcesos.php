<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlProcesos
 *
 * @author Sptn2
 */
include '../DB/ProcesosDAO.php';

class ControlProcesos {

    //put your code here

    private $procesoDAO;

    public function __construct() {
        $this->procesoDAO = new ProcesosDAO();
    }

    public function ejecutarAsignacionPuntaje() {

        $this->procesoDAO->ejecutarAsignacionPuntaje();
    }

    public function ejecutarValidarSolicitudes() {

        $this->procesoDAO->ejecutarValidarSolicitudes();
    }

    public function ejecutarAsignarBeneficiados() {

        $this->procesoDAO->ejecutarAsignarBeneficiados();
    }

}
