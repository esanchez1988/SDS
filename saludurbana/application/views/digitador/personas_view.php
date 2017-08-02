<?php

if(count($personas) > 0){
	?>
	<h2 class="titulo">
		<center>SEGUIMIENTO CITA INICIAL</center>
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
	<table class="cell-border" id="tabla_personas">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Nro Identificaci&oacute;n</th>			
			<th>Direcci&oacute;n</th>
			<th>Gestor</th>
			<th>Visitas</th>
			<th>Prioridad</th>
			<th>Alerta</th>
			<th>Semaforo</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<?php
	for($i=0;$i<count($personas);$i++){
		$visitas = $this->seguimiento_model->consultarVisitas($personas[$i]->IdPersona);
		$visitasFicha = $this->seguimiento_model->consultarVisitasFicha($personas[$i]->IdPersona);
		?>
		<tr>
			<td><?php echo $personas[$i]->PrimerNombre." ".$personas[$i]->SegundoNombre." ".$personas[$i]->PrimerApellido." ".$personas[$i]->SegundoApellido?></td>
			<td><?php echo $personas[$i]->NumeroIdentificacion?></td>			
			<td><?php echo $personas[$i]->Direccion?></td>
			<td><?php echo $personas[$i]->username?></td>
			
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
			<td><?php echo $visitasFicha[0]->prioridad?></td>
			<td>
				<ul>
				
				</ul>
				<?php 
				
				if(count($visitas) > 0){										
					if(count($visitasFicha) > 0){
						$bandera = 0;
						if($visitasFicha[0]->IdPrioridad == 2){
							if($visitasFicha[0]->FechaCita == '0000-00-00 00:00:00'){
								echo "<li>Sin fecha de cita asignada</li>";
								$bandera = 1;
							}else if($visitasFicha[0]->FechaCita < date('Y-m-d H:i:s') && $visitasFicha[0]->Asistio != 'SI'){
								echo "<li>Fecha de cita vencida y sin asistencia</li>";
								$bandera = 1;
							}else if($visitasFicha[0]->FechaCita < date('Y-m-d H:i:s') && $visitasFicha[0]->Asistio == 'SI'){
								echo "<li>Fecha de cita vencida y con asistencia</li>";
								$bandera = 3;
							}else if($visitasFicha[0]->FechaCita  > date('Y-m-d H:i:s')){
								echo "<li>Fecha de cita pendiente por cumplir</li>";
								$bandera = 2;
							}
						}else if($visitasFicha[0]->IdPrioridad == 1){
							if($visitasFicha[0]->Asistio == 'SI'){
								echo "<li>Urgencia atendida</li>";
								$bandera = 3;
							}else if($visitasFicha[0]->Asistio != 'SI'){
								echo "<li>Con Urgencia - Sin actualizar asistencia</li>";
								$bandera = 2;
							}
						}
					}
				}
				
				?>
			</td>
			<td>
				<?php 
				
				if($bandera == 1){
					?>
					<a data-toggle="modal" data-target="#myModalAlerta<?php echo $personas[$i]->IdPersona?>">
						<div class="circulo-small" id="rojo-estado"></div>
					</a>
					<?php
				}else if($bandera == 2){
					?>
					<a data-toggle="modal" data-target="#myModalAlerta<?php echo $personas[$i]->IdPersona?>">
						<div class="circulo-small" id="amarillo-estado"></div>
					</a>
					<?php
				}else if($bandera == 3){
					?>
					<div class="circulo-small" id="verde-estado"></div>
					<?php
				}else if($bandera == 0){
					?>
						<div class="circulo-small" id="negro-estado"></div>
					<?php
				}
				
				?>
								
				<!-- Modal -->
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
								<td><?php echo $visitasFicha[0]->fecha?></td>
								<td><?php echo $visitasFicha[0]->Nombre?></td>
								<td><?php echo $visitasFicha[0]->prioridad?></td>
								<td><?php echo $visitasFicha[0]->medio?></td>												
								<td><?php echo $visitasFicha[0]->FechaCita?></td>
								<td><?php echo $visitasFicha[0]->NombrePunto?></td>
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
								
			</td>
			<td class="text-center">
				<a href="<?php echo base_url('digitador/seguimiento/gestionar/'.$personas[$i]->IdPersona)?>">
					<img src="<?php echo base_url('assets/imgs/tarjeta.png')?>"><br>Gestionar
				</a>
			</td>
		</tr>
		<?php
	}
	?>
	</table>
	<?php
}


?>