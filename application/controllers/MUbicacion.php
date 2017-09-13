<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUbicacion extends CI_Controller {
    public function __construct(){
		parent::__construct();
		$this->load->model('Ubicacion_Model');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmMUbicacion');
	}
	  function get_departamento()
	{
		 if ($this->input->is_ajax_request()) 
		{
			$datos=$this->Ubicacion_Model->get_departamento();	
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}	
	}
	function get_provincias()
	{
		 if ($this->input->is_ajax_request()) 
		{
			$IdDepartamento = $this->input->post("IdDepartamento");
			$datos=$this->Ubicacion_Model->get_provincias($IdDepartamento);	
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}	
	}
	function get_distritos(){
		if ($this->input->is_ajax_request()) 
		{
			$IdProvincia = $this->input->post("IdProvincia");
			$datos=$this->Ubicacion_Model->get_distritos($IdProvincia);	
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }
  

}


