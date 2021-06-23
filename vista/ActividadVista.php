<?php

class ActividadVista {
    // Properties

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rspta) 
    {        		
		echo $rspta ? "Actividad registrado" : "Actividad no se pudo registrar";		
	}
	
	public function editar($rspta) 
    {        		
		echo $rspta ? "Actividad actualizado" : "Actividad no se pudo actualizar";		
    }
    
    public function mostrar($rspta) 
    {        
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    }

    public function listar($rspta) 
    {        
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $rspta->fetch_object()) {
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pen"></i></button>',
 				"1" => $reg->nombre,
				"2" => $reg->fecha,
				"3" => '<a href="http://localhost:8080/primerParcialMVCMunik/'.$reg->documento.'" target="_blank">'.$reg->documento.'</a>',
				"4" => $reg->materia,
				"5" => $reg->gestion,
				"6" => $reg->tipoActividad
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			 "aaData" => $data);
			 
 		echo json_encode($results);
	} 
	
	public function seleccionarGestionMateria($rspta) 
    {       
		echo '<option value="" selected disabled>Selecciona la Gestion, Materia y Curso...</option>'; 
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->id . '>' . $reg->gestion . ' | ' . $reg->materia . ' | ' . $reg->curso . '</option>';
		}
	}

	public function seleccionarTipoActividad($rspta) 
    {        
		echo '<option value="" selected disabled>Selecciona el Tipo de Actividad...</option>'; 
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->ID . '>' . $reg->NOMBRE . '</option>';
		}
	}
}

?>