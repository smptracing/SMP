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
							
	public function insertar($flat,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_pi='".$txtIdPi."',@direccion_ue='".$txtDireccionUE."',@distrito_provincia_departamento_ue='".$txtUbicacionUE."',@telefono_ue='".$txtTelefonoUE."',@ruc_ue='".$txtRuc."',@costo_total_preinv_et='".$txtCostoTotalPreInversion."',@costo_directo_preinv_et='".$txtCostoDirectoPre."',@costo_indirecto_preinv_et='".$txtCostoIndirectoPre."',@costo_total_inv_et='".$txtCostoTotalInversion."',@costo_directo_inv_et='".$txtCostoDirectoInversion."',@gastos_generales_et='".$txtGastosGenerales."',@gastos_supervision_et='".$txtGastosSupervision."',@funcion_et='".$txtFuncion."',@programa_et='".$txtPrograma."',@sub_programa_et='".$txtSubPrograma."',@proyecto_et='".$txtProyecto."',@componente_et='".$txtComponente."',@meta_et='".$txtMeta."',@fuente_financiamiento_et='".$txtFuenteFinanciamiento."',@modalidad_ejecucion_et='".$txtModalidadEjecucion."',@tiempo_ejecucion_pi_et='".$txtTiempoEjecucionPip."',@num_beneficiarios_indirectos='".$txtNumBeneficiarios."',@url_doc_aprobacion_et='".$txtUrlDocAprobacion."',@desc_situacion_actual_et='".$txtSituacioActual."',@relevancia_economica_et='".$txtSituacioDeseada."',@resumen_pi_et='".$txtContribucioInterv."',@num_folios='".$txtNumFolio."'");
        return true;
	}
}