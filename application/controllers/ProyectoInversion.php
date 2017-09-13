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
        $cbxUnidadEjecutora=$this->input->post("id_ue");
        $cbxNatI =$this->input->post("id_naturaleza_inv");
        $cbxTipologiaInv =$this->input->post("id_tipologia_inv");
        $cbxTipoInv=$this->input->post("id_tipo_inversion");
        $cbxGrupoFunc =$this->input->post("id_grupo_funcional_inv");
        $cbxNivelGob =$this->input->post("id_nivel_gob");
        $cbxMetaPresupuestal =$this->input->post("id_meta_pres");
        $cbxProgramaPres =$this->input->post("id_programa_pres");
        $txtCodigoUnico =$this->input->post("codigo_unico_pi");
        $txtNombrePip =$this->input->post("nombre_pi");
        $txtCostoPip =$this->input->post("costo_pi");
        $txtDevengado =$this->input->post("devengado_ac_pi");
        $dateFechaInPip ="2017-03-01";
        $dateFechaViabilidad ="2017-03-01";
        $distrito =$this->input->post("distrito");
        $txtDireccionUbigeo ="Direccion";
        $txtLatitud="1.1";
        $txtLongitud="1.2";
        $cbxEstadoCicloInv=$this->input->post("id_estado_ciclo");
        $dateFechaEstCicInv="2017-03-01";
        $cbxRubro=$this->input->post("id_rubro");
        $dateFechaRubro="2017-03-01";
        $cbxModalidadEjec=$this->input->post("id_modalidad_ejec");
        $dateFechaModalidadEjec="2017-03-01";
       if($this->Model_ProyectoInversion->AddProyecto($cbxUnidadEjecutora,$cbxNatI,$cbxTipologiaInv,$cbxTipoInv,$cbxGrupoFunc,$cbxNivelGob,$cbxMetaPresupuestal,$cbxProgramaPres,$txtCodigoUnico,$txtNombrePip,$txtCostoPip,$txtDevengado,$dateFechaInPip,$dateFechaViabilidad,$distrito,$txtDireccionUbigeo,$txtLatitud,$txtLongitud,$cbxEstadoCicloInv,$dateFechaEstCicInv,$cbxRubro,$dateFechaRubro,$cbxModalidadEjec,$dateFechaModalidadEjec) == true)
          echo "Se añadio un proyecto";
        else
          echo "Se añadio  un proyecto";  
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


    public function ReporteBuscadorPorPip()
    {
	    $this->load->view('layout/Reportes/header');
	    $this->load->view('front/Reporte/ProyectoInversion/index');
	    $this->load->view('layout/Reportes/footer');
    }
    function _load_layout($template)
    {
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }

}
