<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Comentario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Comentario');
		$this->load->model('Model_ET_Especialista_Tarea');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				$idPersonaTemp=$this->session->userdata('idPersona');

				$idTareaET=$this->input->post('idTareaET');
				$descComentario=$this->input->post('descComentario');
				$fechaComentario=date('Y-m-d H:i:s');

				$etEspecialistaTarea=$this->Model_ET_Especialista_Tarea->EspecialistaTareaPorIdTareaYIdPersona($idTareaET, $idPersonaTemp);

				if($etEspecialistaTarea==null)
				{
					$this->db->trans_rollback();

					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ud. no puede realizar comentarios porque no fue asignado a esta actividad.']);exit;
				}

				$this->Model_ET_Comentario->insertar($idTareaET, $etEspecialistaTarea->id_especialista_tarea, $descComentario, $fechaComentario);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Comentario realizado correctamente.']);exit;
			}

			$idTareaET=$this->input->get('idTareaET');

			return $this->load->view('front/Ejecucion/ETComentario/insertar', ['idTareaET' => $idTareaET]);
		}
	}
}
?>