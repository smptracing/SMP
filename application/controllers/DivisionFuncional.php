<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DivisionFuncional extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_DivisionFuncional');
      $this->load->helper('FormatNumber_helper');
	}
  

  public function index()
    {
        $listaPipDivisionFuncional=$this->Model_DivisionFuncional->DivisionFuncionalPipListar();
        $listaMontoTotalGrupoDivFunc=$this->Model_DivisionFuncional->DivFuncionalPipMontoTotalListar();
        $this->load->view('layout/Reportes/header');
        $this->load->view('front/Reporte/DivisionFuncional/index',['listaPipDivisionFuncional'=>$listaPipDivisionFuncional,'listaMontoTotalGrupoDivFunc'=>$listaMontoTotalGrupoDivFunc]);
        $this->load->view('layout/Reportes/footer');
    }


	function GetDivisionFuncional()
	{
		if ($this->input->is_ajax_request()) 
		{
			$datos=$this->Model_DivisionFuncional->GetDivisionFuncional();

			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}

    function GetDivisioFuncuonaId(){

         if ($this->input->is_ajax_request()) 
        {
        $id_funcion=$this->input->post('id_funcion');
        $datos=$this->Model_DivisionFuncional->getDivisioFuncuonaId($id_funcion);
        echo json_encode($datos);
        }
        else
        {
          show_404();
        }

    }
    function AddDivisionFucion()
    {
       if ($this->input->is_ajax_request()) 
              {
                $txt_CodigoDfuncional =$this->input->post("txt_CodigoDfuncional");
                $txt_Nombre_DFuncional =$this->input->post("txt_Nombre_DFuncional");
                $listaFuncionC=$this->input->post("listaFuncionC");

                if($this->Model_DivisionFuncional->AddDivisionFucion($txt_CodigoDfuncional,$txt_Nombre_DFuncional,$listaFuncionC)== true)
                  echo "Se inserto una division funcional";
                else
                  echo "Se inserto una division funcional";  
             }
             else
              {
                  show_404();
              }

    }
    function UpdateDivisionFucion()
    {
       if ($this->input->is_ajax_request()) 
              {
                $id_DfuncionalM =$this->input->post("id_DfuncionalM");
                $IdlistaFuncionCM =$this->input->post("listaFuncionCM");
                $txt_CodigoDfuncionalM =$this->input->post("txt_CodigoDfuncionalM");
                $txt_Nombre_DFuncionalM=$this->input->post("txt_Nombre_DFuncionalM");

                if($this->Model_DivisionFuncional->UpdateDivisionFucion($id_DfuncionalM,$IdlistaFuncionCM,$txt_CodigoDfuncionalM,$txt_Nombre_DFuncionalM)== true)
                  echo "Se actualizo  una division funcional";
                else
                  echo "No se actualizo  una division funcional";  
             }
             else
              {
                  show_404();
              }

    }
   
	function _load_layout($template)
    {
      $this->load->view('layout/ADMINISTRACION/header');
      $this->load->view($template);
      $this->load->view('layout/ADMINISTRACION/footer');
    }

}
