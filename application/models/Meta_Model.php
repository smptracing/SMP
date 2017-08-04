<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Meta_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
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
    public function AddMeta($flat, $id_meta_pres, $txt_anio_meta, $txt_correlativo_meta, $txt_nombre_meta)
    {
        $this->db->query("execute sp_Gestionar_Meta_Presupuestal'" . $flat . "','"
            . $id_meta_pres . "','"
            . $txt_anio_meta . "','"
            . $txt_correlativo_meta . "','"
            . $txt_nombre_meta . "'");

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
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

}
