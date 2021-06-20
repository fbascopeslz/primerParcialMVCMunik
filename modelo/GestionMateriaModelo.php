<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class GestionMateriaModelo
{
	public $idGestionMateria;	
	public $idGestion;
	public $idMateria;
	public $idCurso;


	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdGestionMateria()
	{
		return $this->idGestionMateria;
	}

	public function setIdGestionMateria($idGestionMateria)
	{
		$this->idGestionMateria = $idGestionMateria;
	}

	public function getIdGestion()
	{
		return $this->idIdGestion;
	}

	public function setIdGestion($idGestion)
	{
		$this->idGestion = $idGestion;
	}

	public function getIdMateria()
	{
		return $this->idMateria;
	}

	public function setIdMateria($idMateria)
	{
		$this->idMateria = $idMateria;
	}
	public function getIdCurso()
	{
		return $this->idCurso;
	}

	public function setIdCurso($idCurso)
	{
		$this->idCurso = $idCurso;
	}

	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO GestionMateria (gestion_id, materia_id, curso_id) 
			VALUES ($this->idGestion,$this->idMateria, $this->idCurso)";
		return ejecutarConsulta($sql);	
	}	
	
	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql = "SELECT Pro.id, Per.nombre, Per.ci, Per.telefono, Per.email, Pro.idPersona AS idPersona
				FROM persona Per, propietario Pro
				WHERE Pro.idPersona = Per.id AND Pro.id = $this->idPropietario";			
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT GM.id AS id, G.nombre AS gestion, M.nombre AS materia, CONCAT(C.nombre, ' ', C.paralelo, ' ', C.descripcion) as curso
				FROM GestionMateria GM, Gestion G, Materia M, Curso C
				WHERE GM.gestion_id = G.id AND GM.materia_id = M.id AND GM.curso_id = C.id";
		return ejecutarConsulta($sql);			
	}
	
}

?>