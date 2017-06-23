<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EvaluacionFE extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_EvaluacionFE');
    }
    public function GetEvaluacionFE()
    {
        if ($this->input->is_ajax_request()) {
            $Etapa = "Evaluación";
            $datos = $this->Model_EvaluacionFE->GetEvaluacionFE($Etapa);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
  //LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP EN EVALUACION
    public function GetDetallesituacionActual(){
      if ($this->input->is_ajax_request()) 
        {
          $codigo_unico_est_inv =$this->input->post("codigo_unico_est_inv");
        $datos=$this->Model_EvaluacionFE->GetDetallesituacionActual($codigo_unico_est_inv);
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
  // FIN LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP EN EVALUACION
 //LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP
	public function index()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmEvaluacionFE');
	}


    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}
