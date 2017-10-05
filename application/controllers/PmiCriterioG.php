<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioG extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioGeneral');
		$this->load->model('Model_Funcion');
	}
	public function insertar()
	{
		if($_POST)
		{

		}

		$id_funcion=$this->input->GET('id_funcion');
		$nombre_funcion=$this->input->GET('nombre_funcion');

		$function=$this->Model_Funcion->GetFuncion();

		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion);

		$this->load->view('front/Pmi/CriteriosGenerales/insertar',['function' => $function,'id_funcion' => $id_funcion,'nombre_funcion'=> $nombre_funcion,'listaCritetioGeneral' => $listaCritetioGeneral]);
	}

	public function index(){
		$listaCriterioGen=$this->Model_CriterioGeneral->CriteriosGenerales();
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/index',['listaCriterioGen'=>$listaCriterioGen]);
		$this->load->view('layout/PMI/footer');	
	}


	public function criterioFuncion(){
		$listaCriterioFuncion=$this->Model_CriterioGeneral->CriteriosGeneralesPorFuncion();
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/criteriosFuncion',['listaCriterioFuncion'=>$listaCriterioFuncion]);
		$this->load->view('layout/PMI/footer');	
	}
	
}
