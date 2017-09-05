<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FEformulacion_Modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetFormulacion($id_est_inve,$idPersona,$TipoUsuario)
    {
       /* if($TipoUsuario==1)
        {
          $listar_estudio_persona='listar_estudio_completo';
        }
        else
        {
          $listar_estudio_persona='listar_estudio_persona';
        }  */   
        $tipo=0;
        $FEformulacion = $this->db->query("execute sp_ListarEstudioFormulacion @id_estudio_inv='" . $id_est_inve . "', @id_persona='".$idPersona."',@administrador='".$tipo."' ");
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
