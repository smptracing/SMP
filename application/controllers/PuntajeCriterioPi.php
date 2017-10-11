<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntajeCriterioPi extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_PuntajeCriterioPi');
	}
	public function index(){	

		$listaPipPriorizar=$this->Model_PuntajeCriterioPi->PipPriorizar();

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/index',['listaPipPriorizar'=>$listaPipPriorizar]);
		$this->load->view('layout/PMI/footer');	
	}
	
}
