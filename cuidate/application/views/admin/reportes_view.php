<?php
$reporte_imc_hombres = $this->gestor_model->reporte_imc_hombres();
$reporte_imc_mujeres = $this->gestor_model->reporte_imc_mujeres();

$personas = $this->gestor_model->reporte_personas();

$verde = 0;
$amarillo = 0;
$rojo = 0;
$hombres_riesgo = 0;
$hombres_sin_riesgo = 0;
$mujeres_riesgo = 0;
$mujeres_sin_riesgo = 0;
$actividad = 0;
$sin_actividad = 0;
$frutas = 0;
$sin_frutas = 0;
$tabaco_hombre = 0;
$sin_tabaco_hombre = 0;
$tabaco_mujer = 0;
$sin_tabaco_mujer = 0;
$bebidas = 0;
$sin_bebidas = 0;
$tas['1']['t']=0;
$tas['2']['t']=0;
$tas['3']['t']=0;
$tas['4']['t']=0;
$tas['5']['t']=0;
$tas['1']['s']=0;
$tas['2']['s']=0;
$tas['3']['s']=0;
$tas['4']['s']=0;
$tas['5']['s']=0;
$tad['1']['t']=0;
$tad['2']['t']=0;
$tad['3']['t']=0;
$tad['4']['t']=0;
$tad['5']['t']=0;
$tad['1']['s']=0;
$tad['2']['s']=0;
$tad['3']['s']=0;
$tad['4']['s']=0;
$tad['5']['s']=0;

