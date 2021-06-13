<?php
require_once "../modelo/PropietarioModelo.php";
require_once "../modelo/PacienteModelo.php";
require_once "../modelo/VacunaModelo.php";
require_once "../vista/CartillaVacunacionVista.php";
require_once "../modelo/CartillaVacunacionModelo.php";

class CartillaVacunacionControlador {
    // Properties
    public $propietarioModelo;
	public $pacienteModelo;
    public $vacunaModelo;
    public $cartillaVacunacionVista;
    public $cartillaVacunacionModelo;  

    public function __construct()
	{
        $this->propietarioModelo = new PropietarioModelo();	
		$this->pacienteModelo = new PacienteModelo();
        $this->vacunaModelo = new VacunaModelo();
        $this->cartillaVacunacionVista = new CartillaVacunacionVista();
        $this->cartillaVacunacionModelo = new CartillaVacunacionModelo();
	}
  
    /*
    

    public function editar($idcartillaVacunacion, $nombre, $indicaciones, $fechaVencimiento) 
    {
        $this->cartillaVacunacionDatos->setIdcartillaVacunacion($idcartillaVacunacion);
        $this->cartillaVacunacionDatos->setNombre($nombre);
        $this->cartillaVacunacionDatos->setIndicaciones($indicaciones);
        $this->cartillaVacunacionDatos->setFechaVencimiento($fechaVencimiento);
        $rspta = $this->cartillaVacunacionDatos->editar();
        return $rspta;
    }  
    
    public function mostrar($idcartillaVacunacion) 
    {
        $this->cartillaVacunacionDatos->setIdcartillaVacunacion($idcartillaVacunacion);
        $rspta = $this->cartillaVacunacionDatos->mostrar();
        return $rspta;
    }
*/

    public function insertar($idPaciente, $arrayIdVacunas, $arrayFechaProximaVacuna) 
    {
        //set Timezone PHP
        date_default_timezone_set('America/La_Paz');
        
        $rspta = null;        

        for ($i=0; $i < count($arrayIdVacunas); $i++) { 
            $this->cartillaVacunacionModelo->setIdVacuna($arrayIdVacunas[$i]);
            $this->cartillaVacunacionModelo->setIdPaciente($idPaciente);
            $this->cartillaVacunacionModelo->setFechaVacuna(date('Y-m-d')); //Fecha actual
            $this->cartillaVacunacionModelo->setFechaProximaVacuna($arrayFechaProximaVacuna[$i]);
            $rspta = $this->cartillaVacunacionModelo->insertar();
        }

        $rspta = $this->cartillaVacunacionVista->insertar($rspta);
        echo $rspta;
    }

    public function seleccionarPropietario() 
    {
        $rspta = $this->propietarioModelo->listar();
        $this->cartillaVacunacionVista->seleccionarPropietario($rspta);
	}

	public function seleccionarPaciente($idPropietario) 
    {		
        $rspta = $this->pacienteModelo->seleccionarPaciente($idPropietario);
        $this->cartillaVacunacionVista->seleccionarPaciente($rspta);
	}

	public function seleccionarVacuna($idPaciente) 
    {
		$rspta = $this->vacunaModelo->seleccionarVacuna($idPaciente);
        $this->cartillaVacunacionVista->seleccionarVacuna($rspta);		
	}

    public function listar($idPaciente) 
    {           
        $this->cartillaVacunacionModelo->setIdPaciente($idPaciente);
        $rsptaModelo = $this->cartillaVacunacionModelo->listar();
        $rsptaVista = $this->cartillaVacunacionVista->listar($rsptaModelo);
        echo $rsptaVista;
    }    
}


$cartillaVacunacionControlador = new CartillaVacunacionControlador();
switch ($_GET["op"]) 
{
	case 'insertar':		
		$idPaciente = isset($_GET["idPaciente"]) ? limpiarCadena($_GET["idPaciente"]) : "";
		$arrayIdVacunas = $_POST["idVacuna"];
		$arrayFechaProximaVacuna = $_POST["fechaProximaVacuna"];
		$cartillaVacunacionControlador->insertar($idPaciente, $arrayIdVacunas, $arrayFechaProximaVacuna);
	break;

	case 'listar':
		$idPaciente = isset($_GET["idPaciente"]) ? limpiarCadena($_GET["idPaciente"]) : "";
		$cartillaVacunacionControlador->listar($idPaciente);
	break;

	case 'seleccionarPropietario':
		$cartillaVacunacionControlador->seleccionarPropietario();
	break;

	case 'seleccionarPaciente':
		$idPropietario = isset($_GET["idPropietario"]) ? limpiarCadena($_GET["idPropietario"]) : "";		
		$cartillaVacunacionControlador->seleccionarPaciente($idPropietario);
	break;

	case 'seleccionarVacuna':
		$idPaciente = isset($_GET["idPaciente"]) ? limpiarCadena($_GET["idPaciente"]) : "";		
		$cartillaVacunacionControlador->seleccionarVacuna($idPaciente);
	break;

}

?>