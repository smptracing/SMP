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
	public function ExpedienteTecnicoListar($flat)
	{
		$ListarExpedienteTecnico=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."'");
        return $ListarExpedienteTecnico->result();
	}

	public function ExpedienteContarRegistros($codigo_unico_pi)
	{
		$NumeroExpedienteTecnico=$this->db->query("select count(distinct codigo_unico_pi) as numeoRegistroProyectoIn from PROYECTO_INVERSION  where codigo_unico_pi='".$codigo_unico_pi."' group by codigo_unico_pi");
        return $NumeroExpedienteTecnico->result();
	}
	public function ExpedienteTecnicoBuscar($codigo_unico_pi)
	{
		$BuscarExpedienteExpediente=$this->db->query("execute sp_Expediente_Tecnico_Buscar @codigo_unico_pi='".$codigo_unico_pi."'");
        return $BuscarExpedienteExpediente->result()[0];  
	}

	public function ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico)
	{
		$BuscarExpedienteExpediente=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$opcion."' , @id_et='".$id_ExpedienteTecnico."'");

        return $BuscarExpedienteExpediente->result()[0];
    }
							
	public function insertar($flat,$txtNombreUe,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@nombre_ue='".$txtNombreUe."',@id_pi='".$txtIdPi."',@direccion_ue='".$txtDireccionUE."',@distrito_provincia_departamento_ue='".$txtUbicacionUE."',@telefono_ue='".$txtTelefonoUE."',@ruc_ue='".$txtRuc."',@costo_total_preinv_et='".$txtCostoTotalPreInversion."',@costo_directo_preinv_et='".$txtCostoDirectoPre."',@costo_indirecto_preinv_et='".$txtCostoIndirectoPre."',@costo_total_inv_et='".$txtCostoTotalInversion."',@costo_directo_inv_et='".$txtCostoDirectoInversion."',@gastos_generales_et='".$txtGastosGenerales."',@gastos_supervision_et='".$txtGastosSupervision."',@funcion_programatica='".$txtFuncionProgramatica."',@funcion_et='".$txtFuncion."',@programa_et='".$txtPrograma."',@sub_programa_et='".$txtSubPrograma."',@proyecto_et='".$txtProyecto."',@componente_et='".$txtComponente."',@meta_et='".$txtMeta."',@fuente_financiamiento_et='".$txtFuenteFinanciamiento."',@modalidad_ejecucion_et='".$txtModalidadEjecucion."',@tiempo_ejecucion_pi_et='".$txtTiempoEjecucionPip."',@num_beneficiarios_indirectos='".$txtNumBeneficiarios."',@url_doc_aprobacion_et='".$txtUrlDocAprobacion."',@desc_situacion_actual_et='".$txtSituacioActual."',@relevancia_economica_et='".$txtSituacioDeseada."',@resumen_pi_et='".$txtContribucioInterv."',@num_folios='".$txtNumFolio."'");
        return true;
	}
	public function reporteExpedienteFicha001($Opcion,$id_et)
	{
		$listarExpdenieTecnico=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$Opcion."',@id_et='".$id_et."'");
        return $listarExpdenieTecnico->result()[0];
	}

	public function UltimoExpedienteTecnico()
	{
		$BuscarUltimoExpedienteTecnico=$this->db->query("select max(id_et) as id_et from ET_EXPEDIENTE_TECNICO");

        return $BuscarUltimoExpedienteTecnico->result()[0];
    }

	public function DatosExpediente($id_et)
	{
		$ETExpediente=$this->db->query("select * from  ET_EXPEDIENTE_TECNICO inner join PROYECTO_INVERSION ON ET_EXPEDIENTE_TECNICO.id_pi=PROYECTO_INVERSION.id_pi where id_et ='".$id_et."'");
	    return $ETExpediente->result()[0];
	}
	public function editar($flat,$hdIdExpediente,$txtNombreUe,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRucUE,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_et='".$hdIdExpediente."',@nombre_ue='".$txtNombreUe."',@direccion_ue='".$txtDireccionUE."',@distrito_provincia_departamento_ue='".$txtUbicacionUE."',@telefono_ue='".$txtTelefonoUE."',@ruc_ue='".$txtRucUE."',@costo_total_preinv_et='".$txtCostoTotalPreInversion."',@costo_directo_preinv_et='".$txtCostoDirectoPre."',@costo_indirecto_preinv_et='".$txtCostoIndirectoPre."',@costo_total_inv_et='".$txtCostoTotalInversion."',@costo_directo_inv_et='".$txtCostoDirectoInversion."',@gastos_generales_et='".$txtGastosGenerales."',@gastos_supervision_et='".$txtGastosSupervision."',@funcion_programatica='".$txtFuncionProgramatica."',@funcion_et='".$txtFuncion."',@programa_et='".$txtPrograma."',@sub_programa_et='".$txtSubPrograma."',@proyecto_et='".$txtProyecto."',@componente_et='".$txtComponente."',@meta_et='".$txtMeta."',@fuente_financiamiento_et='".$txtFuenteFinanciamiento."',@modalidad_ejecucion_et='".$txtModalidadEjecucion."',@tiempo_ejecucion_pi_et='".$txtTiempoEjecucionPip."',@num_beneficiarios_indirectos='".$txtNumBeneficiarios."',@desc_situacion_actual_et='".$txtSituacioActual."',@relevancia_economica_et='".$txtSituacioDeseada."',@resumen_pi_et='".$txtContribucioInterv."',@num_folios='".$txtNumFolio."'");
        return true;
	}

	function ValidarExpedienteTecnico($id, $id_pi)
    {
        $presupuestoejecucion=$this->db->query("select * from ET_EXPEDIENTE_TECNICO where id_et!='".$id."' and replace(id_pi, ' ', '')=replace('".$id_pi."', ' ', '')");

        return $presupuestoejecucion->result();
    }

    function eliminar($flat,$id_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_et='".$id_et."'");

		return $data->result();
	}
	function VerificarExpedienteAntesEliminar()
	{
		$ExpedienteTecnico=$this->db->query("select id_clasificador from ET_PRESUPUESTO_ANALITICO where id_clasificador='".$id_et."' ");

		return $ExpedienteTecnico->result();
	}
}