<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Observacion_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Observacion_Tarea');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Observación realizada correctamente.']);exit;
			}

			$idTareaET=$this->input->get('idTareaET');

			return $this->load->view('front/Ejecucion/ETObservacionTarea/insertar', ['idTareaET' => $idTareaET]);
		}
	}
}
?>