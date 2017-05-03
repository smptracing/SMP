<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pip extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('NaturalezaInversion_Model');
        $this->load->model('TipologiaInversion_Model');
        $this->load->model('TipoInversion_Model');
        $this->load->model('EstadoCicloInversion_Model');
        $this->load->model('NivelGobierno_Model');
        $this->load->model('FuenteFinanciamiento_Model');

    }
    public function index()
    {
        $this->_load_layout('front/Administracion/frmPip');
    }
//------------------------------------------------------------------------------------------------------------------

    /* funcion de mi tabla*/
    public function get_NaturalezaInversion() //mostra Naturaleza de inversion

    {
        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $ID                        = $this->input->post("txt_IdNaturaleza");
            $txt_NombreNaturaleza      = $this->input->post("txt_NombreNaturaleza");
            $txt_DescripcionNaturaleza = $this->input->post("txt_DescripcionNaturaleza");
            $user                      = "1";

            $datos = $this->NaturalezaInversion_Model->get_NaturalezaInversion($flat, $ID, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //UPDATE TABLA naturaleza inversion

    public function EliminarNaturalezaInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "E";
            // $ID   = "0";
            $txt_IdNaturaleza          = $this->input->post("IDNATURALEZA");
            $txt_NombreNaturaleza      = "NULL";
            $txt_DescripcionNaturaleza = "NULL";
            $user                      = "1";

            if ($this->NaturalezaInversion_Model->EliminarNaturalezaInversion($flat, $txt_IdNaturaleza, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user) == true) {
                echo "No Se actualizao  ";
            } else {
                echo " se actualizo ";
            }

        } else {
            show_404();
        }

    }

