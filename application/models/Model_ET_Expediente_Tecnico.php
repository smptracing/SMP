<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Expediente_Tecnico extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ExpedienteTecnico($idExpedienteTecnico)
	{
		$data=$this->db->query("select * from ET_EXPEDIENTE_TECNICO as ETET inner join PROYECTO_INVERSION as PI on ETET.id_pi=PI.id_pi where id_et=".$idExpedienteTecnico);

		return $data->result()[0];
	}
	public function ExpedienteTecnicoListar()
	{
		$ListarExpedienteTecnico=$this->db->query("select ET.id_et,UE.nombre_ue, P.nombre_pi,ET.costo_total_preinv_et, ET.costo_total_inv_et, ET.tiempo_ejecucion_pi_et, P.num_beneficiarios from ET_EXPEDIENTE_TECNICO ET inner join PROYECTO_INVERSION P on ET.id_pi=P.id_pi INNER JOIN UNIDAD_EJECUTORA UE on UE.id_ue=P.id_ue");

        return $ListarExpedienteTecnico->result();
	}

	public function ExpedienteTecnicoBuscar($codigo_unico_pi)
	{
		$BuscarExpedienteExpediente=$this->db->query("execute sp_Expediente_Tecnico_Buscar @codigo_unico_pi='".$codigo_unico_pi."'");

        return $BuscarExpedienteExpediente->result()[0];
	}
}