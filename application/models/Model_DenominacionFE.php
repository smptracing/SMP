<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_DenominacionFE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          
          }
      /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
        function GetDenominacionFE()
        {
            $DenominacionFE=$this->db->query("select id_denom_fe, denom_fe from DENOMINACIOM_FE");//listar funcion
            if($DenominacionFE->num_rows()>=0)
             {
              return $DenominacionFE->result();
             }else
             {
              return false;
             }
   
        }
        /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
}