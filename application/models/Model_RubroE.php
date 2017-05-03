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

//--------------METODOS PARA EL MANTENIMIENTO DE MODALIDAD DE EJECUCION EJECUCION--------------------------------------------

    //AGREGAR UNA MODALIDAD DE EJECUCION
      function AddModalidadE($txt_NombreModalidadE,$txtArea_DescModalidadE)
        {
           $this->db->query("execute sp_ModalidadE_c'".$txt_NombreModalidadE."','".$txtArea_DescModalidadE."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN AGREGAR UNA MODALIDAD DE EJECUCION

    //LISTAR MODALIDAD DE EJECUCION
      function GetModalidadE()
        {
            $modalidade=$this->db->query("execute sp_ModalidadE_r"); //PROCEDIMIENTO DE LISTAR MODALIDAD DE EJECUCION
            if($modalidade->num_rows()>0)
             {
              return $modalidade->result();
             }else
             {
              return false;
             }
        } 
    //FIN LISTAR MODALIDAD DE EJECUCION

      //MODIFICAR DATOS DE MODALIDAD DE EJECUCION
         function UpdateModalidadE($id_modalidad_ejec,$nombre_modalidad_ejec,$desc_modalidad_ejec)
        {
           $this->db->query("execute sp_ModalidadE_u '".$id_modalidad_ejec."','".$nombre_modalidad_ejec."','".$desc_modalidad_ejec."' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN MODIFICAR DATOS DE MODALIDAD DE EJECUCION

//--------------FIN DE METODOS PARA EL MANTENIMIENTO DE MODALIDAD DE EJECUCION EJECUCION--------------------------------------------

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