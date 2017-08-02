<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * 
 */
class usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
	
	public function consulta_usuario($datos) {
        $this->load->database();
 
        $cadena_sql = "SELECT
							id,
							perfil,
							username,
							password,
							Cargo,
							Correo,
							IdPersona,
							desc_rol,
							us.estado,
							us.id_subred,
							sr.desc_subred
						FROM
							usuarios us
							JOIN roles ro ON ro.id_rol = us.perfil
							JOIN subredes sr ON sr.id_subred = us.id_subred
							WHERE 1=1 ";
		
		if($datos['usuario'] != ''){
			$cadena_sql.= "AND username like '%".$datos['usuario']."%' ";
		}
		if($datos['rol'] != ''){
			$cadena_sql.= "AND perfil = '".$datos['rol']."' ";
		}	
		if($datos['subred'] != ''){
			$cadena_sql.= "AND us.id_subred = '".$datos['subred']."' ";
		}			
		
        $query = $this->db->query($cadena_sql);

        return $query->result();
    }
	
	public function consulta_usuario_id($id_usuario) {
        $this->load->database();
 
        $cadena_sql = "SELECT
							id,
							perfil,
							username,
							password,
							Cargo,
							Correo,
							IdPersona,
							desc_rol,
							us.estado,
							us.id_subred,
							sr.desc_subred
						FROM
							usuarios us
							JOIN roles ro ON ro.id_rol = us.perfil
							JOIN subredes sr ON sr.id_subred = us.id_subred
							WHERE id = ".$id_usuario." ";
		
        $query = $this->db->query($cadena_sql);

        return $query->result();
    }
	
	public function personas_asignadas($id_usuario) {
        $this->load->database();
 
        $cadena_sql = "SELECT
							IdAsignacion,
							asi.IdPersona,
							PrimerNombre,
							SegundoNombre,
							PrimerApellido,
							SegundoApellido,
							IdTipoIdentifcacion,
							NumeroIdentificacion
						FROM
							asignacion asi
							JOIN persona pe ON pe.IdPersona = asi.IdPersona	
							WHERE IdGestor = ".$id_usuario." ";
		
        $query = $this->db->query($cadena_sql);

        return $query->result();
    }
	
    public function insertarUsuario($param) {
        $this->db->trans_start();
        $this->db->insert('usuarios', $param);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return  $insert_id;
    }
	
    
    function actualizarUsuario($datos)
    {
        $data = array(
            'Correo' => $datos['correo'],
            'id_subred' => $datos['subred'],
            'perfil' => $datos['perfil']
        );
        $this->db->where('username', $datos['username']);
        return $this->db->update('usuarios', $data);
    }
	    
    public function eliminar_usuario($id_usuario)
    {
        $data = array(
            'estado' => 'IN'
        );
        $this->db->where('id', $id_usuario);
        return $this->db->update('usuarios', $data);
    }
	
    public function cambiar_password($datos)
    {
        $data = array(
            'clave' => sha1(md5($datos['password']))
        );
        $this->db->where('usuario_id_usuario', $datos['id_usuario']);
        return $this->db->update('login', $data);
    }
	
	public function roles() {
        $sql = " SELECT id_rol, desc_rol, estado "; 
        $sql.= " FROM roles ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function subredes() {
        $sql = " SELECT id_subred, desc_subred, estado_sr "; 
        $sql.= " FROM subredes ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
}
