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

 //----------------------MANTENIMIENTOS DE MODALIDAD DE EJECUCION--------------------------------------------
// AGREGAR UNA MODALIDAD EJECUCION
function AddModalidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreModalidadE =$this->input->post("txt_NombreModalidadE");
	      $txtArea_DescModalidadE=$this->input->post("txtArea_DescModalidadE");
	      if($this->Model_RubroE->AddModalidadE($txt_NombreModalidadE,$txtArea_DescModalidadE) == true)
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
		$datos=$this->Model_RubroE->GetModalidadE();
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
		      $txtArea_DescModalidadEU =$this->input->post("txtArea_DescModalidadEU");
		      if($this->Model_RubroE->UpdateModalidadE($txt_IdModalidadEModif,$txt_NombreModalidadEU,$txtArea_DescModalidadEU) == false)
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

//----------------------MANTENIMIENTOS DE UNIDAD EJECUTORA-------------------------------------------
//AGREGAR UNA UNIDAD DE EJECUTORA
function AddUnidadE()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreUnidadE =$this->input->post("txt_NombreUnidadE");
	      if($this->Model_RubroE->AddUnidadE($txt_NombreUnidadE) == true)
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
		$datos=$this->Model_RubroE->GetUnidadE();
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
		      if($this->Model_RubroE->UpdateUnidadE($txt_IdUnidadEModif,$txt_NombreUnidadEU) == false)
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
      $this->load->view('layout/header');
      $this->load->view($template);
      $this->load->view('layout/footer');
    }

}
