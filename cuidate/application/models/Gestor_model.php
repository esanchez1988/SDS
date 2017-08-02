<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Gestor_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }
	
	public function sexo() {
        
		$sql = "SELECT DISTINCT id_sexo, desc_sexo ";
		$sql .= " FROM pr_sexo  ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function psalud() {
        
		$sql = "SELECT DISTINCT id_punto, direccion, latitud, longitud, zona ";
		$sql .= " FROM pr_puntos_atencion  ";
		$sql .= " ORDER BY 5,2   ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function imc_nino($meses) {
        
		$sql = "SELECT meses, VN3, VN2, VN1, VP0, VP1, VP2, VP3 ";
		$sql .= " FROM imc_ninos  ";
		$sql .= " WHERE meses = ".$meses;
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function imc_nina($meses) {
        
		$sql = "SELECT meses, VN3, VN2, VN1, VP0, VP1, VP2, VP3 ";
		$sql .= " FROM imc_ninas  ";
		$sql .= " WHERE meses = ".$meses;
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function guardaPersona($datos) {
        $this->db->trans_start();
        $this->db->insert('persona', $datos);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
		
    }
	
	public function registraEjercicio($datos) {
        $this->db->trans_start();
        $this->db->insert('ejercicio', $datos);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
		
    }
	
	public function actualizaPersona($datos) {
                
		$data = array(
            'nombre' => $datos['nombre'],
            'correo' => $datos['correo'],
            'fecha_nacimiento' => $datos['fecha_nacimiento'],
            'edad' => $datos['edad'],
            'peso' => $datos['peso'],
            'talla' => $datos['talla'],
            'pa' => $datos['pa'],
            'imc' => $datos['imc'],
            'desc_imc' => $datos['desc_imc'],
            'sexo' => $datos['sexo'],
            'sexopr' => $datos['sexopr']
        );
        $this->db->where('cedula', $datos['cedula']);
        return $this->db->update('persona', $data);
    }
	
	public function actualizaActividades($datos) {
                
		$data = array(
            'actividad' => $datos['actividad'],
            'tabaco' => $datos['tabaco'],
            'frutas' => $datos['frutas'],
            'bebidas' => $datos['bebidas'],
            'tas' => $datos['tas'],
            'tad' => $datos['tad'],
            'tratamiento' => $datos['tratamiento']
        );
        $this->db->where('cedula', $datos['cedula']);
        return $this->db->update('persona', $data);
    }
	
	public function info_persona($cedula) {
        $sql = " SELECT cedula,	nombre, correo, fecha_nacimiento, edad, meses, peso, talla, pa, imc, desc_imc, sexo, sexopr, actividad, tabaco, frutas, bebidas, tas, tad, tratamiento ";
        $sql.= " FROM persona ";
        $sql.= " WHERE cedula = ".$cedula;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function ejercicio_persona($cedula) {
        $sql = " SELECT cedula,	fecha, ejercicio, psalud, PS.direccion, enc_fc, enc_fr ";
        $sql.= " FROM ejercicio EJ ";
        $sql.= " JOIN pr_puntos_atencion PS ON PS.id_punto = EJ.psalud ";
        $sql.= " WHERE cedula = ".$cedula;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function reporte_imc_hombres() {
        $sql = " SELECT desc_imc, COUNT(*) as total ";
        $sql.= " FROM persona ";
		$sql.= " WHERE sexo = 1 ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function reporte_imc_mujeres() {
        $sql = " SELECT desc_imc, COUNT(*) as total ";
        $sql.= " FROM persona ";
        $sql.= " WHERE sexo = 2 ";
        $sql.= " GROUP BY 1 ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function reporte_personas() {
        $sql = " SELECT cedula,	nombre, correo, fecha_nacimiento, edad, meses, peso, talla, pa, imc, desc_imc, sexo, sexopr, actividad, tabaco, frutas, bebidas, tas, tad, tratamiento ";
        $sql.= " FROM persona ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	////////////////////////////////////////////////////////////
	
	public function tipo_docu() {
        $sql = " SELECT IdTipoIdentificacion, Descripcion ";
        $sql.= " FROM pr_TipoIdentificacion ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function departamentos() {
        $sql = " SELECT IdDepartamento,	CodigoDane, Descripcion ";
        $sql.= " FROM pr_Departamento ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function municipios($dpto) {
        $sql = " SELECT IdMunicipio, IdDepartamento	, CodigoDane, Descripcion ";
        $sql.= " FROM pr_Municipio ";
        $sql.= " WHERE IdDepartamento = ".$dpto;
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function localidad() {
        $sql = " SELECT IdLocalidad, Nombre ";
        $sql.= " FROM pr_Localidad ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
		
	public function prestador_servicio() {
        $sql = " SELECT IdPrestadorServicio, IdSubRed, Codigo, Nombre, Direccion, Telefono ";
        $sql.= " FROM pr_PrestadorServicio ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
		
	public function punto_atencion() {
        $sql = " SELECT IdPunto, NombrePunto, Direccion, Horario ";
        $sql.= " FROM pr_PuntoAtencion ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function punto_salud($p_salud) {
        
		$sql = "SELECT DISTINCT id_punto, direccion, latitud, longitud ";
		$sql .= " FROM pr_puntos_atencion  ";
		$sql .= " WHERE id_punto = ".$p_salud."  ";
		
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function subred() {
        $sql = " SELECT IdSubRed, Codigo, Nombre ";
        $sql.= " FROM pr_SubRed ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function etnias() {
        $sql = " SELECT IdEtnia, Nombre ";
        $sql.= " FROM pr_Etnia ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function estados_civiles() {
        $sql = " SELECT  IdEstadoCivil, Nombre ";
        $sql.= " FROM pr_EstadoCivil ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function niveles() {
        $sql = " SELECT IdNivelEducativo, Nombre ";
        $sql.= " FROM pr_NivelEducativo ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
	
	public function responsables() {
        $sql = " SELECT IdResponsableCuidado, Nombre ";
        $sql.= " FROM pr_ResponsableCuidado ";
        $query = $this->db->query($sql);
        return $query->result(); 
    }
		
	public function estado_visita() {
        $sql = " SELECT IdEstadoVisita, Nombre "; 
        $sql.= " FROM EstadoVisita ";
        $sql.= " WHERE IdEstadoVisita < 6 ";
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
	
	public function guardaVisita($datos) {
        $this->db->trans_start();
        $this->db->insert('Visita', $datos);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
		
    }
	
	public function registroFicha($datos) {
        $this->db->trans_start();
        $this->db->insert('FichaHTDA', $datos);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        return $insert_id;
		
    }
	
	public function actualizarPersona($datos) {
                
		$data = array(
            'Edad' => $datos['Edad'],
            'FechaNacimiento' => $datos['FechaNacimiento'],
            'IdMunicipioNacimiento' => $datos['IdMunicipioNacimiento'],
            'IdLocalidad' => $datos['IdLocalidad'],
            'Barrio' => $datos['Barrio'],
            'Direccion' => $datos['Direccion'],
            'Telefono' => $datos['Telefono']
        );
        $this->db->where('IdPersona', $datos['IdPersona']);
        return $this->db->update('Persona', $data);
    }
	
}