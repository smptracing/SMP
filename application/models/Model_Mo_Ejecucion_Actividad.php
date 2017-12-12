<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Ejecucion_Actividad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_EJECUCION_ACTIVIDAD',$data);
		return $this->db->insert_id();
	}
}