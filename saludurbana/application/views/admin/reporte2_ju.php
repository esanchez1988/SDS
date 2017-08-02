<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "JUVENTUD1;JUVENTUD2;JUVENTUD3;JUVENTUD4;JUVENTUD5;JUVENTUD6;JUVENTUD7;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//JUVENTUD
		$datos .= "".$datos_repor[$i]->ju1.";".$datos_repor[$i]->ju2.";".$datos_repor[$i]->ju3.";".$datos_repor[$i]->ju4.";".$datos_repor[$i]->ju5.";".$datos_repor[$i]->ju6.";".$datos_repor[$i]->ju7.";";		
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>