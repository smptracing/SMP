<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DenominacionFE extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_DenominacionFE');
	}
	public function index()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmDenominacionFE');
	}
    //CONTROLADOR DE LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN UNA TABLA
    public function GetDenominacionFE(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_DenominacionFE->GetDenominacionFE();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     //CONTROLADOR DE LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN UNA TABLA
	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
