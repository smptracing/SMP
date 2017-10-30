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
	function PartidaporAnalitico($idAnalisis)
	{
		$data=$this->db->query("select p.id_partida from ET_ANALISIS_UNITARIO au inner join ET_DETALLE_PARTIDA dp on au.id_detalle_partida=dp.id_detalle_partida inner join ET_PARTIDA p on dp.id_partida=p.id_partida where au.id_analisis=$idAnalisis");
		return $data->result()[0];
	}
	function partidaAnaliticoEt($idAnalisis)
	{
		$data=$this->db->query("select * from ET_ANALISIS_UNITARIO a inner join ET_DETALLE_PARTIDA dp on a.id_detalle_partida=dp.id_detalle_partida inner join ET_PARTIDA p on dp.id_partida = p.id_partida where a.id_analisis = $idAnalisis");
		return $data->result()[0];
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_detalle_partida) as idDetallePartida from ET_DETALLE_PARTIDA");

		return $data->result()[0]->idDetallePartida;
	}

	function ETDetallePartida($idDetallePartida)
	{
		$data=$this->db->query("select * from ET_DETALLE_PARTIDA where id_detalle_partida=$idDetallePartida");

		return count($data->result())==0 ? null : $data->result()[0];
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

	function ETPDetallePartida($idDetallePartida)
	{
		/*$data=$this->db->query("select et.id_et, p.id_partida,dp.id_detalle_partida, p.desc_partida, dp.precio_unitario,dp.cantidad from ET_PARTIDA p inner join ET_DETALLE_PARTIDA dp on p.id_partida= dp.id_partida inner join ET_META m on p.id_meta=m.id_meta left join ET_COMPONENTE c on m.id_componente=c.id_componente left join ET_EXPEDIENTE_TECNICO et on c.id_et = et.id_et  where dp.id_detalle_partida=$idDetallePartida");*/
		$data=$this->db->query("select p.id_partida,dp.id_detalle_partida, p.desc_partida, dp.precio_unitario,dp.cantidad from ET_PARTIDA p inner join ET_DETALLE_PARTIDA dp on p.id_partida= dp.id_partida where dp.id_detalle_partida=$idDetallePartida");
		return $data->result()[0];
	}

	public function updateCantidaDetallePartida($idPartida, $cantidad )
	{
		$this->db->query("update ET_DETALLE_PARTIDA set cantidad=$cantidad where id_partida=$idPartida");

		return true;
	}

}