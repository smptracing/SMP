<?php
defined('BASEPATH') or exit('No direct script access allowed');
class EstadoCicloInversion_MOdel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_EstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $EstadoCicloInversion = $this->db->query("execute SP_GESTIONAR_EstadoCicloInversion'" . $flat . "','" . $txt_IdEstadoCicloInversion . "', '" . $txt_NombreEstadoCicloInversion . "','" . $txt_DescripcionEstadoCicloInversion . "','" . $user . "' ");
        if ($EstadoCicloInversion->num_rows() > 0) {
            return $EstadoCicloInversion->result();
        } else {
            return false;
        }
    }

    public function AddEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user)
    {

        $this->db->query("execute SP_GESTIONAR_EstadoCicloInversion'" . $flat . "','" . $txt_IdEstadoCicloInversion . "', '" . $txt_NombreEstadoCicloInversion . "','" . $txt_DescripcionEstadoCicloInversion . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user)
    {

        $this->db->query("execute SP_GESTIONAR_EstadoCicloInversion'" . $flat . "','" . $txt_IdEstadoCicloInversion . "', '" . $txt_NombreEstadoCicloInversion . "','" . $txt_DescripcionEstadoCicloInversion . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function UpdateEstadoCicloInversion($flat, $txt_IdEstadoCicloInversionM, $txt_NombreEstadoCicloInversionM, $txt_DescripcionEstadoCicloInversionM, $user)
    {

        $this->db->query("execute SP_GESTIONAR_EstadoCicloInversion'" . $flat . "','" . $txt_IdEstadoCicloInversionM . "', '" . $txt_NombreEstadoCicloInversionM . "','" . $txt_DescripcionEstadoCicloInversionM . "','" . $user . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

}
