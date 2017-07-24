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
        $GetAnioCartera = $this->db->query("select year(año_apertura_cartera) AS anio from CARTERA_INVERSION where estado_cartera='1'");
        if ($GetAnioCartera->num_rows() > 0) {
            return $GetAnioCartera->result();
        } else {
            return false;
        }
    }

}
