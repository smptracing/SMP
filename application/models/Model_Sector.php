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
           $mensaje=$this->db->query("execute sp_Sector_c '".$txt_NombreSector."'");
             if($mensaje->num_rows()>0)
             {
              return $mensaje->result();
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
  

       function EliminarSector($id_sector){
          return true;
       }
      //fin entidad//

}