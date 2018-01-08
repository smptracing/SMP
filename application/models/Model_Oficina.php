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
        $sql = "SELECT dbo.OFICINA.id_oficina,\n"
            . "       dbo.OFICINA.id_subgerencia,\n"
            . "       dbo.OFICINA.denom_oficina,\n"
            . "       dbo.SUB_GERENCIA.denom_subgerencia,\n"
            . "       dbo.GERENCIA.denom_gerencia\n"
            . "FROM dbo.OFICINA\n"
            . "     INNER JOIN dbo.SUB_GERENCIA ON dbo.OFICINA.id_subgerencia = dbo.SUB_GERENCIA.id_subgerencia\n"
            . "     INNER JOIN dbo.GERENCIA ON dbo.SUB_GERENCIA.id_gerencia = dbo.GERENCIA.id_gerencia";
        $funcion = $this->db->query($sql);//listar funcion
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }
    }

    function AddOficina($id_sub_gerencia, $denominacion_oficina)
    {
        $this->db->query("sp_Oficina_c '" . $id_sub_gerencia . "','" . $denominacion_oficina . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function UpdateOficina($id_oficina, $id_subgerencia, $denominacion_gerencia)
    {
        $this->db->query("sp_Oficina_u '" . $id_oficina . "','" . $id_subgerencia . "','" . $denominacion_gerencia . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function EliminarOficina($id_oficina){
        $this->db->where('id_oficina',$id_oficina);
        $this->db->delete('OFICINA');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}