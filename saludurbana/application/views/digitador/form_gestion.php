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
	
<?php //var_dump($datos_persona)?>
<h2 class="titulo">
		<center><?php echo $datos_persona[0]->PrimerNombre." ".$datos_persona[0]->SegundoNombre." ".$datos_persona[0]->PrimerApellido." ".$datos_persona[0]->SegundoApellido?></center>
	</h2>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="col-md-6">
			<p><b>Nombre: </b><?php echo $datos_persona[0]->PrimerNombre." ".$datos_persona[0]->SegundoNombre." ".$datos_persona[0]->PrimerApellido." ".$datos_persona[0]->SegundoApellido?></p>
			<p><b>Identificaci&oacute;n: </b><?php echo $datos_persona[0]->NumeroIdentificacion?></p>			
			<p><b>Direcci&oacute;n: </b><?php echo $datos_persona[0]->Direccion?></p>
			<p><b>Tel&eacute;fono: </b><?php echo $datos_persona[0]->Telefono?></p>
		</div>
		<div class="col-md-6">
			<center>
			<a data-toggle="modal" data-target="#myModalNuevaCita">
			  <img src="<?php echo base_url('assets/imgs/persona.png')?>"><br>Actualizar Datos
			</a>
			</center>
		</div>
		
	</div>	
</div>

<?php
if($datos_persona[0]->IdPrioridad > 0){
	
	?>
	<div class="panel panel-info">
	  <div class="panel-heading">
		<h3 class="panel-title">Cita asignada en la visita</h3>
	  </div>
	  <div class="panel-body">
		<table class="table cell-border">
			<tr>
				<th>Fecha</th>
				<th>Estado</th>
				<th>Prioridad</th>
				<th>Tipo Medio Agendamiento</th>
				<th>Fecha Agendamiento</th>
				<th>Punto Atenci&oacute;n</th>
				<th>Observaciones</th>
				<th>Asistencia</th>
				<th>Actualizar</th>
			</tr>
			<tr>
				<td><?php echo $datos_persona[0]->fecha?></td>
				<td><?php echo $datos_persona[0]->Nombre?></td>
				<td><?php echo $datos_persona[0]->prioridad?></td>
				<td><?php echo $datos_persona[0]->medio?></td>												
				<td><?php echo $datos_persona[0]->FechaCita?></td>
				<td><?php echo $datos_persona[0]->NombrePunto?></td>
				<td><?php echo $datos_persona[0]->ObsPrioridad?></td>
				<td><?php echo $datos_persona[0]->Asistio?></td>
				<td>
					<a data-toggle="modal" data-target="#myModalCitaInicial">
					  <img src="<?php echo base_url('assets/imgs/tarjeta.png')?>"><br>
					</a>
					
					<!-- Modal -->
					<div class="modal fade" id="myModalCitaInicial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
						<form name="form_cita" id="form_cita" action="<?php echo base_url('digitador/guardarSeguimiento')?>" method="post">>
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Actualizar Visita <?php echo $datos_persona[0]->PrimerNombre." ".$datos_persona[0]->PrimerApellido?></h4>
						  </div>
						  <div class="modal-body">
							<div class="form-group">
								<fieldset><b>Fecha Cita:</b></fieldset>
								<input name="fecha_cita" id="fecha_cita" class="form-control" value="<?php echo $datos_persona[0]->FechaCita?>" readonly>
							</div>
							<div class="form-group">
								<fieldset><b>Asistencia:</b></fieldset>
								<select name="asistencia" id="asistencia" class="form-control">
									<option value="NO"<?php	if($datos_persona[0]->Asistio == 'NO'){ echo "seleted";}?>>NO</option>
									<option value="SI"<?php	if($datos_persona[0]->Asistio == 'SI'){ echo "seleted";}?>>SI</option>									
								</select>
							</div>
							<div class="form-group">
								<fieldset><b>Razon no asistencia:</b></fieldset>
								<select name="razon_asistencia" id="razon_asistencia" class="form-control">
									<?php									
									for($i=0;$i<count($razon_asistencia);$i++){
										echo "<option value='".$razon_asistencia[$i]->id_razon_asistencia."'>".$razon_asistencia[$i]->desc_razon_asistencia."</option>";
									}									
									?>					
								</select>
							</div>
							<div class="form-group">
								<fieldset><b>Tipo de seguimiento:</b></fieldset>
								<select name="tipo_seguimiento" id="tipo_seguimiento" class="form-control">
									<?php									
									for($i=0;$i<count($tipo_seguimiento);$i++){
										echo "<option value='".$tipo_seguimiento[$i]->id_tipo_seguimiento."'>".$tipo_seguimiento[$i]->desc_tipo_seguimiento."</option>";
									}									
									?>					
								</select>
							</div>	
							<div class="form-group">
								<fieldset><b>Resultado Seguimiento:</b></fieldset>
								<select name="razon_seguimiento" id="razon_seguimiento" class="form-control">
									<?php									
									for($i=0;$i<count($razon_seguimiento);$i++){
										echo "<option value='".$razon_seguimiento[$i]->id_razon_seguimiento."'>".$razon_seguimiento[$i]->desc_razon_seguimiento."</option>";
									}									
									?>					
								</select>
							</div>	
							<div class="form-group">
								<fieldset><b>Observaciones:</b></fieldset>
								<textarea name="observaciones" id="observaciones" class="form-control"></textarea>
							</div>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn btn-success">Guardar</button>
						  </div>
						  </form>
						</div>
					  </div>
					</div>
				</td>
			</tr>
		</table>
	  </div>
	</div>
	
	
	<?php
}
?>

