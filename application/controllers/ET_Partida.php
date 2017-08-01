<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Partida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_ET_Partida');
		$this->load->model('Model_Unidad_Medida');
	}

	public function insertar()
	{
		if($_POST)
		{
			$idMeta=$this->input->post('idMeta');
			$idUnidad=$this->input->post('idUnidad');
			$descripcionPartida=$this->input->post('descripcionPartida');
			$rendimientoPartida=$this->input->post('rendimientoPartida');
			$cantidadPartida=$this->input->post('cantidadPartida');

			$this->Model_ET_Partida->insertar($idMeta, $idUnidad, $descripcionPartida, $rendimientoPartida, $cantidadPartida);
			$unidadMedida=$this->Model_Unidad_Medida->UnidadMedida($idUnidad)[0];

			$ultimoIdPartida=$this->Model_ET_Partida->ultimoId();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Partida registrada correctamente.', 'idPartida' => $ultimoIdPartida, 'descripcionUnidadMedida' => $unidadMedida->descripcion]);exit;
		}

		$this->load->view('Front/Ejecucion/ETPartida/insertar');
	}
}