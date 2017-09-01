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
        $estudios = $this->db->query("select nombre_naturaleza_inv, count(nombre_pi)as Cantidadpip from PROYECTO_INVERSION left join NATURALEZA_INVERSION ON PROYECTO_INVERSION.id_naturaleza_inv=NATURALEZA_INVERSION.id_naturaleza_inv group by nombre_naturaleza_inv");//listar EVAL
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
}
