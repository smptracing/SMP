<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FEsituacion extends CI_Controller {

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FEsituacion');

	}
    
    /*  */
    public function get_FEsituacion(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_FEsituacion->get_FEsituacion();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
    public function  add_FEsituacion(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $txt_SituacionFE =$this->input->post("txt_SituacionFE");
	     if($this->Model_FEsituacion->add_FEsituacion($txt_SituacionFE)== false)
		       echo "Se Inserto Nueva Situación ";
		      else
		      echo "Se Inserto Nueva Situación ";  
		 } 
	     else
	     {
	      show_404();
	      }
	  
    }
    public function update_FEsituacion(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $id_estado =$this->input->post("id_estado");
	      $denom_estado_fe =$this->input->post("denom_estado_fe");
	     if($this->Model_FEsituacion->update_FEsituacion($id_estado,$denom_estado_fe)== false)
		       echo "Se Modificó la  Situación ";
		      else
		      echo "Se Modificó la  Situación ";  
		 } 
	     else
	     {
	      show_404();
	      }
    }
	public function ver_FEsistuacion()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmSituacion');
	}
	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
