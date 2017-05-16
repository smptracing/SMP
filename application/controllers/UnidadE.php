<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadE extends CI_Controller {
	public function __construct(){
      parent::__construct();
      $this->load->model('Model_UnidadE');
	}
	public function index()
	{
		$this->_load_layout('Front/Administracion/frmUnidadEjecutora');
	}

 
//----------------------MANTENIMIENTOS DE UNIDAD EJECUTORA-------------------------------------------
//AGREGAR UNA UNIDAD DE EJECUTORA
function AddUnidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreUnidadE =$this->input->post("txt_NombreUnidadE");
	      if($this->Model_UnidadE->AddUnidadE($txt_NombreUnidadE) == true)
	        echo "Se añadio la unidad ejecutora";
	      else
	        echo "No se añadio  la unidad ejecutora";  

	    }
	
	    else
	    {
	      show_404();
	    }

 	 }
//FIN DE AGREGAR UNA UNIDAD EJECUTORA

//LISTAR UNIDAD DE  EJECUCION*/
	 function GetUnidadE()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_UnidadE->GetUnidadE();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
//FIN LISTAR UNIDAD DE  EJECUCION
//ACTUALIZAR O MODIFICAR DATOS DE UNIDAD EJECUTORA
 	function UpdateUnidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdUnidadEModif =$this->input->post("txt_IdUnidadEModif");
		      $txt_NombreUnidadEU =$this->input->post("txt_NombreUnidadEU");
		      if($this->Model_UnidadE->UpdateUnidadE($txt_IdUnidadEModif,$txt_NombreUnidadEU) == false)
		        echo "Se actualizo correctamente la unidad ejecutora";
		      else
		        echo "No se actualizo correctamente la unidad ejecutora"; 
	    }
	    else
	    {
	      	show_404();
	    }
 	 }
//FIN ACTUALIZAR O MODIFICAR DATOS DE UNIDAD EJECUTORA
//----------------------FIN MANTENIMIENTOS DE UNIDAD EJECUTORA-------------------------------------------

	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}
