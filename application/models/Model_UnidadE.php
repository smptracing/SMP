<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_UnidadE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }

//----------------------MANTENIMIENTOS DE UNIDAD EJECUTORA-------------------------------------------
    //AGREGAR UNA UNIDAD DE EJECUTORA
        function AddUnidadE($txt_NombreUnidadE)
        {
           $this->db->query("execute sp_UnidadE_c'".$txt_NombreUnidadE."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN AGREGAR UNA UNIDAD DE EJECUTORA

    //LISTAR UNIDAD DE EJECUCION
      function GetUnidadE()
        {
            $unidade=$this->db->query("execute sp_UnidadE_r"); //PROCEDIMIENTO DE LISTAR UNIDAD DE EJECUCION
            if($unidade->num_rows()>0)
             {
              return $unidade->result();
             }else
             {
              return false;
             }
   
        } 
    //FIN LISTAR UNIDAD DE EJECUCION 

    //MODIFICAR DATOS DE UNIDAD EJECUTORA
         function UpdateUnidadE($id_ue,$nombre_ue)
        {
           $this->db->query("execute sp_UnidadE_u '".$id_ue."','".$nombre_ue."' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN MODIFICAR DATOS DE UNIDAD EJECUTORA
//----------------------FIN MANTENIMIENTOS DE UNIDAD EJECUTORA------------
}