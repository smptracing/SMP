<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipEstudioFE extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_TipEstudioFE');
	}
    
    public function GetTipEstudioFE(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_TipEstudioFE->GetTipEstudioFE();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }

	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
