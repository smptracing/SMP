<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FEsituacion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function get_FEsituacion()
        {
            $FEsituacion=$this->db->query("select* from Situacion_FE");//listar funcion
            if($FEsituacion->num_rows()>=0)
             {
              return $FEsituacion->result();
             }else
             {
              return false;
             }
   
        }
        function add_FEsituacion($txt_SituacionFE)
        {

            $this->db->query("insert into SITUACION_FE(id_situacion_fe,denom_situacion_fe) values ('4','$txt_SituacionFE')");
            if ($this->db->affected_rows()> 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        function update_FEsituacion($id_situacion_fe,$denom_situacion_fe)
        {
           $this->db->query("update SITUACION_FE set denom_situacion_fe='$denom_situacion_fe' where id_situacion_fe='$id_situacion_fe' ");
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
        //grupo funcional
  
}