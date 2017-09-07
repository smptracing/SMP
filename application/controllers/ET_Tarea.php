<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Tarea');
		$this->load->model('Model_ET_Tarea_Observacion');
		$this->load->model('Model_ET_Responsable_Tarea');
		$this->load->model('Model_ET_Documento_Ejecucion');
		$this->load->model('Model_Personal');
	}

	private function number_of_working_days($from, $to)
	{
		$workingDays=[1, 2, 3, 4, 5]; # date format=N (1=Monday, ...)
		$holidayDays=['*-12-25', '*-01-01', '2013-12-23']; # variable and fixed holidays

		$from=new DateTime($from);

		$to=new DateTime($to);
		$to->modify('+1 day');
		
		$interval=new DateInterval('P1D');
		$periods=new DatePeriod($from, $interval, $to);

		$days=0;

		foreach($periods as $period)
		{
			if(!in_array($period->format('N'), $workingDays)) continue;
			if(in_array($period->format('Y-m-d'), $holidayDays)) continue;
			if(in_array($period->format('*-m-d'), $holidayDays)) continue;
			
			$days++;
		}
		
		return $days;
	}

	public function index($idTareaGantt)
	{
		$listaETTarea=$this->Model_ET_Tarea->ETTareaPorIdTareaGantt($idTareaGantt);

		$arrayTask=[];

		foreach($listaETTarea as $key => $value)
		{
			$textTemp=explode(' ', html_escape($value->nombre_tarea));
			$codeTempName='';

			foreach($textTemp as $w)
			{
				$codeTempName.=strtoupper($w[0]);
			}

			$ts1=strtotime($value->fecha_inicio_tarea);
			$ts2=strtotime($value->fecha_final_tarea);

			$seconds_diff=$ts2-$ts1;

			$arrayTask[]=[
				'id' => $value->id_tarea_et,
				'name' => html_escape($value->nombre_tarea),
				'progress' => $value->avance_tarea,
				'progressByWorklog' => false,
				'relevance' => 0,
				'type' => '',
				'typeId' => '',
				'description' => '',
				'code' => $codeTempName,
				'level' => $value->nivel_tarea,
				'status' => $value->color_tarea,
				'depends' => $value->dependencia_tarea,
				'canWrite' => true,
				'start' => (strtotime($value->fecha_inicio_tarea)*1000),
				'duration' => $this->number_of_working_days($value->fecha_inicio_tarea, $value->fecha_final_tarea),
				'end' => (strtotime($value->fecha_final_tarea)*1000),
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
				$value->end=date('Y-m-d', strtotime('-1 day', strtotime(date("Y-m-d H:i:s", ($value->end/1000)))));

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

				$this->Model_ET_Tarea->insertar($idTareaGantt, ($predecesoraTarea!='NULL' ? $this->Model_ET_Tarea->ETTareaPorIdTareaGanttYNumeracion($idTareaGantt, $predecesoraTarea)->id_tarea_et : $predecesoraTarea), '', $value->name, $value->start, $value->end, 0, $value->progress, $value->status, $value->level, $predecesoraTarea, 0, ($key+1), $value->depends);
			}

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Actividades guardadas correctamente.']);exit;
		}
	}

	public function administrarDetalleETTarea()
	{
		$idTareaET=$this->input->post('idTareaET');

		$etTarea=$this->Model_ET_Tarea->ETTareaPorIdTareaET($idTareaET);

		$listaPersona=$this->Model_Personal->verTodo();

		$listaETTareaObservacion=$this->Model_ET_Tarea_Observacion->ETTareaObservacionPorIdTareaET($idTareaET);
		$listaETResponsableTarea=$this->Model_ET_Responsable_Tarea->ETResponsableTareaPorIdTareaET($idTareaET);
		$listaETDocumentoEjecucion=$this->Model_ET_Documento_Ejecucion->ETDocumentoEjecucionPorIdTareaET($idTareaET);

		return $this->load->view('Front/Ejecucion/ETTarea/administrardetalleettarea', ['listaETTareaObservacion' => $listaETTareaObservacion, 'listaETResponsableTarea' => $listaETResponsableTarea, 'listaETDocumentoEjecucion' => $listaETDocumentoEjecucion, 'etTarea' => $etTarea, 'listaPersona' => $listaPersona]);
	}
}
?>