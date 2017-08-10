<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Detalle_Analisis_Unitario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idAnalisis, $idUnidad, $descripcionDetalleAnalisis, $cuadrilla, $cantidad, $precioUnitario, $precioParcial, $rendimiento)
	{
		$this->db->query("execute sp_Gestionar_ETDetalleAnalisisUnitario 'insertar', ".$idAnalisis.", ".$idUnidad.", '".$descripcionDetalleAnalisis."', '".$cuadrilla."', ".$cantidad.", ".$precioUnitario.", ".$precioParcial.", '".$rendimiento."'");

		return true;
	}

	function ETDetalleAnalisisUnitarioPorIdAnalisis($idAnalisis)
	{
		$data=$this->db->query("select * from ET_DETALLE_ANALISIS_UNITARIO as ETDAU inner join UNIDAD_MEDIDA as UM on ETDAU.id_unidad=UM.id_unidad where id_analisis=".$idAnalisis);

		return $data->result();
	}
}