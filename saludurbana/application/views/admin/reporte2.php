<?php
	//ENCABEZADOS
	$datos = "PrimerNombre;SegundoNombre;PrimerApellido;SegundoApellido;NumeroIdentificacion;Sexo;Edad;Peso;Talla;Imc;Desc_imc;";
	$datos .= "MATERNO1;MATERNO2;MATERNO3;MATERNO4;MATERNO5;MATERNO6;MATERNO7;MATERNO8;MATERNO9;MATERNO10;MATERNO11;";
	$datos .= "PRI-INFANCIA1;PRI-INFANCIA2;PRI-INFANCIA3;PRI-INFANCIA4;PRI-INFANCIA5;PRI-INFANCIA6;PRI-INFANCIA7;PRI-INFANCIA8;PRI-INFANCIA9;PRI-INFANCIA10;PRI-INFANCIA11;PRI-INFANCIA12;PRI-INFANCIA13;";
	$datos .= "INFANCIA1;INFANCIA2;INFANCIA3;INFANCIA4;INFANCIA5; ";
	$datos .= "ADOLESCENCIA1;ADOLESCENCIA2;ADOLESCENCIA3;ADOLESCENCIA4;ADOLESCENCIA5;ADOLESCENCIA6;ADOLESCENCIA7;ADOLESCENCIA8;ADOLESCENCIA9;";
	$datos .= "JUVENTUD1;JUVENTUD2;JUVENTUD3;JUVENTUD4;JUVENTUD5;JUVENTUD6;JUVENTUD7;";
	$datos .= "ADULTEZ1;ADULTEZ2;ADULTEZ3;ADULTEZ4;ADULTEZ5;ADULTEZ6;ADULTEZ7;ADULTEZ8;ADULTEZ9;";
	$datos .= "VEJEZ1;VEJEZ2;VEJEZ3;VEJEZ4;VEJEZ5;VEJEZ6;VEJEZ7;";
	$datos .= "\r\n"; 
		
	for($i=0;$i<count($datos_repor);$i++){
				
		$datos .= $datos_repor[$i]->PrimerNombre.";".$datos_repor[$i]->SegundoNombre.";".$datos_repor[$i]->PrimerApellido.";".$datos_repor[$i]->SegundoApellido.";";
		$datos .= $datos_repor[$i]->NumeroIdentificacion.";".$datos_repor[$i]->Sexo.";".$datos_repor[$i]->Edad.";".$datos_repor[$i]->Peso.";";		
		$datos .= $datos_repor[$i]->Talla.";".$datos_repor[$i]->Imc.";".$datos_repor[$i]->Desc_imc.";";		

		//MATERNO PERINATAL	
		$datos .= "".$datos_repor[$i]->m1.";".$datos_repor[$i]->m2.";".$datos_repor[$i]->m3.";".$datos_repor[$i]->m4.";".$datos_repor[$i]->m5.";".$datos_repor[$i]->m6.";".$datos_repor[$i]->m7.";".$datos_repor[$i]->m8.";".$datos_repor[$i]->m9.";".$datos_repor[$i]->m10.";".$datos_repor[$i]->m11.";";		
		//PRIMERA INFANCIA
		$datos .= "".$datos_repor[$i]->pi1.";".$datos_repor[$i]->pi2.";".$datos_repor[$i]->pi3.";".$datos_repor[$i]->pi4.";".$datos_repor[$i]->pi5.";".$datos_repor[$i]->pi6.";".$datos_repor[$i]->pi7.";".$datos_repor[$i]->pi8.";".$datos_repor[$i]->pi9.";".$datos_repor[$i]->pi10.";".$datos_repor[$i]->pi11.";".$datos_repor[$i]->pi12.";".$datos_repor[$i]->pi13.";";
		//INFANCIA
		$datos .= "".$datos_repor[$i]->in1.";".$datos_repor[$i]->in2.";".$datos_repor[$i]->in3.";".$datos_repor[$i]->in4.";".$datos_repor[$i]->in5.";";		
		//ADOLESCENCIA
		$datos .= "".$datos_repor[$i]->ad1.";".$datos_repor[$i]->ad2.";".$datos_repor[$i]->ad3.";".$datos_repor[$i]->ad4.";".$datos_repor[$i]->ad5.";".$datos_repor[$i]->ad6.";".$datos_repor[$i]->ad7.";".$datos_repor[$i]->ad8.";".$datos_repor[$i]->ad9.";";
		//JUVENTUD
		$datos .= "".$datos_repor[$i]->ju1.";".$datos_repor[$i]->ju2.";".$datos_repor[$i]->ju3.";".$datos_repor[$i]->ju4.";".$datos_repor[$i]->ju5.";".$datos_repor[$i]->ju6.";".$datos_repor[$i]->ju7.";";		
		//ADULTEZ
		$datos .= "".$datos_repor[$i]->adu1.";".$datos_repor[$i]->adu2.";".$datos_repor[$i]->adu3.";".$datos_repor[$i]->adu4.";".$datos_repor[$i]->adu5.";".$datos_repor[$i]->adu6.";".$datos_repor[$i]->adu7.";".$datos_repor[$i]->adu8.";".$datos_repor[$i]->adu9.";";
		//VEJEZ
		$datos .= "".$datos_repor[$i]->ve1.";".$datos_repor[$i]->ve2.";".$datos_repor[$i]->ve3.";".$datos_repor[$i]->ve4.";".$datos_repor[$i]->ve5.";".$datos_repor[$i]->ve6.";".$datos_repor[$i]->ve7.";";		
		$datos .= "\r\n"; 
	}
	
	echo $datos;
			
?>