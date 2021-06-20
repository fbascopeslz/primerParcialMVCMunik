<?php
require_once "../modelo/ProfesorModelo.php";
require_once "../vista/ProfesorVista.php";

class ProfesorControlador {
    // Properties
    public $profesorModelo;
    public $profesorVista; 

    public function __construct()
	{
        $this->profesorModelo = new ProfesorModelo();
        $this->profesorVista = new ProfesorVista();
	}
  
    public function insertar($nombre, 
                            $apellido, 
                            $ci,
                            $sexo,
                            $direccion,
                            $telefono,
                            $correo,
                            $password) 
    {
        $this->profesorModelo->setNombre($nombre);
        $this->profesorModelo->setApellido($apellido);
        $this->profesorModelo->setCi($ci);        
        $this->profesorModelo->setSexo($sexo);        
        $this->profesorModelo->setDireccion($direccion);     
        $this->profesorModelo->setTelefono($telefono);        
        $this->profesorModelo->setCorreo($correo);        
        $this->profesorModelo->setPassword($password);        
        $rsptaModelo = $this->profesorModelo->insertar();

        $rsptaVista = $this->profesorVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idProfesor,
                            $nombre, 
                            $apellido, 
                            $ci,
                            $sexo,
                            $direccion,
                            $telefono,
                            $correo,
                            $password) 
    {
        $this->profesorModelo->setIdProfesor($idProfesor);
        $this->profesorModelo->setNombre($nombre);
        $this->profesorModelo->setApellido($apellido);
        $this->profesorModelo->setCi($ci);        
        $this->profesorModelo->setSexo($sexo);        
        $this->profesorModelo->setDireccion($direccion);     
        $this->profesorModelo->setTelefono($telefono);        
        $this->profesorModelo->setCorreo($correo);        
        $this->profesorModelo->setPassword($password);        
        $rsptaModelo = $this->profesorModelo->editar();

        $rsptaVista = $this->profesorVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idProfesor) 
    {
        $this->profesorModelo->setIdprofesor($idProfesor);
        $rsptaModelo = $this->profesorModelo->mostrar();

        $rsptaVista = $this->profesorVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->profesorModelo->listar();

        $rsptaVista = $this->profesorVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }    
}


$idProfesor = isset($_POST["idProfesor"]) ? limpiarCadena($_POST["idProfesor"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$apellido = isset($_POST["apellido"]) ? limpiarCadena($_POST["apellido"]) : "";
$ci = isset($_POST["ci"]) ? limpiarCadena($_POST["ci"]) : "";
$sexo = isset($_POST["sexo"]) ? limpiarCadena($_POST["sexo"]) : "";
$direccion = isset($_POST["direccion"]) ? limpiarCadena($_POST["direccion"]) : "";
$telefono = isset($_POST["telefono"]) ? limpiarCadena($_POST["telefono"]) : "";
$correo = isset($_POST["correo"]) ? limpiarCadena($_POST["correo"]) : "";
$password = isset($_POST["password"]) ? limpiarCadena($_POST["password"]) : "";

$profesorControlador = new profesorControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idProfesor)) {            
			$profesorControlador->insertar($nombre, 
                                            $apellido, 
                                            $ci,
                                            $sexo,
                                            $direccion,
                                            $telefono,
                                            $correo,
                                            $password);
		} else {
			$profesorControlador->editar($idProfesor,
                                        $nombre, 
                                        $apellido, 
                                        $ci,
                                        $sexo,
                                        $direccion,
                                        $telefono,
                                        $correo,
                                        $password);
		}				
	break;

	case 'mostrar':
		$profesorControlador->mostrar($idProfesor);
	break;

	case 'listar':
		$profesorControlador->listar();
	break;
}

?>