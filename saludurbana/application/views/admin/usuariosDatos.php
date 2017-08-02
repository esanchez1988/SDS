<?php
$retornoExito = $this->session->flashdata('retornoExito');
if ($retornoExito) {
    ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
        <?php echo $retornoExito ?>
    </div>
    <?php
}

$retornoError = $this->session->flashdata('retornoError');
if ($retornoError) {
    ?>
    <div class="alert alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <?php echo $retornoError ?>
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
<div class="col-md-12">            
	<br>
	<div class="panel panel-default">
		<div class="panel-heading text-right">
			<div class="nav">				
				<div class="btn-group pull-left" data-toggle="buttons">
					<label>
						Usuarios Registrados
					</label>
				</div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-striped" id="tablaUsuarios">
				<thead>
					<tr class="text-center">
						<th class="text-center">Usuario</th>
						<th class="text-center">Correo</th>
						<th class="text-center">Rol</th>
						<th class="text-center">Subred</th>
						<th class="text-center">Estado</th>
						<th class="text-center">Opciones</th>
					</tr>
				</thead>
				<tbody>
				<?php
				for ($i = 0; $i < count($usuarios); $i++) {
					
					?>						
					<tr>
						<td><?php echo utf8_decode($usuarios[$i]->username)?></td>
						<td><?php echo utf8_decode($usuarios[$i]->Correo) ?></td>
						<td><?php echo utf8_decode($usuarios[$i]->desc_rol) ?></td>
						<td><?php echo utf8_decode($usuarios[$i]->desc_subred) ?></td>
						<td>
							<?php 
								$bandera = 0;
								if($usuarios[$i]->estado == 'AC'){
									$bandera = 1;
									echo "Activo";
								}else{
									$bandera = 0;
									echo "Inactivo";
								}
							?>						
						</td>
						<td>
							<div class="row text-center">
								<div class="col-md-4">
									<?php
									if($usuarios[$i]->perfil == '2' && $bandera == 1){
										?>
										<a href="<?php echo base_url('admin/asignarUsuarios/'.$usuarios[$i]->id)?>">
											<img src="<?php echo base_url('assets/imgs/tarjeta.png')?>" alt="Editar" width="15%"/><br>Asignar Personas
										</a>
										<?php
									}
									?>									
								</div>
								<div class="col-md-4">
									<?php
									if($bandera == 1){
										?>
										<a href="<?php echo base_url('admin/editarUsuario/'.$usuarios[$i]->id)?>">
											<img src="<?php echo base_url('assets/imgs/editar.png')?>" alt="Editar" width="15%"/><br>Editar
										</a>
										<?php
									}
									?>										
								</div>
								<div class="col-md-4">
									<?php
									if($bandera == 1){
										?>
										<a href="#" data-toggle="modal" data-target="#md_borrar<?php echo $usuarios[$i]->id?>">
											<img src="<?php echo base_url('assets/imgs/erase.png')?>" alt="Eliminar" width="15%"/><br>Eliminar
										</a>
										<?php
									}
									?>									
								</div>
							</div>
							
							<!-- Modal Eliminar -->
							<div class="modal fade" id="md_borrar<?php echo $usuarios[$i]->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title" id="myModalLabel">Eliminar usuario <?php echo utf8_decode($usuarios[$i]->username)?></h4>
								  </div>
								  <div class="modal-body">
									Esta seguro que desea eliminar este usuario?
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
									<a href="<?php echo base_url('admin/borrarUsuario/'.$usuarios[$i]->id)?>" type="button" class="btn btn-danger">Eliminar</a>
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