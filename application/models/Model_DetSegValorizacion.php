<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_DetSegValorizacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*public function insertar($fecha, $cantidad, $subtotal, $fechadia, $idDetallePartida)
	{
		$this->db->query("insert into DET_SEG_VALORIZACION (fecha,cantidad,sub_total,fecha_dia,id_detalle_partida) values ('".$fecha."','".$cantidad."','".$subtotal."','".$fechadia."','".$idDetallePartida."') ");
		return true;
	}*/
	public function insertar($fecha, $cantidad, $subtotal, $fechadia, $idDetallePartida)
	{
		$this->db->query("exec sp_Gestionar_Det_Seg_Valorizacion @Opcion = 'C', @fecha = '".$fecha."', @cantidad = .$cantidad, @sub_total = $subtotal, @fecha_dia = '".$fechadia."', @id_detalle_partida = $idDetallePartida");
		return true;
	}
}
?>