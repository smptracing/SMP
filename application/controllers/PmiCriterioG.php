<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioG extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Funcion');
	}
	public function index(){
	  $this->load->view('layout/PMI/header');
      $this->load->view('front/Pmi/CriteriosGenerales/index');
      $this->load->view('layout/PMI/footer');	
	}

	public function insertar()
	{
		if($_POST)
		{

			
		}
		$function=$this->Model_Funcion->GetFuncion();
		$this->load->view('front/Pmi/CriteriosGenerales/insertar',['function' => $function]);
	}

	
}
