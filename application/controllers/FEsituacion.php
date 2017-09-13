<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FEsituacion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_FEsituacion');

    }

    /*  */
    public function get_FEsituacion()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_FEsituacion->get_FEsituacion();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function add_FEsituacion()
    {
        if ($this->input->is_ajax_request()) {
            $txt_SituacionFE = $this->input->post("txt_SituacionFE");
            if ($this->Model_FEsituacion->add_FEsituacion($txt_SituacionFE) == false) {
                echo "Se Inserto Nueva Situación ";
            } else {
                echo "Se Inserto Nueva Situación ";
            }

        } else {
            show_404();
        }

    }
    public function update_FEsituacion()
    {
        if ($this->input->is_ajax_request()) {
            $id_situacion_fe    = $this->input->post("id_situacion_fe");
            $denom_situacion_fe = $this->input->post("denom_situacion_fe");
            if ($this->Model_FEsituacion->update_FEsituacion($id_situacion_fe, $denom_situacion_fe) == false) {
                echo "Se Modificó la  Situación ";
            } else {
                echo "Se Modificó la  Situación ";
            }

        } else {
            show_404();
        }
    }
    public function AddSituacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                = "C";
            $Cbx_Situacion       = $this->input->post("Cbx_Situacion");
            $txt_IdEtapa_Estudio = $this->input->post("txt_IdEtapa_Estudio");
            $txadescripcion      = $this->input->post("txadescripcion");
            if ($this->Model_FEsituacion->AddSituacion($flat, $Cbx_Situacion, $txt_IdEtapa_Estudio, $txadescripcion) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }
    public function ver_FEsistuacion()
    {
        $this->_load_layout('Front/Formulacion_Evaluacion/frmSituacion');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
/*REGISTAR SITUACION ACTUAL DEL ESTUDIO DE INVERSION*/
