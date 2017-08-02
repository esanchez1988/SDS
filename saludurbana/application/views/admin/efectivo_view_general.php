<?php
$visitasFicha = $this->admin_model->cunsultarFichas();
$visitasEfectivas = $this->admin_model->cunsultarVisitasEfectivas();
$visitasEfectivasCursos = $this->admin_model->cunsultarVisitasEfectivasCursos();
$visitasNoEfectivas = $this->admin_model->cunsultarVisitasNoEfectivas();
$visitasTotales = $this->admin_model->cunsultarVisitasTotales();
$noperm_tas = $this->admin_model->cunsultarTasNoPermitidos();
$noperm_gluc = $this->admin_model->cunsultarGlucoNoPermitidos();
$noperm_perim = $this->admin_model->cunsultarPerimNoPermitidos();
$amarillo = 0;
$rojo = 0;
$verde = 0;
$prioridad1 = 0;
$prioridad2 = 0;
$totalNoEfectivas = 0;
$sexo['f_verde'] = 0;
$sexo['f_amarillo'] = 0;
$sexo['f_rojo'] = 0;
$sexo['m_verde'] = 0;
$sexo['m_amarillo'] = 0;
$sexo['m_rojo'] = 0;

$edad['mm30']['rojo'] = 0;
$edad['m3040']['rojo'] = 0;
$edad['m4050']['rojo'] = 0;
$edad['m5060']['rojo'] = 0;
$edad['m6070']['rojo'] = 0;
$edad['m7080']['rojo'] = 0;
$edad['m8090']['rojo'] = 0;
$edad['mm90']['rojo'] = 0;

$edad['mm30']['amarillo'] = 0;
$edad['m3040']['amarillo'] = 0;
$edad['m4050']['amarillo'] = 0;
$edad['m5060']['amarillo'] = 0;
$edad['m6070']['amarillo'] = 0;
$edad['m7080']['amarillo'] = 0;
$edad['m8090']['amarillo'] = 0;
$edad['mm90']['amarillo'] = 0;

$edad['mm30']['verde'] = 0;
$edad['m3040']['verde'] = 0;
$edad['m4050']['verde'] = 0;
$edad['m5060']['verde'] = 0;
$edad['m6070']['verde'] = 0;
$edad['m7080']['verde'] = 0;
$edad['m8090']['verde'] = 0;
$edad['mm90']['verde'] = 0;

$edad['fm30']['rojo'] = 0;
$edad['f3040']['rojo'] = 0;
$edad['f4050']['rojo'] = 0;
$edad['f5060']['rojo'] = 0;
$edad['f6070']['rojo'] = 0;
$edad['f7080']['rojo'] = 0;
$edad['f8090']['rojo'] = 0;
$edad['fm90']['rojo'] = 0;

$edad['fm30']['amarillo'] = 0;
$edad['f3040']['amarillo'] = 0;
$edad['f4050']['amarillo'] = 0;
$edad['f5060']['amarillo'] = 0;
$edad['f6070']['amarillo'] = 0;
$edad['f7080']['amarillo'] = 0;
$edad['f8090']['amarillo'] = 0;
$edad['fm90']['amarillo'] = 0;

$edad['fm30']['verde'] = 0;
$edad['f3040']['verde'] = 0;
$edad['f4050']['verde'] = 0;
$edad['f5060']['verde'] = 0;
$edad['f6070']['verde'] = 0;
$edad['f7080']['verde'] = 0;
$edad['f8090']['verde'] = 0;
$edad['fm90']['verde'] = 0;

$opcion1['1'] = 0;
$opcion1['2'] = 0;
$opcion1['3'] = 0;

$opcion2['1'] = 0;
$opcion2['2'] = 0;
$opcion2['3'] = 0;

$opcion3['1'] = 0;
$opcion3['2'] = 0;
$opcion3['3'] = 0;

$opcion4['1'] = 0;
$opcion4['2'] = 0;
$opcion4['3'] = 0;

$opcion5['1'] = 0;
$opcion5['2'] = 0;
$opcion5['3'] = 0;

$opcion6['1'] = 0;
$opcion6['2'] = 0;

$opcion7['1'] = 0;
$opcion7['2'] = 0;

$opcion8['1'] = 0;
$opcion8['2'] = 0;

