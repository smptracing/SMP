<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_DashboardFE extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getDatosEstudiosInversion()
    {
        // TODO: para el reporte de notificacion

        $funcion = $this->db->query("exec sp_DatosNotificacionFE");//listar EVAL
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }
    }
    function GetAprobadosEstudio()
    {


        $estudios = $this->db->query(" select ETAPAS_FE.denom_etapas_fe, count(ETAPAS_FE.denom_etapas_fe) AS Cantidadpip from ETAPAS_FE inner join
        ETAPA_ESTUDIO ON ETAPA_ESTUDIO.id_etapa_fe=ETAPAS_FE.id_etapa_fe inner join ESTUDIO_INVERSION on
        ESTUDIO_INVERSION.id_est_inv=ETAPA_ESTUDIO.id_est_inv group by ETAPAS_FE.denom_etapas_fe");//listar EVAL
        if ($estudios->num_rows()> 0) {
            return $estudios->result();
        } else {
            return false;
        }
    }

}
