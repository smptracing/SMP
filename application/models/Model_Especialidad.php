<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Especialidad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ListarEspecialidad()
	{
		$data=$this->db->query("select * from ESPECIALIDAD order by (nombre_esp)");

		return $data->result();
	}
}