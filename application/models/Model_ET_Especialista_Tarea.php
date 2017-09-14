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
		$data=$this->db->query("select * from ET_ESPECIALISTA_TAREA as etet inner join ESPECIALIDAD as e on etet.id_esp=e.id_esp left join ET_PER_REQ as etpr on etet.id_per_req=etpr.id_per_req where etet.id_tarea_et=$idTareaET order by (e.nombre_esp)");

		return $data->result();
	}

	function ultimoETEspecialistaTarea()
	{
		$data=$this->db->query("select * from ET_ESPECIALISTA_TAREA where id_especialista_tarea=(select max(id_especialista_tarea) from ET_ESPECIALISTA_TAREA)");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function eliminar($idEspecialistaTarea)
	{
		$this->db->query("delete from ET_ESPECIALISTA_TAREA where id_especialista_tarea=$idEspecialistaTarea");

		return true;
	}
}