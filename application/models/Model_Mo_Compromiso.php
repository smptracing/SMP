<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Compromiso extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_COMPROMISO',$data);
		return $this->db->insert_id();
	}

	function listaCompromiso($idObservacion)
	{
		$this->db->select('MO_COMPROMISO.*');
		$this->db->from('MO_COMPROMISO');
		$this->db->where('MO_COMPROMISO.id_observacion',$idObservacion);
		return $this->db->get()->result();
	}
}