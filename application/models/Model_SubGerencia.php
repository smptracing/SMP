<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_SubGerencia extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }

    /*añadir funcion*/
    function GetSubGerencia()
    {
        $sql = "	SELECT        dbo.GERENCIA.denom_gerencia, dbo.SUB_GERENCIA.id_subgerencia, dbo.SUB_GERENCIA.id_gerencia, dbo.SUB_GERENCIA.denom_subgerencia\n"
            . "FROM            dbo.GERENCIA INNER JOIN\n"
            . "                         dbo.SUB_GERENCIA ON dbo.GERENCIA.id_gerencia = dbo.SUB_GERENCIA.id_gerencia";

        $funcion = $this->db->query($sql);//listar
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }
    }

    function AddSubGerencia($id_gerencia, $denominacion)
    {

        $this->db->query("sp_SubGerencia_c '" . $id_gerencia . "','" . $denominacion . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function UpdateSubGerencia($id_subgerencia, $id_gerencia, $denominacion)
    {
        $this->db->query("sp_SubGerencia_u '" . $id_subgerencia . "','" . $id_gerencia . "','" . $denominacion . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function EliminarSubGerencia($id_subgerencia){
        $this->db->where('id_subgerencia',$id_subgerencia);
        $this->db->delete('SUB_GERENCIA');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}