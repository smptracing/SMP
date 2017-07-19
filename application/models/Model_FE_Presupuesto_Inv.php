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

    function FEPresupuestoInvParaEditar($id)
    {
        $fePresupuestoInv=$this->db->query("select EI.nombre_est_inv, S.id_sector, FEPI.pliego from FE_PRESUPUESTO_INV as FEPI inner join SECTOR as S on FEPI.id_sector=S.id_sector inner join ESTUDIO_INVERSION as EI on FEPI.id_est_inv=EI.id_est_inv where id_presupuesto_fe='".$id."'");

        return $fePresupuestoInv->result()[0];
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

    function listarSector()
    {
        $listarSector=$this->db->query("execute sp_Sector_r");
        
        return $listarSector->result();            
    }    

    function listarFueteFinanciamiento()
    {

        $listarFueteFinanciamiento=$this->db->query("SELECT id_fuente_finan,nombre_fuente_finan,acronimo_fuente_finan FROM FUENTE_FINANCIAMIENTO");
        return $listarFueteFinanciamiento->result();
    }

    function nombreProyectoInv($codigo_unico_est_inv)
    {
       $nombreProyectoInv=$this->db->query("select ESI.id_est_inv,ESI.codigo_unico_est_inv,ESI.nombre_est_inv from ESTUDIO_INVERSION ESI where ESI.codigo_unico_est_inv='".$codigo_unico_est_inv."' ");
        return $nombreProyectoInv->result();
    }
}