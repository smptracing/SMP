<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expediente_Tecnico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function _load_layout($template)
	{
		$this->load->view('layout/Ejecucion/header');
		$this->load->view($template);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function index()
	{
		$this->_load_layout('front/Ejecucion/ExpedienteTecnico/index.php');
	}
}