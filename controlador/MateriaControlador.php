<?php
require_once "../modelo/MateriaModelo.php";
require_once "../vista/MateriaVista.php";

class MateriaControlador {
    // Properties
    public $materiaModelo;
    public $materiaVista; 

    public function __construct()
	{
        $this->materiaModelo = new MateriaModelo();
        $this->materiaVista = new MateriaVista();
	}
  
    public function insertar($nombre) 
    {
        $this->materiaModelo->setNombre($nombre);          
        $rsptaModelo = $this->materiaModelo->insertar();

        $rsptaVista = $this->materiaVista->insertar($rsptaModelo);
        
        echo $rsptaVista;
    }

    public function editar($idMateria, $nombre) 
    {
        $this->materiaModelo->setIdMateria($idMateria);
        $this->materiaModelo->setNombre($nombre);             
        $rsptaModelo = $this->materiaModelo->editar();

        $rsptaVista = $this->materiaVista->editar($rsptaModelo);

        echo $rsptaVista;
    }  
    
    public function mostrar($idMateria) 
    {
        $this->materiaModelo->setIdmateria($idMateria);
        $rsptaModelo = $this->materiaModelo->mostrar();

        $rsptaVista = $this->materiaVista->mostrar($rsptaModelo);

        echo $rsptaVista;
    }

    public function listar() 
    {
        $rsptaModelo = $this->materiaModelo->listar();

        $rsptaVista = $this->materiaVista->listar($rsptaModelo);
        
        echo $rsptaVista;
    }    
}


$idMateria = isset($_POST["idMateria"]) ? limpiarCadena($_POST["idMateria"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";

$materiaControlador = new materiaControlador();
switch ($_GET["op"]) 
{
	case 'guardaryeditar':		
		if (empty($idMateria)) {            
			$materiaControlador->insertar($nombre);
		} else {
			$materiaControlador->editar($idMateria, $nombre);
		}				
	break;

	case 'mostrar':
		$materiaControlador->mostrar($idMateria);
	break;

	case 'listar':
		$materiaControlador->listar();
	break;
}

?>