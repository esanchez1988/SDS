<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Gestor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('gestor_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
	}
	 
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'gestor')
		{
			redirect(base_url().'login');
		}
		
		$data['sexo'] = $this->gestor_model->sexo();
		$data['psalud'] = $this->gestor_model->psalud();
		$data['titulo'] = 'Personas';
		$data['contenido'] = 'gestor/formulario_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function reportes(){
		$data['titulo'] = 'Gestor';
		$data['contenido'] = 'gestor/reportes_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function imc_nino()
	{
		$peso = $this->input->post('peso');
		$talla = $this->input->post('talla');
		$meses = $this->input->post('meses');
		
		if($peso > 0 && $talla > 0 && $meses > 0){
			
			$talla_mt = $talla / 100;
			$talla_cu = $talla_mt * $talla_mt;
			$imc = $peso / $talla_cu;
			
			$arreglo['imc'] = $imc;
			$datos_imc = $this->gestor_model->imc_nino($meses);
			
			if($imc > $datos_imc[0]->VP2){
				$arreglo['diagnostico'] = 'Obesidad';
			}else if($imc > $datos_imc[0]->VP1 && $imc <= $datos_imc[0]->VP2){
				$arreglo['diagnostico'] = 'Sobrepeso';
			}else if($imc >= $datos_imc[0]->VN1 && $imc <= $datos_imc[0]->VP1){
				$arreglo['diagnostico'] = 'IMC Adecuado para la Edad';
			}else if($imc >= $datos_imc[0]->VN2 && $imc < $datos_imc[0]->VN1){
				$arreglo['diagnostico'] = 'Riesgo de Delgadez';
			}else if($imc < $datos_imc[0]->VN2){
				$arreglo['diagnostico'] = 'Delgadez';
			}
			
		}
		
		echo json_encode($arreglo);
		
	}
	
	public function imc_nina()
	{
		$peso = $this->input->post('peso');
		$talla = $this->input->post('talla');
		$meses = $this->input->post('meses');
		
		if($peso > 0 && $talla > 0 && $meses > 0){
			
			$talla_mt = $talla / 100;
			$talla_cu = $talla_mt * $talla_mt;
			$imc = $peso / $talla_cu;
			
			$arreglo['imc'] = $imc;
			$datos_imc = $this->gestor_model->imc_nina($meses);
			
			if($imc > $datos_imc[0]->VP2){
				$arreglo['diagnostico'] = 'Obesidad';
			}else if($imc > $datos_imc[0]->VP1 && $imc <= $datos_imc[0]->VP2){
				$arreglo['diagnostico'] = 'Sobrepeso';
			}else if($imc >= $datos_imc[0]->VN1 && $imc <= $datos_imc[0]->VP1){
				$arreglo['diagnostico'] = 'IMC Adecuado para la Edad';
			}else if($imc >= $datos_imc[0]->VN2 && $imc < $datos_imc[0]->VN1){
				$arreglo['diagnostico'] = 'Riesgo de Delgadez';
			}else if($imc < $datos_imc[0]->VN2){
				$arreglo['diagnostico'] = 'Delgadez';
			}
			
		}
		
		echo json_encode($arreglo);
		
	}
	
	public function datos_persona()
	{
		$cedula = $this->input->post('cedula');
		
		$persona = $this->gestor_model->info_persona($cedula);
		
		if(count($persona) > 0){
			
			$arreglo['existe'] = 'ok';
			$arreglo['nombre'] = $persona[0]->nombre;
			$arreglo['correo'] = $persona[0]->correo;
			$arreglo['fecha_nacimiento'] = $persona[0]->fecha_nacimiento;
			$arreglo['edad'] = $persona[0]->edad;
			$arreglo['meses'] = $persona[0]->meses;
			$arreglo['peso'] = $persona[0]->peso;
			$arreglo['talla'] = $persona[0]->talla;
			$arreglo['pa'] = $persona[0]->pa;
			$arreglo['imc'] = $persona[0]->imc;
			$arreglo['desc_imc'] = $persona[0]->desc_imc;
			$arreglo['sexo'] = $persona[0]->sexo;
			$arreglo['sexopr'] = $persona[0]->sexopr;
			$arreglo['actividad'] = $persona[0]->actividad;
			$arreglo['tabaco'] = $persona[0]->tabaco;
			$arreglo['frutas'] = $persona[0]->frutas;
			$arreglo['bebidas'] = $persona[0]->bebidas;
			$arreglo['tas'] = $persona[0]->tas;
			$arreglo['tad'] = $persona[0]->tad;
			$arreglo['tratamiento'] = $persona[0]->tratamiento;
			
			echo json_encode($arreglo);
		}		
	}
	
	public function cambio_puntosalud()
	{
		$punto_atencion = $this->input->post('punto_atencion');
		$data = array(
			'punto_atencion' 	=> 		$punto_atencion			
		);	

		$this->session->set_userdata($data);
		
		$arreglo['existe'] = 'ok';
		
		echo json_encode($arreglo);
		
	}
	
	public function ejercicio_persona()
	{
		$cedula = $this->input->post('cedula');
		
		$persona = $this->gestor_model->ejercicio_persona($cedula);
		
		if(count($persona) > 0){
			
			for($i=0;$i<count($persona);$i++){
				$arreglo[$i]['fecha'] = $persona[$i]->fecha;
				$arreglo[$i]['direccion'] = $persona[$i]->direccion;
				$arreglo[$i]['ejercicio'] = $persona[$i]->ejercicio;
				$arreglo[$i]['enc_fc'] = $persona[$i]->enc_fc;
				$arreglo[$i]['enc_fr'] = $persona[$i]->enc_fr;
			}
			echo json_encode($arreglo);
		}
		
		
	}
	
	public function sendMailGmail()
	{
		$this -> load -> library('email');
		$configMail = array('protocol' => 'smtp', 'smtp_host' => 'smtp.gmail.com', 'smtp_port' => 25, 'smtp_user' => 'esanchez1988@gmail.com', 'smtp_pass' => 'Cata1988Edwin', 'mailtype' => 'html', 'charset' => 'utf-8', 'newline' => "\r\n");
		//cargamos la configuración para enviar mail
		$this -> email -> initialize($configMail);

		$this -> email -> from('aplicaciones@dane.gov.co', 'Banco Hojas de Vida');
		$this -> email -> to('maosanchez1988@gmail.com');
		$this -> email -> bcc('esanchez1988@gmail.com');
		$this -> email -> subject('Registro convocatoria DANE');
		
		$html = '
				  <p><b>Bienvenido</b></p>
				  <p>Usted se ha registrado para participar en la convocatoria </p>
				  <p>Puede ingresar al siguiente <a href="">link</a> para hacer seguimiento a su hoja de vida y la convocatoria a la que este aplicando</p>
				  <p><b>DEPARTAMENTO ADMINISTRATIVO NACIONAL DE ESTADITICA (DANE)</b></p>
				  ';
		
		$this -> email -> message($html);
		if ($this -> email -> send()) {
			
		}
		
		var_dump($this->email->print_debugger());
	}
	
	public function correoPrueba()
	{
		$this -> load -> library('email');
		//$configMail = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'appssds2017@gmail.com', 'smtp_pass' => 'Cata1988Edwin', 'mailtype' => 'html', 'charset' => 'utf-8', 'newline' => "\r\n");
		$configMail = array('protocol' => 'smtp', 'smtp_host' => 'smtp.live.com', 'smtp_port' => 25, 'smtp_user' => 'appssds2017@hotmail.com', 'smtp_pass' => 'Cata1988Edwin', 'mailtype' => 'html', 'charset' => 'utf-8', 'newline' => "\r\n");
		//cargamos la configuración para enviar mail
		$this -> email -> initialize($configMail);
				
		$imagen = base_url('assets/imgs/infografia_1.png');	
		
		$this -> email -> from('aplicaciones@saludcapital.gov.co', 'Cuídate, sé feliz');
		$this -> email -> to('esanchez1988@gmail.com');
		//$this -> email -> cc(array('vamartinez@saludcapital.gov.co', 'aida731@gmail.com', 'espaciopublicodistrito@gmail.com'));
		$this -> email -> bcc('esanchez1988@gmail.com');
		$this -> email -> attach($imagen, 'inline');
		$this -> email -> subject('Cuídate, sé feliz');
		
		$html = '
				  <p style="text-align: center;"><span style="color: #00ccff; size:16px;"><strong>CU&Iacute;DATE S&Eacute; FELIZ</strong></span></p>
					<p>La estrategia &ldquo;Cu&iacute;date, S&eacute; Feliz&rdquo;, busca incentivar entre las familias que transitan por el espacio p&uacute;blico la pr&aacute;ctica de actividad f&iacute;sica, la reducci&oacute;n de exposici&oacute;n al humo del cigarrillo y a las bebidas alcoh&oacute;licas y el consumo de una alimentaci&oacute;n sana, balanceada y que incluya todos los grupos de alimentos, incremente el consumo de frutas y verduras, reduzca el consumo de sal, grasas y az&uacute;cares contribuyendo as&iacute; a mejorar el estado de salud y nutrici&oacute;n y prevenir la aparici&oacute;n de enfermedades como obesidad, diabetes, hipertensi&oacute;n, problemas del coraz&oacute;n, trombosis, entre otras aportando a la calidad de vida de las familias bogotanas.</p>
					<p>El d&iacute;a <b>'.date('Y-m-d').'</b> se realiz&oacute; una campa&ntilde;a en <b></b> esta valoraci&oacute;n no se configura en consulta m&eacute;dica, por lo que le recomendamos asistir a un centro de salud para una valoraci&oacute;n de detecci&oacute;n temprana y protecci&oacute;n espec&iacute;fica a la cual ud. tiene derecho.</p>
					<p>Sus medidas fueron:</p>
					<p>Peso <b> Kg</b></p>
					<p>Talla <b> Cm</b></p>
					<p>&Iacute;ndice de masa Corporal <b></b> Clasificaci&oacute;n <b></b></p>
					<p>Tensi&oacute;n Arterial <b></b></p>
					<p>Circunferencia de Cintura <b></b> 
					<p>La Secretar&iacute;a de Salud, interesada en el mantenimiento de la salud p&uacute;blica, le hace las siguientes recomendaciones de acuerdo a lo encontrado:</p>
				  ';
		
		$this -> email -> message($html);
		$envio = $this -> email -> send();
		var_dump($envio);
		var_dump($this -> email -> print_debugger());
	}
	
	public function guardarFicha(){
		
		//ini_set("display_errors",0);
		
		$cedula = $_REQUEST['cedula'];
		$nombre = $_REQUEST['nombre'];
		$correo = $_REQUEST['correo'];
		$sexo = $_REQUEST['sexo'];
		
		if(isset($_REQUEST['sexopr']) && $_REQUEST['sexopr'] != '')
		{
			$sexopr = $_REQUEST['sexopr'];
		}else{
			$sexopr = '';
		}
		$enc_fech_nac = $_REQUEST['enc_fech_nac'];
		$enc_edad = $_REQUEST['enc_edad'];
		$enc_meses = $_REQUEST['enc_meses'];
		$enc_peso = $_REQUEST['enc_peso'];
		$enc_talla = $_REQUEST['enc_talla'];
		$enc_imc = $_REQUEST['enc_imc'];
		$des_imc = $_REQUEST['des_imc'];
		$enc_pa = $_REQUEST['enc_pa'];
		
		
		
		$persona = $this->gestor_model->info_persona($cedula);

		if(count($persona) > 0){
			$datos_ins['cedula'] = $cedula;
			$datos_ins['nombre'] = $nombre;
			$datos_ins['correo'] = $correo;
			$datos_ins['fecha_nacimiento'] = $enc_fech_nac;
			$datos_ins['edad'] = $enc_edad;
			$datos_ins['meses'] = $enc_meses;
			$datos_ins['peso'] = $enc_peso;
			$datos_ins['talla'] = $enc_talla;
			$datos_ins['pa'] = $enc_pa;
			$datos_ins['imc'] = $enc_imc;
			$datos_ins['desc_imc'] = $des_imc;
			$datos_ins['sexo'] = $sexo;
			$datos_ins['sexopr'] = $sexopr;
			
			$personaAct = $this->gestor_model->actualizaPersona($datos_ins);
		}else{
			
			$datos_ins['cedula'] = $cedula;
			$datos_ins['nombre'] = $nombre;
			$datos_ins['correo'] = $correo;
			$datos_ins['fecha_nacimiento'] = $enc_fech_nac;
			$datos_ins['edad'] = $enc_edad;
			$datos_ins['meses'] = $enc_meses;
			$datos_ins['peso'] = $enc_peso;
			$datos_ins['talla'] = $enc_talla;
			$datos_ins['pa'] = $enc_pa;
			$datos_ins['imc'] = $enc_imc;
			$datos_ins['desc_imc'] = $des_imc;
			$datos_ins['sexo'] = $sexo;
			$datos_ins['sexopr'] = $sexopr;
			
			$personaIns = $this->gestor_model->guardaPersona($datos_ins);
			
		}
		
		if($enc_meses >= 217){
			$datos_act['actividad'] = $_REQUEST['actividad'];
			$datos_act['tabaco'] = $_REQUEST['tabaco'];
			$datos_act['frutas'] = $_REQUEST['frutas'];
			$datos_act['bebidas'] = $_REQUEST['bebidas'];
			$datos_act['tas'] = $_REQUEST['tas'];
			$datos_act['tad'] = $_REQUEST['tad'];
			$datos_act['tratamiento'] = $_REQUEST['tratamiento'];
			$datos_act['cedula'] = $cedula;
			
			$personaAct = $this->gestor_model->actualizaActividades($datos_act);
		}else{
			$datos_act['actividad'] ='';
			$datos_act['tabaco'] = '';
			$datos_act['frutas'] = '';
			$datos_act['bebidas'] = '';
			$datos_act['tas'] = '';
			$datos_act['tad'] = '';
			$datos_act['tratamiento'] = '';
		}
		
		$datos_eje['cedula'] = $cedula;
		$datos_eje['fecha'] = date('Y-m-d H:i:s');
		$datos_eje['ejercicio'] = $_REQUEST['ejercicio'];
		$datos_eje['psalud'] = $_REQUEST['psalud'];
		//$datos_eje['enc_fc'] = $_REQUEST['enc_fc'];
		//$datos_eje['enc_fr'] = $_REQUEST['enc_fr'];
		$datos_eje['enc_fc'] = 0;
		$datos_eje['enc_fr'] = 0;
		$datos_eje['talla'] = $enc_talla;
		$datos_eje['pa'] = $enc_pa;
		$datos_eje['imc'] = $enc_imc;
		$datos_eje['desc_imc'] = $des_imc;
		$datos_eje['actividad'] =$datos_act['actividad'];
		$datos_eje['tabaco'] = $datos_act['actividad'];
		$datos_eje['frutas'] = $datos_act['actividad'];
		$datos_eje['bebidas'] = $datos_act['actividad'];
		$datos_eje['tas'] = $datos_act['actividad'];
		$datos_eje['tad'] = $datos_act['actividad'];
		$datos_eje['tratamiento'] = $datos_act['actividad'];
		
		
		
		$personaEje = $this->gestor_model->registraEjercicio($datos_eje);
		
		if($correo != '' && $correo != 'notiene@gmail.com' && $correo != 'notiene@hotmail.com'){
			$p_saludMsj = $this->gestor_model->punto_salud($_REQUEST['psalud']);
		
			$this -> load -> library('email');
			$configMail = array('protocol' => 'smtp', 'smtp_host' => 'ssl://smtp.gmail.com', 'smtp_port' => 465, 'smtp_user' => 'appssds2017@gmail.com', 'smtp_pass' => 'Cata1988Edwin', 'mailtype' => 'html', 'charset' => 'utf-8', 'newline' => "\r\n");
			//cargamos la configuración para enviar mail
			$this -> email -> initialize($configMail);
			
			$imagen = '';
			if($_REQUEST['tipo_alerta'] == 1){
				$imagen = base_url('assets/imgs/infografia_1.png');	
			}else if($_REQUEST['tipo_alerta'] == 2){
				$imagen = base_url('assets/imgs/infografia_2.png');	
			}else if($_REQUEST['tipo_alerta'] == 3){
				$imagen = base_url('assets/imgs/infografia_3.png');	
			}else if($_REQUEST['tipo_alerta'] == 4){
				$imagen = base_url('assets/imgs/infografia_4.png');	
			}else{
				$imagen = base_url('assets/imgs/infografia_1.png');	
			}
			

			$this -> email -> from('aplicaciones@saludcapital.gov.co', 'Cuídate, sé feliz');
			$this -> email -> to($correo);
			//$this -> email -> cc(array('vamartinez@saludcapital.gov.co', 'aida731@gmail.com', 'espaciopublicodistrito@gmail.com'));
			//$this -> email -> bcc('esanchez1988@gmail.com');
			$this -> email -> attach($imagen, 'inline');
			$this -> email -> subject('Cuídate, sé feliz');
			
			$html = '
					  <p style="text-align: center;"><span style="color: #00ccff; size:16px;"><strong>CU&Iacute;DATE S&Eacute; FELIZ</strong></span></p>
						<p>La estrategia &ldquo;Cu&iacute;date, S&eacute; Feliz&rdquo;, busca incentivar entre las familias que transitan por el espacio p&uacute;blico la pr&aacute;ctica de actividad f&iacute;sica, la reducci&oacute;n de exposici&oacute;n al humo del cigarrillo y a las bebidas alcoh&oacute;licas y el consumo de una alimentaci&oacute;n sana, balanceada y que incluya todos los grupos de alimentos, incremente el consumo de frutas y verduras, reduzca el consumo de sal, grasas y az&uacute;cares contribuyendo as&iacute; a mejorar el estado de salud y nutrici&oacute;n y prevenir la aparici&oacute;n de enfermedades como obesidad, diabetes, hipertensi&oacute;n, problemas del coraz&oacute;n, trombosis, entre otras aportando a la calidad de vida de las familias bogotanas.</p>
						<p>El d&iacute;a <b>'.date('Y-m-d').'</b> se realiz&oacute; una campa&ntilde;a en <b>'.$p_saludMsj[0]->direccion.'</b> esta valoraci&oacute;n no se configura en consulta m&eacute;dica, por lo que le recomendamos asistir a un centro de salud para una valoraci&oacute;n de detecci&oacute;n temprana y protecci&oacute;n espec&iacute;fica a la cual ud. tiene derecho.</p>
						<p>Sus medidas fueron:</p>
						<p>Peso <b>'.$enc_peso.' Kg</b></p>
						<p>Talla <b>'.$enc_talla.' Cm</b></p>
						<p>&Iacute;ndice de masa Corporal <b>'.$enc_imc.'</b> Clasificaci&oacute;n <b>'.$des_imc.'</b></p>
						<p>Tensi&oacute;n Arterial <b>'.$_REQUEST['tas'].' / '.$_REQUEST['tad'].'</b></p>
						<p>Circunferencia de Cintura <b>'.$enc_pa.'</b> 
						<p>La Secretar&iacute;a de Salud, interesada en el mantenimiento de la salud p&uacute;blica, le hace las siguientes recomendaciones de acuerdo a lo encontrado:</p>
					  ';
			
			$this -> email -> message($html);
			if ($this -> email -> send()) {
				
			}
		}
		
		
		
		$this->session->set_flashdata('mensajeExito', 'Se registro la informaci&oacute;n con exito');
		redirect(base_url('gestor'), 'refresh');
	}
	
}