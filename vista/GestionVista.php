<?php

class GestionVista {
    // Properties

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rspta) 
    {        		
		echo $rspta ? "Gestion registrado" : "Gestion no se pudo registrar";		
	}
	
	public function editar($rspta) 
    {        		
		echo $rspta ? "Gestion actualizado" : "Gestion no se pudo actualizar";		
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
				"2" => $reg->fecha_inicio,
				"3" => $reg->fecha_fin,				
				"4" => $reg->profesor
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data);
			 
 		echo json_encode($results);
	} 
	
	public function seleccionarProfesor($rspta) 
    {       
		echo '<option value="" selected disabled>Selecciona el Profesor...</option>'; 
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->ID . '>' . $reg->NOMBRE . ' ' . $reg->APELLIDO . '</option>';
		}
	}

	public function seleccionarMateria($rspta) 
    {        
		echo '<option value="" selected disabled>Selecciona la Materia...</option>'; 
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->ID . '>' . $reg->NOMBRE . '</option>';
		}
	}

	public function seleccionarCurso($rspta) 
    {        
		echo '<option value="" selected disabled>Selecciona el Curso...</option>'; 
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->ID . '>' . $reg->NOMBRE.' '.$reg->PARALELO.' '.$reg->DESCRIPCION . '</option>';
		}
	}
}

?>