<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalReportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function PrincipalReportes(){

        $this->_load_layout('Reportes');

    }

    public function _load_layout($template)
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view($template);
        $this->load->view('layout/Reportes/footer');
    }

}


