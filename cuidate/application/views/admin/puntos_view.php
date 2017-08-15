<form class="form" id="formPuntos" method="post">

<div class="row">
<div class="col-md-10 col-md-offset-1">

	<?php
	$mensajeExito = $this->session->flashdata('mensajeExito');
	
	if($mensajeExito){
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Correcto!</strong> <?php echo $mensajeExito;?>
		</div>
		<?php
	}
	
	$mensajeError = $this->session->flashdata('mensajeError');
	
	if($mensajeError){
		?>
		<div class="alert alert-warning alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Error!</strong> <?php echo $mensajeError;?>
		</div>
		<?php
	}
	?>
			<fieldset>
                <legend>Informaci&oacute;n General</legend>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
						<label for="nombre">Punto</label>
						<select class="form-control" id="psalud" name="psalud">
							<option value="">Seleccione...</option>
							<?php
								for($i=0;$i<count($psalud);$i++){
									
									if($psalud[$i]->zona != $psalud[$i-1]->zona){
										echo "</optgroup>";
										echo "<optgroup label='".$psalud[$i]->Nombre."'>";
									}
									
									echo "<option value='".$psalud[$i]->id_punto."'>".$psalud[$i]->direccion."</option>";
									
								}
							?>
						</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="nombre">Nombre Punto</label>
							<input type="text" class="form-control validate[required]" id="nombre" name="nombre">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="direccion">Direcci&oacute;n</label>
							<input type="text" class="form-control validate[required]" id="direccion" name="direccion">
						</div>
					</div>					
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="subred">Subred</label>
							<select class="form-control validate[required]" id="subred" name="subred">
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($subred);$i++){
										echo "<option value='".$subred[$i]->idSubRed."'>".$subred[$i]->Nombre."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tipo_escenario">Tipo Escenario</label>
							<select class="form-control validate[required]" id="tipo_escenario" name="tipo_escenario">
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($tipo_escenario);$i++){
										echo "<option value='".$tipo_escenario[$i]->id_tipo."'>".$tipo_escenario[$i]->desc_tipo."</option>";
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="latitud">Latitud</label>
							<input type="text" class="form-control validate[required]" id="latitud" name="latitud">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="longitud">Longitud</label>
							<input type="text" class="form-control validate[required]" id="longitud" name="longitud">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="estado">Estado</label>
							<select class="form-control validate[required]" id="estado" name="estado">
								<option value="">Seleccione...</option>
								<option value="AC">Activo</option>
								<option value="IN">Inactivo</option>
							</select>
						</div>
					</div>					
				</div>
				<hr>
				<div class="row center">
						<button id="Guardar" type="submit" class="btn btn-success" id="btn-guardar">Guardar</button>
				</div>
				
			</fieldset>							                
            
				
			
	
</div>

</div>


</form>
<br><br>