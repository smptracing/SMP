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
	$tipogasto=$this->db->query("execute sp_TipoGastoFE_listar"); 
	return $tipogasto->result();
	} 
	function insertar($txt_descripcion_tipo)
  	{
	  	$this->db->query("execute sp_TipoGasto_Insertar'".$txt_descripcion_tipo."'");
	  		if ($this->db->affected_rows() > 0) 
	  		{
	  			return true;
	  		}
	  		else
	  		{
	  			return false;
	  		}
  	}
}