<?php
defined('BASEPATH') or exit('No direct script access allowed');
class PipProgramados_Model extends CI_Model
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

}
