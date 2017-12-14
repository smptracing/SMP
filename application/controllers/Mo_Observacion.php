<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Observacion extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Observacion');
    }

    function insertar()
    {
        if($_POST)
        {
            $msg = array();

            $c_data['desc_observacion']=$this->input->post('descripcionObservacion');
            $c_data['fecha_registro']=date('Y-m-d');
            $c_data['id_monitoreo']=$this->input->post('idMonitoreo');

            $idObservacion = $this->Model_Mo_Observacion->insertar($c_data);

            $msg = ($idObservacion != '' || $idObservacion != NULL ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente', 'idObservacion' =>$idObservacion]) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;

        }
    }
}
