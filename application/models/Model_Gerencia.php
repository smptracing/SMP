<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Gerencia extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    /*añadir funcion*/
    function GetGerencia()
    {
        $funcion = $this->db->query("select* from gerencia");//listar funcion
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }

    }

    function AddGerencia($denominacion_gerencia)
    {

        $this->db->query("sp_Gerencia_c '" . $denominacion_gerencia . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    function UpdateGerencia($id_gerencia, $denominacion_gerencia)
    {
        $this->db->query("sp_Gerencia_u '" . $id_gerencia . "','" . $denominacion_gerencia . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    function EliminarGerencia($id_gerencia){
        $this->db->where('id_gerencia',$id_gerencia);
        $this->db->delete('GERENCIA');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
    //fin funcion

    //fin division funciona
    //grupo funcional

}