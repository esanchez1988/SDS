<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Direccion;Telefono;";
	$datos .= "EstadoVisita;IdGestor;CorreoGestor;Subred";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		//DATOS
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= "".$datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Direccion.";".$datos_repor[$i]->Telefono.";";
		$datos .= "".$datos_repor[$i]->estadoVisita.";".$datos_repor[$i]->username.";".$datos_repor[$i]->Correo.";".$datos_repor[$i]->desc_subred.";";
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>