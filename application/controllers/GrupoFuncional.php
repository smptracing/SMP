<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoFuncional extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_GrupoFuncional');
	}
    function GetGrupoFuncional()
    {
        if ($this->input->is_ajax_request()) 
        {
        $datos=$this->Model_GrupoFuncional->GetGrupoFuncional();
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }
    }
     function AddGrupoFuncional()
    {
       if ($this->input->is_ajax_request()) 
              {
                $txt_codigoGfuncion =$this->input->post("txt_codigoGfuncion");
                $txt_nombreGfuncion =$this->input->post("txt_nombreGfuncion");
                $SelecDivisionFF=$this->input->post("SelecDivisionFF");
                $SelecSector=$this->input->post("SelecSector");

                if($this->Model_GrupoFuncional->AddGrupoFuncional($txt_codigoGfuncion,$txt_nombreGfuncion,$SelecDivisionFF,$SelecSector)== true)
                  echo "Se inserto un grupo funcional funcional";
                else
                  echo "No inserto un grupo funcional";  
             }
             else
              {
                  show_404();
              }
    }
    function UpdateGrupoFuncional()
    {
      if ($this->input->is_ajax_request()) 
              {
                $txt_idGfuncionF =$this->input->post("txt_idGfuncionF");
                $IdSelecDivisionFFF =$this->input->post("SelecDivisionFFF");
                $IdSelecSectorF=$this->input->post("SelecSectorF");
                $txt_codigoGfuncionF=$this->input->post("txt_codigoGfuncionF");
                $txt_nombreGfuncionF=$this->input->post("txt_nombreGfuncionF");

                if($this->Model_GrupoFuncional->UpdateGrupoFuncional($txt_idGfuncionF,$IdSelecDivisionFFF,$IdSelecSectorF,$txt_codigoGfuncionF,$txt_nombreGfuncionF)== true)
                  echo "Se  modifico el grupo funcional funcional";
                else
                  echo "No no se modifico el grupo funcional";  
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