$opcion9['1'] = 0;
$opcion9['2'] = 0;

$opcion10['1'] = 0;
$opcion10['2'] = 0;

/*echo "<pre>";
	print_r($visitasFicha[0]);
echo "</pre>";*/
for($i=0;$i<count($visitasFicha);$i++){
	
	if($visitasFicha[$i]->IdPrioridad == 0){
		//verde o  amarillo
		if($visitasFicha[$i]->IdMedioCita != 0){
			$amarillo++;
			if($visitasFicha[$i]->Sexo == 'M'){
				$sexo['m_amarillo'] = $sexo['m_amarillo'] + 1;
				
				if($visitasFicha[$i]->Edad < 30){					
					$edad['mm30']['amarillo'] = $edad['mm30']['amarillo'] + 1;					
				}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
					$edad['m3040']['amarillo'] = $edad['m3040']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
					$edad['m4050']['amarillo'] = $edad['m4050']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
					$edad['m5060']['amarillo'] = $edad['m5060']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
					$edad['m6070']['amarillo'] = $edad['m6070']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
					$edad['m7080']['amarillo'] = $edad['m7080']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
					$edad['m8090']['amarillo'] = $edad['m8090']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 90){
					$edad['mm90']['amarillo'] = $edad['mm90']['amarillo'] + 1;
				}
			}else{
				$sexo['f_amarillo'] = $sexo['m_amarillo'] + 1;
				if($visitasFicha[$i]->Edad < 30){					
					$edad['fm30']['amarillo'] = $edad['fm30']['amarillo'] + 1;					
				}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
					$edad['f3040']['amarillo'] = $edad['f3040']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
					$edad['f4050']['amarillo'] = $edad['f4050']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
					$edad['f5060']['amarillo'] = $edad['f5060']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
					$edad['f6070']['amarillo'] = $edad['f6070']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
					$edad['f7080']['amarillo'] = $edad['f7080']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
					$edad['f8090']['amarillo'] = $edad['f8090']['amarillo'] + 1;
				}else if($visitasFicha[$i]->Edad >= 90){
					$edad['fm90']['amarillo'] = $edad['fm90']['amarillo'] + 1;
				}
			}
		}else{
			$verde++;
			if($visitasFicha[$i]->Sexo == 'M'){
				$sexo['m_verde'] = $sexo['m_verde'] + 1;
				
				if($visitasFicha[$i]->Edad < 30){					
					$edad['mm30']['verde'] = $edad['mm30']['verde'] + 1;					
				}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
					$edad['m3040']['verde'] = $edad['m3040']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
					$edad['m4050']['verde'] = $edad['m4050']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
					$edad['m5060']['verde'] = $edad['m5060']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
					$edad['m6070']['verde'] = $edad['m6070']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
					$edad['m7080']['verde'] = $edad['m7080']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
					$edad['m8090']['verde'] = $edad['m8090']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 90){
					$edad['mm90']['verde'] = $edad['mm90']['verde'] + 1;
				}
				
			}else{
				$sexo['f_verde'] = $sexo['f_verde'] + 1;
				if($visitasFicha[$i]->Edad < 30){					
					$edad['fm30']['verde'] = $edad['fm30']['verde'] + 1;					
				}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
					$edad['f3040']['verde'] = $edad['f3040']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
					$edad['f4050']['verde'] = $edad['f4050']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
					$edad['f5060']['verde'] = $edad['f5060']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
					$edad['f6070']['verde'] = $edad['f6070']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
					$edad['f7080']['verde'] = $edad['f7080']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
					$edad['f8090']['verde'] = $edad['f8090']['verde'] + 1;
				}else if($visitasFicha[$i]->Edad >= 90){
					$edad['fm90']['verde'] = $edad['fm90']['verde'] + 1;
				}
			}
		}
	}else if($visitasFicha[$i]->IdPrioridad == 1 || $visitasFicha[$i]->IdPrioridad == 2){
		$rojo++;
		if($visitasFicha[$i]->IdPrioridad == 1){
			$prioridad1++;	
		}else{
			$prioridad2++;
		}
		
		if($visitasFicha[$i]->Sexo == 'M'){
			$sexo['m_rojo'] = $sexo['m_rojo'] + 1;
			
			if($visitasFicha[$i]->Edad < 30){					
				$edad['mm30']['rojo'] = $edad['mm30']['rojo'] + 1;					
			}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
				$edad['m3040']['rojo'] = $edad['m3040']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
				$edad['m4050']['rojo'] = $edad['m4050']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
				$edad['m5060']['rojo'] = $edad['m5060']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
				$edad['m6070']['rojo'] = $edad['m6070']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
				$edad['m7080']['rojo'] = $edad['m7080']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
				$edad['m8090']['rojo'] = $edad['m8090']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 90){
				$edad['mm90']['rojo'] = $edad['mm90']['rojo'] + 1;
			}
				
		}else{
			$sexo['f_rojo'] = $sexo['f_rojo'] + 1;
			
			if($visitasFicha[$i]->Edad < 30){					
				$edad['fm30']['rojo'] = $edad['fm30']['rojo'] + 1;					
			}else if($visitasFicha[$i]->Edad >= 30 && $visitasFicha[$i]->Edad < 40){
				$edad['f3040']['rojo'] = $edad['f3040']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 40 && $visitasFicha[$i]->Edad < 50){
				$edad['f4050']['rojo'] = $edad['f4050']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 50 && $visitasFicha[$i]->Edad < 60){
				$edad['f5060']['rojo'] = $edad['f5060']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 60 && $visitasFicha[$i]->Edad < 70){
				$edad['f6070']['rojo'] = $edad['f6070']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 70 && $visitasFicha[$i]->Edad < 80){
				$edad['f7080']['rojo'] = $edad['f7080']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 80 && $visitasFicha[$i]->Edad < 90){
				$edad['f8090']['rojo'] = $edad['f8090']['rojo'] + 1;
			}else if($visitasFicha[$i]->Edad >= 90){
				$edad['fm90']['rojo'] = $edad['fm90']['rojo'] + 1;
			}
		}
		
	}
	
	
	if($visitasFicha[$i]->IdOpcionUltimaConsulta == 1){
		$opcion1['1'] = $opcion1['1'] + 1; 
	}else if($visitasFicha[$i]->IdOpcionUltimaConsulta == 2){
		$opcion1['2'] = $opcion1['2'] + 1;
	}else if($visitasFicha[$i]->IdOpcionUltimaConsulta == 12){
		$opcion1['3'] = $opcion1['3'] + 1;
	}
	
	if($visitasFicha[$i]->IdOpcionUltimaTomaLaboratorios == 1){
		$opcion2['1'] = $opcion2['1'] + 1; 
	}else if($visitasFicha[$i]->IdOpcionUltimaTomaLaboratorios == 2){
		$opcion2['2'] = $opcion2['2'] + 1;
	}else if($visitasFicha[$i]->IdOpcionUltimaTomaLaboratorios == 12){
		$opcion2['3'] = $opcion2['3'] + 1;
	}
	
	
	if($visitasFicha[$i]->IdOpcionTAS == 1){
		$opcion3['1'] = $opcion3['1'] + 1; 
	}else if($visitasFicha[$i]->IdOpcionTAS == 2){
		$opcion3['2'] = $opcion3['2'] + 1;
	}else if($visitasFicha[$i]->IdOpcionTAS == 12){
		$opcion3['3'] = $opcion3['3'] + 1;
	}
	
	
	if($visitasFicha[$i]->IdOpcionGlucometria == 1){
		$opcion4['1'] = $opcion4['1'] + 1; 
	}else if($visitasFicha[$i]->IdOpcionGlucometria == 2){
		$opcion4['2'] = $opcion4['2'] + 1;
	}else if($visitasFicha[$i]->IdOpcionGlucometria == 12){
		$opcion4['3'] = $opcion4['3'] + 1;
	}
	
	if($visitasFicha[$i]->IdOpcionPA == 1){
		$opcion5['1'] = $opcion5['1'] + 1; 
	}else if($visitasFicha[$i]->IdOpcionPA == 2){
		$opcion5['2'] = $opcion5['2'] + 1;
	}else if($visitasFicha[$i]->IdOpcionPA == 12){
		$opcion5['3'] = $opcion5['3'] + 1;
	}
	
	
	if($visitasFicha[$i]->ExisteHospitalizacionTA == 1){
		$opcion6['1'] = $opcion6['1'] + 1; 
	}else if($visitasFicha[$i]->ExisteHospitalizacionTA == 2){
		$opcion6['2'] = $opcion6['2'] + 1;
	}
	
	if($visitasFicha[$i]->ExisteHospitalizacionTA2 == 1){
		$opcion7['1'] = $opcion7['1'] + 1; 
	}else if($visitasFicha[$i]->ExisteHospitalizacionTA2 == 2){
		$opcion7['2'] = $opcion7['2'] + 1;
	}
	
	if($visitasFicha[$i]->EsFumador == 1){
		$opcion8['1'] = $opcion8['1'] + 1; 
	}else if($visitasFicha[$i]->EsFumador == 2){
		$opcion8['2'] = $opcion8['2'] + 1;
	}
	
	if($visitasFicha[$i]->EsBebedor == 1){
		$opcion9['1'] = $opcion9['1'] + 1; 
	}else if($visitasFicha[$i]->EsBebedor == 2){
		$opcion9['2'] = $opcion9['2'] + 1;
	}
	
	if($visitasFicha[$i]->RealizaActividadFisica == 1){
		$opcion10['1'] = $opcion10['1'] + 1; 
	}else if($visitasFicha[$i]->RealizaActividadFisica == 2){
		$opcion10['2'] = $opcion10['2'] + 1;
	}
}


