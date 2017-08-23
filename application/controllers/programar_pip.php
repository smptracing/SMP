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
    public function GetAnioCarteraProgramado()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->programar_pip_modal->GetAnioCarteraProgramado();
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
            $txt_anio1_oper          = $this->input->post("txt_anio1_oper");
            $txt_anio2_oper          = $this->input->post("txt_anio2_oper");
            $txt_anio3_oper          = $this->input->post("txt_anio3_oper");
            $txt_prioridad           = $this->input->post("txt_prioridad");
            if ($this->programar_pip_modal->AddProgramacion($flat, $id_programacion, $Cbx_AnioCartera, $cbxBrecha, $txt_id_pip_programacion, $txt_anio1, $txt_anio2, $txt_anio3, $txt_anio1_oper, $txt_anio2_oper, $txt_anio3_oper, $txt_prioridad) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //agregar progrmacion para operacion y mantenimiento
    public function AddProgramacion_operacion_mantenimiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat                     = "programar_operacion_mantenimiento";
            $id_programacion_         = "0";
            $Cbx_AnioCartera_         = $this->input->post("Cbx_AnioCartera_");
            $cbxBrecha_               = $this->input->post("cbxBrecha_");
            $txt_id_pip_programacion_ = $this->input->post("txt_id_pip_programacion_");
            $txt_anio1_               = $this->input->post("txt_anio1_");
            $txt_anio2_               = $this->input->post("txt_anio2_");
            $txt_anio3_               = $this->input->post("txt_anio3_");
            $txt_prioridad_           = $this->input->post("txt_prioridad_");
            if ($this->programar_pip_modal->AddProgramacion_operacion_mantenimiento($flat, $id_programacion_, $Cbx_AnioCartera_, $cbxBrecha_, $txt_id_pip_programacion_, $txt_anio1_, $txt_anio2_, $txt_anio3_, $txt_prioridad_) == false) {
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
            $txt_anio_meta              = $this->input->post("txt_anio_meta");
            $cbx_meta_presupuestal      = $this->input->post("cbx_meta_presupuestal");
            $txt_id_pip_programacion_mp = $this->input->post("txt_id_pip_programacion_mp");
            $cbx_Meta                   = $this->input->post("cbx_Meta");
            $txt_pia                    = $this->input->post("txt_pia");
            $txt_pim                    = $this->input->post("txt_pim");
            $txt_certificado            = $this->input->post("txt_certificado");
            $txt_compromiso             = $this->input->post("txt_compromiso");
            $txt_devengado              = $this->input->post("txt_devengado");
            $txt_girado                 = $this->input->post("txt_girado");
            if ($this->programar_pip_modal->AddMeta_PI($flat, $id_meta_pi, $txt_anio_meta, $cbx_meta_presupuestal, $txt_id_pip_programacion_mp, $cbx_Meta, $txt_pia, $txt_pim, $txt_certificado, $txt_compromiso, $txt_devengado, $txt_girado) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Listar prioridad
    public function listar_prioridad()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listar_ultimo_pi_programado_prioridad";
            $anio = $this->input->post("anio");
            $data = $this->programar_pip_modal->listar_prioridad($flat, $anio);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //Listar programación
    public function listar_programacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_programado_pip";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->programar_pip_modal->listar_programacion($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //Listar programación en modal operacion y mantenimiento
    public function listar_programacion_operacion_mantenimiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_programacion_operacion"; //para listar en el modal
            $id_pi = $this->input->post("id_pi");
            $data  = $this->programar_pip_modal->listar_programacion_operacion_mantenimiento($flat, $id_pi);
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
            $data  = $this->programar_pip_modal->listar_metas_pi($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //eliminar metas pi
    public function Eliminar_meta_prepuestal_pi()
    {
        if ($this->input->is_ajax_request()) {
            $flat       = "D";
            $id_meta_pi = $this->input->post("id_meta_pi");
            if ($this->programar_pip_modal->Eliminar_meta_prepuestal($flat, $id_meta_pi) == true) {
                echo "Se Eliminó  ";
            } else {
                echo "No se Eliminó ";
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
