<?php

class MateriaVista {
    // Properties     

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Materia registrado" : "Materia no se pudo registrar";		
	}
	
	public function editar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Materia actualizado" : "Materia no se pudo actualizar";		
    }
    
    public function mostrar($rsptaModelo) 
    {        
 		//Codificar el resultado utilizando json
 		return json_encode($rsptaModelo);
    }

    public function listar($materiaModelo) 
    {        		
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $materiaModelo->fetch_object()) {						
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->ID.')"><i class="fa fa-pen"></i></button>',
 				"1" => $reg->NOMBRE
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data);
			 
 		return json_encode($results);
    }    
}

?>