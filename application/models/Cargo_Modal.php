<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cargo_Modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function getcargo()
    {
        $cargo = $this->db->query("select id_cargo,Desc_cargo from cargo");
        if ($cargo->num_rows() > 0) {
            return $cargo->result();
        } else {
            return false;
        }
    }

    public function addcargo($flat, $idcargo, $txt_nombrecargo)
    {
        $Cargo = $this->db->query("execute sp_Gestionar_Cargo'"
            . $flat . "','"
            . $idcargo . "','"
            . $txt_nombrecargo . "' "
        );
        if ($Cargo->num_rows() > 0) {
            return $Cargo->result();
        } else {
            return false;
        }
    }
    public function updatecargo($flat, $txt_idcargo_m, $txt_nombrecargo_m)
    {
        $Cargo = $this->db->query("execute sp_Gestionar_Cargo'"
            . $flat . "','"
            . $txt_idcargo_m . "','"
            . $txt_nombrecargo_m . "' "
        );
        if ($Cargo->num_rows() > 0) {
            return $Cargo->result();
        } else {
            return false;
        }
    }

}
