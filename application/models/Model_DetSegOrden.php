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
	public function listarAcumuladoMeta($codigo_unico)
	{
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='listar_acumulado_meta', @codigo_snip ='".$codigo_unico."'");
        return $data->result();    
	}
	public function buscarOrden($anio,$ultimaMeta,$txtOrden)
	{
        $data = $this->db->query("execute sp_Gestionar_SIGA @opcion='listar_orden_proyecto', @anio_meta=$anio, @correlativo_meta=$ultimaMeta, @num_orden = $txtOrden");
        return $data->result();


	}
}
?>