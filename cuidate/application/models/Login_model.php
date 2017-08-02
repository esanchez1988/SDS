<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Login_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	public function login_user($username,$password)
	{
		$sql = " SELECT id,	perfil, username, password";
        $sql.= " FROM usuarios ";
        $sql.= " WHERE username = '".$username."' ";
        $sql.= " AND password = '".$password."' ";
        $query = $this->db->query($sql);         
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}
	
	public function info_persona($id_persona) {
        $sql = " SELECT IdPersona,	PrimerNombre, SegundoNombre, PrimerApellido, SegundoApellido, IdTipoIdentifcacion, NumeroIdentificacion, Edad, FechaNacimiento, Sexo, GrupoSanguineo, FactorRH, Telefono, Direccion, Barrio ";
        $sql.= " FROM Persona ";
        $sql.= " WHERE IdPersona = ".$id_persona;
        $query = $this->db->query($sql);
        return $query->row(); 
    }
}