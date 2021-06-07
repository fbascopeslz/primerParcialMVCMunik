<?php
require_once "../modelo/VacunaModelo.php";
require_once "../vista/VacunaVista.php";

class VacunaControlador {
    // Properties
    public $vacunaModelo;
    public $vacunaVista; 

    public function __construct()
	{
        $this->vacunaModelo = new VacunaModelo();
        $this->vacunaVista = new VacunaVista();
	}
  
    public function insertar($nombre, $indicaciones, $fechaVencimiento) 
    {
        $this->vacunaModelo->setNombre($nombre);
        $this->vacunaModelo->setIndicaciones($indicaciones);
        $this->vacunaModelo->setFechaVencimiento($fechaVencimiento);
        $rsptaModelo = $this->vacunaModelo->insertar();

        $rsptaVista = $this->vacunaVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idVacuna, $nombre, $indicaciones, $fechaVencimiento) 
    {
        $this->vacunaModelo->setIdVacuna($idVacuna);
        $this->vacunaModelo->setNombre($nombre);
        $this->vacunaModelo->setIndicaciones($indicaciones);
        $this->vacunaModelo->setFechaVencimiento($fechaVencimiento);        
        $rsptaModelo = $this->vacunaModelo->editar();

        $rsptaVista = $this->vacunaVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idVacuna) 
    {
        $this->vacunaModelo->setIdVacuna($idVacuna);
        $rsptaModelo = $this->vacunaModelo->mostrar();

        $rsptaVista = $this->vacunaVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->vacunaModelo->listar();

        $rsptaVista = $this->vacunaVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }    
}


$idVacuna = isset($_POST["idVacuna"]) ? limpiarCadena($_POST["idVacuna"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$indicaciones = isset($_POST["indicaciones"]) ? limpiarCadena($_POST["indicaciones"]) : "";
$fechaVencimiento = isset($_POST["fechaVencimiento"]) ? limpiarCadena($_POST["fechaVencimiento"]) : "";

$vacunaControlador = new VacunaControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idVacuna)) {
			$vacunaControlador->insertar($nombre, $indicaciones, $fechaVencimiento);
		} else {
			$vacunaControlador->editar($idVacuna, $nombre, $indicaciones, $fechaVencimiento);
		}				
	break;

	case 'mostrar':
		$vacunaControlador->mostrar($idVacuna);
	break;

	case 'listar':
		$vacunaControlador->listar();
	break;
}

?>