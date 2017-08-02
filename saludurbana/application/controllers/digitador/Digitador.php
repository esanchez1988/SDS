<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Digitador extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('usuarios_model');
		$this->load->model('personas_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
		
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '3')
		{
			redirect(base_url().'login');
		}
	}
	
	
	
	public function personas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != '3')
		{
			redirect(base_url().'login');
		}		
		$data['titulo'] = 'Personas';
		$data['contenido'] = 'digitador/datosPersonas_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function cargaDatosPersona() {
		
		$nume_iden_consulta = trim($this->input->post('nume_iden_consulta'));
					
		$datos['nume_iden_consulta'] = $nume_iden_consulta;
		
		$datos["persona"] = $this->personas_model->consulta_persona($datos);
				
		
		if(count($datos["persona"]) > 0){
			
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
			
			$this->load->view('digitador/personasDatos', $datos);
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
			redirect(base_url('digitador/digitador/personas'), 'refresh');
			exit;
		}else{
			$this->session->set_flashdata('errorBD', 'Error al actualizar la persona');
			redirect(base_url('digitador/digitador/personas'), 'refresh');
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