if(count($visitasEfectivasCursos)){
	
	$r_mgestantes = 0;
	$pr_inf = 0;
	$inf = 0;
	$ado = 0;
	$juv = 0;
	$adu = 0;
	$vej = 0;
	
	for($i=0;$i<count($visitasEfectivasCursos);$i++){
		if($visitasEfectivasCursos[$i]->idma != ''){
			$r_mgestantes++;
		}else if ($visitasEfectivasCursos[$i]->idpii != ''){
			$pr_inf++;
		}else if ($visitasEfectivasCursos[$i]->idinf != ''){
			$inf++;
		}else if ($visitasEfectivasCursos[$i]->idado != ''){
			$ado++;
		}else if ($visitasEfectivasCursos[$i]->idju != ''){
			$juv++;
		}else if ($visitasEfectivasCursos[$i]->idadu != ''){
			$adu++;
		}else if ($visitasEfectivasCursos[$i]->idve != ''){
			$vej++;
		}
	}
}


$visitasPrioridad = $this->admin_model->cunsultarPrioridad();
$visitasMedio = $this->admin_model->cunsultarMedio();
?>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Prioridad', 'Total'],
		<?php 		
		for($i=0;$i<count($visitasPrioridad);$i++){
			echo "['".$visitasPrioridad[$i]->prioridad."', ".$visitasPrioridad[$i]->total."],";
		}		
		?>
	]);

	var options = {
	  title: 'Efectivas - Prioridad',
	  is3D: true,
	  colors: ['#cc0000', '#f1da36', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_efeprioridad'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Medio', 'Total'],
		<?php 		
		for($i=0;$i<count($visitasMedio);$i++){
			echo "['".$visitasMedio[$i]->medio."', ".$visitasMedio[$i]->total."],";
		}		
		?>
	]);

	var options = {
	  title: 'Efectivas - Medio agendamiento de cita',
	  is3D: true,
	  colors: ['#cc0000', '#f1da36', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_efemedio'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Alerta', 'Total'],
		['Rojo', <?php echo $rojo;?>],
		['Amarillo', <?php echo $amarillo;?>],
		['Verde', <?php echo $verde;?>]
	]);

	var options = {
	  title: 'Alertas - Efectivas',
	  is3D: true,
	  colors: ['#cc0000', '#f1da36', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_efectivas'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Estado', 'Total'],
		<?php
		for($i=0;$i<count($visitasNoEfectivas);$i++){
			echo "['".$visitasNoEfectivas[$i]->Nombre."', ".$visitasNoEfectivas[$i]->total."],";
			$totalNoEfectivas = $totalNoEfectivas + $visitasNoEfectivas[$i]->total;
		}
		?>
	]);

	var options2 = {
	  title: 'Alertas - No Efectivas',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_noefectivas'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Curso de Vida', 'Total'],
		['Madres Gestantes', <?php echo $r_mgestantes;?>],
		['Primera Infancia', <?php echo $pr_inf;?>],
		['Infancia', <?php echo $inf;?>],
		['Adolescencia', <?php echo $ado;?>],
		['Juventud', <?php echo $juv;?>],
		['Adultez', <?php echo $adu;?>],
		['Vejez', <?php echo $vej;?>]
	]);

	var options2 = {
	  title: 'Efectivas - Cursos de Vida',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_efecursos'));
	chart.draw(data2, options2);
	}
