<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo $titulo?></title>
		<script>
			//var base_url = <?php echo base_url();?>;
		</script>
		<!--CSS-->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/css/bootstrap-theme.min.css')?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/inicio-styles.css')?>">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
		<!--JS-->
		<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js')?>"></script>
		<script src="<?php echo base_url('assets/css/bootstrap/js/bootstrap.js')?>"></script>
		<!--<script src="<?php echo base_url('assets/js/login.js')?>"></script>-->
		
	</head>
	<body>
		<?php 

			$this->load->view($contenido);
			
		?>
	</body>
</html>