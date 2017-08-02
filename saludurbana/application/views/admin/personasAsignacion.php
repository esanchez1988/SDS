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
<div class="col-md-12">            
	<br>
	<div class="panel panel-default">
		<div class="panel-heading text-right">
			<div class="nav">				
				<div class="btn-group pull-left" data-toggle="buttons">
					<label>
						Consulta Personas
					</label>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped" id="tablaUsuarios">
				<thead>
					<tr class="text-center">					
						<th class="text-center">ID Persona</th>
						<th class="text-center">Primer Nombre</th>
						<th class="text-center">Segundo Nombre</th>
						<th class="text-center">Primer Apellido</th>
						<th class="text-center">Segundo Apellido</th>
						<th class="text-center">N&uacute;mero Identificacion</th>
						<th class="text-center">Fecha Nacimiento</th>
						<th class="text-center">Edad</th>
						<th class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for ($i = 0; $i < count($persona); $i++) {
					
					?>						
					<tr>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->IdPersona)?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->PrimerNombre)?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->SegundoNombre) ?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->PrimerApellido) ?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->SegundoApellido) ?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->NumeroIdentificacion) ?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->FechaNacimiento) ?></td>
						<td class="text-center"><?php echo utf8_decode($persona[$i]->Edad) ?></td>						
						<td class="text-center">
							<div class="row text-center">
								<div class="col-md-12">
									<a href="<?php echo base_url('admin/asignarPersona/'.$persona[$i]->IdPersona."/".$id_gestor)?>">
										<img src="<?php echo base_url('assets/imgs/tarjeta.png')?>" alt="Editar" width="45px"/><br>Asignar
									</a>							
								</div>
							</div>							
						</td>
					</tr>
					<?php
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

