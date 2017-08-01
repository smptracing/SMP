<?php
defined('BASEPATH') or exit('No direct script access allowed');

class programar_nopip extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('programar_nopip_modal');
    }
    //NOPIP
    //listar proyectos no pip
    public function Get_no_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "LISTARNOPIP_PROGRAMACION";
            $datos = $this->programar_nopip_modal->Get_no_pip($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function AddProgramacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                    = "programar_no_pip";
            $id_programacion         = "0";
            $Cbx_AnioCartera         = $this->input->post("Cbx_AnioCartera");
            $cbxBrecha               = $this->input->post("cbxBrecha");
            $txt_id_pip_programacion = $this->input->post("txt_id_pip_programacion");
            $txt_anio1               = $this->input->post("txt_anio1");
            $txt_anio2               = "0.00";
            $txt_anio3               = "0.00";
            $txt_prioridad           = $this->input->post("txt_prioridad");
            if ($this->programar_nopip_modal->AddProgramacion($flat, $id_programacion, $Cbx_AnioCartera, $cbxBrecha, $txt_id_pip_programacion, $txt_anio1, $txt_anio2, $txt_anio3, $txt_prioridad) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Agregar META PRESUPUESTAL PI
    public function AddMeta_PI()
    {
        if ($this->input->is_ajax_request()) {
            $flat                       = "C";
            $id_meta_pi                 = "0";
            $cbx_Meta                   = $this->input->post("cbx_Meta");
            $txt_id_pip_programacion_mp = $this->input->post("txt_id_pip_programacion_mp");
            $txt_pia                    = $this->input->post("txt_pia");
            $txt_pim                    = $this->input->post("txt_pim");
            $txt_devengado              = $this->input->post("txt_devengado");
            if ($this->programar_nopip_modal->AddMeta_PI($flat, $id_meta_pi, $cbx_Meta, $txt_id_pip_programacion_mp, $txt_pia, $txt_pim, $txt_devengado) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Listar programación
    public function listar_programacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "R";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->programar_nopip_modal->listar_programacion($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar meta proyecto
    public function listar_metas_pi()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "R";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->programar_nopip_modal->listar_metas_pi($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmprogramar_nopip');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsProgramarNoPip.php');
    }

}
