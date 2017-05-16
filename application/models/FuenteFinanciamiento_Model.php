<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FuenteFinanciamiento_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_FuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento)
    {

        $FuenteFinanciamiento = $this->db->query("execute sp_Gestionar_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamiento . "', '" . $txt_IdRubroEjecucion . "', '" . $txt_NombreFuenteFinanciamiento . "','" . $txt_AcronimoFuenteFinanciamiento . "' ");
        if ($FuenteFinanciamiento->num_rows() > 0) {
            return $FuenteFinanciamiento->result();
        } else {
            return false;
        }
    }

    public function AddFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento)
    {

        $this->db->query("execute sp_Gestionar_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamiento . "', '" . $txt_IdRubroEjecucion . "', '" . $txt_NombreFuenteFinanciamiento . "','" . $txt_AcronimoFuenteFinanciamiento . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento)
    {

        $this->db->query("execute sp_Gestionar_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamiento . "', '" . $txt_IdRubroEjecucion . "', '" . $txt_NombreFuenteFinanciamiento . "','" . $txt_AcronimoFuenteFinanciamiento . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamientoM, $txt_IdRubroEjecucionM, $txt_NombreFuenteFinanciamientoM, $txt_AcronimoFuenteFinanciamientoM)
    {

        $this->db->query("execute sp_Gestionar_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamientoM . "', '" . $txt_IdRubroEjecucionM . "', '" . $txt_NombreFuenteFinanciamientoM . "','" . $txt_AcronimoFuenteFinanciamientoM . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
