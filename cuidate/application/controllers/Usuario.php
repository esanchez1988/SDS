<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Usuario extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
	}
	
	public function perfil()
	{		
		print_r($this->session->userdata());exit;
		
		
		
		$data['persona'] = $this->usuario_model->info_persona($id_persona);
		$data['titulo'] = 'Perfil Usuario';
		$data['contenido'] = 'usuario/perfil_view';
		$this->load->view('templates/layout_general',$data);		
	}
}