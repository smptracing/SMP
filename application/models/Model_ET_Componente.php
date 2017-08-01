<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Componente extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idET, $descripcion)
	{
		$this->db->query("execute sp_Gestionar_ETComponente 'insertar', '".$idET."', '".$descripcion."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_componente) as idComponente from ET_COMPONENTE");

		return $data->result()[0]->idComponente;
	}

	public function ETComponentePorIdET($idExpedienteTecnico)
	{
		$data=$this->db->query("select * from ET_COMPONENTE where id_et='".$idExpedienteTecnico."'");

		return $data->result();
	}
}