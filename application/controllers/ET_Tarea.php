<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_TAREA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		//$this->load->model('Model');
	}

	public function insertarBloque()
	{
		if($this->input->is_ajax_request())
		{
			$tareas=json_decode($this->input->post('tareas'));

			var_dump($tareas);exit;

			echo json_encode(['Correcto' => 'Actividades guardadas correctamente.']);exit;
		}
	}
}
?>