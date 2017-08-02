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

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart1);
	function drawChart1() {
	
	var data = google.visualization.arrayToDataTable([
        ['Sexo', 'Alerta Roja', 'Alerta Amarilla', 'Alerta Verde'],        
        ['Mujer', <?php echo $sexo['f_rojo']?>, <?php echo $sexo['f_amarillo']?>, <?php echo $sexo['f_verde']?>],
		['Hombre', <?php echo $sexo['m_rojo']?>, <?php echo $sexo['m_amarillo']?>, <?php echo $sexo['m_verde']?>]
      ]);

      var options = {
		title: 'Distribución por sexo', 
		colors: ['#cc0000', '#f1da36', '#8fc800'],
		legend: { position: 'left', maxLines: 6 },
		width: 800,
        bar: { groupWidth: '75%' },
        isStacked: true,
		is3D: true
      };

	var chart = new google.visualization.BarChart(document.getElementById('piechart_sexo'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);


      function drawChart2() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Edad', 'Rojo Mujer', 'Rojo Hombre', 'Amarillo Mujer', 'Amarillo Hombre', 'Verde Mujer', 'Verde Hombre'],
         ['< de 30', <?php echo $edad['fm30']['rojo']?>, <?php echo $edad['mm30']['rojo']?>, <?php echo $edad['fm30']['amarillo']?>, <?php echo $edad['mm30']['amarillo']?>, <?php echo $edad['fm30']['verde']?>, <?php echo $edad['mm30']['verde']?>],
         ['30 - 40',  <?php echo $edad['f3040']['rojo']?>, <?php echo $edad['m3040']['rojo']?>, <?php echo $edad['f3040']['amarillo']?>, <?php echo $edad['m3040']['amarillo']?>, <?php echo $edad['f3040']['verde']?>, <?php echo $edad['m3040']['verde']?>],
         ['40 - 50',  <?php echo $edad['f4050']['rojo']?>, <?php echo $edad['m4050']['rojo']?>, <?php echo $edad['f4050']['amarillo']?>, <?php echo $edad['m4050']['amarillo']?>, <?php echo $edad['f4050']['verde']?>, <?php echo $edad['m4050']['verde']?>],
         ['50 - 60',  <?php echo $edad['f5060']['rojo']?>, <?php echo $edad['m5060']['rojo']?>, <?php echo $edad['f5060']['amarillo']?>, <?php echo $edad['m5060']['amarillo']?>, <?php echo $edad['f5060']['verde']?>, <?php echo $edad['m5060']['verde']?>],
         ['60 - 70',  <?php echo $edad['f6070']['rojo']?>, <?php echo $edad['m6070']['rojo']?>, <?php echo $edad['f6070']['amarillo']?>, <?php echo $edad['m6070']['amarillo']?>, <?php echo $edad['f6070']['verde']?>, <?php echo $edad['m6070']['verde']?>],
         ['70 - 80',  <?php echo $edad['f7080']['rojo']?>, <?php echo $edad['m7080']['rojo']?>, <?php echo $edad['f7080']['amarillo']?>, <?php echo $edad['m7080']['amarillo']?>, <?php echo $edad['f7080']['verde']?>, <?php echo $edad['m7080']['verde']?>],
         ['80 - 90',  <?php echo $edad['f8090']['rojo']?>, <?php echo $edad['m8090']['rojo']?>, <?php echo $edad['f8090']['amarillo']?>, <?php echo $edad['m8090']['amarillo']?>, <?php echo $edad['f8090']['verde']?>, <?php echo $edad['m8090']['verde']?>],
         ['> de 90',  <?php echo $edad['fm90']['rojo']?>, <?php echo $edad['mm90']['rojo']?>, <?php echo $edad['fm90']['amarillo']?>, <?php echo $edad['mm90']['amarillo']?>, <?php echo $edad['fm90']['verde']?>, <?php echo $edad['mm90']['verde']?>],
      ]);

    var options = {
		vAxis: {title: 'Total Pacientes'},
		hAxis: {title: 'Rango de Edad'},
		seriesType: 'bars',
		width: 800,
		colors: ['#cc0000','#cc0000', '#f1da36', '#f1da36', '#8fc800', '#8fc800'],
		legend: { position: 'left', maxLines: 6 },
    };

    var chart = new google.visualization.ComboChart(document.getElementById('piechart_edad'));
    chart.draw(data, options);
  }
  
