<?php

class TipoActividadVista {
    // Properties     

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "TipoActividad registrada" : "TipoActividad no se pudo registrar";		
	}
	
	public function editar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "TipoActividad actualizada" : "TipoActividad no se pudo actualizar";		
    }
    
    public function mostrar($rsptaModelo) 
    {        
 		//Codificar el resultado utilizando json
 		return json_encode($rsptaModelo);
    }

    public function listar($tipoActividadsModelo) 
    {        		
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $tipoActividadsModelo->fetch_object()) {						
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->ID.')"><i class="fa fa-pen"></i></button>',
 				"1" => $reg->NOMBRE,
				"2" => $reg->DESCRIPCION					
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