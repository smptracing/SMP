<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Partida extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idMeta, $idUnidad, $descripcion, $rendimiento, $cantidad)
	{
		$this->db->query("execute sp_Gestionar_ETPartida 'insertar', '".$idMeta."', '".$idUnidad."', '".$descripcion."', '".$rendimiento."', '".$cantidad."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_partida) as idPartida from ET_PARTIDA");

		return $data->result()[0]->idPartida;
	}

	public function ETPartidaPorIdMeta($idMeta)
	{
		$data=$this->db->query("select * from ET_PARTIDA where id_meta='".$idMeta."'");

		return $data->result();
	}
}