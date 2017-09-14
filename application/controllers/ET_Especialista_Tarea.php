<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Especialista_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Especialista_Tarea');
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
				$idTareaET=$this->input->post('idTareaET');

				$this->Model_ET_Especialista_Tarea->insertar('NULL', $idTareaET, $idEspecialidad);

				$etEspecialistaTareaTemp=$this->Model_ET_Especialista_Tarea->ultimoETEspecialistaTarea();

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idEspecialistaTarea' => $etEspecialistaTareaTemp->id_especialista_tarea]);exit;
			}

			$idTareaET=$this->input->get('idTareaET');
			$idET=$this->input->get('idET');

			$listaEspecialidad=$this->Model_Especialidad->ListarEspecialidad();
			$listaEspecialistaTarea=$this->Model_ET_Especialista_Tarea->ETEspecialistaTareaPorIdTareaET($idTareaET);
			$listaETPerReq=$this->Model_ET_Per_Req->ETPerReqPorIdETParaAsignPersTarea($idET);

			return $this->load->view('front/Ejecucion/ETEspecialistaTarea/insertar', ['listaEspecialidad' => $listaEspecialidad, 'listaEspecialistaTarea' => $listaEspecialistaTarea, 'idTareaET' => $idTareaET, 'listaETPerReq' => $listaETPerReq]);
		}
	}

	public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idEspecialistaTarea=$this->input->post('idEspecialistaTarea');

				$this->Model_ET_Especialista_Tarea->eliminar($idEspecialistaTarea);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos eliminados correctamente.']);exit;
			}
		}
	}

	public function asignarPersonal()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start(); 
				
				$idEspecialistaTarea=$this->input->post('idEspecialistaTarea');
				$idPerReq=$this->input->post('idPerReq');

				$this->Model_ET_Especialista_Tarea->asignarPersonal($idEspecialistaTarea, $idPerReq);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Personal asignado correctamente.']);exit;
			}
		}
	}
}