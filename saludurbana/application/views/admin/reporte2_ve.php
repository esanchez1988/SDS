<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "VEJEZ1;VEJEZ2;VEJEZ3;VEJEZ4;VEJEZ5;VEJEZ6;VEJEZ7;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//VEJEZ
		$datos .= "".$datos_repor[$i]->ve1.";".$datos_repor[$i]->ve2.";".$datos_repor[$i]->ve3.";".$datos_repor[$i]->ve4.";".$datos_repor[$i]->ve5.";".$datos_repor[$i]->ve6.";".$datos_repor[$i]->ve7.";";		
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>