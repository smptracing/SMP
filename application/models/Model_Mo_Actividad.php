<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Actividad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_ACTIVIDAD',$data);
		return $this->db->affected_rows();
	}

	function listaActividad($idProducto)
	{
		$this->db->select('MO_ACTIVIDAD.*');
		$this->db->from('MO_ACTIVIDAD');
		$this->db->where('MO_ACTIVIDAD.id_producto',$idProducto);
		return $this->db->get()->result();
	}

	function verificarActividad($idProducto,$actividad)
	{
		$this->db->select('MO_ACTIVIDAD.*');
		$this->db->from('MO_ACTIVIDAD');
		$this->db->where('MO_ACTIVIDAD.desc_actividad',$actividad);
		$this->db->where('MO_ACTIVIDAD.id_producto',$idProducto);
		return $this->db->get()->result();
	}

	function eliminar($idActividad)
	{
		$this->db->where('id_actividad',$idActividad);
		$this->db->delete('MO_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function actividadId($idActividad)
	{
		$this->db->select('MO_ACTIVIDAD.*');
		$this->db->from('MO_ACTIVIDAD');
		$this->db->where('MO_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result()[0];
	}
}