for($i=0;$i<count($personas);$i++){
	
	$puntaje = 0;
	
	if($personas[$i]->imc >= 0 && $personas[$i]->imc < 18.5){
		$puntaje = $puntaje + 0;
	}else if($personas[$i]->imc >= 18.5 && $personas[$i]->imc < 25){
		$puntaje = $puntaje + 0;
	}else if($personas[$i]->imc >= 25 && $personas[$i]->imc < 30){
		$puntaje = $puntaje + 1;
	}else if($personas[$i]->imc >= 30){
		$puntaje = $puntaje + 2;
	}
	
	if($personas[$i]->actividad == 'Si'){
		$puntaje = $puntaje + 0;
		$actividad++;
	}else{
		$puntaje = $puntaje + 1;
		$sin_actividad++;
	}
	
	if($personas[$i]->tabaco == 'Si'){
		
		if($personas[$i]->sexo == 1){
			$tabaco_hombre++;
			if($personas[$i]->edad >= 20 && $personas[$i]->edad <= 39) {
				$puntaje = $puntaje + 8;
			}else if($personas[$i]->edad >= 40 && $personas[$i]->edad <= 49) {
				$puntaje = $puntaje + 5;
			}else if($personas[$i]->edad >= 50 && $personas[$i]->edad <= 59) {
				$puntaje = $puntaje + 3;
			}else if($personas[$i]->edad >= 60 && $personas[$i]->edad <= 69) {
				$puntaje = $puntaje + 1;
			}else if($personas[$i]->edad >= 70 && $personas[$i]->edad <= 79) {
				$puntaje = $puntaje + 1;
			}
		}else if($personas[$i]->sexo == 2){
			$tabaco_mujer++;
			if($personas[$i]->edad >= 20 && $personas[$i]->edad <= 39) {
				$puntaje = $puntaje + 9;
			}else if($personas[$i]->edad >= 40 && $personas[$i]->edad <= 49) {
				$puntaje = $puntaje + 7;
			}else if($personas[$i]->edad >= 50 && $personas[$i]->edad <= 59) {
				$puntaje = $puntaje + 4;
			}else if($personas[$i]->edad >= 60 && $personas[$i]->edad <= 69) {
				$puntaje = $puntaje + 2;
			}else if($personas[$i]->edad >= 70 && $personas[$i]->edad <= 79) {
				$puntaje = $puntaje + 1;
			}
		}else if($personas[$i]->sexo == 3){
			if($personas[$i]->sexopr == 1){
				$tabaco_hombre++;
				if($personas[$i]->edad >= 20 && $personas[$i]->edad <= 39) {
					$puntaje = $puntaje + 8;
				}else if($personas[$i]->edad >= 40 && $personas[$i]->edad <= 49) {
					$puntaje = $puntaje + 5;
				}else if($personas[$i]->edad >= 50 && $personas[$i]->edad <= 59) {
					$puntaje = $puntaje + 3;
				}else if($personas[$i]->edad >= 60 && $personas[$i]->edad <= 69) {
					$puntaje = $puntaje + 1;
				}else if($personas[$i]->edad >= 70 && $personas[$i]->edad <= 79) {
					$puntaje = $puntaje + 1;
				}
			}else if($personas[$i]->sexopr == 2){
				$tabaco_mujer++;
				if($personas[$i]->edad >= 20 && $personas[$i]->edad <= 39) {
					$puntaje = $puntaje + 9;
				}else if($personas[$i]->edad >= 40 && $personas[$i]->edad <= 49) {
					$puntaje = $puntaje + 7;
				}else if($personas[$i]->edad >= 50 && $personas[$i]->edad <= 59) {
					$puntaje = $puntaje + 4;
				}else if($personas[$i]->edad >= 60 && $personas[$i]->edad <= 69) {
					$puntaje = $puntaje + 2;
				}else if($personas[$i]->edad >= 70 && $personas[$i]->edad <= 79) {
					$puntaje = $puntaje + 1;
				}
			}
		}
		
	}else{
		if($personas[$i]->sexo == 1){
			$sin_tabaco_hombre++;			
		}else if($personas[$i]->sexo == 2){
			$sin_tabaco_mujer++;			
		}else if($personas[$i]->sexo == 3){
			if($personas[$i]->sexopr == 1){
				$sin_tabaco_hombre++;				
			}else if($personas[$i]->sexopr == 2){
				$sin_tabaco_mujer++;				
			}
		}
	}
	
	if($personas[$i]->frutas == 'Ntd'){
		$puntaje = $puntaje + 1;
		$frutas++;
	}else{
		$sin_frutas++;
	}
	
	if($personas[$i]->bebidas == 'Td'){
		$puntaje = $puntaje + 1;
		$bebidas++;
	}else{
		$sin_bebidas++;
	}
	
	if($personas[$i]->tratamiento == 'Si'){
		if($personas[$i]->tas < 120){
			$tas['1']['t']++;
		}else if($personas[$i]->tas >= 120 && $personas[$i]->tas <= 129){
			$puntaje = $puntaje + 1;
			$tas['2']['t']++;
		}else if($personas[$i]->tas >= 130 && $personas[$i]->tas <= 139){
			$puntaje = $puntaje + 2;
			$tas['3']['t']++;
		}else if($personas[$i]->tas >= 140 && $personas[$i]->tas <= 159){
			$puntaje = $puntaje + 2;
			$tas['4']['t']++;
		}else if($personas[$i]->tas > 160){
			$puntaje = $puntaje + 3;
			$tas['5']['t']++;
		}
		
		if($personas[$i]->tad < 80){
			$tad['1']['t']++;
		}else if($personas[$i]->tad >= 80 && $personas[$i]->tad <= 84){
			$puntaje = $puntaje + 3;
			$tad['2']['t']++;
		}else if($personas[$i]->tad >= 85 && $personas[$i]->tad <= 89){
			$puntaje = $puntaje + 4;
			$tad['3']['t']++;
		}else if($personas[$i]->tad >= 90 && $personas[$i]->tad <= 99){
			$puntaje = $puntaje + 5;
			$tad['4']['t']++;
		}else if($personas[$i]->tad > 100){
			$puntaje = $puntaje + 6;
			$tad['5']['t']++;
		}
		
	}else{
		if($personas[$i]->tas < 120){
			$tas['1']['s']++;
		}else if($personas[$i]->tas >= 120 && $personas[$i]->tas <= 129){
			$puntaje = $puntaje + 0;
			$tas['2']['s']++;
		}else if($personas[$i]->tas >= 130 && $personas[$i]->tas <= 139){
			$puntaje = $puntaje + 1;
			$tas['3']['s']++;
		}else if($personas[$i]->tas >= 140 && $personas[$i]->tas <= 159){
			$puntaje = $puntaje + 2;
			$tas['4']['s']++;
		}else if($personas[$i]->tas > 160){
			$puntaje = $puntaje + 3;
			$tas['5']['s']++;
		}
		
		if($personas[$i]->tad < 80){
			$tad['1']['s']++;
		}else if($personas[$i]->tad >= 80 && $personas[$i]->tad <= 84){
			$puntaje = $puntaje + 1;
			$tad['2']['s']++;
		}else if($personas[$i]->tad >= 85 && $personas[$i]->tad <= 89){
			$puntaje = $puntaje + 2;
			$tad['3']['s']++;
		}else if($personas[$i]->tad >= 90 && $personas[$i]->tad <= 99){
			$puntaje = $puntaje + 3;
			$tad['4']['s']++;
		}else if($personas[$i]->tad > 100){
			$puntaje = $puntaje + 4;
			$tad['5']['s']++;
		}
	}
	
	if($personas[$i]->sexo == 1){
			if($personas[$i]->pa > 90) {
				$puntaje = $puntaje + 1;
				$hombres_riesgo++;
			}else{
				$hombres_sin_riesgo++;
			}
	}else if($personas[$i]->sexo == 2){
		if($personas[$i]->pa > 80) {
			$puntaje = $puntaje + 1;
			$mujeres_riesgo++;
		}else{
			$mujeres_sin_riesgo++;
		}
	}else if($personas[$i]->sexo == 3){
		if($personas[$i]->sexopr == 1){
			if($personas[$i]->pa > 90) {
				$puntaje = $puntaje + 1;
				$hombres_riesgo++;
			}else{
				$hombres_sin_riesgo++;
			}
		}else if($personas[$i]->sexopr == 2){
			if($personas[$i]->pa > 80) {
				$puntaje = $puntaje + 1;
				$mujeres_riesgo++;
			}else{
				$mujeres_sin_riesgo++;
			}
		}
	}
	
	
	if($puntaje >= 0 && $puntaje <= 4){
		$verde++;
	}else if($puntaje >= 5 && $puntaje <= 10){
		$amarillo++;
	}else if($puntaje >= 11 && $puntaje <= 16){
		$rojo++;
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
	  title: 'Alertas',
	  is3D: true,
	  colors: ['#cc0000', '#f1da36', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_alertas'));
	chart.draw(data, options);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['IMC', 'Total'],
		<?php
		for($i=0;$i<count($reporte_imc_hombres);$i++){
			echo "['".$reporte_imc_hombres[$i]->desc_imc."', ".$reporte_imc_hombres[$i]->total."],";
		}
		?>
	]);

	var options2 = {
	  title: 'IMC Hombres',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_imc_hombres'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['IMC', 'Total'],
		<?php
		for($i=0;$i<count($reporte_imc_mujeres);$i++){
			echo "['".$reporte_imc_mujeres[$i]->desc_imc."', ".$reporte_imc_mujeres[$i]->total."],";
		}
		?>
	]);

	var options2 = {
	  title: 'IMC Mujeres',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_imc_mujeres'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Riesgo', 'Total'],
		['Riesgo Cardiovascular', <?php echo $hombres_riesgo;?>],
		['Sin Riesgo Cardiovascular', <?php echo $hombres_sin_riesgo;?>]
	]);

	var options2 = {
	  title: 'Riesgo Cardiovascular Hombres',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_riesgo_hombres'));
	chart.draw(data2, options2);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Riesgo', 'Total'],
		['Riesgo Cardiovascular', <?php echo $mujeres_riesgo;?>],
		['Sin Riesgo Cardiovascular', <?php echo $mujeres_sin_riesgo;?>]
	]);

	var options2 = {
	  title: 'Riesgo Cardiovascular Mujeres',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_riesgo_mujeres'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Activiad Física', 'Total'],
		['Si', <?php echo $actividad;?>],
		['No', <?php echo $sin_actividad;?>]
	]);

	var options2 = {
	  title: 'Actividad Física',
	  is3D: true,
	  colors: ['#8fc800', '#cc0000'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_actividad'));
	chart.draw(data2, options2);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Consumo Tabaco Mujeres', 'Total'],
		['Si', <?php echo $tabaco_mujer;?>],
		['No', <?php echo $sin_tabaco_mujer;?>]
	]);

	var options2 = {
	  title: 'Consumo Tabaco Mujeres',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tabaco_mujeres'));
	chart.draw(data2, options2);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Consumo Tabaco Hombres', 'Total'],
		['Si', <?php echo $tabaco_hombre;?>],
		['No', <?php echo $sin_tabaco_hombre;?>]
	]);

	var options2 = {
	  title: 'Consumo Tabaco Hombres',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tabaco_hombres'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Consumo Frutas y/o Verduras', 'Total'],
		['Todos los dias', <?php echo $frutas;?>],
		['No Todos los dias', <?php echo $sin_frutas;?>]
	]);

	var options2 = {
	  title: 'Consumo Frutas y/o Verduras',
	  is3D: true,
	  colors: ['#8fc800','#cc0000'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_frutas'));
	chart.draw(data2, options2);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['Consumo Bebidas Alcohólicas', 'Total'],
		['Todos los dias', <?php echo $bebidas;?>],
		['No Todos los dias', <?php echo $sin_bebidas;?>]
	]);

	var options2 = {
	  title: 'Consumo Bebidas Alcohólicas',
	  is3D: true,
	  colors: ['#cc0000', '#8fc800'],
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_bebidas'));
	chart.draw(data2, options2);
	}
