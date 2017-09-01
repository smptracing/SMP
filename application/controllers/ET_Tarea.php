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
		$listaETTarea=$this->Model_ET_Tarea->ETTareaPorIdTareaGantt(1);

		$arrayTask=[];

		foreach($listaETTarea as $key => $value)
		{
			$arrayTask[]=[
				'id' => $value->id_tarea_et,
				'name' => $value->nombre_tarea,
				'progress' => $value->avance_tarea,
				'progressByWorklog' => false,
				'relevance' => 0,
				'type' => '',
				'typeId' => '',
				'description' => '',
				'code' => '',
				'level' => $value->nivel_tarea,
				'status' => 'STATUS_ACTIVE',
				'depends' => '',
				'canWrite' => true,
				'start' => 1504501200000,
				'duration' => 1,
				'end' => 1504587599999,
				'startIsMilestone' => false,
				'endIsMilestone' => false,
				'assigs' => [],
				'hasChild' => (count($listaETTarea)-1!=$key ? ($listaETTarea[$key+1]->nivel_tarea>$value->nivel_tarea ? true : false) : false)
			];
		}

		return $this->load->view('Front/Ejecucion/ETTareaGantt/index', ['arrayTask' => json_encode($arrayTask), 'listaETTarea' => $listaETTarea]);
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

				if(trim($value->name)=='')
				{
					$this->db->trans_rollback();

					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Debe asignar nombre a todas las actividades creadas.']);exit;
				}

				$this->Model_ET_Tarea->insertar($idTareaGantt, 'NULL', '', $value->name, $value->start, $value->end, 0, $value->progress, 'green', $value->level, $predecesoraTarea, 0, ($key+1));
			}

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Actividades guardadas correctamente.']);exit;
		}
	}
}
?>