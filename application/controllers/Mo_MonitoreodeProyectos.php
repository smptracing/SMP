<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_MonitoreodeProyectos extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Producto');
    }

    function index()
    {
        $this->load->view('layout/MONITOREO/header');
        $this->load->view('front/Monitoreo/index');
        $this->load->view('layout/MONITOREO/footer');
    }
    function BuscarProyecto()
    {
        $codigoUnico = $this->input->get('inputValue');
        $proyecto = $this->Model_Mo_Producto->buscarProyecto($codigoUnico);
        $this->load->view('front/json/json_view', ['datos' => $proyecto]); 
    }
    function InsertarProducto()
    {
        if($_POST)
        {
            $c_data['desc_producto'] = $this->input->post('descripcionProducto');
            $c_data['id_pi'] =  $this->input->post('idPi');
            $data = $this->Model_Mo_Producto->insertar($c_data);
            $msg = array();

            $msg = ($data != '' || $data != null ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente', 'idProducto' => $data ]) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;
            
            //$this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        
        $codigoUnico = $this->input->get('codigoUnico');
        $proyecto = $this->Model_Mo_Producto->buscarProyecto($codigoUnico);
        $this->load->view('front/Monitoreo/Mo_Producto/insertar', ['proyecto' => $proyecto]); 

    }
}
