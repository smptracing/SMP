<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Meta extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idComponente, $idMetaPadre, $descripcion)
	{
		$this->db->query("execute sp_Gestionar_ETMeta 'insertar', ".($idComponente==null ? 'NULL' : $idComponente).", ".($idMetaPadre==null ? 'NULL' : $idMetaPadre).", '".$descripcion."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_meta) as idMeta from ET_META");

		return $data->result()[0]->idMeta;
	}

	public function ETMetaPorIdMeta($idMeta)
	{
		$data=$this->db->query("select * from ET_META where id_meta='".$idMeta."'");

		return $data->result()[0];
	}

	public function ETMetaPorIdComponente($idComponente)
	{
		$data=$this->db->query("select * from ET_META where id_componente='".$idComponente."'");

		return $data->result();
	}

	public function ETMetaPorIdMetaPadre($idMetaPadre)
	{
		$data=$this->db->query("select * from ET_META where id_meta_padre='".$idMetaPadre."'");

		return $data->result();
	}

	public function ETMetaPorIdComponenteOrIdMetaPadreAndDescMeta($idComponente, $idMetaPadre, $descripcion)
	{
		$data=$this->db->query("select * from ET_META where (('".$idComponente."'!='' and id_componente='".$idComponente."') or ('".$idComponente."'='' and id_meta_padre='".$idMetaPadre."')) and replace(desc_meta, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $data->result();
	}

	function eliminar($idMeta)
	{
		$this->db->query("delete from ET_META where id_meta=".$idMeta);

		return true;
	}

	function existsDiffIdMetaAndSameDescripcion($idComponente, $idMeta, $idMetaPadre, $descripcionMeta)
	{
		$data=$this->db->query("select * from ET_META where id_meta!=".$idMeta." and desc_meta='".$descripcionMeta."' and ((".($idComponente=='' ? 'NULL' : $idComponente)." is null and id_meta_padre='".$idMetaPadre."') or (".($idComponente=='' ? 'NULL' : $idComponente)." is not null and id_componente='".$idComponente."'))");

		return count($data->result())>0 ? true : false;
	}

	function updateDescMeta($idMeta, $descripcionMeta)
	{
		$this->db->query("update ET_META set desc_meta='".$descripcionMeta."' where id_meta=".$idMeta);

		return true;
	}
}