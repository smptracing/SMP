<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gerencia extends CI_Controller
{/* Mantenimiento de sector entidad Y servicio publico asociado*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Gerencia');
    }

    public function index()
	{
		$this->_load_layout('Front/Administracion/frmGerencia.html');
	}

    function GetGerencia()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Gerencia->GetGerencia();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    function AddGerencia()
    {
        if ($this->input->is_ajax_request()) {
            $txt_denominacion_gerencia = $this->input->post("txt_denominacion_gerencia");
            if ($this->Model_Gerencia->AddGerencia($txt_denominacion_gerencia) == true)
                echo "Se añadio una Gerencia";
            else
                echo "Se añadio  una Gerencia";
        } else {
            show_404();
        }
    }

    //modifcar funcion

    function UpdateGerencia()
    {
        if ($this->input->is_ajax_request()) {
            $txt_id_gerencia = $this->input->post("txt_id_gerencia");
            $txt_denominacion_gerencia = $this->input->post("txt_denominacion_gerencia");

            if ($this->Model_Gerencia->UpdateGerencia($txt_id_gerencia, $txt_denominacion_gerencia) == true)
                echo "Se actualizao  Gerencia";
            else
                echo "Se actualizo Gerencia";
        } else {
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
