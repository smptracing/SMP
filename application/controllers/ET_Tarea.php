<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_TAREA extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Tarea');
	}

	public function index()
	{
		return $this->load->view('Front/Ejecucion/ETTareaGantt/index');
	}

	public function insertarBloque()
	{
		if($this->input->is_ajax_request())
		{
			$this->db->trans_start();

			$idTareaGantt=$this->input->post('idTareaGantt');

			$tareas=json_decode($this->input->post('tareas'));

			$this->Model_ET_Tarea->eliminarETTareaPorIdTareaGantt($idTareaGantt);

			foreach($tareas as $key => $value)
			{
				$predecesoraTarea='NULL';

				$value->start=date("Y-m-d H:i:s", ($value->start/1000));
				$value->end=date("Y-m-d H:i:s", ($value->end/1000));

				if($value->level!=0)
				{
					$countTemp=0;

					for($i=$key; $i>=0; $i--)
					{
						if($tareas[$i]->level!=$value->level && $tareas[$i]->level<$value->level)
						{
							$predecesoraTarea=$key-$countTemp+1;

							break;
						}

						$countTemp++;
					}
				}

				$this->Model_ET_Tarea->insertar($idTareaGantt, 'NULL', '', $value->name, $value->start, $value->end, 0, $value->progress, 'green', $value->level, $predecesoraTarea, 0, ($key+1));
			}

			$this->db->trans_complete();

			echo json_encode(['Correcto' => 'Actividades guardadas correctamente.']);exit;
		}
	}
}
?>