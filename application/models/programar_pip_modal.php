<?php
defined('BASEPATH') or exit('No direct script access allowed');
class programar_pip_modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //listar formulacion y evaluacion del primer modulo PMI
    public function GetProyectosFormulacionEvaluacion($flat)
    {
        $GetProyectosFormulacionEvaluacion = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetProyectosFormulacionEvaluacion->num_rows() > 0) {
            return $GetProyectosFormulacionEvaluacion->result();
        } else {
            return false;
        }
    }
    public function GetProyectosEjecucion($flat)
    {
        $GetProyectosEjecucion = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetProyectosEjecucion->num_rows() > 0) {
            return $GetProyectosEjecucion->result();
        } else {
            return false;
        }
    }
    public function GetProyectosFuncionamiento($flat)
    {
        $GetProyectosFuncionamiento = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetProyectosFuncionamiento->num_rows() > 0) {
            return $GetProyectosFuncionamiento->result();
        } else {
            return false;
        }
    }
    //listar anio cartera programar
    public function GetAnioCartera()
    {
        $GetAnioCartera = $this->db->query("select id_cartera,year(año_apertura_cartera) AS anio from CARTERA_INVERSION where estado_cartera='1'");
        if ($GetAnioCartera->num_rows() > 0) {
            return $GetAnioCartera->result();
        } else {
            return false;
        }
    }
    //listar anio cartera  programado
    public function GetAnioCarteraProgramado()
    {
        $GetAnioCartera = $this->db->query("SELECT cari.id_cartera,\n"
            . "      YEAR(año_apertura_cartera) AS anio\n"
            . "FROM   CARTERA_INVERSION cari\n"
            . "      INNER JOIN PROGRAMACION prog ON prog.id_cartera = cari.id_cartera\n"
            . "WHERE  estado_cartera = '1'\n"
            . "GROUP BY cari.id_cartera,\n"
            . "        YEAR(año_apertura_cartera)\n"
            . "ORDER BY anio");
        if ($GetAnioCartera->num_rows() > 0) {
            return $GetAnioCartera->result();
        } else {
            return false;
        }
    }
    //Add programacion
    public function AddProgramacion($flat, $id_programacion, $Cbx_AnioCartera, $cbxBrecha, $txt_id_pip_programacion, $txt_anio1, $txt_anio2, $txt_anio3, $txt_prioridad)
    {
        $this->db->query("execute sp_Gestionar_Programacion_pip'" . $flat . "','"
            . $id_programacion . "','"
            . $Cbx_AnioCartera . "','"
            . $cbxBrecha . "','"
            . $txt_id_pip_programacion . "','"
            . $txt_anio1 . "','"
            . $txt_anio2 . "','"
            . $txt_anio3 . "','"
            . $txt_prioridad . "'");

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add programacion
    public function AddProgramacion_operacion_mantenimiento($flat, $id_programacion_, $Cbx_AnioCartera_, $cbxBrecha_, $txt_id_pip_programacion_, $txt_anio1_, $txt_anio2_, $txt_anio3_, $txt_prioridad_)
    {
        $this->db->query("execute sp_Gestionar_Programacion_pip'" . $flat . "','"
            . $id_programacion_ . "','"
            . $Cbx_AnioCartera_ . "','"
            . $cbxBrecha_ . "','"
            . $txt_id_pip_programacion_ . "','"
            . $txt_anio1_ . "','"
            . $txt_anio2_ . "','"
            . $txt_anio3_ . "','"
            . $txt_prioridad_ . "'");

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add meta pi
    public function AddMeta_PI($flat, $id_meta_pi, $cbx_Meta, $txt_id_pip_programacion_mp, $txt_pia, $txt_pim, $txt_devengado)
    {
        $this->db->query("execute sp_Gestionar_Meta_Presupuestal_Pi'" . $flat . "','"
            . $id_meta_pi . "','"
            . $cbx_Meta . "','"
            . $txt_id_pip_programacion_mp . "','"
            . $txt_pia . "','"
            . $txt_pim . "','"
            . $txt_devengado . "'");

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //listar formulacion y evaluacion del primer modulo PMI
    public function listar_programacion($flat, $id_pi)
    {
        $listar_programacion = $this->db->query("execute sp_Gestionar_Programacion_pip @opcion='"
            . $flat . "',
            @id_pi='" . $id_pi . "'");
        if ($listar_programacion->num_rows() > 0) {
            return $listar_programacion->result();
        } else {
            return false;
        }
    }
    //listar programacion para operacion y mantenimiento
    public function listar_programacion_operacion_mantenimiento($flat, $id_pi)
    {
        $listar_programacion_operacion_mantenimiento = $this->db->query("execute sp_Gestionar_Programacion_pip @opcion='"
            . $flat . "',
            @id_pi='" . $id_pi . "'");
        if ($listar_programacion_operacion_mantenimiento->num_rows() > 0) {
            return $listar_programacion_operacion_mantenimiento->result();
        } else {
            return false;
        }
    }
    //listar metas de los proyectos
    public function listar_metas_pi($flat, $id_pi)
    {
        $listar_metas_pi = $this->db->query("execute sp_Gestionar_Meta_Presupuestal_Pi @FLAT='"
            . $flat . "',
            @id_pi='" . $id_pi . "'");
        if ($listar_metas_pi->num_rows() > 0) {
            return $listar_metas_pi->result();
        } else {
            return false;
        }
    }

}
