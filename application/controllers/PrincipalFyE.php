<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalFyE extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_DashboardFE');
    }

    public function PrincipalFyED(){

        $this->_load_layout('Formulacion_Evaluacion');

    }

    public function Formulacion_Eval()
    {
        $this->_load_layout('front/Formulacion_Evaluacion/Inicio.php');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
    //estadistica
    public function GetAprobadosEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardFE->GetAprobadosEstudio();
            echo json_encode($datos);
        } else
        show_404();
    }
    //fin estadistica

    public function getDatosEstudiosInversionNotificacion()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardFE->getDatosEstudiosInversion();
            echo json_encode($datos);
        } else
            show_404();
    }
}
