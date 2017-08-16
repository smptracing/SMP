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

	function listarPresupuestoAnalitico($id_et)
	{
		$ETClasificador=$this->db->query("WITH Clasificador(id_clasificador, id_clasificador_padre, num_clasificador,desc_clasificador, Nivel,precio_parcial) AS
(
SELECT ET_CLASIFICADOR.id_clasificador,id_clasificador_padre,num_clasificador,desc_clasificador , 0, precio_parcial
FROM ET_CLASIFICADOR  left JOIN ET_PRESUPUESTO_ANALITICO ON ET_CLASIFICADOR.id_clasificador=ET_PRESUPUESTO_ANALITICO.id_clasificador left JOIN ET_PRESUPUESTO_EJECUCION on ET_PRESUPUESTO_ANALITICO.id_presupuesto_ej=ET_PRESUPUESTO_EJECUCION.id_presupuesto_ej left JOIN ET_ANALISIS_UNITARIO ON ET_PRESUPUESTO_ANALITICO.id_analitico=ET_ANALISIS_UNITARIO.id_analitico left JOIN ET_DETALLE_ANALISIS_UNITARIO  ON ET_ANALISIS_UNITARIO.id_analisis=ET_DETALLE_ANALISIS_UNITARIO.id_analisis
WHERE  ET_CLASIFICADOR.id_clasificador_padre IS NULL AND id_et ='".$id_et."'
UNION ALL
SELECT c.id_clasificador, c.id_clasificador_padre,c.num_clasificador, c.desc_clasificador, Nivel + 1,precio_parcial
FROM ET_CLASIFICADOR c INNER JOIN  Clasificador cd
ON c.id_clasificador_padre = cd.id_clasificador
)
SELECT id_clasificador, id_clasificador_padre,num_clasificador, desc_clasificador, Nivel,precio_parcial
FROM Clasificador");

		return $ETClasificador->result();
	}

}