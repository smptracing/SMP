<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_DetSegOrden extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idPartida,$numeroOrden,$concepto)
	{
		$this->db->query("insert into DET_SEG_ORDEN (id_partida,nro_orden,desc_det_seg_orden) values ('".$idPartida."','".$numeroOrden."','".$concepto."') ");
		return true;
	}
}
?>