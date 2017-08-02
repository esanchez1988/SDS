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
			
			<form class="form-horizontal" enctype="multipart/form-data" role="form" id="formCrearUsuario" action="<?php echo base_url('admin/actualizarUsuario/') ?>" name="formCrearUsuario" method="post">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">EDICI&Oacute;N DE USUARIOS</h4>
				</div>
				<div class="modal-body">							
					<div class="form-group">
					  <label class="col-md-4 control-label" for="textinput">N&uacute;mero de Identificaci&oacute;n</label>  
					  <div class="col-md-8">
					  <input id="nume_iden" name="nume_iden" type="text" placeholder="N&uacute;mero de Identificaci&oacute;n" value="<?php echo $usuario[0]->username?>" class="form-control espacios-blanco validate[required, custom[integer], custom[onlyLetterNumber], maxSize[15]]" readonly>
					  </div>
					</div>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="textinput">Correo</label>  
					  <div class="col-md-8">
					  <input id="correo" name="correo" type="text" placeholder="Correo" value="<?php echo $usuario[0]->Correo?>"  class="form-control validate[required, custom[email]]">
					  </div>
					</div>							
					<div class="form-group">
					  <label class="col-md-4 control-label" for="rol">Rol</label>  
					  <div class="col-md-8">
					  <select id="rol" name="rol" class="form-control validate[required]">
						<option value="">Seleccione...</option>
						<?php 
						for($i=0;$i<count($roles);$i++){
							if($usuario[0]->perfil == $roles[$i]->id_rol){
								echo "<option value='".$roles[$i]->id_rol."' selected>".$roles[$i]->desc_rol."</option>";
							}else{
								echo "<option value='".$roles[$i]->id_rol."'>".$roles[$i]->desc_rol."</option>";	
							}							
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
							if($usuario[0]->id_subred == $subredes[$i]->id_subred){
								echo "<option value='".$subredes[$i]->id_subred."' selected>".$subredes[$i]->desc_subred."</option>";
							}else{
								echo "<option value='".$subredes[$i]->id_subred."'>".$subredes[$i]->desc_subred."</option>";	
							}							
						}
						?>
					  </select>
					  </div>
					</div>
				</div>
				<button type="submit" class="btn btn-success">Actualizar</a>
			</form>	
		</center>
			
	</div>
</div>