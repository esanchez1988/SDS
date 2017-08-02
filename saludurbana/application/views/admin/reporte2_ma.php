<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "MATERNO1;MATERNO2;MATERNO3;MATERNO4;MATERNO5;MATERNO6;MATERNO7;MATERNO8;MATERNO9;MATERNO10;MATERNO11;";
	
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//MATERNO PERINATAL	
		$datos .= "".$datos_repor[$i]->m1.";".$datos_repor[$i]->m2.";".$datos_repor[$i]->m3.";".$datos_repor[$i]->m4.";".$datos_repor[$i]->m5.";".$datos_repor[$i]->m6.";".$datos_repor[$i]->m7.";".$datos_repor[$i]->m8.";".$datos_repor[$i]->m9.";".$datos_repor[$i]->m10.";".$datos_repor[$i]->m11.";";		
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>