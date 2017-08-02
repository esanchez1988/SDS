<?php

	$retornoError = $this->session->flashdata('error');
	if ($retornoError) {
		?>
		<div class="alert alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<?php echo $retornoError ?>
		</div>
		<?php
	}
	
	$retornoExito = $this->session->flashdata('exito');
	if ($retornoExito) {
		?>
		<div class="alert alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php echo $retornoExito ?>
		</div>
		<?php
	}
	
	$nuevo = $this->session->flashdata('nuevo');
	if ($nuevo == 'OK') {
		$vista = 'style="display:block"';
	}else{
		$vista = 'style="display:none"';
	}
?>
<div id='progress'>
<div id='progress-complete'></div>
</div>

<h2 class="titulo">
	<center>IDENTIFICACI&Oacute;N PROGRAMAS PROTECCI&Oacute;N ESPECIFICA Y DETECCI&Oacute;N TEMPRANA PARA LA GESTI&Oacute;N DEL RIESGO</center>
</h2>
<form action="<?php echo base_url('gestor/guardarFicha')?>" method="post">
<input type="hidden" id="id_persona" name="id_persona" value="<?php echo $persona[0]->IdPersona?>">
<fieldset>				
	<div class="form-group">
		<label for="exampleInputName2">Viable: </label>
		<select name="viable" id="viable" class="form-control">
			<option value="">Seleccione...</option>			
			<?php
				for($i=0;$i<count($estado_visita);$i++){
					if($estado_visita[$i]->IdEstadoVisita == 1 && $nuevo == 'OK'){
						echo "<option value='".$estado_visita[$i]->IdEstadoVisita."' selected>".$estado_visita[$i]->Nombre."</option>";
					}else{
						echo "<option value='".$estado_visita[$i]->IdEstadoVisita."'>".$estado_visita[$i]->Nombre."</option>";
					}					
				}
			?>						
		</select>
	</div>	
	<div id="no_efectiva" style="display:none">
		<button id="Enviar" type="submit" class="btn btn-primary submit">Guardar</button>
	</div>	
