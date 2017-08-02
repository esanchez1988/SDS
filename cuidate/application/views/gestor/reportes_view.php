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
	}else{
		$puntaje = $puntaje + 1;
	}
	
	if($personas[$i]->tabaco == 'Si'){
		
		if($personas[$i]->sexo == 1){
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
		
	}
	
	if($personas[$i]->frutas == 'Ntd'){
		$puntaje = $puntaje + 1;
	}
	
	if($personas[$i]->bebidas == 'Td'){
		$puntaje = $puntaje + 1;
	}
	
	if($personas[$i]->tratamiento == 'Si'){
		if($personas[$i]->tas < 120){
			
		}else if($personas[$i]->tas >= 120 && $personas[$i]->tas <= 129){
			$puntaje = $puntaje + 1;
		}else if($personas[$i]->tas >= 130 && $personas[$i]->tas <= 139){
			$puntaje = $puntaje + 2;
		}else if($personas[$i]->tas >= 140 && $personas[$i]->tas <= 159){
			$puntaje = $puntaje + 2;
		}else if($personas[$i]->tas > 160){
			$puntaje = $puntaje + 3;
		}
		
		if($personas[$i]->tad < 80){
			
		}else if($personas[$i]->tad >= 80 && $personas[$i]->tad <= 84){
			$puntaje = $puntaje + 3;
		}else if($personas[$i]->tad >= 85 && $personas[$i]->tad <= 89){
			$puntaje = $puntaje + 4;
		}else if($personas[$i]->tad >= 90 && $personas[$i]->tad <= 99){
			$puntaje = $puntaje + 5;
		}else if($personas[$i]->tad > 100){
			$puntaje = $puntaje + 6;
		}
		
	}else{
		if($personas[$i]->tas < 120){
			
		}else if($personas[$i]->tas >= 120 && $personas[$i]->tas <= 129){
			$puntaje = $puntaje + 0;
		}else if($personas[$i]->tas >= 130 && $personas[$i]->tas <= 139){
			$puntaje = $puntaje + 1;
		}else if($personas[$i]->tas >= 140 && $personas[$i]->tas <= 159){
			$puntaje = $puntaje + 2;
		}else if($personas[$i]->tas > 160){
			$puntaje = $puntaje + 3;
		}
		
		if($personas[$i]->tad < 80){
			
		}else if($personas[$i]->tad >= 80 && $personas[$i]->tad <= 84){
			$puntaje = $puntaje + 1;
		}else if($personas[$i]->tad >= 85 && $personas[$i]->tad <= 89){
			$puntaje = $puntaje + 2;
		}else if($personas[$i]->tad >= 90 && $personas[$i]->tad <= 99){
			$puntaje = $puntaje + 3;
		}else if($personas[$i]->tad > 100){
			$puntaje = $puntaje + 4;
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
	
	
	if($puntaje <= 0){
		$verde++;
	}else if($puntaje > 0 && $puntaje <= 10){
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
	</div>
    </div>

</div>



