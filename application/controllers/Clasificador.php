<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clasificador extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_Clasificador');
	}

	public function index()
    {
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('Front/Ejecucion/Clasificador/index');
        $this->load->view('layout/Ejecucion/footer');
    }
	public function insertar()
	{
		if($_POST)
		{
			$txtNumeroClasi=$this->input->post('txtNumeroClasi');
			$txtDescripcionClasi=$this->input->post('txtDescripcionClasi');
			$txtDetalleClasi=$this->input->post('txtDetalleClasi');

			$this->Model_Clasificador->insertar($txtNumeroClasi,$txtDescripcionClasi,$txtDetalleClasi);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'txtNumeroClasi' => $txtNumeroClasi]);exit;
		}
		$this->load->view('Front/Ejecucion/Clasificador/insertar');
	
	}
	public function editar()
	{
		if($this->input->post('hdIdClasificadro'))
		{	
			$hdIdClasificadro=$this->input->post('hdIdClasificadro');
			$txtNumeroClasi=$this->input->post('txtNumeroClasi');
			$txtDescripcionClasi=$this->input->post('txtDescripcionClasi');
			$txtDetalleClasi=$this->input->post('txtDetalleClasi');
		}
	    $this->load->view('Front/Ejecucion/ETEtapa/editar', ['fePresupuestoInv' => $fePresupuestoInv, 'listarSector' => $listarSector, 'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento, 'listaFEPresupuestoFuente' => $listaFEPresupuestoFuente]);
	}
}