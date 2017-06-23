<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_EvaluacionFE extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetEvaluacionFE($etapa)
    {
        $EvaluacionFE = $this->db->query("execute sp_ListarEstudioInversion'" . $etapa . "' ");

        if ($EvaluacionFE->num_rows() >= 0) {
            return $EvaluacionFE->result();
        } else {
            return false;
        }

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
}
