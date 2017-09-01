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
		$data=$this->db->query("delete from ET_TAREA where id_tarea_gantt=".$idTareaGantt);

		return true;
	}

	public function insertar($idTareaGantt, $idTareaETPadre, $descripcion, $nombreTarea, $fechaInicioTarea, $fechaFinalTarea, $valoracionTarea, $avanceTarea, $colorTarea, $nivelTarea, $predecesoraTarea, $estadoTarea, $numeracion)
	{
		$data=$this->db->query("execute sp_Gestionar_ETTarea 'insertar', ".$idTareaGantt.", ".$idTareaETPadre.", '".$descripcion."', '".$nombreTarea."', '".$fechaInicioTarea."', '".$fechaFinalTarea."', ".$valoracionTarea.", ".$avanceTarea.", '".$colorTarea."', ".$nivelTarea.", ".$predecesoraTarea.", ".$estadoTarea.", ".$numeracion);

		return true;
	}
}
?>