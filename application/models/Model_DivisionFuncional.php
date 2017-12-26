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
		
		return $divisionf->result();
	}

        function getDivisioFuncuonaId($id_funcion){
          $divisionf=$this->db->query("execute sp_funcionDivision_r '".$id_funcion."'");//listar de division funcional
            if($divisionf->num_rows()>0)
             {
              return $divisionf->result();
             }else
             {
              return null;
             }
        }
        function AddDivisionFucion($txt_CodigoDfuncional,$txt_Nombre_DFuncional,$listaFuncionC)
        {
           $this->db->query("execute sp_DivisionFuncional_c '".$listaFuncionC."','".$txt_CodigoDfuncional."','".$txt_Nombre_DFuncional."'");
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
         function DivisionFuncionalPipListar()
        {
            $ListarDivisionFuncionalPipListar=$this->db->query("select DIVISION_FUNCIONAL.nombre_div_funcional ,count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional  group by DIVISION_FUNCIONAL.nombre_div_funcional");

            return $ListarDivisionFuncionalPipListar->result();
        }

        function DivFuncionalPipMontoTotalListar()
        {
          $data=$this->db->query("select count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional");

          return $data->result()[0];
        }
        function EliminarDivFuncional($id_div_funcional){
          $this->db->where('id_div_funcional',$id_div_funcional);
          $this->db->delete('DIVISION_FUNCIONAL');
          if($this->db->affected_rows()>0){
            return true;
          }
          else {
            return false;
          }
        }
        
          
}