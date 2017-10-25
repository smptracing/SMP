<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Detalle_Analisis_Unitario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idAnalisis, $idUnidad, $descripcionDetalleAnalisis, $cuadrilla, $cantidad, $precioUnitario, $rendimiento)
	{
		$this->db->query("execute sp_Gestionar_ETDetalleAnalisisUnitario 'insertar', ".$idAnalisis.", ".$idUnidad.", '".$descripcionDetalleAnalisis."', '".$cuadrilla."', ".$cantidad.", ".$precioUnitario.", '".$rendimiento."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_detalle_analisis_u) as idDetalleAnalisisUnitario from ET_DETALLE_ANALISIS_UNITARIO");

		return $data->result()[0]->idDetalleAnalisisUnitario;
	}

	function ETDetalleAnalisisUnitarioPorIdAnalisis($idAnalisis)
	{
		$data=$this->db->query("select * from ET_DETALLE_ANALISIS_UNITARIO as ETDAU left join UNIDAD_MEDIDA as UM on ETDAU.id_unidad=UM.id_unidad where id_analisis=".$idAnalisis);

		return $data->result();
	}

	public function ETDetalleAnalisisUnitarioPorIdAnalisisAndDescDetalleAnalisis($idAnalisis, $descripcion)
	{
		$data=$this->db->query("select * from ET_DETALLE_ANALISIS_UNITARIO where id_analisis='".$idAnalisis."' and replace(desc_detalle_analisis, ' ', '')=replace('".$descripcion."', ' ', '')");

		return count($data->result())==0 ? null : $data->result()[0];
	}

	function eliminar($idDetalleAnalisisUnitario)
	{
		$this->db->query("delete from ET_DETALLE_ANALISIS_UNITARIO where id_detalle_analisis_u=".$idDetalleAnalisisUnitario);

		return true;
	}
}