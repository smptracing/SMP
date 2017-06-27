<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_FEentregableEstudio extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*añadir funcion*/
        function get_Entregables($txt_id_etapa_estudio)
        {
             //$id_estapa=3;
            //$Entregables=$this->db->query("execute sp_Entregables_r '".$id_estapa."' ");
            $Entregables=$this->db->query("execute sp_EntregableEstudio_r '".$txt_id_etapa_estudio."' ");
            if($Entregables->num_rows()>=0)
             {
              return $Entregables->result();
             }else
             {
              return false;
             }
   
        }

        function  get_entregableId($id_entregable){//traer el id de Estudio
           $Entregables=$this->db->query("SELECT id_entregable,valoracion,avance,id_etapa_estudio FROM ENTREGABLE_ESTUDIO where id_entregable='".$id_entregable."' ");
            if($Entregables->num_rows()>=0)
             {
              return $Entregables->result();
             }else
             {
              return false;
             }
        }
        function calcular_AvaceFisico($id_etapa_estudio){
            $Entregables=$this->db->query("SELECT id_entregable,valoracion,avance,id_etapa_estudio FROM ENTREGABLE_ESTUDIO where id_etapa_estudio='".$id_etapa_estudio."' ");

             $SumaAFisico=0;
             foreach ($Entregables->result_array() as $Entregables)
                {
                  $valoracion = $Entregables['valoracion'];
                  $avance     = $Entregables['avance'];
                  $SumaAFisico =(($valoracion*$avance)/100)+$SumaAFisico;
                }
               $this->db->query("UPDATE ETAPA_ESTUDIO  SET avance_fisico='".$SumaAFisico."' where id_etapa_estudio='".$id_etapa_estudio."' ");
              if($this->db->affected_rows()> 0)
                  {
                  return true;
                  }else
                  {
                  return false;
                  }


        }

        function Add_Entregable($opcion,$id_entregable,$txt_denominacion_entre,$id_etapa_estudio ,$txt_nombre_entre,$txt_valoracion_entre,$txt_avance_entre,$txt_observacio_entre,$txt_levantamintoO_entre)
        {

            $this->db->query("EXECUTE sp_Gestionar_Entregable_Estudio'".$opcion."','".$id_entregable."','". $txt_denominacion_entre."','".$id_etapa_estudio."','".$txt_nombre_entre."','".$txt_valoracion_entre."',".$txt_avance_entre.",'".$txt_observacio_entre."','".$txt_levantamintoO_entre."'");
            if ($this->db->affected_rows()> 0) 
              {
                return true;
              }
              else
              {
                return false;
              }

        }
       function  UpdateEntregableAvance($sumaTotalAvance,$id_entregable)
        {
             $this->db->query("UPDATE ENTREGABLE_ESTUDIO  SET avance='".$sumaTotalAvance."' where id_entregable='".$id_entregable."' ");
            if($this->db->affected_rows() > 0)
             {
               return true;
             }else
             {
              return false;
             }

        }

        function AsignacionPersonalEntregable($Opcion,$txt_identregable,$txt_idPersona,$txt_AsigPersonalEntregable)
        {

          $this->db->query("EXECUTE sp_Gestionar_Responsable_Entregable '".$Opcion."','".$txt_identregable."','".$txt_idPersona."','".$txt_AsigPersonalEntregable."' ");
            if ($this->db->affected_rows()>0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
  
}