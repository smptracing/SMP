<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EtapasFE extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_EtapasFE');
	}
	
    //CONTROLADOR DE LISTAR ETAPAS DE FORMULACION Y EVALUACION EN UNA TABLA
    public function GetEtapasFE(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_EtapasFE->GetEtapasFE();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     //FIN CONTROLADOR DE LISTAR ETAPAS DE FORMULACION Y EVALUACION EN UNA TABLA
       //CONTROLADOR PARA AGREGAR ETAPAS DE FORMULACION Y EVALUACION EN UNA TABLA
    public function  AddEtapasFE()
    {
        if ($this->input->is_ajax_request()) 
            {
             $txt_EtapasFE =$this->input->post("txt_EtapasFE");
             if($this->Model_EtapasFE->AddEtapasFE($txt_EtapasFE)== false)
                   echo "SE INSERTO UNA NUEVA ETAPA EN FORMULACION Y EVALUACION";
                  else
                  echo "SE INSERTO UNA NUEVA ETAPA N EN FORMULACION Y EVALUACION";  
            } 
        else
            {
              show_404();
            }  
    }
    //FIN CONTROLADOR PARA AGREGAR ETAPAS DE FORMULACION Y EVALUACION EN UNA TABLA
   public function index()
  {
    $this->_load_layout('Front/Formulacion_Evaluacion/frmEtapasFE');
  }
	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
