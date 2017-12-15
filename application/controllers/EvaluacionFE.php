<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EvaluacionFE extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_EvaluacionFE');
    }
    public function GetEvaluacionFE()
    {
        if ($this->input->is_ajax_request()) {
            $id_est_inve = $this->session->userdata('id_est_inve');
            if (empty($id_est_inve)) {
                $id_est_inve = '0';
            }
            if ($id_est_inve == 'all') {
                $id_est_inve = '0';
            }
            $datos = $this->Model_EvaluacionFE->GetEvaluacionFE($id_est_inve);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP EN EVALUACION
    public function GetDetallesituacionActual()
    {
        if ($this->input->is_ajax_request()) {
            $codigo_unico_est_inv = $this->input->post("codigo_unico_est_inv");
            $datos                = $this->Model_EvaluacionFE->GetDetallesituacionActual($codigo_unico_est_inv);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    // FIN LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP EN EVALUACION
    //LISTAR A EVALUADORES
    function GetEvaluadores()
    {
        if ($this->input->is_ajax_request())
        {
        $desc_cargo = "Evaluador";
        $datos=$this->Model_EvaluacionFE->GetEvaluadores($desc_cargo);
        echo json_encode($datos);
        }
        else
        {
            show_404();
        }
    }
    //FIN LISTAR EVALUADORES
    //LISTAR DETALLE DE LA SITUACIN ACTUAL DE LA PIP
    public function FeEvaluacion()
    {
        $id_est_inve = isset($_GET['id_est_inv']) ? $_GET['id_est_inv'] : null;
        $data = array('id_est_inve' => $id_est_inve);
        $this->session->set_userdata($data);
        $this->_load_layout('Front/Formulacion_Evaluacion/frmEvaluacionFE');
    }

    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormEvaluacion');
    }
}
