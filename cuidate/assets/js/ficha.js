$.datepicker.regional['es'] = {
	 closeText: 'Cerrar',
	 prevText: '<Ant',
	 nextText: 'Sig>',
	 currentText: 'Hoy',
	 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
	 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
	 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
	 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
	 weekHeader: 'Sm',
	 dateFormat: 'dd/mm/yy',
	 firstDay: 1,
	 isRTL: false,
	 showMonthAfterYear: false,
	 yearSuffix: ''
	 };
$.datepicker.setDefaults($.datepicker.regional['es']);

$(document).ready(function() {
	
	var $signupForm = $( '#SignupForm' );
        
	$signupForm.validationEngine({
		promptPosition : "topRight", 
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000
	}); 
	
	$signupForm.submit(function() {
		var $resultado=$signupForm.validationEngine("validate");

		if ($resultado) {

			return true;
		}
		return false;
	})
	
	/*$signupForm.formToWizard({
		submitButton: 'Guardar',
		nextBtnClass: 'btn btn-primary next',
		prevBtnClass: 'btn btn-default prev',
		buttonTag:    'button',
		nextBtnName: 'Siguiente >>',
		prevBtnName: '<< Regresar',		
		showProgress: true, //default value for showProgress is also true
		showStepNo: true,                
		validateBeforeNext: function() {
			return $signupForm.validationEngine( 'validate' );
		},
		progress: function (i, count) {
			$('#progress-complete').width(''+(i/count*100)+'%');
		}
	});
	
	$signupForm.submit(function() {
		var $resultado=$signupForm.validationEngine("validate");

		if ($resultado) {

			return true;
		}
		return false;
	});*/
	
	$('#tabla_personas').DataTable({
		language: {
			search:         "Buscar:",
			lengthMenu:    "Ver _MENU_ registros",
			info:           "Viendo _START_ a _END_ de _TOTAL_ entradas",
			infoEmpty:      "No se encontraron resultados",
			paginate: {
				first:      "Primero",
				previous:   "Previo",
				next:       "Siguiente",
			}
		}
	});
	
	
	$("#cedula").blur(function () {
		cedula = $("#cedula").val();
				
		$.ajax({
			url: base_url + "gestor/datos_persona/",
			type:'POST',
			dataType: "json",
			data:{
				cedula: cedula
			},
			success:function(res){
				if (res)
				{
					if(res.existe == 'ok'){
						$("#nombre").val(res.nombre);
						$("#correo").val(res.correo);
						$("#sexo").val(res.sexo);
						$("#sexopr").val(res.sexopr);
						$("#enc_fech_nac").val(res.fecha_nacimiento);
						$("#enc_edad").val(res.edad);
						$("#enc_meses").val(res.meses);
						$("#enc_peso").val(res.peso);
						$("#enc_talla").val(res.talla);
						$("#enc_imc").val(res.imc);
						$("#des_imc").val(res.desc_imc);
						$("#enc_pa").val(res.pa);

						if(res.meses >= 217){
							
							$("input:radio[name=actividad][value='"+res.actividad+"']").prop("checked",true);
							$("input:radio[name=tabaco][value='"+res.tabaco+"']").prop("checked",true);
							$("input:radio[name=frutas][value='"+res.frutas+"']").prop("checked",true);
							$("input:radio[name=bebidas][value='"+res.bebidas+"']").prop("checked",true);
							
							$("#tas").val(res.tas);
							$("#tad").val(res.tad);
							
							$("input:radio[name=tratamiento][value='"+res.tratamiento+"']").prop("checked",true);
							$("#pr_adultos").show();
							
						}else{
							$("#pr_adultos").hide();
						}
						
						var puntaje = 0;
						
						if(res.imc >= 0 && res.imc < 18.5){
							puntaje = puntaje + 0;
						}else if(res.imc >= 18.5 && res.imc < 25){
							puntaje = puntaje + 0;
						}else if(res.imc >= 25 && res.imc < 30){
							puntaje = puntaje + 1;
						}else if(res.imc >= 30){
							puntaje = puntaje + 2;
						}
						
						if(res.actividad == 'Si'){
							puntaje = puntaje + 0;
						}else{
							puntaje = puntaje + 1;
						}
						
						if(res.tabaco == 'Si'){
							
							if(res.sexo == 1){
								if(res.edad >= 20 && res.edad <= 39) {
									puntaje = puntaje + 8;
								}else if(res.edad >= 40 && res.edad <= 49) {
									puntaje = puntaje + 5;
								}else if(res.edad >= 50 && res.edad <= 59) {
									puntaje = puntaje + 3;
								}else if(res.edad >= 60 && res.edad <= 69) {
									puntaje = puntaje + 1;
								}else if(res.edad >= 70 && res.edad <= 79) {
									puntaje = puntaje + 1;
								}
							}else if(res.sexo == 2){
								if(res.edad >= 20 && res.edad <= 39) {
									puntaje = puntaje + 9;
								}else if(res.edad >= 40 && res.edad <= 49) {
									puntaje = puntaje + 7;
								}else if(res.edad >= 50 && res.edad <= 59) {
									puntaje = puntaje + 4;
								}else if(res.edad >= 60 && res.edad <= 69) {
									puntaje = puntaje + 2;
								}else if(res.edad >= 70 && res.edad <= 79) {
									puntaje = puntaje + 1;
								}
							}else if(res.sexo == 3){
								if(res.sexopr == 1){
									if(res.edad >= 20 && res.edad <= 39) {
										puntaje = puntaje + 8;
									}else if(res.edad >= 40 && res.edad <= 49) {
										puntaje = puntaje + 5;
									}else if(res.edad >= 50 && res.edad <= 59) {
										puntaje = puntaje + 3;
									}else if(res.edad >= 60 && res.edad <= 69) {
										puntaje = puntaje + 1;
									}else if(res.edad >= 70 && res.edad <= 79) {
										puntaje = puntaje + 1;
									}
								}else if(res.sexopr == 2){
									if(res.edad >= 20 && res.edad <= 39) {
										puntaje = puntaje + 9;
									}else if(res.edad >= 40 && res.edad <= 49) {
										puntaje = puntaje + 7;
									}else if(res.edad >= 50 && res.edad <= 59) {
										puntaje = puntaje + 4;
									}else if(res.edad >= 60 && res.edad <= 69) {
										puntaje = puntaje + 2;
									}else if(res.edad >= 70 && res.edad <= 79) {
										puntaje = puntaje + 1;
									}
								}
							}
							
						}
						
						if(res.frutas == 'Ntd'){
							puntaje = puntaje + 1;
						}
						
						if(res.bebidas == 'Td'){
							puntaje = puntaje + 1;
						}
						
						if(res.tratamiento == 'Si'){
							if(res.tas < 120){
								
							}else if(res.tas >= 120 && res.tas <= 129){
								puntaje = puntaje + 1;
							}else if(res.tas >= 130 && res.tas <= 139){
								puntaje = puntaje + 2;
							}else if(res.tas >= 140 && res.tas <= 159){
								puntaje = puntaje + 2;
							}else if(res.tas > 160){
								puntaje = puntaje + 3;
							}
							
							if(res.tad < 80){
								
							}else if(res.tad >= 80 && res.tad <= 84){
								puntaje = puntaje + 3;
							}else if(res.tad >= 85 && res.tad <= 89){
								puntaje = puntaje + 4;
							}else if(res.tad >= 90 && res.tad <= 99){
								puntaje = puntaje + 5;
							}else if(res.tad > 100){
								puntaje = puntaje + 6;
							}
							
						}else{
							if(res.tas < 120){
								
							}else if(res.tas >= 120 && res.tas <= 129){
								puntaje = puntaje + 0;
							}else if(res.tas >= 130 && res.tas <= 139){
								puntaje = puntaje + 1;
							}else if(res.tas >= 140 && res.tas <= 159){
								puntaje = puntaje + 2;
							}else if(res.tas > 160){
								puntaje = puntaje + 3;
							}
							
							if(res.tad < 80){
								
							}else if(res.tad >= 80 && res.tad <= 84){
								puntaje = puntaje + 1;
							}else if(res.tad >= 85 && res.tad <= 89){
								puntaje = puntaje + 2;
							}else if(res.tad >= 90 && res.tad <= 99){
								puntaje = puntaje + 3;
							}else if(res.tad > 100){
								puntaje = puntaje + 4;
							}
						}
						
						if(res.sexo == 1){
								if(res.pa > 90) {
									puntaje = puntaje + 1;
								}
						}else if(res.sexo == 2){
							if(res.pa > 80) {
								puntaje = puntaje + 1;
							}
						}else if(res.sexo == 3){
							if(res.sexopr == 1){
								if(res.pa > 90) {
									puntaje = puntaje + 1;
								}
							}else if(res.sexopr == 2){
								if(res.pa > 80) {
									puntaje = puntaje + 1;
								}
							}
						}
						
						
							$("#verde").css("background","#ccc");
							$("#amarillo").css("background","#ccc");
							$("#rojo").css("background","#ccc");
							if(puntaje <= 0){
								$("#verde").css("background","#8fc800");
							}else if(puntaje >= 5 && puntaje <= 10){
								$("#amarillo").css("background","#f1da36");
							}else if(puntaje >= 11 && puntaje <= 16){
								$("#rojo").css("background","#cc0000");
							}
							
							var imc = $("#enc_imc").val();
		
							if(imc >= 0 && imc < 18.5){
								$("#tipo_alerta").val('2');
								$('#modal_info1').modal('hide');
								$('#modal_info2').modal('show');
								$('#modal_info3').modal('hide');
								$('#modal_info4').modal('hide');
							}else if(imc >= 18.5 && imc < 25){
								$("#tipo_alerta").val('1');
								$('#modal_info1').modal('show');
								$('#modal_info2').modal('hide');
								$('#modal_info3').modal('hide');
								$('#modal_info4').modal('hide');
							}else if(imc >= 25 && imc < 30){
								$("#tipo_alerta").val('3');
								$('#modal_info1').modal('hide');
								$('#modal_info2').modal('hide');
								$('#modal_info3').modal('show');
								$('#modal_info4').modal('hide');
							}else if(imc >= 30){
								$("#tipo_alerta").val('4');
								$('#modal_info1').modal('hide');
								$('#modal_info2').modal('hide');
								$('#modal_info3').modal('hide');
								$('#modal_info4').modal('show');
							}
						
						
					}else{
						$('#SignupForm')[0].reset();
						$("#cedula").val(cedula);
						$("#pr_adultos").hide();
					}
						
											
				}else{
					$('#SignupForm')[0].reset();
					$("#cedula").val(cedula);
					$("#pr_adultos").hide();
				}
			},
			error:function(){
				$('#SignupForm')[0].reset();
				$("#cedula").val(cedula);
				$("#pr_adultos").hide();
			}
		});
	});
	
	
	$("#enc_fech_nac").change(function () {
		fecha = new Date($("#enc_fech_nac").val());
		hoy = new Date();
		edadPaciente = parseInt((hoy -fecha)/365/24/60/60/1000);
		mesesPaciente = edadPaciente * 12;
		$("#enc_edad").val(edadPaciente);
		$("#enc_meses").val(mesesPaciente);
		
		if(mesesPaciente >= 217){
			$("#pr_adultos").show();
		}else{
			$("#pr_adultos").hide();
		}
	})
	
	if($("#enc_fech_nac").val() != ''){
		fecha = new Date($("#enc_fech_nac").val());
		hoy = new Date();
		edadPaciente = parseInt((hoy -fecha)/365/24/60/60/1000);
		mesesPaciente = edadPaciente * 12;
		$("#enc_edad").val(edadPaciente);
		$("#enc_meses").val(mesesPaciente);
		
		if(mesesPaciente >= 217){
			$("#pr_adultos").show();
		}else{
			$("#pr_adultos").hide();
		}
	}

	$("#enc_fech_nac").change(function () {
		fecha = new Date($("#enc_fech_nac").val());
		hoy = new Date();
		edadPaciente = parseInt((hoy -fecha)/365/24/60/60/1000);
		mesesPaciente = edadPaciente * 12;
		$("#enc_edad").val(edadPaciente);
		$("#enc_meses").val(mesesPaciente);
		
		if(mesesPaciente >= 217){
			$("#pr_adultos").show();
		}else{
			$("#pr_adultos").hide();
		}
	})
	
	
	var edad = $("#enc_edad").val();
	$( "#enc_fech_nac" ).datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "-100:+0",
		defaultDate: "-" +edad+ "y",
		maxDate: '-5Y',
		dateFormat: "yy-mm-dd"
    });
	
	$("#sexo").change(function () {
		sexo = $("#sexo").val();
				
		if(sexo == 3){
			$("#div_sexopr").show();
		}else{
			$("#div_sexopr").hide();
		}
	});
	
	$("#psalud_gral").change(function () {
		punto_atencion = $("#psalud_gral").val();
				
		$.ajax({
			url: base_url + "gestor/cambio_puntosalud/",
			type:'POST',
			dataType: "json",
			data:{
				punto_atencion: punto_atencion
			},
			success:function(res){
				if(res){
					location.reload();
				}
				
				},
			error:function(){
				
			}
		});
	});
	
	
	
	$("input[name=enc_peso]").blur(function () {
		
		if(isNaN($('input[name=enc_peso]').val()) && isNaN($('input[name=enc_talla]').val()) && isNaN($('input[name=enc_edad]').val()) && $("#sexo").val()!= ''){ 

		}else{ 
			var sexo = $("#sexo").val();
			var val_peso = $("input[name=enc_peso]").val();
			var val_talla = $("input[name=enc_talla]").val();
			var val_edad = $("input[name=enc_edad]").val();
			var val_meses = $("input[name=enc_meses]").val();
			
			if(val_meses >= 61 && val_meses <= 216){
			
				if(sexo == 1){
					
					$.ajax({
						url: base_url + "gestor/imc_nino/",
						type:'POST',
						dataType: "json",
						data:{
							peso: val_peso, talla:val_talla, meses: val_meses
						},
						success:function(res){
							if (res)
							{
								$("#enc_imc").val(res.imc);
								$("#des_imc").val(res.diagnostico);								
							}
						}
					});
										
				}else if(sexo == 2){
					$.ajax({
						url: base_url + "gestor/imc_nina/",
						type:'POST',
						dataType: "json",
						data:{
							peso: val_peso, talla:val_talla, meses: val_meses
						},
						success:function(res){
							if (res)
							{
								$("#enc_imc").val(res.imc);
								$("#des_imc").val(res.diagnostico);								
							}
						}
					});
				}else if(sexo == 3){
					
					var sexopr = $("#sexopr").val();
					
					if(sexopr == 1){
					
						$.ajax({
							url: base_url + "gestor/imc_nino/",
							type:'POST',
							dataType: "json",
							data:{
								peso: val_peso, talla:val_talla, meses: val_meses
							},
							success:function(res){
								if (res)
								{
									$("#enc_imc").val(res.imc);
									$("#des_imc").val(res.diagnostico);								
								}
							}
						});
											
					}else if(sexopr == 2){
						$.ajax({
							url: base_url + "gestor/imc_nina/",
							type:'POST',
							dataType: "json",
							data:{
								peso: val_peso, talla:val_talla, meses: val_meses
							},
							success:function(res){
								if (res)
								{
									$("#enc_imc").val(res.imc);
									$("#des_imc").val(res.diagnostico);								
								}
							}
						});
					}
					
					
				}
				
				
			}else if(val_meses >= 217){
				
				
				if(val_peso > 0 && val_talla > 0 ){
					var talla_cm = val_talla / 100;
					var desc = '';
					var talla_m = (talla_cm * talla_cm);
					var imc = (val_peso / talla_m);
					//alert(imc);
					
					if(imc >= 0 && imc < 18.5){
						desc = 'Delgadez';
					}else if(imc >= 18.5 && imc < 25){
						desc = 'Normal';
					}else if(imc >= 25 && imc < 30){
						desc = 'Sobrepeso';
					}else if(imc >= 30){
						desc = 'Obesidad';
					}
					
					$("#enc_imc").val(imc);
					$("#des_imc").val(desc);
				}
				
			}	

			if(imc >= 0 && imc < 18.5){
				$("#tipo_alerta").val('2');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('show');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('hide');
			}else if(imc >= 18.5 && imc < 25){
				$("#tipo_alerta").val('1');
				$('#modal_info1').modal('show');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('hide');
			}else if(imc >= 25 && imc < 30){
				$("#tipo_alerta").val('3');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('show');
				$('#modal_info4').modal('hide');
			}else if(imc >= 30){
				$("#tipo_alerta").val('4');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('show');
			}	
		};
		
	});
	
	$("input[name=enc_talla]").blur(function () {
		
		if(isNaN($('input[name=enc_peso]').val()) && isNaN($('input[name=enc_talla]').val()) && isNaN($('input[name=enc_edad]').val())){ 

		}else{ 
			var sexo = $("#sexo").val();
			var val_peso = $("input[name=enc_peso]").val();
			var val_talla = $("input[name=enc_talla]").val();
			var val_edad = $("input[name=enc_edad]").val();
			var val_meses = $("input[name=enc_meses]").val();
			
			if(val_meses >= 61 && val_meses <= 216){
				
				if(sexo == 1){
					
					$.ajax({
						url: base_url + "gestor/imc_nino/",
						type:'POST',
						dataType: "json",
						data:{
							peso: val_peso, talla:val_talla, meses: val_meses
						},
						success:function(res){
							if (res)
							{
								$("#enc_imc").val(res.imc);
								$("#des_imc").val(res.diagnostico);								
							}
						}
					});
										
				}else if(sexo == 2){
					$.ajax({
						url: base_url + "gestor/imc_nina/",
						type:'POST',
						dataType: "json",
						data:{
							peso: val_peso, talla:val_talla, meses: val_meses
						},
						success:function(res){
							if (res)
							{
								$("#enc_imc").val(res.imc);
								$("#des_imc").val(res.diagnostico);								
							}
						}
					});
				}else if(sexo == 3){
					
					var sexopr = $("#sexopr").val();
					
					if(sexopr == 1){
					
						$.ajax({
							url: base_url + "gestor/imc_nino/",
							type:'POST',
							dataType: "json",
							data:{
								peso: val_peso, talla:val_talla, meses: val_meses
							},
							success:function(res){
								if (res)
								{
									$("#enc_imc").val(res.imc);
									$("#des_imc").val(res.diagnostico);								
								}
							}
						});
											
					}else if(sexopr == 2){
						$.ajax({
							url: base_url + "gestor/imc_nina/",
							type:'POST',
							dataType: "json",
							data:{
								peso: val_peso, talla:val_talla, meses: val_meses
							},
							success:function(res){
								if (res)
								{
									$("#enc_imc").val(res.imc);
									$("#des_imc").val(res.diagnostico);								
								}
							}
						});
					}
				}
			}else if(val_meses >= 217){
				
				if(val_peso > 0 && val_talla > 0 ){
					var talla_cm = val_talla / 100;
					var desc = '';
					var talla_m = (talla_cm * talla_cm);
					var imc = (val_peso / talla_m);
					//alert(imc);
					
					if(imc >= 0 && imc < 18.5){
						desc = 'Delgadez';
					}else if(imc >= 18.5 && imc < 25){
						desc = 'Normal';
					}else if(imc >= 25 && imc < 30){
						desc = 'Sobrepeso';
					}else if(imc >= 30){
						desc = 'Obesidad';
					}
					
					$("#enc_imc").val(imc);
					$("#des_imc").val(desc);
				}
				
			}

			if(imc >= 0 && imc < 18.5){
				$("#tipo_alerta").val('2');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('show');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('hide');
			}else if(imc >= 18.5 && imc < 25){
				$("#tipo_alerta").val('1');
				$('#modal_info1').modal('show');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('hide');
			}else if(imc >= 25 && imc < 30){
				$("#tipo_alerta").val('3');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('show');
				$('#modal_info4').modal('hide');
			}else if(imc >= 30){
				$("#tipo_alerta").val('4');
				$('#modal_info1').modal('hide');
				$('#modal_info2').modal('hide');
				$('#modal_info3').modal('hide');
				$('#modal_info4').modal('show');
			}	
		};
		
	});
	
	$("input[name=enc_pa]").blur(function () {
		
		var imc = $("#enc_imc").val();

		if(imc >= 0 && imc < 18.5){
			$("#tipo_alerta").val('2');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('show');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('hide');
		}else if(imc >= 18.5 && imc < 25){
			$("#tipo_alerta").val('1');
			$('#modal_info1').modal('show');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('hide');
		}else if(imc >= 25 && imc < 30){
			$("#tipo_alerta").val('3');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('show');
			$('#modal_info4').modal('hide');
		}else if(imc >= 30){
			$("#tipo_alerta").val('4');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('show');
		}
		
	});
	
	$("#btn_recomendaciones").click(function () {
		
		var imc = $("#enc_imc").val();
		
		if(imc >= 0 && imc < 18.5){
			$("#tipo_alerta").val('2');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('show');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('hide');
		}else if(imc >= 18.5 && imc < 25){
			$("#tipo_alerta").val('1');
			$('#modal_info1').modal('show');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('hide');
		}else if(imc >= 25 && imc < 30){
			$("#tipo_alerta").val('3');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('show');
			$('#modal_info4').modal('hide');
		}else if(imc >= 30){
			$("#tipo_alerta").val('4');
			$('#modal_info1').modal('hide');
			$('#modal_info2').modal('hide');
			$('#modal_info3').modal('hide');
			$('#modal_info4').modal('show');
		}
	});
	
	$("#btn_riesgos").click(function () {
		
		var puntaje = 0;
		
		var res_edad = $("#edad").val();
		var res_sexo = $("#sexo").val();
		var res_sexopr = $("#sexopr").val();
		var res_imc = $("#enc_imc").val();
		var res_bebidas = $("#bebidas").val();
		var res_actividad = $("#actividad").val();
		var res_tabaco = $("#tabaco").val();
		var res_frutas = $("#frutas").val();
		var res_tas = $("#tas").val();
		var res_tad = $("#tad").val();
		var res_tratamiento = $("#tratamiento").val();
		var res_pa = $("#enc_pa").val();
						
		if(res_imc >= 0 && res_imc < 18.5){
			puntaje = puntaje + 0;
		}else if(res_imc >= 18.5 && res_imc < 25){
			puntaje = puntaje + 0;
		}else if(res_imc >= 25 && res_imc < 30){
			puntaje = puntaje + 1;
		}else if(res_imc >= 30){
			puntaje = puntaje + 2;
		}
		
		if(res_actividad == 'Si'){
			puntaje = puntaje + 0;
		}else{
			puntaje = puntaje + 1;
		}
		
		if(res_tabaco == 'Si'){
			
			if(res_sexo == 1){
				if(res_edad >= 20 && res_edad <= 39) {
					puntaje = puntaje + 8;
				}else if(res_edad >= 40 && res_edad <= 49) {
					puntaje = puntaje + 5;
				}else if(res_edad >= 50 && res_edad <= 59) {
					puntaje = puntaje + 3;
				}else if(res_edad >= 60 && res_edad <= 69) {
					puntaje = puntaje + 1;
				}else if(res_edad >= 70 && res_edad <= 79) {
					puntaje = puntaje + 1;
				}
			}else if(res_sexo == 2){
				if(res_edad >= 20 && res_edad <= 39) {
					puntaje = puntaje + 9;
				}else if(res_edad >= 40 && res_edad <= 49) {
					puntaje = puntaje + 7;
				}else if(res_edad >= 50 && res_edad <= 59) {
					puntaje = puntaje + 4;
				}else if(res_edad >= 60 && res_edad <= 69) {
					puntaje = puntaje + 2;
				}else if(res_edad >= 70 && res_edad <= 79) {
					puntaje = puntaje + 1;
				}
			}else if(res_sexo == 3){
				if(res_sexopr == 1){
					if(res_edad >= 20 && res_edad <= 39) {
						puntaje = puntaje + 8;
					}else if(res_edad >= 40 && res_edad <= 49) {
						puntaje = puntaje + 5;
					}else if(res_edad >= 50 && res_edad <= 59) {
						puntaje = puntaje + 3;
					}else if(res_edad >= 60 && res_edad <= 69) {
						puntaje = puntaje + 1;
					}else if(res_edad >= 70 && res_edad <= 79) {
						puntaje = puntaje + 1;
					}
				}else if(res_sexopr == 2){
					if(res_edad >= 20 && res_edad <= 39) {
						puntaje = puntaje + 9;
					}else if(res_edad >= 40 && res_edad <= 49) {
						puntaje = puntaje + 7;
					}else if(res_edad >= 50 && res_edad <= 59) {
						puntaje = puntaje + 4;
					}else if(res_edad >= 60 && res_edad <= 69) {
						puntaje = puntaje + 2;
					}else if(res_edad >= 70 && res_edad <= 79) {
						puntaje = puntaje + 1;
					}
				}
			}
			
		}
		
		if(res_frutas == 'Ntd'){
			puntaje = puntaje + 1;
		}
		
		if(res_bebidas == 'Td'){
			puntaje = puntaje + 1;
		}
		
		if(res_tratamiento == 'Si'){
			if(res_tas < 120){
				
			}else if(res_tas >= 120 && res_tas <= 129){
				puntaje = puntaje + 1;
			}else if(res_tas >= 130 && res_tas <= 139){
				puntaje = puntaje + 2;
			}else if(res_tas >= 140 && res_tas <= 159){
				puntaje = puntaje + 2;
			}else if(res_tas > 160){
				puntaje = puntaje + 3;
			}
			
			if(res_tad < 80){
				
			}else if(res_tad >= 80 && res_tad <= 84){
				puntaje = puntaje + 3;
			}else if(res_tad >= 85 && res_tad <= 89){
				puntaje = puntaje + 4;
			}else if(res_tad >= 90 && res_tad <= 99){
				puntaje = puntaje + 5;
			}else if(res_tad > 100){
				puntaje = puntaje + 6;
			}
			
		}else{
			if(res_tas < 120){
				
			}else if(res_tas >= 120 && res_tas <= 129){
				puntaje = puntaje + 0;
			}else if(res_tas >= 130 && res_tas <= 139){
				puntaje = puntaje + 1;
			}else if(res_tas >= 140 && res_tas <= 159){
				puntaje = puntaje + 2;
			}else if(res_tas > 160){
				puntaje = puntaje + 3;
			}
			
			if(res_tad < 80){
				
			}else if(res_tad >= 80 && res_tad <= 84){
				puntaje = puntaje + 1;
			}else if(res_tad >= 85 && res_tad <= 89){
				puntaje = puntaje + 2;
			}else if(res_tad >= 90 && res_tad <= 99){
				puntaje = puntaje + 3;
			}else if(res_tad > 100){
				puntaje = puntaje + 4;
			}
		}
		
		if(res_sexo == 1){
				if(res_pa > 90) {
					puntaje = puntaje + 1;
				}
		}else if(res_sexo == 2){
			if(res_pa > 80) {
				puntaje = puntaje + 1;
			}
		}else if(res_sexo == 3){
			if(res_sexopr == 1){
				if(res_pa > 90) {
					puntaje = puntaje + 1;
				}
			}else if(res_sexopr == 2){
				if(res_pa > 80) {
					puntaje = puntaje + 1;
				}
			}
		}
		
		
			$("#verde").css("background","#ccc");
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			if(puntaje <= 0){
				$("#verde").css("background","#8fc800");
			}else if(puntaje >= 5 && puntaje <= 10){
				$("#amarillo").css("background","#f1da36");
			}else if(puntaje >= 11 && puntaje <= 16){
				$("#rojo").css("background","#cc0000");
			}
			
		
	});
	
	$("input[name=glucometria]").keyup(function () {
		
		if(isNaN($('input[name=glucometria]').val())){ 
			$("input:radio[name=p4]").prop("checked",false);
		}else{ 
			var val_glu = $("input[name=glucometria]").val();
			if(val_glu >= 65 && val_glu <= 140){
				$("input:radio[name=p4][value='1']").prop("checked",true);
			}else if(val_glu >= 141 && val_glu <= 200){
				$("input:radio[name=p4][value='2']").prop("checked",true);
			}else if(val_glu > 200){
				$("input:radio[name=p4][value='12']").prop("checked",true);
			}else{
				$("input:radio[name=p4]").prop("checked",false);
			}
		};
		
	});
	
	if($('input:radio[name=enc_sexo]:checked').val() == 'F'){
		$("#div_mujer").show();
		$("#div_hombre").hide();
	}else{
		$("#div_mujer").hide();
		$("#div_hombre").show();
	}
	
	$("input[name=enc_sexo]").click(function () {
		
		if($('input:radio[name=enc_sexo]:checked').val() == 'F'){
			$("#div_mujer").show();
			$("#div_hombre").hide();
		}else{
			$("#div_mujer").hide();
			$("#div_hombre").show();
		}
		
	});
	
	$("input[name=vp_5]").keyup(function () {
		
		if(isNaN($('input[name=vp_5]').val())){ 
			if($("#enc_sexo").val() == 'F'){
				$("input:radio[id=p5_m]").prop("checked",false);
			}else{
				$("input:radio[id=p5_h]").prop("checked",false);
			}
			
		}else{ 
			var val_vp5 = $("input[name=vp_5]").val();
			
			if($("#enc_sexo").val() == 'F'){
				if(val_vp5 < 80){
					$("input:radio[id=p5_m][value='1']").prop("checked",true);
				}else if(val_vp5 >= 80 && val_vp5 <= 88){
					$("input:radio[id=p5_m][value='2']").prop("checked",true);
				}else if(val_vp5 > 88){
					$("input:radio[id=p5_m][value='6']").prop("checked",true);
				}else{
					$("input:radio[id=p5_m]").prop("checked",false);
				}
			}else{
				if(val_vp5 < 94){
					$("input:radio[id=p5_h][value='1']").prop("checked",true);
				}else if(val_vp5 >= 94 && val_vp5 <= 102){
					$("input:radio[id=p5_h][value='2']").prop("checked",true);
				}else if(val_vp5 > 102){
					$("input:radio[id=p5_h][value='6']").prop("checked",true);
				}else{
					$("input:radio[id=p5_h]").prop("checked",false);
				}
			}
			
			
		};
		
	});
	  
	$("input[name=p1]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		 
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();			
			
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p2]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p3]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p4]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p5]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p6]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		if($('input:radio[name=p6]:checked').val() == 1){ 
			$("input:radio[id=p7][value='0']").prop("checked",true);
		}else{
			$("input:radio[id=p7]").prop("checked",false);
		}
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p7]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p8]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p9]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
	
	$("input[name=p10]").click(function () {    
	
		
		if(isNaN($('input:radio[name=p1]:checked').val())){ var p1 = 0;}else{ var p1 = $('input:radio[name=p1]:checked').val();};
		if(isNaN($('input:radio[name=p2]:checked').val())){ var p2 = 0;}else{ var p2 = $('input:radio[name=p2]:checked').val();};
		if(isNaN($('input:radio[name=p3]:checked').val())){ var p3 = 0;}else{ var p3 = $('input:radio[name=p3]:checked').val();};
		if(isNaN($('input:radio[name=p4]:checked').val())){ var p4 = 0;}else{ var p4 = $('input:radio[name=p4]:checked').val();};
		if(isNaN($('input:radio[name=p5]:checked').val())){ var p5 = 0;}else{ var p5 = $('input:radio[name=p5]:checked').val();};
		if(isNaN($('input:radio[name=p6]:checked').val())){ var p6 = 0;}else{ var p6 = $('input:radio[name=p6]:checked').val();};
		if(isNaN($('input:radio[name=p7]:checked').val())){ var p7 = 0;}else{ var p7 = $('input:radio[name=p7]:checked').val();};
		if(isNaN($('input:radio[name=p8]:checked').val())){ var p8 = 0;}else{ var p8 = $('input:radio[name=p8]:checked').val();};
		if(isNaN($('input:radio[name=p9]:checked').val())){ var p9 = 0;}else{ var p9 = $('input:radio[name=p9]:checked').val();};
		if(isNaN($('input:radio[name=p10]:checked').val())){ var p10 = 0;}else{ var p10 = $('input:radio[name=p10]:checked').val();};
		
		
		var total = parseInt(p1) + parseInt(p2) + parseInt(p3) + parseInt(p4) + parseInt(p5) + parseInt(p6) + parseInt(p7) + parseInt(p8) + parseInt(p9) + parseInt(p10);
		
		
		if(total == 10){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#8fc800");
			$("#recomendaciones_verde").show();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 10 && total <= 20){
			$("#amarillo").css("background","#f1da36");
			$("#rojo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").show();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").show();
		}else if(total > 20){
			$("#amarillo").css("background","#ccc");
			$("#rojo").css("background","#cc0000");
			$("#verde").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").show();
			$("#div_recome").show();
		}else{
			$("#amarillo").css("background","#ccc");
			$("#verde").css("background","#ccc");
			$("#rojo").css("background","#ccc");
			$("#recomendaciones_verde").hide();
			$("#recomendaciones_amarillo").hide();
			$("#recomendaciones_rojo").hide();
			$("#div_recome").hide();
		}
    });
});

