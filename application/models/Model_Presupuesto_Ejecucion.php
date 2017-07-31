<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Presupuesto_Ejecucion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function PresupuestoEjecucionListar()
    {
        $ListarPresupuestoEjecucion=$this->db->query("select * from Presupuesto_Ejecucion");

        return $ListarPresupuestoEjecucion->result();
    }

    function insertar($txtDescripcion)
    {
        $PresupuestoEjecucion=$this->db->query("execute sp_Presupuesto_Ejecucion_Insertar '".$txtDescripcion."'");

        return true;
    }

    function PresupuestoEjecucion($id)
    {
        $presupuestoejecucion=$this->db->query("select * from Presupuesto_Ejecucion where id_presupuesto_eje='".$id."' ");

        return $presupuestoejecucion->result();
    }

    function editar($id, $txtDescripcion)
    {
        $presupuestoejecucion=$this->db->query("update Presupuesto_Ejecucion set  descripcion='".$txtDescripcion."' where id_presupuesto_eje='".$id."' ");

        return true;
    }

}