</script>
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#generales" aria-controls="home" role="tab" data-toggle="tab">Informes Generales</a></li>
  </ul>

  <!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="generales">	
			<fieldset>
		<legend>Informe General</legend>
		<div class="row">
			<div class="col-md-12">
				<table class="table table-bordered">
					<tr>
						<th>Visitas a realizar</th>
						<th>Visitas Efectivas</th>
						<th>Visitas No Efectivas</th>
						<th>Visitas Pendientes</th>
					</tr>
					<tr>
						<td><?php echo $visitasTotales[0]->total;?></td>
						<td><?php echo count($visitasEfectivas);?></td>
						<td><?php echo $totalNoEfectivas;?></td>
						<td>
						<?php 
							$t_visit = $visitasTotales[0]->total;
							$v_efect = count($visitasEfectivas);
							$v_noefe = $totalNoEfectivas;
							
							$t_pend = $t_visit - ($v_efect + $v_noefe);
												
							echo $t_pend;				
						?>				
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">	
				<div class="col-md-6">
					<div id="piechart_efectivas" style="width: 100%; height: 400px;"></div>
				</div>
				<div class="col-md-6">
					<div id="piechart_noefectivas" style="width: 100%; height: 400px;"></div>
				</div>	
		</div>
		</fieldset>	
		<div class="row">
			<div class="col-md-12">
				<fieldset>
				<legend>Efectivas - Cursos de Vida</legend>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<tr>
								<th>Curso de vida</th>
								<th>Total</th>
							</tr>
							<tr>
								<td>Madres Gestantes</td>
								<td><?php echo $r_mgestantes;?></td>
							</tr>
							<tr>
								<td>Primera Infancia</td>
								<td><?php echo $pr_inf;?></td>
							</tr>
							<tr>
								<td>Infancia</td>
								<td><?php echo $inf;?></td>
							</tr>
							<tr>
								<td>Adolescencia</td>
								<td><?php echo $ado;?></td>
							</tr>
							<tr>
								<td>Juventud</td>
								<td><?php echo $juv;?></td>
							</tr>
							<tr>
								<td>Adultez</td>
								<td><?php echo $adu;?></td>
							</tr>
							<tr>
								<td>Vejez</td>
								<td><?php echo $vej;?></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="row">
					<div id="piechart_efecursos" style="width: 100%; height: 400px;"></div>
				</div>
			</fieldset>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<fieldset>
				<legend>Efectivas - Programaci&oacute;n</legend>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<tr>
								<th>Prioridad</th>
								<th>Total</th>
							</tr>
							<?php 
							
							for($i=0;$i<count($visitasPrioridad);$i++){
								?>
								<tr>
									<td><?php echo $visitasPrioridad[$i]->prioridad;?></td>
									<td><?php echo $visitasPrioridad[$i]->total;?></td>
								</tr>
								<?php
							}	
							
							?>								
						</table>
					</div>
				</div>
				<div class="row">
					<div id="piechart_efeprioridad" style="width: 100%; height: 400px;"></div>
				</div>
			</fieldset>		
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<fieldset>
				<legend>Programaci&oacute;n - Medio agendamiento de cita</legend>
				<div class="row">
					<div class="col-md-12">
						<table class="table table-bordered">
							<tr>
								<th>Medio</th>
								<th>Total</th>
							</tr>
							<?php 
							
							for($i=0;$i<count($visitasMedio);$i++){
								?>
								<tr>
									<td><?php echo $visitasMedio[$i]->medio;?></td>
									<td><?php echo $visitasMedio[$i]->total;?></td>
								</tr>
								<?php
							}	
							
							?>								
						</table>
					</div>
				</div>
				<div class="row">
					<div id="piechart_efemedio" style="width: 100%; height: 400px;"></div>
				</div>
			</fieldset>		
		</div>
	</div>
		</div>

	</div>
	
</div>



