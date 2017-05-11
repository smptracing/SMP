<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MRubroEjecucion extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_RubroE');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmMRubroEjecucion');
	}
//---------------------MANTENIMIENTOS DE RUBRO DE EJECUCION-------------------------------------
//AGREGAR UN RUBRO DE EJECUCION
	 function AddRubroE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreRubroE =$this->input->post("txt_NombreRubroE");
	      $txtArea_DescRubroE =$this->input->post("txtArea_DescRubroE");
	      if($this->Model_RubroE->AddRubroE($txt_NombreRubroE,$txtArea_DescRubroE) == true)
	        echo "Se añadio un rubro de ejecucion";
	      else
	        echo "No se añadio  un rubro de ejecucion";  
	    }
	    else
	    {
	      show_404();
	    }

 	 }
//FIN DE AGREGAR UN RUBRO DE EJECUCION	

/* LISTAR RUBROS DE EJECUCION*/
	 function GetRubroE()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_RubroE->GetRubroE();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
//FIN LISTAR RUBROS DE EJECUCION

	//ACTUALIZAR O MODIFICAR DATOS DE LOS RUBROS
 	function UpdateRubroE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdRubroEModif =$this->input->post("txt_IdRubroEModif");
		      $txt_NombreRubroEU =$this->input->post("txt_NombreRubroEU");
		      $txtArea_DescRubroEU =$this->input->post("txtArea_DescRubroEU");
		      if($this->Model_RubroE->UpdateRubroE($txt_IdRubroEModif,$txt_NombreRubroEU,$txtArea_DescRubroEU) == false)
		        echo "Se actualizo correctamente el rubro de ejecucion";
		      else
		        echo "No Se actualizo correctamente el rubro de ejecucion"; 
	
	    }
	    else
	    {
	      	show_404();
	    }
 	 }
//FIN ACTUALIZAR O MODIFICAR DATOS DE LOS RUBROS DE EJECUCION
//----------------------FIN MANTENIMIENTOS DE RUBRO DE EJECUCION--------------------------------------------

	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}
