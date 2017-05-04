<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

public function __construct(){
		parent::__construct();
		
	}

	public function index()
	{
		
		$this->_load_layout('Front/Usuario/frm_usuario');
	}
	public function get_usuario()
	{
		
		$this->_load_layout('Front/Usuario/frm_usuario');
	}
function _load_layout($template)
    {
      $this->load->view('layout/header');
      $this->load->view($template);
      $this->load->view('layout/footer');
    }

}
