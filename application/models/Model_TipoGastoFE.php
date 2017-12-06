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
		$tipoGasto=$this->db->query("execute sp_FETipoGasto_Listar"); 
		
		return $tipoGasto->result();
	} 

	function insertar($txtDescripcion)
  	{
	  	$this->db->query("execute sp_FETipoGasto_Insertar'".$txtDescripcion."'");
  	}

  	function TipoGastoFE($id)
	{
		$tipoGastoFE=$this->db->query("select * from FE_TIPO_GASTO where id_tipo_gasto='".$id."'");

		return $tipoGastoFE->result();
	}

	function TipoGastoFEPorDescripcion($descripcion)
	{
		$tipoGastoFE=$this->db->query("select * from FE_TIPO_GASTO where replace(desc_tipo_gasto, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $tipoGastoFE->result();
	}

	function TipoGastoFEPorDescripcionDiffId($id, $descripcion)
	{
		$tipoGastoFE=$this->db->query("select * from FE_TIPO_GASTO where id_tipo_gasto!='".$id."' and replace(desc_tipo_gasto, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $tipoGastoFE->result();
	}

  	function editar($id,$txtDescripcion)
  	{
	  	$this->db->query("execute sp_FETipoGasto_Modificar'".$id."','".$txtDescripcion."'");

	  	return true;
  	}
  	function eliminar($id_tipo_gasto)
  	{
  		$this->db->where('id_tipo_gasto', $id_tipo_gasto);
        $this->db->delete('FE_TIPO_GASTO');
        return $this->db->affected_rows();
  	}
}