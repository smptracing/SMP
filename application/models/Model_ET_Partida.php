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
		$data=$this->db->query("select ETP.id_partida, ETP.id_meta, ETP.desc_partida, ETP.rendimiento, ETP.cantidad, UM.id_unidad, UM.descripcion from ET_PARTIDA as ETP inner join UNIDAD_MEDIDA as UM on ETP.id_unidad=UM.id_unidad where id_meta='".$idMeta."'");

		return $data->result();
	}

	public function ETPartidaPorIdMetaAndDescPartida($idMeta, $descripcion)
	{
		$data=$this->db->query("select * from ET_PARTIDA where id_meta='".$idMeta."' and replace(desc_partida, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $data->result();
	}

	function eliminar($idPartida)
	{
		$this->db->query("delete from ET_PARTIDA where id_partida=".$idPartida);

		return true;
	}

	function eliminarPorIdMeta($idMeta)
	{
		$this->db->query("delete from ET_PARTIDA where id_meta=".$idMeta);

		return true;
	}
}