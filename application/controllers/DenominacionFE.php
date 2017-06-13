<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DenominacionFE extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_DenominacionFE');
	}
	public function index()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmDenominacionFE');
	}
    //CONTROLADOR DE LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN UNA TABLA
    public function GetDenominacionFE(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_DenominacionFE->GetDenominacionFE();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     //FIN CONTROLADOR DE LISTAR DENOMINACION DE FORMULACION Y EVALUACION EN UNA TABLA
    //CONTROLADOR PARA AGREGAR UNA NUEVA DENOMINCACION EN FROUMLACION Y EVALUACION
    public function  AddDenominacionFE()
    {
        if ($this->input->is_ajax_request()) 
            {
             $txt_DenominacionFE =$this->input->post("txt_DenominacionFE");
             if($this->Model_DenominacionFE->AddDenominacionFE($txt_DenominacionFE)== false)
                   echo "SE INSERTO UNA NUEVA DENOMINACION EN FORMULACION Y EVALUACION";
                  else
                  echo "SE INSERTO UNA NUEVA DENOMINACION EN FORMULACION Y EVALUACION";  
            } 
        else
            {
              show_404();
            }  
    }
    //FIN CONTROLADOR PARA AGREGAR UNA NUEVA DENOMINCACION EN FROUMLACION Y EVALUACION
	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
