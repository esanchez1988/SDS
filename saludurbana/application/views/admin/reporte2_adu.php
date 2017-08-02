<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "ADULTEZ1;ADULTEZ2;ADULTEZ3;ADULTEZ4;ADULTEZ5;ADULTEZ6;ADULTEZ7;ADULTEZ8;ADULTEZ9;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//ADULTEZ
		$datos .= "".$datos_repor[$i]->adu1.";".$datos_repor[$i]->adu2.";".$datos_repor[$i]->adu3.";".$datos_repor[$i]->adu4.";".$datos_repor[$i]->adu5.";".$datos_repor[$i]->adu6.";".$datos_repor[$i]->adu7.";".$datos_repor[$i]->adu8.";".$datos_repor[$i]->adu9.";";
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>