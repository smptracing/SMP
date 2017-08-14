<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Presupuesto_Analitico extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function ETPresupuestoAnaliticoPorIdET($idET)
	{
		$data=$this->db->query("select * from ET_PRESUPUESTO_ANALITICO as ETPA inner join ET_CLASIFICADOR as ETC on ETPA.id_clasificador=ETC.id_clasificador inner join ET_PRESUPUESTO_EJECUCION as ETPE on ETPA.id_presupuesto_ej=ETPE.id_presupuesto_ej where ETPA.id_eT=".$idET);

		return $data->result();
	}
}