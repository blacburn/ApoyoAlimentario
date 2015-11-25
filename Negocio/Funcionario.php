<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Funcionario{
    private $id_funcionario;
    private $documento_funcionario;
    private $cargo_funcionario;
    
    public function __construct() {
        
    }

    public function getId_funcionario() {
        return $this->id_funcionario;
    }

    public function getDocumento_funcionario() {
        return $this->documento_funcionario;
    }

    public function getCargo_funcionario() {
        return $this->cargo_funcionario;
    }

    public function setId_funcionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    public function setDocumento_funcionario($documento_funcionario) {
        $this->documento_funcionario = $documento_funcionario;
    }

    public function setCargo_funcionario($cargo_funcionario) {
        $this->cargo_funcionario = $cargo_funcionario;
    }




    
    
    
}