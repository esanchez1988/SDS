<?php
$visitasFicha = $this->admin_model->cunsultarFichas();
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

?>

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
	var data = google.visualization.arrayToDataTable([
		['Alerta', 'Total'],
		['Traslado inmediato', <?php echo $prioridad1;?>],
		['Agendamiento', <?php echo $prioridad2;?>]
	]);

	var options = {
	  title: 'Alerta Roja',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_roja'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data = google.visualization.arrayToDataTable([
		['Examen', 'Total'],
		['TAS', <?php echo $noperm_tas[0]->total;?>],
		['Glucometria', <?php echo $noperm_gluc[0]->total;?>],
		['Perimetro Abdominal', <?php echo $noperm_perim[0]->total;?>]
	]);

	var options = {
	  title: 'Examenes No realizados',
	  is3D: true,
	  colors: ['#cc0000', '#f1da36', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_nopermitido'));
	chart.draw(data, options);
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
    <li role="presentation"><a href="#tematicos" aria-controls="profile" role="tab" data-toggle="tab">Informes Tem&aacute;ticos</a></li>
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
						<td><?php echo count($visitasFicha);?></td>
						<td><?php echo $totalNoEfectivas;?></td>
						<td>
						<?php 
							$t_visit = $visitasTotales[0]->total;
							$v_efect = count($visitasFicha);
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
			<div class="col-md-6">
				<fieldset>
					<legend>Alerta Roja - Prioridad</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Traslado inmediato</th>
									<th>Agendamiento</th>
								</tr>
								<tr>
									<td><?php echo $prioridad1;?></td>
									<td><?php echo $prioridad2;?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_roja" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Examenes no permitidos</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>TAS</th>
									<th>Glucometria</th>
									<th>Perimetro Abdominal</th>
								</tr>
								<tr>
									<td><?php echo $noperm_tas[0]->total;?></td>
									<td><?php echo $noperm_gluc[0]->total;?></td>
									<td><?php echo $noperm_perim[0]->total;?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_nopermitido" style="width: 100%; height: 400px;"></div>
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
  </div>

</div>



