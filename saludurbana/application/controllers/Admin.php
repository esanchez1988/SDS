<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('usuarios_model');
		$this->load->model('personas_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
		
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '1')
		{
			redirect(base_url().'login');
		}
	}
	
	public function index()
	{
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/index_view';
		$this->load->view('templates/layout_general',$data);		
	}
	
	public function reporte_efectivo(){
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/efectivo_view_general';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function reporte_planos(){
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/archivos_planos_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function reporte_no_efectivo(){
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/noefectivo_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function usuarios()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '1')
		{
			redirect(base_url().'login');
		}		
		$data['titulo'] = 'Usuarios';
		$data['contenido'] = 'admin/usuarios_view';
		$data['roles'] = $this->usuarios_model->roles();
		$data['subredes'] = $this->usuarios_model->subredes();
		$this->load->view('templates/layout_general',$data);
	}
	
	public function cargaDatosUsuario() {
		
		$usuario = trim($this->input->post('usuario_consulta'));
		$rol = trim($this->input->post('rol_consulta'));
		$subred = trim($this->input->post('subred_consulta'));
		
			
		$datos['usuario'] = $usuario;
		$datos['rol'] = $rol;
		$datos['subred'] = $subred;


		$datos["usuarios"] = $this->usuarios_model->consulta_usuario($datos);		
		
		if(count($datos["usuarios"]) > 0){
			$this->load->view('admin/usuariosDatos', $datos);
			//echo $data;
		}else{
			echo "<center><h2>Sin informaci&oacute;n</h2></center>";
		}			
        
    }
	
	public function editarUsuario($id_usuario)
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '1')
		{
			redirect(base_url().'login');
		}		
		$data['titulo'] = 'Usuarios';
		$data['contenido'] = 'admin/editar_usuarios_view';
		$data["usuario"] = $this->usuarios_model->consulta_usuario_id($id_usuario);
		$data['roles'] = $this->usuarios_model->roles();
		$data['subredes'] = $this->usuarios_model->subredes();
		$this->load->view('templates/layout_general',$data);
	}
	
	public function guardarUsuario() {


        $datosU['username'] = $_REQUEST['nume_iden'];
        $datosU['password'] = sha1($_REQUEST['clave']);
        $datosU['Correo'] = $_REQUEST['correo'];
        $datosU['id_subred'] = $_REQUEST['subred'];
        $datosU['perfil'] = $_REQUEST['rol'];
		
		$resultadoUsuario = $this->usuarios_model->consulta_usuario_id($datosU['username']);
		
		if(count($resultadoUsuario) > 0){
			$this->session->set_flashdata('errorBD', 'El usuario '.$_REQUEST['nume_iden'].' ya se encuentra registrado en el sistema');
			redirect(base_url('admin/usuarios'), 'refresh');
			exit;
		}else{
			//Se registra la informacion del usuario, restorna el ID que asigna la BD
			$resultadoID = $this->usuarios_model->insertarUsuario($datosU);

			if ($resultadoID) {
				
                $this->session->set_flashdata('registroExitoso', "Se realizo el registro de usuario con exito");
                redirect(base_url('admin/usuarios'), 'refresh');
				exit;
			}else{
                $this->session->set_flashdata('errorBD', 'Error al registrar el usuario');
                redirect(base_url('admin/usuarios'), 'refresh');
				exit;
			}  
		}  
    }
	
	public function actualizarUsuario() {


        $datosU['username'] = $_REQUEST['nume_iden'];
        $datosU['correo'] = $_REQUEST['correo'];
        $datosU['perfil'] = $_REQUEST['rol'];
        $datosU['subred'] = $_REQUEST['subred'];
		
	
		//Se registra la informacion del usuario, restorna el ID que asigna la BD
		$resultadoID = $this->usuarios_model->actualizarUsuario($datosU);

		if ($resultadoID) {
			
			$this->session->set_flashdata('registroExitoso', "Se realizo el registro de usuario con exito");
			redirect(base_url('admin/usuarios'), 'refresh');
			exit;
		}else{
			$this->session->set_flashdata('errorBD', 'Error al registrar el usuario');
			redirect(base_url('admin/usuarios'), 'refresh');
			exit;
		}  
    }
	
	public function borrarUsuario($id_usuario) {

		//Se registra la informacion del usuario, restorna el ID que asigna la BD
		$resultadoID = $this->usuarios_model->eliminar_usuario($id_usuario);

		if ($resultadoID) {
			
			$this->session->set_flashdata('registroExitoso', "Se inactivo el registro de usuario con exito");
			redirect(base_url('admin/usuarios'), 'refresh');
			exit;
		}else{
			$this->session->set_flashdata('errorBD', 'Error al inactivar el usuario');
			redirect(base_url('admin/usuarios'), 'refresh');
			exit;
		}  
    }
	
	public function generarReporte($id_reporte)
	{
		ini_set('max_execution_time', 600);
		
		if(isset($id_reporte)){
			
			$reporte = $id_reporte;
			
			switch($reporte){
				case '1':
					$data['datos_repor'] = $this->admin_model->datos_reporte1();
				break;
				case '2':
					$data['datos_repor'] = $this->admin_model->datos_reporte2();
				break;
				case '2_ma':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_ma();
				break;
				case '2_pi':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_pi();
				break;
				case '2_in':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_in();
				break;
				case '2_ado':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_ado();
				break;
				case '2_ju':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_ju();
				break;
				case '2_adu':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_adu();
				break;
				case '2_ve':
					$data['datos_repor'] = $this->admin_model->datos_reporte2_ve();
				break;
				case '3':
					$data['datos_repor'] = $this->admin_model->datos_reporte3();
				break;
			}
						
			
			
			if(count($data['datos_repor']) > 0){
				ini_set("display_errors",0);
								
				$Name = 'gestores_riesgo_'.$reporte.'.csv';
				$FileName = "./$Name";
				
				header('Expires: 0');
				header('Cache-control: private');
				header('Content-Type: application/x-octet-stream'); // Archivo de Excel
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Content-Description: File Transfer');
				header('Last-Modified: '.date('D, d M Y H:i:s'));
				header('Content-Disposition: attachment; filename="'.$Name.'"');
				header("Content-Transfer-Encoding: binary");
				
				$data['titulo'] = 'Administrador';	
				switch($reporte){
					case '1':
						$this->load->view('admin/reporte1',$data, FALSE);
					break;
					case '2':
						$this->load->view('admin/reporte2',$data, FALSE);
					break;
					case '2_ma':
						$this->load->view('admin/reporte2_ma',$data, FALSE);
					break;
					case '2_pi':
						$this->load->view('admin/reporte2_pi',$data, FALSE);
					break;
					case '2_in':
						$this->load->view('admin/reporte2_in',$data, FALSE);
					break;
					case '2_ado':
						$this->load->view('admin/reporte2_ado',$data, FALSE);
					break;
					case '2_ju':
						$this->load->view('admin/reporte2_ju',$data, FALSE);
					break;
					case '2_adu':
						$this->load->view('admin/reporte2_adu',$data, FALSE);
					break;
					case '2_ve':
						$this->load->view('admin/reporte2_ve',$data, FALSE);
					break;
					case '3':
						$this->load->view('admin/reporte3',$data, FALSE);
					break;
				}				
				
			}else{
				$this->session->set_flashdata('mensajeError', 'No se encontraron registros');
				redirect(base_url('admin/reporte_efectivo'), 'refresh');
			}
			
			
		}else{
			$this->session->set_flashdata('mensajeError', 'Los parametros para generar el reporte no son correctos');
			redirect(base_url('admin/reporte_efectivo'), 'refresh');
		}	
	}
	
	
	public function personas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '1')
		{
			redirect(base_url().'login');
		}		
		$data['titulo'] = 'Personas';
		$data['contenido'] = 'admin/datosPersonas_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function cargaDatosPersona() {
		
		$nume_iden_consulta = trim($this->input->post('nume_iden_consulta'));
					
		$datos['nume_iden_consulta'] = $nume_iden_consulta;
		
		$datos["persona"] = $this->personas_model->consulta_persona($datos);
		$datos['tipo_docu'] = $this->personas_model->tipo_docu();
		$datos['departamentos'] = $this->personas_model->departamentos();
		$datos['localidad'] = $this->personas_model->localidad();
		
		if($datos["persona"][0]->IdLocalidad != ''){
			$datos['upz'] = $this->personas_model->upz($datos["persona"][0]->IdLocalidad);
		}else{
			$datos['upz'] = $this->personas_model->upz_todas();
		}
		
		$datos['etnias'] = $this->personas_model->etnias();
		$datos['estados_civiles'] = $this->personas_model->estados_civiles();		
		
		if(count($datos["persona"]) > 0){
			$this->load->view('admin/personasDatos', $datos);
			//echo $data;
		}else{
			echo "<center><h2>Sin informaci&oacute;n</h2></center>";
		}			
        
    }
	
	public function actualizarPersona(){
		
		$datos['IdPersona'] = $_REQUEST['id_persona'];
		$datos['p_nombre'] = $_REQUEST['p_nombre'];
		$datos['s_nombre'] = $_REQUEST['s_nombre'];
		$datos['p_apellido'] = $_REQUEST['p_apellido'];
		$datos['s_apellido'] = $_REQUEST['s_apellido'];
		$datos['t_docu'] = $_REQUEST['t_docu'];
		$datos['n_docu'] = $_REQUEST['n_docu'];
		$datos['Sexo'] = $_REQUEST['enc_sexo'];
		$datos['Gestante'] = $_REQUEST['enc_gestante'];
		$datos['FechaNacimiento'] = $_REQUEST['enc_fech_nac'];
		$datos['Edad'] = $_REQUEST['enc_edad'];
		$datos['Email'] = $_REQUEST['email'];
		$datos['Telefono'] = $_REQUEST['telefono'];
		$datos['Telefono2'] = $_REQUEST['telefono2'];
		$datos['etnia'] = $_REQUEST['etnia'];
		$datos['IdLocalidad'] = $_REQUEST['loca_capta'];
		$datos['CodigoUP'] = $_REQUEST['upz_capta'];
		$datos['Direccion'] = $_REQUEST['dire_usua'];
		
		
		//Se registra la informacion del usuario, restorna el ID que asigna la BD
		$resultadoID = $this->personas_model->actualizarPersona($datos);

		if ($resultadoID) {
			
			$this->session->set_flashdata('registroExitoso', "Se realizo la actualizaci&oacute;n de la persona con exito");
			redirect(base_url('admin/personas'), 'refresh');
			exit;
		}else{
			$this->session->set_flashdata('errorBD', 'Error al actualizar la persona');
			redirect(base_url('admin/personas'), 'refresh');
			exit;
		}  
	}
	
	
	public function asignarPersona($id_persona, $id_gestor){
		
		$datos['IdPersona'] = $id_persona;
		$datos['IdGestor'] = $id_gestor;
		$resultadoAsignacion = $this->personas_model->validarAsignacion($datos);
		
		if(count($resultadoAsignacion)<=0){
			//Se registra la informacion del usuario, restorna el ID que asigna la BD
			$resultadoID = $this->personas_model->registrarAsignacion($datos);

			if ($resultadoID) {
				
				$this->session->set_flashdata('registroExitoso', "Se realizo la asignaci&oacute;n de la persona con exito");
				redirect(base_url('admin/asignarUsuarios/'.$id_gestor), 'refresh');
				exit;
			}else{
				$this->session->set_flashdata('errorBD', 'Error al asignar la persona');
				redirect(base_url('admin/asignarUsuarios/'.$id_gestor), 'refresh');
				exit;
			}  
		}else{
			$this->session->set_flashdata('errorBD', 'Error al asignar la persona, ya se encuentra asignada a un gestor');
			redirect(base_url('admin/asignarUsuarios/'.$id_gestor), 'refresh');
			exit;
		}
		
		
	}
	
	public function asignarUsuarios($id_usuario)
	{			
		$data['titulo'] = 'Asignaci&oacute;n';
		$data['contenido'] = 'admin/form_asignar_view';
		$data["usuario"] = $this->usuarios_model->consulta_usuario_id($id_usuario);
		$data["personas"] = $this->usuarios_model->personas_asignadas($id_usuario);
		$this->load->view('templates/layout_general',$data);
	}
	
	public function cargaDatosAsignacion() {
		
		$nume_iden_consulta = trim($this->input->post('nume_iden_consulta'));
		$id_gestor = trim($this->input->post('id_gestor'));
					
		$datos['nume_iden_consulta'] = $nume_iden_consulta;
		$datos['id_gestor'] = $id_gestor;
		
		$datos["persona"] = $this->personas_model->consulta_persona($datos);	
		
		if(count($datos["persona"]) > 0){
			$this->load->view('admin/personasAsignacion', $datos);
			//echo $data;
		}else{
			echo "<center><h2>Sin informaci&oacute;n</h2></center>";
		}			
        
    }
}