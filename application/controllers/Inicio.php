<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->_load_layout('Inicio');
	}

	function _load_layout($template)
    {
    	$this->load->view($template);
    }
}
