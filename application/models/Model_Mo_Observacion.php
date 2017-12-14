<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Observacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($observacion)
	{
		$this->db->insert('MO_OBSERVACION',$observacion);
		return $this->db->insert_id();
	}

	function listaObservacion($idMonitoreo)
	{
		$this->db->select('MO_OBSERVACION.*');
		$this->db->from('MO_OBSERVACION');
		$this->db->where('MO_OBSERVACION.id_monitoreo',$idMonitoreo);
		return $this->db->get()->result();
	}
}