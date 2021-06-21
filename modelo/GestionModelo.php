<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class GestionModelo
{
	public $idGestion;
	public $nombre;
	public $fechaInicio;
	public $fechaFin;
	public $profesorId;

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

	public function getFechaInicio()
	{
		return $this->fechaInicio;
	}

	public function setFechaInicio($fechaInicio)
	{
		$this->fechaInicio = $fechaInicio;
	}

	public function getFechaFin()
	{
		return $this->fechaFin;
	}

	public function setFechaFin($fechaFin)
	{
		$this->fechaFin = $fechaFin;
	}
	
	public function getProfesorId()
	{
		return $this->profesorId;
	}

	public function setProfesorId($profesorId)
	{
		$this->profesorId = $profesorId;
	}

	
	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO Gestion (nombre, fecha_inicio, fecha_fin, profesor_id)
			VALUES ('$this->nombre','$this->fechaInicio','$this->fechaFin', $this->profesorId)";			
		return ejecutarConsulta_retornarID($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE Gestion SET nombre ='$this->nombre', fechainicio = '$this->fechaInicio', fechaFin = '$this->fechaFin', profesorid = $this->profesorId
			WHERE id = $this->idGestion";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM Gestion WHERE id = $this->idGestion";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT G.id, G.nombre, G.fecha_inicio, G.fecha_fin, CONCAT(P.nombre, ' ', P.apellido) AS profesor
				FROM Gestion G, Profesor P
				WHERE G.profesor_id = P.id";				
		return ejecutarConsulta($sql);		
	}
	
}

?>