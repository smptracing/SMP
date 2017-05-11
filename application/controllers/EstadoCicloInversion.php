<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EstadoCicloInversion extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('EstadoCicloInversion_Model');

    }
    public function index()
    {
        $this->_load_layout('front/Administracion/frmEstadoCicloInversion');
    }
//------------------------------------------------------------------------------------------------------------------

    public function get_EstadoCicloInversion() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdEstadoCicloInversion          = $this->input->post("txt_IdEstadoCicloInversion");
            $txt_NombreEstadoCicloInversion      = $this->input->post("txt_NombreEstadoCicloInversion");
            $txt_DescripcionEstadoCicloInversion = $this->input->post("txt_DescripcionEstadoCicloInversion");
            $user                                = "1";

            $datos = $this->EstadoCicloInversion_Model->get_EstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddEstadoCicloInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                                = "N";
            $txt_IdEstadoCicloInversion          = "0";
            $txt_NombreEstadoCicloInversion      = $this->input->post("txt_NombreEstadoCicloInversion");
            $txt_DescripcionEstadoCicloInversion = $this->input->post("txt_DescripcionEstadoCicloInversion");
            $user                                = "1";
            if ($this->EstadoCicloInversion_Model->AddEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user) == false) {
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
            $flat = "E";
            // $ID   = "0";
            $txt_IdEstadoCicloInversion          = $this->input->post("IDCICLOINVERSION");
            $txt_NombreEstadoCicloInversion      = "NULL";
            $txt_DescripcionEstadoCicloInversion = "NULL";
            $user                                = "1";

            if ($this->EstadoCicloInversion_Model->EliminarEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user) == false) {
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
            $flat                                 = "M";
            $txt_IdEstadoCicloInversionM          = $this->input->post("txt_IdEstadoCicloInversionM");
            $txt_NombreEstadoCicloInversionM      = $this->input->post("txt_NombreEstadoCicloInversionM");
            $txt_DescripcionEstadoCicloInversionM = $this->input->post("txt_DescripcionEstadoCicloInversionM");
            $user                                 = "1";
            if ($this->EstadoCicloInversion_Model->UpdateEstadoCicloInversion($flat, $txt_IdEstadoCicloInversionM, $txt_NombreEstadoCicloInversionM, $txt_DescripcionEstadoCicloInversionM, $user) == false) {
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
