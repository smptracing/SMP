<?php
defined('BASEPATH') or exit('No direct script access allowed');
class MetaPip_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //listar formulacion y evaluacion del primer modulo PMI
    public function GetMeta_Pip($flat)
    {
        $listar_meta = $this->db->query("execute sp_Gestionar_Meta_Presupuestal'" . $flat . "'");
        if ($listar_meta->num_rows() > 0) {
            return $listar_meta->result();
        } else {
            return false;
        }
    }

    function getDataSiaf($anio_meta, $codigo_unico)
    {
      $query=$this->db->query("execute sp_ListarMontosProyectoAnio '".$anio_meta."','".$codigo_unico."'");
      if ($query->num_rows() > 0) {
          return $query->result();
      } else {
          return false;
      }
    }

}
