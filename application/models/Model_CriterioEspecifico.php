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
		$opcion="ListarCriteriosEspecificos";
		$data=$this->db->query("execute sp_Gestionar_CriterioEspecifico  @opcion='".$opcion."',@id_criterio_gen=$id_criterio_gen");

		return $data->result();
	}
	

}