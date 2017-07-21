<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_FE_Detalle_Presupuesto extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function Insertar($idPresupuestoFE,$idsTipoGasto)
    {
        $this->db->query("execute sp_DetallePresupuesto_Insertar '".$idPresupuestoFE."','".$idsTipoGasto."'");
        return true;
    }

}