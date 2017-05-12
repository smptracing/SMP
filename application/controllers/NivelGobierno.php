<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InformacionPresupuestal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('NivelGobierno_Model');

    }
    public function index()
    {
        $this->_load_layout('front/Pmi/frmMRubroEjecucion');
    }

//------------------------------------------------------------------------------------------------------------------

    public function get_NivelGobierno() //mostra nivel de gobierno

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdNivelGobierno          = $this->input->post("txt_IdNivelGobierno");
            $txt_NombreNivelGobierno      = $this->input->post("txt_NombreNivelGobierno");
            $txt_DescripcionNivelGobierno = $this->input->post("txt_DescripcionNivelGobierno");
            $user                         = "1";

            $datos = $this->NivelGobierno_Model->get_NivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno, $txt_DescripcionNivelGobierno, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddNivelGobierno()
    {
        if ($this->input->is_ajax_request()) {
            $flat                         = "N";
            $txt_IdNivelGobierno          = "0";
            $txt_NombreNivelGobierno      = $this->input->post("txt_NombreNivelGobierno");
            $txt_DescripcionNivelGobierno = $this->input->post("txt_DescripcionNivelGobierno");
            $user                         = "1";
            if ($this->NivelGobierno_Model->AddNivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno, $txt_DescripcionNivelGobierno, $user) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }

    }
    //ELIMINAR  nivel Gobierno
    public function EliminarNivelGobierno()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "E";
            // $ID   = "0";
            $txt_IdNivelGobierno          = $this->input->post("IDNIVELGOB");
            $txt_NombreNivelGobierno      = "NULL";
            $txt_DescripcionNivelGobierno = "NULL";
            $user                         = "1";

            if ($this->NivelGobierno_Model->EliminarNivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno, $txt_DescripcionNivelGobierno, $user) == false) {
                echo "Se Eliminó  ";
            } else {
                echo "No se Eliminó ";
            }
        } else {
            show_404();
        }

    }
    //ACTUALIZAR NUEVA
    public function UpdateNivelGobierno()
    {
        if ($this->input->is_ajax_request()) {
            $flat                          = "M";
            $txt_IdNivelGobiernoM          = $this->input->post("txt_IdNivelGobiernoM");
            $txt_NombreNivelGobiernoM      = $this->input->post("txt_NombreNivelGobiernoM");
            $txt_DescripcionNivelGobiernoM = $this->input->post("txt_DescripcionNivelGobiernoM");
            $user                          = "1";
            if ($this->NivelGobierno_Model->UpdateNivelGobierno($flat, $txt_IdNivelGobiernoM, $txt_NombreNivelGobiernoM, $txt_DescripcionNivelGobiernoM, $user) == false) {
                echo "Se actualizó  ";
            } else {
                echo "No se actualizó ";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------

//------------------------------------------------------------------------------------------------------------------
    public function _load_layout($template)
    {
        $this->load->view('layout/Administracion/header');
        $this->load->view($template);
        $this->load->view('layout/Administracion/footer');
    }
}
