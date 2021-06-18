<?php
require_once "../modelo/CursoModelo.php";
require_once "../vista/CursoVista.php";

class CursoControlador {
    // Properties
    public $cursoModelo;
    public $cursoVista; 

    public function __construct()
	{
        $this->cursoModelo = new CursoModelo();
        $this->cursoVista = new CursoVista();
	}
  
    public function insertar($nombre, $paralelo, $descripcion) 
    {
        $this->cursoModelo->setNombre($nombre);
        $this->cursoModelo->setParalelo($paralelo);
        $this->cursoModelo->setDescripcion($descripcion);        
        $rsptaModelo = $this->cursoModelo->insertar();

        $rsptaVista = $this->cursoVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idcurso, $nombre, $paralelo, $descripcion) 
    {
        $this->cursoModelo->setIdcurso($idcurso);
        $this->cursoModelo->setNombre($nombre);
        $this->cursoModelo->setParalelo($paralelo);
        $this->cursoModelo->setDescripcion($descripcion);        
        $rsptaModelo = $this->cursoModelo->editar();

        $rsptaVista = $this->cursoVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idcurso) 
    {
        $this->cursoModelo->setIdcurso($idcurso);
        $rsptaModelo = $this->cursoModelo->mostrar();

        $rsptaVista = $this->cursoVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->cursoModelo->listar();

        $rsptaVista = $this->cursoVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }    
}


$idCurso = isset($_POST["idCurso"]) ? limpiarCadena($_POST["idCurso"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$paralelo = isset($_POST["paralelo"]) ? limpiarCadena($_POST["paralelo"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

$cursoControlador = new CursoControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idCurso)) {            
			$cursoControlador->insertar($nombre, $paralelo, $descripcion);
		} else {
			$cursoControlador->editar($idCurso, $nombre, $paralelo, $descripcion);
		}				
	break;

	case 'mostrar':
		$cursoControlador->mostrar($idCurso);
	break;

	case 'listar':
		$cursoControlador->listar();
	break;
}

?>