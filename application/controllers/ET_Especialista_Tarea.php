<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Especialista_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Especialista_Tarea');
		$this->load->model('Model_Especialidad');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				
			}

			$idTareaET=$this->input->get('idTareaET');

			$listaEspecialidad=$this->Model_Especialidad->ListarEspecialidad();
			$listaEspecialistaTarea=$this->Model_ET_Especialista_Tarea->ETEspecialistaTareaPorIdTareaET($idTareaET);

			return $this->load->view('front/Ejecucion/ETEspecialistaTarea/insertar', ['listaEspecialidad' => $listaEspecialidad, 'listaEspecialistaTarea' => $listaEspecialistaTarea]);
		}
	}
}