<?php
defined('BASEPATH') or exit('No direct script access allowed');
class FuenteFinanciamiento_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_FuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user)
    {
        //  $FuenteFinanciamiento = $this->db->query("execute get");
        $FuenteFinanciamiento = $this->db->query("execute SP_GESTIONAR_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamiento . "', '" . $txt_NombreFuenteFinanciamiento . "','" . $txt_AcronimoFuenteFinanciamiento . "','" . $txt_DescripcionFuenteFinanciamiento . "','" . $user . "' ");
        if ($FuenteFinanciamiento->num_rows() > 0) {
            return $FuenteFinanciamiento->result();
        } else {
            return false;
        }
    }

    public function AddFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_NombreFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user)
    {

        $this->db->query("execute SP_GESTIONAR_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamiento . "', '" . $txt_NombreFuenteFinanciamiento . "','" . $txt_AcronimoFuenteFinanciamiento . "','" . $txt_DescripcionFuenteFinanciamiento . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamientoM, $txt_AcronimoFuenteFinanciamientoM, $txt_NombreFuenteFinanciamientoM, $txt_DescripcionFuenteFinanciamientoM, $user)
    {

        $this->db->query("execute SP_GESTIONAR_FuenteFinanciamiento'" . $flat . "','" . $txt_IdFuenteFinanciamientoM . "', '" . $txt_NombreFuenteFinanciamientoM . "','" . $txt_AcronimoFuenteFinanciamientoM . "','" . $txt_DescripcionFuenteFinanciamientoM . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
