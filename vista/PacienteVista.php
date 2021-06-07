<?php

class PacienteVista {
    // Properties

    public function __construct()
	{

	}
  
    // Methods
    public function insertar($rspta) 
    {        		
		echo $rspta ? "Paciente registrado" : "Paciente no se pudo registrar";		
	}
	
	public function editar($rspta) 
    {        		
		echo $rspta ? "Paciente actualizado" : "Paciente no se pudo actualizar";		
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
 				"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
 				"1" => $reg->nombre,
				"2" => $reg->sexo,
				"3" => $reg->raza,
				"4" => $reg->especie,
				"5" => $reg->propietario
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			 "aaData" => $data);
			 
 		echo json_encode($results);
	} 
	
	public function seleccionarPropietario($rspta) 
    {        
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{			
			echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
		}
	}
}






?>