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
	function verificarPresupuestoAnaliticoTipoClasi($hd_id_et,$idClasificador,$idPresupuestoEjecucion)
	{
		$data=$this->db->query("select * from ET_PRESUPUESTO_ANALITICO  where id_et='".$hd_id_et."' and id_clasificador='".$idClasificador."' and id_presupuesto_ej='".$idPresupuestoEjecucion."'");
		return $data->result();
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
	function ETPresupuestoAnaliticoDetalles($idET,$id_presupuesto_ej)
	{
		$data=$this->db->query("select * from ET_PRESUPUESTO_ANALITICO ET_PREA inner join ET_PRESUPUESTO_EJECUCION ET_PRER on  
								ET_PREA.id_presupuesto_ej=ET_PRER.id_presupuesto_ej inner join ET_CLASIFICADOR ET_CLA on
								ET_PREA.id_clasificador=ET_CLA.id_clasificador WHERE id_et='".$idET."' and ET_PRER.id_presupuesto_ej='".$id_presupuesto_ej."'");

		return $data->result();
	}

	function listarPresupuestoAnalitico($flat,$id_et)
	{
		$ETClasificador=$this->db->query("execute sp_Gestionar_ET_Presupuesto_Analitico @Opcion='".$flat."',@id_et='".$id_et."'");

		return $ETClasificador->result();
	}
	function eliminar($idClasiAnalitico){

		$this->db->query("DELETE FROM ET_PRESUPUESTO_ANALITICO WHERE id_analitico='".$idClasiAnalitico."' ");

		return true;
	}

}