</script>
<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['Asistió en el ultimo mes', <?php echo $opcion1['1'];?>],
		['Asistió en los ultimos tres meses', <?php echo $opcion1['2'];?>],
		['Asistió hace mas de tres meses', <?php echo $opcion1['3'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion1'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['En los ultimos dos meses', <?php echo $opcion2['1'];?>],
		['Entre 3 o 6 meses', <?php echo $opcion2['2'];?>],
		['Mas de seís meses', <?php echo $opcion2['3'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion2'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['La TAS es menor a 140 (No incluye a 140)', <?php echo $opcion3['1'];?>],
		['La TAS esta entre 140 y 160', <?php echo $opcion3['2'];?>],
		['La TAS es mayor a 160 (No incluye a 160)', <?php echo $opcion3['3'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion3'));
	chart.draw(data, options);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['De 65 a 140 mg/dl', <?php echo $opcion4['1'];?>],
		['De 141 a 200 mg/dl', <?php echo $opcion4['2'];?>],
		['Mayor o igual a 201 mg/dl', <?php echo $opcion4['3'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion4'));
	chart.draw(data, options);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['El PA es menor a 80 cm', <?php echo $opcion5['1'];?>],
		['El PA esta entre 80 y 88 cm', <?php echo $opcion5['2'];?>],
		['El PA es mayor a 88 cm', <?php echo $opcion5['3'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion5'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['No', <?php echo $opcion6['1'];?>],
		['Sí', <?php echo $opcion6['2'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion6'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['No', <?php echo $opcion7['1'];?>],
		['Sí', <?php echo $opcion7['2'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion7'));
	chart.draw(data, options);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['No', <?php echo $opcion8['1'];?>],
		['Sí', <?php echo $opcion8['2'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion8'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['No', <?php echo $opcion9['1'];?>],
		['Sí', <?php echo $opcion9['2'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion9'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Respuesta', 'Total'],
		['No', <?php echo $opcion10['1'];?>],
		['Sí', <?php echo $opcion10['2'];?>]
	]);

	var options = {
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_opcion10'));
	chart.draw(data, options);
	}
</script>
<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#generales" aria-controls="home" role="tab" data-toggle="tab">Informes Generales</a></li>
    <li role="presentation"><a href="#tematicos" aria-controls="profile" role="tab" data-toggle="tab">Informe Cr&oacute;nicos</a></li>
	<li role="presentation"><a href="#gestantes" aria-controls="home" role="tab" data-toggle="tab">Materno Perinatal</a></li>
	<li role="presentation"><a href="#primera_infancia" aria-controls="profile" role="tab" data-toggle="tab">Primera Infancia</a></li>
	<li role="presentation"><a href="#infancia" aria-controls="profile" role="tab" data-toggle="tab">Infancia</a></li>	
	<li role="presentation"><a href="#adolescencia" aria-controls="profile" role="tab" data-toggle="tab">Adolescencia</a></li>
	<li role="presentation"><a href="#juventud" aria-controls="profile" role="tab" data-toggle="tab">Juventud</a></li>
	<li role="presentation"><a href="#adultez" aria-controls="profile" role="tab" data-toggle="tab">Adultez</a></li>
	<li role="presentation"><a href="#vejez" aria-controls="profile" role="tab" data-toggle="tab">Vejez</a></li>
	<li role="presentation"><a href="#archivos" aria-controls="profile" role="tab" data-toggle="tab">Archivos Planos</a></li>
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
		<!--<div class="row">
			<div class="col-md-12">
				<table class="table">
					<tr>
						<th>Alerta Roja Traslado inmediato</th>
						<th>Alerta roja Agendamiento</th>
					</tr>
					<tr>
						<td><?php echo $prioridad1;?></td>
						<td><?php echo $prioridad2;?></td>
					</tr>
				</table>
			</div>
		</div>-->
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
    <div role="tabpanel" class="tab-pane" id="tematicos">
		
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<fieldset>
					<legend>Sexo</legend>
					<!--<pre>
					<?php print_r($visitasFicha);?>
					</pre>-->
					<table class="table table-bordered">
						<tr>
							<th>Sexo</th>
							<th>Alerta Roja</th>
							<th>Alerta Amarilla</th>
							<th>Alerta Verde</th>
							<th>Totales</th>
						</tr>
						<tr>
							<td>Mujer</td>
							<td><?php echo $sexo['f_rojo'];?></td>
							<td><?php echo $sexo['f_amarillo'];?></td>
							<td><?php echo $sexo['f_verde'];?></td>
							<td><?php echo $sexo['f_verde'] + $sexo['f_amarillo'] + $sexo['f_rojo'];?></td>
						</tr>
						<tr>
							<td>Hombre</td>
							<td><?php echo $sexo['m_rojo'];?></td>
							<td><?php echo $sexo['m_amarillo'];?></td>
							<td><?php echo $sexo['m_verde'];?></td>
							<td><?php echo $sexo['m_verde'] + $sexo['m_amarillo'] + $sexo['m_rojo'];?></td>
						</tr>
						<tr>
							<th>Totales</th>
							<td><?php echo $sexo['m_rojo'] + $sexo['f_rojo'];?></td>
							<td><?php echo $sexo['m_amarillo'] + $sexo['f_amarillo'];?></td>
							<td><?php echo $sexo['m_verde'] + $sexo['f_verde'];?></td>
							<td><?php echo $sexo['m_verde'] + $sexo['m_amarillo'] + $sexo['m_rojo'] + $sexo['f_verde'] + $sexo['f_amarillo'] + $sexo['f_rojo'];?></td>
						</tr>
					</table>
					</fieldset>	
				</div>
				<div class="row">	
					<center>
						<div id="piechart_sexo" class="chart"></div>
					</center>					
				</div>	
			</div>
			<div class="col-md-12">
				<div class="row">
					<fieldset>
					<legend>Rango de Edad</legend>
					<table class="table table-bordered">
						<tr>
							<th>Edad</th>
							<th>Alerta Roja Mujer</th>
							<th>Alerta Roja Hombre</th>
							<th>Alerta Amarilla Mujer</th>
							<th>Alerta Amarilla Hombre</th>
							<th>Alerta Verde Mujer</th>
							<th>Alerta Verde Hombre</th>
							<th>Totales</th>
						</tr>
						<tr>
							<td>Menor de 30</td>
							<td><?php echo $edad['fm30']['rojo'];?></td>
							<td><?php echo $edad['mm30']['rojo'];?></td>
							<td><?php echo $edad['fm30']['amarillo'];?></td>
							<td><?php echo $edad['mm30']['amarillo'];?></td>
							<td><?php echo $edad['fm30']['verde'];?></td>
							<td><?php echo $edad['mm30']['verde'];?></td>
							<td><?php echo $edad['fm30']['rojo'] + $edad['mm30']['rojo'] + $edad['fm30']['amarillo'] + $edad['mm30']['amarillo'] + $edad['fm30']['verde'] + $edad['mm30']['verde'];?></td>
						</tr>
						<tr>
							<td>30 - 40</td>
							<td><?php echo $edad['f3040']['rojo'];?></td>
							<td><?php echo $edad['m3040']['rojo'];?></td>
							<td><?php echo $edad['f3040']['amarillo'];?></td>
							<td><?php echo $edad['m3040']['amarillo'];?></td>
							<td><?php echo $edad['f3040']['verde'];?></td>
							<td><?php echo $edad['m3040']['verde'];?></td>
							<td><?php echo $edad['f3040']['rojo'] + $edad['m3040']['rojo'] + $edad['f3040']['amarillo'] + $edad['m3040']['amarillo'] + $edad['f3040']['verde'] + $edad['m3040']['verde'];?></td>
						</tr>
						<tr>
							<td>40 - 50</td>
							<td><?php echo $edad['f4050']['rojo'];?></td>
							<td><?php echo $edad['m4050']['rojo'];?></td>
							<td><?php echo $edad['f4050']['amarillo'];?></td>
							<td><?php echo $edad['m4050']['amarillo'];?></td>
							<td><?php echo $edad['f4050']['verde'];?></td>
							<td><?php echo $edad['m4050']['verde'];?></td>
							<td><?php echo $edad['f4050']['rojo'] + $edad['m4050']['rojo'] + $edad['f4050']['amarillo'] + $edad['m4050']['amarillo'] + $edad['f4050']['verde'] + $edad['m4050']['verde'];?></td>
						</tr>
						<tr>
							<td>50 - 60</td>
							<td><?php echo $edad['f5060']['rojo'];?></td>
							<td><?php echo $edad['m5060']['rojo'];?></td>
							<td><?php echo $edad['f5060']['amarillo'];?></td>
							<td><?php echo $edad['m5060']['amarillo'];?></td>
							<td><?php echo $edad['f5060']['verde'];?></td>
							<td><?php echo $edad['m5060']['verde'];?></td>
							<td><?php echo $edad['f5060']['rojo'] + $edad['m5060']['rojo'] + $edad['f5060']['amarillo'] + $edad['m5060']['amarillo'] + $edad['f5060']['verde'] + $edad['m5060']['verde'];?></td>
						</tr>
						<tr>
							<td>60 - 70</td>
							<td><?php echo $edad['f6070']['rojo'];?></td>
							<td><?php echo $edad['m6070']['rojo'];?></td>
							<td><?php echo $edad['f6070']['amarillo'];?></td>
							<td><?php echo $edad['m6070']['amarillo'];?></td>
							<td><?php echo $edad['f6070']['verde'];?></td>
							<td><?php echo $edad['m6070']['verde'];?></td>
							<td><?php echo $edad['f6070']['rojo'] + $edad['m6070']['rojo'] + $edad['f6070']['amarillo'] + $edad['m6070']['amarillo'] + $edad['f6070']['verde'] + $edad['m6070']['verde'];?></td>
						</tr>
						<tr>
							<td>70 - 80</td>
							<td><?php echo $edad['f7080']['rojo'];?></td>
							<td><?php echo $edad['m7080']['rojo'];?></td>
							<td><?php echo $edad['f7080']['amarillo'];?></td>
							<td><?php echo $edad['m7080']['amarillo'];?></td>
							<td><?php echo $edad['f7080']['verde'];?></td>
							<td><?php echo $edad['m7080']['verde'];?></td>
							<td><?php echo $edad['f7080']['rojo'] + $edad['m7080']['rojo'] + $edad['f7080']['amarillo'] + $edad['m7080']['amarillo'] + $edad['f7080']['verde'] + $edad['m7080']['verde'];?></td>
						</tr>
						<tr>
							<td>80 - 90</td>
							<td><?php echo $edad['f8090']['rojo'];?></td>
							<td><?php echo $edad['m8090']['rojo'];?></td>
							<td><?php echo $edad['f8090']['amarillo'];?></td>
							<td><?php echo $edad['m8090']['amarillo'];?></td>
							<td><?php echo $edad['f8090']['verde'];?></td>
							<td><?php echo $edad['m8090']['verde'];?></td>
							<td><?php echo $edad['f8090']['rojo'] + $edad['m8090']['rojo'] + $edad['f8090']['amarillo'] + $edad['m8090']['amarillo'] + $edad['f8090']['verde'] + $edad['m8090']['verde'];?></td>
						</tr>
						<tr>
							<td>Mayores de 90</td>
							<td><?php echo $edad['fm90']['rojo'];?></td>
							<td><?php echo $edad['mm90']['rojo'];?></td>
							<td><?php echo $edad['fm90']['amarillo'];?></td>
							<td><?php echo $edad['mm90']['amarillo'];?></td>
							<td><?php echo $edad['fm90']['verde'];?></td>
							<td><?php echo $edad['mm90']['verde'];?></td>
							<td><?php echo $edad['fm90']['rojo'] + $edad['mm90']['rojo'] + $edad['fm90']['amarillo'] + $edad['mm90']['amarillo'] + $edad['fm90']['verde'] + $edad['mm90']['verde'];?></td>
						</tr>
					</table>						
					</fieldset>	
				</div>
				<div class="row">	
					<center>
						<div id="piechart_edad" class="chart"></div>
					</center>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Cuándo fue la &uacute;ltima vez que asistio a consulta con medico general o internista</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Asisti&oacute; en el ultimo mes</th>
									<th>Asisti&oacute; en los ultimos tres meses</th>
									<th>Asisti&oacute; hace mas de tres meses</th>
								</tr>
								<tr>
									<td><?php echo $opcion1['1'];?></td>
									<td><?php echo $opcion1['2'];?></td>
									<td><?php echo $opcion1['3'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion1" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Cuándo fue la &uacute;ltima vez que le tomaron examenes de laboratorio</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>En los ultimos dos meses</th>
									<th>Entre 3 o 6 meses</th>
									<th>Mas de seís meses</th>
								</tr>
								<tr>
									<td><?php echo $opcion2['1'];?></td>
									<td><?php echo $opcion2['2'];?></td>
									<td><?php echo $opcion2['3'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion2" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Valor de la tensi&oacute;n Arterial</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>La TAS es menor a 140 (No incluye a 140)</th>
									<th>La TAS esta entre 140 y 160</th>
									<th>La TAS es mayor a 160 (No incluye a 160)</th>
								</tr>
								<tr>
									<td><?php echo $opcion3['1'];?></td>
									<td><?php echo $opcion3['2'];?></td>
									<td><?php echo $opcion3['3'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion3" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Glucometria</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>De 65 a 140 mg/dl</th>
									<th>De 141 a 200 mg/dl</th>
									<th>Mayor o igual a 201 mg/dl</th>
								</tr>
								<tr>
									<td><?php echo $opcion4['1'];?></td>
									<td><?php echo $opcion4['2'];?></td>
									<td><?php echo $opcion4['3'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion4" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Valor del perimetro abdominal </legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>El PA es menor a 80 cm</th>
									<th>El PA esta entre 80 y 88 cm</th>
									<th>El PA es mayor a 88 cm</th>
								</tr>
								<tr>
									<td><?php echo $opcion5['1'];?></td>
									<td><?php echo $opcion5['2'];?></td>
									<td><?php echo $opcion5['3'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion5" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>En los ultimos se&iacute;s meses ha sido hospitalizado por problemas de la tensi&oacute;n arterial o de azucar o de dolencias en el pecho</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>S&iacute;</th>
								</tr>
								<tr>
									<td><?php echo $opcion6['1'];?></td>
									<td><?php echo $opcion6['2'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion6" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Por la causa de hospitalizaci&oacute;n referida en el punto anterior, ha sido hospitalizado m&aacute;s de dos veces en los ultimos se&iacute;s meses</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>S&iacute;</th>
								</tr>
								<tr>
									<td><?php echo $opcion7['1'];?></td>
									<td><?php echo $opcion7['2'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion7" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Es usted fumador activo</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>S&iacute;</th>
								</tr>
								<tr>
									<td><?php echo $opcion8['1'];?></td>
									<td><?php echo $opcion8['2'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion8" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Consume con frecuencia bebidas alcoholicas</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>S&iacute;</th>
								</tr>
								<tr>
									<td><?php echo $opcion9['1'];?></td>
									<td><?php echo $opcion9['2'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion9" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Realiza alguna actividad fisica (Deportiva) de manera rutinaria</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>No</th>
									<th>S&iacute;</th>
								</tr>
								<tr>
									<td><?php echo $opcion10['1'];?></td>
									<td><?php echo $opcion10['2'];?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<center>
							<div id="piechart_opcion10" style="width: 100%; height: 400px;"></div>
						</center>
					</div>
				</fieldset>		
			</div>
		</div>
	</div>
	
	<div role="tabpanel" class="tab-pane" id="gestantes">
		
		<?php
		$datosMaterno = $this->admin_model->consultarDatosMaterno();
		
		$m1['si'] = 0;
		$m1['no'] = 0;
		$m2['si'] = 0;
		$m2['no'] = 0;
		$m3['si'] = 0;
		$m3['no'] = 0;
		$m4['si'] = 0;
		$m4['no'] = 0;
		$m5['si'] = 0;
		$m5['no'] = 0;
		$m6['si'] = 0;
		$m6['no'] = 0;
		$m7['si'] = 0;
		$m7['no'] = 0;
		$m8['si'] = 0;
		$m8['no'] = 0;
		$m9['si'] = 0;
		$m9['no'] = 0;
		$m10['si'] = 0;
		$m10['no'] = 0;
		$m11['si'] = 0;
		$m11['no'] = 0;
		for($i=0;$i<count($datosMaterno);$i++){
			
			if($datosMaterno[$i]->m1 != '0'){
				$m1['no'] = $m1['no'] + 1;
			}else{
				$m1['si'] = $m1['si'] + 1;
			}
			
			if($datosMaterno[$i]->m2 != '0'){
				$m2['no'] = $m2['no'] + 1;
			}else{
				$m2['si'] = $m2['si'] + 1;
			}
			
			if($datosMaterno[$i]->m3 != '0'){
				$m3['no'] = $m3['no'] + 1;
			}else{
				$m3['si'] = $m3['si'] + 1;
			}
			
			if($datosMaterno[$i]->m4 != '0'){
				$m4['no'] = $m4['no'] + 1;
			}else{
				$m4['si'] = $m4['si'] + 1;
			}
			
			if($datosMaterno[$i]->m5 != '0'){
				$m5['no'] = $m5['no'] + 1;
			}else{
				$m5['si'] = $m5['si'] + 1;
			}
			
			if($datosMaterno[$i]->m6 != '0'){
				$m6['si'] = $m6['si'] + 1;
			}else{
				$m6['no'] = $m6['no'] + 1;
			}
			
			if($datosMaterno[$i]->m7 != '0'){
				$m7['si'] = $m7['si'] + 1;
			}else{
				$m7['no'] = $m7['no'] + 1;
			}
			
			if($datosMaterno[$i]->m8 != '0' && $datosMaterno[$i]->m8 != ''){
				$m8['si'] = $m8['si'] + 1;
			}else{
				$m8['no'] = $m8['no'] + 1;
			}
			
			if($datosMaterno[$i]->m9 != '0'){
				$m9['si'] = $m9['si'] + 1;
			}else{
				$m9['no'] = $m9['no'] + 1;
			}
			
			if($datosMaterno[$i]->m10 != '0'){
				$m10['si'] = $m10['si'] + 1;
			}else{
				$m10['no'] = $m10['no'] + 1;
			}
			
			if($datosMaterno[$i]->m11 != '0' && $datosMaterno[$i]->m11 != ''){
				$m11['si'] = $m11['si'] + 1;
			}else{
				$m11['no'] = $m11['no'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m1['si'];?>],
				['NO', <?php echo $m1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m2['si'];?>],
				['NO', <?php echo $m2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m3['si'];?>],
				['NO', <?php echo $m3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m4['si'];?>],
				['NO', <?php echo $m4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m5['si'];?>],
				['NO', <?php echo $m5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m6['si'];?>],
				['NO', <?php echo $m6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m7['si'];?>],
				['NO', <?php echo $m7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m7'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m8['si'];?>],
				['NO', <?php echo $m8['no'];?>]
			]);

			var options = {
			  title: 'R8',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m8'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m9['si'];?>],
				['NO', <?php echo $m9['no'];?>]
			]);

			var options = {
			  title: 'R9',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m9'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m10['si'];?>],
				['NO', <?php echo $m10['no'];?>]
			]);

			var options = {
			  title: 'R10',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m10'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $m11['si'];?>],
				['NO', <?php echo $m11['no'];?>]
			]);

			var options = {
			  title: 'R11',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_m11'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>
									</tr>
									<tr>
										<td>R1. DURANTE SU EMBARAZO ASISTIO A SU CONSULTA DE PRIMERA VEZ CON MEDICINA GENERAL?</td>
										<td><?php echo $m1['si'];?></td>
										<td><?php echo $m1['no'];?></td>
									</tr>
									<tr>
										<td>R2. EN EL &Uacute;LTIMO MES HA ASISTIDO A CONSULTA DE CONTROL O SEGUIMIENTO PRENATAL?</td>
										<td><?php echo $m2['si'];?></td>
										<td><?php echo $m2['no'];?></td>
									</tr>
									<tr>
										<td>R3. ESQUEMA DE VACUNACI&Oacute;N COMPLETO</td>
										<td><?php echo $m3['si'];?></td>
										<td><?php echo $m3['no'];?></td>
									</tr>
									<tr>
										<td>R4. DURANTE SU EMBARAZO HA ASISTIDO A CONSULTA ODONTOLOGICA?</td>
										<td><?php echo $m4['si'];?></td>
										<td><?php echo $m4['no'];?></td>
									</tr>
									<tr>
										<td>R5. ASISTIO A CONSULTA MEDICA DESPUES DE LOS PRIMEROS 7 DIAS DEL PARTO?</td>
										<td><?php echo $m5['si'];?></td>
										<td><?php echo $m5['no'];?></td>
									</tr>
									<tr>
										<td>R6. HA TENIDO M&Aacute;S DE 2 ABORTOS SEGUIDOS?</td>
										<td><?php echo $m6['si'];?></td>
										<td><?php echo $m6['no'];?></td>
									</tr>
									<tr>
										<td>R7. HA PRESENTADO: <br />
														• DOLOR DE CABEZA O ZUMBIDO EN EL O&Iacute;DO.<br />
														• VISI&Oacute;N BORROSA CON PUNTOS DE LUCECITAS. <br />
														• NAUSEAS Y V&Oacute;MITOS FRECUENTES<br />
														• PALIDEZ MARCADA.<br />
														• HINCHAZ&Oacute;N DE PIES, MANOS, CARA.<br />
														• P&Eacute;RDIDA DE L&Iacute;QUIDO O SANGRE POR LA VAGINA O GENITALES.
										</td>
										<td><?php echo $m7['si'];?></td>
										<td><?php echo $m7['no'];?></td>
									</tr>
									<tr>
										<td>R8. GESTANTE ADOLESCENTE?</td>
										<td><?php echo $m8['si'];?></td>
										<td><?php echo $m8['no'];?></td>
									</tr>
									<tr>
										<td>R9. HA PERDIDO ALG&Uacute;N HIJO ANTES DE NACER O EN LOS PRIMEROS D&Iacute;AS DE VIDA?</td>
										<td><?php echo $m9['si'];?></td>
										<td><?php echo $m9['no'];?></td>
									</tr>
									<tr>
										<td>R10. ALG&Uacute;N PARTO  ANTERIOR OCURRI&Oacute; ANTES DEL 8° MES?</td>
										<td><?php echo $m10['si'];?></td>
										<td><?php echo $m10['no'];?></td>
									</tr>
									<tr>
										<td>R11. ADOLESCENTE EN PUERPERIO SIN METODO DE PLANIFICACION FAMILIAR</td>
										<td><?php echo $m11['si'];?></td>
										<td><?php echo $m11['no'];?></td>
									</tr>
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_m2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_m4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_m6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m7" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_m8" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m9" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_m10" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_m11" style="width: 100%;"></div>
					</center>
				</div>
			</div>
		</div>
	
	<div role="tabpanel" class="tab-pane" id="primera_infancia">
		
		<?php
		$datosPI = $this->admin_model->consultarDatosPrimeraInfancia();
		
		$p1['si'] = 0;
		$p1['no'] = 0;
		$p2['si'] = 0;
		$p2['no'] = 0;
		$p3['si'] = 0;
		$p3['no'] = 0;
		$p4['si'] = 0;
		$p4['no'] = 0;
		$p5['si'] = 0;
		$p5['no'] = 0;
		$p6['si'] = 0;
		$p6['no'] = 0;
		$p7['si'] = 0;
		$p7['no'] = 0;
		$p8['si'] = 0;
		$p8['no'] = 0;
		$p9['si'] = 0;
		$p9['no'] = 0;
		$p10['si'] = 0;
		$p10['no'] = 0;
		$p11['si'] = 0;
		$p11['no'] = 0;
		$p12['si'] = 0;
		$p12['no'] = 0;
		$p13['si'] = 0;
		$p13['no'] = 0;
		for($i=0;$i<count($datosPI);$i++){
			
			if($datosPI[$i]->pi1 != '0' && $datosPI[$i]->pi1 != ''){
				$p1['no'] = $p1['no'] + 1;
			}else{
				$p1['si'] = $p1['si'] + 1;
			}
			
			if($datosPI[$i]->pi2 != '0' && $datosPI[$i]->pi2 != ''){
				$p2['no'] = $p2['no'] + 1;
			}else{
				$p2['si'] = $p2['si'] + 1;
			}
			
			if($datosPI[$i]->pi3 != '0' && $datosPI[$i]->pi3 != ''){
				$p3['no'] = $p3['no'] + 1;
			}else{
				$p3['si'] = $p3['si'] + 1;
			}
			
			if($datosPI[$i]->pi4 != '0' && $datosPI[$i]->pi4 != ''){
				$p4['no'] = $p4['no'] + 1;
			}else{
				$p4['si'] = $p4['si'] + 1;
			}
			
			if($datosPI[$i]->pi5 != '0' && $datosPI[$i]->pi5 != ''){
				$p5['no'] = $p5['no'] + 1;
			}else{
				$p5['si'] = $p5['si'] + 1;
			}
			
			if($datosPI[$i]->pi6 != '0' && $datosPI[$i]->pi6 != ''){
				$p6['no'] = $p6['no'] + 1;
			}else{
				$p6['si'] = $p6['si'] + 1;
			}
			
			if($datosPI[$i]->pi7 != '0' && $datosPI[$i]->pi7 != ''){
				$p7['no'] = $p7['no'] + 1;
			}else{
				$p7['si'] = $p7['si'] + 1;
			}
			
			if($datosPI[$i]->pi8 != '0' && $datosPI[$i]->pi8 != ''){
				$p8['si'] = $p8['si'] + 1;
			}else{
				$p8['no'] = $p8['no'] + 1;
			}
			
			if($datosPI[$i]->pi9 != '0' && $datosPI[$i]->pi9 != ''){
				$p9['si'] = $p9['si'] + 1;
			}else{
				$p9['no'] = $p9['no'] + 1;
			}
			
			if($datosPI[$i]->pi10 != '0' && $datosPI[$i]->pi10 != ''){
				$p10['si'] = $p10['si'] + 1;
			}else{
				$p10['no'] = $p10['no'] + 1;
			}
			
			if($datosPI[$i]->pi11 != '0' && $datosPI[$i]->pi11 != ''){
				$p11['si'] = $p11['si'] + 1;
			}else{
				$p11['no'] = $p11['no'] + 1;
			}
						
			if($datosPI[$i]->pi12 != '0' && $datosPI[$i]->pi12 != ''){
				$p12['si'] = $p12['si'] + 1;
			}else{
				$p12['no'] = $p12['no'] + 1;
			}
			
			if($datosPI[$i]->pi13 != '0' && $datosPI[$i]->pi13 != ''){
				$p13['si'] = $p13['si'] + 1;
			}else{
				$p13['no'] = $p13['no'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p1['si'];?>],
				['NO', <?php echo $p1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p2['si'];?>],
				['NO', <?php echo $p2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p3['si'];?>],
				['NO', <?php echo $p3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p4['si'];?>],
				['NO', <?php echo $p4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p5['si'];?>],
				['NO', <?php echo $p5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p6['si'];?>],
				['NO', <?php echo $p6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p7['si'];?>],
				['NO', <?php echo $p7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p7'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p8['si'];?>],
				['NO', <?php echo $p8['no'];?>]
			]);

			var options = {
			  title: 'R8',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p8'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p9['si'];?>],
				['NO', <?php echo $p9['no'];?>]
			]);

			var options = {
			  title: 'R10',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p9'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p10['si'];?>],
				['NO', <?php echo $p10['no'];?>]
			]);

			var options = {
			  title: 'R10',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p10'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p11['si'];?>],
				['NO', <?php echo $p11['no'];?>]
			]);

			var options = {
			  title: 'R11',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p11'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p12['si'];?>],
				['NO', <?php echo $p12['no'];?>]
			]);

			var options = {
			  title: 'R12',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p12'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $p13['si'];?>],
				['NO', <?php echo $p13['no'];?>]
			]);

			var options = {
			  title: 'R13',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_p13'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. El NIÑO O NIÑA ESTA INSCRITO EN EL PROGRAMA DE CONTROL DE CRECIMIENTO Y DESARROLLO?</td>
										<td><?php echo $p1['si'];?></td>
										<td><?php echo $p1['no'];?></td>
									<tr>
									<tr>
										<td>R2. EN LOS ULTIMOS TRES MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</td>
										<td><?php echo $p2['si'];?></td>
										<td><?php echo $p2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. EN LOS ULTIMOS CUATRO MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</td>
										<td><?php echo $p3['si'];?></td>
										<td><?php echo $p3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. EN LOS ULTIMOS SEIS MESES EL NIÑO O NIÑA HA ASISTIDO A CONSULTA DE CONTROL Y DESARROLLO?</td>
										<td><?php echo $p4['si'];?></td>
										<td><?php echo $p4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. ESQUEMA DE VACUNACI&Oacute;N COMPLETO</td>
										<td><?php echo $p5['si'];?></td>
										<td><?php echo $p5['no'];?></td>										
									</tr>
									<tr>
										<td>R6. SU NIÑO O NIÑA HA TENIDO MEDICION DE AGUDEZA VISUAL?</td>
										<td><?php echo $p6['si'];?></td>
										<td><?php echo $p6['no'];?></td>										
									</tr>
									<tr>
										<td>R7. EL NIÑO O NIÑA HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE?</td>
										<td><?php echo $p7['si'];?></td>
										<td><?php echo $p7['no'];?></td>										
									</tr>
									<tr>
										<td>R8. MENOR DE 6 MESES SIN LACTANCIA MATERNA EXCLUSIVA</td>
										<td><?php echo $p8['si'];?></td>
										<td><?php echo $p8['no'];?></td>										
									</tr>
									<tr>
										<td>R9. EL NIÑO O NIÑA PES&Oacute; AL NACER MENOS DE 2000 GRAMOS?</td>
										<td><?php echo $p9['si'];?></td>
										<td><?php echo $p9['no'];?></td>										
									</tr>
									<tr>
										<td>R10. EL NIÑO O LA NIÑA NACIO ANTES DEL 8° MES DE EMBARAZO?</td>
										<td><?php echo $p10['si'];?></td>
										<td><?php echo $p10['no'];?></td>										
									</tr>
									<tr>
										<td>R11. EL NIÑO O NIÑA PRESENTA UNO O VARIOS DE LSO SIGUIENTES SINTOMAS: <br />
														• NO BEBE O TOMAR DEL PECHO <br />
														• VOMITA TODO LO QUE COME <br />
														• EST&Aacute; MUY SOMNOLIENTO O INCONSCIENTE <br />
														• HA TENIDO CONVULSIONES <br />
										</td>
										<td><?php echo $p11['si'];?></td>
										<td><?php echo $p11['no'];?></td>										
									</tr>
									<tr>
										<td>R12. MENOR DE DOS MESES CON SINDROME DE DIFICULTAD RESPITARORIA (SDR)</td>
										<td><?php echo $p12['si'];?></td>
										<td><?php echo $p12['no'];?></td>										
									</tr>
									<tr>
										<td>R13. MAYOR DE 2 MESES CON DIFICULTAD RESPIRATORIA MODERADA O SEVERA</td>
										<td><?php echo $p13['si'];?></td>
										<td><?php echo $p13['no'];?></td>										
									</tr>									
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p7" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p8" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p9" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p10" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p11" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_p12" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_p13" style="width: 100%;"></div>
					</center>
				</div>
			</div>
		
	</div>
	
	<div role="tabpanel" class="tab-pane" id="infancia">
	<?php
		$datosIN = $this->admin_model->consultarDatosInfancia();
		
		$in1['si'] = 0;
		$in1['no'] = 0;
		$in2['si'] = 0;
		$in2['no'] = 0;
		$in3['si'] = 0;
		$in3['no'] = 0;
		$in4['si'] = 0;
		$in4['no'] = 0;
		$in5['si'] = 0;
		$in5['no'] = 0;
		
		for($i=0;$i<count($datosIN);$i++){
			
			if($datosIN[$i]->in1 != '0' && $datosIN[$i]->in1 != ''){
				$in1['no'] = $in1['no'] + 1;
			}else{
				$in1['si'] = $in1['si'] + 1;
			}
			
			if($datosIN[$i]->in2 != '0' && $datosIN[$i]->in2 != ''){
				$in2['no'] = $in2['no'] + 1;
			}else{
				$in2['si'] = $in2['si'] + 1;
			}
			
			if($datosIN[$i]->in3 != '0' && $datosIN[$i]->in3 != ''){
				$in3['no'] = $in3['no'] + 1;
			}else{
				$in3['si'] = $in3['si'] + 1;
			}
			
			if($datosIN[$i]->in4 != '0' && $datosIN[$i]->in4 != ''){
				$in4['no'] = $in4['no'] + 1;
			}else{
				$in4['si'] = $in4['si'] + 1;
			}
			
			if($datosIN[$i]->in5 != '0' && $datosIN[$i]->in5 != ''){
				$in5['no'] = $in5['no'] + 1;
			}else{
				$in5['si'] = $in5['si'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $in1['si'];?>],
				['NO', <?php echo $in1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_in1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $in2['si'];?>],
				['NO', <?php echo $in2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_in2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $in3['si'];?>],
				['NO', <?php echo $in3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_in3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $in4['si'];?>],
				['NO', <?php echo $in4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_in4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $in5['si'];?>],
				['NO', <?php echo $in5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_in5'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. EN EL ULTIMO SEMESTRE EL MENOR HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</td>
										<td><?php echo $in1['si'];?></td>
										<td><?php echo $in1['no'];?></td>
									<tr>
									<tr>
										<td>R2. EN EL ULTIMO AÑO EL MENOR HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</td>
										<td><?php echo $in2['si'];?></td>
										<td><?php echo $in2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. ESQUEMA DE VACUNACI&Oacute;N COMPLETO</td>
										<td><?php echo $in3['si'];?></td>
										<td><?php echo $in3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. EL MENOR HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE ?</td>
										<td><?php echo $in4['si'];?></td>
										<td><?php echo $in4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. HA TENIDO MEDICION DE AGUDEZA VISUAL?</td>
										<td><?php echo $in5['si'];?></td>
										<td><?php echo $in5['no'];?></td>										
									</tr>								
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_in1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_in2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_in3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_in4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_in5" style="width: 100%;"></div>
					</center>
				</div>
			</div>			
	</div>
		
	
		
	<div role="tabpanel" class="tab-pane" id="juventud">
		<?php
		$datosJU = $this->admin_model->consultarDatosJuventud();
		
		$ju1['si'] = 0;
		$ju1['no'] = 0;
		$ju2['si'] = 0;
		$ju2['no'] = 0;
		$ju3['si'] = 0;
		$ju3['no'] = 0;
		$ju4['si'] = 0;
		$ju4['no'] = 0;
		$ju5['si'] = 0;
		$ju5['no'] = 0;
		$ju6['si'] = 0;
		$ju6['no'] = 0;
		$ju7['si'] = 0;
		$ju7['no'] = 0;
		
		for($i=0;$i<count($datosJU);$i++){
			
			if($datosJU[$i]->ju1 != '0' && $datosJU[$i]->ju1 != ''){
				$ju1['no'] = $ju1['no'] + 1;
			}else{
				$ju1['si'] = $ju1['si'] + 1;
			}
			
			if($datosJU[$i]->ju2 != '0' && $datosJU[$i]->ju2 != ''){
				$ju2['no'] = $ju2['no'] + 1;
			}else{
				$ju2['si'] = $ju2['si'] + 1;
			}
			
			if($datosJU[$i]->ju3 != '0' && $datosJU[$i]->ju3 != ''){
				$ju3['no'] = $ju3['no'] + 1;
			}else{
				$ju3['si'] = $ju3['si'] + 1;
			}
			
			if($datosJU[$i]->ju4 != '0' && $datosJU[$i]->ju4 != ''){
				$ju4['no'] = $ju4['no'] + 1;
			}else{
				$ju4['si'] = $ju4['si'] + 1;
			}
			
			if($datosJU[$i]->ju5 != '0' && $datosJU[$i]->ju5 != ''){
				$ju5['si'] = $ju5['si'] + 1;
			}else{
				$ju5['no'] = $ju5['no'] + 1;
			}
			
			if($datosJU[$i]->ju6 != '0' && $datosJU[$i]->ju6 != ''){
				$ju6['si'] = $ju6['si'] + 1;
			}else{
				$ju6['no'] = $ju6['no'] + 1;
			}
			
			if($datosJU[$i]->ju7 != '0' && $datosJU[$i]->ju7 != ''){
				$ju7['si'] = $ju7['si'] + 1;
			}else{
				$ju7['no'] = $ju7['no'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju1['si'];?>],
				['NO', <?php echo $ju1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju2['si'];?>],
				['NO', <?php echo $ju2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju3['si'];?>],
				['NO', <?php echo $ju3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju4['si'];?>],
				['NO', <?php echo $ju4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju5['si'];?>],
				['NO', <?php echo $ju5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju6['si'];?>],
				['NO', <?php echo $ju6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ju7['si'];?>],
				['NO', <?php echo $ju7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ju7'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. EN EL ULTIMO AÑO HA ASISTIDO A CONSULTA POR MEDICINA GENERAL ?</td>
										<td><?php echo $ju1['si'];?></td>
										<td><?php echo $ju1['no'];?></td>
									<tr>
									<tr>
										<td>R2. HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE? </td>
										<td><?php echo $ju2['si'];?></td>
										<td><?php echo $ju2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ? </td>
										<td><?php echo $ju3['si'];?></td>
										<td><?php echo $ju3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS?</td>
										<td><?php echo $ju4['si'];?></td>
										<td><?php echo $ju4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. HA FUMADO EN EL ULTIMO MES ?</td>
										<td><?php echo $ju5['si'];?></td>
										<td><?php echo $ju5['no'];?></td>										
									</tr>
									<tr>
										<td>R6. CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"? </td>
										<td><?php echo $ju6['si'];?></td>
										<td><?php echo $ju6['no'];?></td>										
									</tr>
									<tr>
										<td>R7. ANTECEDENTE DE EMBARAZO EN ADOLESCENTE?</td>
										<td><?php echo $ju7['si'];?></td>
										<td><?php echo $ju7['no'];?></td>										
									</tr>								
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ju1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ju2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ju3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ju4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ju5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ju6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ju7" style="width: 100%;"></div>
					</center>
				</div>
			</div>
	</div>

	<div role="tabpanel" class="tab-pane" id="adolescencia">
		<?php
		$datosAD = $this->admin_model->consultarDatosAdolescencia();
		
		$ad1['si'] = 0;
		$ad1['no'] = 0;
		$ad2['si'] = 0;
		$ad2['no'] = 0;
		$ad3['si'] = 0;
		$ad3['no'] = 0;
		$ad4['si'] = 0;
		$ad4['no'] = 0;
		$ad5['si'] = 0;
		$ad5['no'] = 0;
		$ad6['si'] = 0;
		$ad6['no'] = 0;
		$ad7['si'] = 0;
		$ad7['no'] = 0;
		$ad8['si'] = 0;
		$ad8['no'] = 0;
		$ad9['si'] = 0;
		$ad9['no'] = 0;
		
		for($i=0;$i<count($datosAD);$i++){
			
			if($datosAD[$i]->ad1 != '0' && $datosAD[$i]->ad1 != ''){
				$ad1['no'] = $ad1['no'] + 1;
			}else{
				$ad1['si'] = $ad1['si'] + 1;
			}
			
			if($datosAD[$i]->ad2 != '0' && $datosAD[$i]->ad2 != ''){
				$ad2['no'] = $ad2['no'] + 1;
			}else{
				$ad2['si'] = $ad2['si'] + 1;
			}
			
			if($datosAD[$i]->ad3 != '0' && $datosAD[$i]->ad3 != ''){
				$ad3['no'] = $ad3['no'] + 1;
			}else{
				$ad3['si'] = $ad3['si'] + 1;
			}
			
			if($datosAD[$i]->ad4 != '0' && $datosAD[$i]->ad4 != ''){
				$ad4['no'] = $ad4['no'] + 1;
			}else{
				$ad4['si'] = $ad4['si'] + 1;
			}
			
			if($datosAD[$i]->ad5 != '0' && $datosAD[$i]->ad5 != ''){
				$ad5['no'] = $ad5['no'] + 1;
			}else{
				$ad5['si'] = $ad5['si'] + 1;
			}
			
			if($datosAD[$i]->ad6 != '0' && $datosAD[$i]->ad6 != ''){
				$ad6['no'] = $ad6['no'] + 1;
			}else{
				$ad6['si'] = $ad6['si'] + 1;
			}
			
			if($datosAD[$i]->ad7 != '0' && $datosAD[$i]->ad7 != ''){
				$ad7['si'] = $ad7['si'] + 1;
			}else{
				$ad7['no'] = $ad7['no'] + 1;
			}
			
			if($datosAD[$i]->ad8 != '0' && $datosAD[$i]->ad8 != ''){
				$ad8['si'] = $ad8['si'] + 1;
			}else{
				$ad8['no'] = $ad8['no'] + 1;
			}
			
			if($datosAD[$i]->ad9 != '0' && $datosAD[$i]->ad9 != ''){
				$ad9['si'] = $ad9['si'] + 1;
			}else{
				$ad9['no'] = $ad9['no'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad1['si'];?>],
				['NO', <?php echo $ad1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad2['si'];?>],
				['NO', <?php echo $ad2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad3['si'];?>],
				['NO', <?php echo $ad3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad4['si'];?>],
				['NO', <?php echo $ad4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad5['si'];?>],
				['NO', <?php echo $ad5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad6['si'];?>],
				['NO', <?php echo $ad6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad7['si'];?>],
				['NO', <?php echo $ad7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad7'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad8['si'];?>],
				['NO', <?php echo $ad8['no'];?>]
			]);

			var options = {
			  title: 'R8',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad8'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ad9['si'];?>],
				['NO', <?php echo $ad9['no'];?>]
			]);

			var options = {
			  title: 'R9',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ad9'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. EN EL ULTIMO AÑO HA ASISTIDO A CONSULTA POR MEDICINA GENERAL?</td>
										<td><?php echo $ad1['si'];?></td>
										<td><?php echo $ad1['no'];?></td>
									<tr>
									<tr>
										<td>R2. ESQUEMA DE VACUNACI&Oacute;N COMPLETO </td>
										<td><?php echo $ad2['si'];?></td>
										<td><?php echo $ad2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE?</td>
										<td><?php echo $ad3['si'];?></td>
										<td><?php echo $ad3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ?</td>
										<td><?php echo $ad4['si'];?></td>
										<td><?php echo $ad4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. HA TENIDO MEDICION DE AGUDEZA VISUAL?</td>
										<td><?php echo $ad5['si'];?></td>
										<td><?php echo $ad5['no'];?></td>										
									</tr>
									<tr>
										<td>R6. SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS </td>
										<td><?php echo $ad6['si'];?></td>
										<td><?php echo $ad6['no'];?></td>										
									</tr>
									<tr>
										<td>R7. ANTECEDENTE DE EMBARAZO EN ADOLESCENTE?</td>
										<td><?php echo $ad7['si'];?></td>
										<td><?php echo $ad7['no'];?></td>										
									</tr>	
									<tr>
										<td>R8. HA FUMADO EN EL ULTIMO MES?</td>
										<td><?php echo $ad8['si'];?></td>
										<td><?php echo $ad8['no'];?></td>										
									</tr>	
									<tr>
										<td>R9. CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"?</td>
										<td><?php echo $ad9['si'];?></td>
										<td><?php echo $ad9['no'];?></td>										
									</tr>								
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ad1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ad2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ad3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ad4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ad5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ad6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ad7" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ad8" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ad9" style="width: 100%;"></div>
					</center>
				</div>
			</div>
	</div>
				
	<div role="tabpanel" class="tab-pane" id="adultez">
		<?php
		$datosADU = $this->admin_model->consultarDatosAdultez();
		
		$adu1['si'] = 0;
		$adu1['no'] = 0;
		$adu2['si'] = 0;
		$adu2['no'] = 0;
		$adu3['si'] = 0;
		$adu3['no'] = 0;
		$adu4['si'] = 0;
		$adu4['no'] = 0;
		$adu5['si'] = 0;
		$adu5['no'] = 0;
		$adu6['si'] = 0;
		$adu6['no'] = 0;
		$adu7['si'] = 0;
		$adu7['no'] = 0;
		$adu8['si'] = 0;
		$adu8['no'] = 0;
		$adu9['si'] = 0;
		$adu9['no'] = 0;
		
		for($i=0;$i<count($datosADU);$i++){
			
			if($datosADU[$i]->adu1 != '0' && $datosADU[$i]->adu1 != ''){
				$adu1['no'] = $adu1['no'] + 1;
			}else{
				$adu1['si'] = $adu1['si'] + 1;
			}
			
			if($datosADU[$i]->adu2 != '0' && $datosADU[$i]->adu2 != ''){
				$adu2['no'] = $adu2['no'] + 1;
			}else{
				$adu2['si'] = $adu2['si'] + 1;
			}
			
			if($datosADU[$i]->adu3 != '0' && $datosADU[$i]->adu3 != ''){
				$adu3['no'] = $adu3['no'] + 1;
			}else{
				$adu3['si'] = $adu3['si'] + 1;
			}
			
			if($datosADU[$i]->adu4 != '0' && $datosADU[$i]->adu4 != ''){
				$adu4['no'] = $adu4['no'] + 1;
			}else{
				$adu4['si'] = $adu4['si'] + 1;
			}
			
			if($datosADU[$i]->adu5 != '0' && $datosADU[$i]->adu5 != ''){
				$adu5['no'] = $adu5['no'] + 1;
			}else{
				$adu5['si'] = $adu5['si'] + 1;
			}
			
			if($datosADU[$i]->adu6 != '0' && $datosADU[$i]->adu6 != ''){
				$adu6['no'] = $adu6['no'] + 1;
			}else{
				$adu6['si'] = $adu6['si'] + 1;
			}
			
			if($datosADU[$i]->adu7 != '0' && $datosADU[$i]->adu7 != ''){
				$adu7['si'] = $adu7['si'] + 1;
			}else{
				$adu7['no'] = $adu7['no'] + 1;
			}
			
			if($datosADU[$i]->adu8 != '0' && $datosADU[$i]->adu8 != ''){
				$adu8['si'] = $adu8['si'] + 1;
			}else{
				$adu8['no'] = $adu8['no'] + 1;
			}
			
			if($datosADU[$i]->adu9 != '0' && $datosADU[$i]->adu9 != ''){
				$adu9['si'] = $adu9['si'] + 1;
			}else{
				$adu9['no'] = $adu9['no'] + 1;
			}
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu1['si'];?>],
				['NO', <?php echo $adu1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu2['si'];?>],
				['NO', <?php echo $adu2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu3['si'];?>],
				['NO', <?php echo $adu3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu4['si'];?>],
				['NO', <?php echo $adu4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu5['si'];?>],
				['NO', <?php echo $adu5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu6['si'];?>],
				['NO', <?php echo $adu6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu7['si'];?>],
				['NO', <?php echo $adu7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu7'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu8['si'];?>],
				['NO', <?php echo $adu8['no'];?>]
			]);

			var options = {
			  title: 'R8',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu8'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $adu9['si'];?>],
				['NO', <?php echo $adu9['no'];?>]
			]);

			var options = {
			  title: 'R9',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_adu9'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. HA ASISTIDO A CONSULTA POR MEDICINA GENERAL LOS ULTIMOS 5 AÑOS?</td>
										<td><?php echo $adu1['si'];?></td>
										<td><?php echo $adu1['no'];?></td>
									<tr>
									<tr>
										<td>R2. SE HA REALIZADO MAMOGRAFIA EN LOS ULTIMOS 2 AÑOS? </td>
										<td><?php echo $adu2['si'];?></td>
										<td><?php echo $adu2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS?</td>
										<td><?php echo $adu3['si'];?></td>
										<td><?php echo $adu3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. HA TENIDO MEDICION DE AGUDEZA VISUAL?</td>
										<td><?php echo $adu4['si'];?></td>
										<td><?php echo $adu4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE? </td>
										<td><?php echo $adu5['si'];?></td>
										<td><?php echo $adu5['no'];?></td>										
									</tr>
									<tr>
										<td>R6. HA ASISTIDO A CONSULTA DE PLANIFICACI&Oacute;N FAMILIAR ALGUNA VEZ? </td>
										<td><?php echo $adu6['si'];?></td>
										<td><?php echo $adu6['no'];?></td>										
									</tr>
									<tr>
										<td>R7. LE HAN REALIZADO LA PRUEBA DE ANTIGENO PROSTATICO?</td>
										<td><?php echo $adu7['si'];?></td>
										<td><?php echo $adu7['no'];?></td>										
									</tr>	
									<tr>
										<td>R8. HA FUMADO EN EL ULTIMO MES?</td>
										<td><?php echo $adu8['si'];?></td>
										<td><?php echo $adu8['no'];?></td>										
									</tr>	
									<tr>
										<td>R9. CONSUME CON FRECUENCIA BEBIDAS ALCOHOLICAS "POR LO MENOS UNA VEZ POR SEMANA"?</td>
										<td><?php echo $adu9['si'];?></td>
										<td><?php echo $adu9['no'];?></td>										
									</tr>								
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_adu1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_adu2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_adu3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_adu4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_adu5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_adu6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_adu7" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_adu8" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_adu9" style="width: 100%;"></div>
					</center>
				</div>
			</div>
	</div>
				
	<div role="tabpanel" class="tab-pane" id="vejez">
		<?php
		$datosVE = $this->admin_model->consultarDatosVejez();
		
		$ve1['si'] = 0;
		$ve1['no'] = 0;
		$ve2['si'] = 0;
		$ve2['no'] = 0;
		$ve3['si'] = 0;
		$ve3['no'] = 0;
		$ve4['si'] = 0;
		$ve4['no'] = 0;
		$ve5['si'] = 0;
		$ve5['no'] = 0;
		$ve6['si'] = 0;
		$ve6['no'] = 0;
		$ve7['si'] = 0;
		$ve7['no'] = 0;
		for($i=0;$i<count($datosVE);$i++){
			
			if($datosVE[$i]->ve1 != '0' && $datosVE[$i]->ve1 != ''){
				$ve1['no'] = $ve1['no'] + 1;
			}else{
				$ve1['si'] = $ve1['si'] + 1;
			}
			
			if($datosVE[$i]->ve2 != '0' && $datosVE[$i]->ve2 != ''){
				$ve2['no'] = $ve2['no'] + 1;
			}else{
				$ve2['si'] = $ve2['si'] + 1;
			}
			
			if($datosVE[$i]->ve3 != '0' && $datosVE[$i]->ve3 != ''){
				$ve3['no'] = $ve3['no'] + 1;
			}else{
				$ve3['si'] = $ve3['si'] + 1;
			}
			
			if($datosVE[$i]->ve4 != '0' && $datosVE[$i]->ve4 != ''){
				$ve4['no'] = $ve4['no'] + 1;
			}else{
				$ve4['si'] = $ve4['si'] + 1;
			}
			
			if($datosVE[$i]->ve5 != '0' && $datosVE[$i]->ve5 != ''){
				$ve5['no'] = $ve5['no'] + 1;
			}else{
				$ve5['si'] = $ve5['si'] + 1;
			}
			
			if($datosVE[$i]->ve6 != '0' && $datosVE[$i]->ve6 != ''){
				$ve6['no'] = $ve6['no'] + 1;
			}else{
				$ve6['si'] = $ve6['si'] + 1;
			}
			
			if($datosVE[$i]->ve7 != '0' && $datosVE[$i]->ve7 != ''){
				$ve7['si'] = $ve7['si'] + 1;
			}else{
				$ve7['no'] = $ve7['no'] + 1;
			}
			/*
			if($datosVE[$i]->ve1 != '0' && $datosVE[$i]->ve1 != ''){
				$ve1['no']++;
			}else{
				$ve1['si']++;
			}
			
			if($datosVE[$i]->ve2 != 0 && $datosVE[$i]->ve2 != ''){
				$ve2['no']++;
			}else{
				$ve2['si']++;
			}
			
			if($datosVE[$i]->ve3 != 0 && $datosVE[$i]->ve3 != ''){
				$ve3['no']++;
			}else{
				$ve3['si']++;
			}
			
			if($datosVE[$i]->ve4 != 0 && $datosVE[$i]->ve4 != ''){
				$ve4['no']++;
			}else{
				$ve4['si']++;
			}
			
			if($datosVE[$i]->ve5 != 0 && $datosVE[$i]->ve5 != ''){
				$ve5['no']++;
			}else{
				$ve5['si']++;
			}
			
			if($datosVE[$i]->ve6 != 0 && $datosVE[$i]->ve6 != ''){
				$ve6['no']++;
			}else{
				$ve6['si']++;
			}
			
			if($datosVE[$i]->ve7 != 0 && $datosVE[$i]->ve7 != ''){
				$ve7['si']++;
			}else{
				$ve7['no']++;
			}*/
		}
		?>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve1['si'];?>],
				['NO', <?php echo $ve1['no'];?>]
			]);

			var options = {
			  title: 'R1',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve1'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve2['si'];?>],
				['NO', <?php echo $ve2['no'];?>]
			]);

			var options = {
			  title: 'R2',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve2'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve3['si'];?>],
				['NO', <?php echo $ve3['no'];?>]
			]);

			var options = {
			  title: 'R3',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve3'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve4['si'];?>],
				['NO', <?php echo $ve4['no'];?>]
			]);

			var options = {
			  title: 'R4',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve4'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve5['si'];?>],
				['NO', <?php echo $ve5['no'];?>]
			]);

			var options = {
			  title: 'R5',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve5'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve6['si'];?>],
				['NO', <?php echo $ve6['no'];?>]
			]);

			var options = {
			  title: 'R6',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve6'));
			chart.draw(data, options);
			}
		</script>
		<script type="text/javascript">
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Respuesta', 'Total'],
				['SI', <?php echo $ve7['si'];?>],
				['NO', <?php echo $ve7['no'];?>]
			]);

			var options = {
			  title: 'R7',
			  is3D: true
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_ve7'));
			chart.draw(data, options);
			}
		</script>
			<div class="row">
				<div class="col-md-12">
					<fieldset>
						<div class="row">
							<div class="col-md-12">
								<table class="table table-bordered">
									<tr>
										<th>PREGUNTA</th>
										<th>SI</th>
										<th>NO</th>										
									</tr>
									<tr>
										<td>R1. HA ASISTIDO A CONSULTA POR MEDICINA GENERAL LOS ULTIMOS 5 AÑOS?</td>
										<td><?php echo $ve1['si'];?></td>
										<td><?php echo $ve1['no'];?></td>
									<tr>
									<tr>
										<td>R2. VACUNACI&Oacute;N SEG&Uacute;N EL ESQUEMA DEL PAI?</td>
										<td><?php echo $ve2['si'];?></td>
										<td><?php echo $ve2['no'];?></td>										
									</tr>
									<tr>
										<td>R3. HA ASISTIDO A CONSULTA POR ODONTOLOGIA EN EL ULTIMO SEMESTRE?</td>
										<td><?php echo $ve3['si'];?></td>
										<td><?php echo $ve3['no'];?></td>										
									</tr>
									<tr>
										<td>R4. SE HA REALIZADO MAMOGRAFIA EN LOS ULTIMOS 2 AÑOS?</td>
										<td><?php echo $ve4['si'];?></td>
										<td><?php echo $ve4['no'];?></td>										
									</tr>
									<tr>
										<td>R5. SE HA TOMADO LA CITOLOGIA CERVICO UTERINA EN LOS DOS ULTIMOS AÑOS?</td>
										<td><?php echo $ve5['si'];?></td>
										<td><?php echo $ve5['no'];?></td>										
									</tr>
									<tr>
										<td>R6. LE HAN REALIZADO LA PRUEBA DE ANTIGENO PROSTATICO?</td>
										<td><?php echo $ve6['si'];?></td>
										<td><?php echo $ve6['no'];?></td>										
									</tr>
									<tr>
										<td>R7. PERSONA SIN TRATAMIENTO PARA CONDICI&Oacute;N CR&Oacute;NICA </td>
										<td><?php echo $ve7['si'];?></td>
										<td><?php echo $ve7['no'];?></td>										
									</tr>							
								</table>
							</div>
						</div>
						
					</fieldset>		
				</div>				
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ve1" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ve2" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ve3" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ve4" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ve5" style="width: 100%;"></div>
					</center>
				</div>
				<div class="col-md-6">
					<center>
						<div id="piechart_ve6" style="width: 100%;"></div>
					</center>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<center>
						<div id="piechart_ve7" style="width: 100%;"></div>
					</center>
				</div>
			</div>
	</div>
		
	<div role="tabpanel" class="tab-pane" id="archivos">
		<?php
		$datosVE = $this->admin_model->consultarDatosVejez();
		
		?>
		<div class="row">
			<div class="col-md-12">
				<fieldset>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>ARCHIVO</th>
									<th>DESCARGAR</th>							
								</tr>
								<tr>
									<td>Visitas efectivas y no efectivas</td>
									<td><a href="<?php echo base_url('admin/generarReporte/1');?>"><img src="<?php echo base_url('assets/imgs/excel.png')?>"></a></td>
								<tr>
								<tr>
									<td>Visitas Cursos de vida</td>
									<td><a href="<?php echo base_url('admin/generarReporte/2');?>"><img src="<?php echo base_url('assets/imgs/excel.png')?>"></a></td>
								</tr>
								<tr>
									<td>Visitas Agendamiento</td>
									<td><a href="<?php echo base_url('admin/generarReporte/3');?>"><img src="<?php echo base_url('assets/imgs/excel.png')?>"></a></td>
								</tr>
							</table>
						</div>
					</div>
					
				</fieldset>		
			</div>				
		</div>			
	</div>	
		
  </div>

</div>



