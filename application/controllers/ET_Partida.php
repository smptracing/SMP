<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Partida extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_ET_Etapa');
	}

	public function index()
    {
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('Front/Ejecucion/ETPartidad/index');
        $this->load->view('layout/Ejecucion/footer');
    }
	public function insertar()
	{
		if($_POST)
		{
			$txtDescripcionEtapa=$this->input->post('txtDescripcionEtapa');
			$this->Model_ET_Etapa->insertar($txtDescripcionEtapa);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'txtDescripcionEtapa' => $txtDescripcionEtapa]);exit;
		}
		$this->load->view('Front/Ejecucion/ETPartida/insertar');
	
	}
	public function editar()
	{
		/*if($this->input->post('hdIdPresupuestoFE'))
		{	
			
		}
	    $this->load->view('Front/Ejecucion/ETEtapa/editar', ['fePresupuestoInv' => $fePresupuestoInv, 'listarSector' => $listarSector, 'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento, 'listaFEPresupuestoFuente' => $listaFEPresupuestoFuente]);*/
	}
}