<?php

class ProfesorVista {
    // Properties     

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Profesor registrado" : "Profesor no se pudo registrar";		
	}
	
	public function editar($rsptaModelo) 
    {        		
		return $rsptaModelo ? "Profesor actualizado" : "Profesor no se pudo actualizar";		
    }
    
    public function mostrar($rsptaModelo) 
    {        
 		//Codificar el resultado utilizando json
 		return json_encode($rsptaModelo);
    }

    public function listar($profesorModelo) 
    {        		
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $profesorModelo->fetch_object()) {						
 			$data[] = array(
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->ID.')"><i class="fa fa-pen"></i></button>',
 				"1" => $reg->NOMBRE,
				"2" => $reg->APELLIDO,
				"3" => $reg->CI,
				"4" => $reg->SEXO,
				"5" => $reg->DIRECCION,
				"6" => $reg->TELEFONO,
				"7" => $reg->CORREO						
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