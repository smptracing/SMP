<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ModuloFE extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function ListarModulo()
	{
		$modulo=$this->db->query("select * from UF_MODULO"); 		
		return $modulo->result();
	} 

	function insertar($txtNombre)
  	{
	  	$this->db->query("execute sp_FEModulo_insertar'".$txtNombre."'");
  	}

  	function EditarModuloFE($id)
	{
		$moduloFE=$this->db->query("select * from UF_MODULO where id_modulo='".$id."'");
		return $moduloFE->result();
	}

	function ModuloPorNombre($nombre)
	{
		$modulo=$this->db->query("select * from UF_MODULO where replace(nombre_modulo, ' ', '')=replace('".$nombre."', ' ', '')");
		return $modulo->result();
	}

	function ModuloPorNombreDifId($id, $nombre)
	{
		$modulo=$this->db->query("select * from UF_MODULO where id_modulo!='".$id."' and replace(nombre_modulo, ' ', '')=replace('".$nombre."', ' ', '')");
		return $modulo->result();
	}

  	function editar($id,$txtNombre)
  	{
	  	$this->db->query("exec sp_FEModulo_Modificar '".$id."','".$txtNombre."'");
	  	return true;
  	}

  	function eliminar($idModulo)
  	{
  		$this->db->query("delete from UF_MODULO where id_modulo = '".$idModulo."'");
  	}
}