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
	
	public function puntos()
	{		
		$data['psalud'] = $this->admin_model->psalud();
		$data['subred'] = $this->admin_model->pr_subred();
		$data['tipo_escenario'] = $this->admin_model->tipo_escenario();
		$data['titulo'] = 'Puntos de atenci&oacute;n';
		$data['contenido'] = 'admin/puntos_view';
		$this->load->view('templates/layout_general',$data);
	}
	
	public function datos_punto()
	{		
		$punto_atencion = $this->input->post('punto_atencion');
	
		$datos = $this->admin_model->psalud_datos($punto_atencion);
		
			
			$arreglo['nombre'] = $datos->nombre;
			$arreglo['direccion'] = $datos->direccion;
			$arreglo['zona'] = $datos->zona;
			$arreglo['tipo_escenario'] = $datos->tipo_escenario;
			$arreglo['latitud'] = $datos->latitud;
			$arreglo['longitud'] = $datos->longitud;
			$arreglo['estado'] = $datos->estado;

			echo json_encode($arreglo);
			
	}
	
	
	public function guardar_datos()
	{		
		$punto_atencion = $this->input->post('punto_atencion');
		$nombre = $this->input->post('nombre');
		$direccion = $this->input->post('direccion');
		$subred = $this->input->post('subred');
		$tipo_escenario = $this->input->post('tipo_escenario');
		$latitud = $this->input->post('latitud');
		$longitud = $this->input->post('longitud');
		$estado = $this->input->post('estado');
	
		if($punto_atencion == ''){
			
			$datos['zona'] = $subred;
			$datos['nombre'] = $nombre;
			$datos['direccion'] = $direccion;
			$datos['tipo_escenario'] = $tipo_escenario;
			$datos['latitud'] = $latitud;
			$datos['longitud'] = $longitud;
			$datos['estado'] = $estado;
			
			$resultado = $this->admin_model->registrar_punto($datos);
			
			if($resultado){
				$arreglo['estado'] = "OK";
				$arreglo['mensaje'] = "Se realizo la creaci&oacute;n del punto de atenci&oacute;n";	
			}else{
				$arreglo['estado'] = "ERROR";
				$arreglo['mensaje'] = "Error al realizar la creaci&oacute;n del punto de atenci&oacute;n";
			}
			
		}else{
			$datos['id_punto_atencion'] = $punto_atencion;
			$datos['zona'] = $subred;
			$datos['nombre'] = $nombre;
			$datos['direccion'] = $direccion;
			$datos['tipo_escenario'] = $tipo_escenario;
			$datos['latitud'] = $latitud;
			$datos['longitud'] = $longitud;
			$datos['estado'] = $estado;
			
			$resultado = $this->admin_model->actualizar_punto($datos);
			
			if($resultado){
				$arreglo['estado'] = "OK";
				$arreglo['mensaje'] = "Se realizo la actualizaci&oacute;n del punto seleccionado";	
			}else{
				$arreglo['estado'] = "ERROR";
				$arreglo['mensaje'] = "Error al realizar la actualizaci&oacute;n del punto";
			}
			
		}
				
			echo json_encode($arreglo);
			
	}
}