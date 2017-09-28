<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UF_ModuloEntregable extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Especialidad');
		$this->load->model('Model_UF_Req_Personal_Estudio');
		$this->load->model('Model_Personal');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idPerReq' => $etPerReqTemp->id_req_per]);exit;
			}

			$id_est_inv=$this->input->get('id_est_inv');
			$DetallEstudioInversion=$this->Model_UF_Req_Personal_Estudio->listaIndependienteEstudio($id_est_inv);

			return $this->load->view('front/Formulacion_Evaluacion/UfModuloEntregable/insertar',['nombre_estudio_inv' => $DetallEstudioInversion->nombre_estudio_inv ]);
		}
	}

	
}