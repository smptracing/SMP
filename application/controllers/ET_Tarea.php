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

			foreach($tareas as $key => $value)
			{
				$value->start=date("Y-m-d H:i:s", ($value->start/1000));
				$value->end=date("Y-m-d H:i:s", ($value->end/1000));

				
			}

			echo json_encode(['Correcto' => 'Actividades guardadas correctamente.']);exit;
		}
	}
}
?>