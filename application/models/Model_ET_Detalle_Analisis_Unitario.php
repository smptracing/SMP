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
}