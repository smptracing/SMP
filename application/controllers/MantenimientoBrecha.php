<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MantenimientoBrecha extends CI_Controller {

public function __construct(){
      parent::__construct();
      $this->load->model('Model_Brecha');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmMantenimientoBrecha');
	}
//----------------MANTENIMIENTO DE LOS DATOS DE BRECHAS---------------------	
	/*INSERTAR UNA NUEVA BRECHA*/
	 function AddBrecha()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreBrecha =$this->input->post("txt_NombreBrecha");
	      $txtArea_DescBrecha =$this->input->post("txtArea_DescBrecha");
	      if($this->Model_Brecha->AddBrecha($txt_NombreBrecha,$txtArea_DescBrecha) == true)
	        echo "Se añadio una  Brecha";
	      else
	        echo "No se añadio  una Brecha";  
	    }
	    else
	    {
	      show_404();
	    }
 	 }
//FIN INSERTAR UNA NUEVA BRECHA
    /* LISTAR BRECHAS*/
	 function GetBrecha()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_Brecha->GetBrecha();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
//FIN LISTAR BRECHAS 
//ACTUALIZAR O MODIFICAR DATOS DE LAS BRECHAS
 	function UpdateBrecha()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdBrechaModif =$this->input->post("txt_IdBrechaModif");
		      $txt_NombreBrechaU =$this->input->post("txt_NombreBrechaU");
		      $txtArea_DescBrechaU =$this->input->post("txtArea_DescBrechaU");
		      if($this->Model_Brecha->UpdateBrecha($txt_IdBrechaModif,$txt_NombreBrechaU,$txtArea_DescBrechaU) == false)
		        echo "Se actualizo correctamente la brecha";
		      else
		        echo "No Se actualizo correctamente la brecha"; 
	    }
	    else
	    {
	      	show_404();
	    }
 	 }
//FIN ACTUALIZAR O MODIFICAR DATOS DE LAS BRECHAS

 	 //ELIMINAR BRECHA
 	 function DeleteBrecha()
 	 {
 	 	if($this->input->is_ajax_request()) 
	    {

	      $id_brecha=$this->input->post("id_brecha");
	     if($this->Model_Brecha->DeleteBrecha($id_brecha)== false)
		       echo "Se elimino la brecha";
		      else
		      echo "No se elimino ella brecha"; 
		 } 
	     else
	     {
	      show_404();
	      }
 	 }
 	 //FIN ELIMINAR BRECHA
//----------------FIN MANTENIMIENTO DE LOS DATOS DE BRECHAS---------------------

 //----------------MANTENIMIENTO DE LOS DATOS DE INDICADOR---------------------

/*INSERTAR UN INDICADOR*/
	 function AddIndicador()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreIndicador =$this->input->post("txt_NombreIndicador");
	      $txtArea_DefIndicador =$this->input->post("txtArea_DefIndicador");
	      $txt_UnidadMedida =$this->input->post("txt_UnidadMedida");
	     if($this->Model_Brecha->AddIndicador($txt_NombreIndicador,$txtArea_DefIndicador,$txt_UnidadMedida) == true)
	        echo "Se añadio un indicador";
	      else
	        echo "No se añadio  un indicador";  
	  
	    }
	    else
	    {
	      show_404();
	    }

 	 }
 /*FIN INSERTAR UN INDICADOR*/

  /* LISTAR INDICADOR*/
	 function GetIndicador()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_Brecha->GetIndicador();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
//FIN LISTAR INDICADOR
//ACTUALIZAR O MODIFICAR DATOS DE UN INDICADOR
 	function UpdateIndicador()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdIndicadorModif =$this->input->post("txt_IdIndicadorModif");
		      $txt_NombreIndicadorU =$this->input->post("txt_NombreIndicadorU");
		      $txtArea_DefIndicadorU =$this->input->post("txtArea_DefIndicadorU");
		      $txt_UnidadMedidaU =$this->input->post("txt_UnidadMedidaU");
		      if($this->Model_Brecha->UpdateIndicador($txt_IdIndicadorModif,$txt_NombreIndicadorU,$txtArea_DefIndicadorU,$txt_UnidadMedidaU) == false)
		        echo "Se actualizo correctamente el indicador";
		      else
		        echo "No Se actualizo correctamente el indicador"; 
	    }
	    else
	    {
	      	show_404();
	    }
 	 }
//FIN ACTUALIZAR O MODIFICAR DATOS DEL INDICADOR
//----------------FIN MANTENIMIENTO DE LOS DATOS DE INDICADOR-------------------
	function _load_layout($template)
    {
      $this->load->view('layout/header');
      $this->load->view($template);
      $this->load->view('layout/footer');
    }

}
