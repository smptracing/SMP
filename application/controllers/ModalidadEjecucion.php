<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModalidadEjecucion extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ModalidadE');
	}
	public function index()
	{
		$this->_load_layout('Front/Administracion/frmUnidadEjecutora');
	}

 //----------------------MANTENIMIENTOS DE MODALIDAD DE EJECUCION--------------------------------------------
// AGREGAR UNA MODALIDAD EJECUCION
function AddModalidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreModalidadE =$this->input->post("txt_NombreModalidadE");
	      if($this->Model_ModalidadE->AddModalidadE($txt_NombreModalidadE) == true)
	        echo "Se añadio la modalidad de ejecucion";
	      else
	        echo "No se añadio  la modalidad de ejecucion";  
	    }
	    else
	    {
	      show_404();
	    }

 	 }
//FIN DE AGREGAR UNA MODALIDAD EJECUCION	

//LISTAR MODALIDAD DE  EJECUCION*/
	 function GetModalidadE()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_ModalidadE->GetModalidadE();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
//FIN LISTAR MODALIDAD DE  EJECUCION

//ACTUALIZAR O MODIFICAR DATOS DE MODALIDAD DE EJECUCION
 	function UpdateModalidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdModalidadEModif =$this->input->post("txt_IdModalidadEModif");
		      $txt_NombreModalidadEU =$this->input->post("txt_NombreModalidadEU");
		      if($this->Model_ModalidadE->UpdateModalidadE($txt_IdModalidadEModif,$txt_NombreModalidadEU) == false)
		        echo "Se actualizo correctamente la modalidad de ejecucion";
		      else
		        echo "No Se actualizo correctamente la modalidad de ejecucion"; 
	    }
	    else
	    {
	      	show_404();
	    }
 	 }
//FIN ACTUALIZAR O MODIFICAR DATOS DE MODALIDAD DE EJECUCION
//----------------------FIN DE LOS MANTENIMIENTOS DE MODALIDAD DE EJECUCION-------------------------------

	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}
