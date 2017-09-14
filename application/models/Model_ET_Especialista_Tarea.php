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
		$this->db->query("execute sp_Gestionar_ETEspecialistaTarea @opcion='insertar', @idPerReq=$idPerReq, @idTareaET=$idTareaET, @idEsp=$idEsp");

		return true;
	}

	function ETEspecialistaTareaPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select etet.id_especialista_tarea, etet.id_per_req, etet.id_tarea_et, etet.id_esp, e.nombre_esp, e.descipcion_esp, etpr.id_persona, etpr.id_et, etpr.fecha_desig, etpr.craet from ET_ESPECIALISTA_TAREA as etet inner join ESPECIALIDAD as e on etet.id_esp=e.id_esp left join ET_PER_REQ as etpr on etet.id_per_req=etpr.id_per_req where etet.id_tarea_et=$idTareaET order by (e.nombre_esp)");

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

	function asignarPersonal($idEspecialistaTarea, $idPerReq)
	{
		$this->db->query("execute sp_Gestionar_ETEspecialistaTarea @opcion='asignarPersonal', @idEspecialistaTarea=$idEspecialistaTarea, @idPerReq=$idPerReq");

		return true;
	}
}