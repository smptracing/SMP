<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Per_Req extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idPersona, $idEsp, $idET, $fechaDesign, $craet)
	{
		$this->db->query("exec sp_Gestionar_ETPERREQ @opcion='insertar', @idPersona=$idPersona, @idEsp=$idEsp, @idET=$idET, @fechaDesign=$fechaDesign, @craet=$craet");

		return true;
	}

	function ETPerReqPorIdET($idET)
	{
		$data=$this->db->query("select * from ET_PER_REQ as etpr inner join ESPECIALIDAD as e on etpr.id_esp=e.id_esp left join PERSONA as p on etpr.id_persona=p.id_persona where etpr.id_et=$idET");

		return $data->result();
	}

	function ultimoETPerReq()
	{
		$data=$this->db->query("select * from ET_PER_REQ where id_per_req=(select max(id_per_req) from ET_PER_REQ)");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function eliminar($idPerReq)
	{
		$this->db->query("delete from ET_PER_REQ where id_per_req=$idPerReq");

		return true;
	}
}