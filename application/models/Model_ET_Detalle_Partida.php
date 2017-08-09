<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Detalle_Partida extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idPartida, $idUnidad, $idEtapaET, $rendimiento, $cantidad, $precioUnitario, $parcial, $estado)
	{
		$this->db->query("execute sp_Gestionar_ETDetallePartida 'insertar', ".$idPartida.", ".$idUnidad.", ".$idEtapaET.", '".$rendimiento."', ".$cantidad.", ".$precioUnitario.", ".$parcial.", ".$estado);

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_detalle_partida) as idDetallePartida from ET_DETALLE_PARTIDA");

		return $data->result()[0]->idDetallePartida;
	}
}