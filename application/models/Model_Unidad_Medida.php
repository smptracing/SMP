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

	function insertar($txtDescripcion)
	{
		$unidadMedida=$this->db->query("execute sp_UnidadMedida_Insertar '".$txtDescripcion."'");

		return true;
	}

	function UnidadMedida($id)
	{
		$unidadMedida=$this->db->query("select * from UNIDAD_MEDIDA where id_unidad='".$id."' ");

		return $unidadMedida->result();
	}

	function UnidadMedidaPorDescripcion($descripcion)
	{
		$unidadMedida=$this->db->query("select * from UNIDAD_MEDIDA where replace(descripcion, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $unidadMedida->result();
	}

	function UnidadMedidaPorDescripcionDiffId($id, $descripcion)
	{
		$unidadMedida=$this->db->query("select * from UNIDAD_MEDIDA where id_unidad!='".$id."' and replace(descripcion, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $unidadMedida->result();
	}

	function editar($id, $txtDescripcion)
	{
		$unidadMedida=$this->db->query("update UNIDAD_MEDIDA  set  descripcion='".$txtDescripcion."' where id_unidad='".$id."' ");

		return true;
	}
	function insertarInsumo($idUnidad, $descripcion)
	{
		$unidadMedida=$this->db->query("execute sp_Gestionar_EtInsumo @Opcion = 'C', @id_unidad = $idUnidad, @desc_insumo = '$descripcion'");
		return true;
	}
	function listaInsumoNivel1()
	{
		$nivel1=$this->db->query("exec sp_gestionar_insumopartida @opcion = 'listar_insumos_nivel' ,  @CodInsumoPartida = '', @NivelInsumoPartida = '0'");
		return $nivel1->result();
	}
	function listaInsumoporNivel($codigoInsumo,$nivel)
	{
		$data=$this->db->query("exec sp_gestionar_insumopartida @opcion = 'listar_insumos_nivel' ,  @CodInsumoPartida = '$codigoInsumo', @NivelInsumoPartida = $nivel");
		return $data->result();
	}
	function validarInsumo($insumo)
	{
		$data=$this->db->query("select * from UNIDAD_MEDIDA where descripcion = '$insumo'");
		return $data->result()[0];
	}
	function listaPartidaNivel1()
	{
		$nivel1=$this->db->query("exec sp_Gestionar_InsumoPartida @opcion = 'listar_partidas_nivel', @CodInsumoPartida='',@NivelInsumoPartida='2'");
		return $nivel1->result();
	}
	function listaPartidaporNivel($codigoPartida,$nivel)
	{
		$data=$this->db->query("exec sp_gestionar_insumopartida @opcion = 'listar_partidas_nivel' ,  @CodInsumoPartida = '$codigoPartida', @NivelInsumoPartida = $nivel");
		return $data->result();
	}
}