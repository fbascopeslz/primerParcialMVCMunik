<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class TipoActividad
{
	public $idTipoActividad;
	public $nombre;

	
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	

	public function getIdTipoActividad()
	{
		return $this->idTipoActividad;
	}

	public function setIdTipoActividad($idTipoActividad)
	{
		$this->idTipoActividad = $idTipoActividad;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	

	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO vacuna (nombre, indicaciones, fechaVencimiento) 
			VALUES ('$this->nombre','$this->indicaciones','$this->fechaVencimiento')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE vacuna SET nombre ='$this->nombre', indicaciones = '$this->indicaciones', fechaVencimiento = '$this->fechaVencimiento' 
			WHERE id = '$this->idVacuna'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM vacuna WHERE id = '$this->idVacuna'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM vacuna";
		return ejecutarConsulta($sql);		
	}
		
}

?>