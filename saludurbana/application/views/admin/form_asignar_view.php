<?php
$errorBD = $this->session->flashdata('errorBD');
if ($errorBD) {
    ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <strong>Error!</strong> <?php echo $errorBD ?>
    </div>
    <?php
}

$registroExitoso = $this->session->flashdata('registroExitoso');
if ($registroExitoso) {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <strong>OK!</strong> <?php echo $registroExitoso ?>
    </div>
    <?php
}
?>
<script>
$(document).ready(function() {
	
	$('#tablaUsuarios').DataTable({
		language: {
			search:         "Buscar:",
			lengthMenu:    "Ver _MENU_ registros",
			info:           "Viendo _START_ a _END_ de _TOTAL_ entradas",
			infoEmpty:      "No se encontraron resultados",
			paginate: {
				first:      "Primero",
				previous:   "Previo",
				next:       "Siguiente",
			}
		}
	});
	
});
</script>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<center>
			<h2>ASIGNACI&Oacute;N DE PERSONAS - GESTOR <?php echo $usuario[0]->username?></h2>
		</center>
		<br>			
	</div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    	<div class="row">
    		<div class="col-md-12">
				<div class="form-group">
					<fieldset><b>Asignar Usuario:</b></fieldset>
					<input type="text" class="form-control" name="nume_iden_consulta" id="nume_iden_consulta" placeholder="Numero de identificaci&oacute;n">
					<input type="hidden" class="form-control" name="id_gestor" id="id_gestor" value="<?php echo $usuario[0]->id?>">
				</div>    			
    		</div>  
    	</div>        
    </div>
</div><br>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<center>
			<button class="btn btn-success" id="btn-buscar-asig">Consultar</button>	
		</center>		
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="informacion">
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
		<div class="panel-heading text-right">
			<div class="nav">				
				<div class="btn-group pull-left" data-toggle="buttons">
					<label>
						Personas Asignadas
					</label>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped" id="tablaUsuarios">
				<thead>
					<tr class="text-center">
						<th class="text-center">ID Persona</th>
						<th class="text-center">Nombre</th>
						<th class="text-center">N&uacute;mero Identificaci&oacute;n</th>
						<th class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for ($i = 0; $i < count($personas); $i++) {
					
					?>						
					<tr>
						<td class="text-center"><?php echo utf8_decode($personas[$i]->IdPersona)?></td>
						<td class="text-center"><?php echo utf8_decode($personas[$i]->PrimerNombre)." ".utf8_decode($personas[$i]->SegundoNombre)." ".utf8_decode($personas[$i]->PrimerApellido)." ".utf8_decode($personas[$i]->SegundoApellido)?></td>
						<td class="text-center"><?php echo utf8_decode($personas[$i]->NumeroIdentificacion) ?></td>						
						<td class="text-center">
							<div class="row text-center">								
								<div class="col-md-12">
									<a href="#" data-toggle="modal" data-target="#md_borrar<?php echo $personas[$i]->IdPersona?>">
										<img src="<?php echo base_url('assets/imgs/erase.png')?>" alt="Eliminar" width="25px"/><br>Quitar Asignaci&oacute;n
									</a>
								</div>
							</div>
							
							<!-- Modal Eliminar -->
							<div class="modal fade" id="md_borrar<?php echo $personas[$i]->IdPersona?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Quitar Asignaci&oacute;n</h4>
								  </div>
								  <div class="modal-body">
									Esta seguro que desea quitar esta persona al gestor?
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<a href="<?php echo base_url('admin/quitarAsignacion/'.$personas[$i]->IdPersona)?>" type="button" class="btn btn-danger">Quitar</a>
								  </div>
								</div>
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
</div>