<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../DB/FuncionarioDAO.php';

class ControlFuncionario{
    
    private $funcionario;
    private $funcionarioDAO;
    
    public function __construct() {
        $this->funcionarioDAO=new FuncionarioDAO();
    }
    
    public function crearFuncionario($id_funcionario,$documento_funcionario,$cargo_funcionario){
//        $funcionario=  $this->funcionario;
        $funcionario= new Funcionario();
        $funcionario->setId_funcionario($id_funcionario);
        $funcionario->setDocumento_funcionario($documento_funcionario);
        $funcionario->setCargo_funcionario($cargo_funcionario);
        
    }
    public function buscarFuncionarioDocumento($documento){
         return $this->funcionarioDAO->buscarFuncionarioxDocumento($documento);
    }
    
    
    
    
}