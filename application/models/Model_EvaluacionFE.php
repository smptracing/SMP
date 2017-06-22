<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_EvaluacionFE extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
          
          }
      /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
        function GetEvaluacionFE()
        {
           // $EvaluacionFE=$this->db->query("select PROYECTO_INVERSION.codigo_unico_pi, PROYECTO_INVERSION.nombre_pi, UBIGEO.provincia,UBIGEO.distrito, NIVEL_ESTUDIO.denom_nivel_estudio, CONCAT(PERSONA.nombres,'', PERSONA.apellido_p,'',PERSONA.apellido_m)as Evaluador, ESTUDIO_INVERSION.costo_estudio, SITUACION_FE.denom_situacion_fe ,ETAPA_ESTUDIO.avance__fisico,ESTADO_FE.denom_estado_fe from ESTUDIO_INVERSION INNER JOIN PROYECTO_INVERSION ON ESTUDIO_INVERSION.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN UBIGEO_PI ON PROYECTO_INVERSION.id_pi=UBIGEO_PI.id_pi INNER JOIN UBIGEO on UBIGEO.id_ubigeo=UBIGEO_PI.id_ubigeo INNER JOIN NIVEL_ESTUDIO ON NIVEL_ESTUDIO.id_nivel_estudio=ESTUDIO_INVERSION.id_nivel_estudio INNER JOIN ETAPA_ESTUDIO ON ETAPA_ESTUDIO.id_est_inv=ESTUDIO_INVERSION.id_est_inv INNER JOIN ASIGNACION_PERSONA ON ASIGNACION_PERSONA.id_etapa_estudio=ETAPA_ESTUDIO.id_etapa_estudio INNER JOIN CARGO ON CARGO.id_cargo=ASIGNACION_PERSONA.id_cargo INNER JOIN PERSONA ON PERSONA.id_persona=ASIGNACION_PERSONA.id_persona INNER JOIN SITUACION_ACTUAL ON SITUACION_ACTUAL.id_etapa_estudio=ETAPA_ESTUDIO.id_etapa_estudio INNER JOIN SITUACION_FE ON SITUACION_FE.id_situacion_fe=SITUACION_ACTUAL.id_situacion_fe INNER JOIN ESTADO_ETAPA ON ESTADO_ETAPA.id_etapa_estudio= ETAPA_ESTUDIO.id_etapa_estudio INNER JOIN ESTADO_FE ON ESTADO_FE.id_estado=ESTADO_ETAPA.id_estado");
             $EvaluacionFE=$this->db->query("execute sp_ListarEvaluar");
            if($EvaluacionFE->num_rows()>=0)
             {
              return $EvaluacionFE->result();
             }else
             {
              return false;
             }
   
        }
        /*LISTAR DENOMINACION FORMULACION Y EVALUACION*/
}