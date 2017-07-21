<?php
defined('BASEPATH') or exit('No direct script access allowed');
class TipoNoPip_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    public function get_tipo_no_pip()
    {
        $get_tipo_no_pip = $this->db->query("select id_tipo_nopip,desc_tipo_nopip FROM  TIPO_NOPIP");
        if ($get_tipo_no_pip->num_rows() > 0) {
            return $get_tipo_no_pip->result();
        } else {
            return false;
        }
    }

    public function AddTipoNoPip($flat, $ID, $txt_DescripcionTipoNoPipa)
    {

        $this->db->query("execute sp_Gestionar_TipoNoPIP'"
            . $flat . "','"
            . $ID . "', '"
            . $txt_DescripcionTipoNoPipa . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateTipoNoPip($flat, $txt_IdTipoNoPipM, $txt_DescripcionTipoNoPipM)
    {

        $this->db->query("execute sp_Gestionar_TipoNoPIP'" . $flat . "','" . $txt_IdTipoNoPipM . "', '" . $txt_DescripcionTipoNoPipM . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarTipoNoPip($flat, $id_tipo_nopip)
    {

        $this->db->query("execute sp_Gestionar_TipoNoPIP'" . $flat . "',@id_tipo_nopip='"
            . $id_tipo_nopip . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
