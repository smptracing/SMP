<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Tarea extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function eliminarETTareaPorIdTareaGantt($idTareaGantt)
	{
		$this->db->query("delete from ET_TAREA where id_tarea_gantt=".$idTareaGantt);

		return true;
	}

	public function insertar($idTareaGantt, $idTareaETPadre, $descripcion, $nombreTarea, $fechaInicioTarea, $fechaFinalTarea, $valoracionTarea, $avanceTarea, $colorTarea, $nivelTarea, $predecesoraTarea, $estadoTarea, $numeracion, $dependenciaTarea)
	{
		$this->db->query("execute sp_Gestionar_ETTarea 'insertar', ".$idTareaGantt.", ".$idTareaETPadre.", '".$descripcion."', '".$nombreTarea."', '".$fechaInicioTarea."', '".$fechaFinalTarea."', ".$valoracionTarea.", ".$avanceTarea.", '".$colorTarea."', ".$nivelTarea.", ".$predecesoraTarea.", ".$estadoTarea.", ".$numeracion.", '".$dependenciaTarea."'");

		return true;
	}

	public function ETTareaPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_TAREA where id_tarea_et=".$idTareaET);

		return count($data->result())==0 ? null : $data->result()[0];
	}

	public function ETTareaPorIdTareaGantt($idTareaGantt)
	{
		$data=$this->db->query("select * from ET_TAREA where id_tarea_gantt=".$idTareaGantt);

		return $data->result();
	}

	public function ETTareaPorIdTareaGanttYNumeracion($idTareaGantt, $numeracion)
	{
		$data=$this->db->query("select * from ET_TAREA where id_tarea_gantt=".$idTareaGantt." and numeracion=".$numeracion);

		return count($data->result())==0 ? null : $data->result()[0];
	}
}
?>