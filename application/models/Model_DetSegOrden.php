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
	public function valorizadaActual($idDetallePartida, $mesActual)
	{
		$data= $this->db->query("select Datepart(mm,dv.fecha_dia) as mesActual,dv.id_detalle_partida,sum(dv.cantidad) as metrado, sum(dv.sub_total) as valorizado from DET_SEG_VALORIZACION dv where dv.id_detalle_partida = $idDetallePartida and Datepart(mm,dv.fecha_dia)= $mesActual group by Datepart(mm,dv.fecha_dia),dv.id_detalle_partida");
		return $data->result();

	}
	public function valorizadoAnterior($idDetallePartida, $mesPasado)
	{
		/*$data = $this->db->query("select dv.id_detalle_partida,sum(dv.cantidad) as metradoAnterior, sum(dv.sub_total) as valorizadoAnterior from DET_SEG_VALORIZACION dv inner join ET_DETALLE_PARTIDA dp on dv.id_detalle_partida=dp.id_detalle_partida inner join ET_PARTIDA p on dp.id_partida = p.id_partida inner join ET_META m on p.id_meta = m.id_meta inner join ET_COMPONENTE c on m.id_componente= c.id_componente inner join ET_EXPEDIENTE_TECNICO et on c.id_et = et.id_et where dv.id_detalle_partida = $idDetallePartida and Datepart(mm,dv.fecha_dia) BETWEEN  Datepart(mm,et.fecha_inicio_et) and $mesPasado group by dv.id_detalle_partida ");*/
		$data = $this->db->query("select dv.id_detalle_partida,sum(dv.cantidad) as metradoAnterior, sum(dv.sub_total) as valorizadoAnterior from DET_SEG_VALORIZACION dv inner join ET_DETALLE_PARTIDA dp on dv.id_detalle_partida=dp.id_detalle_partida inner join ET_PARTIDA p on dp.id_partida = p.id_partida inner join ET_META m on p.id_meta = m.id_meta inner join ET_COMPONENTE c on m.id_componente= c.id_componente inner join ET_EXPEDIENTE_TECNICO et on c.id_et = et.id_et where dv.id_detalle_partida = $idDetallePartida and dv.fecha_dia BETWEEN  et.fecha_inicio_et and '".$mesPasado ."' group by dv.id_detalle_partida ");
		return $data->result();
	}
	public function sumatoriaValorizacion()
	{
		$data = $this->db->query("select ds.id_detalle_partida, sum(ds.cantidad) as cantidad from ET_DETALLE_PARTIDA dp inner join DET_SEG_VALORIZACION ds on dp.id_detalle_partida=ds.id_detalle_partida group by(ds.id_detalle_partida)");
		return $data->result();
	}
	public function PartidasEjecutadasPeriodo($mesActual)
	{
		$data =  $this->db->query("select p.numeracion, dp.id_detalle_partida, p.desc_partida,um.descripcion, sum( ds.cantidad) as cantidad from DET_SEG_VALORIZACION ds inner join ET_DETALLE_PARTIDA dp on ds.id_detalle_partida=dp.id_detalle_partida inner join ET_PARTIDA p on dp.id_partida = p.id_partida inner join UNIDAD_MEDIDA um on dp.id_unidad = um.id_unidad where Datepart(mm,ds.fecha_dia) = $mesActual group by p.numeracion, dp.id_detalle_partida, p.desc_partida,um.descripcion");
		return $data->result();
	}
}
