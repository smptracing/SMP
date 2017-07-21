<?php
defined('BASEPATH') or exit('No direct script access allowed');

class programar_pip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('programar_pip_modal');
    }
    //PIP
    //listar proyectos de inversion en FORMULACION Y EVALUACIÓN
    public function GetProyectosFormulacionEvaluacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listarpip_formulacion_evaluacion";
            $datos = $this->programar_pip_modal->GetProyectosFormulacionEvaluacion($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetProyectosEjecucion()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listarpip_viable_ejecucion";
            $datos = $this->programar_pip_modal->GetProyectosEjecucion($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetProyectosFuncionamiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listarpip_funcionamiento";
            $datos = $this->programar_pip_modal->GetProyectosFuncionamiento($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetAnioCartera()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->programar_pip_modal->GetAnioCartera();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //Agregar Programacion
    public function AddProgramacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "insertar_programacion";
            $id_programacion = "0";
            $Cbx_AnioCartera = $this->input->post("Cbx_AnioCartera");
            $id_ubigeo       = "null";
            $txt_id_pip      = $this->input->post("txt_id_pip");
            $direccion       = "null";
            $txt_latitud     = $this->input->post("txt_latitud");
            $txt_longitud    = $this->input->post("txt_longitud");
            $distritosM      = $this->input->post("cbx_distrito");

            if ($this->programar_pip_modal->AddProgramacion($flat, $id_ubigeo_pi, $id_ubigeo, $txt_id_pip, $direccion, $txt_latitud, $txt_longitud, $distritosM) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmprogramarpip');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsProgramarPip.php');
    }

}
