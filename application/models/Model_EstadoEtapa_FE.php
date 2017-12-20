<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_EstadoEtapa_FE extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /*añadir funcion*/
    public function GetEstadoEtapa_FE($flat, $id_estado, $txt_IdEtapa_Estudio_FE)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $EstadoEtapa = $this->db->query("execute sp_Gestionar_Estado_Etapa'"
            . $flat . "','"
            . $id_estado . "', '"
            . $txt_IdEtapa_Estudio_FE . "' ");
        if ($EstadoEtapa->num_rows() > 0) {
            return $EstadoEtapa->result();
        } else {
            return false;
        }
    }
    public function AddEstadoEtapa_FE($data)
    {
        $this->db->insert('ESTADO_ETAPA',$data);
        return $this->db->affected_rows();
    }

}
