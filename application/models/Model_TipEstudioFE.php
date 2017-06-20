<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_TipEstudioFE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function GetTipEstudioFE()
        {
            $tipEstFE=$this->db->query("select * from TIPO_ESTUDIO");//listar funcion
            if($tipEstFE->num_rows()>=0)
             {
              return $tipEstFE->result();
             }else
             {
              return false;
             }
   
        }

      
        //fin funcion
       
        //fin division funciona
        //grupo funcional*/
  
}