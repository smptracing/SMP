<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Presupuesto_Inv extends CI_Controller {
	public function __construct(){
      parent::__construct();
	}
	public function insertar()
	{
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/insertar');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/Formulacion_Evaluacion/header');
      $this->load->view($template);
      $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}