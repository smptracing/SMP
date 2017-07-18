<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Presupuesto_Inv extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FE_Presupuesto_Inv');
	}
	public function insertar()
	{
		if($_POST)
		{
			
			$cbx_estudioInversion =1;
			$txtSector =$this->input->post("txtSector");
			$txtPliego =$this->input->post("txtPliego");

			$Data=$this->Model_FE_Presupuesto_Inv->insertar($cbx_estudioInversion , $txtSector , $txtPliego);

			$data=$this->Model_FE_Presupuesto_Inv->ultimoIdPresupuestoInv()[0];
			$id_presupuesto_fe =$data->id;
			$id_fuente_finan=1;
			$hdDescripcionFuente=$this->input->post("hdDescripcionFuente");
			$hdCorrelativoMeta=$this->input->post("hdCorrelativoMeta");
			$hdAnio=$this->input->post("hdAnio");
	    	for ($i=0; $i <count($hdAnio); $i++) { 
	    		$hdDescripcionFuente[$i];
	    		$Data=$this->Model_FE_Presupuesto_Inv->insertarPresupuestoFuente($id_presupuesto_fe,$id_fuente_finan,$hdCorrelativoMeta[$i],$hdAnio[$i]);
	    	}
	    	$this->session->set_flashdata('correcto',"Se registro corectamente el presupuesto");
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