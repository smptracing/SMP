<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oficina extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Oficina');
    }

    public function index()
    {
        $this->_load_layout('Front/Administracion/frmGerencia.php');
    }

    function GetOficina()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Oficina->GetOficina();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function AddOficina()
    {
        if ($this->input->is_ajax_request()) {
            //$txt_id_oficina = $this->input->post("txt_id_oficina");
            $txt_id_subgerencia = $this->input->post("listaSubGerencia");
            $txt_denom_oficina = $this->input->post("txt_denom_oficina");
            if ($this->Model_Oficina->AddOficina( $txt_id_subgerencia, $txt_denom_oficina) == true)
                echo "Se añadio una Oficina";
            else
                echo "Se añadio  una Oficina";
        } else {
            show_404();
        }
    }

    //modifcar funcion

    function UpdateOficina()
    {
        if ($this->input->is_ajax_request()) {
            $txt_id_oficina = $this->input->post("txt_id_oficina_m");
            $txt_id_subgerencia = $this->input->post("listaSubGerenciaM");
            $txt_denominacion_oficina = $this->input->post("txt_denom_oficina_m");
            if ($this->Model_Oficina->UpdateOficina($txt_id_oficina, $txt_id_subgerencia, $txt_denominacion_oficina) == true)
                echo "Se actualizao  oficina";
            else
                echo "Se actualizo oficina";
        } else {
            show_404();
        }
    }
    function EliminarOficina(){
        if ($this->input->is_ajax_request()) {
            $flag=0;
            $msg="";
            $id_oficina = $this->input->post("id_oficina");

        if($this->Model_Oficina->EliminarOficina($id_oficina)==true){
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
