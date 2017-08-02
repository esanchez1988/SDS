<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "INFANCIA1;INFANCIA2;INFANCIA3;INFANCIA4;INFANCIA5; ";	
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//INFANCIA
		$datos .= "".$datos_repor[$i]->in1.";".$datos_repor[$i]->in2.";".$datos_repor[$i]->in3.";".$datos_repor[$i]->in4.";".$datos_repor[$i]->in5.";";		
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>