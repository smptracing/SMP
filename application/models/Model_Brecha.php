<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Brecha extends CI_Model
{
           public function __construct()
          {
              parent::__construct();

          }
//------------------METODOS DE LA BRECHA-------------------
//AGREGAR UNA BRECHA
      function AddBrecha($cbxServPubAsoc,$txt_NombreBrecha, $txtArea_DescBrecha)
        {
           $this->db->query("execute sp_Brecha_c '".$cbxServPubAsoc."','".$txt_NombreBrecha."','".$txtArea_DescBrecha."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
//FIN AGREGAR UNA BRECHA
//LISTAR UNA BRECHA
      function GetBrecha()
        {
            $brecha=$this->db->query("execute sp_Brecha_r"); //PROCEDIMIENTO DE LISTAR BRECHAS
            if($brecha->num_rows()>0)
             {
              return $brecha->result();
             }else
             {
              return false;
             }
   
        } 
//FIN LISTAR UNA BRECHA

//MODIFICAR UNA BRECHA
         function UpdateBrecha($id_brecha,$id_ser_pub_asoc,$nombre_brecha,$desc_brecha)
        {
           $this->db->query("execute sp_Brecha_u '".$id_brecha."','".$id_ser_pub_asoc."','".$nombre_brecha."','".$desc_brecha."' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
//FIN MODIFICAR UNA BRECHA  

//ELIMINAR UNA BRECHA
         function DeleteBrecha($id_brecha)
        {
           $this->db->query("execute sp_Brecha_d '".$id_brecha."' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
//FIN ELIMINAR UNA BRECHA 
//------------------FIN METODOS DE LA BRECHA-------------------  

//------------------METODOS DEL INDICADOR----------------------
//AGREGAR UN INDICADOR
      function AddIndicador($txt_NombreIndicador,$txtArea_DefIndicador,$txt_UnidadMedida)
        {
           $this->db->query("execute sp_Indicador_c'".$txt_NombreIndicador."','".$txtArea_DefIndicador."','".$txt_UnidadMedida."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
//FIN AGREGAR UN INDICADOR
//LISTAR UN INDICADOR
      function GetIndicador()
        {
            $indicador=$this->db->query("execute sp_Indicador_r"); //PROCEDIMIENTO DE LISTAR INDICADORES
            if($indicador->num_rows()>0)
             {
              return $indicador->result();
             }else
             {
              return false;
             }
   
        } 
//FIN LISTAR UN INDICADOR
//MODIFICAR UNA INDICADOR
         function UpdateIndicador($id_indicador,$nombre_indicador,$definicion_indicador,$unidad_medida_indicador)
        {
           $this->db->query("execute sp_Indicador_u'".$id_indicador."','".$nombre_indicador."','".$definicion_indicador."', '".$unidad_medida_indicador."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
//FIN MODIFICAR INDICADOR
//------------------FIN METODOS DEL INDICADOR----------------------

//------------------METODOS DE LA BRECHA-INDICADOR-------------------
//AGREGAR UNA BRECHA
      function AddBrechaIndicador($cbxNombrebrecha,$cbxNombreIndicador, $datefechaindicador,$txtvalorindicador, $txtbaseindicador)
        {
           $this->db->query("execute sp_BrechaIndicador_c'".$cbxNombrebrecha."','".$cbxNombreIndicador."','".$datefechaindicador."','".$txtvalorindicador."','".$txtbaseindicador."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
//FIN LISTAR UNA BRECHA-INDICADOR

        //LISTAR UN INDICADOR
      function GetBrechaIndicador()
        {
            $brechaindicador=$this->db->query("execute sp_BrechaIndicador_r"); //PROCEDIMIENTO DE LISTAR BRECHA E INDICADORES
            if($brechaindicador->num_rows()>0)
             {
              return $brechaindicador->result();
             }else
             {
              return false;
             }
        } 
//FIN LISTAR UN INDICADOR
//------------------FIN METODOS DE LA BRECHA-INDICADOR----        
}