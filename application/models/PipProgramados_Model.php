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
        return $GetPipProgramadosFormulacionEvaluacion->result();
    }
    public function GetPipProgramadosEjecucion($flat, $anio)
    {
        $GetPipProgramadosEjecucion = $this->db->query("execute sp_ListarProyectoInversionProgramado'"
            . $flat . "','"
            . $anio . "' ");

        return $GetPipProgramadosEjecucion->result();
    }
    public function GetPipOperacionMantenimiento($flat, $anio)
    {
        $GetPipOperacionMantenimiento = $this->db->query("execute sp_ListarProyectoInversionProgramado'"
            . $flat . "','"
            . $anio . "' ");
        return $GetPipOperacionMantenimiento->result();
    }

}
