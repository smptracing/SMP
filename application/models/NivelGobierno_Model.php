<?php
defined('BASEPATH') or exit('No direct script access allowed');
class NivelGobierno_MOdel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_NivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno)
    {
        //  $NivelGobierno = $this->db->query("execute get");
        $NivelGobierno = $this->db->query("execute sp_Gestionar_NivelGobierno'" . $flat . "','" . $txt_IdNivelGobierno . "', '" . $txt_NombreNivelGobierno . "' ");
        if ($NivelGobierno->num_rows() > 0) {
            return $NivelGobierno->result();
        } else {
            return false;
        }
    }

    public function AddNivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno)
    {

        $this->db->query("execute sp_Gestionar_NivelGobierno'" . $flat . "','" . $txt_IdNivelGobierno . "', '" . $txt_NombreNivelGobierno . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarNivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno)
    {

        $this->db->query("execute sp_Gestionar_NivelGobierno'" . $flat . "','" . $txt_IdNivelGobierno . "', '" . $txt_NombreNivelGobierno . "','" . $txt_DescripcionNivelGobierno . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateNivelGobierno($flat, $txt_IdNivelGobiernoM, $txt_NombreNivelGobiernoM)
    {

        $this->db->query("execute sp_Gestionar_NivelGobierno'" . $flat . "','" . $txt_IdNivelGobiernoM . "', '" . $txt_NombreNivelGobiernoM . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
