<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Analisis_Unitario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar()
	{
		$this->load->view('Front/Ejecucion/ETAnalisisUnitario/insertar');
	}
}