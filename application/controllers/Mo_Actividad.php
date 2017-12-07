<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Actividad extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Actividad');
    }

    function Insertar()
    {
        if($_POST)
        {
            /*$c_data['desc_producto'] = $this->input->post('descripcionProducto');
            $c_data['id_pi'] =  $this->input->post('idPi');
            $data = $this->Model_Mo_Producto->insertar($c_data);
            $msg = array();

            $msg = ($data != '' || $data != null ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente', 'idProducto' => $data ]) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;*/
            
            //$this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        //$idProducto = $this->input->get('idProducto');
        //echo $idProducto;
        //exit;

        $this->load->view('front/Monitoreo/Mo_Actividad/insertar'); 
    }
}
