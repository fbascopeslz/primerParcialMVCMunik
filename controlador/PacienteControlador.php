<?php
require_once "../modelo/PropietarioModelo.php";
require_once "../modelo/PacienteModelo.php";
require_once "../vista/PacienteVista.php";

class PacienteControlador {
    // Properties
    public $propietarioModelo;
    public $pacienteModelo;
    public $pacienteVista;

    public function __construct()
	{
        $this->propietarioModelo = new PropietarioModelo();
        $this->pacienteModelo = new PacienteModelo();
        $this->pacienteVista = new PacienteVista();
	}

    public function insertar($nombre, $sexo, $raza, $especie, $idPropietario) 
    {
        $this->pacienteModelo->setNombre($nombre);
        $this->pacienteModelo->setSexo($sexo);
        $this->pacienteModelo->setRaza($raza);
        $this->pacienteModelo->setEspecie($especie);
        $this->pacienteModelo->setIdPropietario($idPropietario);
        $rsptaModelo = $this->pacienteModelo->insertar();
        
        $rsptaVista = $this->pacienteVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idPaciente, $nombre, $sexo, $raza, $especie, $idPropietario) 
    {
        $this->pacienteModelo->setIdPaciente($idPaciente);
        $this->pacienteModelo->setNombre($nombre);
        $this->pacienteModelo->setSexo($sexo);
        $this->pacienteModelo->setRaza($raza);
        $this->pacienteModelo->setEspecie($especie);
        $this->pacienteModelo->setIdPropietario($idPropietario);
        $rsptaModelo = $this->pacienteModelo->editar();
        
        $rsptaVista = $this->pacienteVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idPaciente) 
    {
        $this->pacienteModelo->setIdPaciente($idPaciente);
        $rsptaModelo = $this->pacienteModelo->mostrar();
        
        $rsptaVista = $this->pacienteVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->pacienteModelo->listar();
        
        $rsptaVista = $this->pacienteVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    } 

    public function seleccionarPropietario() 
    {
        $rsptaModelo = $this->propietarioModelo->listar();
        
        $this->pacienteVista->seleccionarPropietario($rsptaModelo);                     
    } 
}



$idPaciente = isset($_POST["idPaciente"]) ? limpiarCadena($_POST["idPaciente"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$sexo = isset($_POST["sexo"]) ? limpiarCadena($_POST["sexo"]) : "";
$raza = isset($_POST["raza"]) ? limpiarCadena($_POST["raza"]) : "";
$especie = isset($_POST["especie"]) ? limpiarCadena($_POST["especie"]) : "";
$idPropietario = isset($_POST["idPropietario"]) ? limpiarCadena($_POST["idPropietario"]) : "";

$pacienteControlador = new PacienteControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idPaciente)) {
			$pacienteControlador->insertar($nombre, $sexo, $raza, $especie, $idPropietario);
		} else {
			$pacienteControlador->editar($idPaciente, $nombre, $sexo, $raza, $especie, $idPropietario);
		}				
	break;

	case 'mostrar':
		$pacienteControlador->mostrar($idPaciente);
	break;

	case 'listar':
		$pacienteControlador->listar();
	break;

	case 'seleccionarPropietario':
		$pacienteControlador->seleccionarPropietario();
	break;
}

?>