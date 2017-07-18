<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_TipoGastoFE extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function ListarTipoGastoFE()
	{
		$tipogasto=$this->db->query("execute sp_FETipoGasto_Listar"); 
		
		return $tipogasto->result();
	} 

	function insertar($txt_descripcion_tipo)
  	{
	  	$this->db->query("execute sp_FETipoGasto_Insertar'".$txt_descripcion_tipo."'");
  	}

  	function TipoGastoFE($id)
	{
		$tipogastofe=$this->db->query("select * from FE_TIPO_GASTO where id_tipo_gasto='".$id."'");

		return $tipogastofe->result();
	}

  	function editar($id,$txt_descripcion_tipo)
  	{
	  	$this->db->query("execute sp_FETipoGasto_Modificar'".$id."','".$txt_descripcion_tipo."'");
	  	
	  	return true;
  	}
}