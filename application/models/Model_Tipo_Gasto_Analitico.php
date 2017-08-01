<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Tipo_Gasto_Analitico extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function TipoGastoAnaliticoListar()
    {
        $ListarTipoGastoAnalitico=$this->db->query("select * from Tipo_Gasto_Analitico");

        return $ListarTipoGastoAnalitico->result();
    }

    function insertar($txtDescripcion)
    {
        $tipogastoanalitico=$this->db->query("execute sp_Tipo_Gasto_Analitico_Insertar '".$txtDescripcion."'");

        return true;
    } 

    function TipoGastoAnalitico($id)
    {
        $tipogastoanalitico=$this->db->query("select * from Tipo_Gasto_Analitico where id_tipo_gasto_analitico='".$id."' ");

        return $tipogastoanalitico->result();
    }

    function editar($id, $txtDescripcion)
    {
        $tipogastoanalitico=$this->db->query("update Tipo_Gasto_Analitico set  descripcion='".$txtDescripcion."' where id_tipo_gasto_analitico='".$id."' ");

        return true;
    }

}