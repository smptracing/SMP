<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Analisis_Unitario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idAnalitico, $idRecurso, $idDetallePartida)
	{
		$this->db->query("execute sp_Gestionar_ETAnalisisUnitario 'insertar', ".$idAnalitico.", ".$idRecurso.", ".$idDetallePartida);

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_analisis) as idAnalisis from ET_ANALISIS_UNITARIO");

		return $data->result()[0]->idAnalisis;
	}
}