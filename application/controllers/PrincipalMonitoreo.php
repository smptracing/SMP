<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrincipalMonitoreo extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

    }

    function principalmonitoreo()
    {
        $this->load->view('layout/MONITOREO/header');
        $this->load->view('layout/MONITOREO/footer');
    }
}
