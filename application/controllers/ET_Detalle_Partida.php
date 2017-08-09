<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Detalle_Partida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('Model_ET_Expediente_Tecnico');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Etapa_Ejecucion');
	}

	public function insertar()
	{
		$listaETEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucion_Listar('R');
		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
		$etExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($this->input->get('idExpedienteTecnico'));

		$this->load->view('Front/Ejecucion/ETDetallePartida/insertar', ['listaETEtapaEjecucion' => $listaETEtapaEjecucion, 'listaUnidadMedida' => $listaUnidadMedida, 'etExpedienteTecnico' => $etExpedienteTecnico]);
	}
}