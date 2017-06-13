<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FEnivelEstudio extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FEnivelEstudio');
	}
    
    public function get_FEnivelEstudio(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_FEnivelEstudio->get_FEnivelEstudio();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     public function  add_NivelEstudio(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $denom_nivel_estudio =$this->input->post("denom_nivel_estudio");
	     if($this->Model_FEnivelEstudio->add_NivelEstudio($denom_nivel_estudio)== false)
		       echo "Se Inserto Nuevo Nivel de Estudio ";
		      else
		      echo "Se Inserto Nuevo Nivel de Estudio ";  
		 } 
	     else
	     {
	      show_404();
	      }
	  
    }
    /*public function updateFEestado(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $id_estado =$this->input->post("id_estado");
	      $denom_estado_fe =$this->input->post("denom_estado_fe");
	     if($this->Model_FEestado->updateFEestado($id_estado,$denom_estado_fe)== false)
		       echo "Se Modificó el estado ";
		      else
		      echo "Se Modificó el estado ";  
		 } 
	     else
	     {
	      show_404();
	      }
    }*/

	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
