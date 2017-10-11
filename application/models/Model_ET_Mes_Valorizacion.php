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

	function ETMesValorizacionReporte($id_et)
	{
		$data=$this->db->query("select  mv.numero_mes, SUM(precio) as sumatotal  from ET_MES_VALORIZACION mv
		inner join ET_DETALLE_PARTIDA dp on dp.id_detalle_partida=mv.id_detalle_partida inner join ET_PARTIDA p
		on dp.id_partida = p.id_partida inner join ET_META m on p.id_meta=m.id_meta inner join ET_COMPONENTE c
		on m.id_componente=c.id_componente inner join ET_EXPEDIENTE_TECNICO et on et.id_et = c.id_et
		where et.id_et=$id_et
		group by mv.numero_mes");

		return $data->result();
	}


	function ETMesValorizacionPorIdDetallePartidaAndNumeroMes($idDetallePartida, $numeroMes)
	{
		$data=$this->db->query("select * from ET_MES_VALORIZACION where id_detalle_partida=$idDetallePartida and numero_mes=$numeroMes");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function editarCantidadYPrecio($idMesValorizacion, $cantidad, $precio)
	{
		$this->db->query("execute sp_Gestionar_ETMesValorizacion @opcion='editarCantidadYPrecio', @idMesValorizacion=$idMesValorizacion, @cantidad=$cantidad, @precio=$precio");

		return true;
	}

	function sumPrecioPorIdDetallePartida($idDetallePartida)
	{
		$data=$this->db->query("select sum(precio) as sumatoriaPrecio from ET_MES_VALORIZACION where id_detalle_partida=$idDetallePartida");

		return $data->result()[0]->sumatoriaPrecio;
	}
}