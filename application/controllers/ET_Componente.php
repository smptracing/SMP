<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Componente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar()
	{
		$this->load->view('front/Ejecucion/ETComponente/insertar.php');
	}
}