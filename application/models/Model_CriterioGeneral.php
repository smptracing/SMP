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
		$data=$this->db->query("select * from CRITERIO_GEN inner join FUNCION on CRITERIO_GEN.id_funcion=FUNCION.id_funcion");

		return $data->result();
	}

}