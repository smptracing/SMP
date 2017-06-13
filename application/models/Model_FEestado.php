<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FEestado extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function get_FEestado()
        {
            $FEestado=$this->db->query("select* from ESTADO_FE");//listar funcion
            if($FEestado->num_rows()>=0)
             {
              return $FEestado->result();
             }else
             {
              return false;
             }
   
        }
        function add_FEestado($txt_denom_estado_fe)
        {

            $this->db->query("insert into ESTADO_FE(id_estado,denom_estado_fe) values ('4','$txt_denom_estado_fe')");
            if ($this->db->affected_rows()> 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        function updateFEestado($id_estado,$denom_estado_fe)
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

        }
        //fin funcion
       
        //fin division funciona
        //grupo funcional*/
  
}