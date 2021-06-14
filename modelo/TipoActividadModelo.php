<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class TipoActividadModelo
{
	public $idTipoActividad;
	public $nombre;
	public $descripcion;

	
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
	
	public function getDescripcion()
	{
		return $this->descripcion;
	}

	public function setDescripcion($descripcion)
	{
		$this->descripcion = $descripcion;
	}
	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO TipoActividad (nombre, descripcion) 
			VALUES ('$this->nombre', '$this->descripcion')";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE TipoActividad SET nombre ='$this->nombre' , descripcion ='$this->descripcion' 
			WHERE id = '$this->idTipoActividad'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM TipoActividad WHERE id = $this->idTipoActividad";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM TipoActividad";
		return ejecutarConsulta($sql);		
	}
		
}

?>