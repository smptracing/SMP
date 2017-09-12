<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_CarteraInversion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          }
//----------------------METODOS PARA EL MANTENIMIENTO DE RUBRO DE EJECUCION--------------------------------------------
    function getCartera($idCartera){
          $cartera=$this->db->query("select *, YEAR([año_apertura_cartera]) as anio from CARTERA_INVERSION where id_cartera=".$idCartera.";");
          if($cartera->num_rows()>0){
              return $cartera->result();
          }
          else{
              return false;
          }
      }


     function AddCartera($dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$estado,$txt_NumResolucionCart,$txt_UrlResolucionCart)
        {
        $query=$this->db->query("execute sp_CarteraInversion_c'".$dateAñoAperturaCart."','".$dateFechaIniCart."','".$dateFechaFinCart."','".$estado."','".$txt_NumResolucionCart."','".$txt_UrlResolucionCart."'");//PROCEDIMIENTO DE LISTAR SOLO CARTEREA ACTUAL
             if ($query) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }

        function editCartera($id_cartera,$dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$estado,$txt_NumResolucionCart,$txt_UrlResolucionCart){
          if($txt_UrlResolucionCart!=''){
             $query=$this->db->query("update CARTERA_INVERSION set año_apertura_cartera='".$dateAñoAperturaCart."',fecha_inicio_cartera='".$dateFechaIniCart."',fecha_cierre_cartera='".$dateFechaFinCart."',numero_resolucion_cartera='".$txt_NumResolucionCart."',url_resolucion_cartera='".$txt_UrlResolucionCart."' WHERE id_cartera='".$id_cartera."'");
          }
          else{
             $query=$this->db->query("update CARTERA_INVERSION set año_apertura_cartera='".$dateAñoAperturaCart."',fecha_inicio_cartera='".$dateFechaIniCart."',fecha_cierre_cartera='".$dateFechaFinCart."',numero_resolucion_cartera='".$txt_NumResolucionCart."' WHERE id_cartera='".$id_cartera."'");
          }
           
            if($query){
                $this->db->close();
                return true;
            } 
            else {
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
         $query=$this->db->query("select year(año_apertura_cartera) as anios from Cartera_inversion ORDER BY anios DESC ");
         if($query->num_rows()>0)
             {
              return $query->result();
             }else
             {
              return false;
             }  

     }
}