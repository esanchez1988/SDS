<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Admin_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }
	
	public function cunsultarFichas() {
        $sql = " SELECT VI.IdVisita, Fecha, VI.IdPersona, IdGestor, VI.IdEstadoVisita, EV.Nombre, FI.*, TIMESTAMPDIFF(YEAR, PE.FechaNacimiento, CURDATE()) AS Edad, PE.Sexo  "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " JOIN FichaHTDA FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " WHERE VI.IdEstadoVisita = 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarVisitasNoEfectivas() {
        $sql = " SELECT EV.IdEstadoVisita, EV.Nombre, COUNT(*) AS total "; 
        $sql.= " FROM EstadoVisita EV ";
        $sql.= " LEFT JOIN Visita VI ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " WHERE VI.IdEstadoVisita != 1 ";
        $sql.= " GROUP BY 1,2 ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarVisitasTotales() {
        $sql = " SELECT count( * ) AS total FROM Asignacion ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarTasNoPermitidos() {
        $sql = " SELECT count( * ) AS total FROM FichaHTDA WHERE Tas >= '999' ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarGlucoNoPermitidos() {
        $sql = " SELECT count( * ) AS total FROM FichaHTDA WHERE ValorGlucometria >= '999' ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarPerimNoPermitidos() {
        $sql = " SELECT count( * ) AS total FROM FichaHTDA WHERE ValorPerimetroAbdominal >= '999' ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarVisitas($id_persona) {
        $sql = " SELECT IdVisita, Fecha, IdPersona, IdGestor, VI.IdEstadoVisita, EV.Nombre "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " WHERE IdPersona = ".$id_persona;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function personas() {
        
		$sql = "SELECT DISTINCT PE.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.IdTipoIdentifcacion, PE.NumeroIdentificacion, ";
		$sql .= " PE.Edad, PE.FechaNacimiento, PE.Sexo, PE.GrupoSanguineo, PE.FactorRH, PE.IdMunicipioNacimiento, PE.IdLocalidad, PE.Barrio, PE.Direccion, PE.Telefono, GE.PrimerNombre AS PNombreGE, GE.SegundoNombre AS SNombreGE, GE.PrimerApellido AS PApellidoGE, GE.SegundoApellido AS SApellidoGE ";
		$sql .= " FROM Persona PE ";
		$sql .= " JOIN Asignacion ASI ON ASI.IdPersona = PE.IdPersona ";
		$sql .= " JOIN usuarios USU ON USU.id = ASI.IdGestor ";
		$sql .= " JOIN Persona GE ON GE.IdPersona = GE.IdPersona ";
		$sql .= " LIMIT 200 ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarVisitasFicha($id_persona) {
        $sql = " SELECT VI.IdVisita, Fecha, IdPersona, IdGestor, VI.IdEstadoVisita, EV.Nombre, FI.FechaRegistro,  "; 
        $sql .= " PS.Nombre AS Prestador, ET.Nombre AS Etnia, EC.Nombre AS ECivil, NE.Nombre AS NEduca, Estrato, CantidadPersonasHogar, RC.Nombre AS Responsable, DescripcionOtroResponsable, "; 
        $sql .= " TieneLimitacionFisicaDiscapacidad, DescripcionLimitacionFisicaDiscapacidad, IdOpcionUltimaConsulta, IdOpcionUltimaTomaLaboratorios, Tas, Tad, IdOpcionTAS, ValorGlucometria,  "; 
        $sql .= " IdOpcionGlucometria, TiempoConsumoAlimentos, ValorPerimetroAbdominal, IdOpcionPA, ExisteHospitalizacionTA, ExisteHospitalizacionTA2, EsFumador, EsBebedor, RealizaActividadFisica, "; 
        $sql .= " DescripcionActividadFisica, IdPrioridad, IdMedioCita, FechaCita, NombrePunto, ObsPrioridad "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " JOIN FichaHTDA FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " JOIN pr_PrestadorServicio PS ON PS.IdPrestadorServicio = FI.IdPrestadorServicio ";
        $sql.= " JOIN pr_Etnia ET ON ET.IdEtnia = FI.IdEtnia ";
        $sql.= " JOIN pr_EstadoCivil EC ON EC.IdEstadoCivil = FI.IdEstadoCivil ";
        $sql.= " JOIN pr_NivelEducativo NE ON NE.IdNivelEducativo = FI.IdNivelEducativo ";
        $sql.= " JOIN pr_ResponsableCuidado RC ON RC.IdResponsableCuidado = FI.IdResponsableCuidado ";
        $sql.= " JOIN pr_PuntoAtencion PA ON PA.IdPunto = FI.LugarCita ";
        $sql.= " WHERE IdPersona = ".$id_persona;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
}