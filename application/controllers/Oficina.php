<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficina extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Oficina');
    }

    public function index()
    {
        $this->_load_layout('Front/Administracion/frmOficina.html');
    }

    function GetOficina()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Oficina->GetOficina();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function _load_layout($template)
    {
        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view($template);
        $this->load->view('layout/ADMINISTRACION/footer');
    }

}
