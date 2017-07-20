<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Detalle_Presupuesto extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FE_Presupuesto_Inv');
	}

	public function index()
    {
  
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/index');
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

	public function insertar()
	{
		if($_POST)
		{
			
		}
		
	    $this->load->view('Front/PresupuestoEstudioInversion/DetallePresupuesto/insertar');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/Formulacion_Evaluacion/header');
      $this->load->view($template);
      $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}