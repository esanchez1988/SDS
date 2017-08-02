<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "PRI-INFANCIA1;PRI-INFANCIA2;PRI-INFANCIA3;PRI-INFANCIA4;PRI-INFANCIA5;PRI-INFANCIA6;PRI-INFANCIA7;PRI-INFANCIA8;PRI-INFANCIA9;PRI-INFANCIA10;PRI-INFANCIA11;PRI-INFANCIA12;PRI-INFANCIA13;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//PRIMERA INFANCIA
		$datos .= "".$datos_repor[$i]->pi1.";".$datos_repor[$i]->pi2.";".$datos_repor[$i]->pi3.";".$datos_repor[$i]->pi4.";".$datos_repor[$i]->pi5.";".$datos_repor[$i]->pi6.";".$datos_repor[$i]->pi7.";".$datos_repor[$i]->pi8.";".$datos_repor[$i]->pi9.";".$datos_repor[$i]->pi10.";".$datos_repor[$i]->pi11.";".$datos_repor[$i]->pi12.";".$datos_repor[$i]->pi13.";";
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>