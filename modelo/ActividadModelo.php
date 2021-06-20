<?php 
//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class ActividadModelo
{
	public $idActividad;
	public $nombre;
	public $fecha;
	public $documento;
	public $gestionMateriaId;
	public $tipoActividadId;

	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	
	public function getIdActividad()
	{
		return $this->idActividad;
	}

	public function setIdActividad($idActividad)
	{
		$this->idActividad = $idActividad;
	}

	public function getNombre()
	{
		return $this->nombre;
	}

	public function setNombre($nombre)
	{
		$this->nombre = $nombre;
	}

	public function getFecha()
	{
		return $this->fecha;
	}

	public function setFecha($fecha)
	{
		$this->fecha = $fecha;
	}

	public function getDocumento()
	{
		return $this->documento;
	}

	public function setDocumento($documento)
	{
		$this->documento = $documento;
	}

	public function getGestionMateriaId()
	{
		return $this->gestionMateriaId;
	}

	public function setGestionMateriaId($gestionMateriaId)
	{
		$this->gestionMateriaId = $gestionMateriaId;
	}

	public function getTipoActividadId()
	{
		return $this->tipoActividadId;
	}

	public function setTipoactividadId($tipoActividadId)
	{
		$this->tipoActividadId = $tipoActividadId;
	}

	
	//Implementamos un método para insertar registros
	public function insertar()
	{
		$sql = "INSERT INTO Actividad (nombre, fecha, documento, gestionmateria_id, tipoactividad_id) 
			VALUES ('$this->nombre','$this->fecha','$this->documento', $this->gestionMateriaId, $this->tipoActividadId)";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para editar registros
	public function editar()
	{
		$sql = "UPDATE Actividad SET nombre ='$this->nombre', documento = '$this->documento', gestionmateria_id = $this->gestionMateriaId, tipoactividad_id = $this->tipoActividadId
			WHERE id = $this->idActividad";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar()
	{
		$sql="SELECT * FROM Actividad WHERE id = $this->idActividad";		
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql = "SELECT AC.id, AC.nombre, AC.fecha, AC.documento, M.nombre AS materia, G.nombre AS gestion, TA.nombre AS tipoActividad
				FROM Actividad AC, GestionMateria GM, Gestion G, Materia M, TipoActividad TA
				WHERE AC.gestionmateria_id = GM.id AND G.id = GM.gestion_id AND M.id = GM.materia_id
					AND AC.tipoactividad_id = TA.id";
		return ejecutarConsulta($sql);		
	}
	
}

?>