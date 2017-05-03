<?php
defined('BASEPATH') or exit('No direct script access allowed');
class NaturalezaInversion_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    public function get_NaturalezaInversion($flat, $ID, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user)
    {
        $NaturalezaInversion = $this->db->query("execute SP_GESTIONAR_NATURALEZAINVERSION'" . $flat . "','" . $ID . "', '" . $txt_NombreNaturaleza . "','" . $txt_DescripcionNaturaleza . "','" . $user . "' ");
        if ($NaturalezaInversion->num_rows() > 0) {
            return $NaturalezaInversion->result();
        } else {
            return false;
        }
    }

    public function AddNaturalezaInversion($flat, $ID, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user)
    {

        $this->db->query("execute SP_GESTIONAR_NATURALEZAINVERSION'" . $flat . "','" . $ID . "', '" . $txt_NombreNaturaleza . "','" . $txt_DescripcionNaturaleza . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function UpdateNaturalezaInversion($flat, $txt_IdNaturalezaM, $txt_NombreNaturalezaM, $txt_DescripcionNaturalezaM, $user)
    {

        $this->db->query("execute SP_GESTIONAR_NATURALEZAINVERSION'" . $flat . "','" . $txt_IdNaturalezaM . "', '" . $txt_NombreNaturalezaM . "','" . $txt_DescripcionNaturalezaM . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarNaturalezaInversion($flat, $txt_IdNaturaleza, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user)
    {

        $this->db->query("execute SP_GESTIONAR_NATURALEZAINVERSION'" . $flat . "','" . $txt_IdNaturaleza . "', '" . $txt_NombreNaturaleza . "','" . $txt_DescripcionNaturaleza . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
