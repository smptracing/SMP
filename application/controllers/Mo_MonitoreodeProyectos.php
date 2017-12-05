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
        if($_POST)
        {
            //$this->load->view('front/Monitoreo/Mo_Producto/insertar');
        }
        
        $codigoUnico = $this->input->get('inputValue');
        $proyecto = $this->Model_Mo_Producto->buscarProyecto($codigoUnico);
        $this->load->view('front/json/json_view', ['datos' => $proyecto]); 
    }
}
