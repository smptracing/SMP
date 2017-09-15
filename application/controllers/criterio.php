<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criterio extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Criterio');
	}
	public function mantenimiento(){
		$this->_load_layout('front/Criterio/frmMantenimiento');
	}
	public function prioridad(){
		$this->_load_layout('front/Criterio/frmPrioridad');
	}
	function itemPrioridad(){
		$data['id_proyecto']=$this->input->get("id_proyecto");
    	$data['arrayValorizacion']=$this->Model_Criterio->getValorizacion($this->input->get("id_proyecto"));
		$this->load->view('Front/Criterio/itemPrioridad',$data);
	}
	function _load_layout($template){
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }
    function getFactor(){
		if ($this->input->is_ajax_request()) {
			$datos=$this->Model_Criterio->getFactor();
			echo json_encode($datos);
		}
		else{
			show_404();
		}
	}
	function getCriterio(){
		if ($this->input->is_ajax_request()) {
			$datos=$this->Model_Criterio->getCriterio();
			echo json_encode($datos);
		}
		else{
			show_404();
		}
	}
	function addPrioridad(){	
		if ($this->input->is_ajax_request()) {
			echo $this->Model_Criterio->addPrioridad($this->input->post("id_proyecto"),$this->input->post("arrayValorizacion"));
		}
		else{
			show_404();
		}
	}
}
