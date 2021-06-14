<?php
require_once "../modelo/PropietarioModelo.php";

class PropietarioControlador {
    // Properties
    public $propietarioModelo;    

    public function __construct()
	{
        $this->propietarioModelo = new PropietarioModelo();
	}
  
    public function insertar($nombre, $ci, $telefono, $email) 
    {
        //set Timezone PHP
        date_default_timezone_set('America/La_Paz');
        
        $this->propietarioModelo->setNombre($nombre);
        $this->propietarioModelo->setCi($ci);
        $this->propietarioModelo->setTelefono($telefono);
        $this->propietarioModelo->setEmail($email);
        $this->propietarioModelo->setFechaUnion(date('Y-m-d'));    
        $rspta = $this->propietarioModelo->insertar();
        return $rspta;
    }

    public function editar($idPropietario, $nombre, $ci, $telefono, $email, $idPersona) 
    {
        $this->propietarioModelo->setIdPropietario($idPropietario);
        $this->propietarioModelo->setNombre($nombre);
        $this->propietarioModelo->setCi($ci);
        $this->propietarioModelo->setTelefono($telefono);
        $this->propietarioModelo->setEmail($email);
        $this->propietarioModelo->setIdPersona($idPersona);
        $rspta = $this->propietarioModelo->editar();
        return $rspta;
    }  
    
    public function mostrar($idPropietario) 
    {
        $this->propietarioModelo->setIdPropietario($idPropietario);
        $rspta = $this->propietarioModelo->mostrar();
        return $rspta;
    }

    public function listar() 
    {
        $rspta = $this->propietarioModelo->listar();
        return $rspta;
    }    
}

?>