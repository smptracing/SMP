<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_CriterioEspecifico extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	function ListarCriterioEspecifico($id_criterio_gen)
	{
		$data=$this->db->query("select id_criterio,nombre_criterio ,peso,(peso*100)/(select sum(cri.peso) from CRITERIO_ESP as cri  where id_criterio_gen=$id_criterio_gen) as  porcentaje from CRITERIO_ESP
			where id_criterio_gen=$id_criterio_gen");

		return $data->result();
	}
	

}