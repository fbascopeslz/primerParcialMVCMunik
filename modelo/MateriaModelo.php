<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class MateriaModelo
{
	public $idMateria;	
	public $nombre;
	

	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdMateria()
	{
		return $this->idMateria;
	}

	public function setIdMateria($idMateria)
	{
		$this->idMateria = $idMateria;
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
		$sql = "INSERT INTO materia (nombre) 
			VALUES ('$this->nombre')";
		return ejecutarConsulta($sql);		

	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE materia SET nombre ='$this->nombre'
			WHERE id = $this->idMateria";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM materia WHERE id = $this->idMateria";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM materia";
		return ejecutarConsulta($sql);			
	}

	
}

?>