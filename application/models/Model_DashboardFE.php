<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_DashboardFE extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function getNumProyectosNuevosEvaluacion()
    {
        // TODO: para el reporte de notificacion

        $sql = "SELECT COUNT(dbo.ETAPA_ESTUDIO.id_etapa_estudio) AS EvaluacionNuevos\n"
            . "FROM dbo.ETAPA_ESTUDIO\n"
            . "     INNER JOIN dbo.ETAPAS_FE ON dbo.ETAPA_ESTUDIO.id_etapa_fe = dbo.ETAPAS_FE.id_etapa_fe\n"
            . "WHERE(dbo.ETAPAS_FE.denom_etapas_fe = 'Evauacion')\n"
            . "     AND (dbo.ETAPA_ESTUDIO.avance_fisico < 1);";

        $funcion = $this->db->query($sql);//listar EVAL
        if ($funcion->num_rows() > 0) {
            return $funcion->result();
        } else {
            return false;
        }
    }
}