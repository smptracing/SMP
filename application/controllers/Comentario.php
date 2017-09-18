<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comentario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Comentario');
	}

	public function insertar()
	{
		$this->load->view('front/Ejecucion/Comentario/insertar');
	}
}
?>