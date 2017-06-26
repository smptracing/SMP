<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FEformulacion_Modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetFormulacion($Etapa)
    {

        $FEformulacion = $this->db->query("execute sp_ListarEstudioInversion'" . $Etapa . "' ");

        if ($FEformulacion->num_rows() >= 0) {
            return $FEformulacion->result();
        } else {
            return false;
        }

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
}
