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

	function editar($actividad,$idActividad)
	{
		$this->db->set($actividad);
		$this->db->where('id_actividad', $idActividad);
		$this->db->update('MO_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function actividadId($idActividad)
	{
		$this->db->select('MO_ACTIVIDAD.*');
		$this->db->from('MO_ACTIVIDAD');
		$this->db->where('MO_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result()[0];
	}

	function verificarActividadDiferente($idProducto,$idActividad,$actividad)
	{
		$this->db->select('MO_ACTIVIDAD.*');
		$this->db->from('MO_ACTIVIDAD');
		$this->db->where('MO_ACTIVIDAD.desc_actividad',$actividad);
		$this->db->where('MO_ACTIVIDAD.id_producto',$idProducto);
		$this->db->where('MO_ACTIVIDAD.id_actividad !=',$idActividad);
		return $this->db->get()->result();
	}


	function listaActividadProducto($idPi)
	{
		$query = $this->db->query("select p.desc_producto,a.id_actividad, a.desc_actividad, a.uni_medida, a.meta from mo_producto p inner join mo_actividad a on p.id_producto= a.id_producto where p.id_pi=$idPi");
		return  $query->result();
	}
}