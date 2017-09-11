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

    public function NoPipFormulacionEvaluacionListar()
    {
        $data=$this->db->query("select codigo_unico_pi,nombre_est_inv,TIPO_NOPIP.desc_tipo_nopip from ESTUDIO_INVERSION INNER JOIN PROYECTO_INVERSION ON ESTUDIO_INVERSION.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN NOPIP ON PROYECTO_INVERSION.id_pi=NOPIP.id_pi INNER JOIN TIPO_NOPIP ON NOPIP.id_tipo_nopip=TIPO_NOPIP.id_tipo_nopip");

        return $data->result();
    }

     public function listarUltimoEstudioInversion()
    {
        $data=$this->db->query("select MAX (id_est_inv)as id_est_inv from ESTUDIO_INVERSION");

        return $data->result()[0];
    }

    public function listarUltimoDocumentoInversion()
    {
        $data=$this->db->query("select MAX (id_documento)as id_documento from DOCUMENTOS_INVERSION");

        return $data->result()[0];
    }

}
