<?php
include '../DB/BeneficiadoValidadoDAO.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControlBeneficiadoValidado
 *
 * @author ANDREY
 */
class ControlBeneficiadoValidado {
    //put your code here
     
    private $beneficiado_validado;
    private $beneficiado_validadoDAO;
    
    public function __construct() {
        $this->beneficiado_validadoDAO=new BeneficiadoValidadoDAO();        
    }
    
 


    public function verBeneficiadoValidado(){
          
          return $this->beneficiado_validadoDAO->verBeneficiadoValidado();
      }
      
    
}
