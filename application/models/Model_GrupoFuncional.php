<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_GrupoFuncional extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
    function GetGrupoFuncional()
          {
              $GrupoFuncional=$this->db->query("execute sp_GrupoFuncional_r");//listar de division funcional
              if($GrupoFuncional->num_rows()>0)
               {
                return $GrupoFuncional->result();
               }else
               {
                return null;
               }  
          }
      function AddGrupoFuncional($txt_codigoGfuncion,$txt_nombreGfuncion,$SelecDivisionFF,$SelecSector)
      {
        $this->db->query("execute sp_GrupoFuncional_c'".$SelecDivisionFF."','".$SelecSector."','".$txt_codigoGfuncion."','".$txt_nombreGfuncion."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
      }
      function UpdateGrupoFuncional($txt_idGfuncionF,$IdSelecDivisionFFF,$IdSelecSectorF,$txt_codigoGfuncionF,$txt_nombreGfuncionF)
      {
        $this->db->query("execute sp_GrupoFuncional_u'".$txt_idGfuncionF."','".$IdSelecDivisionFFF."','".$IdSelecSectorF."','".$txt_codigoGfuncionF."','".$txt_nombreGfuncionF."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
      }

        //fin grupo funcional


       
}