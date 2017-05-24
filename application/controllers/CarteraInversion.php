<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarteraInversion extends CI_Controller {

public function __construct(){
      parent::__construct();
     $this->load->model('Model_CarteraInversion');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmCarteraInversion');
	}
//----------------MANTENIMIENTO DE LOS DATOS DE BRECHAS---------------------	
	//INSERTAR UNA CARTERA DE INVERSION
	/* function AddCartera()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	    $dateAñoAperturaCart=$this->input->post("dateAñoAperturaCart");
	      $dateFechaIniCart =$this->input->post("dateFechaIniCart");
	      $dateFechaFinCart =$this->input->post("dateFechaFinCart");
	      $cbxEstadoCart =$this->input->post("cbxEstadoCart");
	      $txt_NumResolucionCart =$this->input->post("txt_NumResolucionCart");
	      $txt_UrlResolucionCart =$this->input->post("txt_UrlResolucionCart");
	      if($this->Model_Brecha->AddBrecha($dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$cbxEstadoCart,$txt_NumResolucionCart,$txt_UrlResolucionCart) == true)
	        echo "No se añadio una  cartera";
	      else
	        echo "Se añadio  una cartera";  
	    }
	    else
	    {
	      show_404();
	    }
 	 }*/
//FIN INSERTAR UNA CARTERA DE INVERSION
 	 //OBTENER LA CARTERA ACTUAL SEGUN EL AÑO
    function GetCarteraInvFechAct()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_CarteraInversion->GetCarteraInvFechAct();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	 //FIN OBTENER LA CARTERA ACTUAL SEGUN EL AÑO
 	function _load_layout($template)
    {
      $this->load->view('layout/Pmi/header');
      $this->load->view($template);
      $this->load->view('layout/Pmi/footer');
    }

}
