<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Meta extends CI_Model
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
}