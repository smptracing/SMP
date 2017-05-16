<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_ProyectoInversion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function ProyectoInversion()
        {
            $ProyectoInversion=$this->db->query("execute sp_ProyectoInversion_r");//listar funcion
            return $ProyectoInversion->result();
   
        }
        function BuscarProyectoInversion($Id_ProyectoInver)
         {
            $ProyectoInversion=$this->db->query("execute sp_ProyectoInversion_Buscar'".$Id_ProyectoInver."'");//listar funcion
            return $ProyectoInversion->result();
   
        }
       /* function AddFucion($txt_codigofuncion,$txt_nombrefuncion)
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
        //fin funcion*/
       
        //fin division funciona
        //grupo funcional
  
}