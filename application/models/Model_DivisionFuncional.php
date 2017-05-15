<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_DivisionFuncional extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      
       //division funcional

    function GetDivisionFuncional()
        {
            $divisionf=$this->db->query("execute sp_DivisionFuncional_r");//listar de division funcional
            if($divisionf->num_rows()>0)
             {
              return $divisionf->result();
             }else
             {
              return false;
             }
   
        }
        function AddDivisionFucion($txt_CodigoDfuncional,$txt_Nombre_DFuncional,$listaFuncionC)
        {
           $this->db->query("execute sp_DivisionFuncional_c'".$listaFuncionC."','".$txt_CodigoDfuncional."','".$txt_Nombre_DFuncional."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        function UpdateDivisionFucion($id_DfuncionalM,$IdlistaFuncionCM,$txt_CodigoDfuncionalM,$txt_Nombre_DFuncionalM)
        {
          $this->db->query("execute sp_DivisionFuncional_u'".$id_DfuncionalM."','".$IdlistaFuncionCM."','".$txt_CodigoDfuncionalM."','".$txt_Nombre_DFuncionalM."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
          
}