</fieldset>
</form>
<div id="efectiva" <?php echo $vista?>>
<form class="form" id="SignupForm" action="<?php echo base_url('gestor/guardarFicha')?>" method="post">
			<input type="hidden" id="id_persona" name="id_persona" value="<?php echo $persona[0]->IdPersona?>">
			<input type="hidden" name="viable" value="1">
			
            <fieldset>
                <legend>Informaci&oacute;n General</legend>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="p_nombre">Primer Nombre</label>
							<input type="text" class="form-control" id="p_nombre" name="p_nombre" value="<?php echo $persona[0]->PrimerNombre?>" readonly>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="s_nombre">Segundo Nombre</label>
							<input type="text" class="form-control" id="s_nombre" name="s_nombre" value="<?php echo $persona[0]->SegundoNombre?>" readonly>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="p_apellido">Primer Apellido</label>
							<input type="text" class="form-control" id="p_apellido" name="p_apellido" value="<?php echo $persona[0]->PrimerApellido?>" readonly>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="s_apellido">Segundo Apellido</label>
							<input type="text" class="form-control" id="s_apellido" name="s_apellido" value="<?php echo $persona[0]->SegundoApellido?>" readonly>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="t_docu">Tipo de Documento ID</label>
							<select class="form-control validate[required]" id="t_docu" name="t_docu" readonly>
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($tipo_docu);$i++){
										if(isset($persona[0]->IdTipoIdentifcacion) && $persona[0]->IdTipoIdentifcacion == $tipo_docu[$i]->IdTipoIdentificacion){
											echo "<option value='".$tipo_docu[$i]->IdTipoIdentificacion."' selected>".$tipo_docu[$i]->Descripcion."</option>";
										}else{
											echo "<option value='".$tipo_docu[$i]->IdTipoIdentificacion."'>".$tipo_docu[$i]->Descripcion."</option>";
										}										
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="n_docu">N&uacute;mero de Documento ID</label>
							<input type="text" class="form-control validate[required]" id="n_docu" name="n_docu" value="<?php echo $persona[0]->NumeroIdentificacion?>" readonly>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="enc_sexo">Sexo</label>
							<select class="form-control validate[required]" id="enc_sexo" name="enc_sexo">
								<?php
								if($persona[0]->Sexo == 'M'){
									$display_ges = 'style="display:none"';
									?>
									<option value="M" selected>Hombre</option>
									<option value="F">Mujer</option>
									<option value="I">Intersexual</option>
									<?php
								}else if($persona[0]->Sexo == 'F'){
									$display_ges = 'style="display:block"';
									?>
									<option value="M">Hombre</option>
									<option value="F"selected>Mujer</option>
									<option value="I">Intersexual</option>
									<?php
								}else if($persona[0]->Sexo == 'I'){
									$display_ges = 'style="display:block"';
									?>
									<option value="M">Hombre</option>
									<option value="F">Mujer</option>
									<option value="I" selected>Intersexual</option>
									<?php
								}else{
									$display_ges = 'style="display:none"';
									?>
									<option value="M">Hombre</option>
									<option value="F">Mujer</option>
									<option value="I">Intersexual</option>
									<?php
								}
								?>							
							</select>
						</div>						
					</div>
					<div class="col-md-2" id="div_gestante" <?php echo $display_ges?>>
						<div class="form-group">
							<label for="enc_gestante">Gestante</label>
							<select class="form-control validate[required]" id="enc_gestante" name="enc_gestante">
								<?php
								if($persona[0]->Gestante == 'Si'){
									?>
									<option value="Si" selected>S&iacute;</option>
									<option value="No">No</option>
									<option value="Puerperio">Puerperio</option>
									<?php
								}else if($persona[0]->Gestante == 'No'){
									?>
									<option value="Si">S&iacute;</option>
									<option value="No" selected>No</option>
									<option value="Puerperio">Puerperio</option>
									<?php
								}else if($persona[0]->Gestante == 'Puerperio'){
									?>
									<option value="Si">S&iacute;</option>
									<option value="No">No</option>
									<option value="Puerperio" selected>Puerperio</option>
									<?php
								}else{
									?>
									<option value="">Seleccione...</option>
									<option value="Si">S&iacute;</option>
									<option value="No">No</option>
									<option value="Puerperio">Puerperio</option>
									<?php
								}
								?>
							</select>
						</div>						
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="enc_fech_nac">Fecha de Nacimiento</label>
							<input type="text" class="form-control validate[required]" id="enc_fech_nac" name="enc_fech_nac" placeholder="AAAA-MM-DD" value="<?php echo $persona[0]->FechaNacimiento ?>">
						</div>						
					</div>
					<div class="col-md-2" style="display:none">
						<div class="form-group">
							<label for="enc_edad">Edad</label>
							<input type="text" class="form-control validate[required]" id="enc_edad" name="enc_edad" value="<?php echo $persona[0]->Edad ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="text" class="form-control" id="email" name="email" value="<?php echo $persona[0]->Email?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="telefono">Tel&eacute;fono</label>
							<input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $persona[0]->Telefono?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="telefono2">Tel&eacute;fono 2</label>
							<input type="text" class="form-control" id="telefono2" name="telefono2" value="<?php echo $persona[0]->Telefono2?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="etnia">Etnia</label>
							<select class="form-control validate[required]" id="etnia" name="etnia">
								<?php
								if($persona[0]->etnia == 'IND'){
									?>
									<option value="IND" selected>Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}else if($persona[0]->etnia == 'ROM'){
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM" selected>ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}else if($persona[0]->etnia == 'RAI'){
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI" selected>Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}else if($persona[0]->etnia == 'PAL'){
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL" selected>Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}else if($persona[0]->etnia == 'AFR'){
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR" selected>Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}else if($persona[0]->etnia == 'NIN'){
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN" selected>Ninguno</option>
									<?php
								}else{
									?>
									<option value="IND">Ind&iacute;gena</option>
									<option value="ROM">ROM-gitano</option>
									<option value="RAI">Raizal</option>
									<option value="PAL">Palenquero</option>
									<option value="AFR">Afrocolombiano/Afrodescendiente</option>
									<option value="NIN">Ninguno</option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="loca_capta">Localidad Captaci&oacute;n</label>
							<select class="form-control validate[required]" id="loca_capta" name="loca_capta">
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($localidad);$i++){
										if($persona[0]->IdLocalidad == $localidad[$i]->IdLocalidad){
											echo "<option value='".$localidad[$i]->IdLocalidad."' selected>".$localidad[$i]->Nombre."</option>";
										}else{
											echo "<option value='".$localidad[$i]->IdLocalidad."'>".$localidad[$i]->Nombre."</option>";	
										}
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="upz">UPZ</label>
							<select class="form-control validate[required]" id="upz_capta" name="upz_capta">
								<?php
									for($i=0;$i<count($upz);$i++){
										if($persona[0]->CodigoUP == $upz[$i]->cod_upz){
											echo "<option value='".$upz[$i]->cod_upz."' selected>".$upz[$i]->cod_upz ." - ".$upz[$i]->nom_upz."</option>";
										}else{
											echo "<option value='".$upz[$i]->cod_upz."'>".$upz[$i]->cod_upz ." - ".$upz[$i]->nom_upz."</option>";	
										}
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">					
					<div class="col-md-12">
						<div class="panel panel-default">
							<div class="panel-heading"><b><a href="#" data-toggle="tooltip" title="Direcci&oacute;n">Direcci&oacute;n</a> </b>
								
							</div>
							<div class="panel-body">
								<div class="form-inline">
									<select name="dir1" id="dir1" class="form-control">
										<option value="">Seleccione...</option>
										<option value="CALLE">CALLE</option>
										<option value="CARRERA">CARRERA</option>
										<option value="DIAGONAL">DIAGONAL</option>
										<option value="TRANSVERSAL">TRANSVERSAL</option>
										<option value="AVENIDA CALLE">AVENIDA CALLE</option>
										<option value="AVENIDA CARRERA">AVENIDA CARRERA</option>
									</select>
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[4]]" id="dir2" name="dir2" placeholder="N&uacute;mero" size="5">
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[4]]" id="dir3" name="dir3" placeholder="Letra" size="5">
									<input type="checkbox" class="form-control]" id="dir4" name="dir4" > BIS
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[4]]" id="dir5" name="dir5" placeholder="Letra" size="5">
									<select name="dir6" id="dir6" class="form-control">
										<option value="">Seleccione...</option>
										<option value="Sur">Sur</option>
										<option value="Este">Este</option>
									</select>
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[4]]" id="dir7" name="dir7" placeholder="N&uacute;mero" size="5">
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[4]]" id="dir8" name="dir8" placeholder="Letra" size="5">
									<input type="checkbox" class="form-control]" id="dir9" name="dir9" > BIS
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[4]]" id="dir10" name="dir10" placeholder="Letra" size="5">
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[4]]" id="dir11" name="dir11" placeholder="N&uacute;mero" size="5">
									<select name="dir12" id="dir12" class="form-control">
										<option value="">Seleccione...</option>
										<option value="Sur">Sur</option>
										<option value="Este">Este</option>
									</select>
									<input type="text" class="form-control validate[custom[onlyLetterNumber],minSize[1]]" id="dir13" name="dir13" placeholder="Complemento" size="10">
								</div>
							</div>
						</div>
						
					</div>		
				</div>
				<div class="row">					
					<div class="col-md-8">
						<label for="Direccion">Direcci&oacute;n Final</label>						
						<input type="text" readonly class="form-control validate[required]" id="dire_usua" name="dire_usua" placeholder="Direcci&oacute;n Final" value="<?php echo $persona[0]->Direccion?>">						
					</div>		
				</div>	
            </fieldset>
				
			<fieldset>  
                <legend></legend> 
				<div class="row">
					<div class="col-md-8">
						
						<!--MATERNO PERINATAL PUERPERIO-->
						<div class="row" id="div_gestante_puer" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="MATERNO PERINATAL">MATERNO PERINATAL</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-6">										
										<div class="row">	
											<b>ATENCI&Oacute;N DEL PARTO</b>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m6">CONSULTA DE CONTROL O SEGUIMIENTO DE PROGRAMA POR MEDICINA GENERAL </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m6" name="m6">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="R">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<b>ALERTAS EN SALUD</b>										
										<div class="form-inline">
											<div class="col-md-8">	
												<label for="m14">ADOLESCENTE EN PUERPERIO SIN METODO DE PLANIFICACI&Oacute;N FAMILIAR</label>
											</div>
											<div class="col-md-4">
												<select class="form-control validate[required]" id="m14" name="m14">
													<option value="">Seleccione...</option>
													<option value="R">S&iacute;</option>
													<option value="0">No</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
						<!--MATERNO PERINATAL-->
						<div class="row" id="div_gestantepr" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="MATERNO PERINATAL">MATERNO PERINATAL</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL EMBARAZO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="m1">DURANTE SU EMBARAZO ASISTIO A SU CONSULTA DE PRIMERA VEZ CON MEDICINA GENERAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m1" name="m1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="R">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="m2">EN EL &Uacute;LTIMO MES HA ASISTIDO A CONSULTA DE CONTROL O SEGUIMIENTO PRENATAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m2" name="m2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="m3">ESQUEMA DE VACUNACI&Oacute;N COMPLETO (Verifique el carne de vacunaci&oacute;n)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m3" name="m3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>
										<div class="row">
											<b>ATENCI&Oacute;N PREVENTIVA EN SALUD ORAL DE LA GESTANTE</b>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m4">DURANTE SU EMBARAZO HA ASISTIDO A CONSULTA ODONTOLOGICA?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m4" name="m4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">	
											<b>ATENCI&Oacute;N DEL PARTO</b>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m5">ASISTIO A CONSULTA MEDICA DESPUES DE LOS PRIMEROS 7 DIAS DEL PARTO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m5" name="m5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="R">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m6">HA TENIDO M&Aacute;S DE 2 ABORTOS SEGUIDOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m6" name="m6">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m7">HA PRESENTADO: <br />
														• DOLOR DE CABEZA O ZUMBIDO EN EL O&Iacute;DO.<br />
														• VISI&Oacute;N BORROSA CON PUNTOS DE LUCECITAS. <br />
														• NAUSEAS Y V&Oacute;MITOS FRECUENTES<br />
														• PALIDEZ MARCADA.<br />
														• HINCHAZ&Oacute;N DE PIES, MANOS, CARA.<br />
														• P&Eacute;RDIDA DE L&Iacute;QUIDO O SANGRE POR LA VAGINA O GENITALES.<br />
													</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m7" name="m7">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_ga1">
												<div class="col-md-8">	
													<label for="m8">GESTANTE ADOLESCENTE</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m8" name="m8">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m9">HA PERDIDO ALG&Uacute;N HIJO ANTES DE NACER O EN LOS PRIMEROS D&Iacute;AS DE VIDA?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m9" name="m9">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="m10">ALG&Uacute;N PARTO  ANTERIOR OCURRI&Oacute; ANTES DEL 8° MES?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m10" name="m10">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_ga2">
												<div class="col-md-8">	
													<label for="m11">ADOLESCENTE EN PUERPERIO SIN METODO DE PLANIFICACION FAMILIAR</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="m11" name="m11">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<!--PRIMERA INFANCIA (de 0 a 5 a&ntilde;os)-->
						<div class="row" id="div_pi" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="PRIMERA INFANCIA (de 0 a 5 a&ntilde;os)">PRIMERA INFANCIA (de 0 a 5 a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL CRECIMIENTO Y DESARROLLO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="pi1">El NIÑO O NIÑA ESTA INSCRITO EN EL PROGRAMA DE CONTROL DE CRECIMIENTO Y DESARROLLO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi1" name="pi1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="R">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_pi_me1">
												<div class="col-md-8">
													<label for="pi2">EN LOS ULTIMOS TRES MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi2" name="pi2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_pi_i1">
												<div class="col-md-8">
													<label for="pi3">EN LOS ULTIMOS CUATRO MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi3" name="pi3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_pi_e24">
												<div class="col-md-8">
													<label for="pi4">EN LOS ULTIMOS SEIS MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi4" name="pi4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="pi5">ESQUEMA DE VACUNACI&Oacute;N COMPLETO (Verifique el carne de vacunaci&oacute;n)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi5" name="pi5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row" id="div_pi_4">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DE LA AGUDEZA VISUAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi6">SU NIÑO O NIÑA HA TENIDO MEDICION DE AGUDEZA VISUAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi6" name="pi6">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row"  id="div_pi_ma2">
											<b>ATENCI&Oacute;N PREVENTIVA EN SALUD ORAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi7">EL NIÑO O NIÑA HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi7" name="pi7">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>	
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>										
											<div class="form-inline"  id="div_pi_me6m">
												<div class="col-md-8">	
													<label for="pi8">MENOR DE 6 MESES SIN LACTANCIA MATERNA EXCLUSIVA</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi8" name="pi8">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi9">EL NIÑO O NIÑA PES&Oacute; AL NACER MENOS DE 2000 GRAMOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi9" name="pi9">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi10">EL NIÑO O LA NIÑA NACIO ANTES DEL 8° MES DE EMBARAZO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi10" name="pi10">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi11">EL NIÑO O NIÑA PRESENTA UNO O VARIOS DE LSO SIGUIENTES SINTOMAS: <br />
														• NO BEBE O TOMAR DEL PECHO <br />
														• VOMITA TODO LO QUE COME <br />
														• EST&Aacute; MUY SOMNOLIENTO O INCONSCIENTE <br />
														• HA TENIDO CONVULSIONES <br />
													</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi11" name="pi11">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi12">MENOR DE DOS MESES CON SINDROME DE DIFICULTAD RESPITARORIA (SDR)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi12" name="pi12">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="pi13">MAYOR DE 2 MESES CON DIFICULTAD RESPIRATORIA MODERADA O SEVERA</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="pi13" name="pi13">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
							</div>	
							<!--INFANCIA (de 6 a 11 a&ntilde;os)-->
							<div class="row" id="div_in" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="INFANCIA (de 6 a 11 a&ntilde;os)">INFANCIA (de 6 a 11 a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL CRECIMIENTO Y DESARROLLO</b>
											<div class="form-inline" id="div_in_1">
												<div class="col-md-8">
													<label for="in1">EN EL ULTIMO SEMESTRE EL MENOR HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="in1" name="in1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_in_2">
												<div class="col-md-8">
													<label for="in2">EN EL ULTIMO AÑO EL MENOR HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="in2" name="in2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="in3">ESQUEMA DE VACUNACI&Oacute;N COMPLETO (Verifique el carne de vacunaci&oacute;n)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="in3" name="in3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<b>ATENCI&Oacute;N PREVENTIVA EN SALUD ORAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="in4">EL MENOR HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE ?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="in4" name="in4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																				
										</div>
										<div class="row"  id="div_in_3">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DE LA AGUDEZA VISUAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="in5">HA TENIDO MEDICION DE AGUDEZA VISUAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="in5" name="in5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
							</div>
							
							
							<!--ADOLESCENCIA (de 12 a 17 años)-->
							<div class="row" id="div_ado" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="ADOLESCENCIA (de 12 a 17 a&ntilde;os)">ADOLESCENCIA (de 12 a 17 a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL DESARROLLO DEL JOVEN</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ad1">EN EL ULTIMO AÑO HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad1" name="ad1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ad2">ESQUEMA DE VACUNACI&Oacute;N COMPLETO (Verifique el carne de vacunaci&oacute;n)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad2" name="ad2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<b>ATENCION PREVENTIVA EN SALUD ORAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad3">HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE ?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad3" name="ad3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>
										<div class="row">
											<b>ATENCI&Oacute;N EN PLANIFICACION FAMILIAR DE HOMBRES Y MUJERES</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad4">HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad4" name="ad4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>
										<div class="row" id="div_ad_1">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DE LA AGUDEZA VISUAL</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad5">HA TENIDO MEDICION DE AGUDEZA VISUAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad5" name="ad5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row"  id="div_ad_2">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE CUELLO UTERINO</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad6">SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS (Con vida Sexual activa)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad6" name="ad6">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>										
											<div class="form-inline"  id="div_ad_3">
												<div class="col-md-8">	
													<label for="ad7">ANTECEDENTE DE EMBARAZO EN ADOLESCENTE</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad7" name="ad7">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad8">HA FUMADO EN EL ULTIMO MES?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad8" name="ad8">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ad9">CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ad9" name="ad9">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
							</div>
							
							<!--JUVENTUD (de 18 a 28 años)-->
							<div class="row" id="div_juv" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="JUVENTUD (de 18 a 28 a&ntilde;os)">JUVENTUD (de 18 a 28 a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL DESARROLLO DEL JOVEN</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ju1">EN EL ULTIMO AÑO HA ASISTIDO A CONSULTA POR MEDICINA GENERAL ?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju1" name="ju1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																						
										</div>
										<div class="row">
											<b>ATENCION PREVENTIVA EN SALUD ORAL</b>																					
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ju2">HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju2" name="ju2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>	
										</div>
										<div class="row">
											<b>ATENCI&Oacute;N EN PLANIFICACION FAMILIAR DE HOMBRES Y MUJERES</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ju3">HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju3" name="ju3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>										
										<div class="row" id="div_ju_1">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE CUELLO UTERINO</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ju4">SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS? (Con vida Sexual activa en menores de 25) </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju4" name="ju4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ju5">HA FUMADO EN EL ULTIMO MES ?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju5" name="ju5">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ju6">CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju6" name="ju6">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline"  id="div_ju_2">
												<div class="col-md-8">	
													<label for="ju7">ANTECEDENTE DE EMBARAZO EN ADOLESCENTE?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ju7" name="ju7">
														<option value="">Seleccione...</option>
														<option value="CA">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
										</div>										
									</div>
								</div>
							</div>
							</div>
							
							
							<!--ADULTEZ (de 29 a 59 años)-->
							<div class="row" id="div_adu" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="ADULTEZ (de 29 a 59 a&ntilde;os)">ADULTEZ (de 29 a 59 a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL DESARROLLO DEL ADULTO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="adu1">HA ASISTIDO A CONSULTA POR MEDICINA GENERAL LOS ULTIMOS 5 AÑOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu1" name="adu1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>								
										</div>
										<div class="row" id="div_adu_1">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE SENO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="adu2">SE HA REALIZADO MAMOGRAFIA EN LOS ULTIMOS 2 AÑOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu2" name="adu2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																						
										</div>
										<div class="row" id="div_adu_2">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE CUELLO UTERINO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="adu3">SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu3" name="adu3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>
										<div class="row" id="div_adu_3">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DE LA AGUDEZA VISUAL</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="adu4">HA TENIDO MEDICION DE AGUDEZA VISUAL?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu4" name="adu4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>
										<div class="row">
											<b>ATENCION PREVENTIVA EN SALUD ORAL</b>																					
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="adu5">HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu5" name="adu5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>	
										</div>
										<div class="row"  id="div_adu_4">
											<b>ATENCI&Oacute;N EN PLANIFICACION FAMILIAR DE HOMBRES Y MUJERES</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="adu6">HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu6" name="adu6">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>											
										</div>										
										<div class="row"  id="div_adu_5">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE PROSTATA</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="adu7">LE HAN REALIZADO LA PRUEBA DE ANTIGENO PROSTATICO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu7" name="adu7">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="adu8">HA FUMADO EN EL ULTIMO MES?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu8" name="adu8">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>	
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="adu9">CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="adu9" name="adu9">
														<option value="">Seleccione...</option>
														<option value="CC">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>											
										</div>										
									</div>
								</div>
							</div>
							</div>
							
							
							
							<!--VEJEZ (de 60 o mas años)-->
							<div class="row" id="div_ve" style="display:block">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="VEJEZ (de 60 o mas a&ntilde;os)">VEJEZ (de 60 o mas a&ntilde;os)</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DE LAS ALTERACIONES DEL DESARROLLO DEL ADULTO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ve1">HA ASISTIDO A CONSULTA POR MEDICINA GENERAL LOS ULTIMOS 5 AÑOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve1" name="ve1">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>	
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ve2">VACUNACI&Oacute;N SEG&Uacute;N EL ESQUEMA DEL PAI?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve2" name="ve2">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																						
										</div>
										<div class="row">
											<b>ATENCION PREVENTIVA EN SALUD ORAL</b>																					
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ve3">HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE? </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve3" name="ve3">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>	
										</div>
										
										<div class="row" id="div_ve_1">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE SENO</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="ve4">SE HA REALIZADO MAMOGRAFIA EN LOS ULTIMOS 2 AÑOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve4" name="ve4">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																						
										</div>
										
										<div class="row">
											<b>DETECCI&Oacute;N TEMPRANA DEL CANCER DE CUELLO UTERINO Y DE PROSTATA</b>
											<div class="form-inline"  id="div_ve_2">
												<div class="col-md-8">
													<label for="ve5">SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve5" name="ve5">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline" id="div_ve_3">
												<div class="col-md-8">
													<label for="ve6">LE HAN REALIZADO LA PRUEBA DE ANTIGENO PROSTATICO?</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve6" name="ve6">
														<option value="">Seleccione...</option>
														<option value="0">S&iacute;</option>
														<option value="A">No</option>
													</select>
												</div>
											</div>																						
										</div>										
									</div>
									<div class="col-md-9">
										<div class="row">
											<b>ALERTAS EN SALUD</b>										
											<div class="form-inline">
												<div class="col-md-8">	
													<label for="ve7">PERSONA SIN TRATAMIENTO PARA CONDICI&Oacute;N CR&Oacute;NICA </label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="ve7" name="ve7">
														<option value="">Seleccione...</option>
														<option value="R">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>											
										</div>										
									</div>
								</div>
							</div>
							</div>
							
							<!--ALERTAS SOCIALES Y FAMILIARES-->
							<div class="row">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="ALERTAS SOCIALES Y FAMILIARES">ALERTAS SOCIALES Y FAMILIARES</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alf1">MUJER CABEZA DE HOGAR</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alf1" name="alf1">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>	
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alf2">ADULTO MAYOR SIN SUBSIDIO NI PENSION</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alf2" name="alf2">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alf3">DESESCOLARIZADO(A)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alf3" name="alf3">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
													</select>
													
													<div class="row" id="div_alf3" style="display:none">
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf3_1" name="alf3_1" value="1"> 6 a 11 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf3_1" name="alf3_1" value="2"> 12 a 17 a&ntilde;os
															</label>
														</div>	
													</div>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alf4">DISCAPACIDAD QUE REQUIERE CUIDADOR (se&ntilde;alar el curso de vida):</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alf4" name="alf4">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
													</select>
													
													<div class="row" id="div_alf4" style="display:none">
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="1"> 0 a 5 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="2"> 6 a 11 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="3"> 12 a 17 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="4"> 18 a 28 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="5"> 29 a 59 a&ntilde;os
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="alf4_1" name="alf4_1" value="6"> 60 a&ntilde;os o mas
															</label>
														</div>			
													</div>
												</div>
											</div>	
										</div>																			
									</div>									
								</div>
							</div>
							</div>
							
							<!--ALERTAS AMBIENTALES-->
							<div class="row">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="ALERTAS AMBIENTALES">ALERTAS AMBIENTALES</a></b>									
								</div>
								<div class="panel-body">
									<div class="col-md-9">
										<div class="row">
											<b>ESPACIO VITAL</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam1">PREPARACI&Oacute;N DE ALIMENTOS CON LE&Ntilde;A</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam1" name="alam1">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam2">SE FUMA EN LA VIVIENDA</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam2" name="alam2">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam3">LAS ZONAS DE TRABAJO SE MANTIENEN AISLADAS DE LAS HABITACIONES</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam3" name="alam3">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
										</div>	

										<div class="row">
											<b>SORBOS DE VIDA</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam4">MANIPULACI&Oacute;N ADECUADA DEL AGUA PARA CONSUMO (DESINFECCI&Oacute;N ADECUADA, USO SEGURO  DE UTENSILIOS)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam4" name="alam4">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
										</div>	
										
										<div class="row">
											<b>RESIDUOS SOLIDOS</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam5">SEPARACI&Oacute;N DE RESIDUOS (BASURAS) EN LA FUENTE</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam5" name="alam5">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
										</div>
										<div class="row">
											<b>MANEJO DE PLAGAS</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam6">LAS PR&Aacute;CTICAS HIGI&Eacute;NICOS-SANITARIAS NO FOMENTAN LA PROLIFERACI&Oacute;N DE VECTORES EN LA VIVIENDA</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam6" name="alam6">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
										</div>
										<div class="row">
											<b>ALIMENTOS E HIGIENE</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam7">ALMACENAMIENTO Y CONSERVACI&Oacute;N ADECUADA DE ALIMENTOS (LUGAR ADECUADO, ALIMENTOS TAPADOS, RECIPIENTES LIMPIOS, REFRIGERADOS, AHUMADOS, SALADOS)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam7" name="alam7">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
										</div>
										<div class="row">
											<b>RIESGOS FISICOS/QUIMICOS EN LA VIVIENDA</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam8">LOS PRODUCTOS QU&Iacute;MICOS EST&Aacute;N ALMACENADOS DE FORMA SEGURA (LUGAR VENTILADO, ROTULADOS, SEPARADOS DE LAS &Aacute;REAS HABITACIONALES)</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam8" name="alam8">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>	
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam9">ADQUISICI&Oacute;N DE MEDICAMENTOS CON F&Oacute;RMULA M&Eacute;DICA</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam9" name="alam9">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam10">MEDIDAS DE PREVENCI&Oacute;N FRENTE A LA EXPOSICI&Oacute;N AL AIRE LIBRE A LA RADIACI&Oacute;N SOLAR</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam10" name="alam10">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<b>NUESTAS MASCOTAS</b>
											<div class="form-inline">
												<div class="col-md-8">
													<label for="alam11">LAS MASCOTAS (GATO, PERRO) CUENTA CON EL ESQUEMA VACUNAL PROPIO DE LA ESPECIE, SE ENCUENTRAN ESTERILIZADAS Y SON DESPARASITADAS PERI&Oacute;DICAMENTE</label>
												</div>
												<div class="col-md-4">
													<select class="form-control validate[required]" id="alam11" name="alam11">
														<option value="">Seleccione...</option>
														<option value="A">S&iacute;</option>
														<option value="0">No</option>
														<option value="0">N/A</option>
													</select>
												</div>
											</div>
										</div>
									</div>									
								</div>
							</div>
							</div>
							
							<!--IMC-->
							<div class="row" id="div_imc" style="display:block">
								<div class="panel panel-default">
									<div class="panel-heading">
										<b><a href="#" data-toggle="tooltip" title="IMC">IMC</a></b>									
									</div>
									<div class="panel-body">
										<div class="col-md-9">
											<div class="row">
												<div class="form-inline">
													<div class="col-md-8">
														<label for="peso">PESO (Kg)</label>
													</div>
													<div class="col-md-4">
														<input type="text" class="form-control validate[required]" name="peso" id="peso">
													</div>
												</div>
												<div class="form-inline">
													<div class="col-md-8">
														<label for="peso">TALLA (Cm)</label>
													</div>
													<div class="col-md-4">
														<input type="text" class="form-control validate[required]"  name="talla" id="talla">
													</div>
												</div>
												<div class="form-inline">
													<div class="col-md-8">
														<label for="m3">IMC</label>
													</div>
													<div class="col-md-4">
														<input type="text" class="form-control validate[required]"  name="imc" id="imc" readonly>
														<input type="text" class="form-control validate[required]"  name="desc_imc" id="desc_imc" readonly>
													</div>
												</div>											
											</div>
										</div>								
									</div>
								</div>
								
							</div>
							
							<!--IMC Menores 5-->
							<div class="row" id="div_imc_ninos" style="display:block">
								<div class="panel panel-default">
									<div class="panel-heading">
										<b><a href="#" data-toggle="tooltip" title="IMC">Perimetro del Brazo</a></b>									
									</div>
									<div class="panel-body">
										<div class="col-md-9">
											<div class="row">
												<div class="form-inline">
													<div class="col-md-8">
														<label for="m3">Perimetro del Brazo</label>
													</div>
													<div class="col-md-4">
														<input type="text" class="form-control validate[required]"  name="p_brazo" id="p_brazo">
													</div>
												</div>											
											</div>
										</div>								
									</div>
								</div>
								
							</div>
							
							<!--CRONICOS-->
							<div class="row" id="div_cronicos" style="display:none">
							<div class="panel panel-default">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Seguimiento a Pacientes HTA">Seguimiento a Pacientes HTA</a></b>									
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="form-group">
											<label for="exampleInputName2">La persona asiste a programa de cr&oacute;nicos? </label>
											<select name="pre_cronicos" id="pre_cronicos" class="form-control">
												<option value="">Seleccione...</option>			
												<option value="SI">S&iacute;</option>
												<option value="NO">No</option>				
											</select>
										</div>
									</div>
									<div class="row" id="preguntas_cronicos" style="display:none">
									<div class="col-md-6">
										<div class="row" id="preguntas_cronicos_si_1" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p1">Cu&aacute;ndo fue la &uacute;ltima vez que asistio a consulta con medico general o internista</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p1" name="p1" value="1"> Asisti&oacute; en el ultimo mes
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p1" name="p1" value="2"> Asisti&oacute; en los ultimos tres meses
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p1" name="p1" value="12"> Asisti&oacute; hace mas de tres meses
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row" style="display:none" id="div_barrera">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p1">Cu&aacute;l(es) de las siguientes opciones considera han sido las principales barreras para la atenci&oacute;n de la condici&oacute;n en salud que usted presenta? (selecci&oacute;n m&uacute;ltiple)</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="1"> Desconoce las consecuencias de no cuidarse o no tener controlada la condici&oacute;n cr&oacute;nica (HTA, DMID) que presenta
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="2"> Ha tenido experiencias negativas en los servicios de salud que demoraron la decisi&oacute;n de solicitar o recibir atenci&oacute;n
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="3"> Ha tenido  dificultades econ&oacute;micas para trasladarse al centro de atenci&oacute;n, a laboratorios o dispensarios de medicamentos
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="4"> Presenta dificultades en el trabajo para asistir a las citas m&eacute;dicas
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="5"> Se le ha demorado la entrega de medicamentos
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="6"> No se le han entregado los medicamentos completos
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="7"> Ha tenido que comprar los medicamentos
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="validate[required]" id="barrera" name="barrera[]" value="8"> Otra. <input type="text" class="form-control" name="barrera-cual" placeholder="Cu&aacute;l?">
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="preguntas_cronicos_si_2" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p2">Cu&aacute;ndo fue la &uacute;ltima vez que le tomaron examenes de laboratorio</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p2" name="p2" value="1"> En los ultimos dos meses
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p2" name="p2" value="2"> Entre 3 o 6 meses
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p2" name="p2" value="12"> Mas de se&iacute;s meses
														</label>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="pas">Valor de la tensi&oacute;n Arterial tomada por el gestor en la visita (El usuario debe estar en reposo por lo menos 15 minutos, sentado)</label>
													<div class="col-md-5">
														<input type="text" class="form-control validate[required,custom[integer]]" name="tas" id="tas" value="" placeholder="TAS">
													</div>
													<div class="col-md-5">
														<input type="text" class="form-control validate[required,custom[integer]]" name="tad" id="tad" value="" placeholder="TAD">
													</div>
													<div class="col-md-2">
														mm/Hg
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="text-preg" for="p3"><b>TAS</b></label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p3" name="p3" value="1"> La TAS es menor a 140 (No incluye a 140)
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p3" name="p3" value="2"> La TAS esta entre 140 y 160
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p3" name="p3" value="12"> La TAS es mayor a 160 (No incluye a 160)
														</label>
													</div>							
												</div>   
											</div>	
										</div>
										<div class="row" id="preguntas_cronicos_si_3" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="pas">Valor de la Glucometria tomada por el gestor en la visita</label>									
													<div class="form-group">
														<div class="col-md-12">
															<label for="t_com_v">Hace cuanto ingiri&oacute; la &uacute;ltima comida</label>
														</div>
														<div class="col-md-6">
															<input type="text" class="form-control validate[required,custom[integer]]" id="t_com_v" name="t_com_v">
														</div>
														<div class="col-md-3 text-center">
															<input type="radio" class="validate[required]" id="t_com" name="t_com" value="M"><br>Minutos
														</div>
														<div class="col-md-3 text-center">
															<input type="radio" class="validate[required]" id="t_com" name="t_com" value="H"><br>Horas
														</div>													
													</div>
												</div>
											</div>
										</div>
										<div class="row" id="preguntas_cronicos_si_4" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="glucometria">Glucometria</label>
													<input type="text" class="form-control validate[required,custom[integer]]" id="glucometria" name="glucometria"> mg/dl	 	
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p4" name="p4" value="1"> De 65 a 140 mg/dl
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p4" name="p4" value="2"> De 141 a 200 mg/dl
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p4" name="p4" value="12"> Mayor o igual a 201 mg/dl
														</label>
													</div>	
												</div>
											</div>								
										</div>
									</div>
									<div class="col-md-6">						
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="vp_5">Valor de la circunferencia de la cintura del usuario, tomado por el gestor en la visita (El usuario debe estar de pie y la medida se realiza con cinta metrica a la altura del ombligo)</label>		
													<input type="text" class="form-control validate[required,custom[integer]]" id="vp_5" name="vp_5">	
													<div class="col-md-12" id="div_hombre" style="display:none">
														<label for="p5">Hombre</label>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_h" name="p5" value="1"> El PA es menor a 94 cm
															</label>
														</div>	
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_h" name="p5" value="2"> El PA esta entre 94 y 102 cm
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_h" name="p5" value="6"> El PA es mayor a 102 cm
															</label>
														</div>
													</div>
													<div class="col-md-12" id="div_mujer" style="display:none">
														<label for="p5">Mujer</label>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_m" name="p5" value="1"> El PA es menor a 80 cm
															</label>
														</div>	
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_m" name="p5" value="2"> El PA esta entre 80 y 88 cm
															</label>
														</div>
														<div class="form-check">
															<label class="form-check-label">
																<input type="radio" class="validate[required]" id="p5_m" name="p5" value="6"> El PA es mayor a 88 cm
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>	
										<div class="row" id="preguntas_cronicos_si_5" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p6">En los ultimos se&iacute;s meses ha sido hospitalizado por problemas de la tensi&oacute;n arterial o de azucar o de dolencias en el pecho</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p6" name="p6" value="1"> No
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p6" name="p6" value="2"> S&iacute;
														</label>
													</div>														
												</div>
											</div>
										</div>
										<div class="row" id="preguntas_cronicos_si_6" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p7">Por la causa de hospitalizaci&oacute;n referida en el punto anterior, ha sido hospitalizado m&aacute;s de dos veces en los ultimos se&iacute;s meses</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p7" name="p7" value="2"> No
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p7" name="p7" value="1"> S&iacute;
														</label>
													</div>	
												</div>
											</div>							
										</div>
										<div class="row" id="preguntas_cronicos_si_7" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p8">Es usted fumador activo</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p8" name="p8" value="1"> No
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p8" name="p8" value="2"> S&iacute;
														</label>
													</div>														
												</div>
											</div>							
										</div>
										<div class="row" id="preguntas_cronicos_si_8" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p9">Consume con frecuencia bebidas alcoholicas "Por lo menos una vez por semana"</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p9" name="p9" value="1"> No
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p9" name="p9" value="2"> S&iacute;
														</label>
													</div>														
												</div>
											</div>							
										</div>
										<div class="row" id="preguntas_cronicos_si_9" style="display:none">
											<div class="col-md-12">
												<div class="form-group">
													<label class="text-preg" for="p10">Realiza alguna actividad fisica (Deportiva) de manera rutinaria "Por lo menos 150 minutos a la semana"</label>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p10" name="p10" value="2"> No
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="radio" class="validate[required]" id="p10" name="p10" value="1"> S&iacute;
														</label>
													</div>														
												</div>
												<div style="display:none" id="div_deporte_cual">
													<input type="text" class="form-control validate[required]" name="cual_depo" name="cual_depo" value="" placeholder="Cu&aacute;l?">
												</div>
											</div>	
										</div>
									</div>	
									</div>									
								</div>
							</div>
							</div>
							
							<!--OBSERVACIONES-->
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-heading">
										<b><a href="#" data-toggle="tooltip" title="OBSERVACIONES">OBSERVACIONES</a></b>									
									</div>
									<div class="panel-body">
										<div class="col-md-6">										
											<div class="row">	
												<div class="form-inline">
													<div class="col-md-12">	
														<textarea name="observaciones" id="observaciones" cols="100" rows="5"></textarea>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>								
							</div>							
					</div>
					
					
					<div class="col-md-4">
						<input type="hidden" name="riesgo" id="riesgo">
						<div class="col-md-12">						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b>Riesgo</b>									
								</div>
								<div class="panel-body">
									
									<div class="col-md-6" id="semaforo">
										<div class="caja">
											<div class="circulo" id="rojo"></div>
											<div class="circulo" id="amarillo"></div>
											<div class="circulo" id="verde"></div>
										</div>
									</div>
									<div class="col-md-6 text-left">
										
										<div id="recomendaciones_verde" style="display:none">
											<!--<ul>Siga un plan saludable:	
												<li>Incluir mÁs frutas y verduras</li>
												<li>Moderar el consumo de sal</li>
												<li>No consumir bebidas azucaradas</li>
												<li>Disminuir el consumo de grasas</li>			
												<li>Practique actividad física al menos 30 minutos todos los días</li>	
												<li>Evite fumar</li> 					
												<li>Promueva espacios libres de humo de cigarrillo</li>		
												<li>Evite las bebidas alcoholicas</li>			
												<li>Asista a controles regularmente</li>			
												<li>Tome los medicamentos como lo indicaron</li>		
												<li>Disfrute la vida tomando como h&aacute;bitos las anteriores prÁcticas saludables</li>
											</ul>-->
										</div>
										<div id="recomendaciones_amarillo" style="display:none">
											<p>Cita por PyD en m&aacute;ximo 72 Horas</p>
											<div class="row">
												<div class="form-group">
													<label for="medio_cita">Porque medio agenda la cita?</label>
													<select class="form-control" id="medio_cita" name="medio_cita">
														<option value="">Seleccione...</option>											
														<option value="1">Web</option>											
														<option value="2">Chat</option>											
														<option value="3">Tel&eacute;fono</option>											
													</select>
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label for="fecha_cita">Fecha y hora de la cita</label>
													<input class="form-control" id="fecha_cita_a" name="fecha_cita">
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label for="lugar_cita">Punto de atenci&oacute;n?</label>
														<select class="form-control" id="lugar_cita" name="lugar_cita">
															<option value="">Seleccione...</option>	
															<?php
																for($i=0;$i<count($punto_atencion);$i++){
																	echo "<option value='".$punto_atencion[$i]->IdPunto."'>".$punto_atencion[$i]->NombrePunto."</option>";
																}
															?>	
														</select>
												</div>
											</div>
										</div>
										<div id="recomendaciones_rojo" style="display:none">
											<p>Cita de atenci&oacute;n medica prioritaria en m&aacute;ximo 24 horas</p>
											<div class="row">
												<div class="form-group">
													<label for="prioridad">Prioridad?</label>
													<select class="form-control validate[required]" id="prioridad" name="prioridad">
														<option value="">Seleccione...</option>											
														<option value="1">Urgencia- Translado inmediato</option>											
														<option value="2">Cita de atenci&oacute;n medica prioritaria en m&aacute;ximo 24 horas</option>											
													</select>
												</div>
											</div>
											<div id="div_agendamiento" style="display:none">
												<div class="row">
													<div class="form-group">
														<label for="medio_cita">Porque medio agenda la cita?</label>
														<select class="form-control" id="medio_cita" name="medio_cita">
															<option value="">Seleccione...</option>											
															<option value="1">Web</option>											
															<option value="2">Chat</option>											
															<option value="3">Tel&eacute;fono</option>											
														</select>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label for="fecha_cita">Fecha y hora de la cita</label>
														<input class="form-control" id="fecha_cita_r" name="fecha_cita">
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label for="fecha_cita">Canalizaci&oacute;n Espacio Vivienda</label>
														<input type="checkbox" class="form-control" id="canal_vivi" name="canal_vivi" readonly>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label for="fecha_cita">Canalizaci&oacute;n Espacio Publico</label>
														<input type="checkbox" class="form-control" id="canal_publi" name="canal_public" readonly>
													</div>
												</div>
												<div class="row">
													<div class="form-group">
														<label for="lugar_cita">Punto de atenci&oacute;n?</label>
														<select class="form-control" id="lugar_cita" name="lugar_cita">
															<option value="">Seleccione...</option>	
															<?php
																for($i=0;$i<count($punto_atencion);$i++){
																	echo "<option value='".$punto_atencion[$i]->IdPunto."'>".$punto_atencion[$i]->NombrePunto."</option>";
																}
															?>	
														</select>
													</div>
												</div>
											</div>
											<div id="div_traslado" style="display:none">									
												<div class="row">
													<div class="form-group">
														<label for="ambulancia">Identificaci&oacute;n Ambulancia</label>
														<input class="form-control" id="ambulancia" name="ambulancia">
													</div>
												</div>
											</div>	
							</div>
						</div> 
						
						</div>
						</div>
						</div>
						<div class="col-md-12" id="div_recome_materno" style="display:none">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Materno Perinatal </a></b>									
								</div>
								<div class="panel-body">
									<ul><b>Embarazo sano y feliz:</b> 
										<li>Busca atenci&oacute;n prenatal desde el principio</li>
										<li>Cuida tu alimentaci&oacute;n</li>
										<li>Tomar los suplementos vitam&iacute;nicos recomendados</li>
										<li>Haz ejercicio f&iacute;sico moderado de forma regular</li>			
										<li>Descansa</li>	
										<li>Di &ldquo;no&rdquo; al alcohol</li> 					
										<li>Disminuye el consumo de cafe&iacute;na</li>	
										<li>Elimina los riesgos ambientales &bull; Cuida de tu salud emocional</li>	
										<li>No olvides tu higiene y salud bucal</li>	
										<li>No tomar medicamentos, salvo prescripci&oacute;n m&eacute;dica</li>	
										<li>Ante cualquier signo de alarma acuda de inmediato a urgencias de su servicio de salud</li>	
										<li>Importancia de la vacunaci&oacute;n en el embarazo</li>	
										<li>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud</li>	
										<li>Si es una adolescente embarazada educar en el uso de anticonceptivos para prevenir el embarazo, y adem&aacute;s usar condones para protegerse contra enfermedades de transmisi&oacute;n sexual</li>	
										<li>Promover el acceso a la consulta de planificaci&oacute;n familiar</li>	
									</ul>
									<ul><b>Reci&eacute;n Nacido: </b>
										<li>Lavado contin&uacute;o de manos antes y despu&eacute;s de cualquier manipulaci&oacute;n del Bebe</li>
										<li>Evite las visitas especialmente personas con s&iacute;ntomas de infecciones respiratorias</li>
										<li>Asistencia a control de crecimiento y desarrollo</li>
										<li>Leche materna a libre demanda</li>
										<li>Entre m&aacute;s succi&oacute;n, m&aacute;s producci&oacute;n de leche</li>
										<li>Ante cualquier signo de alarma acuda de inmediato a urgencias de su servicio de salud</li>
									</ul>
								
								</div>
							</div>
						</div>
						<div class="col-md-12" id="div_recome_pinf" style="display:none">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Primera Infancia</a></b>									
								</div>
								<div class="panel-body">
									<p>Ni&ntilde;o y ni&ntilde;as sanos y felices</p>
									<ul>
										<li>Asistencia a control de crecimiento y desarrollo (Frecuencias seg&uacute;n edad) y el cumplimiento estricto de las citas</li>
										<li>lactancia materna exclusiva para menores de 6 meses.</li>
										<li>Alimentaci&oacute;n complementaria</li>
										<li>Ofrecer una alimentaci&oacute;n que responda a las necesidades del ni&ntilde;o.</li>
										<li>Lavado de manos para prevenir enfermedades</li>
										<li>Ofr&eacute;zcale a su hijo juguetes adecuados para su edad, como pelotas y bates de pl&aacute;stico, pero deje que escoja a qu&eacute; quiere jugar. Esto har&aacute; que moverse y estar activo sea algo divertido para &eacute;l.</li>
										<li>No olvide la higiene y salud bucal de los ni&ntilde;os y ni&ntilde;as.</li>
										<li>Educar sobre los signos de alarma de ERA y EDA y la importancia de una atenci&oacute;n oportuna.</li>
										<li>Educar sobre la prevenci&oacute;n de enfermedades respiratorias.</li>
										<li>Explicar y verificar la comprensi&oacute;n del esquema de vacunaci&oacute;n</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud.</p>
								
								</div>
							</div>							
						</div>
						<div class="col-md-12" id="div_recome_inf" style="display:none">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Infancia</a></b>									
								</div>
								<div class="panel-body">
									<ul>
										<li>Ofrecer una alimentaci&oacute;n que responda a las necesidades del ni&ntilde;o.</li>
										<li>Lavado de manos para prevenir enfermedades.</li>
										<li>Educar sobre la prevenci&oacute;n de enfermedades respiratorias.</li>
										<li>Orientar sobre las pautas adecuadas de crianza.</li>
										<li>No olvide la higiene y salud bucal.</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud.</p>
								</div>
							</div>							
						</div>
						<div class="col-md-12" id="div_recome_adol" style="display:none">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Adolescencia</a></b>									
								</div>
								<div class="panel-body">
									<ul>
										<li>Educar sobre sexualidad y derechos sexuales y reproductivos.</li>
										<li>Educar en el uso de anticonceptivos para prevenir el embarazo, y adem&aacute;s usar condones para protegerse contra enfermedades de transmisi&oacute;n sexual.</li>
										<li>Higiene y salud bucal</li>
										<li>Educaci&oacute;n en asistencia a programa de alteraciones del joven.</li>
										<li>Informar sobre actividades de detecci&oacute;n temprana del c&aacute;ncer de cuello uterino</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud.</p>
								</div>
							</div>							
						</div>
						<div class="col-md-12" id="div_recome_juve" style="display:none">
						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Juventud</a></b>									
								</div>
								<div class="panel-body">
									<ul>
										<li>Educar sobre sexualidad y derechos sexuales y reproductivos.</li>
										<li>Educar en el uso de anticonceptivos para prevenir el embarazo, y adem&aacute;s usar condones para protegerse contra enfermedades de transmisi&oacute;n sexual.</li>
										<li>Higiene y salud bucal</li>
										<li>Educaci&oacute;n en asistencia a programa de alteraciones del joven.</li>
										<li>Informar sobre actividades de detecci&oacute;n temprana del c&aacute;ncer de cuello uterino.</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud.</p>
								</div>
							</div>							
						</div>
						<div class="col-md-12" id="div_recome_adul" style="display:none">						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Adultez</a></b>									
								</div>
								<div class="panel-body">
									<ul>Siga un plan saludable:	
										<li>Incluir m&aacute;s frutas y verduras</li>
										<li>Moderar el consumo de sal</li>
										<li>No consumir bebidas azucaradas</li>
										<li>Disminuir el consumo de grasas</li>			
										<li>Practique actividad f&iacute;sica al menos 30 minutos todos los d&iacute;as</li>	
										<li>Evite fumar</li> 					
										<li>Promueva espacios libres de humo de cigarrillo</li>		
										<li>Evite las bebidas alcoholicas</li>			
										<li>Asista a controles regularmente</li>			
										<li>Tome los medicamentos como lo indicaron</li>		
										<li>Disfrute la vida tomando como h&aacute;bitos las anteriores pr&aacute;cticas saludables</li>
										<li>Motivar sobre la importancia de salud oral y evaluaci&oacute;n visual y auditiva</li>
										<li>Educaci&oacute;n en asistencia a programa de alteraciones del adulto.</li>
										<li>Informar sobre actividades de detecci&oacute;n temprana del c&aacute;ncer de cuello uterino, seno y pr&oacute;stata.</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud</p>
								</div>
							</div>							
						</div>
						<div class="col-md-12" id="div_recome_veje" style="display:none">						
							<div class="panel panel-info">
								<div class="panel-heading">
									<b><a href="#" data-toggle="tooltip" title="Recomendaciones">Recomendaciones Vejez</a></b>									
								</div>
								<div class="panel-body">
									<ul>Siga un plan saludable:	
										<li>Incluir m&aacute;s frutas y verduras</li>
										<li>Moderar el consumo de sal</li>
										<li>No consumir bebidas azucaradas</li>
										<li>Disminuir el consumo de grasas</li>			
										<li>Practique actividad f&iacute;sica al menos 30 minutos todos los d&iacute;as</li>	
										<li>Evite fumar</li> 					
										<li>Promueva espacios libres de humo de cigarrillo</li>		
										<li>Evite las bebidas alcoholicas</li>			
										<li>Asista a controles regularmente</li>			
										<li>Tome los medicamentos como lo indicaron</li>		
										<li>Disfrute la vida tomando como h&aacute;bitos las anteriores pr&aacute;cticas saludables</li>
										<li>Motivar sobre la importancia de salud oral y evaluaci&oacute;n visual y auditiva</li>
										<li>Educaci&oacute;n en asistencia a programa de alteraciones del adulto.</li>
										<li>Informar sobre actividades de detecci&oacute;n temprana del c&aacute;ncer de cuello uterino, seno y pr&oacute;stata.</li>
									</ul>
									<p>Orientar frente al reconocimiento de los servicios de salud y los atributos de la calidad de la atenci&oacute;n en salud</p>
								</div>
							</div>							
						</div>
					</div>
				</div>						                
            </fieldset>
			
			<button id="Guardar" type="submit" class="btn btn-primary submit">Guardar</button>
			
			
            
		</form>
</div>

