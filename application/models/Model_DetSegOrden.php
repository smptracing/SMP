<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_DetSegOrden extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	/*public function insertar($idPartida,$numeroOrden,$concepto)
	{
		$this->db->query("insert into DET_SEG_ORDEN (id_partida,nro_orden,desc_det_seg_orden) values ('".$idPartida."','".$numeroOrden."','".$concepto."') ");
		return true;
	}*/
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
	public function listarOrdenPorPartida($idPartida)
	{
		$data = $this->db->query("select * from DET_SEG_ORDEN where id_partida=$idPartida");
		return $data->result();
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

	public function eliminar($id_detSegValorizacion)
	{
		$data = $this->db->query("exec sp_Gestionar_Det_Seg_Valorizacion @Opcion = 'D', @id_det_seg_valorizacion =$id_detSegValorizacion");
		return true;
	}
	public function valorizadaActual($idDetallePartida)
	{
		$data= $this->db->query("select Datepart(mm,dv.fecha_dia) as mesActual,dv.id_detalle_partida,sum(dv.cantidad) as metrado, sum(dv.sub_total) as valorizado from DET_SEG_VALORIZACION dv where dv.id_detalle_partida = $idDetallePartida and Datepart(mm,dv.fecha_dia)= '10' group by Datepart(mm,dv.fecha_dia),dv.id_detalle_partida ");
		return $data->result();

	}
}
