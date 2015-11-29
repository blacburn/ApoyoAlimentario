<?php


include '../DB/CondicionxSolicitudDAO.php';
//include '../Negocio/CondicionxSolicitud.php';



class ControlCondicionxSolicitud {
    //put your code here
    
    private $condicionxsolicitud;
    private $condicionxsolicitudDAO;
    
    public function __construct() {
        $this->condicionxsolicitudDAO=new CondicionxSolicitudDAO();        
    }
    
    public function crearCondicionxSolicitud($id_condicion,$id_solicitud,$descripcion,$soportes_solicitud,$validado){
        $this->condicionxsolicitud = new CondicionxSolicitud();
        $this->condicionxsolicitud->setId_condicion($id_condicion);
        $this->condicionxsolicitud->setId_solicitud($id_solicitud);
        $this->condicionxsolicitud->setDescripcion($descripcion);        
        $this->condicionxsolicitud->setSoportes_solicitud($soportes_solicitud);
        $this->condicionxsolicitud->setValidado($validado);        
        
        $this->condicionxsolicitudDAO->crearCondicionxSolicitud($this->condicionxsolicitud);        
        
    }
    
    public function verTipoCondicionxSolicitud($idcond){
        return $this->condicionxsolicitudDAO->verTipoCondicionxSolicitud($idcond);
    }


    public function verCondicionxSolicitudxSolicitud($solicitud){
          
          return $this->condicionxsolicitudDAO->verCondicionxSolicitudxSolicitud($solicitud);
      }
            

    
    
    
}
