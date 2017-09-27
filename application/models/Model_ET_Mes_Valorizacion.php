<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Mes_Valorizacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idDetallePartida, $idValorizacion, $numeroMes, $cantidad, $precio)
	{
		$this->db->query("execute sp_Gestionar_ETMesValorizacion @opcion='insertar', @idDetallePartida=$idDetallePartida, @idValorizacion=$idValorizacion, @numeroMes=$numeroMes, @cantidad=$cantidad, @precio=$precio");

		return true;
	}

	function ETMesValorizacionPorIdDetallePartida($idDetallePartida)
	{
		$data=$this->db->query("select * from ET_MES_VALORIZACION where id_detalle_partida=$idDetallePartida");

		return $data->result();
	}
}