<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioEspecifico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioEspecifico');
	}
	public function index(){		
		$this->load->view('front/Pmi/CriteriosEspecificos/index');
		
	}
	
}