</script>


<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['TAS Tratamiento', 'Total'],
		['< 120', <?php echo $tas['1']['t'];?>],
		['120 - 129', <?php echo $tas['2']['t'];?>],
		['130 - 139 ', <?php echo $tas['3']['t'];?>],
		['140 - 159', <?php echo $tas['4']['t'];;?>],
		['> 160', <?php echo $tas['5']['t'];;?>]
	]);

	var options2 = {
	  title: 'TAS Tratamiento',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tas_t'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['TAS Sin Tratamiento', 'Total', ],
		['< 120', <?php echo $tas['1']['s'];?>],
		['120 - 129', <?php echo $tas['2']['s'];?>],
		['130 - 139 ', <?php echo $tas['3']['s'];?>],
		['140 - 159', <?php echo $tas['4']['s'];?>],
		['> 160', <?php echo $tas['5']['s'];?>]
	]);

	var options2 = {
	  title: 'TAS Sin Tratamiento',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tas_s'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['TAD Sin Tratamiento', 'Total'],
		['< 80', <?php echo $tad['1']['s'];?>],
		['80 - 84', <?php echo $tad['2']['s'];?>],
		['85 - 89 ', <?php echo $tad['3']['s'];?>],
		['90 - 99', <?php echo $tad['4']['s'];?>],
		['> 100', <?php echo $tad['5']['s'];?>]
	]);

	var options2 = {
	  title: 'TAD Sin Tratamiento',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tad_s'));
	chart.draw(data2, options2);
	}
