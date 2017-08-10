<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Detalle_Analisis_Unitario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
	}

	public function insertar()
	{
		$this->db->trans_start();

		$idAnalisis=$this->input->post('idAnalisis');
		$descripcion=$this->input->post('descripcionDetalleAnalisis');
		$cuadrilla=$this->input->post('cuadrilla');
		$idUnidad=$this->input->post('idUnidad');
		$rendimiento=$this->input->post('rendimiento');
		$cantidad=$this->input->post('cantidad');
		$precioUnitario=$this->input->post('precioUnitario');
		$precioParcial=$this->input->post('precioParcial');

		if(count($this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisisAndDescDetalleAnalisis($idAnalisis, $descripcion))>0)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo detalle de análisis.']);exit;
		}

		$this->Model_ET_Detalle_Analisis_Unitario->insertar($idAnalisis, $idUnidad, $descripcion, $cuadrilla, $cantidad, $precioUnitario, $precioParcial, $rendimiento);

		$ultimoIdDetalleAnalisisUnitario=$this->Model_ET_Detalle_Analisis_Unitario->ultimoId();

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Componente registrado correctamente.', 'ultimoIdDetalleAnalisisUnitario' => $ultimoIdDetalleAnalisisUnitario]);exit;
	}
}