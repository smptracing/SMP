<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PipProgramados extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PipProgramados_Model');
    }
    //PIP
    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipProgramadosFormulacionEvaluacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listarpip_formulacion_evaluacion_programado";
            $anio = $this->input->post("anio");
            $data = $this->PipProgramados_Model->GetPipProgramadosFormulacionEvaluacion($flat, $anio);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipProgramadosEjecucion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listarpip_ejecucion_programado";
            $anio = $this->input->post("anio");
            $data = $this->PipProgramados_Model->GetPipProgramadosEjecucion($flat, $anio);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipOperacionMantenimiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listarpip_operacionmantenimiento_programado";
            $anio = $this->input->post("anio");
            $data = $this->PipProgramados_Model->GetPipOperacionMantenimiento($flat, $anio);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmpipprogramados');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsPipProgramados.php');
    }

}
