<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PipProgramados_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //listar formulacion y evaluacion del primer modulo PMI
    public function GetPipProgramadosFormulacionEvaluacion($flat, $anio)
    {
        $GetPipProgramadosFormulacionEvaluacion = $this->db->query("execute sp_ListarProyectoInversionProgramado'"
            . $flat . "','"
            . $anio . "' ");
        if ($GetPipProgramadosFormulacionEvaluacion->num_rows() > 0) {
            return $GetPipProgramadosFormulacionEvaluacion->result();
        } else {
            return false;
        }
    }
    public function GetPipProgramadosEjecucion($flat, $anio)
    {
        $GetPipProgramadosEjecucion = $this->db->query("execute sp_ListarProyectoInversionProgramado'"
            . $flat . "','"
            . $anio . "' ");
        if ($GetPipProgramadosEjecucion->num_rows() > 0) {
            return $GetPipProgramadosEjecucion->result();
        } else {
            return false;
        }
    }
    public function GetPipOperacionMantenimiento($flat, $anio)
    {
        $GetPipOperacionMantenimiento = $this->db->query("execute sp_ListarProyectoInversionProgramado'"
            . $flat . "','"
            . $anio . "' ");
        if ($GetPipOperacionMantenimiento->num_rows() > 0) {
            return $GetPipOperacionMantenimiento->result();
        } else {
            return false;
        }
    }

}
