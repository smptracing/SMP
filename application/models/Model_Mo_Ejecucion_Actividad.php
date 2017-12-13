<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Ejecucion_Actividad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_EJECUCION_ACTIVIDAD',$data);
		return $this->db->insert_id();
	}

	function editar($ejecucion,$idEjecucion)
	{
		$this->db->set($ejecucion);
		$this->db->where('id_ejecucion', $idEjecucion);
		$this->db->update('MO_EJECUCION_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function listaEjecucionActividad($idActividad)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result();
	}

	function verprogramacion($id_ejecucion)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_ejecucion',$id_ejecucion);
		return $this->db->get()->result()[0];
	} 

	function eliminar($idEjecucion)
	{
		$this->db->where('id_ejecucion',$idEjecucion);
		$this->db->delete('MO_EJECUCION_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function verificarProgramacion($mes,$anio,$idActividad)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.mes_ejec',$mes);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.anio_ejec',$anio);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result();
	}

}