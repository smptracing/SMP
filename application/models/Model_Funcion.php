<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Funcion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function GetFuncion()
        {
            $funcion=$this->db->query("execute sp_Funcion_r");//listar funcion
            if($funcion->num_rows()>0)
             {
              return $funcion->result();
             }else
             {
              return false;
             }
   
        }
        function AddFucion($txt_codigofuncion,$txt_nombrefuncion)
        {

            $this->db->query("execute sp_Funcion_c '".$txt_codigofuncion."','".$txt_nombrefuncion."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
        function UpdateFuncion($txt_IdfuncionM,$txt_codigofuncionM,$txt_nombrefuncionM)
        {
           $this->db->query("execute sp_Funcion_u'".$txt_IdfuncionM."','".$txt_codigofuncionM."','".$txt_nombrefuncionM."'");
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
        //division funcional

    function GetDivisionFuncional()
        {
            $divisionf=$this->db->query("execute sp_Division_funcional_r");//listar de division funcional
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
           $this->db->query("execute sp_Division_funcional_c'".$listaFuncionC."','".$txt_CodigoDfuncional."','".$txt_Nombre_DFuncional."'");
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
          $this->db->query("execute sp_Division_funcional_u'".$id_DfuncionalM."','".$IdlistaFuncionCM."','".$txt_CodigoDfuncionalM."','".$txt_Nombre_DFuncionalM."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    
        //fin division funciona
        //grupo funcional
    function GetGrupoFuncional()
          {
              $GrupoFuncional=$this->db->query("execute sp_grupo_funcional_r");//listar de division funcional
              if($GrupoFuncional->num_rows()>0)
               {
                return $GrupoFuncional->result();
               }else
               {
                return false;
               }  
          }
      function AddGrupoFuncional($txt_codigoGfuncion,$txt_nombreGfuncion,$SelecDivisionFF,$SelecSector)
      {
        $this->db->query("execute sp_grupo_funcional_c'".$SelecDivisionFF."','".$SelecSector."','".$txt_codigoGfuncion."','".$txt_nombreGfuncion."'");
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
        $this->db->query("execute sp_grupo_funcional_u'".$txt_idGfuncionF."','".$IdSelecDivisionFFF."','".$IdSelecSectorF."','".$txt_codigoGfuncionF."','".$txt_nombreGfuncionF."'");
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