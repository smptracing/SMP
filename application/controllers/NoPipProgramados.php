<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NoPipProgramados extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NoPipProgramados_Model');
    }
    //PIP
    //Listar No proyectos programados
    public function GetNoPipProgramados()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listarnopip_programado";
            $anio = $this->input->post("anio");
            $data = $this->NoPipProgramados_Model->GetNoPipProgramados($flat, $anio);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    public function index()
    {
        $this->_load_layout('Front/Pmi/frmnopipprogramados');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsNoPipProgramados.php');
    }
}
