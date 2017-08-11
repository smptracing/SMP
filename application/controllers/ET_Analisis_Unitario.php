<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Analisis_Unitario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Recurso');
		$this->load->model('Model_ET_Presupuesto_Analitico');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Etapa_Ejecucion');
		$this->load->model('Model_ET_Detalle_Partida');
		$this->load->model('Model_ET_Analisis_Unitario');
		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
	}

	public function insertar()
	{
		if($_POST)
		{

		}

		$idPartida=$this->input->get('idPartida');

		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

		$etEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucionPorDescEtaoaET('Elaboración de expediente técnico');
		$etDetallePartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartidaAndIdEtapaET($idPartida, $etEtapaEjecucion->id_etapa_et);
		$listaETAnalisisUnitario=$this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdDetallePartida($etDetallePartida->id_detalle_partida);

		foreach($listaETAnalisisUnitario as $key => $value)
		{
			$value->childETDetalleAnalisisUnitario=$this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisis($value->id_analisis);
		}

		$listaETRecurso=$this->Model_ET_Recurso->RecursoListar('R');
		$listaETPresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoPorIdET($this->input->get('idET'));

		$this->load->view('Front/Ejecucion/ETAnalisisUnitario/insertar', ['listaUnidadMedida' => $listaUnidadMedida, 'listaETAnalisisUnitario' => $listaETAnalisisUnitario, 'listaETRecurso' => $listaETRecurso, 'listaETPresupuestoAnalitico' => $listaETPresupuestoAnalitico]);
	}
}