<?php

class VacunaVista {
    // Properties     

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Vacuna registrada" : "Vacuna no se pudo registrar";		
	}
	
	public function editar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Vacuna actualizada" : "Vacuna no se pudo actualizar";		
    }
    
    public function mostrar($rsptaModelo) 
    {        
 		//Codificar el resultado utilizando json
 		return json_encode($rsptaModelo);
    }

    public function listar($vacunasModelo) 
    {        
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $vacunasModelo->fetch_object()) {
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pen"></i></button>',
 				"1" => $reg->nombre,
				"2" => $reg->indicaciones,
				"3" => $reg->fechaVencimiento		
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