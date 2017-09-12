<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Especialidad_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Especialidad_Tarea');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			$this->db->trans_start();

			$idEspecialidad=$this->input->post('idEspecialidad');
			$idTareaET=$this->input->post('idTareaET');

			/*if(count($this->Model_ET_Componente->ETComponentePorIdETAndDescripcion($idET, $descripcionComponente))>0)
			{
				$this->db->trans_rollback();

				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo componente.']);exit;
			}*/

			$this->Model_Especialidad_Tarea->insertar($idEspecialidad, 'NULL', $idTareaET);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Especialidad asignada a esta actividad correctamente.']);exit;
		}
	}
}