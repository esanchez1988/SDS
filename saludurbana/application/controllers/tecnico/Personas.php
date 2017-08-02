<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
/**
 * 
 */
class Personas extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('admin_model');
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
		$data['titulo'] = 'Administrador';
		$data['contenido'] = 'admin/index_view';
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
					case '3':
						$this->load->view('admin/reporte3',$data, FALSE);
					break;
				}				
				
			}else{
				$this->session->set_flashdata('mensajeError', 'No se encontraron registros');
				redirect(base_url('admin/filtrosReporte'), 'refresh');
			}
			
			
		}else{
			$this->session->set_flashdata('mensajeError', 'Los parametros para generar el reporte no son correctos');
			redirect(base_url('admin/filtrosReporte'), 'refresh');
		}	
	}
}