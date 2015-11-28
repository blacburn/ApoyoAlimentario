<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacultadDAO
 *
 * @author ANDREY
 */

include '../Negocio/Facultad.php';

class FacultadDAO {
    //put your code here
    
    public function __construct() {
        
    }

    public function crearFacultad($facultad){
       // $facultad =new Facultad();
       //$facultad->getNombre_facultad();
       //$conn = new ConexionDB("apoyo_alimentario", "apoyo_alimentario");
       // $conn->conectarDB();
       //session_start();
        //$se=$conn->getConn();
        //echo $_SESSION['sesion_logueado'];
        $sqltxt="insert into s_facultad values(SQ_IDFACULTAD.nextval,'".$facultad->getNombre_facultad()."')";
            $stid = oci_parse($_SESSION['sesion_logueado'],$sqltxt);
            oci_execute($stid);   
    }
    public function eliminarFacultad($id_facultad){
        $sqltxt="delete FROM s_facultad where k_idfacultad=".$id_facultad."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        
        
    }
    public function modificarFacultad($facultad){
        $sqltxt="update s_facultad set s_nomfacultad='".$facultad->getNombre_facultad()."' where k_idfacultad=".$facultad->getId_facultad()."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        
        
    }
    
     public function buscarFacultad($id_facultad){
         $facultad = new Facultad();
        $sqltxt = "select * from s_facultad where k_idfacultad = ".$id_facultad."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {
            $facultad->setIdfacultad(oci_result($stid, 'K_IDFACULTAD'));
            $facultad->setNombre_facultad(oci_result($stid, 'N_NOMFACULTAD'));
          
        }
        //echo $persona->getApellido_persona();
        return $facultad;
    }
    
    public function verFacultades(){        
        $facultades = array();
        $i=0;
        //$facultades=new ArrayObject($array);
        $sqltxt = "select * from s_facultad";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch_array($stid)) {
            $facultad = new Facultad();
            $facultad->setIdfacultad(oci_result($stid, 'K_IDFACULTAD'));
            $facultad->setNombre_facultad(oci_result($stid, 'N_NOMFACULTAD'));
            $facultades[$i]=$facultad;
            //echo $facultades[$i]->getNombre_facultad();
            $i+=1;
        }        
        return $facultades;
    }
}
