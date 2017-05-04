<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TipoInversion_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_TipoInversion($flat, $txt_IdTipoInversion, $txt_NombreTipoInversion, $txt_DescripcionTipoInversion, $user)
    {
        //  $TipoInversion = $this->db->query("execute get");
        $TipoInversion = $this->db->query("execute SP_GESTIONAR_TipoInversion'" . $flat . "','" . $txt_IdTipoInversion . "', '" . $txt_NombreTipoInversion . "','" . $txt_DescripcionTipoInversion . "','" . $user . "' ");
        if ($TipoInversion->num_rows() > 0) {
            return $TipoInversion->result();
        } else {
            return false;
        }
    }

    public function AddTipoInversion($flat, $txt_IdTipoInversion, $txt_NombreTipoInversion, $txt_DescripcionTipoInversion, $user)
    {

        $this->db->query("execute SP_GESTIONAR_TipoInversion'" . $flat . "','" . $txt_IdTipoInversion . "', '" . $txt_NombreTipoInversion . "','" . $txt_DescripcionTipoInversion . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarTipoInversion($flat, $txt_IdTipoInversion, $txt_NombreTipoInversion, $txt_DescripcionTipoInversion, $user)
    {

        $this->db->query("execute SP_GESTIONAR_TipoInversion'" . $flat . "','" . $txt_IdTipoInversion . "', '" . $txt_NombreTipoInversion . "','" . $txt_DescripcionTipoInversion . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function UpdateTipoInversion($flat, $txt_IdTipoInversionM, $txt_NombreTipoInversionM, $txt_DescripcionTipoInversionM, $user)
    {

        $this->db->query("execute SP_GESTIONAR_TipoInversion'" . $flat . "','" . $txt_IdTipoInversionM . "', '" . $txt_NombreTipoInversionM . "','" . $txt_DescripcionTipoInversionM . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
