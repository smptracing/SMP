<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrupoFuncional extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_GrupoFuncional');
      $this->load->helper('FormatNumber_helper');
	}
    public function index()
    {
        $listaNumPipGrupo=$this->Model_GrupoFuncional->GrupoPipListar();
        $listaMontoTotalGrupoFuncional=$this->Model_GrupoFuncional->GrupoFuncionalPipMontoTotalListar();
        $this->load->view('layout/Reportes/header');
        $this->load->view('front/Reporte/GrupoFuncional/index',['listaNumPipGrupo'=>$listaNumPipGrupo,'listaMontoTotalGrupoFuncional'=>$listaMontoTotalGrupoFuncional]);
        $this->load->view('layout/Reportes/footer');
    }

	function GetGrupoFuncional()
	{
		if($this->input->is_ajax_request()) 
		{
			$datos=$this->Model_GrupoFuncional->GetGrupoFuncional();
			
			echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}

    function GetGrupoFuncionalId(){
      if ($this->input->is_ajax_request()) 
        {
        $id_div_funcional=$this->input->post('id_div_funcional');
        $datos=$this->Model_GrupoFuncional->GetGrupoFuncionalId($id_div_funcional);
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
                  echo "Se inserto un grupo funcional";  
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
                  echo "Se modifico el grupo funcional";  
             }
             else
              {
                  show_404();
              }
    }
  function EliminarGFuncional(){
            if ($this->input->is_ajax_request()) {
            $flag=0;
            $msg="";
            $id_grup_funcional = $this->input->post("id_grup_funcional");

        if($this->Model_GrupoFuncional->EliminarGFuncional($id_grup_funcional)==true){
                $flag=0;
                $msg="registro Eliminado Satisfactoriamente";
            }
            else{
                $flag=1;
                $msg="No se pudo eliminar";
            }
                    $datos['flag']=$flag;
                    $datos['msg']=$msg;
                    echo json_encode($datos);
        }  else {
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
