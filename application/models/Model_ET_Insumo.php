<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Insumo extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ETInsumoPorDescInsumo($valueSearch)
	{
		$data=$this->db->query("select * from ET_INSUMO where replace(desc_insumo, ' ', '') like '%'+replace('".$valueSearch."', ' ', '')+'%'");

		return $data->result();
	}
}
?>