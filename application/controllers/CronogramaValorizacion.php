<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronogramaValorizacion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_CronogramaValorizacion');
	}

	public function index()
    {
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('Front/Ejecucion/CronogramaValorizacion/index');
        $this->load->view('layout/Ejecucion/footer');
    }
	public function insertar()
	{
		if($_POST)
		{
			$txtCronogramaValorizacion=$this->input->post('txtCronogramaValorizacion');
			$this->Model_CronogramaValorizacion->insertar($txtCronogramaValorizacion);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'txtCronogramaValorizacion' => $txtCronogramaValorizacion]);exit;
		}
		$this->load->view('Front/Ejecucion/CronogramaValorizacion/insertar');
	}
	public function editar()
	{
		if($this->input->post('hdIdPresupuestoFE'))
		{	
			
		}
	    $this->load->view('Front/Ejecucion/CronogramaValorizacion/index', []);
	}
}