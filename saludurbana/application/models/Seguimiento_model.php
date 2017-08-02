<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Seguimiento_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }

	public function personas_digitador($id_subred) {
        
		$sql = "SELECT DISTINCT PE.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.IdTipoIdentifcacion, PE.NumeroIdentificacion, ";
		$sql .= " PE.Edad, PE.FechaNacimiento, PE.Sexo, PE.GrupoSanguineo, PE.FactorRH, PE.IdMunicipioNacimiento, PE.IdLocalidad, PE.Barrio, PE.Direccion, PE.Telefono, USU.username, VI.Fecha ";
		$sql .= " FROM Persona PE ";
		$sql .= " JOIN Asignacion ASI ON ASI.IdPersona = PE.IdPersona ";
		$sql .= " JOIN usuarios USU ON USU.id = ASI.IdGestor ";
		$sql .= " JOIN Visita VI ON VI.IdPersona = PE.IdPersona ";
		$sql .= " JOIN ficha FI ON VI.IdVisita = FI.IdVisita  ";
		$sql .= " WHERE PE.id_subred = ".$id_subred." ";
		$sql .= " ORDER BY IdPrioridad, IdMedioCita desc ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function consultarVisitas($id_persona) {
        $sql = " SELECT IdVisita, Fecha, IdPersona, IdGestor, VI.IdEstadoVisita, EV.Nombre "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " WHERE IdPersona = ".$id_persona;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function consultarVisitasFicha($id_persona) {
        $sql = " SELECT  
				per.PrimerNombre, per.SegundoNombre, per.PrimerApellido, per.SegundoApellido, per.NumeroIdentificacion, Edad, per.Direccion, Telefono,
				FechaCita, IdPrioridad,
				CASE idprioridad
					WHEN '0' THEN 'Sin Prioridad'
					WHEN '1' THEN 'Urgencia'
					WHEN '2' THEN 'Cita de atencion medica prioritaria'
					ELSE 'Sin Prioridad'
				END as prioridad,
				idMedioCita, 
				CASE idMedioCita
					WHEN '0' THEN 'N/A'
					WHEN '1' THEN 'Web'
					WHEN '2' THEN 'Chat'
					WHEN '3' THEN 'Telefono'
					ELSE 'N/A'
				END as medio,
				pat.NombrePunto, ObsPrioridad, vis.fecha, EV.Nombre, Asistio, fic.IdVisita
				FROM ficha fic
				JOIN visita  vis ON vis.IdVisita = fic.IdVisita
				JOIN EstadoVisita EV ON EV.IdEstadoVisita = vis.IdEstadoVisita 
				JOIN persona per ON per.IdPersona = vis.IdPersona
				LEFT JOIN pr_puntoatencion pat ON pat.IdPunto = fic.LugarCita ";
        $sql.= " WHERE per.IdPersona = ".$id_persona;
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function pr_razon_asistencia() {
        $sql = " SELECT
					id_razon_asistencia,
					desc_razon_asistencia
				FROM
					pr_razon_asistencia; ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function pr_tipo_seguimiento() {
        $sql = " SELECT
					id_tipo_seguimiento,
					desc_tipo_seguimiento
				FROM
					pr_tipo_seguimiento; ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function pr_razon_seguimiento() {
        $sql = " SELECT
					id_razon_seguimiento,
					desc_razon_seguimiento
				FROM
					pr_razon_seguimiento; ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
}