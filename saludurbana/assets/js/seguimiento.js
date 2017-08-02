
$(document).ready(function() {
	
	var $form_cita = $( '#form_cita' );
        
	$form_cita.validationEngine({
		promptPosition : "topRight", 
		scroll: false,
		autoHidePrompt: true,
		autoHideDelay: 2000
	}); 
		
	$form_cita.submit(function() {
		var $resultado=$form_cita.validationEngine("validate");

		if ($resultado) {

			return true;
		}
		return false;
	});
	
});
