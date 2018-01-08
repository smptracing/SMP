<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubGerencia extends CI_Controller
{/* Mantenimiento de sector entidad Y servicio publico asociado*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_SubGerencia');
    }

    public function index()
	{
		$this->_load_layout('Front/Administracion/frmGerencia.php');
	}

    function GetSubGerencia()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_SubGerencia->GetSubGerencia();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function AddSubGerencia()
    {
        if ($this->input->is_ajax_request()) {
            //$txt_id_gerencia = $this->input->post("txt_id_gerencia");
            $txt_denominacion_subgerencia = $this->input->post("txt_denom_subgerencia");
            $opcion_gerencia = $this->input->post("listaGerenciaC");

            if ($this->Model_SubGerencia->AddSubGerencia($opcion_gerencia, $txt_denominacion_subgerencia) == true)
                echo "Se añadio una Sub Gerencia";
            else
                echo "Se añadio  una Sub Gerencia";
        } else {
            show_404();
        }
    }

    function UpdateSubGerencia()
    {
        if ($this->input->is_ajax_request()) {
            $txt_id_subgerencia = $this->input->post("txt_id_subgerencia_m");
            $txt_id_gerencia = $this->input->post("listaGerenciaCM");
            $txt_denominacion_gerencia = $this->input->post("txt_denom_subgerencia_m");

            if ($this->Model_SubGerencia->UpdateSubGerencia($txt_id_subgerencia, $txt_id_gerencia, $txt_denominacion_gerencia) == true)
                echo "Se actualizao  Sub Gerencia";
            else
                echo "Se actualizo Sub Gerencia";
        } else {
            show_404();
        }

    }
    function EliminarSubGerencia(){
        if ($this->input->is_ajax_request()) {
            $flag=0;
            $msg="";
            $id_subgerencia = $this->input->post("id_subgerencia");

        if($this->Model_SubGerencia->EliminarSubGerencia($id_subgerencia)==true){
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
