<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectoInversion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ProyectoInversion');
   //   $this->load->model('Ubicacion_Model');
	}
   /*INSERTAR UN PROYECTO EN LA TABLA PROYECTO Y SIMULTANEO EN LA TABLA PROYECTO UBIGEO*/
   function AddProyecto()
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
        $distrito =$this->input->post("distritosM");
        $txtDireccionUbigeo =$this->input->post("txtDireccionUbigeo");
        $txtLatitud=$this->input->post("txtLatitud");
        $txtLongitud=$this->input->post("txtLongitud");
        $cbxEstadoCicloInv=$this->input->post("cbxEstadoCicloInv");
        $dateFechaEstCicInv=$this->input->post("dateFechaEstCicInv");
        $cbxFuenteFinanc=$this->input->post("cbxFuenteFinanc");
        $dateFechaFuenteFinanc=$this->input->post("dateFechaFuenteFinanc");
        $cbxModalidadEjec=$this->input->post("cbxModalidadEjec");
        $dateFechaModalidadEjec=$this->input->post("dateFechaModalidadEjec");
     if($this->Model_ProyectoInversion->AddProyecto($cbxUnidadEjecutora,$cbxNatI,$cbxTipologiaInv,$cbxTipoInv,$cbxGrupoFunc,$cbxNivelGob,$cbxMetaPresupuestal,$cbxProgramaPres,$txtCodigoUnico,$txtNombrePip,$txtCostoPip,$txtDevengado,$dateFechaInPip,$dateFechaViabilidad,$distrito,$txtDireccionUbigeo,$txtLatitud,$txtLongitud,$cbxEstadoCicloInv,$dateFechaEstCicInv,$cbxFuenteFinanc,$dateFechaFuenteFinanc,$cbxModalidadEjec,$dateFechaModalidadEjec) == true)
          echo "Se añadio un proyecto";
        else
          echo "Se añadio  un proyecto";  
         // echo json_encode($ubigeo);
          //echo "",$distrito;
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
//ULTIMO RPOYECTO DE INVERSION
        function GetProyectoInversionUltimo()
    {
      if ($this->input->is_ajax_request()) 
      {
      $datos=$this->Model_ProyectoInversion->GetProyectoInversionUltimo();
      echo json_encode($datos);
      }
      else
      {
        show_404();
      }
    }

    //FIN ULTIO POYECTO DE INVERSION
     function BuscarProyectoInversion()
    {
      if ($this->input->is_ajax_request()) 
      {
       $Id_ProyectoInver = $this->input->post("Id_ProyectoInver");
       $datos=$this->Model_ProyectoInversion->BuscarProyectoInversion($Id_ProyectoInver);
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
