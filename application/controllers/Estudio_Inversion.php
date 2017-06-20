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
    //REGISTRAR NUEVA
    public function AddEtapaEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $flat             = "C";
            $id_etapa_estudio = "0";
            $id_est_inv       = $this->input->post("id_est_inv");
            $listaretapasFE_M = $this->input->post("listaretapasFE_M");
            $dateFechaIniC    = $this->input->post("dateFechaIniC");
            $dateFechaIniF    = $this->input->post("dateFechaIniF");
            $txtAvanceFisico  = $this->input->post("txtAvanceFisico");
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
            $flat                       = "C";
            $txtCodigoUnico             = $this->input->post("txtCodigoUnico");
            $txt_nombreEstudioInversion = $this->input->post("txt_nombreEstudioInversion");
            $listaFuncionC              = $this->input->post("listaFuncionC");
            $listaTipoInversion         = $this->input->post("listaTipoInversion");
            $listaNivelEstudio          = $this->input->post("listaNivelEstudio");
            $lista_unid_form            = $this->input->post("lista_unid_form");
            $lista_unid_ejec            = $this->input->post("lista_unid_ejec");
            $txadescripcion             = $this->input->post("txadescripcion");
            $txtMontoInversion          = $this->input->post("txtMontoInversion");
            $txtcostoestudio            = $this->input->post("txtcostoestudio");
            $listaResponsable           = $this->input->post("listaResponsable");

            $txt_IdEstadoCicloInversion          = "0";
            $txt_NombreEstadoCicloInversion      = $this->input->post("txt_NombreEstadoCicloInversion");
            $txt_DescripcionEstadoCicloInversion = $this->input->post("txt_DescripcionEstadoCicloInversion");
            if ($this->EstadoCicloInversion_Model->AddEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }
    //ELIMINAR  ciclo inversion
    public function EliminarEstadoCicloInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "D";
            // $ID   = "0";
            $txt_IdEstadoCicloInversion          = $this->input->post("IDCICLOINVERSION");
            $txt_NombreEstadoCicloInversion      = "NULL";
            $txt_DescripcionEstadoCicloInversion = "NULL";

            if ($this->EstadoCicloInversion_Model->EliminarEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion) == false) {
                echo "Se Eliminó  ";
            } else {
                echo "No se Eliminó ";
            }
        } else {
            show_404();
        }

    }
    //ACTUALIZAR NUEVA
    public function UpdateEstadoCicloInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                                 = "U";
            $txt_IdEstadoCicloInversionM          = $this->input->post("txt_IdEstadoCicloInversionM");
            $txt_NombreEstadoCicloInversionM      = $this->input->post("txt_NombreEstadoCicloInversionM");
            $txt_DescripcionEstadoCicloInversionM = $this->input->post("txt_DescripcionEstadoCicloInversionM");

            if ($this->EstadoCicloInversion_Model->UpdateEstadoCicloInversion($flat, $txt_IdEstadoCicloInversionM, $txt_NombreEstadoCicloInversionM, $txt_DescripcionEstadoCicloInversionM) == false) {
                echo "Se actualizó  ";
            } else {
                echo "No se actualizó ";
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
