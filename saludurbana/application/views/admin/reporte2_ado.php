<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "ADOLESCENCIA1;ADOLESCENCIA2;ADOLESCENCIA3;ADOLESCENCIA4;ADOLESCENCIA5;ADOLESCENCIA6;ADOLESCENCIA7;ADOLESCENCIA8;ADOLESCENCIA9;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//ADOLESCENCIA
		$datos .= "".$datos_repor[$i]->ad1.";".$datos_repor[$i]->ad2.";".$datos_repor[$i]->ad3.";".$datos_repor[$i]->ad4.";".$datos_repor[$i]->ad5.";".$datos_repor[$i]->ad6.";".$datos_repor[$i]->ad7.";".$datos_repor[$i]->ad8.";".$datos_repor[$i]->ad9.";";
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>