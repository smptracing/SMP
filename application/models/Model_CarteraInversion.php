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


    function AddCartera($Cartera_inversion)
    {
        $añoApertura = $Cartera_inversion['año_apertura_cartera'];
        $this->db->where('año_apertura_cartera', $añoApertura);
        $data = $this->db->get('CARTERA_INVERSION')->num_rows();
        if($data==0)
        {
            $this->db->insert('CARTERA_INVERSION',$Cartera_inversion);
            return $this->db->affected_rows();
        }
        else
        {
            return 0;
        }
    }

        function editCartera($id_cartera,$dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$estado,$txt_NumResolucionCart,$txt_UrlResolucionCart){
             $query=$this->db->query("execute sp_CarteraInversion_u ".$id_cartera.",'".$dateAñoAperturaCart."','".$dateFechaIniCart."','".$dateFechaFinCart."','".$txt_NumResolucionCart."','".$txt_UrlResolucionCart."'");
           
            if ($query) 
              {
                $result=$query->result_array();
                if($result[0]['n']=='1')
                   return "Se registró la cartera de Inversiones.";
                else
                  return "El Año de Apertura ya Existe.";
              }
              else
              {
                return "Error... no se grabaron los datos.";
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
        $cartera=$this->db->query("execute sp_CarteraInversion_r");
        return $cartera->result(); 
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