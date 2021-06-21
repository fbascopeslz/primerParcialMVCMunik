<?php
require_once "../modelo/MateriaModelo.php";
require_once "../modelo/GestionMateriaModelo.php";
require_once "../modelo/ProfesorModelo.php";
require_once "../modelo/CursoModelo.php";
require_once "../vista/GestionVista.php";
require_once "../modelo/GestionModelo.php";

class GestionControlador {
    // Properties
    public $materiaModelo;
	public $gestionMateriaModelo;
    public $profesorModelo;
    public $cursoModelo;
    public $gestionVista;
    public $gestionModelo;  

    public function __construct()
	{
        $this->materiaModelo = new MateriaModelo();	
		$this->gestionMateriaModelo = new GestionMateriaModelo();
        $this->profesorModelo = new ProfesorModelo();
        $this->cursoModelo = new CursoModelo();
        $this->gestionVista = new GestionVista();
        $this->gestionModelo = new GestionModelo();
	}
  
    /*    
    public function editar($idGestion, $nombre, $indicaciones, $fechaVencimiento) 
    {
        $this->GestionDatos->setIdGestion($idGestion);
        $this->GestionDatos->setNombre($nombre);
        $this->GestionDatos->setIndicaciones($indicaciones);
        $this->GestionDatos->setFechaVencimiento($fechaVencimiento);
        $rspta = $this->GestionDatos->editar();
        return $rspta;
    }  
    
    public function mostrar($idGestion) 
    {
        $this->GestionDatos->setIdGestion($idGestion);
        $rspta = $this->GestionDatos->mostrar();
        return $rspta;
    }
*/

    public function listar() 
    {                   
        $rsptaModelo = $this->gestionModelo->listar();
        $rsptaVista = $this->gestionVista->listar($rsptaModelo);
        echo $rsptaVista;
    }

    public function insertar($nombre, $fechaInicio, $fechaFin, $profesorId, $arrayIdMaterias, $arrayIdCursos) 
    {                
        $rspta = null; 

        $this->gestionModelo->setNombre($nombre);
        $this->gestionModelo->setFechaInicio($fechaInicio);
        $this->gestionModelo->setFechaFin($fechaFin);
        $this->gestionModelo->setProfesorId($profesorId);
        $rspta = $this->gestionModelo->insertar();
        
        $idGestion = $rspta;

        for ($i=0; $i < count($arrayIdMaterias); $i++) { 
            $this->gestionMateriaModelo->setIdGestion($idGestion);
            $this->gestionMateriaModelo->setIdMateria($arrayIdMaterias[$i]);
            $this->gestionMateriaModelo->setIdCurso($arrayIdCursos[$i]);            
            $this->gestionMateriaModelo->insertar();
        }

        $rspta = $this->gestionVista->insertar($rspta);
        echo $rspta;
    }

    public function seleccionarProfesor() 
    {
        $rspta = $this->profesorModelo->listar();
        $this->gestionVista->seleccionarProfesor($rspta);
	}

	public function seleccionarMateria() 
    {		
        $rspta = $this->materiaModelo->listar();
        $this->gestionVista->seleccionarMateria($rspta);
	}
    
    public function seleccionarCurso() 
    {		
        $rspta = $this->cursoModelo->listar();
        $this->gestionVista->seleccionarCurso($rspta);
	}
	       
}


$gestionControlador = new GestionControlador();
switch ($_GET["op"]) 
{
    case 'listar':		
		$gestionControlador->listar();
	break;

	case 'insertar':		
		$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
        $fechaInicio = isset($_POST["fechaInicio"]) ? limpiarCadena($_POST["fechaInicio"]) : "";
        $fechaFin = isset($_POST["fechaFin"]) ? limpiarCadena($_POST["fechaFin"]) : "";
        $profesorId = isset($_POST["idProfesor"]) ? limpiarCadena($_POST["idProfesor"]) : "";        
		$arrayIdMaterias = $_POST["idsMaterias"];
		$arrayIdCursos = $_POST["idsCursos"];
		$gestionControlador->insertar($nombre, $fechaInicio, $fechaFin, $profesorId, $arrayIdMaterias, $arrayIdCursos);
	break;
	
    case 'seleccionarProfesor':
		$gestionControlador->seleccionarProfesor();
	break;

	case 'seleccionarMateria':
		$gestionControlador->seleccionarMateria();
	break;

    case 'seleccionarCurso':
		$gestionControlador->seleccionarCurso();
	break;
}

?>