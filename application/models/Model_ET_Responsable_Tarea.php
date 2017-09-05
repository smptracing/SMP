<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Responsable_Tarea extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ETResponsableTareaPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_RESPONSABLE_TAREA where id_tarea_et=".$idTareaET);

		return $data->result();
	}
}
?>