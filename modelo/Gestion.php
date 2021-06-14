<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class GestionModelo
{
	public $idGestion;
	public $nombre;
	public $fecha_inicio;
	public $fecha_fin;
	public $idProfesor;

	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdGestion()
	{
		return $this->idGestion;
	}

	public function setIdGestion($idGestion)
	{
		$this->idGestion = $idGestion;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getFecha_inicio()
	{
		return $this->fecha_inicio;
	}

	public function setFecha_inicio($fecha_inicio)
	{
		$this->fecha_inicio = $fecha_inicio;
	}

	public function getFecha_fin()
	{
		return $this->fecha_fin;
	}

	public function setFecha_fin($fecha_fin)
	{
		$this->fecha_fin = $fecha_fin;
	}
	public function getIdProfesor()
	{
		return $this->idProfesor;
	}

	public function setIdProfesor($idProfesor)
	{
		$this->idProfesor = $idProfesor;
	}

	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO gestion (nombre, fecha_inicio, fecha_fin, idProfesor) 
			VALUES ('$this->nombre','$this->fecha_inicio','$this->fecha_fin', $this->idProfesor)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE gestion SET nombre ='$this->nombre', fecha_inicio = '$this->fecha_inicio', fecha_fin = '$this->fecha_fin', idProfesor = $this->idProfesor
			WHERE id = '$this->idGestion'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM gestion WHERE id = $this->idGestion";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT GA.id, GA.nombre, GA.fecha_inicio, GA.fecha_fin, PRO.nombre AS profesor
				FROM gestion GA, profesor PRO
				WHERE GA.idProfesor = PRO.id";
		return ejecutarConsulta($sql);		
	}

	public function seleccionarPaciente()
	{
		$sql = "SELECT id, nombre, apellido, ci, sexo, direccion, telefono, correo, password
				FROM profesor";
		return ejecutarConsulta($sql);		
	}
	
}

?>