//UPDATE TABLA naturaleza inversion

    public function UpdateNaturalezaInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "M";
            // $ID   = "0";
            $txt_IdNaturalezaM          = $this->input->post("txt_IdNaturalezaM");
            $txt_NombreNaturalezaM      = $this->input->post("txt_NombreNaturalezaM");
            $txt_DescripcionNaturalezaM = $this->input->post("txt_DescripcionNaturalezaM");
            $user                       = "1";

            if ($this->NaturalezaInversion_Model->UpdateNaturalezaInversion($flat, $txt_IdNaturalezaM, $txt_NombreNaturalezaM, $txt_DescripcionNaturalezaM, $user) == true) {
                echo "No Se actualizao  ";
            } else {
                echo " se actualizo ";
            }

        } else {
            show_404();
        }

    }

    //REGISTRAR NUEVA NATURALEZA INVERSION
    public function AddNaturalezaInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "N";
            $ID   = "0";
            //$txt_IdNaturaleza          = $this->input->post("txt_IdNaturaleza");
            $txt_NombreNaturaleza      = $this->input->post("txt_NombreNaturaleza");
            $txt_DescripcionNaturaleza = $this->input->post("txt_DescripcionNaturaleza");
            $user                      = "1";
            // if ($this->NaturalezaInversion_Model->AddNaturalezaInversion($flat, $txt_IdNaturaleza, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user) == true) {
            if ($this->NaturalezaInversion_Model->AddNaturalezaInversion($flat, $ID, $txt_NombreNaturaleza, $txt_DescripcionNaturaleza, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------
    public function get_TipologiaInversion() //mostra TIPOLOGIA INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdTipologiaInversion          = $this->input->post("txt_IdTipologiaInversion");
            $txt_NombreTipologiaInversion      = $this->input->post("txt_NombreTipologiaInversion");
            $txt_DescripcionTipologiaInversion = $this->input->post("txt_DescripcionTipologiaInversion");
            $user                              = "1";

            $datos = $this->TipologiaInversion_Model->get_TipologiaInversion($flat, $txt_IdTipologiaInversion, $txt_NombreTipologiaInversion, $txt_DescripcionTipologiaInversion, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA TIPOLOGIA DE INVERSION
    public function AddTipologiaInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                              = "N";
            $txt_IdTipologiaInversion          = "0";
            $txt_NombreTipologiaInversion      = $this->input->post("txt_NombreTipologiaInversion");
            $txt_DescripcionTipologiaInversion = $this->input->post("txt_DescripcionTipologiaInversion");
            $user                              = "1";
            if ($this->TipologiaInversion_Model->AddTipologiaInversion($flat, $txt_IdTipologiaInversion, $txt_NombreTipologiaInversion, $txt_DescripcionTipologiaInversion, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
            }

        } else {
            show_404();
        }

    }
    //ACTUALIZAR NUEVA TIPO INVERSION
    public function UpdateTipologiaInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                               = "M";
            $txt_IdTipologiaInversionM          = $this->input->post("txt_IdTipologiaInversionM");
            $txt_NombreTipologiaInversionM      = $this->input->post("txt_NombreTipologiaInversionM");
            $txt_DescripcionTipologiaInversionM = $this->input->post("txt_DescripcionTipologiaInversionM");
            $user                               = "1";
            if ($this->TipologiaInversion_Model->UpdateTipologiaInversion($flat, $txt_IdTipologiaInversionM, $txt_NombreTipologiaInversionM, $txt_DescripcionTipologiaInversionM, $user) == true) {
                echo "NO se Actualizo....";
            } else {
                echo "se Actualizo..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------

    public function get_TipoInversion() //mostra TIPO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdTipoInversion          = $this->input->post("txt_IdTipoInversion");
            $txt_NombreTipoInversion      = $this->input->post("txt_NombreTipoInversion");
            $txt_DescripcionTipoInversion = $this->input->post("txt_DescripcionTipoInversion");
            $user                         = "1";

            $datos = $this->TipoInversion_Model->get_TipoInversion($flat, $txt_IdTipoInversion, $txt_NombreTipoInversion, $txt_DescripcionTipoInversion, $user);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddTipoInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                         = "N";
            $txt_IdTipoInversion          = "0";
            $txt_NombreTipoInversion      = $this->input->post("txt_NombreTipoInversion");
            $txt_DescripcionTipoInversion = $this->input->post("txt_DescripcionTipoInversion");
            $user                         = "1";
            if ($this->TipoInversion_Model->AddTipoInversion($flat, $txt_IdTipoInversion, $txt_NombreTipoInversion, $txt_DescripcionTipoInversion, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
            }

        } else {
            show_404();
        }

    }
    //ACTUALIZAR NUEVA
    public function UpdateTipoInversion()
    {
        if ($this->input->is_ajax_request()) {
            $flat                          = "M";
            $txt_IdTipoInversionM          = $this->input->post("txt_IdTipoInversionM");
            $txt_NombreTipoInversionM      = $this->input->post("txt_NombreTipoInversionM");
            $txt_DescripcionTipoInversionM = $this->input->post("txt_DescripcionTipoInversionM");
            $user                          = "1";
            if ($this->TipoInversion_Model->UpdateTipoInversion($flat, $txt_IdTipoInversionM, $txt_NombreTipoInversionM, $txt_DescripcionTipoInversionM, $user) == true) {
                echo "NO se Actualizo....";
            } else {
                echo "se Actualizo..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------

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
            if ($this->EstadoCicloInversion_Model->AddEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
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
            if ($this->EstadoCicloInversion_Model->UpdateEstadoCicloInversion($flat, $txt_IdEstadoCicloInversionM, $txt_NombreEstadoCicloInversionM, $txt_DescripcionEstadoCicloInversionM, $user) == true) {
                echo "NO se Actualizo....";
            } else {
                echo "se Actualizo..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------

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
            if ($this->NivelGobierno_Model->AddNivelGobierno($flat, $txt_IdNivelGobierno, $txt_NombreNivelGobierno, $txt_DescripcionNivelGobierno, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
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
            if ($this->NivelGobierno_Model->UpdateNivelGobierno($flat, $txt_IdNivelGobiernoM, $txt_NombreNivelGobiernoM, $txt_DescripcionNivelGobiernoM, $user) == true) {
                echo "NO se Actualizo....";
            } else {
                echo "se Actualizo..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------

    public function get_FuenteFinanciamiento() //mostra fuente financiamietno

    {

        if ($this->input->is_ajax_request()) {
            $flat = "LT";
            // $ID   = "0";
            $txt_IdFuenteFinanciamiento          = $this->input->post("txt_IdFuenteFinanciamiento");
            $txt_NombreFuenteFinanciamiento      = $this->input->post("txt_NombreFuenteFinanciamiento");
            $txt_AcronimoFuenteFinanciamiento    = $this->input->post("txt_AcronimoFuenteFinanciamiento");
            $txt_DescripcionFuenteFinanciamiento = $this->input->post("txt_DescripcionFuenteFinanciamiento");
            $user                                = "1";

            $datos = $this->FuenteFinanciamiento_Model->get_FuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user);
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
            $txt_NombreFuenteFinanciamiento      = $this->input->post("txt_NombreFuenteFinanciamiento");
            $txt_AcronimoFuenteFinanciamiento    = $this->input->post("txt_AcronimoFuenteFinanciamiento");
            $txt_DescripcionFuenteFinanciamiento = $this->input->post("txt_DescripcionFuenteFinanciamiento");
            $user                                = "1";
            if ($this->FuenteFinanciamiento_Model->AddFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamiento, $txt_NombreFuenteFinanciamiento, $txt_AcronimoFuenteFinanciamiento, $txt_DescripcionFuenteFinanciamiento, $user) == true) {
                echo "NO se registro....";
            } else {
                echo "se registro..........";
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
            $txt_NombreFuenteFinanciamientoM      = $this->input->post("txt_NombreFuenteFinanciamientoM");
            $txt_AcronimoFuenteFinanciamientoM    = $this->input->post("txt_AcronimoFuenteFinanciamientoM");
            $txt_DescripcionFuenteFinanciamientoM = $this->input->post("txt_DescripcionFuenteFinanciamientoM");
            $user                                 = "1";
            if ($this->FuenteFinanciamiento_Model->UpdateFuenteFinanciamiento($flat, $txt_IdFuenteFinanciamientoM, $txt_NombreFuenteFinanciamientoM, $txt_AcronimoFuenteFinanciamientoM, $txt_DescripcionFuenteFinanciamientoM, $user) == true) {
                echo "NO se Actualizo....";
            } else {
                echo "se Actualizo..........";
            }

        } else {
            show_404();
        }

    }

//------------------------------------------------------------------------------------------------------------------
    public function _load_layout($template)
    {
        $this->load->view('layout/header');
        $this->load->view($template);
        $this->load->view('layout/footer');
    }

}
