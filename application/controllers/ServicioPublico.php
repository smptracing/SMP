<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServicioPublico extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ServicioPublico');
	} 
    function GetServicioAsociado()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_ServicioPublico->GetServicioAsociado();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
function AddServicioAsociado()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $textarea_servicio_publicoA =$this->input->post("textarea_servicio_publicoA");
	   /* if($this->Model_ServicioPublico->AddServicioAsociado($textarea_servicio_publicoA)==true)
		      echo "Se agrego un nuevo Servicio  Publico Asociado";
		      else
		     echo "Se agrego un nuevo Servicio  Publico Asociado";
		 } */
		$Data= $this->Model_ServicioPublico->AddServicioAsociado($textarea_servicio_publicoA);
		echo json_encode($Data);
		}
	     else
	     {
	      show_404();
	      }
 	 }
 
 	 function UpdateServicioAsociado()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $id_servicio_publicoA =$this->input->post("id_servicio_publicoA");
	      $textarea_servicio_publicoA=$this->input->post("textarea_servicio_publicoAA");
	     if($this->Model_ServicioPublico->UpdateServicioAsociado($id_servicio_publicoA,$textarea_servicio_publicoA) ==true)
		       echo "Se actualizo el Servicio Publico Asociado";
		      else
		      echo "se actualizo el Servicio Publico Asociado"; 
		 } 
	     else
	     {
	      show_404();
	      }
	  

 	 }
 	function EliminarServicioPublico()
    {
       	if($this->input->is_ajax_request()) 
	    {
	    	$id_servicio=$this->input->post("id_servicio");
	     	if($this->Model_ServicioPublico->DeleteServicio($id_servicio)== false)
	     		echo "Se elimino el servicio";
		    else
		    	echo "No se elimino el servicio"; 
		} 
	    else
	    {
	    	show_404();
	    }
    }
    /*Fin Servicios publico asociado*/
	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }
}
