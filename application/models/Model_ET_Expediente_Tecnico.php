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
		$BuscarExpedienteExpediente=$this->db->query("execute sp_Expediente_Tecnico_Buscar1 @codigo_unico_pi='".$codigo_unico_pi."'");

        return $BuscarExpedienteExpediente->result()[0];
	}

	public function ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico)
	{
		$BuscarExpedienteExpediente=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$opcion."' , @id_et='".$id_ExpedienteTecnico."'");

        return $BuscarExpedienteExpediente->result()[0];
     }

	public function insertar($flat,$id_pi,$direccion_ue,$distrito_provincia_departamento_ue,$telefono_ue,$ruc_ue,$costo_total_preinv_et,$costo_directo_preinv_et,$costo_indirecto_preinv_et,$costo_total_inv_et,$costo_directo_inv_et,$gastos_generales_et,$gastos_supervision_et,$funcion_et,$programa_et,$sub_programa_et,$proyecto_et,$componente_et,$meta_et,$fuente_financiamiento_et,$modalidad_ejecucion_et,$num_beneficiarios_indirectos,$url_doc_aprobacion_et,$desc_situacion_actual_et,$desc_situacion_deseada_et,$contribucion_pi_a_desarrollo_local,$otra_informacion_et,$relevancia_economica_et,$resumen_pi_et,$num_folios)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_pi='".$id_pi."',@direccion_ue='".$direccion_ue."',@distrito_provincia_departamento_ue='".$distrito_provincia_departamento_ue."',@telefono_ue='".$telefono_ue."',@ruc_ue='".$ruc_ue."',@costo_total_preinv_et='".$costo_total_preinv_et."',@costo_directo_preinv_et='".$costo_directo_preinv_et."',@costo_indirecto_preinv_et='".$costo_indirecto_preinv_et."',@costo_total_inv_et='".$costo_total_inv_et."',@costo_directo_inv_et='".$costo_directo_inv_et."',@gastos_generales_et='".$gastos_generales_et."',@gastos_supervision_et='".$gastos_supervision_et."',@funcion_et='".$funcion_et."',@programa_et='".$programa_et."',@sub_programa_et='".$sub_programa_et."',@proyecto_et='".$proyecto_et."',@componente_et='".$componente_et."',@meta_et='".$meta_et."',@fuente_financiamiento_et='".$fuente_financiamiento_et."',@modalidad_ejecucion_et='".$modalidad_ejecucion_et."',@num_beneficiarios_indirectos='".$num_beneficiarios_indirectos."',@url_doc_aprobacion_et='".$url_doc_aprobacion_et."',@desc_situacion_actual_et='".$desc_situacion_actual_et."',@desc_situacion_deseada_et='".$desc_situacion_deseada_et."',@contribucion_pi_a_desarrollo_local='".$contribucion_pi_a_desarrollo_local."',@relevancia_economica_et='".$relevancia_economica_et."',@resumen_pi_et='".$resumen_pi_et."',@num_folios='".$num_folios."'");

        return $data->result()[0];
	}
}