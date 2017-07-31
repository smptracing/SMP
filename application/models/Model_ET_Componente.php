<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Componente extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function ETEtapa_Listar()
	{
		//$ETEtapa_Listar=$this->db->query("execute sp_UnidadMedida_Listar");
	    //return $ETEtapa_Listar->result();
	}

	function insertar($idET, $descripcion)
	{
		$this->db->query("execute sp_Gestionar_ETComponente 'insertar', '".$idET."', '".$descripcion."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_componente) as idComponente from ET_COMPONENTE");

		return $data[0]->idComponente;
	}

	function editar($id, $txtDescripcion)
	{
		/*$unidadMedida=$this->db->query("update UNIDAD_MEDIDA  set  descripcion='".$txtDescripcion."' where id_unidad='".$id."' ");
		return true;*/
	}
}