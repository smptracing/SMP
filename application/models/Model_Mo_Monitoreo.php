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

}