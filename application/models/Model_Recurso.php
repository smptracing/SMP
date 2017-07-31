<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Recurso extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function RecursoListar()
    {
        $ListarRecurso=$this->db->query("select id_recurso, descripcion from Recurso");

        return $ListarRecurso->result();
    }

    function insertar($txtDescripcion)
    {
        $recurso=$this->db->query("execute sp_Recurso_Insertar '".$txtDescripcion."'");

        return true;
    } 

    function Recurso($id)
    {
        $recurso=$this->db->query("select * from Recurso where id_recurso='".$id."' ");

        return $recurso->result();
    }

    function editar($id, $txtDescripcion)
    {
        $recurso=$this->db->query("update Recurso set  descripcion='".$txtDescripcion."' where id_recurso='".$id."' ");

        return true;
    }

}