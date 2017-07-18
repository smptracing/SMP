<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Presupuesto_Inv extends CI_Controller {
	public function __construct(){
      parent::__construct();
	}
	public function insertar()
	{
		if($_POST)
		{
			$txtDescripcionFuente =$this->input->post("txtDescripcionFuente");
			$txtCorelativoMeta =$this->input->post("txtCorelativoMeta");
			$txtAnio =$this->input->post("txtAnio");
	    	//$Data=$this->Model_FEPresupuestoInv->insertar($txtDescripcionFuente,$txtCorelativoMeta,$txtAnio);
	    	$suma=0;
	    	for ($i=0; $i <count($txtAnio); $i++) { 
	    		$suma=$suma+1;
	    	}
	    	$this->session->set_flashdata('correcto',$suma);
	    	return redirect('/Estudio_Inversion/'); 	
		}
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/insertar');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/Formulacion_Evaluacion/header');
      $this->load->view($template);
      $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}