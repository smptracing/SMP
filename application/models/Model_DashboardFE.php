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
}