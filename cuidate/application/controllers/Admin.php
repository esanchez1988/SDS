<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
		$this->load->model('gestor_model');
		$this->load->library(array('session','form_validation'));  
		$this->load->helper(array('url','form')); 
		$this->load->database('default'); 
		
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
	}
	
	public function index()
	{
		ini_set('max_execution_time', 1200);	
		//ini_set('memory_limit', -1);
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/reportes_view';
		$this->load->view('templates/layout_general',$data);		
	}
	
	public function reporte_efectivo(){
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/efectivo_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function reporte_no_efectivo(){
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/noefectivo_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function personas()
	{
		if($this->session->userdata('perfil') == FALSE || $this->session->userdata('perfil') != 'administrador')
		{
			redirect(base_url().'login');
		}
		
		$data['personas'] = $this->admin_model->personas();
		$data['titulo'] = 'Listado';
		$data['contenido'] = 'admin/personas_view';
		$this->load->view('templates/layout_general',$data);
	}
}