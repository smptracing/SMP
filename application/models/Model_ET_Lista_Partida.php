<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Lista_Partida extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ETListaPartidaPorDescListaPartida($valueSearch)
	{
		$data=$this->db->query("select * from ET_LISTA_PARTIDA where replace(desc_lista_partida, ' ', '') like '%'+replace('".$valueSearch."', ' ', '')+'%'");

		return $data->result();
	}
}
?>