<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Estudio_Inversion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Estudio_Inversion_Model');

    }
    public function index()
    {
        $this->_load_layout('front/Formulacion_Evaluacion/frmEstudioInversion');
    }
//------------------------------------------------------------------------------------------------------------------

    public function get_listaproyectos() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_listaproyectos();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    public function get_EstudioInversion() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_EstudioInversion();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function get_UnidadFormuladora() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_UnidadFormuladora();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    public function get_UnidadEjecutora() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_UnidadEjecutora();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    public function get_persona() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_persona();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function get_TipoEstudio() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_TipoEstudio();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function get_NivelEstudio() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_NivelEstudio();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function get_etapasFE() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_etapasFE();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function get_cargo() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_cargo();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //REGISTRAR NUEVA
    public function AddEtapaEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $flat             = "C";
            $id_etapa_estudio = "0";
            $id_est_inv       = $this->input->post("txt_id_est_inv");
            $listaretapasFE_M = $this->input->post("listaretapasFE_M");
            $dateFechaIniC    = $this->input->post("dateFechaIniC");
            $dateFechaIniF    = $this->input->post("dateFechaIniF");
            $txtAvanceFisico  = "0.00";
            $txadescripcion   = $this->input->post("txadescripcion");
            if ($this->Estudio_Inversion_Model->AddEtapaEstudio($flat, $id_etapa_estudio, $id_est_inv, $listaretapasFE_M, $dateFechaIniC, $dateFechaIniF, $txtAvanceFisico, $txadescripcion) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddEstudioInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "C";
            $id_est_inv         = "0";
            $txtCodigoUnico     = $this->input->post("txtCodigoUnico");
            $txtnombres         = $this->input->post("txtnombres");
            $listaFuncionC      = $this->input->post("listaFuncionC");
            $listaTipoInversion = $this->input->post("listaTipoInversion");
            $listaNivelEstudio  = $this->input->post("listaNivelEstudio");
            $lista_unid_form    = $this->input->post("lista_unid_form");
            $lista_unid_ejec    = $this->input->post("lista_unid_ejec");
            $txadescripcion     = $this->input->post("txadescripcion");
            $txtMontoInversion  = $this->input->post("txtMontoInversion");
            $txtcostoestudio    = $this->input->post("txtcostoestudio");
            $listaResponsable   = $this->input->post("listaResponsable");
            $dateFechaAsig      = $this->input->post("dateFechaAsig");
            if ($this->Estudio_Inversion_Model->AddEstudioInversion($flat, $id_est_inv, $txtCodigoUnico, $txtnombres, $listaFuncionC, $listaTipoInversion, $listaNivelEstudio, $lista_unid_form, $lista_unid_ejec, $txadescripcion, $txtMontoInversion, $txtcostoestudio, $listaResponsable, $dateFechaAsig) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }
    //REGISTRAR NUEVA
    public function AddResponsableEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $flat              = "C";
            $id_est_inv        = $this->input->post("id_est_inv");
            $listaResponsables = $this->input->post("listaResponsables");
            $dateFechaAsig     = $this->input->post("dateFechaAsig");
            if ($this->Estudio_Inversion_Model->AddResponsableEstudio($flat, $id_est_inv, $listaResponsables, $dateFechaAsig) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddAsiganarPersona()
    {
        if ($this->input->is_ajax_request()) {
            $flat                  = "U";
            $Cbx_Persona           = $this->input->post("Cbx_Persona");
            $Cbx_Cargo             = $this->input->post("Cbx_Cargo");
            $txt_IdEtapa_Estudio_p = $this->input->post("txt_IdEtapa_Estudio_p");
            $txadescripcion        = $this->input->post("txadescripcion");

            if ($this->Estudio_Inversion_Model->AddAsiganarPersona($flat, $Cbx_Persona, $Cbx_Cargo, $txt_IdEtapa_Estudio_p, $txadescripcion) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }

//------------------------------------------------------------------------------------------------------------------

    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('front/Formulacion_Evaluacion/js/jsFormEval');
    }
}
