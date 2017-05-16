<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programacion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_Programacion');
	}
    /*INSERTAR UN PROYECTO*/
   function AddProgramacion()
   {
      if ($this->input->is_ajax_request()) 
      {
        $cbxCartera=$this->input->post("cbxCartera");
        $cbxBrecha =$this->input->post("cbxBrecha");
        $txtProyectoInvers =$this->input->post("txtProyectoInvers");
        $txtMontoProg=$this->input->post("txtMontoProg");
        $dateAñoProg =$this->input->post("dateAñoProg");
        $txtPrioridadProg =$this->input->post("txtPrioridadProg");
        $txtMontoOpeMan =$this->input->post("txtMontoOpeMan");
        $txtTipo =$this->input->post("txtTipo");

       if($this->Model_Programacion->AddProgramacion($cbxCartera,$cbxBrecha,$txtProyectoInvers,$txtMontoProg,$dateAñoProg,$txtPrioridadProg,$txtMontoOpeMan,$txtTipo) == true)
          echo "Se añadio una Programacion";
        else
          echo "No se añadio  una Programacion";  
      }
      else
      {
        show_404();
      }
   }
 /*FIN INSERTAR UN PROYECTO*/

   
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
