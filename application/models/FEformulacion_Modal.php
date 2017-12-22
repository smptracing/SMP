<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FEformulacion_Modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

    }
    /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
    public function GetFormulacion($id_est_inve, $idPersona, $TipoUsuario)
    {
        $opcion        = "listar_estudio_formulacion";
        $id_est_inve   = 0;
        $idPersona     = 0;
        $FEformulacion = $this->db->query("execute sp_ListarEstudioFyE  @id_estudio_inv='" . $id_est_inve . "',@opcion='" . $opcion . "', @id_persona='" . $idPersona . "'");
        if ($FEformulacion->num_rows() >= 0) {
            return $FEformulacion->result();
        } else {
            return false;
        }
    }

    // public function GetFEAprobados($id_est_inve)
    // {

    //     $FEAprobados = $this->db->query("execute sp_ListarEstudioAprobados'"
    //         . $id_est_inve . "' ");
    //     if ($FEAprobados->num_rows() >= 0) {
    //         return $FEAprobados->result();
    //     } else {
    //         return false;
    //     }

    // }
    public function GetFEViabilizado($id_est_inve)
    {
     $ViabFE=$this->db->query("execute sp_ListarEstudioEtapas @id_estudio_inv=".$id_est_inve." , @desc_etapa='Viab%' , @etapa_en_seguimiento=1");

        if ($ViabFE->num_rows() >= 0) {
            return $ViabFE->result();
        } 
        else {
            return false;
        }
    }

    public function UFEstudioInversionFormulacion()
    {

        $opcion      = "listarEstudioFormulador";
        $FEAprobados = $this->db->query("execute sp_Gestionar_UFEstudioInversionF @opcion='" . $opcion . "'");
        return $FEAprobados->result();

    }
}
