<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Per_Req extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Especialidad');
		$this->load->model('Model_ET_Per_Req');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idEspecialidad=$this->input->post('idEspecialidad');
				$idET=$this->input->post('idET');

				$this->Model_ET_Per_Req->insertar('NULL', $idEspecialidad, $idET, 'NULL', 0);

				$etPerReqTemp=$this->Model_ET_Per_Req->ultimoETPerReq();

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idPerReq' => $etPerReqTemp->id_per_req]);exit;
			}

			$idET=$this->input->get('idExpedienteTecnico');

			$listaEspecialidad=$this->Model_Especialidad->ListarEspecialidad();

			return $this->load->view('front/Ejecucion/ETPerReq/insertar', ['listaEspecialidad' => $listaEspecialidad, 'idET' => $idET]);
		}
	}
}