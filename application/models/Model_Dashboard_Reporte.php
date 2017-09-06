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
       $data = $this->db->query("select * from PROYECTO_INVERSION LEFT join META_PRESUPUESTAL_PI on PROYECTO_INVERSION.id_pi=META_PRESUPUESTAL_PI.id_pi LEFT JOIN DEVENGADO_META ON META_PRESUPUESTAL_PI.id_meta_pi=DEVENGADO_META.id_meta_pi WHERE PROYECTO_INVERSION.codigo_unico_pi='".$CodigoUnico."'");//listar EVAL
        if ($data->num_rows()> 0) 
        {
            return $data->result()[0];
        } 
        else 
        {
            return false;
        }
    }
}
