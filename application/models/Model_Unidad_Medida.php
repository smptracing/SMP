<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Unidad_Medida extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function UnidadMedidad_Listar()
	{
		$unidadMedida=$this->db->query("execute sp_UnidadMedida_Listar");

	    return $unidadMedida->result();
	} 
	function insertar($txt_descripcion)
	{
		$unidadMedida=$this->db->query("execute sp_UnidadMedida_Insertar '".$txt_descripcion."'");

		return true;
	} 

	function UnidadMedida($id)
	{
		$unidadMedida=$this->db->query("select * from UNIDAD_MEDIDA where id_unidad='".$id."' ");

		return $unidadMedida->result();
	}

	function editar($id,$txtDescripcion)
	{
		$unidadMedida=$this->db->query("update UNIDAD_MEDIDA  set  descripcion='".$txtDescripcion."' where id_unidad='".$id."' ");

		return true;
	}
}