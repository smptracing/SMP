<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Compromiso extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Compromiso');
    }

    function insertar()
    {
        if($_POST)
        {
            $msg = array();

            $c_data['desc_compromiso']=$this->input->post('descripcionCompromiso');
            $c_data['fecha_registro']=date('Y-m-d');
            $c_data['id_observacion']=$this->input->post('idObservacion');

            $idCompromiso = $this->Model_Mo_Compromiso->insertar($c_data);

            $msg = ($idCompromiso != '' || $idCompromiso != NULL ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente', 'idCompromiso' =>$idCompromiso]) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;
        }
    }

    function editar()
    {
        $msg = array();
        $u_data['desc_compromiso']=$this->input->post('descripcionObservacion');
        $u_data['fecha_modificacion']=date('Y-m-d');
        $data = $this->Model_Mo_Compromiso->editar($u_data,$this->input->post('idCompromiso'));
        $msg = ($data>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
        echo json_encode($msg);exit;
    }

   
}
