<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Actividad extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Actividad');
        $this->load->model('Model_Unidad_Medida');
    }

    function Insertar()
    {
        if($_POST)
        {
            $c_data['desc_actividad'] = $this->input->post('txtActividad');
            $c_data['uni_medida'] = $this->input->post('txtUnidad');
            $c_data['fecha_inicio'] = $this->input->post('txtFechaInicio');
            $c_data['fecha_fin'] = $this->input->post('txtFechaFin');
            $c_data['meta'] = $this->input->post('txtMeta');
            $c_data['id_producto'] =  $this->input->post('hdIdProducto');

            $data = $this->Model_Mo_Actividad->insertar($c_data);
            $msg = array();

            $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;
        }

        $idPi = $this->input->get('idPi');
        $idProducto = $this->input->get('idProducto');
        $listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
        $this->load->view('front/Monitoreo/Mo_Actividad/insertar',['listaUnidadMedida' => $listaUnidadMedida, 'idPi' => $idPi, 'idProducto'=>$idProducto ]); 
    }
}
