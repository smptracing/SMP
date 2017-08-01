<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Meta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Meta');
		$this->load->model('Model_ET_Partida');
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

	public function eliminar()
	{
		if($_POST)
		{
			$idMeta=$this->input->post('idMeta');

			$meta=$this->Model_ET_Meta->ETMetaPorIdMeta($idMeta);

			$this->eliminarMetaAnidada($meta);

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Meta eliminada correctamente.']);exit;
		}

		$this->load->view('Front/Ejecucion/ETPartida/insertar');
	}

	private function eliminarMetaAnidada($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		foreach($temp as $key => $value)
		{
			$this->eliminarMetaAnidada($value);
		}

		if(count($temp)==0)
		{
			$this->Model_ET_Partida->eliminarPorIdMeta($meta->id_meta);
		}

		$this->Model_ET_Meta->eliminar($meta->id_meta);
	}
}