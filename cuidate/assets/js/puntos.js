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
	
	var $signupForm = $( '#formPuntos' );
        
	$signupForm.validationEngine({
		promptPosition : "topRight", 
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000
	}); 
	
	$signupForm.submit(function() {
		var $resultado=$signupForm.validationEngine("validate");

		if ($resultado) {
			punto_atencion = $("#psalud").val();
			nombre = $("#nombre").val();
			direccion = $("#direccion").val();
			subred = $("#subred").val();
			tipo_escenario = $("#tipo_escenario").val();
			latitud = $("#latitud").val();
			longitud = $("#longitud").val();
			estado = $("#estado").val();
			
				$.ajax({
				url: base_url + "admin/guardar_datos/",
				type:'POST',
				dataType: "json",
				data:{
					punto_atencion: punto_atencion,
					nombre: nombre,
					direccion: direccion,
					subred: subred,
					tipo_escenario: tipo_escenario,
					latitud: latitud,
					longitud: longitud,
					estado: estado
				},
				success:function(res){
					alertify.alert('Administraci&oacute;n puntos de atenci&oacute;n', res.mensaje, function(){ location.reload(); alertify.success('Recargando...'); });		
					
					},
				error:function(){
					alertify.alert('Administraci&oacute;n puntos de atenci&oacute;n', res.mensaje, function(){ location.reload(); alertify.success('Recargando...'); });
				}
			});
			return false;
		}else{
			return false;
		}
		
	})
	
	$("#psalud").change(function () {
		punto_atencion = $("#psalud").val();
				
		$.ajax({
			url: base_url + "admin/datos_punto/",
			type:'POST',
			dataType: "json",
			data:{
				punto_atencion: punto_atencion
			},
			success:function(res){

				$("#nombre").val(res.nombre);
				$("#direccion").val(res.direccion);
				$("#latitud").val(res.latitud);
				$("#longitud").val(res.longitud);
				
				$("#estado").val(res.estado);
				$("#tipo_escenario").val(res.tipo_escenario);
				$("#subred").val(res.zona);
				
				//$('#estado option:[value="'+ res.estado +'"]').prop('selected', true)
				
				},
			error:function(){
				alert("Error cargando la información");
			}
		});
	});
		
});

