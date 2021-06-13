<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class PropietarioModelo
{
	public $idPropietario;	
	public $nombre;
	public $ci;
	public $telefono;
	public $email;
	public $idPersona;
	public $fechaUnion;


	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdPropietario()
	{
		return $this->idPropietario;
	}

	public function setIdPropietario($idPropietario)
	{
		$this->idPropietario = $idPropietario;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getCi()
	{
		return $this->ci;
	}

	public function setCi($ci)
	{
		$this->ci = $ci;
	}

	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getIdPersona()
	{
		return $this->idPersona;
	}

	public function setIdPersona($idPersona)
	{
		$this->idPersona = $idPersona;
	}

	public function getFechaUnion()
	{
		return $this->fechaUnion;
	}

	public function setFechaUnion($fechaUnion)
	{
		$this->fechaUnion = $fechaUnion;
	}



	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO persona (nombre, ci, telefono, email) 
			VALUES ('$this->nombre','$this->ci', $this->telefono, '$this->email')";
		$idPersona = ejecutarConsulta_retornarID($sql);		

		$sql = "INSERT INTO propietario (fechaUnion, idPersona) 
			VALUES ('$this->fechaUnion', $idPersona)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE persona 
				SET nombre ='$this->nombre', ci = '$this->ci', telefono = $this->telefono, email = '$this->email' 
				WHERE id = $this->idPersona";
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
		$sql = "SELECT Pro.id, Per.nombre, Per.ci, Per.telefono, Per.email, Pro.fechaUnion
				FROM persona Per, propietario Pro
				WHERE Pro.idPersona = Per.id";
		return ejecutarConsulta($sql);		
	}
	
}

?>