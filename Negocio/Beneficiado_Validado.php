<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Actividad_Beneficiario
 *
 * @author ANDREY
 */
class Beneficiado_Validado {
    //put your code here
    private $id_beneficiado;
    private $id_solicitud;
    private $id_funcionario;
    private $id_subsidio;

    public function getId_beneficiado() {
        return $this->id_beneficiado;
    }

    public function getId_solicitud() {
        return $this->id_solicitud;
    }

    public function getId_funcionario() {
        return $this->id_funcionario;
    }

    public function getId_subsidio() {
        return $this->id_subsidio;
    }

    public function setId_beneficiado($id_beneficiado) {
        $this->id_beneficiado = $id_beneficiado;
    }

    public function setId_solicitud($id_solicitud) {
        $this->id_solicitud = $id_solicitud;
    }

    public function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    public function setId_subsidio($id_subsidio) {
        $this->id_subsidio = $id_subsidio;
    }


  
    
}

?>
