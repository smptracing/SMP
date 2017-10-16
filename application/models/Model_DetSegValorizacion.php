<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_DetSegValorizacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function insertar($fecha, $cantidad, $subtotal, $fechadia, $idDetallePartida)
	{
		$this->db->query("exec sp_Gestionar_Det_Seg_Valorizacion @Opcion = 'C', @fecha = '".$fecha."', @cantidad = $cantidad, @sub_total = $subtotal, @fecha_dia = '".$fechadia."', @id_detalle_partida = $idDetallePartida");
		return true;
	}
	public function listarValorizacionPorDetallePartida($idDetallePartida)
	{
		$data = $this->db->query("select * from DET_SEG_VALORIZACION where id_detalle_partida = $idDetallePartida");
		return $data->result();
	}
}
?>