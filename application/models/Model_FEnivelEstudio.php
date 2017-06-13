<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FEnivelEstudio extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function get_FEnivelEstudio()
        {
            $FEnivelEstudio=$this->db->query("select* from NIVEL_ESTUDIO");//listar funcion
            if($FEnivelEstudio->num_rows()>=0)
             {
              return $FEnivelEstudio->result();
             }else
             {
              return false;
             }
   
        }
        function add_NivelEstudio($denom_nivel_estudio)
        {

            $this->db->query("insert into NIVEL_ESTUDIO(id_nivel_estudio,denom_nivel_estudio) values ('4','$denom_nivel_estudio')");
            if ($this->db->affected_rows()> 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        /*function updateFEestado($id_estado,$denom_estado_fe)
        {
           $this->db->query("update ESTADO_FE set denom_estado_fe='$denom_estado_fe' where id_estado='$id_estado' ");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }*/
        //fin funcion
       
        //fin division funciona
        //grupo funcional*/
  
}