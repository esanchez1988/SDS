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
	
?>
<script src="<?php echo base_url('assets/js/datos.js')?>"></script>
<h2 class="titulo">
	<center>ACTUALIZACI&Oacute;N DE DATOS PERSONALES</center>
</h2>
<div id="efectiva">
<form class="form" id="SignupForm" action="<?php echo base_url('admin/actualizarPersona')?>" method="post">
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
								<option value="">Seleccione...</option>
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
								<option value="">Seleccione...</option>
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
								<option value="">Seleccione...</option>
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
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[2]]" id="dir2" name="dir2" placeholder="N&uacute;mero" size="5">
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[2]]" id="dir3" name="dir3" placeholder="Letra" size="5">
									<input type="checkbox" class="form-control]" id="dir4" name="dir4" > BIS
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[2]]" id="dir5" name="dir5" placeholder="Letra" size="5">
									<select name="dir6" id="dir6" class="form-control">
										<option value="">Seleccione...</option>
										<option value="Sur">Sur</option>
										<option value="Este">Este</option>
									</select>
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[2]]" id="dir7" name="dir7" placeholder="N&uacute;mero" size="5">
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[2]]" id="dir8" name="dir8" placeholder="Letra" size="5">
									<input type="checkbox" class="form-control]" id="dir9" name="dir9" > BIS
									<input type="text" class="form-control validate[custom[onlyLetterSp],minSize[1],maxSize[2]]" id="dir10" name="dir10" placeholder="Letra" size="5">
									<input type="text" class="form-control validate[custom[integer],minSize[1],maxSize[2]]" id="dir11" name="dir11" placeholder="N&uacute;mero" size="5">
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
				
			<button id="Guardar" type="submit" class="btn btn-primary submit">Guardar</button>
			
		</form>
</div>

