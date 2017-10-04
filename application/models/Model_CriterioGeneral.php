<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_criterioGeneral extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	function CriteriosGenerales()
	{
		$data=$this->db->query("select * from CRITERIO_GEN");

		return $data->result();
	}

}