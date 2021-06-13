<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class CursoModelo
{
	public $idCurso;	
	public $nombre;
	public $paralelo;
	public $descripcion;
	
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdCurso()
	{
		return $this->idCurso;
	}

	public function setIdCurso($idCurso)
	{
		$this->idCurso = $idCurso;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getParalelo()
	{
		return $this->paralelo;
	}

	public function setParalelo($paralelo)
	{
		$this->paralelo = $paralelo;
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
		$sql = "INSERT INTO curso (nombre,paralelo, descripcion) 
			VALUES ('$this->nombre','$this->paralelo', ,'$this->descripcion')";
		return ejecutarConsulta($sql);		

	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE curso SET nombre ='$this->nombre', paralelo = '$this->paralelo' , descripcion = '$this->descripcion'
			WHERE id = $this->idCurso";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM curso WHERE id = $this->idCurso";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM idCurso";
		return ejecutarConsulta($sql);			
	}

	
}

?>