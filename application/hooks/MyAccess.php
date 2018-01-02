<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('autentificar'))
{
    function autentificar()
    {
        $CI = & get_instance();

        $controlador = $CI->uri->segment(1);
        $accion = $CI->uri->segment(2);
        $parametro = $CI->uri->segment(3);

        $url = ($accion=='' ? $controlador : $controlador.'/'.$accion);

        if($parametro!='')
        {
            $url = $controlador.'/'.$accion.'/'.$parametro;
        }
        $libres = array(
            '/',
            'Login/muestralog',
            'Login/ingresar',
            'Login/logout',
            'AplicativoMovil/listadoProyectoGrupoFuncional',
            'AplicativoMovil/listadoProyectoDivisionFuncional',
            'AplicativoMovil/listadoProyectoFuncion',
            'AplicativoMovil/listadoNoPipPorTipoNoPip',
            'AplicativoMovil/index',
            'AplicativoMovil/listaTotalDeUbicacionesProyecto',
            'AplicativoMovil/DatosGeneralesdelPip',
            'AplicativoMovil/GraficarPip',
            'AplicativoMovil/',
            'AplicativoMovil/Pips',
            'Usuario/accesodenegado'
        );
        if(in_array($url, $libres))
        {
            echo $CI->output->get_output();
        }
        else
        {
            if($CI->session->userdata('idPersona'))
            {
                echo $CI->output->get_output();
                /*if(autorizar($url))
                {
                    echo $CI->output->get_output();
                }
                else
                {
                    echo $CI->output->get_output();
                    redirect('Usuario/accesodenegado');
                }*/
            }
            else
            {
            	redirect('Login/muestralog');
            }
        }

    }
}
function autorizar($url)
{
    $CI = & get_instance();
    $CI->load->model('Model_Usuario');
    $listaRutasPermitidas = $CI->Model_Usuario->listaUrlAsignado($CI->session->userdata('idPersona'));
    $arrayPermitido = [];
    foreach ($listaRutasPermitidas as $key => $value)
    {
        $arrayPermitido[] = $value->url;
    }

    $lista_API = array(
      '',
      'Inicio',
      'Usuario/listaMenu',
      'Usuario/listaUrlAsignado',
      'Usuario/itemUsuario',
      'Usuario/ListarTipoUsuario',

      'Personal/ListarPersonal',
      'Funcion/GetDivisionFuncional',
      'Funcion/GetGrupoFuncional',
      'Funcion/GetFuncion',
      'criterio/addPrioridad',
      'criterio/getFactor',
      'criterio/updateCriterio',
      'criterio/addCriterio',
      'criterio/updateFactor',
      'criterio/addFactor',
      'criterio/updateValorizacion',
      'criterio/addValorizacion',
      'Expediente_Tecnico/AsignarValorizacion',
      'Expediente_Tecnico/eliminarValorizacionPartida',
      'DivisionFuncional/EliminarDivisionFunc',
      'GrupoFuncional/EliminarGFuncional',
      'Funcion/EliminarFuncion',


      'ET_Componente/cargarNivel',
      'ET_Observacion_Tarea/insertar',
      'ET_Levantamiento_Obs/insertar',
      'ET_Presupuesto_Analitico/insertar',
      'ET_Documento_Ejecucion/insertar',
      'Expediente_Tecnico/registroBuscarMeta',
      'Expediente_Tecnico/AsignarOrden',
      'ET_Img/eliminar',
      'Expediente_Tecnico/registroBuscarProyecto',
      'Expediente_Tecnico/insertar',
      'Expediente_Tecnico/registroBuscarProyecto',
      'Expediente_Tecnico/clonar',
      'Expediente_Tecnico/CalcularNumeroMeses',
      'Expediente_Tecnico/PeriodoEjecucion',
      'Expediente_Tecnico/eliminar',
      'ET_Presupuesto_Ejecucion/eliminar',
      'ET_Recurso/eliminar',
      'NoPipProgramados/listarNopip',
      'mensaje/eliminarMensaje',
      'Usuario/getUsuario',
      'mensaje/enviar',
      'Personal/EliminarPersonal',

      'Mo_MonitoreodeProyectos/index',
      'Mo_MonitoreodeProyectos/BuscarProyecto',
      'Mo_MonitoreodeProyectos/InsertarProducto',
      'Mo_MonitoreodeProyectos/EditarProducto',
      'Mo_MonitoreodeProyectos/eliminarMonitoreo',
      'Mo_MonitoreodeProyectos/eliminarProducto',
      'Mo_Actividad/Insertar',
      'Mo_Actividad/editar',
      'Mo_Actividad/eliminar',
      'Mo_Ejecucion_Actividad/Insertar',
      'Mo_Ejecucion_Actividad/editar',
      'Mo_Ejecucion_Actividad/eliminar',
      'Mo_Monitoreo/index',
      'Mo_Monitoreo/verresultado',
      'Mo_Monitoreo/insertar',
      'Mo_Monitoreo/editar',
      'Mo_Monitoreo/eliminar',
      'Mo_Observacion/insertar',
      'Mo_Observacion/editar',
      'Mo_Observacion/eliminar',
      'Mo_Compromiso/insertar',
      'Mo_Compromiso/editar',
      'Mo_Compromiso/eliminar',
      'Mo_Compromiso/asignarresponsable',

//12345
      'bancoproyectos/Get_ubigeo_pip',
      'bancoproyectos/eliminarModalidadPi',
      'bancoproyectos/editarUbicacionGeografica',
      'bancoproyectos/eliminarUbigeo',
      'bancoproyectos/listar_modalidad_ejec',
      'bancoproyectos/Get_OperacionMantenimiento',

      'CarteraInversion/EditCartera',
      'CarteraInversion/AddCartera',
      'PmiCriterioG/ReporteCriteriosG',
      'CarteraInversion/GetCarteraFechaCierre',
      'CarteraInversion/GetCarteraFechaCierre',
      'CarteraInversion/GetCarteraFechaCierre',
      'CarteraInversion/EditCartera',
      'CarteraInversion/AddCartera',
      'PmiCriterioG/listarCriterioGPorAnios',
      'PmiCriterioEspecifico/listarCriterioEspecificos',
      'PuntajeCriterioPi/listarPuntajePorAnios',
      'bancoproyectos/listar_distrito',
      'bancoproyectos/Editar_ubigeo_proyecto',
      'bancoproyectos/listar_distrito',
      'PrincipalReportes/FuncionNumeroPip',
      'PrincipalReportes/FuncionNumeroPip',
      'PrincipalReportes/GrafDetalleMensualizado',
      'PrincipalReportes/GrafDetalleMensualizado',
      'PrincipalReportes/DatosParaEstadisticaAnualProyecto',
      'PrincipalReportes/DatosEjecucionPresupuestal',
      'PrincipalReportes/DatosCorrelativoMeta',
      'PrincipalReportes/GrafEstInfFinanciera',
      'PrincipalReportes/BuscadorPipPorCodigoReporte',
      'PrincipalReportes/GrafAvanceFinanciero',
      'PrincipalReportes/ReporteDevengadoPiaPimPorPipGraficos',
      'Importacion/codigo',
      'Importacion/anio',
      'Usuario/editUsuarioProyecto',
      'menu/getMenu',
      'menu/updateMenu',
      'menu/addMenu',
      'Personal/addcargo',
      'Personal/updatecargo',
      'DivisionFuncional/AddDivisionFucion',
      'DivisionFuncional/UpdateDivisionFucion',
      'Funcion/GetFuncion',
      'Funcion/ProyectosPorCadenaFuncional',
      'Entidad/AddEntidad',
      'Entidad/UpdateEntidad',
      'Entidad/EliminarEntidad',
      'EstadoCicloInversion/AddEstadoCicloInversion',
      'EstadoCicloInversion/UpdateEstadoCicloInversion',
      'EstadoCicloInversion/EliminarEstadoCicloInversion',
      'FuenteFinanciamiento/AddFuenteFinanciamiento',
      'FuenteFinanciamiento/UpdateFuenteFinanciamiento',
      'FuenteFinanciamiento/EliminarFuenteFinanciamiento',
      'Funcion/AddFucion',
      'Funcion/UpdateFuncion',
      'Gerencia/AddGerencia',
      'Gerencia/UpdateGerencia',
      'GrupoFuncional/AddGrupoFuncional',
      'GrupoFuncional/UpdateGrupoFuncional',
      'Funcion/GetFuncion',
      'DivisionFuncional/GetDivisionFuncional',
      'Sector/GetSector',
      'MFuncion/GetGrupoFuncional',
      'Importar/addImportar',
      'Indicador/AddIndicador',
      'Indicador/UpdateIndicador',
      'Indicador/DeleteIndicador',
      'MantenimientoBrecha/AddBrecha',
      'MantenimientoBrecha/UpdateBrecha',
      'ServicioPublico/GetServicioAsociado',
      'MantenimientoBrecha/DeleteBrecha',
      'Meta/EditarMetaPresupuestal',
      'Meta/AddMeta',
      'meta/Eliminar_meta_prepuestal',
      'MetaPresupuestal/AddMetaP',
      'MetaPresupuestal/UpdateMetaP',
      'MFuncion/AddFucion',
      'MFuncion/UpdateFuncion',
      'MFuncion/AddDivisionFucion',
      'MFuncion/UpdateDivisionFucion',
      'MFuncion/AddGrupoFuncional',
      'MFuncion/UpdateGrupoFuncional',
      'MSectorEntidadSpu/EliminarSector1',
      'MFuncion/GetFuncion',
      'MFuncion/GetDivisionFuncional',
      'MSectorEntidadSpu/GetSector',
      'ModalidadEjecucion/AddModalidadE',
      'ModalidadEjecucion/UpdateModalidadE',
      'MRubroEjecucion/AddRubroE',
      'MRubroEjecucion/UpdateRubroE',
      'MRubroEjecucion/EliminarRubroEjecucion',
      'FuenteFinanciamiento/get_FuenteFinanciamiento',
      'MSectorEntidadSpu/AddSector',
      'MSectorEntidadSpu/UpdateSector',
      'MSectorEntidadSpu/AddEntidad',
      'MSectorEntidadSpu/UpdateEntidad',
      'MSectorEntidadSpu/AddServicioAsociado',
      'MSectorEntidadSpu/UpdateServicioAsociado',
      'MSectorEntidadSpu/EliminarSector',
      'MSectorEntidadSpu/GetSector',
      'MSectorEntidadSpu/EliminarEntidad',
      'TipologiaInversion/AddNaturalezaInversion',
      'TipologiaInversion/UpdateNaturalezaInversion',
      'TipologiaInversion/EliminarNaturalezaInversion',
      'NivelGobierno/AddNivelGobierno',
      'NivelGobierno/UpdateNivelGobierno',
      'NivelGobierno/EliminarNivelGobierno',
      'Oficina/AddOficina',
      'Oficina/UpdateOficina',
      'SubGerencia/GetSubGerencia',
      'Personal/AddPersonal',
      'Personal/UpdatePersonal',
      'Personal/GetPersona',
      'Oficina/GetOficina',
      'Personal/GetEspecilidad',
      'ProgramaPresupuestal/AddProgramaP',
      'ProgramaPresupuestal/UpdateProgramaP',
      'ProgramaPresupuestal/EliminarProgramaP',
      'Sector/AddSector',
      'Sector/UpdateSector',
      'Sector/EliminarSector',
      'Sector/GetSector',
      'ServicioPublico/UpdateServicioAsociado',
      'ServicioPublico/AddServicioAsociado',
      'ServicioPublico/EliminarServicioPublico',
      'SubGerencia/AddSubGerencia',
      'SubGerencia/UpdateSubGerencia',
      'Gerencia/GetGerencia',
      'TipologiaInversion/AddTipoInversion',
      'TipologiaInversion/UpdateTipoInversion',
      'TipologiaInversion/EliminarTipoInversion',
      'TipologiaInversion/AddTipologiaInversion',
      'TipologiaInversion/UpdateTipologiaInversion',
      'TipologiaInversion/EliminarTipologiaInversion',
      'TipologiaInversion/AddTipoNoPip',
      'TipologiaInversion/UpdateTipoNoPip',
      'TipologiaInversion/EliminarTipoNoPip',
      'UnidadE/AddUnidadE',
      'UnidadE/UpdateUnidadE',
      'UnidadF/AddUnidadF',
      'UnidadF/UpdateUnidadF',
      'PrincipalFyE/GetAprobadosEstudio',
      'PrincipalFyE/EstudioInvPorTipoEstudio',
      'PrincipalFyE/TipoGastoMontos',
      'PrincipalFyE/EstudioInvPorProvincia',
      'PrincipalFyE/AvanceCostoInv',
      'PrincipalFyE/getDatosEstudiosInversionNotificacion',
      'PrincipalPmi/get_cantidad_costo_tipo_pi',
      'PrincipalPmi/EstadisticaPipProvinc',
      'PrincipalPmi/EstadisticaMontoPipProvincias',
      'PrincipalPmi/EstadisticaPipEstadoCiclo',
      'PrincipalPmi/GetDatosUbicacion',
      'programar_pip/GetAnioCarteraProgramado',
      'PrincipalPmi/EstadisticaPipProvinc',
      'PrincipalPmi/EstadisticaMontoPipProvincias',
      'PrincipalPmi/EstadisticaPipEstadoCiclo',
      'PrincipalPmi/EstadisticaMontoPipCicloInversion',
      'PrincipalReportes/GetAprobadosEstudio',
      'PrincipalReportes/NaturalezaInversionMontos',
      'PrincipalReportes/CantidadPipFuenteFinancimiento',
      'PrincipalReportes/CantidadPipModalidad',
      'PrincipalReportes/MontoPipModalidad',
      'PrincipalReportes/CantidadPipRubro',
      'PrincipalReportes/CantidadPipProvincia',
      'PrincipalReportes/FuncionNumeroPip',
      'Estudio_Inversion/get_UnidadFormuladora',
      'DenominacionFE/AddDenominacionFE',
      'DenominacionFE/UpdateDenominacionFE',
      'Estudio_Inversion/get_listaproyectos',
      'Estudio_Inversion/get_TipoEstudio',
      'Estudio_Inversion/get_NivelEstudio',
      'Estudio_Inversion/get_UnidadEjecutora',
      'Estudio_Inversion/get_UnidadFormuladora',
      'Estudio_Inversion/get_listaproyectosCargar',
      'Estudio_Inversion/AddEstudioInversion',
      'Estudio_Inversion/AddDocumentosEstudio',
      'Estudio_Inversion/AddEtapaEstudio',
      'Estudio_Inversion/AddResponsableEstudio',
      'EstadoCicloInversion/listarEstadoCicloNombre',
      'Estudio_Inversion/GetDocumentosEstudio',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_etapasFE',
      'EtapasFE/AddEtapasFE',
      'EtapasFE/UpdateEtapasFE',
      'EstadoEtapa_FE/AddEstadoEtapa_FE',
      'FEsituacion/AddSituacion',
      'Estudio_Inversion/AddAsiganarPersona',
      'EvaluacionFE/GetDetallesituacionActual',
      'FEestado/get_FEestado',
      'FEsituacion/get_FEsituacion',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_cargo',
      'EstadoEtapa_FE/AddEstadoEtapa_FE',
      'FEsituacion/AddSituacion',
      'Estudio_Inversion/AddAsiganarPersona',
      'EvaluacionFE/GetDetallesituacionActual',
      'FEestado/get_FEestado',
      'FEsituacion/get_FEsituacion',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_cargo',
      'FEActividadEntregable/Add_Actividades',
      'FEActividadEntregable/MostrarAvance',
      'FEActividadEntregable/Update_Actividades',
      'FEActividadEntregable/AsignacionPersonalActividad',
      'FEActividadEntregable/CalcularAvanceActividad',
      'FEentregableEstudio/UpdateEntregableAvance',
      'FEentregableEstudio/get_entregableId',
      'FEentregableEstudio/calcular_AvaceFisico',
      'FEsituacion/AddSituacion',
      'Estudio_Inversion/AddAsiganarPersona',
      'EvaluacionFE/GetDetallesituacionActual',
      'FEsituacion/get_FEsituacion',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_cargo',
      'FEentregableEstudio/MostrarAvance',
      'FEActividadEntregable/ObservacionActividad',
      'FEActividadEntregable/LevantaminetoObservacionActividad',
      'FEentregableEstudio/AsignacionPersonalEntregable',
      'FEentregableEstudio/MostrarAvance',
      'FEentregableEstudio/Add_Entregable',
      'FEentregableEstudio/editar_Entregable',
      'DenominacionFE/GetDenominacionFE',
      'FEActividadEntregable/Update_Actividades',
      'FEActividadEntregable/listadoObservacion',
      'FEActividadEntregable/VerValoracionRestanteActividad',
      'FEestado/add_FEestado',
      'FEestado/updateFEestado',
      'EstadoEtapa_FE/AddEstadoEtapa_FE',
      'FEsituacion/AddSituacion',
      'Estudio_Inversion/AddAsiganarPersona',
      'EvaluacionFE/GetDetallesituacionActual',
      'FEestado/get_FEestado',
      'FEsituacion/get_FEsituacion',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_cargo',
      'FEnivelEstudio/add_NivelEstudio',
      'FEnivelEstudio/Update_NivelEstudio',
      'FEsituacion/add_FEsituacion',
      'FEsituacion/update_FEsituacion',
      'FEsituacion/AddSituacion',
      'Estudio_Inversion/AddAsiganarPersona',
      'EvaluacionFE/GetDetallesituacionActual',
      'FEsituacion/get_FEsituacion',
      'Estudio_Inversion/get_persona',
      'Estudio_Inversion/get_cargo',
      'FEentregableEstudio/get_gantt',
      'TipEstudioFE/AddTipoEstudioFE',
      'TipEstudioFE/UpdateTipoEstudioFE',
      'TipEstudioFE/deleteTipoEstudioFE',
      'bancoproyectos/update_pip',
      'bancoproyectos/AddOperacionMantenimiento',
      'CarteraInversion/GetCarteraAnios',
      'bancoproyectos/update_no_pip',
      'bancoproyectos/AddNoPip',
      'bancoproyectos/AddOperacionMantenimiento',
      'bancoproyectos/AddTipoNoPip',
      'bancoproyectos/AddModalidadEjecPI',
      'bancoproyectos/AddRurboPI',
      'bancoproyectos/AddEstadoCicloPI',
      'bancoproyectos/Add_ubigeo_proyecto',
      'EstadoCicloInversion/get_EstadoCicloInversion',
      'TipologiaInversion/get_NaturalezaInversion',
      'NivelGobierno/get_NivelGobierno',
      'UnidadE/GetUnidadE',
      'MFuncion/GetFuncion',
      'DivisionFuncional/GetDivisioFuncuonaId',
      'GrupoFuncional/GetGrupoFuncional',
      'FuenteFinanciamiento/get_FuenteFinanciamiento',
      'bancoproyectos/listar_rubro',
      'bancoproyectos/listar_rubro_pi',
      'TipologiaInversion/get_TipologiaInversion',
      'ProgramaPresupuestal/GetProgramaP',
      'bancoproyectos/listar_estado',
      'bancoproyectos/listar_provincia',
      'bancoproyectos/listar_distrito',
      'TipologiaInversion/get_tipo_no_pip',
      'bancoproyectos/AddModalidadEjecPI',
      'bancoproyectos/AddRurboPI',
      'bancoproyectos/AddEstadoCicloPI',
      'bancoproyectos/Add_ubigeo_proyecto',
      'bancoproyectos/AddProyectos',
      'EstadoCicloInversion/get_EstadoCicloInversion',
      'TipologiaInversion/get_NaturalezaInversion',
      'NivelGobierno/get_NivelGobierno',
      'UnidadE/GetUnidadE',
      'MFuncion/GetFuncion',
      'DivisionFuncional/GetDivisioFuncuonaId',
      'GrupoFuncional/GetGrupoFuncional',
      'FuenteFinanciamiento/get_FuenteFinanciamiento',
      'TipologiaInversion/get_TipologiaInversion',
      'ProgramaPresupuestal/GetProgramaP',
      'ModalidadEjecucion/GetModalidadE',
      'bancoproyectos/listar_estados',
      'bancoproyectos/listar_provincia',
      'bancoproyectos/listar_distrito',
      'Estudio_Inversion/get_UnidadFormuladora',
      'Meta/EditarMetaPresupuestal',
      'Meta/AddMeta',
      'meta/Eliminar_meta_prepuestal',
      'programar_nopip/AddProgramacion',
      'programar_nopip/AddMeta_PI',
      'programar_nopip/EliminarProgramacion',
      'programar_nopip/EliminarMetaPI',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'Meta/listar_correlativo',
      'Meta/listar_meta_presupuestal',
      'programar_pip/AddProgramacion_operacion_mantenimiento',
      'programar_pip/AddProgramacion',
      'programar_pip/AddMeta_PI',
      'programar_nopip/EliminarProgramacion',
      'programar_pip/Eliminar_meta_prepuestal_pi',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'Meta/listar_correlativo',
      'Meta/listar_meta_presupuestal',
      'programar_pip/GetAnioCarteraProgramado',
      'Programacion/AddProgramacion',
      'Programacion/AddProgramacionOperManteni',
      'ServicioPublico/GetServicioAsociado',
      'Programacion/AddProgramacion',
      'CarteraInversion/GetCarteraInvFechAct',
      'Programacion/AddProgramacionTemp',
      'ProyectoInversion/GetProyectoInversionUltimo',
      'MantenimientoBrecha/GetBrecha',
      'CarteraInversion/GetCarteraInvFechAct',
      'ProyectoInversion/AddProyecto',
      'Programacion/BuscarProyectoInversion',
      'criterio/addPrioridad',
      'programar_nopip/AddProgramacion',
      'programar_nopip/AddMeta_PI',
      'programar_nopip/EliminarProgramacion',
      'programar_nopip/EliminarMetaPI',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'Meta/listar_correlativo',
      'Meta/listar_meta_presupuestal',
      'criterio/addPrioridad',
      'programar_pip/AddProgramacion_operacion_mantenimiento',
      'programar_pip/AddProgramacion',
      'programar_pip/AddMeta_PI',
      'programar_nopip/EliminarProgramacion',
      'programar_pip/Eliminar_meta_prepuestal_pi',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'programar_pip/GetAnioCartera',
      'MantenimientoBrecha/GetBrecha',
      'Meta/listar_correlativo',

      'Meta/listar_meta_presupuestal',
      'EstadoCicloInversion/get_EstadoCicloInversion',
      'TipologiaInversion/get_TipologiaInversion',
      'TipologiaInversion/get_NaturalezaInversion',
      'NivelGobierno/get_NivelGobierno',
      'UnidadE/GetUnidadE',
      'MFuncion/GetFuncion',
      'FuenteFinanciamiento/get_FuenteFinanciamiento',
      'TipologiaInversion/get_TipoInversion',
      'GrupoFuncional/GetGrupoFuncionalId',
      'ProgramaPresupuestal/GetProgramaP',
      'ModalidadEjecucion/GetModalidadE',
      'DivisionFuncional/GetDivisioFuncuonaId',
      'MRubroEjecucion/GetRubroId',
      'ProyectoInversion/BuscarProyectoInversion',
      'MUbicacion/get_distritos',
      'MUbicacion/get_provincias',
      'MUbicacion/get_departamento',
      'Login/cerrar',
      'Usuario/AddUsuario',
      'Personal/ListarPersonal',
      'Usuario/ListarTipoUsuario',
      'Login/recuperarMenu/0',
      'Login/recuperarMenu/',

      'programar_nopip/Get_no_pip',
      'programar_pip/GetProyectosEjecucion',
      'programar_pip/GetProyectosFormulacionEvaluacion',
      'programar_pip/GetProyectosFuncionamiento',
      'bancoproyectos/GetProyectoInversion',
      'bancoproyectos/GetNOPIP',
      'CarteraInversion/GetCarteraInversion',
      'Programacion/GetProgramacion',
      'Programacion/GetProgramacionModificar',
      'PipProgramados/GetPipOperacionMantenimiento',
      'PipProgramados/GetPipProgramadosEjecucion',
      'PipProgramados/GetPipProgramadosFormulacionEvaluacion',
      'NoPipProgramados/GetNoPipProgramados',
      'programar_pip/GetAnioCarteraProgramado',
      'Indicador/GetIndicador',
      'Funcion/GetProvincia',
      'Funcion/GetListaFuncion',
      'Usuario/editUsuario',
      'Estudio_Inversion/get_EstudioInversion',
      'FEformulacion/GetFormulacion',
      'EvaluacionFE/GetEvaluacionFE',
      'FEformulacion/GetFEViabilizado',
      'TipEstudioFE/GetTipEstudioFE',
      'FEnivelEstudio/get_FEnivelEstudio',
      'EtapasFE/GetEtapasFE',
      'Entidad/GetEntidad',
      'MRubroEjecucion/GetRubroE',
      'UnidadF/GetUnidadF',
      'Personal/getcargo',
      'personal/GetPersonal',
      'meta/listar_meta',
      'Usuario/asignarProyecto',
      'Mo_MonitoreodeProyectos/EditarProducto',
      'Mo_MonitoreodeProyectos/InsertarProducto',
      'Mo_Actividad/eliminar',
      'Mo_MonitoreodeProyectos/eliminarProducto',
      'Mo_MonitoreodeProyectos/eliminarMonitoreo',
      'Expediente_Tecnico/verdetalle',  // Expediente_Tecnico/verdetalle?id=variable
      'ProyectoInversion/ReporteBuscadorPorPip',
      'Expediente_Tecnico/editar',
      'ET_PER_REQ/insertar',
      'Expediente_Tecnico/vistoBueno',
      'ET_Componente/insertar',
      'ET_Tarea/index',
      'Expediente_Tecnico/valorizacionEjecucionProyecto',
      'Expediente_Tecnico/ResponsableExpediente',
      'Expediente_Tecnico/DocumentoExpediente',
      'Expediente_Tecnico/DetalleExpediente',
      'Expediente_Tecnico/ReporteEstadistico',

      'Expediente_Tecnico/reportePdfExpedienteTecnico',
      'Expediente_Tecnico/reportePdfPresupuestoFF05',
      'Expediente_Tecnico/reportePdfPresupuestoAnalitico',
      'Expediente_Tecnico/reportePdfMetrado',
      'Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11',
      'Expediente_Tecnico/reportePdfValorizacionEjecucion',
      'Expediente_Tecnico/reportePdfInformeMensual',
      'Expediente_Tecnico/reportePdfValorizacionFisica',
      'Expediente_Tecnico/reportePdfEjecucion007',

      'Expediente_Tecnico/ejecucion',
      'Expediente_Tecnico/index',
      'Expediente_Tecnico/ControlMetrado',
      'Expediente_Tecnico/ValorizacionFisicaMetrado',

      'ET_Partida/insertar',
      'ET_Partida/eliminar',
      'ET_Partida/editarCambiosPartida',
      'ET_Meta/insertar',
      'ET_Meta/editarDescMeta',
      'ET_Meta/eliminar',
      'ET_Componente/editarDescComponente',
      'ET_Componente/eliminar',
      'ET_Analisis_Unitario/insertar',
      'ET_Analisis_Unitario/insertarinsumo',
      'ET_Analisis_Unitario/eliminar',
      'ET_Analisis_Unitario/actualizarAnalitico',
      'ET_Analisis_Unitario/cargarNivel',
      'ET_Clasificador/index',
      'ET_Clasificador/BuscarDetalleClasificador',
      'ET_Clasificador/insertar',
      'ET_Clasificador/editar',
      'ET_Clasificador/eliminar',
      'ET_Comentario/insertar',
      'ET_Comentario/eliminar',
      'ET_Detalle_Analisis_Unitario/insertar',
      'ET_Detalle_Analisis_Unitario/eliminar',
      'ET_Detalle_Partida/insertar',
      'ET_Documento_Ejecucion/insertar',
      'ET_Documento_Ejecucion/eliminar',
      'ET_Documento_Ejecucion/descargar',
      'ET_Especialista_Tarea/insertar',
      'ET_Especialista_Tarea/eliminar',
      'ET_Especialista_Tarea/asignarPersonal',
      'ET_Etapa_Ejecucion/insertar',
      'ET_Etapa_Ejecucion/index',
      'ET_Etapa_Ejecucion/editar',
      'ET_Img/eliminar',
      'ET_Insumo/verPorDescripcion',
      'ET_Levantamiento_Obs/editar',
      'ET_Levantamiento_Obs/insertar',
      'ET_Lista_Partida/verPorDescripcion',
      'ET_Mes_Valorizacion/insertar',
      'ET_Observacion_Tarea/eliminar',
      'ET_Observacion_Tarea/insertar',
      'ET_Per_Req/insertar',
      'ET_Per_Req/eliminar',
      'ET_Per_Req/asignarPersonal',
      'ET_Per_Req/asignarQuitarCraet',
      'ET_Presupuesto_Analitico/insertar',
      'ET_Presupuesto_Analitico/eliminar',
      'ET_Presupuesto_Ejecucion/index',
      'ET_Presupuesto_Ejecucion/eliminar',
      'ET_Presupuesto_Ejecucion/insertar',
      'ET_Presupuesto_Ejecucion/editar',
      'ET_Recurso/index',
      'ET_Recurso/eliminar',
      'ET_Recurso/insertar',
      'ET_Recurso/editar',
      'ET_Responsable_Tarea/asignar',
      'ET_Tarea/index',
      'ET_Tarea/insertarBloque',
      'ET_Tarea/administrarDetalleETTarea',
      'ET_Tarea_Observacion/insertar',
      'ET_Tarea_Observacion/eliminar',
      'ET_Tarea_Observacion/levantarObservacion',
      'ET_Tarea_Observacion/eliminarLevantamientoObservacion',
      'ET_Tipo_Gasto/insertar',
      'ET_Tipo_Gasto/editar',
      'ET_Tipo_Gasto/index',
      'ET_Tipo_Responsable/insertar',
      'ET_Tipo_Responsable/editar',
      'ET_Tipo_Responsable/index',















      'PrincipalReportes/DetalleAnalitico',
      'PrincipalReportes/DetalleClasificador',
      'PrincipalReportes/DetalleMensualizado',
      'PrincipalReportes/DetalleMensualizadoFuenteFinan',
      'PrincipalReportes/detalladoMensualizadoConceptoClasificador',
      'PrincipalReportes/detallePedidoCompraMeta',
      'PrincipalReportes/detallePorCadaPedido',
      'CarteraInversion/editarCartera',
      'CarteraInversion/itemCartera',
      'NoPipProgramados/insertar',
      'NoPipProgramados/editar',
      'PrincipalReportes/detalleOrdenExpSiaf',
      'PrincipalReportes/detallePorCadaNumOrden',
      'FEformulacion/Feformulacion',
      'EvaluacionFE/FeEvaluacion',
      'FEformulacion/FeAprobado',
      'FEformulacion/FeViabilizado',
      'Estudio_Inversion/get_etapas_estudio',
      'Estudio_Inversion/get_estado_PI',
      'programar_pip/listar_programacion',
      'programar_pip/listar_programacion_operacion_mantenimiento',
      'programar_nopip/listar_metas_pi',
      'PmiCriterioG/insertar',
      'PmiCriterioG/criterioFuncion',
      'PmiCriterioG/editar',
      'PmiCriterioG/eliminar',
      'PmiCriterioEspecifico/index',
      'PmiCriterioEspecifico/editar',
      'PmiCriterioEspecifico/eliminar',
      'PuntajeCriterioPi/index',
      'PuntajeCriterioPi/insertar',
      'FEestado/EliminarFEestado',
      'MetaPip/meta_pip',
      'ET_Tarea/insertarBloque',
      'FEentregableEstudio/ver_FEentregable',
      'Unidad_Medida/editar',
      'Unidad_Medida/insertar',
      'FE_Presupuesto_Inv/index',

      'FE_Presupuesto_Inv/insertar',
      'FE_Presupuesto_Inv/verDetalle',
      'FE_Presupuesto_Inv/editar',
      'FE_Detalle_Presupuesto/insertar',

      'ET_Per_Req/asignarPersonal',
      'ET_Per_Req/eliminar',
      'ET_Per_Req/insertar',
      'ET_Componente/editarDescComponente',
      'ET_Meta/insertar',
      'ET_Componente/eliminar',
      'ET_Meta/editarDescMeta',
      'ET_Meta/eliminar',
      'ET_Partida/insertar',
      'Usuario/addUsuario',
      'Usuario/validateUsername',
      'FEestado/EliminarEstado',
      'FEnivelEstudio/EliminarNivelEstudios',
      'FEsituacion/EliminarSituacion',
      'EtapasFE/EliminarEtapa'
);
    foreach( $lista_API as $value ) {
      array_push($arrayPermitido, $value);
    }

    if(in_array($url, $arrayPermitido))
    {
        return true;
    }
    else
    {
        return false;
    }
}
