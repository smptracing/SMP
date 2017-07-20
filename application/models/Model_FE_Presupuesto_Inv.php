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

    function listarSector(){

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

    function SectorPliego($id_est_inv)
    {
        $SectorPliego=$this->db->query("select nombre_sector, pliego from SECTOR INNER JOIN FE_PRESUPUESTO_INV ON SECTOR.id_sector=FE_PRESUPUESTO_INV.id_sector  INNER JOIN ESTUDIO_INVERSION ON ESTUDIO_INVERSION.id_est_inv=FE_PRESUPUESTO_INV.id_est_inv WHERE ESTUDIO_INVERSION.id_est_inv='".$id_est_inv."' ");
        
        return $SectorPliego->result();
    }

    function TipoGastoDetallePresupuesto($id_est_inv)
    {
        $TipoGasto=$this->db->query("select FE_TIPO_GASTO.id_tipo_gasto, desc_tipo_gasto, id_est_inv from FE_TIPO_GASTO INNER JOIN FE_DETALLE_PRESUPUESTO ON FE_DETALLE_PRESUPUESTO.id_tipo_gasto=FE_TIPO_GASTO.id_tipo_gasto INNER JOIN FE_PRESUPUESTO_INV ON FE_DETALLE_PRESUPUESTO.id_presupuesto_fe=FE_PRESUPUESTO_INV.id_presupuesto_fe where id_est_inv='".$id_est_inv."' ");
        
        return $TipoGasto->result();
    }

    function DetalleGasto($id_est_inv)
    {
        $DetalleGasto=$this->db->query("select FE_TIPO_GASTO.id_tipo_gasto, desc_tipo_gasto, id_est_inv, desc_detalle_gasto, cantidad_detalle_gasto, costo_uni_detalle_gasto, sub_total_detalle_gasto from FE_TIPO_GASTO INNER JOIN FE_DETALLE_PRESUPUESTO ON FE_DETALLE_PRESUPUESTO.id_tipo_gasto=FE_TIPO_GASTO.id_tipo_gasto INNER JOIN FE_PRESUPUESTO_INV ON FE_DETALLE_PRESUPUESTO.id_presupuesto_fe=FE_PRESUPUESTO_INV.id_presupuesto_fe INNER JOIN FE_DETALLE_GASTO  ON FE_DETALLE_PRESUPUESTO.id_detalle_presupuesto=FE_DETALLE_GASTO.id_detalle_presupuesto where id_est_inv='".$id_est_inv."'order by id_tipo_gasto");
        
        return $DetalleGasto->result();
    }


}