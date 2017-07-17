<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_Gasto_FE extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_TipoGastoFE');
	}
	public function index()
	{
		$data['Tipo_Gasto_FE']=$this->Model_TipoGastoFE->ListarTipoGastoFE();
		//$this->_load_layout('Front/PresupuestoEstudioInversion/TipoGastoFE/index',$data);
		$this->load->view('layout/Formulacion_Evaluacion/header');
		$this->load->view('Front/PresupuestoEstudioInversion/TipoGastoFE/index',$data);
		$this->load->view('layout/Formulacion_Evaluacion/footer');
	}
	public function insertar()
	{
		if ($this->input->is_ajax_request()) 
	    {
	    	$txt_descripcion_tipo =$this->input->post("txt_descripcion_tipo");
	    	$Data=$this->Model_TipoGastoFE->insertar($txt_descripcion_tipo);
	    	echo json_encode($Data);
		} 
	    else
	    {
	    	show_404();
	    }
		$this->load->view('Front/PresupuestoEstudioInversion/TipoGastoFE/insertar');
	}
	/*function _load_layout($template)
    {
      $this->load->view('layout/Formulacion_Evaluacion/header');
      $this->load->view($template);
      $this->load->view('layout/Formulacion_Evaluacion/footer');
    }*/
}