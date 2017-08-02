<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Admin_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }
	
	public function cunsultarFichasHTDA() {
        $sql = " SELECT VI.IdVisita, Fecha, VI.IdPersona, IdGestor, VI.IdEstadoVisita, EV.Nombre, FI.*, TIMESTAMPDIFF(YEAR, PE.FechaNacimiento, CURDATE()) AS Edad, PE.Sexo  "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " JOIN FichaHTDA FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " WHERE VI.IdEstadoVisita = 1 ";
        $query = $this->db->query($sql);		
        return $query->result(); 
    }
	
	public function cunsultarFichas() {
        $sql = " SELECT VI.IdVisita, Fecha, VI.IdPersona, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, IdOpcionUltimaConsulta, IdOpcionUltimaTomaLaboratorios, Tas, Tad, IdOpcionTAS, ValorGlucometria,  "; 
        $sql.= " IdOpcionGlucometria, TiempoConsumoAlimentos, ValorPerimetroAbdominal, IdOpcionPA, ExisteHospitalizacionTA, ExisteHospitalizacionTA2, EsFumador, EsBebedor, RealizaActividadFisica, "; 
        $sql.= " DescripcionActividadFisica, IdPrioridad, IdMedioCita, FechaCita, ObsPrioridad  "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " JOIN Ficha FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " LEFT JOIN FichaHTDA FH ON FH.IdVisita = VI.IdVisita ";
        $sql.= " JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " WHERE VI.IdEstadoVisita = 1 "; 
        $query = $this->db->query($sql);	
        return $query->result(); 
    }
	
	public function cunsultarFichasNoCronicos() {
        $sql = " SELECT VI.IdVisita, Fecha, VI.IdPersona, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " LEFT JOIN Ficha FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " WHERE VI.IdEstadoVisita = 1 "; 
        $query = $this->db->query($sql);	
        return $query->result(); 
    }
	
	public function cunsultarVisitasEfectivas() {
        $sql = " SELECT distinct Fecha, VI.IdPersona, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc "; 
        $sql.= " FROM Visita VI ";
        $sql.= " JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " LEFT JOIN Ficha FI ON FI.IdVisita = VI.IdVisita ";
        $sql.= " JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " WHERE VI.IdEstadoVisita = 1 "; 
        $query = $this->db->query($sql);	
        return $query->result(); 
    }
	
	public function cunsultarVisitasEfectivasCursos() {
        $sql = " SELECT distinct VI.Fecha, VI.IdPersona, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, "; 
        $sql.= " ma.id_usuario idma, ma.m1, ma.m2, ma.m3, ma.m4, ma.m5, ma.m6, ma.m7, ma.m8, ma.m9, ma.m10, ma.m11,
				pii.id_usuario idpii, pii.pi1, pii.pi2, pii.pi3, pii.pi4, pii.pi5, pii.pi6, pii.pi7, pii.pi8, pii.pi9, pii.pi10, pii.pi11, pii.pi12, pii.pi13,
				inf.id_usuario idinf, inf.in1, inf.in2, inf.in3, inf.in4, inf.in5,
				ado.id_usuario idado, ado.ad1, ado.ad2, ado.ad3, ado.ad4, ado.ad5, ado.ad6, ado.ad7, ado.ad8, ado.ad9,
				ju.id_usuario idju, ju.ju1, ju.ju2, ju.ju3, ju.ju4, ju.ju5, ju.ju6, ju.ju7,
				adu.id_usuario idadu, adu.adu1, adu.adu2, adu.adu3, adu.adu4, adu.adu5, adu.adu6, adu.adu7, adu.adu8, adu.adu9,
				ve.id_usuario idve, ve.ve1, ve.ve2, ve.ve3, ve.ve4, ve.ve5, ve.ve6, ve.ve7   ";
        $sql.= " FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita ";
        $sql.= " LEFT JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona ";
        $sql.= " left join materno ma ON ma.id_usuario = vi.IdPersona ";
        $sql.= " left join primera_infancia pii ON pii.id_usuario = vi.IdPersona ";
        $sql.= " left join infancia inf ON inf.id_usuario = vi.IdPersona "; 
        $sql.= " left join juventud ju ON ju.id_usuario = vi.IdPersona "; 
        $sql.= " left join adolescencia ado ON ado.id_usuario = vi.IdPersona "; 
        $sql.= " left join adultez adu ON adu.id_usuario = vi.IdPersona "; 
        $sql.= " left join vejez ve ON ve.id_usuario = vi.IdPersona "; 
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
	
	public function cunsultarPrioridad() {
        $sql = " select idprioridad, 
				CASE idprioridad
					WHEN '0' THEN 'Sin Prioridad'
					WHEN '1' THEN 'Urgencia'
					WHEN '2' THEN 'Cita de atencion medica prioritaria'
					ELSE 'Sin Prioridad'
				END as prioridad, count(*) as total
				from ficha
				group by 1,2; ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	
	public function cunsultarMedio() {
        $sql = " select idMedioCita, 
				CASE idMedioCita
					WHEN '0' THEN 'N/A'
					WHEN '1' THEN 'Web'
					WHEN '2' THEN 'Chat'
					WHEN '3' THEN 'Teléfono'
					ELSE 'N/A'
				END as medio, count(*) as total
				from ficha
				where idMedioCita in(1,2,3)
				group by 1,2; ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function cunsultarVisitasTotales() {
        $sql = " SELECT count( * ) AS total FROM Persona ";
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
	
	public function personas_digitador($id_subred) {
        
		$sql = "SELECT DISTINCT PE.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.IdTipoIdentifcacion, PE.NumeroIdentificacion, ";
		$sql .= " PE.Edad, PE.FechaNacimiento, PE.Sexo, PE.GrupoSanguineo, PE.FactorRH, PE.IdMunicipioNacimiento, PE.IdLocalidad, PE.Barrio, PE.Direccion, PE.Telefono, GE.PrimerNombre AS PNombreGE, GE.SegundoNombre AS SNombreGE, GE.PrimerApellido AS PApellidoGE, GE.SegundoApellido AS SApellidoGE ";
		$sql .= " FROM Persona PE ";
		$sql .= " JOIN Asignacion ASI ON ASI.IdPersona = PE.IdPersona ";
		$sql .= " JOIN usuarios USU ON USU.id = ASI.IdGestor ";
		$sql .= " JOIN Persona GE ON GE.IdPersona = GE.IdPersona ";
		$sql .= " WHERE PE.id_subred = ".$id_subred." ";
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
	
	public function seg_agen_actividad() {
        $sql = " SELECT Actividad, count(*) as total "; 
        $sql.= " FROM seg_agendamiento ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function seg_pres_ingreso() {
        $sql = " SELECT CIE10Ingreso, count(*) as total "; 
        $sql.= " FROM seg_prestacion ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	public function seg_pres_egreso() {
        $sql = " SELECT CIE10Egreso, count(*) as total "; 
        $sql.= " FROM seg_prestacion ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	public function seg_pres_relacionado1() {
        $sql = " SELECT CIE10Relacionado1, count(*) as total "; 
        $sql.= " FROM seg_prestacion ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	public function seg_pres_relacionado2() {
        $sql = " SELECT CIE10Relacionado2, count(*) as total "; 
        $sql.= " FROM seg_prestacion ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosMaterno() {
        $sql = " SELECT m1, m2, m3, m4, m5, m6, m7, m8, m9, m10, m11 "; 
        $sql.= " FROM materno ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosPrimeraInfancia() {
        $sql = " SELECT pi1, pi2, pi3, pi4, pi5, pi6, pi7, pi8, pi9, pi10, pi11, pi12, pi13 "; 
        $sql.= " FROM primera_infancia ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosInfancia() {
        $sql = " SELECT in1, in2, in3, in4, in5 "; 
        $sql.= " FROM infancia ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosJuventud() {
        $sql = " SELECT ju1, ju2, ju3, ju4, ju5, ju6, ju7 "; 
        $sql.= " FROM juventud ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosAdolescencia() {
        $sql = " SELECT ad1, ad2, ad3, ad4, ad5, ad6, ad7, ad8, ad9 "; 
        $sql.= " FROM adolescencia ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosAdultez() {
        $sql = " SELECT adu1, adu2, adu3, adu4, adu5, adu6, adu7, adu8, adu9 "; 
        $sql.= " FROM adultez ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function consultarDatosVejez() {
        $sql = " SELECT ve1, ve2, ve3, ve4, ve5, ve6, ve7 "; 
        $sql.= " FROM vejez ";
        $query = $this->db->query($sql);
        return $query->result(); 
		
    }
	
	public function datos_reporte1() {
        $sql = "select 	per.PrimerNombre, per.SegundoNombre, per.PrimerApellido, per.SegundoApellido, per.NumeroIdentificacion, Edad, Direccion, Telefono,
				vis.IdPersona, IdGestor, sur.desc_subred, vis.IdEstadoVisita, esv.Nombre as estadoVisita,	
				usu.username, usu.Correo
				FROM visita vis
				JOIN persona per ON per.IdPersona = vis.IdPersona
				JOIN usuarios usu ON usu.id = vis.IdGestor
				JOIN estadovisita esv ON esv.idEstadoVisita = vis.IdEstadoVisita 
				LEFT JOIN subredes sur ON usu.id_subred = sur.id_subred;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				ma.id_usuario idma, ma.m1, ma.m2, ma.m3, ma.m4, ma.m5, ma.m6, ma.m7, ma.m8, ma.m9, ma.m10, ma.m11,
				pii.id_usuario idpii, pii.pi1, pii.pi2, pii.pi3, pii.pi4, pii.pi5, pii.pi6, pii.pi7, pii.pi8, pii.pi9, pii.pi10, pii.pi11, pii.pi12, pii.pi13,
				inf.id_usuario idinf, inf.in1, inf.in2, inf.in3, inf.in4, inf.in5,
				ado.id_usuario idado, ado.ad1, ado.ad2, ado.ad3, ado.ad4, ado.ad5, ado.ad6, ado.ad7, ado.ad8, ado.ad9,
				ju.id_usuario idju, ju.ju1, ju.ju2, ju.ju3, ju.ju4, ju.ju5, ju.ju6, ju.ju7,
				adu.id_usuario idadu, adu.adu1, adu.adu2, adu.adu3, adu.adu4, adu.adu5, adu.adu6, adu.adu7, adu.adu8, adu.adu9,
				ve.id_usuario idve, ve.ve1, ve.ve2, ve.ve3, ve.ve4, ve.ve5, ve.ve6, ve.ve7  
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				LEFT JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				left join materno ma ON ma.id_usuario = vi.IdPersona
				left join primera_infancia pii ON pii.id_usuario = vi.IdPersona
				left join infancia inf ON inf.id_usuario = vi.IdPersona
				left join juventud ju ON ju.id_usuario = vi.IdPersona
				left join adolescencia ado ON ado.id_usuario = vi.IdPersona
				left join adultez adu ON adu.id_usuario = vi.IdPersona
				left join vejez ve ON ve.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_ma() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				ma.id_usuario idma, ma.m1, ma.m2, ma.m3, ma.m4, ma.m5, ma.m6, ma.m7, ma.m8, ma.m9, ma.m10, ma.m11
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				join materno ma ON ma.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_pi() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				pii.id_usuario idpii, pii.pi1, pii.pi2, pii.pi3, pii.pi4, pii.pi5, pii.pi6, pii.pi7, pii.pi8, pii.pi9, pii.pi10, pii.pi11, pii.pi12, pii.pi13				
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				join primera_infancia pii ON pii.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_in() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				inf.id_usuario idinf, inf.in1, inf.in2, inf.in3, inf.in4, inf.in5
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				join infancia inf ON inf.id_usuario = vi.IdPersona				
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_ju() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				ju.id_usuario idju, ju.ju1, ju.ju2, ju.ju3, ju.ju4, ju.ju5, ju.ju6, ju.ju7
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				join juventud ju ON ju.id_usuario = vi.IdPersona				
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_ado() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				ado.id_usuario idado, ado.ad1, ado.ad2, ado.ad3, ado.ad4, ado.ad5, ado.ad6, ado.ad7, ado.ad8, ado.ad9
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona					
				join adolescencia ado ON ado.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_adu() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				adu.id_usuario idadu, adu.adu1, adu.adu2, adu.adu3, adu.adu4, adu.adu5, adu.adu6, adu.adu7, adu.adu8, adu.adu9
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona	
				join adultez adu ON adu.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte2_ve() {
        $sql = " select distinct VI.Fecha, VI.IdPersona, PE.PrimerNombre, PE.SegundoNombre, PE.PrimerApellido, PE.SegundoApellido, PE.NumeroIdentificacion, PE.Sexo, PE.Edad, PE.Peso, PE.Talla, PE.Imc, Pe.Desc_imc, 
				ve.id_usuario idve, ve.ve1, ve.ve2, ve.ve3, ve.ve4, ve.ve5, ve.ve6, ve.ve7  
				FROM Visita VI JOIN EstadoVisita EV ON EV.IdEstadoVisita = VI.IdEstadoVisita 
				JOIN Ficha FI ON FI.IdVisita = VI.IdVisita JOIN Persona PE ON PE.IdPersona = VI.IdPersona					
				join vejez ve ON ve.id_usuario = vi.IdPersona
				WHERE VI.IdEstadoVisita = 1;";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function datos_reporte3() {
        $sql = "SELECT  
				per.PrimerNombre, per.SegundoNombre, per.PrimerApellido, per.SegundoApellido, per.NumeroIdentificacion, Edad, per.Direccion, Telefono,
				FechaCita,
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
				pat.NombrePunto
				FROM ficha fic
				JOIN visita  vis ON vis.IdVisita = fic.IdVisita
				JOIN persona per ON per.IdPersona = vis.IdPersona
				LEFT JOIN pr_puntoatencion pat ON pat.IdPunto = fic.LugarCita
				WHERE idMedioCita in(1,2,3)";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	
}