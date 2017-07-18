<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FE_Presupuesto_Inv extends CI_Model
{
    public function __construct()
    {
    	parent::__construct();
    }
    function ListarPresupuesto($codigo_unico_est_inv)
	{
		$presupuestoInv=$this->db->query("execute sp_FEPresupuestoInv_Listar'".$codigo_unico_est_inv."'"); 
		
		return $presupuestoInv->result();
	} 
    function insertar($cbx_estudioInversion , $txtSector , $txtPliego)
    {
        $this->db->query("execute sp_FEPresupuestoInv_Insertar '".$cbx_estudioInversion."','".$txtSector."','".$txtPliego."'");
        return true;
    }
     function insertarPresupuestoFuente($id_presupuesto_fe,$id_fuente_finan,$hdCorrelativoMeta,$hdAnio)
    {
        $this->db->query("execute sp_FEPrespuestoFuente_Insertar '".$id_presupuesto_fe."','".$id_fuente_finan."','".$hdCorrelativoMeta."','".$hdAnio."'");
        return true;
    }
    function ultimoIdPresupuestoInv()
    {
        $presupuestoInv=$this->db->query("SELECT MAX(id_presupuesto_fe) AS id FROM FE_PRESUPUESTO_INV");
        return $presupuestoInv->result();
    }
        

}