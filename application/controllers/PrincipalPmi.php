<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrincipalPmi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_DashboardPmi');
    }

    public function pmi()
    {
        $this->_load_layout('pmi');
    }

    function EstadisticaPipProvinc()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaPipProvinc();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function EstadisticaMontoPipProvincias()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaMontoPipProvincias();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    public function EstadisticaPipEstadoCiclo()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaPipEstadoCiclo();
            echo json_encode($datos);
        } else
            show_404();
    }

    function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
    }
}
