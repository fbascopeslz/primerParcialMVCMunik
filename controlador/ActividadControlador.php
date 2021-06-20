<?php
require_once "../modelo/GestionMateriaModelo.php";
require_once "../modelo/TipoActividadModelo.php";
require_once "../modelo/ActividadModelo.php";
require_once "../vista/ActividadVista.php";

class ActividadControlador {
    // Properties
    public $gestionMateriaModelo;
    public $tipoActividadModelo;
    public $actividadModelo;
    public $actividadVista;

    public function __construct()
	{
        $this->gestionMateriaModelo = new GestionMateriaModelo();
        $this->tipoActividadModelo = new TipoActividadModelo();
        $this->actividadModelo = new ActividadModelo();
        $this->actividadVista = new ActividadVista();
	}    

    public function insertar($nombre, $documento, $gestionMateriaId, $tipoActividadId) 
    {
        date_default_timezone_set('America/La_Paz');
        $this->actividadModelo->setNombre($nombre);
        $this->actividadModelo->setFecha(date('Y-m-d'));
        $this->actividadModelo->setDocumento($documento);
        $this->actividadModelo->setGestionMateriaId($gestionMateriaId);
        $this->actividadModelo->setTipoactividadId($tipoActividadId);
        $rsptaModelo = $this->actividadModelo->insertar();
        
        $rsptaVista = $this->actividadVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idActividad, $nombre, $documento, $gestionMateriaId, $tipoActividadId) 
    {
        $this->actividadModelo->setIdActividad($idActividad);
        $this->actividadModelo->setNombre($nombre);
        $this->actividadModelo->setDocumento($documento);
        $this->actividadModelo->setGestionMateriaId($gestionMateriaId);
        $this->actividadModelo->setTipoactividadId($tipoActividadId);
        $rsptaModelo = $this->actividadModelo->editar();
        
        $rsptaVista = $this->actividadVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idActividad) 
    {
        $this->actividadModelo->setIdActividad($idActividad);
        $rsptaModelo = $this->actividadModelo->mostrar();
        
        $rsptaVista = $this->actividadVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->actividadModelo->listar();
        
        $rsptaVista = $this->actividadVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }     

    public function seleccionarGestionMateria() 
    {
        $rsptaModelo = $this->gestionMateriaModelo->listar();
        
        $this->actividadVista->seleccionarGestionMateria($rsptaModelo);                     
    }

    public function seleccionarTipoActividad() 
    {
        $rsptaModelo = $this->tipoActividadModelo->listar();
        
        $this->actividadVista->seleccionarTipoActividad($rsptaModelo);                     
    }
}


function uploadFile()
{            
    if (array_key_exists("documento", $_FILES))//(isset($_POST["documento2"])) 
    {                
        //http://localhost/primerParcialMVCMunik/public
        $target_dir = "documentos/";
        $target_file = $target_dir . basename($_FILES["documento"]["name"]);
        if (move_uploaded_file($_FILES["documento"]["tmp_name"], "../".$target_file)) 
        {
            return $target_file;
        } else {
            return "";
        }
    } else {
        return "";
    }        
}

$idActividad = isset($_POST["idActividad"]) ? limpiarCadena($_POST["idActividad"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
//$fecha = isset($_POST["fecha"]) ? limpiarCadena($_POST["fecha"]) : "";
$documento = uploadFile();
$gestionMateriaId = isset($_POST["gestionMateriaId"]) ? limpiarCadena($_POST["gestionMateriaId"]) : "";
$tipoActividadId = isset($_POST["tipoActividadId"]) ? limpiarCadena($_POST["tipoActividadId"]) : "";

$actividadControlador = new actividadControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idActividad)) {
			$actividadControlador->insertar($nombre, $documento, $gestionMateriaId, $tipoActividadId);
		} else {
			$actividadControlador->editar($idActividad, $nombre, $documento, $gestionMateriaId, $tipoActividadId);
		}				
	break;

	case 'mostrar':
		$actividadControlador->mostrar($idActividad);
	break;

	case 'listar':
		$actividadControlador->listar();
	break;

	case 'seleccionarGestionMateria':
		$actividadControlador->seleccionarGestionMateria();
	break;

    case 'seleccionarTipoActividad':
		$actividadControlador->seleccionarTipoActividad();
	break;
}

?>