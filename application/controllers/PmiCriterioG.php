<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioG extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Criterio');
	}
	public function index(){
	  $this->load->view('layout/PMI/header');
      $this->load->view('front/Pmi/CriteriosGenerales/index');
      $this->load->view('layout/PMI/footer');	
	}
	
}
