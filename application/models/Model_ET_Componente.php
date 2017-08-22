<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Componente extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($idET, $descripcion)
	{
		$this->db->query("execute sp_Gestionar_ETComponente 'insertar', '".$idET."', '".$descripcion."'");

		return true;
	}

	function ultimoId()
	{
		$data=$this->db->query("select max(id_componente) as idComponente from ET_COMPONENTE");

		return $data->result()[0]->idComponente;
	}

	public function ETComponentePorIdET($idExpedienteTecnico)
	{
		$data=$this->db->query("select * from ET_COMPONENTE where id_et='".$idExpedienteTecnico."'");

		return $data->result();
	}

	public function ETComponentePorIdETAndDescripcion($idExpedienteTecnico, $descripcion)
	{
		$data=$this->db->query("select * from ET_COMPONENTE where id_et='".$idExpedienteTecnico."' and replace(descripcion, ' ', '')=replace('".$descripcion."', ' ', '')");

		return $data->result();
	}

	function eliminar($idComponente)
	{
		$this->db->query("delete from ET_COMPONENTE where id_componente=".$idComponente);

		return true;
	}

	function existsDiffIdComponenteAndSameDescripcion($idComponente, $descripcionComponente)
	{
		$data=$this->db->query("select * from ET_COMPONENTE where id_componente!=".$idComponente." and descripcion='".$descripcionComponente."'");

		return count($data->result())>0 ? true : false;
	}

	function updateDescComponente($idComponente, $descripcionComponente)
	{
		$this->db->query("update ET_COMPONENTE set descripcion='".$descripcionComponente."' where id_componente=".$idComponente);

		return true;
	}
}