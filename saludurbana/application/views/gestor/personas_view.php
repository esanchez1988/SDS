
	<h2 class="titulo">
		<center>IDENTIFICACI&Oacute;N PROGRAMAS PROTECCI&Oacute;N ESPECIFICA Y DETECCI&Oacute;N TEMPRANA PARA LA GESTI&Oacute;N DEL RIESGO</center>
	</h2>
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
	<center>
		<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#registroPersona">
		  Registrar Persona
		</button>
	</center>

	<!-- Modal -->
	<div class="modal fade" id="registroPersona" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<form class="form" id="SignupForm" action="<?php echo base_url('gestor/guardarPersona')?>" method="post">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Registrar Nueva Persona</h4>
				  </div>
				  <div class="modal-body">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="t_docu">Tipo de Documento ID</label>
								<select class="form-control validate[required]" id="t_docu" name="t_docu">
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
								<input type="text" class="form-control validate[required]" id="n_docu" name="n_docu">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="enc_sexo">Sexo</label>
								<select class="form-control validate[required]" id="enc_sexo" name="enc_sexo">
									<option value="">Seleccione...</option>
									<option value="M">Hombre</option>
									<option value="F">Mujer</option>
									<option value="I">Intersexual</option>								
								</select>
							</div>						
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="p_nombre">Primer Nombre</label>
								<input type="text" class="form-control validate[required]" id="p_nombre" name="p_nombre">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="s_nombre">Segundo Nombre</label>
								<input type="text" class="form-control" id="s_nombre" name="s_nombre">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="p_apellido">Primer Apellido</label>
								<input type="text" class="form-control validate[required]" id="p_apellido" name="p_apellido">
							</div>
						</div>
						<div class="col-md-3">
							<div class="form-group">
								<label for="s_apellido">Segundo Apellido</label>
								<input type="text" class="form-control" id="s_apellido" name="s_apellido">
							</div>
						</div>
					</div>
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Guardar y diligencia ficha</button>
				  </div>
			</form>
		</div>
	  </div>
	</div>
	<table class="cell-border" id="tabla_personas">
	<thead>
		<tr>
			<th>Primer Nombre</th>
			<th>Segundo Nombre</th>
			<th>Primer Apellido</th>
			<th>Segudo Apellido</th>
			<th>Nro Identificaci&oacute;n</th>
			<!--<th>Edad</th>
			<th>Sexo</th>-->
			<th>Direcci&oacute;n</th>			
			<th>Ficha</th>
			<th>Visitas</th>
			<!--<th>Alerta</th>-->
		</tr>
	</thead>
	<?php
	for($i=0;$i<count($personas);$i++){
		$visitas = $this->gestor_model->cunsultarVisitas($personas[$i]->IdPersona);
		$visitasFicha = $this->gestor_model->cunsultarVisitasFicha($personas[$i]->IdPersona);
		?>
		<tr>
			<td><?php echo $personas[$i]->PrimerNombre?></td>
			<td><?php echo $personas[$i]->SegundoNombre?></td>
			<td><?php echo $personas[$i]->PrimerApellido?></td>
			<td><?php echo $personas[$i]->SegundoApellido?></td>
			<td><?php echo $personas[$i]->NumeroIdentificacion?></td>
			<!--<td><?php echo $personas[$i]->Edad?></td>
			<td><?php echo $personas[$i]->Sexo?></td>-->
			<td><?php echo $personas[$i]->Direccion?></td>
			<td class="text-center">
				<?php
					if(count($visitasFicha) <= 0){
						?>
						<a href="<?php echo base_url('gestor/ficha/'.$personas[$i]->IdPersona)?>">
							<i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i>
						</a>
						<?php	
					}else{
						/*
						?>
						
						<a href="#" data-toggle="modal" data-target="#infoFicha<?php echo $personas[$i]->IdPersona?>">
						  <i class="fa fa-search fa-2x" aria-hidden="true"></i>
						</a>
						
						<!-- Modal -->
						<div class="modal fade" id="infoFicha<?php echo $personas[$i]->IdPersona?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">Ficha - <?php echo $personas[$i]->PrimerNombre." ".$personas[$i]->PrimerApellido?></h4>
							  </div>
							  <div class="modal-body">
								<table class="table tmodal" border="1">
									<tr>
										<th>Fecha Registro</th>
										<td><?php echo $visitasFicha[0]->FechaRegistro?></td>
									</tr>
									<tr>
										<th>Prestador de Servicio</th>
										<td><?php echo $visitasFicha[0]->Prestador?></td>
									</tr>
									<tr>
										<th>Grupos etnicos</th>
										<td><?php echo $visitasFicha[0]->Etnia?></td>
									</tr>
									<tr>
										<th>Estado Civil</th>
										<td><?php echo $visitasFicha[0]->ECivil?></td>
									</tr>
									<tr>
										<th>Nivel Educativo</th>
										<td><?php echo $visitasFicha[0]->NEduca?></td>
									</tr>
									<tr>
										<th>Estrato Socioecon&oacute;mico</th>
										<td><?php echo $visitasFicha[0]->Estrato?></td>
									</tr>
									<tr>
										<th>Cuantas personas conforman su hogar</th>
										<td><?php echo $visitasFicha[0]->CantidadPersonasHogar?></td>
									</tr>
									<tr>
										<th>En caso de alguna complicaci&oacute;n de salud, qui&eacute;n se har&iacute;a responsable de su cuidado</th>
										<td><?php echo $visitasFicha[0]->Responsable." - ".$visitasFicha[0]->DescripcionOtroResponsable?></td>
									</tr>
									<tr>
										<th>Tiene alguna limitaci&oacute;n fisica (temporal) o discapacidad</th>
										<td>
										<?php 
											if($visitasFicha[0]->TieneLimitacionFisicaDiscapacidad == 1){
												echo "S&iacute;";
												if($visitasFicha[0]->TieneLimitacionFisicaDiscapacidad != ''){
													echo "<br>".$visitasFicha[0]->DescripcionLimitacionFisicaDiscapacidad;
												}	
											}else{
												echo "No";	
											} 
										?>										
										</td>
									</tr>
									<tr>
										<th>Cu&aacute;ndo fue la &uacute;ltima vez que asistio a consulta con medico general o internista</th>
										<td>
										<?php 
											switch($visitasFicha[0]->IdOpcionUltimaConsulta){
												case 1:
													echo "Asisti&oacute; en el ultimo mes ";
												break;
												case 2:
													echo "Asisti&oacute; en los ultimos tres meses";
												break;
												case 12:
													echo "Asisti&oacute; hace mas de tres meses ";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Cu&aacute;ndo fue la &uacute;ltima vez que le tomaron examenes de laboratorio</th>
										<td>
										<?php 
											switch($visitasFicha[0]->IdOpcionUltimaTomaLaboratorios){
												case 1:
													echo "En los ultimos dos meses  ";
												break;
												case 2:
													echo "Entre 3 o 6 meses ";
												break;
												case 12:
													echo "Mas de seís meses";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>TAS</th>
										<td><?php echo $visitasFicha[0]->Tas?></td>
									</tr>
									<tr>
										<th>TAD</th>
										<td><?php echo $visitasFicha[0]->Tad?></td>
									</tr>
									<tr>
										<th>TAS</th>
										<td>
										<?php 
											switch($visitasFicha[0]->IdOpcionTAS){
												case 1:
													echo "La TAS es menor a 140 (No incluye a 140)";
												break;
												case 2:
													echo "La TAS esta entre 140 y 160 ";
												break;
												case 12:
													echo "La TAS es mayor a 160 (No incluye a 160)";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Glucometria</th>
										<td>
										<?php 
											switch($visitasFicha[0]->IdOpcionGlucometria){
												case 1:
													echo "De 65 a 140 mg/dl";
												break;
												case 2:
													echo "De 141 a 200 mg/dl ";
												break;
												case 12:
													echo "Mayor o igual a 201 mg/dl ";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Valor del perimetro abdominal (PA) del usuario</th>
										<td><?php echo $visitasFicha[0]->ValorPerimetroAbdominal?></td>
									</tr>
									<tr>
										<th>En los ultimos se&iacute;s meses ha sido hospitalizado por problemas de la tensi&oacute;n arterial o de azucar o de dolencias en el pecho</th>
										<td>
										<?php 
											switch($visitasFicha[0]->ExisteHospitalizacionTA){
												case 1:
													echo "S&iacute;";
												break;
												case 0:
													echo "No";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Por la causa de hospitalizaci&oacute;n referida en el punto 14, ha sido hospitalizado m&aacute;s de dos veces en los ultimos seís meses</th>
										<td>
										<?php 
											switch($visitasFicha[0]->ExisteHospitalizacionTA2){
												case 1:
													echo "S&iacute;";
												break;
												case 0:
													echo "No";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Es usted fumador activo</th>
										<td>
										<?php 
											switch($visitasFicha[0]->EsFumador){
												case 1:
													echo "S&iacute;";
												break;
												case 0:
													echo "No";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Consume con frecuencia bebidas alcoholicas "Por lo menos una vez por semana"</th>
										<td>
										<?php 
											switch($visitasFicha[0]->EsBebedor){
												case 1:
													echo "S&iacute;";
												break;
												case 0:
													echo "No";
												break;
											}
										?>										
										</td>
									</tr>
									<tr>
										<th>Realiza alguna actividad fisica (Deportiva) de manera rutinaria "Por lo menos 120 minutos a la semana"</th>
										<td>
										<?php 
											switch($visitasFicha[0]->RealizaActividadFisica){
												case 1:
													echo "S&iacute;";
													if($visitasFicha[0]->DescripcionActividadFisica != ''){
														echo "<br>".$visitasFicha[0]->DescripcionActividadFisica;
													}
												break;
												case 2:
													echo "No";
												break;
											}
										?>										
										</td>
									</tr>
									<?php
									if($visitasFicha[0]->IdPrioridad != 0){
										?>
										<tr>
											<th>Prioridad?</th>
											<td>
											<?php 
												switch($visitasFicha[0]->IdPrioridad){
													case 1:
														echo "Traslado inmediato";
													break;
													case 2:
														echo "Agendamiento";
													break;
												}
											?>										
											</td>
										</tr>
										<?php
									}
									
									if($visitasFicha[0]->IdMedioCita != 0){
										?>
										<tr>
											<th>Porque medio agenda la cita?</th>
											<td>
											<?php 
												switch($visitasFicha[0]->IdMedioCita){
													case 1:
														echo "Web";
													break;
													case 2:
														echo "Chat";
													break;
													case 3:
														echo "Tel&eacute;fono";
													break;
												}
											?>										
											</td>
										</tr>
										
										<tr>
											<th>Fecha y hora de la cita</th>
											<td>
											<?php 
												echo $visitasFicha[0]->FechaCita;
											?>										
											</td>
										</tr>
										<tr>
											<th>Punto de atenci&oacute;n?</th>
											<td>
											<?php 
												echo $visitasFicha[0]->NombrePunto;
											?>										
											</td>
										</tr>
										<?php
									}
									
									
									?>
								</table>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
							  </div>
							</div>
						  </div>
						</div>
						<?php*/
						?>
						<a href="#">
						  <i class="fa fa-check fa-2x" aria-hidden="true"></i>
						</a>
						<?php
					}
				?>				
			</td>
			<td class="text-center">
				<?php 
				if(count($visitas) > 0){
					?>
					
					<!-- Button trigger modal -->
					<a class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $personas[$i]->IdPersona?>">
					  <?php echo count($visitas)." Visitas";?>
					</a>

					<!-- Modal -->
					<div class="modal fade" id="myModal<?php echo $personas[$i]->IdPersona?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Visitas realizadas a <?php echo $personas[$i]->PrimerNombre." ".$personas[$i]->PrimerApellido?></h4>
						  </div>
						  <div class="modal-body">
							<table class="table cell-border">
								<tr>
									<th>Fecha</th>
									<th>Estado</th>
								</tr>
								<?php
								
								for($v=0;$v<count($visitas);$v++){
									?>
									<tr>
										<td><?php echo $visitas[$v]->Fecha?></td>
										<td><?php echo $visitas[$v]->Nombre?></td>
									</tr>
									<?php
								}
								
								?>
							</table>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
						  </div>
						</div>
					  </div>
					</div>
					
					<?php
				}else{
					?>
					<a class="btn btn-warning">
					  <?php echo count($visitas)." Visitas";?>
					</a>
					<?php
				}
				
				?>
				
			</td>
			<!--<td>
				<?php 
				
				if(count($visitas) > 0){
					
					
					if(count($visitasFicha) > 0){
						
						if($visitasFicha[0]->IdPrioridad == 0){
							//verde o  amarillo
							if($visitasFicha[0]->IdMedioCita != 0){
								?>
								
								<a data-toggle="modal" data-target="#myModalAlerta<?php echo $personas[$i]->IdPersona?>">
								<div class="circulo-small" id="amarillo-estado"></div>
								</a>
								
								
								<div class="modal fade" id="myModalAlerta<?php echo $personas[$i]->IdPersona?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Visitas realizadas a <?php echo $personas[$i]->PrimerNombre." ".$personas[$i]->PrimerApellido?></h4>
									  </div>
									  <div class="modal-body">
										<table class="table cell-border">
											<tr>
												<th>Fecha</th>
												<th>Estado</th>
												<th>Tipo Medio Agendamiento</th>
												<th>Fecha Agendamiento</th>
												<th>Punto de atenci&oacute;n</th>
											</tr>
											<tr>
												<td><?php echo $visitasFicha[0]->Fecha?></td>
												<td><?php echo $visitasFicha[0]->Nombre?></td>
												<td>
												<?php 
													if($visitasFicha[0]->IdMedioCita == 1){
														echo "Web";
													}else if($visitasFicha[0]->IdMedioCita == 2){
														echo "Chat";
													}else if($visitasFicha[0]->IdMedioCita == 3){
														echo "Tel&eacute;fono";
													}												
												?>												
												</td>
												<td><?php echo $visitasFicha[0]->FechaCita?></td>
												<td><?php 
													echo $visitasFicha[0]->NombrePunto;			
												?>
												</td>
											</tr>
										</table>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>
								
								
								<?php
							}else{
								?>
								<div class="circulo-small" id="verde-estado"></div>
								<?php
							}
						}else if($visitasFicha[0]->IdPrioridad == 1 || $visitasFicha[0]->IdPrioridad == 2){
							//rojo
							?>
								<a data-toggle="modal" data-target="#myModalAlerta<?php echo $personas[$i]->IdPersona?>">
									<div class="circulo-small" id="rojo-estado"></div>
								</a>
								
								
								<div class="modal fade" id="myModalAlerta<?php echo $personas[$i]->IdPersona?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								  <div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Visitas realizadas a <?php echo $personas[$i]->PrimerNombre." ".$personas[$i]->PrimerApellido?></h4>
									  </div>
									  <div class="modal-body">
										<table class="table cell-border">
											<tr>
												<th>Fecha</th>
												<th>Estado</th>
												<th>Prioridad</th>
												<th>Tipo Medio Agendamiento</th>
												<th>Fecha Agendamiento</th>
												<th>Punto Atenci&oacute;n</th>
												<th>Observaciones</th>
											</tr>
											<tr>
												<td><?php echo $visitasFicha[0]->Fecha?></td>
												<td><?php echo $visitasFicha[0]->Nombre?></td>
												<td>
												<?php 
													if($visitasFicha[0]->IdPrioridad == 1){
														echo "Traslado inmediato";
													}else if($visitasFicha[0]->IdMedioCita == 2){
														echo "Agendamiento";
													}												
												?>												
												</td>
												<td>
												<?php 
													if($visitasFicha[0]->IdMedioCita == 1){
														echo "Web";
													}else if($visitasFicha[0]->IdMedioCita == 2){
														echo "Chat";
													}else if($visitasFicha[0]->IdMedioCita == 3){
														echo "Tel&eacute;fono";
													}												
												?>												
												</td>
												<td><?php echo $visitasFicha[0]->FechaCita?></td>
												<td><?php 
													echo $visitasFicha[0]->NombrePunto;													
												?>
												</td>
												<td><?php echo $visitasFicha[0]->ObsPrioridad?></td>
											</tr>
										</table>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
									  </div>
									</div>
								  </div>
								</div>							
							<?php
						}
					}else{
						?>
						<div class="circulo-small" id="negro-estado"></div>
						<?php
					}
				}else{
					?>
					<div class="circulo-small" id="negro-estado"></div>
					<?php
				}
				
				?>
			</td>-->
		</tr>
		<?php
	}
	?>
	</table>