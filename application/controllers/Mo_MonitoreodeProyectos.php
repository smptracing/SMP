<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_MonitoreodeProyectos extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->load->view('layout/MONITOREO/header');
        $this->load->view('front/Monitoreo/index');
        $this->load->view('layout/MONITOREO/footer');
    }
}
