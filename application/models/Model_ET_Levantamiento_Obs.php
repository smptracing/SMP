<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Levantamiento_Obs extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idEspecialistaTarea, $idObservacionTarea, $descLevObs, $fechaLevObs, $extArchivo)
	{
		$this->db->query("execute sp_Gestionar_ETLevantamientoObs @opcion='insertar', @idEspecialistaTarea=$idEspecialistaTarea, @idObservacionTarea=$idObservacionTarea, @descLevObs='$descLevObs', @fechaLevObs='$fechaLevObs', @extArchivo='$extArchivo'");

		return true;
	}

	function ultimoETLevantamientoObs()
	{
		$data=$this->db->query("select * from ET_LEVANTAMIENTO_OBS where id_levantamiento_obs=(select max(id_levantamiento_obs) from ET_LEVANTAMIENTO_OBS)");

		return count($data->result())==0 ? null : $data->result();
	}

	function ETLevantamientoObsPorIdObservacionTarea($idObservacionTarea)
	{
		$data=$this->db->query("select * from ET_LEVANTAMIENTO_OBS as ETLO inner join ET_ESPECIALISTA_TAREA as ETET on ETLO.id_especialista_tarea=ETET.id_especialista_tarea inner join ET_PER_REQ as ETPR on ETET.id_per_req=ETPR.id_per_req inner join PERSONA as P on ETPR.id_persona=P.id_persona inner join ESPECIALIDAD as E on ETPR.id_esp=E.id_esp where id_observacion_tarea=$idObservacionTarea");

		return $data->result();
	}
}