<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InformacionPresupuestal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FuenteFinanciamiento_Model');

    }
    public function index()
    {
        $this->_load_layout('front/Administracion/frmInformacionPresupuestal');
    }

    //------------------------------------------------------------------------------------------------------------------

    public function get_FuenteFinanciamiento() //mostra fuente financiamietno

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdFuenteFinanciamiento          = $this->input->post("txt_IdFuenteFinanciamiento");
            $txt_IdRubroEjecucion                = $this->input->post("txt_IdRubroEjecucion");
            $txt_NombreFuenteFinanciamiento      = $this->input->post("txt_NombreFuenteFinanciamiento");
            $txt_AcronimoFuenteFinanciamiento    = $this->input->post("txt_AcronimoFuenteFinanciamiento");
            $txt_DescripcionFuenteFinanciamiento = $this->input->post("txt_DescripcionFuenteFinanciamiento");
            $user                                = "1";

            $datos = $this->FuenteFinanciamiento_Model->get_FuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat                                = "N";
            $txt_IdFuenteFinanciamiento          = "0";
            $txt_IdRubroEjecucion                = $this->input->post("cbxRubroEjecucion");
            $txt_NombreFuenteFinanciamiento      = $this->input->post("txt_NombreFuenteFinanciamiento");
            $txt_AcronimoFuenteFinanciamiento    = $this->input->post("txt_AcronimoFuenteFinanciamiento");
            $txt_DescripcionFuenteFinanciamiento = $this->input->post("txt_DescripcionFuenteFinanciamiento");
            $user                                = "1";
            if ($this->FuenteFinanciamiento_Model->AddFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }

    }
    //ELIMINAR  fuente Financiamiento
    public function EliminarFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat                                = "E";
            $txt_IdFuenteFinanciamiento          = $this->input->post("idffto");
            $txt_IdRubroEjecucion                = $this->input->post("id_rubro_ejec");
            $txt_NombreFuenteFinanciamiento      = "NULL";
            $txt_AcronimoFuenteFinanciamiento    = "NULL";
            $txt_DescripcionFuenteFinanciamiento = "NULL";
            $user                                = "1";

            if ($this->FuenteFinanciamiento_Model->EliminarFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_IdRubroEjecucion, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user) == false) {
                echo "Se Eliminó  ";
            } else {
                echo "No se Eliminó ";
            }

        } else {
            show_404();
        }

    }

    //ACTUALIZAR NUEVA
    public function UpdateFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $flat                                 = "M";
            $txt_IdFuenteFinanciamientoM          = $this->input->post("txt_IdFuenteFinanciamientoM");
            $txt_IdRubroEjecucionM                = $this->input->post("cbxRubroEjecucionM");
            $txt_NombreFuenteFinanciamientoM      = $this->input->post("txt_NombreFuenteFinanciamientoM");
            $txt_AcronimoFuenteFinanciamientoM    = $this->input->post("txt_AcronimoFuenteFinanciamientoM");
            $txt_DescripcionFuenteFinanciamientoM = $this->input->post("txt_DescripcionFuenteFinanciamientoM");
            $user                                 = "1";
            if ($this->FuenteFinanciamiento_Model->UpdateFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamientoM, $txt_IdRubroEjecucionM, $txt_NombreFuenteFinanciamientoM, $txt_AcronimoFuenteFinanciamientoM, $txt_DescripcionFuenteFinanciamientoM, $user) == false) {
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
        $this->load->view('layout/Administracion/header');
        $this->load->view($template);
        $this->load->view('layout/Administracion/footer');
    }

}
