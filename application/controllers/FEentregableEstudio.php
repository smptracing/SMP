<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FEentregableEstudio extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_FEentregableEstudio');

	}
  public function ver_FEentregable()
  {
    $this->_load_layout('Front/Formulacion_Evaluacion/frmEntregable');
  }
  
   public function get_Entregables(){
    	if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_FEentregableEstudio->get_Entregables();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     public function  Add_Entregable(){
    	if ($this->input->is_ajax_request()) 
	    {
			$opcion="c";
			$id_entregable="0";
			$txt_denominacion_entre  ="1";
			$id_etapa_estudio  ="3";
			$txt_nombre_entre  =$this->input->post("txt_nombre_entre");
			$txt_valoracion_entre    =$this->input->post("txt_valoracion_entre");
			$txt_avance_entre        =0;
			$txt_observacio_entre    =$this->input->post("txt_observacio_entre");
			$txt_levantamintoO_entre =$this->input->post("txt_levantamintoO_entre");
			
	     if($this->Model_FEentregableEstudio->Add_Entregable($opcion,$id_entregable,$txt_denominacion_entre,$id_etapa_estudio,$txt_nombre_entre,$txt_valoracion_entre,$txt_avance_entre,$txt_observacio_entre,$txt_levantamintoO_entre)== false)
		       echo "Se Inserto Una Nueva Etapa ";
		      else
		      echo "No Se Inserto Una Nueva Etapa "; 
		 } 
	     else
	     {
	      show_404();
	      }
	  
    }
    public function UpdateEntregableAvance(){
    	if ($this->input->is_ajax_request()) 
	    {
	      $sumaTotalAvance=$this->input->post("sumaTotalAvance");
	      $id_entregable =$this->input->post("id_entregable");
	     if($this->Model_FEentregableEstudio->UpdateEntregableAvance($sumaTotalAvance,$id_entregable)== false)
		       echo "Se Actualizo el avance del entregable";
		        else
		       echo "Se Actualizo el avance del entregable";  
		 } 
	     else
	     {
	      show_404();
	      }
    }

     public function get_entregableId(){
    	if ($this->input->is_ajax_request()) 
        {
        $id_entregable  =$this->input->post("id_entregable");
        $datos=$this->Model_FEentregableEstudio->get_entregableId($id_entregable);
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }

      public function calcular_AvaceFisico(){
    	if ($this->input->is_ajax_request()) 
        {
        $id_etapa_estudio=$this->input->post("id_etapa_estudio");
        if($this->Model_FEentregableEstudio->calcular_AvaceFisico($id_etapa_estudio)==true)
               echo "SE ACTUALIZO EL AVANCE FÍSICO";
		        else
		       echo "SE ACTUALIZO EL AVANCE FÍSICO";
        }
        else
        {
          show_404();
        }
    }

    //asignacion de personal
     public function  AsignacionPersonalEntregable(){
      if ($this->input->is_ajax_request()) 
      {
      $Opcion ='C';
      $txt_idPersona              =$this->input->post("txt_idPersona");
      $txt_identregable           =$this->input->post("txt_identregable");
      $txt_AsigPersonalEntregable =$this->input->post("txt_AsigPersonalEntregable");
       if($this->Model_FEentregableEstudio->AsignacionPersonalEntregable($Opcion,$txt_identregable,$txt_idPersona,$txt_AsigPersonalEntregable)== false)
           echo "SE ASIGNO  UN NUEVO RESPONSABLE ";
          else
          echo "NO SE ASIGNO  UN NUEVO RESPONSABLE"; 
     } 
       else
       {
        show_404();
        }
    
    }
    //fin asignacion de personal

	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}