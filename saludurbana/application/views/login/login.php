<div class="content">
	<section class="login-content">
		<div class="row img-alcaldia">
			<div class="col-md-6 text-left">
				<img src="<?php echo base_url("/assets/imgs/logo_salud_urbana.png")?>" alt="Atención Urbana" />
			</div>
			<div class="col-md-6 text-right">
				<img src="<?php echo base_url("/assets/imgs/alcaldía_login.png")?>" alt="Secretaría de Salud" />	
			</div>
		</div>
		<?php
		//echo sha1('123456');
		$retornoError = $this->session->flashdata('usuario_incorrecto');
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
		
		<div class="row">
								
			<form class="text-center" method="post" action="<?php echo base_url('login/validar/')?>" >
				
				
				<div class="row">	
					<div class="col-md-8 col-md-offset-2">
						<div class="form-group">
							<label class="text-login" for="usuario">Nombre de usuario</label>
							<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario">
						</div>
						<div class="form-group">
							<label class="text-login" for="password">Contraseña</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Contrase&ntilde;a">
						</div>
					</div>
				</div>
				<div class="row btn-salud">
					<input type="submit" value="Ingresar" class="login-button">
				</div>		

			</form>
		</div>	</section>
</div>