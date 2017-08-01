<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PipProgramados extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PipProgramados_Model');
    }
    //PIP
    //Listar programación en modal operacion y mantenimiento

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmpipprogramados');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsPipProgramados.php');
    }

}
