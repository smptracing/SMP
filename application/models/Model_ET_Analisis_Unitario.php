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

	function ETAnalisisUnitarioPorIdDetallePartida($idDetallePartida)
	{
		$data=$this->db->query("select * from ET_ANALISIS_UNITARIO as ETAU inner join ET_RECURSO as ETR on ETAU.id_recurso=ETR.id_recurso where id_detalle_partida=".$idDetallePartida);

		return $data->result();
	}

	function ETAnalisisUnitarioPorIdPartidaFromDetallePartida($idPartida)
	{
		$data=$this->db->query("select * from ET_ANALISIS_UNITARIO as etau inner join ET_DETALLE_PARTIDA as etdp on etau.id_detalle_partida=etdp.id_detalle_partida where etdp.id_partida=".$idPartida." and etau.id_analitico is null");

		return $data->result();
	}

	function ETAnalisisUnitarioPorIdDetallePartidaAndIdRecurso($idDetallePartida, $idRecurso)
	{
		$data=$this->db->query("select * from ET_ANALISIS_UNITARIO where id_detalle_partida=".$idDetallePartida." and id_recurso=".$idRecurso);

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function eliminar($idAnalisis)
	{
		$this->db->query("delete from ET_ANALISIS_UNITARIO where id_analisis=".$idAnalisis);

		return true;
	}

	function actualizarAnalitico($idAnalisis, $idAnalitico)
	{
		$this->db->query("update ET_ANALISIS_UNITARIO set id_analitico=".$idAnalitico." where id_analisis=".$idAnalisis);

		return true;
	}
}