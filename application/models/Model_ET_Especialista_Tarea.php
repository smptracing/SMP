<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Especialista_Tarea extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idPerReq, $idTareaET, $idEsp)
	{
		$this->db->query("execute sp_Gestionar_ETEspecialistaTarea 'insertar', ".$idPerReq.", ".$idTareaET.", ".$idEsp);

		return true;
	}

	function ETEspecialistaTareaPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_ESPECIALISTA_TAREA as etet inner join ESPECIALIDAD as e on etet.id_esp=e.id_esp left join ET_PER_REQ as etpr on etet.id_per_req=etpr.id_per_req where etet.id_tarea_et=$idTareaET");

		return $data->result();
	}
}