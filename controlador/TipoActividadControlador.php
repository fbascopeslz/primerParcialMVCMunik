<?php
require_once "../modelo/TipoActividadModelo.php";
require_once "../vista/TipoActividadVista.php";

class TipoActividadControlador {
    // Properties
    public $tipoActividadModelo;
    public $tipoActividadVista; 

    public function __construct()
	{
        $this->tipoActividadModelo = new TipoActividadModelo();
        $this->tipoActividadVista = new TipoActividadVista();
	}
  
    public function insertar($nombre, $descripcion) 
    {
        $this->tipoActividadModelo->setNombre($nombre);
        $this->tipoActividadModelo->setDescripcion($descripcion);        
        $rsptaModelo = $this->tipoActividadModelo->insertar();

        $rsptaVista = $this->tipoActividadVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idTipoActividad, $nombre, $descripcion) 
    {
        $this->tipoActividadModelo->setIdtipoActividad($idTipoActividad);
        $this->tipoActividadModelo->setNombre($nombre);
        $this->tipoActividadModelo->setDescripcion($descripcion);        
        $rsptaModelo = $this->tipoActividadModelo->editar();

        $rsptaVista = $this->tipoActividadVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idTipoActividad) 
    {
        $this->tipoActividadModelo->setIdtipoActividad($idTipoActividad);
        $rsptaModelo = $this->tipoActividadModelo->mostrar();

        $rsptaVista = $this->tipoActividadVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->tipoActividadModelo->listar();

        $rsptaVista = $this->tipoActividadVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }    
}


$idTipoActividad = isset($_POST["idTipoActividad"]) ? limpiarCadena($_POST["idTipoActividad"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

$tipoActividadControlador = new tipoActividadControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idTipoActividad)) {
			$tipoActividadControlador->insertar($nombre, $descripcion);
		} else {
			$tipoActividadControlador->editar($idTipoActividad, $nombre, $descripcion);
		}				
	break;

	case 'mostrar':
		$tipoActividadControlador->mostrar($idTipoActividad);
	break;

	case 'listar':
		$tipoActividadControlador->listar();
	break;
}

?>