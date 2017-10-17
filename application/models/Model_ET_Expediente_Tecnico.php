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

	public function ListarExpedienteTecnico()
	{
		$data=$this->db->query("select * from ET_EXPEDIENTE_TECNICO as ET inner join PROYECTO_INVERSION as PI on ET.id_pi=PI.id_pi");

		return $data->result();
	}

	public function ExpedienteListarElaboracion($flat1,$id_etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."'");
        return $data->result();
	}

	public function ExpedienteListarElaboracionPorId($flat1,$id_etapa_et,$id_pi)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."',@id_pi='".$id_pi."'");
        return $data->result();
	}

	public function ExpedienteListarEstudioCompatibilidad($flat1,$id_etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."'");
        return $data->result();
	}

	public function ExpedienteListarEjecucionDeductivo($flat1,$id_etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."'");
        return $data->result();
	}


	public function ExpedienteListarEjecucionAdicional($flat1,$id_etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."'");
        return $data->result();
	}
	
	public function ExpedienteListarModificacion($flat1,$id_etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat1."',@id_etapa_et='".$id_etapa_et."'");
        return $data->result();
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
							
	public function insertar($flat,$txtNombreUe,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio,$etapa_et)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@nombre_ue='".$txtNombreUe."',@id_pi='".$txtIdPi."',@direccion_ue='".$txtDireccionUE."',@distrito_provincia_departamento_ue='".$txtUbicacionUE."',@telefono_ue='".$txtTelefonoUE."',@ruc_ue='".$txtRuc."',@costo_total_preinv_et='".$txtCostoTotalPreInversion."',@costo_directo_preinv_et='".$txtCostoDirectoPre."',@costo_indirecto_preinv_et='".$txtCostoIndirectoPre."',@costo_total_inv_et='".$txtCostoTotalInversion."',@costo_directo_inv_et='".$txtCostoDirectoInversion."',@gastos_generales_et='".$txtGastosGenerales."',@gastos_supervision_et='".$txtGastosSupervision."',@funcion_programatica='".$txtFuncionProgramatica."',@funcion_et='".$txtFuncion."',@programa_et='".$txtPrograma."',@sub_programa_et='".$txtSubPrograma."',@proyecto_et='".$txtProyecto."',@componente_et='".$txtComponente."',@meta_et='".$txtMeta."',@fuente_financiamiento_et='".$txtFuenteFinanciamiento."',@modalidad_ejecucion_et='".$txtModalidadEjecucion."',@tiempo_ejecucion_pi_et='".$txtTiempoEjecucionPip."',@num_beneficiarios_indirectos='".$txtNumBeneficiarios."',@url_doc_aprobacion_et='".$txtUrlDocAprobacion."',@desc_situacion_actual_et='".$txtSituacioActual."',@relevancia_economica_et='".$txtSituacioDeseada."',@resumen_pi_et='".$txtContribucioInterv."',@num_folios='".$txtNumFolio."',@id_etapa_et='".$etapa_et."'");
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
	public function editar($flat,$hdIdExpediente,$txtNombreUe,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRucUE,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$url,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio)
	{
		$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_et='".$hdIdExpediente."',@nombre_ue='".$txtNombreUe."',@direccion_ue='".$txtDireccionUE."',@distrito_provincia_departamento_ue='".$txtUbicacionUE."',@telefono_ue='".$txtTelefonoUE."',@ruc_ue='".$txtRucUE."',@costo_total_preinv_et='".$txtCostoTotalPreInversion."',@costo_directo_preinv_et='".$txtCostoDirectoPre."',@costo_indirecto_preinv_et='".$txtCostoIndirectoPre."',@costo_total_inv_et='".$txtCostoTotalInversion."',@costo_directo_inv_et='".$txtCostoDirectoInversion."',@gastos_generales_et='".$txtGastosGenerales."',@gastos_supervision_et='".$txtGastosSupervision."',@funcion_programatica='".$txtFuncionProgramatica."',@funcion_et='".$txtFuncion."',@programa_et='".$txtPrograma."',@sub_programa_et='".$txtSubPrograma."',@proyecto_et='".$txtProyecto."',@componente_et='".$txtComponente."',@meta_et='".$txtMeta."',@fuente_financiamiento_et='".$txtFuenteFinanciamiento."',@modalidad_ejecucion_et='".$txtModalidadEjecucion."',@tiempo_ejecucion_pi_et='".$txtTiempoEjecucionPip."',@num_beneficiarios_indirectos='".$txtNumBeneficiarios."',@url_doc_aprobacion_et='".$url."',@desc_situacion_actual_et='".$txtSituacioActual."',@relevancia_economica_et='".$txtSituacioDeseada."',@resumen_pi_et='".$txtContribucioInterv."',@num_folios='".$txtNumFolio."'");
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

		return true;
	}

	function VerificarComponenteExpedienteAntesEliminar($id_et)
	{
		$ExpedienteTecnico=$this->db->query("select id_et from ET_COMPONENTE   where id_et ='".$id_et."'");

		return $ExpedienteTecnico->result();
	}
	
	function VerificarETPresupuestoAnaliticoExpedienteAntesEliminar($id_et)
	{
		$ExpedienteTecnico=$this->db->query("select id_et from  ET_PRESUPUESTO_ANALITICO  where id_et ='".$id_et."'");

		return $ExpedienteTecnico->result();
	}
	
	function VerificarETTareaGantt($id_et)
	{
		$ExpedienteTecnico=$this->db->query("select id_et from  ET_TAREA_GANTT where id_et ='".$id_et."'");

		return $ExpedienteTecnico->result();
	}

	function ET_Img($id_ExpedienteTecnico)
	{
		$ET_Img=$this->db->query("select * from ET_IMG where ET_IMG.id_et='".$id_ExpedienteTecnico."' ");

		return $ET_Img->result();
	}
	public function Ultimo_Img()
	{
		$Ultimo_Img=$this->db->query("select max(id_img) as id_img from ET_IMG");
		
        return $Ultimo_Img->result()[0];
    }
    public function ListarResponsableExpediente($flat,$id_et)
    {
    	$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_et='".$id_et."'");
        return $data->result();
    }

    public function ListarDocumentoExpediente($id_et)
    {
    	$flat='LISTAREXPEDIENTEDOCUMENTO';
    	$data=$this->db->query("execute sp_Gestionar_ET_Expediente_Tecnico @Opcion='".$flat."',@id_et='".$id_et."'");
        return $data->result()[0];
    }

    public function detalleExpediente($id_et)
    {
    	/*$data=$this->db->query("select ET.id_et, ET.direccion_ue,ET.distrito_provincia_departamento_ue,ET.telefono_ue, ET.ruc_ue, P.nombre_pi, 
			STUFF((SELECT  ',' + provincia + ' '+distrito AS [text()]
	        from dbo.UBIGEO_PI ubp inner join UBIGEO ub on ubp.id_ubigeo =ub.id_ubigeo 
		    where ubp.id_pi=P.id_pi
		    Order by ub.id_ubigeo for xml PATH('')),1,1,'') AS provincia , P.codigo_unico_pi,ET.costo_total_preinv_et,ET.costo_directo_preinv_et,ET.costo_indirecto_preinv_et,et.costo_total_inv_et,et.gastos_generales_et,ET.gastos_supervision_et,ET.funcion_et,ET.programa_et,ET.sub_programa_et,ET.proyecto_et,et.componente_et,ET.meta_et,ET.fuente_financiamiento_et,ET.modalidad_ejecucion_et,ET.tiempo_ejecucion_pi_et,ET.num_beneficiarios_indirectos,ET.desc_situacion_actual_et,ET.relevancia_economica_et,ET.resumen_pi_et,et.num_folios
			from 
			ET_EXPEDIENTE_TECNICO ET INNER join PROYECTO_INVERSION P ON ET.id_pi=P.id_pi INNER JOIN UBIGEO_PI UP on P.id_pi=UP.id_pi INNER JOIN UBIGEO U ON UP.id_ubigeo=U.id_ubigeo where id_et ='".$id_et."' group by ET.id_et,ET.direccion_ue,ET.distrito_provincia_departamento_ue,ET.telefono_ue, ET.ruc_ue, P.nombre_pi, P.codigo_unico_pi,ET.costo_total_preinv_et,ET.costo_directo_preinv_et,ET.costo_indirecto_preinv_et,et.costo_total_inv_et,et.gastos_generales_et,ET.gastos_supervision_et,ET.funcion_et,ET.programa_et,ET.sub_programa_et,ET.proyecto_et,et.componente_et,ET.meta_et,ET.fuente_financiamiento_et,ET.modalidad_ejecucion_et,ET.tiempo_ejecucion_pi_et,ET.num_beneficiarios_indirectos,ET.desc_situacion_actual_et,ET.relevancia_economica_et,ET.resumen_pi_et,et.num_folios, P.id_pi	");
        return $data->result()[0];*/
        $data = $this->db->query("select et.id_et,et.direccion_ue,et.distrito_provincia_departamento_ue, et.telefono_ue, et.ruc_ue,
				py.nombre_pi,u.provincia,py.codigo_unico_pi, et.costo_total_preinv_et,et.costo_directo_preinv_et, et.costo_indirecto_preinv_et,
				et.costo_total_inv_et, et.gastos_generales_et,et.gastos_supervision_et,et.funcion_et, et.programa_et,
				et.sub_programa_et,et.proyecto_et,et.componente_et, et.meta_et, et.fuente_financiamiento_et,
				et.modalidad_ejecucion_et, et.tiempo_ejecucion_pi_et, et.num_beneficiarios_indirectos, et.desc_situacion_actual_et,
				et.relevancia_economica_et, et.resumen_pi_et, et.num_folios
				from ET_EXPEDIENTE_TECNICO et inner join PROYECTO_INVERSION py on py.id_pi=et.id_pi
				left join UBIGEO_PI up on up.id_pi=py.id_pi 
				left join UBIGEO u on u.id_ubigeo = up.id_ubigeo
				where et.id_et=$id_et");
        return $data->result()[0];

    }

    public function ExpedienteTecnicoPorIdETPadre($idExpedienteTecnico)
    {
    	$expedienteTecnico=$this->db->query("select * from ET_EXPEDIENTE_TECNICO where id_et_padre=".$idExpedienteTecnico);

		return count($expedienteTecnico->result())>0 ? $expedienteTecnico->result()[0] : null;
    }

    public function clonar($idExpedienteTecnico, $idEtapaExpedienteTecnico)
    {
    	$data=$this->db->query("execute cloneExpedienteTecnicoAndChild ".$idExpedienteTecnico.", ".$idEtapaExpedienteTecnico);
        
        return true;
    }


    public function darvistobueno($id_et)
    {
    	$this->db->query("Update ET_EXPEDIENTE_TECNICO SET estado_revision=1 where  id_et ='".$id_et."'");

		return true;
    }
    public function listarUResponsableERespoElaboracion($id_et)
    {
    	$data=$this->db->query("select * from ET_RESPONSABLE  inner join  ET_TIPO_RESPONSABLE on ET_RESPONSABLE.id_tipo_responsable_et=ET_TIPO_RESPONSABLE.id_tipo_responsable_et
								where ET_RESPONSABLE.id_et='".$id_et."' and ET_TIPO_RESPONSABLE.codigo_tipo_responsable_et='001' ");

		return $data->result()[0];
    }
    public function listarUResponsableERespoEjecucion($id_et)
    {
    	$data=$this->db->query("select * from ET_RESPONSABLE  inner join  ET_TIPO_RESPONSABLE on ET_RESPONSABLE.id_tipo_responsable_et=ET_TIPO_RESPONSABLE.id_tipo_responsable_et
		where ET_RESPONSABLE.id_et='".$id_et."' and ET_TIPO_RESPONSABLE.codigo_tipo_responsable_et='002'");
		
		return $data->result()[0];
    }

    public function EditarResponsableElabor($id_tipo_responsableElabo,$comboCargoElaboracion,$comboResponsableElaboracion)
    {
    	$this->db->query("update ET_RESPONSABLE 
						SET id_persona = '".$comboResponsableElaboracion."',id_cargo='".$comboCargoElaboracion."'
						where id_responsable_et='".$id_tipo_responsableElabo."' ");

    	return true;

    }
     public function PeriodoEjecucion($fechaInicio, $fechaFin, $id_et)
    {
    	$this->db->query("update ET_EXPEDIENTE_TECNICO set fecha_inicio_et = '$fechaInicio', fecha_fin_et = '$fechaFin' where id_et = $id_et");
    	return true;
    }

    public function EditarResponsableEjecucion($id_tipo_responsableEjecucion,$comboCargoEjecucion,$ComboResponsableEjecucion)
    {
    	$this->db->query("update ET_RESPONSABLE 
						SET id_persona = '".$ComboResponsableEjecucion."',id_cargo='".$comboCargoEjecucion."'
						where id_responsable_et='".$id_tipo_responsableEjecucion."' ");

    	return true;
    }
    public function listarPartidaporEt($id_et)
    {
    	$data=$this->db->query("select p.id_partida, p.desc_partida from ET_PARTIDA p inner join ET_META m on p.id_meta=m.id_meta inner join ET_COMPONENTE c on m.id_componente=c.id_componente inner join ET_EXPEDIENTE_TECNICO et on c.id_et=et.id_et where et.id_et=$id_et");
        return $data->result();
    }
    public function DetallePartida($idPartida)
    {
    	$data=$this->db->query("select py.codigo_unico_pi, et.id_et, py.nombre_pi, p.id_partida, p.desc_partida from ET_PARTIDA p inner join ET_META m on p.id_meta=m.id_meta
		inner join ET_COMPONENTE c on m.id_componente=c.id_componente inner join ET_EXPEDIENTE_TECNICO et on c.id_et=et.id_et
		inner join proyecto_inversion py on et.id_pi = py.id_pi where p.id_partida=$idPartida");
        return $data->result()[0];
    }
}