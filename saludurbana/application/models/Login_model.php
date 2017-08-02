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
		$sql = " SELECT id,	perfil, username, password, Cargo, Correo, IdPersona, us.estado, us.id_subred, sr.desc_subred ";
        $sql.= " FROM usuarios us ";
        $sql.= " JOIN subredes sr ON sr.id_subred = us.id_subred ";
        $sql.= " WHERE username = '".$username."' ";
        $sql.= " AND password = '".$password."' ";
        $sql.= " AND estado = 'AC' ";
        $query = $this->db->query($sql);         
		
		if($query->num_rows() == 1)
		{
			return $query->row();
		}else{
			$this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
			redirect(base_url().'login','refresh');
		}
	}
	
	public function info_usuario($usuario) {
        $sql = " SELECT id,	perfil, username, password, Cargo, Correo, IdPersona, desc_rol, us.id_subred, desc_subred ";
        $sql.= " FROM usuarios us ";
        $sql.= " JOIN roles ro ON ro.id_rol = us.perfil ";
        $sql.= " JOIN suredes sr ON sr.id_subred = us.id_subred ";
        $sql.= " WHERE username like '%".$usuario."%'";
        $query = $this->db->query($sql);
        return $query->row(); 
    }
}