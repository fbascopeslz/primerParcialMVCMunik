<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class ProfesorModelo
{
	public $idProfesor;	
	public $nombre;
	public $apellido;
	public $ci;
	public $sexo;
	public $direccion;
	public $telefono;
	public $correo;
	public $password;


	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdProfesor()
	{
		return $this->idProfesor;
	}

	public function setIdProfesor($idProfesor)
	{
		$this->idProfesor = $idProfesor;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}
	public function getApellido()
	{
		return $this->apellido;
	}

	public function setApellido($apellido)
	{
		$this->apellido = $apellido;
	}

	public function getCi()
	{
		return $this->ci;
	}

	public function setCi($ci)
	{
		$this->ci = $ci;
	}

	public function getSexo()
	{
		return $this->sexo;
	}

	public function setSexo($sexo)
	{
		$this->sexo = $sexo;
	}

	public function getDireccion()
	{
		return $this->direccion;
	}

	public function setDireccion($direccion)
	{
		$this->direccion = $direccion;
	}


	public function getTelefono()
	{
		return $this->telefono;
	}

	public function setTelefono($telefono)
	{
		$this->telefono = $telefono;
	}

	public function getCorreo()
	{
		return $this->correo;
	}

	public function setCorreo($correo)
	{
		$this->correo = $correo;
	}

	public function getIdPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}


	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO profesor (nombre,apellido, ci, sexo, direccion, telefono, correo, password) 
			VALUES ('$this->nombre','$this->apellido','$this->ci','$this->sexo','$this->direccion','$this->telefono','$this->correo',  '$this->password')";
		return ejecutarConsulta($sql);		

	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE profesor SET nombre ='$this->nombre', apellido = '$this->apellido', sexo = '$this->sexo', direccion = '$this->direccion' , telefono = '$this->telefono', correo = '$this->correo', password = '$this->password'
			WHERE id = $this->idProfesor";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM profesor WHERE id = $this->idProfesor";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM idProfesor";
		return ejecutarConsulta($sql);			
	}

	
}

?>