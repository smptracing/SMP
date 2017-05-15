<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_MetaPresupuestal extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }
//----------------------METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
    //AGREGAR UN RUBRO DE EJECUCION
      function AddMetaP($txt_NombreMetaP,$date_AnioMetaP,$text_Pim,$text_NumeroMeta,$text_Devengado)
        {
           $this->db->query("execute sp_MetaPresupuestal_c'".$txt_NombreMetaP."','".$date_AnioMetaP."','".$text_Pim."','".$text_NumeroMeta."','".$text_Devengado."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN AGREGAR UN RUBRO DE EJECUCION

    //LISTAR RUBRO DE EJECUCION
      function GetMetaP()
        {
            $metap=$this->db->query("execute sp_MetaPresupuestal_r"); //PROCEDIMIENTO DE LISTAR LOS RUBROS DE EJECUCION
            if($metap->num_rows()>0)
             {
              return $metap->result();
             }else
             {
              return false;
             }
        } 
    //FIN LISTAR UN RUBRO DE EJECUCION 
    //MODIFICAR DATOS DE LOS RUBROS
         function UpdateMetaP($id_meta_pres,$txt_NombreMetaP,$date_AnioMetaP,$text_Pim,$text_NumeroMeta,$text_Devengado)
        {
           $this->db->query("execute sp_MetaPresupuestal_u '".$id_meta_pres."','".$txt_NombreMetaP."','".$date_AnioMetaP."','".$text_Pim."','".$text_NumeroMeta."','".$text_Devengado."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN MODIFICAR DATOS DE LOS RUBROS
//--------------FIN DE METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
}