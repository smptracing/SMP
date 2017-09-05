<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Tarea_Observacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idTareaET, $descripcionObservacion, $descripcionLevantamientoObservacion, $fechaObservacion, $fechaLevantamientoObservacion, $estadoObservacion)
	{
		$this->db->query("exec sp_Gestionar_ETTareaObservacion 'insertar', ".$idTareaET.", '".$descripcionObservacion."', '".$descripcionLevantamientoObservacion."', '".$fechaObservacion."', '".$fechaLevantamientoObservacion."', ".$estadoObservacion);

		return true;
	}

	public function ETTareaObservacionPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_TAREA_OBSERVACION where id_tarea_et=".$idTareaET);

		return $data->result();
	}

	public function eliminar($idTareaObservacion)
	{
		$this->db->query("delete from ET_TAREA_OBSERVACION where id_tarea_observacion=".$idTareaObservacion);

		return true;
	}
}
?>