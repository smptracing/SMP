<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EvaluacionFE extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_EvaluacionFE');
	}
	  public function GetEvaluacionFE(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_EvaluacionFE->GetEvaluacionFE();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
	public function index()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmEvaluacionFE');
	}

	function _load_layout($template)
    {
      $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}
