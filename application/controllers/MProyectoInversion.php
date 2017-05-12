<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MProyectoInversion extends CI_Controller {

public function __construct(){
      parent::__construct();
     // $this->load->model('Model_Brecha');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmMProyectoInversion.php');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }

}
