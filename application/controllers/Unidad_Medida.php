<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unidad_Medida extends CI_Controller
{
	        public function __construct()
	        {
	            parent::__construct(); 
	            $this->load->library('table');
	            $this->load->model("Model_Unidad_Medida");    
	        }

	        public function index()
	        {
	            $data['Unidad_Medida']=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
	            $this->load->view('layout/ADMINISTRACION/header');
	            $this->load->view('front/Administracion/UnidadMedida/index',$data);
	            $this->load->view('layout/ADMINISTRACION/footer');
	        }
	        public function insertar()
	        {
	        	if ($this->input->is_ajax_request())
	        	{
	        		$txt_descripcion=$this->input->post('txt_descripcion');
	        		$datos=$this->Model_Unidad_Medida->insertar($txt_descripcion);
	        		echo json_encode($datos);
	        	}
	        	else
	        	{
	        		show_404();
	        	}
	             $this->load->view('front/Administracion/UnidadMedida/insertar');
	        }
	       function _load_layout($template)
	        {
	          $this->load->view('layout/ADMINISTRACION/header');
	          $this->load->view($template);
	          $this->load->view('layout/ADMINISTRACION/footer');
	        }
}
