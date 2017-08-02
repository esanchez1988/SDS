<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Gestor extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('gestor_model');
		$this->load->model('personas_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
	}
	 
	public function index()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '2')
		{
			redirect(base_url().'login');
		}
		
		$data['personas'] = $this->gestor_model->personas($this->session->userdata('id_usuario'));
		$data['titulo'] = 'Listado';
		$data['contenido'] = 'gestor/personas_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function personas()
	{
		
		$data['tipo_docu'] = $this->gestor_model->tipo_docu();
		$data['personas'] = $this->gestor_model->personas($this->session->userdata('id_usuario'));
		$data['titulo'] = 'Listado';
		$data['contenido'] = 'gestor/personas_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function ficha($id_persona)
	{
		$data['persona'] = $this->gestor_model->consulta_persona($id_persona);
		$data['tipo_docu'] = $this->gestor_model->tipo_docu();
		$data['departamentos'] = $this->gestor_model->departamentos();
		$data['localidad'] = $this->gestor_model->localidad();
		if($data["persona"][0]->IdLocalidad != ''){
			$data['upz'] = $this->personas_model->upz($data["persona"][0]->IdLocalidad);
		}else{
			$data['upz'] = $this->personas_model->upz_todas();
		}
		$data['prestador_servicio'] = $this->gestor_model->prestador_servicio();
		$data['punto_atencion'] = $this->gestor_model->punto_atencion($this->session->userdata('id_subred'));
		$data['subred'] = $this->gestor_model->subred();
		$data['etnias'] = $this->gestor_model->etnias();
		$data['niveles'] = $this->gestor_model->niveles();
		$data['estados_civiles'] = $this->gestor_model->estados_civiles();
		$data['responsables'] = $this->gestor_model->responsables();
		$data['estado_visita'] = $this->gestor_model->estado_visita();		
		$data['titulo'] = 'Listado';
		$data['contenido'] = 'gestor/ficha_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function upzs()
	{
		if($this->input->post('loca'))
		{
			$loca = $this->input->post('loca');
			$upz = $this->gestor_model->upz($loca);
			?>
			<option value="">Seleccione...</option>
			<?php
			foreach($upz as $fila)
			{
			?>
				<option value="<?php echo $fila -> cod_upz ?>"><?php echo $fila -> cod_upz. " - " . $fila -> nom_upz?></option>
			<?php
			}
		}
	}
	
	public function municipios()
	{
		if($this->input->post('dpto'))
		{
			$dpto = $this->input->post('dpto');
			$municipios = $this->gestor_model->municipios($dpto);
			?>
			<option value="">Seleccione...</option>
			<?php
			foreach($municipios as $fila)
			{
			?>
				<option value="<?php echo $fila -> CodigoDane ?>"><?php echo $fila -> Descripcion ?></option>
			<?php
			}
		}
	}
	
	public function guardarFicha(){
		
		if(isset($_REQUEST['viable']) && $_REQUEST['viable'] == 1){
			
			$datosPersona['Edad'] = $_REQUEST['enc_edad'];
			$datosPersona['FechaNacimiento'] = $_REQUEST['enc_fech_nac'];
			//$datosPersona['IdMunicipioNacimiento'] = $_REQUEST['muni_naci'];
			$datosPersona['IdMunicipioNacimiento'] = 11001;
			$datosPersona['IdLocalidad'] = $_REQUEST['loca_capta'];
			//$datosPersona['Barrio'] = $_REQUEST['barr_capta'];
			$datosPersona['Direccion'] = $_REQUEST['dire_usua'];
			$datosPersona['Telefono'] = $_REQUEST['telefono'];
			$datosPersona['Telefono2'] = $_REQUEST['telefono2'];
			$datosPersona['Email'] = $_REQUEST['email'];
			//$datosPersona['Telefono'] = $_REQUEST['tele_cont'];
			$datosPersona['Sexo'] = $_REQUEST['enc_sexo'];
			$datosPersona['Gestante'] = $_REQUEST['enc_gestante'];
			$datosPersona['Peso'] = $_REQUEST['peso'];
			$datosPersona['Talla'] = $_REQUEST['talla'];
			$datosPersona['Imc'] = $_REQUEST['imc'];
			$datosPersona['Desc_imc'] = $_REQUEST['desc_imc'];
			$datosPersona['IdPersona'] = $_REQUEST['id_persona'];
			
			$resultadoPersona = $this->gestor_model->actualizarPersona($datosPersona);
			
			if($resultadoPersona){
				$datosNoViable['Fecha'] = date('Y-m-d H:i:s');
				$datosNoViable['IdPersona'] = $_REQUEST['id_persona'];
				$datosNoViable['IdGestor'] = $this->session->userdata('id_usuario');
				$datosNoViable['IdEstadoVisita'] = $_REQUEST['viable'];
				
				$resultadoVisita = $this->gestor_model->guardaVisita($datosNoViable);
				
				if($resultadoVisita){
					
					if($_REQUEST['enc_gestante'] == 'Si'){
						
						$datosGestante['id_usuario'] = $_REQUEST['id_persona'];
						$datosGestante['fecha'] = date('Y-m-d H:i:s');
						$datosGestante['m1'] = $_REQUEST['m1'];
						$datosGestante['m2'] = $_REQUEST['m2'];
						$datosGestante['m3'] = $_REQUEST['m3'];
						$datosGestante['m4'] = $_REQUEST['m4'];
						$datosGestante['m5'] = $_REQUEST['m5'];
						$datosGestante['m6'] = $_REQUEST['m6'];
						$datosGestante['m7'] = $_REQUEST['m7'];
						$datosGestante['m8'] = $_REQUEST['m8'];
						$datosGestante['m9'] = $_REQUEST['m9'];
						$datosGestante['m10'] = $_REQUEST['m10'];
						$datosGestante['m11'] = $_REQUEST['m11'];
						
						$resultadoGestante = $this->gestor_model->guardaGestante($datosGestante);
						
					}
					
					if($_REQUEST['enc_edad'] <= 5){
						$datosPI['id_usuario'] = $_REQUEST['id_persona'];
						$datosPI['fecha'] = date('Y-m-d H:i:s');
						$datosPI['pi1'] = $_REQUEST['pi1'];
						$datosPI['pi2'] = $_REQUEST['pi2'];
						$datosPI['pi3'] = $_REQUEST['pi3'];
						$datosPI['pi4'] = $_REQUEST['pi4'];
						$datosPI['pi5'] = $_REQUEST['pi5'];
						$datosPI['pi6'] = $_REQUEST['pi6'];
						$datosPI['pi7'] = $_REQUEST['pi7'];
						$datosPI['pi8'] = $_REQUEST['pi8'];
						$datosPI['pi9'] = $_REQUEST['pi9'];
						$datosPI['pi10'] = $_REQUEST['pi10'];
						$datosPI['pi11'] = $_REQUEST['pi11'];
						$datosPI['pi12'] = $_REQUEST['pi12'];
						$datosPI['pi13'] = $_REQUEST['pi13'];
						
						$resultadoGE = $this->gestor_model->guardaPrimeraInfancia($datosPI);
					}else if($_REQUEST['enc_edad'] >= 6 && $_REQUEST['enc_edad'] <= 11){
						$datosIN['id_usuario'] = $_REQUEST['id_persona'];
						$datosIN['fecha'] = date('Y-m-d H:i:s');
						$datosIN['in1'] = $_REQUEST['in1'];
						$datosIN['in2'] = $_REQUEST['in2'];
						$datosIN['in3'] = $_REQUEST['in3'];
						$datosIN['in4'] = $_REQUEST['in4'];
						$datosIN['in5'] = $_REQUEST['in5'];
						
						$resultadoIN = $this->gestor_model->guardaInfancia($datosIN);
						
					}else if($_REQUEST['enc_edad'] >= 12 && $_REQUEST['enc_edad'] <= 17){
						$datosAD['id_usuario'] = $_REQUEST['id_persona'];
						$datosAD['fecha'] = date('Y-m-d H:i:s');
						$datosAD['ad1'] = $_REQUEST['ad1'];
						$datosAD['ad2'] = $_REQUEST['ad2'];
						$datosAD['ad3'] = $_REQUEST['ad3'];
						$datosAD['ad4'] = $_REQUEST['ad4'];
						$datosAD['ad5'] = $_REQUEST['ad5'];
						$datosAD['ad6'] = $_REQUEST['ad6'];
						$datosAD['ad7'] = $_REQUEST['ad7'];
						$datosAD['ad8'] = $_REQUEST['ad8'];
						$datosAD['ad9'] = $_REQUEST['ad9'];
						
						$resultadoAD = $this->gestor_model->guardaAdolescencia($datosAD);
						
					}else if($_REQUEST['enc_edad'] >= 18 && $_REQUEST['enc_edad'] <= 28){
						$datosJU['id_usuario'] = $_REQUEST['id_persona'];
						$datosJU['fecha'] = date('Y-m-d H:i:s');
						$datosJU['ju1'] = $_REQUEST['ju1'];
						$datosJU['ju2'] = $_REQUEST['ju2'];
						$datosJU['ju3'] = $_REQUEST['ju3'];
						$datosJU['ju4'] = $_REQUEST['ju4'];
						$datosJU['ju5'] = $_REQUEST['ju5'];
						$datosJU['ju6'] = $_REQUEST['ju6'];
						$datosJU['ju7'] = $_REQUEST['ju7'];
						
						$resultadoJU = $this->gestor_model->guardaJuventud($datosJU);
						
					}else if($_REQUEST['enc_edad'] >= 29 && $_REQUEST['enc_edad'] <= 59){
						$datosADU['id_usuario'] = $_REQUEST['id_persona'];
						$datosADU['fecha'] = date('Y-m-d H:i:s');
						$datosADU['adu1'] = $_REQUEST['adu1'];
						$datosADU['adu2'] = $_REQUEST['adu2'];
						$datosADU['adu3'] = $_REQUEST['adu3'];
						$datosADU['adu4'] = $_REQUEST['adu4'];
						$datosADU['adu5'] = $_REQUEST['adu5'];
						$datosADU['adu6'] = $_REQUEST['adu6'];
						$datosADU['adu7'] = $_REQUEST['adu7'];
						$datosADU['adu8'] = $_REQUEST['adu8'];
						$datosADU['adu9'] = $_REQUEST['adu9'];
						
						$resultadoadu = $this->gestor_model->guardaAdultez($datosADU);
						
					}else if($_REQUEST['enc_edad'] >= 60){
						$datosVE['id_usuario'] = $_REQUEST['id_persona'];
						$datosVE['fecha'] = date('Y-m-d H:i:s');
						$datosVE['ve1'] = $_REQUEST['ve1'];
						$datosVE['ve2'] = $_REQUEST['ve2'];
						$datosVE['ve3'] = $_REQUEST['ve3'];
						$datosVE['ve4'] = $_REQUEST['ve4'];
						$datosVE['ve5'] = $_REQUEST['ve5'];
						$datosVE['ve6'] = $_REQUEST['ve6'];
						$datosVE['ve7'] = $_REQUEST['ve7'];
						
						$resultadove = $this->gestor_model->guardaVejez($datosVE);
					}
						

						
					$datosAlertas['idPersona'] = $_REQUEST['id_persona'];
					$datosAlertas['fecha'] = date('Y-m-d');
					$datosAlertas['alf1'] = $_REQUEST['alf1'];
					$datosAlertas['alf2'] = $_REQUEST['alf2'];
					$datosAlertas['alf3'] = $_REQUEST['alf3'];
					$datosAlertas['alf3_1'] = $_REQUEST['alf3_1'];
					$datosAlertas['alf4'] = $_REQUEST['alf4'];
					$datosAlertas['alf4_1'] = $_REQUEST['alf4_1'];
					$datosAlertas['alam1'] = $_REQUEST['alam1'];
					$datosAlertas['alam2'] = $_REQUEST['alam2'];
					$datosAlertas['alam3'] = $_REQUEST['alam3'];
					$datosAlertas['alam4'] = $_REQUEST['alam4'];
					$datosAlertas['alam5'] = $_REQUEST['alam5'];
					$datosAlertas['alam6'] = $_REQUEST['alam6'];
					$datosAlertas['alam7'] = $_REQUEST['alam7'];
					$datosAlertas['alam8'] = $_REQUEST['alam8'];
					$datosAlertas['alam9'] = $_REQUEST['alam9'];
					$datosAlertas['alam10'] = $_REQUEST['alam10'];
					$datosAlertas['alam11'] = $_REQUEST['alam11'];
					
					$resultadoAlertas = $this->gestor_model->guardaAlerta($datosAlertas);
						
					
					$datosFicha['IdVisita'] = $resultadoVisita;
					$datosFicha['FechaRegistro'] = date('Y-m-d');					
					$datosFicha['IdPrioridad'] = $_REQUEST['prioridad'];
					$datosFicha['IdMedioCita'] = $_REQUEST['medio_cita'];
					$datosFicha['FechaCita'] = $_REQUEST['fecha_cita'];
					$datosFicha['LugarCita'] = $_REQUEST['lugar_cita'];
					$datosFicha['ObsPrioridad'] = $_REQUEST['ambulancia'];
					
					$resultadoFicha = $this->gestor_model->registroFicha($datosFicha);
					
					if($_REQUEST['enc_edad'] >= 45)
					{
						$datosFichaC['IdVisita'] = $resultadoVisita;
						$datosFichaC['FechaRegistro'] = date('Y-m-d');
						$datosFichaC['IdEtnia'] = $_REQUEST['etnia'];					
						if(isset($_REQUEST['p1']) && $_REQUEST['p1'] != ''){
							$datosFichaC['IdOpcionUltimaConsulta'] = $_REQUEST['p1'];
						}else{
							$datosFichaC['IdOpcionUltimaConsulta'] = '';
						}
						
						if(isset($_REQUEST['p2']) && $_REQUEST['p2'] != ''){
							$datosFichaC['IdOpcionUltimaTomaLaboratorios'] = $_REQUEST['p2'];
						}else{
							$datosFichaC['IdOpcionUltimaTomaLaboratorios'] = '';
						}
						
						if(isset($_REQUEST['p2']) && $_REQUEST['p2'] != ''){
							$datosFichaC['IdOpcionUltimaTomaLaboratorios'] = $_REQUEST['p2'];
						}else{
							$datosFichaC['IdOpcionUltimaTomaLaboratorios'] = '';
						}
						
						$datosFichaC['Tas'] = $_REQUEST['tas'];
						$datosFichaC['Tad'] = $_REQUEST['tad'];
						$datosFichaC['IdOpcionTAS'] = $_REQUEST['p3'];
						
						if(isset($_REQUEST['glucometria']) && $_REQUEST['glucometria'] != ''){
							$datosFichaC['ValorGlucometria'] = $_REQUEST['glucometria'];
						}else{
							$datosFichaC['ValorGlucometria'] = '';
						}
						
						if(isset($_REQUEST['p4']) && $_REQUEST['p4'] != ''){
							$datosFichaC['IdOpcionGlucometria'] = $_REQUEST['p4'];
						}else{
							$datosFichaC['IdOpcionGlucometria'] = '';
						}
						
						if(isset($_REQUEST['t_com_v']) && $_REQUEST['t_com_v'] != ''){
							$datosFichaC['TiempoConsumoAlimentos'] = $_REQUEST['t_com_v'];
						}else{
							$datosFichaC['TiempoConsumoAlimentos'] = '';
						}
						
						$datosFichaC['ValorPerimetroAbdominal'] = $_REQUEST['vp_5'];
						$datosFichaC['IdOpcionPA'] = $_REQUEST['p5'];
						
						if(isset($_REQUEST['p6']) && $_REQUEST['p6'] != ''){
							$datosFichaC['ExisteHospitalizacionTA'] = $_REQUEST['p6'];
						}else{
							$datosFichaC['ExisteHospitalizacionTA'] = '';
						}
						
						if(isset($_REQUEST['p7']) && $_REQUEST['p7'] != ''){
							$datosFichaC['ExisteHospitalizacionTA2'] = $_REQUEST['p7'];
						}else{
							$datosFichaC['ExisteHospitalizacionTA2'] = '';
						}
						
						if(isset($_REQUEST['p8']) && $_REQUEST['p8'] != ''){
							$datosFichaC['EsFumador'] = $_REQUEST['p8'];
						}else{
							$datosFichaC['EsFumador'] = '';
						}
						
						if(isset($_REQUEST['p9']) && $_REQUEST['p9'] != ''){
							$datosFichaC['EsBebedor'] = $_REQUEST['p9'];
						}else{
							$datosFichaC['EsBebedor'] = '';
						}
						
						if(isset($_REQUEST['p10']) && $_REQUEST['p10'] != ''){
							$datosFichaC['RealizaActividadFisica'] = $_REQUEST['p10'];
						}else{
							$datosFichaC['RealizaActividadFisica'] = '';
						}
						
						if(isset($_REQUEST['cual_depo']) && $_REQUEST['cual_depo'] != ''){
							$datosFichaC['DescripcionActividadFisica'] = $_REQUEST['cual_depo'];
						}else{
							$datosFichaC['DescripcionActividadFisica'] = '';
						}
						
						$resultadoFicha = $this->gestor_model->registroFichaCronicos($datosFichaC);
					}					
					
					if($resultadoFicha){
						$this->session->set_flashdata('exito','Se registro la informaci&oacute;n de la ficha');
						redirect(base_url('gestor/personas'),'refresh');
						exit;
					}else{
						$this->session->set_flashdata('error','Error al registrar la informaci&oacute;n de la ficha');
						redirect(base_url('gestor/personas'),'refresh');
						exit;
					}
					
				}else{
					$this->session->set_flashdata('error','Registro de visita no exitoso');
					redirect(base_url('gestor/personas'),'refresh');
					exit;	
				}
				
			}else{
				$this->session->set_flashdata('error','Actualizaci&oacute;n de persona no exitosa');
				redirect(base_url('gestor/personas'),'refresh');
				exit;
			}
			
		}else{
			$datosNoViable['Fecha'] = date('Y-m-d H:i:s');
			$datosNoViable['IdPersona'] = $_REQUEST['id_persona'];
			$datosNoViable['IdGestor'] = $this->session->userdata('id_usuario');
			$datosNoViable['IdEstadoVisita'] = $_REQUEST['viable'];
			
			$resultado = $this->gestor_model->guardaVisita($datosNoViable);
			
			$this->session->set_flashdata('exito','Se registro la informaci&oacute;n de la visita');
			redirect(base_url('gestor/personas'),'refresh');
			exit;
		}
	}
	
	public function guardarPersona(){
			
		//$datosPersona['Edad'] = $_REQUEST['enc_edad'];
		$datosPersona['PrimerNombre'] = $_REQUEST['p_nombre'];
		$datosPersona['SegundoNombre'] = $_REQUEST['s_nombre'];
		$datosPersona['PrimerApellido'] = $_REQUEST['p_apellido'];
		$datosPersona['SegundoApellido'] = $_REQUEST['s_apellido'];
		$datosPersona['IdTipoIdentifcacion'] = $_REQUEST['t_docu'];
		$datosPersona['NumeroIdentificacion'] = $_REQUEST['n_docu'];
		
		$resultadoPersona = $this->gestor_model->existePersona($datosPersona);
		
		if(count($resultadoPersona) > 0){
			
			$ruta = base_url('gestor/ficha/'.$resultadoPersona[0]->IdPersona);
			$this->session->set_flashdata('error','La persona ya se encuentra registrada, para diligenciar la ficha ingrese <a href="'.$ruta.'">AQUI</a>');
			redirect(base_url('gestor/personas'),'refresh');
			exit;
		}else{
			$resultadoPersona = $this->gestor_model->registrarPersona($datosPersona);
			
			if($resultadoPersona){
				
				$dataG['IdGestor'] = $this->session->userdata('id_usuario');
				$dataG['IdPersona'] = $resultadoPersona;
				
				$resultadoAsignacion = $this->personas_model->registrarAsignacion($dataG);
				
				$ruta = base_url('gestor/ficha/'.$resultadoPersona);
				$this->session->set_flashdata('exito','Se creo la persona con exito.');
				$this->session->set_flashdata('nuevo','OK');
				redirect($ruta,'refresh');
				exit;
			}
			
		}			
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
}