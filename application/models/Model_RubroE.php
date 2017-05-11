<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_RubroE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }
//----------------------METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
    //AGREGAR UN RUBRO DE EJECUCION
      function AddRubroE($txt_NombreRubroE, $txtArea_DescRubroE)
        {
           $this->db->query("execute sp_RubroE_c'".$txt_NombreRubroE."','".$txtArea_DescRubroE."'");
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
      function GetRubroE()
        {
            $rubroe=$this->db->query("execute sp_RubroE_r"); //PROCEDIMIENTO DE LISTAR LOS RUBROS DE EJECUCION
            if($rubroe->num_rows()>0)
             {
              return $rubroe->result();
             }else
             {
              return false;
             }
   
        } 
    //FIN LISTAR UN RUBRO DE EJECUCION 

    //MODIFICAR DATOS DE LOS RUBROS
         function UpdateRubroE($id_rubro_ejecucion,$nombre_ejecucion,$descripcion_rubro)
        {
           $this->db->query("execute sp_RubroE_u '".$id_rubro_ejecucion."','".$nombre_ejecucion."','".$descripcion_rubro."' ");
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