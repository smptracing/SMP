<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Presupuesto_Analitico extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	function insertar($opcion,$idClasificador,$hd_id_et,$idPresupuestoEjecucion)
	{
		$this->db->query("execute sp_gestionar_ET_Presupuesto_Analitico @opcion='".$opcion."',@id_clasificador='".$idClasificador."', @id_et='".$hd_id_et."',@id_presupuesto_ej='".$idPresupuestoEjecucion."'");
		return true;
	}
	function listar($opcion,$idExpedienteTecnico)
	{
		$data=$this->db->query("execute sp_gestionar_ET_Presupuesto_Analitico @opcion='".$opcion."',@id_et='".$idExpedienteTecnico."'");
		return $data->result();
	}
	function ETPresupuestoAnaliticoPorIdET($idET)
	{
		$data=$this->db->query("select * from ET_PRESUPUESTO_ANALITICO as ETPA inner join ET_CLASIFICADOR as ETC on ETPA.id_clasificador=ETC.id_clasificador inner join ET_PRESUPUESTO_EJECUCION as ETPE on ETPA.id_presupuesto_ej=ETPE.id_presupuesto_ej where ETPA.id_eT=".$idET);

		return $data->result();
	}

	function listarPresupuestoAnalitico($flat,$id_et)
	{
		$ETClasificador=$this->db->query("execute sp_Gestionar_ET_Presupuesto_Analitico @Opcion='".$flat."',@id_et='".$id_et."'");

		return $ETClasificador->result();
	}

}