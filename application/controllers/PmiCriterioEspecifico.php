<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioEspecifico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioEspecifico');
	}
	public function index(){	


		$id_criterio_gen=$this->input->GET('id_criterio_gen');

		$nombre_criterio_gen=$this->input->GET('nombre_criterio_gen');


		$listaCriterioEspec=$this->Model_CriterioEspecifico->ListarCriterioEspecifico($id_criterio_gen);

		$this->load->view('front/Pmi/CriteriosEspecificos/index',['id_criterio_gen' => $id_criterio_gen,'nombre_criterio_gen'=> $nombre_criterio_gen,'listaCriterioEspec' => $listaCriterioEspec]);
		
	}
	
}
