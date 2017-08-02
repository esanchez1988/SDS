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
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<center>
			<h2>GESTI&Oacute;N DE USUARIOS</h2>
		</center>
		<br>
		<center>
			<a href="#" data-toggle="modal" data-target="#md_crear_usuario">
				<img src="<?php echo base_url('assets/imgs/usuarios.png')?>" alt="Crear" width="50px"/><br>Crear Usuario
			</a>
			<!-- Modal Crear -->
			<div class="modal fade" id="md_crear_usuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formCrearUsuario" action="<?php echo base_url('admin/guardarUsuario/') ?>" name="formCrearUsuario" method="post">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Crear Usuario</h4>
						</div>
						<div class="modal-body">							
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">N&uacute;mero de Identificaci&oacute;n</label>  
							  <div class="col-md-8">
							  <input id="nume_iden" name="nume_iden" type="text" placeholder="N&uacute;mero de Identificaci&oacute;n" class="form-control espacios-blanco validate[required, custom[integer], custom[onlyLetterNumber], maxSize[15]]">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Contrase&ntilde;a</label>  
							  <div class="col-md-8">
							  <input id="clave" name="clave" type="password" placeholder="Contrase&ntilde;a" class="form-control espacios-blanco validate[required, minSize[8]]">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="textinput">Correo</label>  
							  <div class="col-md-8">
							  <input id="correo" name="correo" type="text" placeholder="Correo" class="form-control validate[required, custom[email]]">
							  </div>
							</div>							
							<div class="form-group">
							  <label class="col-md-4 control-label" for="rol">Rol</label>  
							  <div class="col-md-8">
							  <select id="rol" name="rol" class="form-control validate[required]">
								<option value="">Seleccione...</option>
								<?php 
								for($i=0;$i<count($roles);$i++){
									echo "<option value='".$roles[$i]->id_rol."'>".$roles[$i]->desc_rol."</option>";
								}
								?>
							  </select>
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-md-4 control-label" for="rol">Subred</label>  
							  <div class="col-md-8">
							  <select id="subred" name="subred" class="form-control validate[required]">
								<option value="">Seleccione...</option>
								<?php 
								for($i=0;$i<count($subredes);$i++){
									echo "<option value='".$subredes[$i]->id_subred."'>".$subredes[$i]->desc_subred."</option>";
								}
								?>
							  </select>
							  </div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success">Aceptar</a>
						</div>
					</form>				  
				</div>
			  </div>
			</div>
		</center>
			
	</div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    	<div class="row">
    		<div class="col-md-4">
				<div class="form-group">
					<fieldset><b>Usuario:</b></fieldset>
					<input type="text" class="form-control" name="usuario_consulta" id="usuario_consulta" placeholder="Usuario">
				</div>    			
    		</div>
    		<div class="col-md-4">
				<div class="form-group">
					<fieldset><b>Rol:</b></fieldset>
					<select id="rol_consulta" name="rol_consulta" class="form-control">
					<option value=''>Seleccione...</option>
					<?php 
					for($i=0;$i<count($roles);$i++){
						echo "<option value='".$roles[$i]->id_rol."'>".$roles[$i]->desc_rol."</option>";
					}
					?>
					</select>
				</div>	
    		</div>
			<div class="col-md-4">
				<div class="form-group">
					<fieldset><b>Subred:</b></fieldset>
					<select id="subred_consulta" name="subred_consulta" class="form-control">
					<option value=''>Seleccione...</option>
					<?php 
					for($i=0;$i<count($subredes);$i++){
						echo "<option value='".$subredes[$i]->id_subred."'>".$subredes[$i]->desc_subred."</option>";
					}
					?>
					</select>
				</div>	
    		</div>
    	</div>        
    </div>
</div><br>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<center>
			<button class="btn btn-success" id="btn-buscar">Consultar</button>	
		</center>		
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="informacion">
		
	</div>
</div>