<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Levantamiento_Obs extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Observacion_Tarea');
		$this->load->model('Model_ET_Levantamiento_Obs');
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
				$idObservacionTarea=$this->input->post('idObservacionTarea');
				$descLevObs=$this->input->post('descLevObs');
				$fechaLevObs=date('Y-m-d H:i:s');

				$etEspecialistaTarea=$this->Model_ET_Especialista_Tarea->EspecialistaTareaPorIdTareaYIdPersona($idTareaET, $idPersonaTemp);

				if($etEspecialistaTarea==null)
				{
					$this->db->trans_rollback();

					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ud. no puede responder esta observación porque no fuiste asignado a esta actividad.']);exit;
				}

				$this->Model_ET_Levantamiento_Obs->insertar($etEspecialistaTarea->id_especialista_tarea, $idObservacionTarea, $descLevObs, $fechaLevObs, '');

				$ultimoETLevantamientoObs=$this->Model_ET_Levantamiento_Obs->ultimoETLevantamientoObs();

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Respuesta publicada correctamente.', 'etLevantamientoObs' => $ultimoETLevantamientoObs]);exit;
			}
		}
	}

	public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				$idPersonaTemp=$this->session->userdata('idPersona');

				$idLevantamientoObs=$this->input->post('idLevantamientoObs');

				if($this->Model_ET_Levantamiento_Obs->ETLevantamientoObsPorIdLevantamientoObsYIdPersona($idLevantamientoObs, $idPersonaTemp)==null)
				{
					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ud. no tiene autorización para borrar esta respuesta.']);exit;
				}

				$this->Model_ET_Levantamiento_Obs->eliminar($idLevantamientoObs);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Respuesta eliminada correctamente.']);exit;
			}
		}
	}
}
?>