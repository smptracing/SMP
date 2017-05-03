<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Sector extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*inicio sector*/
        function GetSector()
        {
            $sector=$this->db->query("execute sp_Sector_r");//listar sector
            if($sector->num_rows()>0)
             {
              return $sector->result();
             }else
             {
              return false;
             }
   
        }
        function AddSector($txt_NombreSector)
        {
           $this->db->query("execute sp_Sector_c '".$txt_NombreSector."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        //modifica los sectores
         function UpdateSector($id_sector,$nombre_sector)
        {
           $this->db->query("execute sp_Sector_u '".$id_sector."','".$nombre_sector."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
      //entidad
        //fin modificar sector
        //Inicio Entidad
        function GetEntidad()
        {
            $sector=$this->db->query("execute sp_Entidad_r");//listar entidad
            if($sector->num_rows()>0)
             {
              return $sector->result();
             }else
             {
              return false;
             }
   
        }
        //añadir una nueva entidad

        function AddEntidad($listaSector,$txt_NombreEntidad,$txt_DenominacionEntidad)
        {
           $this->db->query("execute sp_Entidad_c '".$listaSector."','".$txt_NombreEntidad."','".$txt_DenominacionEntidad."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
         //fin añadir nueva entidad
        function UpdateEntidad($txt_IdModificarEntidar,$id_sector,$txt_NombreEntidadM,$txt_DenominacionEntidadM)
        {
          $this->db->query("execute sp_Entidad_u '".$txt_IdModificarEntidar."','".$id_sector."','".$txt_NombreEntidadM."','".$txt_DenominacionEntidadM."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        function EliminarEntidad($id_entidad){
           $this->db->query("execute sp_Entidad_d '".$id_entidad."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
       function EliminarSector($id_sector){
          return true;
       }
      //fin entidad//
       function GetServicioAsociado(){
          $ServicioAsociado=$this->db->query("execute sp_Servicio_PublicoA_r");//listar de servicio publico asociado
            if($ServicioAsociado->num_rows()>0)
             {
              return $ServicioAsociado->result();
             }else
             {
              return false;
             }
       }
      function AddServicioAsociado($textarea_servicio_publicoA){

           $this->db->query("execute sp_Servicio_PublicoA_c '".$textarea_servicio_publicoA."'");
            if($this->db->affected_rows() > 0)
             {
              return true;
             }else
             {
              return false;
             }
       }
       
       function UpdateServicioAsociado($id_servicio_publicoA,$textarea_servicio_publicoA){
           $this->db->query("execute sp_Servicio_PublicoA_u '".$id_servicio_publicoA."','".$textarea_servicio_publicoA."'");
            if($this->db->affected_rows() > 0)
             {
              return true;
             }else
             {
              return false;
             }
       }
      
      
}