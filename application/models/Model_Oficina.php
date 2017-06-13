<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Oficina extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    /*añadir funcion*/
    function GetOficina()
    {
        $funcion = $this->db->query("exec sp_Oficina_r");//listar funcion
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }
    }
}