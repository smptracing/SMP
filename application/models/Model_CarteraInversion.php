<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_CarteraInversion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }
//----------------------METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
    
     function AddCartera($dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$estado,$txt_NumResolucionCart,$txt_UrlResolucionCart)
        {
 $this->db->query("execute sp_CarteraInversion_c'".$dateAñoAperturaCart."','".$dateFechaIniCart."','".$dateFechaFinCart."','".$estado."','".$txt_NumResolucionCart."','".$txt_UrlResolucionCart."'");//PROCEDIMIENTO DE LISTAR SOLO CARTEREA ACTUAL
             if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //LISTAR CARTERA FECHA ACTUAL
      function GetCarteraInvFechAct()
        {
            $carteraActual=$this->db->query("execute sp_CarteraActual_r"); //PROCEDIMIENTO DE LISTAR SOLO CARTEREA ACTUAL
            if($carteraActual->num_rows()>0)
             {
              return $carteraActual->result();
             }else
             {
              return false;
             }  
        } 
    //FIN LISTAR CARTERA FECHA ACTUAL 

    //LISTAR CARTERA DE INVERSION
      function GetCarteraInversion()
        {
            $cartera=$this->db->query("execute sp_CarteraInversion_r"); //PROCEDIMIENTO DE LISTAR CARTERAS
            if($cartera->num_rows()>0)
             {
              return $cartera->result();
             }else
             {
              return false;
             }  
        } 
    //FIN LISTAR CARTERA DE INVERSION
//--------------FIN DE METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
     function GetCarteraAnios()
     {
         $query=$this->db->query("select year(año_apertura_cartera) as anios from Cartera_inversion ORDER BY anios ");
         if($query->num_rows()>0)
             {
              return $query->result();
             }else
             {
              return false;
             }  

     }
}