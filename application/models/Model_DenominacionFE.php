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
        //AGREGAR UNA DENOMINACION EN FORMULACION Y EVALUACION
         function AddDenominacionFE($txt_DenominacionFE)
        {
            $this->db->query("insert into DENOMINACIOM_FE(denom_fe) values ('$txt_DenominacionFE')");
            if ($this->db->affected_rows()> 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
        //AGREGAR UNA DENOMINACION EN FORMULACION Y EVALUACION
}