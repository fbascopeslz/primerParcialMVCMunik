<?php

class CartillaVacunacionVista {
    // Properties	
	

    public function __construct()
	{	
		
	}

  /*        	
	public function editar($idPropietario, $nombre, $indicaciones, $fechaVencimiento) 
    {        
		$rspta = $this->Propietariocontrolador->editar($idPropietario, $nombre, $indicaciones, $fechaVencimiento);
		echo $rspta ? "Propietario actualizada" : "Propietario no se pudo actualizar";		
    }
    
    public function mostrar($idPropietario) 
    {
        $rspta = $this->Propietariocontrolador->mostrar($idPropietario);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
    }
*/

	public function insertar($rspta) 
    {        		
		return $rspta ? "Cartilla de Vacunacion registrada" : "Cartilla de Vacunacion no se pudo registrar";		
	}

	public function seleccionarPropietario($rspta) 
    {        
 		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{
			//var_dump($reg);
			echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
		}
	}

	public function seleccionarPaciente($rspta) 
    {        
		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{
			//var_dump($reg);
			echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
		}
	}

	public function seleccionarVacuna($rspta) 
    {				
		//Codificar el resultado utilizando json		 				 
		while ($reg = $rspta->fetch_object())
		{
			//var_dump($reg);
			echo '<option value=' . $reg->id . '>' . $reg->nombre . '</option>';
		}		
	}
		
    public function listar($rspta) 
    {		
 		//Vamos a declarar un array
 		$data = [];

 		while ($reg = $rspta->fetch_object()) {
 			$data[] = array(
 				//"0" => '<button class="btn btn-warning" onclick="mostrar('.$reg->id.')"><i class="fa fa-pencil"></i></button>',
 				"0" => $reg->vacuna,
				"1" => $reg->indicaciones,
				"2" => $reg->fechaVacuna,
				"3" => $reg->fechaProximaVacuna	
 			);
 		}
 		$results = array(
 			"sEcho" => 1, //Información para el datatables
 			"iTotalRecords" => count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
			"aaData" => $data
		);
			 
 		return json_encode($results);
	}
	
}




?>