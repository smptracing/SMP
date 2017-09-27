<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Detalle_Partida extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idPartida, $idUnidad, $idEtapaET, $rendimiento, $cantidad, $precioUnitario, $estado)
	{
		$this->db->query("execute sp_Gestionar_ETDetallePartida 'insertar', ".$idPartida.", ".$idUnidad.", ".$idEtapaET.", '".$rendimiento."', ".$cantidad.", ".$precioUnitario.", ".$estado);

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_detalle_partida) as idDetallePartida from ET_DETALLE_PARTIDA");

		return $data->result()[0]->idDetallePartida;
	}

	function ultimoETDetallePartida()
	{
		$data=$this->db->query("select * from ET_DETALLE_PARTIDA where id_detalle_partida=(select max(id_detalle_partida) from ET_DETALLE_PARTIDA) and estado=1");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function ETDetallePartidaPorIdPartidaAndIdEtapaET($idPartida, $idEtapaET)
	{
		$data=$this->db->query("select * from ET_DETALLE_PARTIDA where id_partida=".$idPartida." and id_etapa_et=".$idEtapaET." and estado=1");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function CostoDetallePartida($id_analitico)
	{
		$data=$this->db->query("select ET_ANALISIS_UNITARIO.id_analitico,sum(parcial) as costoDirecto from ET_ANALISIS_UNITARIO right  JOIN ET_DETALLE_PARTIDA ON 
								ET_ANALISIS_UNITARIO.id_detalle_partida=ET_DETALLE_PARTIDA.id_detalle_partida 
								WHERE   id_analitico='".$id_analitico."'  GROUP BY ET_ANALISIS_UNITARIO.id_analitico");
		return $data->result();
	}

	function ETDetallePartidaPorIdPartida($idPartida)
	{
		$data=$this->db->query("select * from ET_DETALLE_PARTIDA where id_partida=".$idPartida." and estado=1");

		return $data->result();
	}

	function ETDetallePartidaPorIdPartidaParaValorizacion($idPartida)
	{
		$data=$this->db->query("select * from ET_DETALLE_PARTIDA where id_partida=".$idPartida." and estado=1");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function ETDetallePartidaPorIdPartidaMontoff05($id_meta)
	{
		$data=$this->db->query("select sum (ET_DETALLE_PARTIDA.parcial)as parcial from ET_PARTIDA inner join ET_DETALLE_PARTIDA ON ET_PARTIDA.id_partida=ET_DETALLE_PARTIDA.id_partida where id_meta=".$id_meta." and estado=1");

		return $data->result();
	}
}