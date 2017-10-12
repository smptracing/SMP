<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntajeCriterioPi extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_PuntajeCriterioPi');
		$this->load->model('Model_CriterioGeneral');

	}
	public function index($funcion=''){	

		$listarFuncion=$this->Model_PuntajeCriterioPi->FuncionPip();
		$listaPipPriorizar=$this->Model_PuntajeCriterioPi->PipPriorizar($funcion);

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/index',['listaPipPriorizar'=>$listaPipPriorizar,'listarFuncion'=>$listarFuncion,'id_funcion'=>$funcion]);
		$this->load->view('layout/PMI/footer');	
	}

	public function insertar()
	{
		if($_POST)
		{

		}
		$fechaA=date("Y-m-d");
		$cadena=explode('-', $fechaA);
		$anio=$cadena[0];

		$id_funcion=$this->input->Get('id_funcion');
		$id_pi=$this->input->Get('id_pi');

		$anio=$cadena[0];
		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio);

		$listaUnicaProIv=$this->Model_PuntajeCriterioPi->proyectoInvUnico($id_pi);
		$this->load->view('front/Pmi/PuntajeCriterioPi/insertar',['listaUnicaProIv' =>$listaUnicaProIv,'listaCritetioGeneral' => $listaCritetioGeneral]);

	}

	public function pipPriorizadas(){

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/pipPriorizadas');
		$this->load->view('layout/PMI/footer');	
	}

	
}
