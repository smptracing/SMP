<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Actividad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_ACTIVIDAD',$data);
		return $this->db->affected_rows();
	}
}