<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Monitoreo extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_MONITOREO',$data);
		return $this->db->insert_id();
	}

	function listaMonitoreo($idEjecucion)
	{
		$this->db->select('MO_MONITOREO.*');
		$this->db->from('MO_MONITOREO');
		$this->db->where('MO_MONITOREO.id_ejecucion',$idEjecucion);
		return $this->db->get()->result();
	}
	function editar($data, $idMonitoreo)
	{
		$this->db->set($data);
		$this->db->where('id_monitoreo', $idMonitoreo);
		$this->db->update('MO_MONITOREO');
		return $this->db->affected_rows();
	}
	function eliminar($idMonitoreo)
	{
		$this->db->where('id_monitoreo', $idMonitoreo);
		$this->db->delete('MO_MONITOREO');
		return $this->db->affected_rows();
	}
}