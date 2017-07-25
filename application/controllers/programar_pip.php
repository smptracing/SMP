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
            $flat                    = "programar_formulacion_evaluacion_pip";
            $id_programacion         = "0";
            $Cbx_AnioCartera         = $this->input->post("Cbx_AnioCartera");
            $cbxBrecha               = $this->input->post("cbxBrecha");
            $txt_id_pip_programacion = $this->input->post("txt_id_pip_programacion");
            $txt_anio1               = $this->input->post("txt_anio1");
            $txt_anio2               = $this->input->post("txt_anio2");
            $txt_anio3               = $this->input->post("txt_anio3");
            $txt_prioridad           = $this->input->post("txt_prioridad");
            $txt_pia                 = $this->input->post("txt_pia");
            $txt_pim                 = $this->input->post("txt_pim");
            $txt_devengado           = $this->input->post("txt_devengado");
            if ($this->programar_pip_modal->AddProgramacion($flat, $id_programacion, $Cbx_AnioCartera, $cbxBrecha, $txt_id_pip_programacion, $txt_anio1, $txt_anio2, $txt_anio3, $txt_prioridad, $txt_pia, $txt_pim, $txt_devengado) == false) {
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
