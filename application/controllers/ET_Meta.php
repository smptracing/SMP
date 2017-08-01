<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Meta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Meta');
	}

	public function insertar()
	{
		$idComponente=$this->input->post('idComponente');
		$idMetaPadre=$this->input->post('idMetaPadre');
		$descripcionMeta=$this->input->post('descripcionMeta');

		$this->Model_ET_Meta->insertar(($idComponente=='' ? null : $idComponente), ($idMetaPadre=='' ? null : $idMetaPadre), $descripcionMeta);

		$ultimoIdMeta=$this->Model_ET_Meta->ultimoId();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Meta registrada correctamente.', 'idMeta' => $ultimoIdMeta]);exit;
	}
}