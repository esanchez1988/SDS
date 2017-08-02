<form class="form" id="SignupForm" action="<?php echo base_url('gestor/guardarFicha')?>" method="post">

<div class="row">
<div class="col-md-12">

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
					<div class="col-md-3">
						<div class="form-group">
							<label for="cedula">No Identificaci&oacute;n</label>
							<input type="text" class="form-control validate[required, custom[integer]]" id="cedula" name="cedula">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="nombre">Nombre</label>
							<input type="text" class="form-control validate[required]" id="nombre" name="nombre">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="correo">Correo</label>
							<input type="text" class="form-control validate[custom[email]]" id="correo" name="correo">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="sexo">Sexo</label>
							<select class="form-control validate[required]" id="sexo" name="sexo">
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($sexo);$i++){
										echo "<option value='".$sexo[$i]->id_sexo."'>".$sexo[$i]->desc_sexo."</option>";
									}
								?>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3" id="div_sexopr" style="display:none">
						<div class="form-group">
							<label for="sexopr">Sexo principal</label>
							<select class="form-control validate[required]" id="sexopr" name="sexopr">
								<option value="">Seleccione...</option>
								<?php
									for($i=0;$i<count($sexo);$i++){
										if($sexo[$i]->id_sexo == 1 || $sexo[$i]->id_sexo == 2){
											echo "<option value='".$sexo[$i]->id_sexo."'>".$sexo[$i]->desc_sexo."</option>";
										}										
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="enc_fech_nac">Fecha de Nacimiento</label>
							<input type="text" class="form-control validate[required]" id="enc_fech_nac" name="enc_fech_nac" placeholder="AAAA-MM-DD" readonly>
						</div>							
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="enc_edad">Edad</label>
							<input type="text" class="form-control validate[required]" id="enc_edad" name="enc_edad" readonly>
							<input type="text" class="form-control validate[required]" id="enc_meses" name="enc_meses" readonly style="display:none">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="enc_peso">Peso (Kg)</label>
							<input type="text" class="form-control validate[required, maxSize[3], custom[integer]]" id="enc_peso" name="enc_peso">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="enc_talla">Talla (Cm)</label>
							<input type="text" class="form-control validate[required, maxSize[3], custom[integer]]" id="enc_talla" name="enc_talla">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">					
					<div class="col-md-4">
						<div class="form-group">
							<label for="enc_imc">IMC</label>
							<input type="text" class="calcular form-control validate[required]" id="enc_imc" name="enc_imc" readonly>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="des_imc">Clasificaci&oacute;n IMC</label>
							<input type="text" class="calcular form-control validate[required]" id="des_imc" name="des_imc" readonly>
						</div>							
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="enc_pa">Circunferencia de la cintura (Cm)</label>
							<input type="text" class="calcular form-control validate[required, maxSize[3], custom[integer]]" id="enc_pa" name="enc_pa">
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<fieldset>
						<legend>Registro Actividad</legend>
						<table class="table" id="tabla_ejercicio">
							<tr>
								<th>Ejercicio Realizado</th>
								<th>Punto de salud</th>
								<!--<th>Frecuencia Cardiaca</th>
								<th>Frecuencia Respiratoria</th>-->
							</tr>
							<tr>
								<td>
									<select class="form-control validate[required]" name="ejercicio" id="ejercicio">
										<option value="">Seleccione</option>
										<option value="pie">Pie</option>
										<option value="bici">Bicicleta</option>
									</select>
								</td>
								<td>
									<select class="form-control validate[required]" id="psalud" name="psalud">
										<option value="">Seleccione...</option>
										<?php
											for($i=0;$i<count($psalud);$i++){
												
												if($psalud[$i]->zona != $psalud[$i-1]->zona){
													echo "</optgroup>";
													echo "<optgroup label='".$psalud[$i]->zona."'>";
												}
												
												if($this->session->userdata('punto_atencion') && $this->session->userdata('punto_atencion') == $psalud[$i]->id_punto){
													echo "<option value='".$psalud[$i]->id_punto."' selected>".$psalud[$i]->zona." - ".$psalud[$i]->direccion."</option>";
												}else{
													echo "<option value='".$psalud[$i]->id_punto."'>".$psalud[$i]->zona." - ".$psalud[$i]->direccion."</option>";	
												}
												
											}
										?>
									</select>
								</td>
								<!--<td>
									<input type="text" class="form-control validate[required, maxSize[3], custom[integer]]" id="enc_fc" name="enc_fc">
								</td>
								<td>
									<input type="text" class="form-control validate[required, maxSize[3], custom[integer]]" id="enc_fr" name="enc_fr">
								</td>-->
							</tr>
						</table>	
					</fieldset>
				</div>
				<hr>
				<div class="row">
					<div id="pr_adultos" style="display:none">					
						<div class="col-md-6">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="enc_imc">¿Realiza diariamente al menos 30 minutos de actividad f&iacute;sica, en el trabajo y/o en el tiempo libre?</label>																						
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="actividad" id="actividad" value="Si"> Si</label>
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="actividad" id="actividad" value="No"> No</label>
									</div>							
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="enc_imc"> ¿Usted consume alg&uacute;n producto derivado del tabaco? (Cigarrillo, puro, pipa, tabaco en polvo, tabaco para mascar)</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="tabaco" id="tabaco" value="Si"> Si</label>
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="tabaco" id="tabaco" value="No"> No</label>
									</div>							
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="enc_imc">Con qu&eacute; frecuencia come verduras o frutas?</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="frutas" id="frutas" value="Td"> Todos los d&iacute;as</label>
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="frutas" id="frutas" value="Ntd"> No todos los d&iacute;as</label>
									</div>							
								</div>
							</div>
							<hr>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="enc_imc">Consume con frecuencia bebidas alcoh&oacute;licas?</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="bebidas" id="bebidas" value="Td"> Todos los d&iacute;as</label>
										<label class="checkbox-inline"><input type="radio" class="calcular form-control validate[required]" name="bebidas" id="bebidas" value="Ntd"> No todos los d&iacute;as</label>
									</div>							
								</div>
							</div>				
							<hr>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="enc_pa">Tensi&oacute;n Arterial</label>							
									</div>							
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="enc_pa">TAS</label>
										<input type="text" class="calcular form-control validate[required, maxSize[3], custom[integer]]" id="tas" name="tas">							
									</div>						
								</div>	
								<div class="col-md-3">
									<div class="form-group">
										<label for="enc_pa">TAD</label>
										<input type="text" class="calcular form-control validate[required, maxSize[3], custom[integer]]" id="tad" name="tad">							
									</div>						
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for="ejercicio">Tratamiento</label><br>
										<label class="checkbox-inline"><input type="radio" class="calcular validate[required]" name="tratamiento" id="tratamiento" value="Si"> Si</label>
										<label class="checkbox-inline"><input type="radio" class="calcular validate[required]" name="tratamiento" id="tratamiento" value="No"> No</label>															
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="col-md-12" id="semaforo">
								<div class="caja">
									<div class="circulo" id="rojo"></div>
									<div class="circulo" id="amarillo"></div>
									<div class="circulo" id="verde"></div>
								</div>
							</div>
							<div class="row">
								<input type="hidden" id="tipo_alerta" name="tipo_alerta" value="">
								<center><button type="button" class="btn btn-success" id="btn_recomendaciones">Ver Recomendaciones</button></center>
								<center><button type="button" class="btn btn-warning" id="btn_riesgos">Calcular Riesgo</button></center>
							</div>
						</div>
					
					</div>	
				</div>
				
			</fieldset>							                
            
				
			
	
</div>
<div class="modal fade bs-example-modal-lg" id="modal_info1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<center>
			<img src="<?php echo base_url('assets/imgs/infografia_1.png');?>" width="50%">
		</center>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_info2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<center>
			<img src="<?php echo base_url('assets/imgs/infografia_2.png');?>" width="50%">
		</center>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_info3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<center>
			<img src="<?php echo base_url('assets/imgs/infografia_3.png');?>" width="50%">
		</center>
    </div>
  </div>
</div>
<div class="modal fade bs-example-modal-lg" id="modal_info4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
		<center>
			<img src="<?php echo base_url('assets/imgs/infografia_4.png');?>" width="50%"> 
		</center>      
    </div>
  </div>
</div>
<div class="col-md-5">
	
	<div class="row">
			
		<div id="act_reg" style="display:none">
			<fieldset>
			<legend>Actividad Registrada</legend>
				<table class="table" id="reg_ejercicio">
					<thead>
						<tr>
							<th>Fecha</th>
							<th>Ejercicio Realizado</th>
							<th>Punto de salud</th>
							<th>Frecuencia Cardiaca</th>
							<th>Frecuencia Respiratoria</th>
						</tr>
					</thead>
					<tbody>
					
					</tbody>
				</table>	
			</fieldset>
		</div>
			
		
	</div>

	<!--<div id="map" class="gmap3"></div>-->
<script>

	

  $(function () {
	
	//var image = '<?php echo base_url('assets/imgs/corazon.png');?>';
	var image = {
		url: "<?php echo base_url('assets/imgs/corazon.png');?>", // url
		scaledSize: new google.maps.Size(20, 20)
	};
	  
    $('#map')
      .gmap3({
        center: [4.732031298867921, -74.04908937548828],
        zoom: 14,
        mapTypeId : google.maps.MapTypeId.ROADMAP
      })
      .route({
        origin:[4.760130002429105, -74.06584781741333],
        destination:[4.694746365781855, -74.03434795474243],
        travelMode: google.maps.DirectionsTravelMode.WALKING
      })
      .directionsrenderer(function (results) {
        if (results) {
          return {
            //panel: $("<div></div>").addClass("gmap3").insertAfter($("#map")), // accept: string (jQuery selector), jQuery element or HTML node targeting a div
            //directions: results
          }
        }
      })
	  .marker([
		<?php
			for($i=0;$i<count($psalud);$i++){
				echo "{position:[".$psalud[$i]->latitud.", ".$psalud[$i]->longitud."], icon: image},";
			}
		?> 
      ])
    ;
  });
</script>
</div>
</div>
<div class="row center">
	<div class="col-md-6 col-md-offset-3">
		<button id="Guardar" type="submit" class="btn btn-success submit">Guardar</button>
		<button id="Limpiar" type="reset" class="btn btn-danger">Limpiar</button>
	</div>	
</div>

</form>
