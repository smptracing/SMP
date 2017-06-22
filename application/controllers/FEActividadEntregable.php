<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FEActividadEntregable extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FEActividadEntregable');

	}
    
   public function get_Actividades(){
    	if ($this->input->is_ajax_request()) 
        {
        $id_en=$this->input->post('id_en');
        $datos=$this->Model_FEActividadEntregable->get_Actividades($id_en);
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     public function  Add_Actividades(){
    	if ($this->input->is_ajax_request()) 
	    {
			$opcion                 ="c";
			$id_act                 ="0";
			$txt_id_entregable      =$this->input->post("txt_id_entregable");
			$txt_nombre_act         =$this->input->post("txt_nombre_act");
			$txt_fechaActividadI    =$this->input->post("txt_fechaActividadI");
			$txt_fechaActividadf    =$this->input->post("txt_fechaActividadf");
			$txt_valoracionEAc      =$this->input->post("txt_valoracionEAc");
			$txt_AvanceEAc          =0;
			$txt_observacio_EntreAc =$this->input->post("txt_observacio_EntreAc");
			$txt_ActividadColor =$this->input->post("txt_ActividadColor");
			
	     if($this->Model_FEActividadEntregable->Add_Actividades($opcion,$id_act,$txt_id_entregable,$txt_nombre_act,$txt_fechaActividadI,$txt_fechaActividadf,$txt_valoracionEAc,$txt_AvanceEAc,$txt_observacio_EntreAc,$txt_ActividadColor)== false)
		       echo "Se Inserto Una Nueva Actividad ";
		      else
		      echo "No Se Inserto Una Nueva Actividad "; 
		 } 
	     else
	     {
	      show_404();
	      }
	  
    }

     public function  Update_Actividades(){
    	if ($this->input->is_ajax_request()) 
	    {
			$opcion                 ="u";
			$tx_IdActividad         =$this->input->post("tx_IdActividad");
			$txt_idEntregable      =$this->input->post("txt_idEntregable");
			$txt_NombreActividadAc  =$this->input->post("txt_NombreActividadAc");
			$txt_fechaActividadIAc  =$this->input->post("txt_fechaActividadIAc");
			$txt_fechaActividadfAc   =$this->input->post("txt_fechaActividadfAc");
			$txt_valorizacionEAct    =$this->input->post("txt_valorizacionEAct");;
			$txt_avanceEAct    		 =$this->input->post("txt_avanceEAct");
			$txt_observacio_EntreAct =$this->input->post("txt_observacio_EntreAct");
			$txt_ActividadColorAc =$this->input->post("txt_ActividadColorAc");
			
	     if($this->Model_FEActividadEntregable->Update_Actividades($opcion,$tx_IdActividad,$txt_idEntregable,$txt_NombreActividadAc,$txt_fechaActividadIAc,$txt_fechaActividadfAc,$txt_valorizacionEAct,$txt_avanceEAct,$txt_observacio_EntreAct,$txt_ActividadColorAc)== false)
		       echo "Se actualizo una Actividad ";
		      else
		      echo " Se actualizo una Actividad "; 
		 } 
	     else
	     {
	      show_404();
	      }
	  
    }
    public function CalcularAvanceActividad(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $tx_IdActividad=$this->input->post("tx_IdActividad");
	      $txt_idEntregable =$this->input->post("txt_idEntregable");
	      $data=$this->Model_FEActividadEntregable->CalcularAvanceActividad($tx_IdActividad,$txt_idEntregable);
		  echo json_encode($data);
 
		 } 
	     else
	     {
	      show_404();
	      }
    }

	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}