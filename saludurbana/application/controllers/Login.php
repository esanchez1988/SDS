<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->database('default');
    }
	
	public function index()
	{	
		//var_dump($this->session->userdata());exit;
		switch ($this->session->userdata('perfil')) {
			case '':
				$data['token'] = $this->token();
				$data['contenido'] = 'login/login';
				$data['titulo'] = 'Gestor del Riesgo';
				$this->load->view('templates/layout_login',$data);
				break;
			case "1":
				redirect(base_url('admin/personas'));
				break;
			case "2":
				redirect(base_url('gestor/personas'));
				break;
			case "3":
				redirect(base_url('digitador/digitador/personas'));
				break;
			case "4":
				redirect(base_url('tecnico/personas'));
				break;	
		}
	}
 
 public function validar(){
	
	$this->form_validation->set_rules('usuario', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
	$this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
	 
	$username = $this->input->post('usuario');
	$password = sha1($this->input->post('password')); 
	 
	$check_user = $this->login_model->login_user($username,$password);
	
	if($check_user == TRUE)
	{
		if($check_user->IdPersona != ''){
			$usuario = $this->login_model->info_usuario($username);
			
			$nombre = $usuario->Correo;
		}else{
			$nombre = $check_user->username;
		}
		
		$data = array(
		'is_logued_in' 	=> 		TRUE,
		'id_usuario' 	=> 		$check_user->id,
		'perfil'		=>		$check_user->perfil,
		'desc_perfil'	=>		$check_user->desc_rol,
		'username' 		=> 		$check_user->username,
		'nombre' 		=> 		$nombre,
		'id_subred' 	=> 		$check_user->id_subred,
		'email' 		=> 		$check_user->Correo,
		);	

		$this->session->set_userdata($data);
		redirect(base_url('login'));
	}
 }
 
public function new_user()
	{
		if($this->input->post('token') && $this->input->post('token') == $this->session->userdata('token'))
		{
            $this->form_validation->set_rules('username', 'nombre de usuario', 'required|trim|min_length[2]|max_length[150]|xss_clean');
            $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[5]|max_length[150]|xss_clean');
 
            //lanzamos mensajes de error si es que los hay
            
			if($this->form_validation->run() == FALSE)
			{
				$this->index();
			}else{
				$username = $this->input->post('username');
				$password = sha1($this->input->post('password'));
				$check_user = $this->login_model->login_user($username,$password);
				if($check_user == TRUE)
				{
					$data = array(
	                'is_logued_in' 	=> 		TRUE,
	                'id_usuario' 	=> 		$check_user->id,
	                'perfil'		=>		$check_user->perfil,
	                'username' 		=> 		$check_user->username
            		);		
					$this->session->set_userdata($data);
					$this->index();
				}
			}
		}else{
			redirect(base_url().'login');
		}
	}
	
	public function token()
	{
		$token = md5(uniqid(rand(),true));
		$this->session->set_userdata('token',$token);
		return $token;
	}
	
	public function logout_ci()
	{
		$this->session->sess_destroy();
		redirect(base_url());		
	}
}
