<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Detalle_Analisis_Unitario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
		$this->load->model('Model_Unidad_Medida');
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

		if($this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisisAndDescDetalleAnalisis($idAnalisis, $descripcion)!=null)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo detalle de análisis.']);exit;
		}

		$this->Model_ET_Detalle_Analisis_Unitario->insertar($idAnalisis, $idUnidad, $descripcion, $cuadrilla, $cantidad, $precioUnitario, $rendimiento);

		$idDetalleAnalisisUnitario=$this->Model_ET_Detalle_Analisis_Unitario->ultimoId();

		$unidadMedida=$this->Model_Unidad_Medida->UnidadMedida($idUnidad);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Detalle de análisis registrado correctamente.', 'idDetalleAnalisisUnitario' => $idDetalleAnalisisUnitario, 'nombreUnidadMedida' => $unidadMedida[0]->descripcion]);exit;
	}

	public function eliminar()
	{
		$this->db->trans_start();

		$idDetalleAnalisisUnitario=$this->input->post('idDetalleAnalisisUnitario');

		$this->Model_ET_Detalle_Analisis_Unitario->eliminar($idDetalleAnalisisUnitario);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Detalle de análisis eliminado correctamente.']);exit;
	}
}