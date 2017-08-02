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
			<h2>GESTI&Oacute;N DE PERSONAS</h2>
		</center>
		<br>			
	</div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
    	<div class="row">
    		<div class="col-md-12">
				<div class="form-group">
					<fieldset><b>Numero de identificaci&oacute;n:</b></fieldset>
					<input type="text" class="form-control" name="nume_iden_consulta" id="nume_iden_consulta" placeholder="Numero de identificaci&oacute;n">
				</div>    			
    		</div>  
    	</div>        
    </div>
</div><br>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<center>
			<button class="btn btn-success" id="btn-buscar-pers">Consultar</button>	
		</center>		
	</div>
</div>
<div class="row">
	<div class="col-md-12" id="informacion">
		
	</div>
</div>