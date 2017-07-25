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
    //listar formulacion y evaluacion del primer modulo PMI
    public function GetAnioCartera()
    {
        $GetAnioCartera = $this->db->query("select id_cartera,year(año_apertura_cartera) AS anio from CARTERA_INVERSION where estado_cartera='1'");
        if ($GetAnioCartera->num_rows() > 0) {
            return $GetAnioCartera->result();
        } else {
            return false;
        }
    }
    //Add ubigeo a un proyecto
    public function AddProgramacion($flat, $id_programacion, $Cbx_AnioCartera, $cbxBrecha, $txt_id_pip_programacion, $txt_anio1, $txt_anio2, $txt_anio3, $txt_prioridad, $txt_pia, $txt_pim, $txt_devengado)
    {
        $this->db->query("execute sp_Gestionar_Programacion_pip'" . $flat . "','"
            . $id_programacion . "','"
            . $Cbx_AnioCartera . "','"
            . $cbxBrecha . "','"
            . $txt_id_pip_programacion . "','"
            . $txt_anio1 . "','"
            . $txt_anio2 . "','"
            . $txt_anio3 . "','"
            . $txt_prioridad . "','"
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

}
