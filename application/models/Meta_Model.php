<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Meta_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cargarMetaPi($anio,$codigoUnico)
    {
        $data=$this->db->query("execute sp_ListarMontosProyectoAnio @anio_meta ='$anio', @codigo_unico='$codigoUnico'");
        return $data->result();
    }
    public function correlativoMeta($correlativo)
    {
        $data=$this->db->query("select * from correlativo_meta where cod_correlativo='".$correlativo."'");
        return $data->result()[0];
    }

    //editar meta presupuestal
    public function EditarMetaPresupuestal($flat, $txt_id_meta, $txt_anio_meta_m, $txt_correlativo_meta_m, $txt_nombre_meta_m)
    {
        $this->db->query("execute sp_Gestionar_Meta_Presupuestal'" . $flat . "','"
            . $txt_id_meta . "','"
            . $txt_anio_meta_m . "','"
            . $txt_correlativo_meta_m . "','"
            . $txt_nombre_meta_m . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add meta presupuestal
    public function AddMeta($data)
    {
        $this->db->insert('META_PRESUPUESTAL',$data);
        return $this->db->affected_rows();

    }
    //listar formulacion y evaluacion del primer modulo PMI
    public function listar_meta($flat)
    {
        $listar_meta = $this->db->query("execute sp_Gestionar_Meta_Presupuestal'" . $flat . "'");
        if ($listar_meta->num_rows() > 0) {
            return $listar_meta->result();
        } else {
            return false;
        }
    }
    //eliminar meta presupuestal
    public function Eliminar_meta_prepuestal($flat, $id_meta_pres)
    {
        $this->db->query("execute sp_Gestionar_Meta_Presupuestal'"
            . $flat . "','"
            . $id_meta_pres . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    /*Listar Correlativo*/
    public function listar_correlativo()
    {
        $listar_correlativo = $this->db->query("SELECT * FROM CORRELATIVO_META");
        if ($listar_correlativo->num_rows() > 0) {
            return $listar_correlativo->result();
        } else {
            return false;
        }
    }
    /*Listar meta presupuestal*/
    public function listar_meta_presupuestal()
    {
        $listar_meta_presupuestal = $this->db->query("SELECT * FROM META_PRESUPUESTAL");
        if ($listar_meta_presupuestal->num_rows() > 0) {
            return $listar_meta_presupuestal->result();
        } else {
            return false;
        }
    }

}
