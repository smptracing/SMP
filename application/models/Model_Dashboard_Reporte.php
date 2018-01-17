<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Dashboard_Reporte extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function GetAprobadosEstudio()
    {
        $estudios = $this->db->query("select nombre_naturaleza_inv, count(nombre_pi)as Cantidadpip from PROYECTO_INVERSION right join NATURALEZA_INVERSION ON PROYECTO_INVERSION.id_naturaleza_inv=NATURALEZA_INVERSION.id_naturaleza_inv group by nombre_naturaleza_inv");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

    function NaturalezaInversionMontos()
    {
        $estudios = $this->db->query("select nombre_naturaleza_inv, sum (costo_pi) as Monto from PROYECTO_INVERSION left join NATURALEZA_INVERSION ON PROYECTO_INVERSION.id_naturaleza_inv=NATURALEZA_INVERSION.id_naturaleza_inv group by nombre_naturaleza_inv");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

    function CantidadPipFuenteFinancimiento()
    {
        $estudios = $this->db->query("select nombre_fuente_finan , count(nombre_pi)as Cantidadpip from PROYECTO_INVERSION RIGHT JOIN RUBRO_PI on PROYECTO_INVERSION.id_pi=RUBRO_PI.id_pi RIGHT JOIN RUBRO ON RUBRO_PI.id_rubro=RUBRO.id_rubro RIGHT JOIN FUENTE_FINANCIAMIENTO ON RUBRO.id_fuente_finan=FUENTE_FINANCIAMIENTO.id_fuente_finan GROUP BY  nombre_fuente_finan ");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

    function MontoPipFuenteFinanciamiento()
    {
        $estudios = $this->db->query("select nombre_fuente_finan , sum(costo_pi)as Monto from PROYECTO_INVERSION RIGHT JOIN RUBRO_PI on PROYECTO_INVERSION.id_pi=RUBRO_PI.id_pi RIGHT JOIN RUBRO ON RUBRO_PI.id_rubro=RUBRO.id_rubro RIGHT JOIN FUENTE_FINANCIAMIENTO ON RUBRO.id_fuente_finan=FUENTE_FINANCIAMIENTO.id_fuente_finan GROUP BY  nombre_fuente_finan");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

    function CantidadPipModalidad()
    {
        $estudios = $this->db->query("select nombre_modalidad_ejec,count(nombre_pi)as CantidadPip FROM MODALIDAD_EJECUCION left JOIN MODALIDAD_EJECUCION_PI ON MODALIDAD_EJECUCION.id_modalidad_ejec=MODALIDAD_EJECUCION_PI.id_modalidad_ejec left JOIN PROYECTO_INVERSION ON MODALIDAD_EJECUCION_PI.id_pi=PROYECTO_INVERSION.id_pi group by nombre_modalidad_ejec");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

    function MontoPipModalidad()
    {
        $data = $this->db->query("select nombre_modalidad_ejec,sum(costo_pi)as Monto FROM MODALIDAD_EJECUCION left JOIN MODALIDAD_EJECUCION_PI ON MODALIDAD_EJECUCION.id_modalidad_ejec=MODALIDAD_EJECUCION_PI.id_modalidad_ejec left JOIN PROYECTO_INVERSION ON MODALIDAD_EJECUCION_PI.id_pi=PROYECTO_INVERSION.id_pi group by nombre_modalidad_ejec");//listar EVAL
        if ($data->num_rows()> 0) {
            return $data->result();
        } else {
            return false;
        }
    }

    function CantidadPipRubro()
    {
        $data = $this->db->query("select nombre_rubro ,count (nombre_pi)as Cantidadpip from RUBRO LEFT JOIN RUBRO_PI on RUBRO.id_rubro=RUBRO_PI.id_rubro LEFT JOIN PROYECTO_INVERSION on RUBRO_PI.id_pi=PROYECTO_INVERSION.id_pi group by nombre_rubro");//listar EVAL
        if ($data->num_rows()> 0) {
            return $data->result();
        } else {
            return false;
        }
    }

    function CantidadPipProvincia()
    {
        $data = $this->db->query("select UBIGEO.provincia ,count (nombre_pi)as Cantidadpip from PROYECTO_INVERSION INNER JOIN UBIGEO_PI on PROYECTO_INVERSION.id_pi=UBIGEO_PI.id_pi INNER JOIN UBIGEO on UBIGEO_PI.id_ubigeo=UBIGEO.id_ubigeo group by  UBIGEO.provincia");//listar EVAL
        if ($data->num_rows()> 0) {
            return $data->result();
        } else {
            return false;
        }
    }

    function InformacionFinanciera($CodigoUnico)
    {
        $data = $this->db->query("select codigo_unico_pi,SUM(costo_pi) as costo_pi,SUM(pia_meta_pres) as pia_meta_pres ,SUM(pim_acumulado) AS pim_acumulado,
        SUM(compromiso_acumulado) as compromiso_acumulado ,SUM(devengado_acumulado) as devengado_acumulado from 
        PROYECTO_INVERSION inner join META_PRESUPUESTAL_PI on  PROYECTO_INVERSION.id_pi=META_PRESUPUESTAL_PI.id_pi 
        where PROYECTO_INVERSION.codigo_unico_pi='".$CodigoUnico."' GROUP BY codigo_unico_pi");//listar EVAL
        if ($data->num_rows()> 0) {
            return $data->result();
        } else {
            return false;
        }
    }

    function FuncionNumeroPip()
    {
        $data=$this->db->query("select FUNCION.nombre_funcion ,count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional INNER JOIN FUNCION on DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion group by FUNCION.nombre_funcion");
        if ($data->num_rows()> 0) 
        {
            return $data->result();
        } 
        else 
        {
            return false;
        }
    }
    function ReporteDevengadoPiaPimPorPip($CodigoUnico)
    {
        $opcion='datos_generales_por_cada_pip';
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @codigo_snip='".$CodigoUnico."'");
        if ($data->num_rows()> 0) 
        {
            return $data->result()[0];
        } 
        else 
        {
            return false;
        }
    }

    function ReporteEjecucionPresupuestal($CodigoUnico)
    {
        $opcion="listar_act_proy_nombre";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @codigo_snip ='".$CodigoUnico."'");
            
            return $data->result();       
    }

    function ReporteCorrelativoMeta($CodigoUnico)
    {
        $opcion="listar_acumulado_meta";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @codigo_snip ='".$CodigoUnico."'");
            
            return $data->result();       
    }

    function DetalleMensualizadoMeta($correlativoMeta, $anioMeta)
    {
        $opcion="listar_mensualizado_meta";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @correlativo_meta='".$correlativoMeta."', @anio_meta='".$anioMeta."'");
            
            return $data->result();
    }

    function DetalleMensualizadoMetaEst($correlativoMeta, $anioMeta)
    {
        $opcion="listar_mensualizado_meta";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @correlativo_meta='".$correlativoMeta."', @anio_meta='".$anioMeta."'");
            
            //return $data->result()[0];
            return count($data->result())>0 ? $data->result()[0] : false;
    }

    function DetalleMensualizadoMetaFuente($correlativoMeta, $anioMeta)
    {
        $opcion="listar_acumulado_meta_fuente_financ";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @correlativo_meta='".$correlativoMeta."', @anio_meta='".$anioMeta."'");

        return $data->result();
    }

    function DetalleMensualizadoMetaFuenteDatosG($correlativoMeta, $anioMeta)
    {
        $opcion="listar_acumulado_meta_fuente_financ";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @correlativo_meta='".$correlativoMeta."', @anio_meta='".$anioMeta."'");

        return $data->result()[0];
    }
    function ReporteDevengadoPiaPimPorPipGraficos($CodigoUnico)
    {
        $data = $this->db->query("select codigo_unico_pi,SUM(costo_pi) as costo_pi,SUM(pia_meta_pres) as pia_meta_pres ,SUM(pim_acumulado) AS pim_acumulado,
        SUM(compromiso_acumulado) as compromiso_acumulado ,SUM(devengado_acumulado) as devengado_acumulado from 
        PROYECTO_INVERSION inner join META_PRESUPUESTAL_PI on  PROYECTO_INVERSION.id_pi=META_PRESUPUESTAL_PI.id_pi 
        where PROYECTO_INVERSION.codigo_unico_pi='".$CodigoUnico."' GROUP BY codigo_unico_pi");
        if ($data->num_rows()> 0) 
        {
            return $data->result()[0];
        } 
        else 
        {
            return false;
        }
    }

    function ReporteConsolidadoAvanceFisicoFinan($anio, $sec_ejec)
    {        
        $opcion="calificacion_seguimiento_certificado_a_devengado";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @anio_meta ='".$anio."', @sec_ejec='".$sec_ejec."'");
            
            return $data->result();  
    }

    function ReporteDetalleAnaliticoFinanciero($anio,$codigounico)
    {
        $opcion="listar_analitico_avance_proyecto";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @anio_meta='".$anio."', @codigo_snip='".$codigounico."'");
            
            return $data->result();
    }

    function ReporteDetalleAnaliticoFinancieroE($anio,$codigounico)
    {
        $opcion="listar_analitico_avance_proyecto";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @anio_meta='".$anio."', @codigo_snip='".$codigounico."'");
            
            //return $data->result()[0];
            return count($data->result())>0 ? $data->result()[0] : false;
    }

    function ReporteDetalleClasificador($anio,$codigounico)
    {
        $opcion="listar_montos_proyecto_por_clasificadores";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @anio_meta='".$anio."', @codigo_snip='".$codigounico."'");
            
        return $data->result();
    }

    function ReporteDetalleClasificadorFijos($anio,$codigounico)
    {
        $opcion="listar_montos_proyecto_por_clasificadores";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."',  @anio_meta='".$anio."', @codigo_snip='".$codigounico."'");
        
        return $data->result()[0];
    }

    
function DetallePorOrden($correlativoMeta,$anioMeta)
    {
        $opcion="listar_orden_compra";
        $data = $this->db->query("execute sp_Gestionar_SIGA @opcion='".$opcion."',  @anio_meta='".$anioMeta."', @correlativo_meta='".$correlativoMeta."'");
        
        return $data->result();
    }

    function DetallePedidoCompraMeta($correlativoMeta,$anioMeta)
    {
    $opcion="listar_pedidos_proyecto";
        $data = $this->db->query("execute sp_Gestionar_SIGA @opcion='".$opcion."',  @anio_meta='".$anioMeta."', @correlativo_meta='".$correlativoMeta."'");
        
        return $data->result();  
    }

    function DetallePorCadaPedido($nropedido,$anio,$tipopedido,$tipobien)
    {
        $opcion="listar_detalle_pedidos_proyecto";
        $data = $this->db->query("execute sp_Gestionar_SIGA @opcion='".$opcion."',  @num_pedido='".$nropedido."', @anio_meta='".$anio."', @tipo_pedido='".$tipopedido."',@tipo_bien='".$tipobien."'");
        
        return $data->result(); 
    }

    function DetalleOrdenExpedSiaf($anio,$expsiaf)
    {
        $opcion="consulta_expediente_siaf";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @anio_meta='".$anio."', @expediente_siaf='".$expsiaf."'");
        
        return $data->result(); 
    }

    function DetallePorCadaNumOrden($anio,$tipobien,$numorden,$tipoppto)
    {
        $opcion="listar_detalle_orden_compra";
        $data = $this->db->query("execute sp_Gestionar_SIGA @opcion='".$opcion."',  @anio_meta='".$anio."', @tipo_bien='".$tipobien."', @num_orden='".$numorden."',@tipo_ppto='".$tipoppto."'");
        
        return $data->result(); 
    }
    /*function ReporteConsolidadoAvanceFisicoFinan($anio)
    {
        $opcion="calificacion_seguimiento_certificado_a_devengado";
        $data = $this->db->query("execute sp_Gestionar_SIAF @opcion='".$opcion."', @anio_meta ='".$anio"'");
            
            return $data->result();       
    }*/

}
