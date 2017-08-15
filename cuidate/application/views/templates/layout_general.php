<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo $titulo?></title>
		
		<!--CSS-->
<!-- Optional theme -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/css/bootstrap-theme.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/styles.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datatable.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/semaforo.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/validationEngine.jquery.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-ui.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-timepicker.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style_gmap.css')?>">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">		
		<!--JS-->
		<script type="text/javascript">
			var base_url = "<?php print base_url(); ?>";
		</script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
		<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD2Qj1lPP0A2M7JaKB25pY1_c4TDC0muA&region=GB"></script>		-->
		

		<!-- JavaScript -->
		<script src="<?php echo base_url('assets/js/alertifyjs/alertify.min.js') ?>"></script>

		<!-- CSS -->
		<link rel="stylesheet" href="<?php echo base_url('assets/js/alertifyjs/css/alertify.min.css') ?>"/>	
		<!-- Default theme -->
		<link rel="stylesheet" href="<?= base_url('assets/js/alertifyjs/css/themes/default.min.css') ?>"/>
		<!-- Semantic UI theme -->
		<link rel="stylesheet" href="<?= base_url('assets/js/alertifyjs/css/themes/semantic.min.css') ?>"/>		
			
		<script type="text/javascript" src="<?php echo base_url('assets/css/bootstrap/js/bootstrap.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/formtowizard.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validationEngine.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validationEngine-es.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-timepicker.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-timepicker-es.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/datatable.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/chart/loader.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/ficha.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/puntos.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/reportes.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/gmap3.js')?>"></script>
	</head>
	
	<body>
	
		<header>
			<div class="background">
				<div class="logos">
				<div class="logo-cuidate col-xs-3 col-sm-3">
					<img src="<?php echo base_url('assets/imgs/cuidate.svg')?>" alt="Cuídate sé feliz"/>
				</div>
				<div class="logo-people col-xs-3 col-sm-3">
					<img src="<?php echo base_url('assets/imgs/people.svg')?>" alt="Personas ejercitandose"/>
				</div>
				<div class="logo-salud col-xs-3 col-sm-3">
					<img src="<?php echo base_url('assets/imgs/salud-urbana.svg')?>" alt="Salud Urbana - Atención Integral en Salud"/>
				</div>
				<div class="logo-bogota col-xs-3 col-sm-3">
					<img src="<?php echo base_url('assets/imgs/bogota.svg')?>" alt="Alcaldía Mayor de Bogotá - Bogotá Mejor para Todos"/>
				</div>
			</div>
			</div>
			
		</header>
		
		<nav class="menu">
			<ul class="menu-container">
		<?php
		
			switch ($this->session->userdata('perfil')) {
				case 'administrador':
					?>
					<li class="menu-item"><a href="<?php echo base_url('admin/')?>">Reportes</a></li>
					<li class="menu-item"><a href="<?php echo base_url('admin/puntos')?>">Puntos de Atenci&oacute;n</a></li>
					<?php					
					break;
				case 'gestor':
					?>
					
					<li class="menu-item">
						<select class="form-control validate[required]" id="psalud_gral" name="psalud_gral" width="150px">
							<option value="">Seleccione...</option>
							<?php
								for($i=0;$i<count($psalud);$i++){
									
									if($psalud[$i]->zona != $psalud[$i-1]->zona){
										echo "</optgroup>";
										echo "<optgroup label='".$psalud[$i]->zona."'>";
									}
									
									if($this->session->userdata('punto_atencion') && $this->session->userdata('punto_atencion') == $psalud[$i]->id_punto){
										echo "<option value='".$psalud[$i]->id_punto."' selected>".$psalud[$i]->zona." - ".$psalud[$i]->direccion."</option>";
									}else{
										echo "<option value='".$psalud[$i]->id_punto."'>".$psalud[$i]->zona." - ".$psalud[$i]->direccion."</option>";	
									}									
								}
							?>
						</select>
					</li>
					<li class="menu-item"><a href="<?php echo base_url('gestor/')?>">Usuarios</a></li>
					<?php
					break; 
			}
		
		?>
				<li class="menu-item"><a href="<?php echo base_url('login/logout_ci')?>">Cerrar Sesi&oacute;n</a></li>
			</ul>
		</nav>
		
		<div class="container-fluid">
			<div class="col-md-12">
				<?php 
					$this->load->view($contenido);				
				?>
			</div>			
		</div> 
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHtEi0LvUKpjmkhemiHx3UUoac9mV3wa0&region=GB"></script>	
		<div class="footer-section">
			<div class="background-pie">
				<div class="logos-pie">
					<div class="logo-people-pie col-xs-3 col-sm-3">
						<img src="<?php echo base_url('assets/imgs/people-pie.svg')?>" alt="Personas ejercitandose"/>
					</div>
				</div>
			</div>
		</div>	
	</body>
</html>