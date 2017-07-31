<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Clasificador extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function clasificador_Listar()
	{
		//$ETEtapa_Listar=$this->db->query("execute sp_UnidadMedida_Listar");
	    //return $ETEtapa_Listar->result();
	}

	function insertar($txtNumeroClasi,$txtDescripcionClasi,$txtDetalleClasi)
	{
		//$ETEtapa=$this->db->query("execute sp_UnidadMedida_Insertar '".$txtDescripcion."'");
		return true;
	} 

	function editar($hdIdClasificadro,$txtNumeroClasi,$txtDescripcionClasi,$txtDetalleClasi)
	{
		/*$unidadMedida=$this->db->query("update UNIDAD_MEDIDA  set  descripcion='".$txtDescripcion."' where id_unidad='".$id."' ");
		return true;*/
	}


}