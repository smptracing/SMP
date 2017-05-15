<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectoInversion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ProyectoInversion');
	}
    
     function GetProyectoInversion()
  	{
  		if ($this->input->is_ajax_request()) 
  		{
  		$datos=$this->Model_ProyectoInversion->ProyectoInversion();
  		echo json_encode($datos);
  		}
  		else
  		{
  			show_404();
  		}
  	}
     public function index()
    {
      $this->_load_layout('Front/Pmi/frmMProyectoInversion');
    } 
    function _load_layout($template)
    {
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }

}
