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
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/fileinput/fileinput.css')?>"/> 
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">		
		

		<!--JS-->
		<script type="text/javascript">
			var base_url = "<?php print base_url(); ?>";
		</script>
		
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-2.1.4.min.js')?>"></script>		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD2Qj1lPP0A2M7JaKB25pY1_c4TDC0muA&region=GB"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/gmap3.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/css/bootstrap/js/bootstrap.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/formtowizard.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validationEngine.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validationEngine-es.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-timepicker.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-timepicker-es.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/datatable.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/fileinput/fileinput.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/fileinput/fileinput_locale_es.js')?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/chart/loader.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/ficha.js')?>"></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/reportes.js')?>"></script>		
		<script type="text/javascript" src="<?php echo base_url('assets/js/administrador.js')?>"></script>		
		<script type="text/javascript" src="<?php echo base_url('assets/js/seguimiento.js')?>"></script>		
		
		
		
	</head>
	<body>
		<header>
			<img src="<?php echo base_url('assets/imgs/cabezote_salud_urbana.jpg')?>"/>
			<div>
				<?php
					switch ($this->session->userdata('perfil')) {
						case '1':
							$this->load->view('templates/menu_admin.php');
							break;
						case '2':
							$this->load->view('templates/menu_gestor.php');
							break;
						case '3':
							$this->load->view('templates/menu_digitador.php');
							break;
						case '4':
							$this->load->view('templates/menu_tecnico.php');
							break;	
					}					
				?>
			</div>	
        </header>
		<div class="container">
			<div class="col-md-12">
				<?php 
					$this->load->view($contenido);				
				?>
			</div>			
		</div>    
		
		<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBD2Qj1lPP0A2M7JaKB25pY1_c4TDC0muA&callback=initMap" async defer></script>-->
        <footer>
            <div class="links-control col4">
                <h4>Entes de Control</h4><br />
                <ul>
                    <li><a href="http://www.personeriabogota.gov.co/">Personería de Bogotá</a></li>
                    <li><a href="http://www.procuraduria.gov.co/">Procuraduría General de la Nación</a></li>
                    <li><a href="http://www.contraloriagen.gov.co/">Contraloría General de la Nación</a></li>
                    <li><a href="http://concejodebogota.gov.co/cbogota/site/edic/base/port/inicio.php">Concejo de Bogotá</a></li>
                    <li><a href="http://www.veeduriadistrital.gov.co/">Veeduría Distrital</a></li>
                    <li><a href="https://www.contratacionbogota.gov.co/es/web/cav3/ciudadano">Portal de Contratación a la Vista</a></li>
                    <li><a href="https://www.contratos.gov.co/puc/buscador.html">Portal de Contratación - SECOP</a></li>
                    
                </ul>
            </div>
            <div class="links-gobierno col4">
                <h4>Entes del Gobierno</h4><br />
                <ul>
                    <li><a href="https://www.minsalud.gov.co/">Ministerio de Salud y Protección Social</a></li>
                    <li><a href="http://estrategia.gobiernoenlinea.gov.co/623/w3-channel.html">Gobierno en Línea</a></li>
                </ul>
            </div>
            <div class="info-secretaria col4">
                <h4>Secretaría Distrital de Salud</h4><br />
                <ul>
                    <li>Cra 32 # 12 - 81 Bogotá, Colombia</li>
                    <li>Teléfono: (571) 3649090</li>
                    <li>Código Postal: 0571</li>
                    <li>Horario de Atención al Ciudadano de 7:00a.m. a 4:00p.m.</li>
                    <li>contactenos@saludcapital.gov.co</li>
                </ul>                
            </div>
            <div class="logo-alcaldia-footer">
                <img src="<?php echo base_url('assets/imgs/logo-alcaldia.svg')?>" />
            </div>
        </footer>
		
		

	</body>
</html>