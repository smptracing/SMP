<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sector extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Sector');
	}
    
    /* Pagina principal de la vista entidad Y servicio publico asociado */
	public function index()
	{
		$this->_load_layout('Front/Administracion/frmSectorEntidad');
	}
    /* Sector*/
	 function GetSector()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_Sector->GetSector();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	 function AddSector()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $txt_NombreSector =$this->input->post("txt_NombreSector");
	      if($this->Model_Sector->AddSector($txt_NombreSector) == false)
	        echo "Se añadio un  sector";
	      else
	        echo "No se añadio  un sector";  
		 }
		 else
		  {
		      show_404();
		   }

 	 }
 	 function UpdateSector()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
		      $txt_IdModificar =$this->input->post("txt_IdModificar");
		      $txt_NombreSectorM =$this->input->post("txt_NombreSectorM");
		      if($this->Model_Sector->UpdateSector($txt_IdModificar,$txt_NombreSectorM) == false)
		        echo "Se actualizo correctamente el sector";
		      else
		        echo "No Se actualizo correctamente el sector"; 
	    }
	    else
	    {
	      	show_404();
	    }

 	 }
    /*fin sector*/
    
    function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}
