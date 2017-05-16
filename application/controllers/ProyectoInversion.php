<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectoInversion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ProyectoInversion');
	}
   /*INSERTAR UN PROYECTO*/
   function AddProgramacion()
   {
      if ($this->input->is_ajax_request()) 
      {
        $cbxUnidadEjecutora=$this->input->post("cbxUnidadEjecutora");
        $cbxNatI =$this->input->post("cbxNatI");
        $cbxTipologiaInv =$this->input->post("cbxTipologiaInv");
        $cbxTipoInv=$this->input->post("cbxTipoInv");
        $cbxGrupoFunc =$this->input->post("cbxGrupoFunc");
        $cbxNivelGob =$this->input->post("cbxNivelGob");
        $cbxMetaPresupuestal =$this->input->post("cbxMetaPresupuestal");
        $cbxProgramaPres =$this->input->post("cbxProgramaPres");
        $txtCodigoUnico =$this->input->post("txtCodigoUnico");
        $txtNombrePip =$this->input->post("txtNombrePip");
        $txtCostoPip =$this->input->post("txtCostoPip");
        $txtDevengado =$this->input->post("txtDevengado");
        $dateFechaInPip =$this->input->post("dateFechaInPip");
        $dateFechaViabilidad =$this->input->post("dateFechaViabilidad");
       if($this->Model_ProyectoInversion->AddProyecto($cbxUnidadEjecutora,$cbxNatI,$cbxTipologiaInv,$cbxTipoInv,$cbxGrupoFunc,$cbxNivelGob,$cbxMetaPresupuestal,$cbxProgramaPres,$txtCodigoUnico,$txtNombrePip,$txtCostoPip,$txtDevengado,$dateFechaInPip,$dateFechaViabilidad) == true)
          echo "Se añadio un proyecto";
        else
          echo "No se añadio  un proyecto";  
      }
      else
      {
        show_404();
      }
   }
 /*FIN INSERTAR UN PROYECTO*/

   
     function GetProyectoInversion()
  	{
  		if ($this->input->is_ajax_request()) 
  		{
  		$datos=$this->Model_ProyectoInversion->ProyectoInversion();
  		echo json_encode($datos);
  		}
  		else
  		{
  			show_404();
  		}
  	}
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
