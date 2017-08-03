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

}