<div class="panel panel-info">
  <div class="panel-heading">
	<h3 class="panel-title">Seguimiento de citas</h3>
  </div>
  <div class="panel-body">
	<center>
		<a data-toggle="modal" data-target="#myModalNuevaCita">
		  <img src="<?php echo base_url('assets/imgs/hospital.png')?>"><br>Agendar Nueva Cita
		</a>
		
		<!-- Modal -->
		<div class="modal fade" id="myModalNuevaCita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
			<form name="form_cita" id="form_cita" action="<?php echo base_url('digitador/guardarSeguimiento')?>" method="post">>
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nueva Cita <?php echo $datos_persona[0]->PrimerNombre." ".$datos_persona[0]->PrimerApellido?></h4>
			  </div>
			  <div class="modal-body">
				<div class="form-group">
					<fieldset><b>Fecha Cita:</b></fieldset>
					<input name="fecha_cita" id="fecha_cita" class="form-control" value="" readonly>
				</div>
				<div class="form-group">
					<fieldset><b>Asistencia:</b></fieldset>
					<select name="asistencia" id="asistencia" class="form-control">
						<option value="NO"<?php	if($datos_persona[0]->Asistio == 'NO'){ echo "seleted";}?>>NO</option>
						<option value="SI"<?php	if($datos_persona[0]->Asistio == 'SI'){ echo "seleted";}?>>SI</option>									
					</select>
				</div>
				<div class="form-group">
					<fieldset><b>Razon no asistencia:</b></fieldset>
					<select name="razon_asistencia" id="razon_asistencia" class="form-control">
						<?php									
						for($i=0;$i<count($razon_asistencia);$i++){
							echo "<option value='".$razon_asistencia[$i]->id_razon_asistencia."'>".$razon_asistencia[$i]->desc_razon_asistencia."</option>";
						}									
						?>					
					</select>
				</div>
				<div class="form-group">
					<fieldset><b>Tipo de seguimiento:</b></fieldset>
					<select name="tipo_seguimiento" id="tipo_seguimiento" class="form-control">
						<?php									
						for($i=0;$i<count($tipo_seguimiento);$i++){
							echo "<option value='".$tipo_seguimiento[$i]->id_tipo_seguimiento."'>".$tipo_seguimiento[$i]->desc_tipo_seguimiento."</option>";
						}									
						?>					
					</select>
				</div>	
				<div class="form-group">
					<fieldset><b>Resultado Seguimiento:</b></fieldset>
					<select name="razon_seguimiento" id="razon_seguimiento" class="form-control">
						<?php									
						for($i=0;$i<count($razon_seguimiento);$i++){
							echo "<option value='".$razon_seguimiento[$i]->id_razon_seguimiento."'>".$razon_seguimiento[$i]->desc_razon_seguimiento."</option>";
						}									
						?>					
					</select>
				</div>	
				<div class="form-group">
					<fieldset><b>Observaciones:</b></fieldset>
					<textarea name="observaciones" id="observaciones" class="form-control"></textarea>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-success">Guardar</button>
			  </div>
			  </form>
			</div>
		  </div>
		</div>
	</center>
	<table class="table cell-border">
		<tr>
			<th>Fecha</th>
			<th>Estado</th>
			<th>Tipo de cita</th>
			<th>Tipo Medio Agendamiento</th>
			<th>Fecha Agendamiento</th>
			<th>Punto Atenci&oacute;n</th>
			<th>Observaciones</th>
			<th>Asistencia</th>
			<th>Actualizar</th>
		</tr>		
	</table>
  </div>
</div>