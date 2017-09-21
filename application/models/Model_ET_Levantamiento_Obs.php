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
}