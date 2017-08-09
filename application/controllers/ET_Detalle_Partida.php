<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Detalle_Partida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_Unidad_Medida');
	}

	public function insertar()
	{
		$this->load->view('Front/Ejecucion/ETDetallePartida/insertar');
	}
}