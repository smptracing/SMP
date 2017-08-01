<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_CronogramaValorizacion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function CronogramaValorizacion_Listar()
	{
		//$ETEtapa_Listar=$this->db->query("execute sp_UnidadMedida_Listar");
	    //return $ETEtapa_Listar->result();
	}

	function insertar($txtCronogramaValorizacion)
	{
		//$ETEtapa=$this->db->query("execute sp_UnidadMedida_Insertar '".$txtDescripcion."'");
		return true;
	} 

	function editar($id, $txtDescripcion)
	{
		/*$unidadMedida=$this->db->query("update UNIDAD_MEDIDA  set  descripcion='".$txtDescripcion."' where id_unidad='".$id."' ");
		return true;*/
	}

}