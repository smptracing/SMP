<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Componente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Componente');
	}

	public function insertar()
	{
		if($_POST)
		{
			$idET=$this->input->post('idET');
			$descripcionComponente=$this->input->post('descripcionComponente');

			$this->Model_ET_Componente->insertar($idET, $descripcionComponente);

			$ultimoIdComponente=$this->Model_ET_Componente->ultimoId();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Componente registrado correctamente.', 'idComponente' => $ultimoIdComponente]);exit;
		}

		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

		$this->load->view('front/Ejecucion/ETComponente/insertar.php', ['listaUnidadMedida' => $listaUnidadMedida]);
	}
}