</script>

<script type="text/javascript">
	google.charts.load("current", {packages:["corechart"]});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
	var data2 = google.visualization.arrayToDataTable([
		['TAD Tratamiento', 'Total'],
		['< 80', <?php echo $tad['1']['t'];?>],
		['80 - 84', <?php echo $tad['2']['t'];?>],
		['85 - 89 ', <?php echo $tad['3']['t'];?>],
		['90 - 99', <?php echo $tad['4']['t'];;?>],
		['> 100', <?php echo $tad['5']['t'];;?>]
	]);

	var options2 = {
	  title: 'TAD Tratamiento',
	  is3D: true,
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart_tad_t'));
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
		<div class="row">
			<div class="col-md-12">
				<fieldset>
					<legend>Alertas</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Alerta</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Rojo</td><td>".$rojo."</td></tr>";
									echo "<tr><td>Amarillo</td><td>".$amarillo."</td></tr>";
									echo "<tr><td>Verde</td><td>".$verde."</td></tr>";
									
									?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_alertas" style="width: 100%; height: 600px;"></div>
					</div>
				</fieldset>		
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>IMC Hombres</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Descripci&oacute;n IMC</th>
									<th>Total</th>
								</tr>
								<?php
									for($i=0;$i<count($reporte_imc_hombres);$i++){
										echo "<tr><td>".$reporte_imc_hombres[$i]->desc_imc."</td><td>".$reporte_imc_hombres[$i]->total."</td></tr>";
									}
									?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_imc_hombres" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>IMC Mujeres</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Descripci&oacute;n IMC</th>
									<th>Total</th>
								</tr>
								<?php
									for($i=0;$i<count($reporte_imc_mujeres);$i++){
										echo "<tr><td>".$reporte_imc_mujeres[$i]->desc_imc."</td><td>".$reporte_imc_mujeres[$i]->total."</td></tr>";
									}
									?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_imc_mujeres" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>	
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Riesgo Cardiovascular Hombres</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Riesgo</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Riesgo Cardiovascular</td><td>".$hombres_riesgo."</td></tr>";
									echo "<tr><td>Sin Riesgo Cardiovascular</td><td>".$hombres_sin_riesgo."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_riesgo_hombres" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Riesgo Cardiovascular Mujeres</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Riesgo</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Riesgo Cardiovascular</td><td>".$mujeres_riesgo."</td></tr>";
									echo "<tr><td>Sin Riesgo Cardiovascular</td><td>".$mujeres_sin_riesgo."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_riesgo_mujeres" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>	
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>TAS</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>TAS</th>
									<th>TAS Tratamiento</th>
									<th>TAS Sin Tratamiento</th>
								</tr>
								<?php
									echo "<tr><td>< 120</td><td>".$tas['1']['t']."</td><td>".$tas['1']['s']."</td></tr>";
									echo "<tr><td>120 - 129</td><td>".$tas['2']['t']."</td><td>".$tas['2']['s']."</td></tr>";
									echo "<tr><td>130 - 139</td><td>".$tas['3']['t']."</td><td>".$tas['3']['s']."</td></tr>";
									echo "<tr><td>140 - 159</td><td>".$tas['4']['t']."</td><td>".$tas['4']['s']."</td></tr>";
									echo "<tr><td>> 160</td><td>".$tas['5']['t']."</td><td>".$tas['5']['s']."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div id="piechart_tas_t" style="width: 100%; height: 400px;"></div>
						</div>
						<div class="col-md-6">
							<div id="piechart_tas_s" style="width: 100%; height: 400px;"></div>
						</div>						
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>TAD</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>TAD</th>
									<th>TAD Tratamiento</th>
									<th>TAD Sin Tratamiento</th>
								</tr>
								<?php
									echo "<tr><td>< 80</td><td>".$tad['1']['t']."</td><td>".$tad['1']['s']."</td></tr>";
									echo "<tr><td>80 - 84</td><td>".$tad['2']['t']."</td><td>".$tad['2']['s']."</td></tr>";
									echo "<tr><td>85 - 89</td><td>".$tad['3']['t']."</td><td>".$tad['3']['s']."</td></tr>";
									echo "<tr><td>90 - 99</td><td>".$tad['4']['t']."</td><td>".$tad['4']['s']."</td></tr>";
									echo "<tr><td>> 100</td><td>".$tad['5']['t']."</td><td>".$tad['5']['s']."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div id="piechart_tad_t" style="width: 100%; height: 400px;"></div>
						</div>
						<div class="col-md-6">
							<div id="piechart_tad_s" style="width: 100%; height: 400px;"></div>
						</div>						
					</div>
				</fieldset>	
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Realiza diariamente al menos 30 minutos de actividad física, en el trabajo y/o en el tiempo libre?</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Actividad F&iacute;sica</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Realizan Actividad F&iacute;sica</td><td>".$actividad."</td></tr>";
									echo "<tr><td>No Realizan Actividad F&iacute;sica</td><td>".$sin_actividad."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_actividad" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Usted consume alg&uacute;n producto derivado del tabaco?</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Consumen</th>
									<th>Hombres</th>
									<th>Mujeres</th>
								</tr>
								<?php
									echo "<tr><td>Si</td><td>".$tabaco_hombre."</td><td>".$tabaco_mujer."</td></tr>";
									echo "<tr><td>No</td><td>".$sin_tabaco_hombre."</td><td>".$sin_tabaco_mujer."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div id="piechart_tabaco_hombres" style="width: 100%; height: 400px;"></div>
						</div>
						<div class="col-md-6">
							<div id="piechart_tabaco_mujeres" style="width: 100%; height: 400px;"></div>
						</div>
						
						
					</div>
				</fieldset>	
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-6">
				<fieldset>
					<legend>Con qu&eacute; frecuencia come verduras o frutas?</legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Consumo de frutas y verduras</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Todos los dias</td><td>".$frutas."</td></tr>";
									echo "<tr><td>No Todos los dias</td><td>".$sin_frutas."</td></tr>";
								?>								
							</table>
						</div>
					</div>
					<div class="row">
						<div id="piechart_frutas" style="width: 100%; height: 400px;"></div>
					</div>
				</fieldset>		
			</div>
			<div class="col-md-6">
				<fieldset>
					<legend>Consumo con frecuencia bebidas alcoh&oacute;licas </legend>
					<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered">
								<tr>
									<th>Consumo de bebidas alcoh&oacute;licas</th>
									<th>Total</th>
								</tr>
								<?php
									echo "<tr><td>Todos los dias</td><td>".$bebidas."</td></tr>";
									echo "<tr><td>No Todos los dias</td><td>".$sin_bebidas."</td></tr>";
								?>				
							</table>
						</div>
					</div>
					<div class="row">
							<div id="piechart_bebidas" style="width: 100%; height: 400px;"></div>						
					</div>
				</fieldset>	
			</div>
		</div>
		
	</div>
    </div>

</div>



