<?php
defined('BASEPATH') or exit('No direct script access allowed');
class NoPipProgramados_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //listar formulacion y evaluacion del primer modulo PMI
    public function GetNoPipProgramados($flat, $anio)
    {
        $GetNoPipProgramados = $this->db->query("execute sp_ListarProyectoInversionNoPipProgramado'"
            . $flat . "','"
            . $anio . "' ");
        if ($GetNoPipProgramados->num_rows() > 0) {
            return $GetNoPipProgramados->result();
        } else {
            return false;
        }
    }

    public function ListarPipProgramados()
    {
       $ListarPipProgramados = $this->db->query("SELECT * FROM  TIPO_NOPIP"); 
       return $ListarPipProgramados->result();
    }

     public function  listarNopip($desc_tipo_nopip)
    {
       $opcion='listar_nopip_programados_por_tiponopip';
       $ListarPipProgramados = $this->db->query("execute sp_Gestionar_ProyectoInversion @opcion='". $opcion."', @desc_tipo_nopip='".$desc_tipo_nopip."' "); 
       return $ListarPipProgramados->result();
    }

    public function AddEstudioInversionNoPIP($id_pi,$TipoNoPip)
    {
       $opcion='insertar';
       $ListarNoPipProgramados = $this->db->query("execute sp_Gestionar_NOPIP_FE @opcion='". $opcion."', @nombre_est_inv='".$TipoNoPip."',@id_pi='".$id_pi."' "); 
       return true;
    }

   
}
