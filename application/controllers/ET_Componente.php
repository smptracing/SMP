<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Componente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_Unidad_Medida');
	}

	public function insertar()
	{
		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

		$this->load->view('front/Ejecucion/ETComponente/insertar.php', ['listaUnidadMedida' => $listaUnidadMedida]);
	}
}