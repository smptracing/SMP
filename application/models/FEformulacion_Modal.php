<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FEformulacion_Modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetFormulacion($id_est_inve)
    {
        $FEformulacion = $this->db->query("execute sp_ListarEstudioFormulacion'" . $id_est_inve . "' ");
        if ($FEformulacion->num_rows() >= 0) {
            return $FEformulacion->result();
        } else {
            return false;
        }

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetFEAprobados($id_est_inve)
    {

        $FEAprobados = $this->db->query("execute sp_ListarEstudioAprobados'"
            . $id_est_inve . "' ");
        if ($FEAprobados->num_rows() >= 0) {
            return $FEAprobados->result();
        } else {
            return false;
        }

    }
    public function GetFEViabilizado($id_est_inve)
    {

        $FEAprobados = $this->db->query("execute sp_ListarEstudioViabilizados'"
            . $id_est_inve . "' ");
        if ($FEAprobados->num_rows() >= 0) {
            return $FEAprobados->result();
        } else {
            return false;
        }

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
}
