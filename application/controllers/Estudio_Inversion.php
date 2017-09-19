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
            $NombreEstadoFormulacionEvalu=$this->input->post('valor');
            $datos = $this->Estudio_Inversion_Model->get_listaproyectos($NombreEstadoFormulacionEvalu);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }


    public function get_EstudioInversion() //mostra ESTADO INVERSION

    {
        $idUsuario    = $this->session->userdata('idPersona');
        $dataIdPersona=$this->Estudio_Inversion_Model->UsuarioPersona($idUsuario);
        $idPersona=$dataIdPersona->id_persona;
        $TipoUsuarioCodigo=$dataIdPersona->cod_usuario_tipo;//01:administrador,
        if ($this->input->is_ajax_request()) {
            $datos = $this->Estudio_Inversion_Model->get_EstudioInversion($idPersona,$TipoUsuarioCodigo);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
     public function  get_listaproyectosCargar() //mostra ESTADO INVERSION

    {

        if ($this->input->is_ajax_request()) {
            $id_Pi=$this->input->post('id_Pi');
            $datos = $this->Estudio_Inversion_Model->get_listaproyectosCargar($id_Pi);
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
            $idUsuario    = $this->session->userdata('idPersona');
            $dataIdPersona= $this->Estudio_Inversion_Model->UsuarioPersona($idUsuario);
            $idPersona=$dataIdPersona->id_persona;

            $datos = $this->Estudio_Inversion_Model->get_persona($idPersona);
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
            //PRIMERO ACTUALIZAR Y LUEGO REGISTAR ETAPA ESTUDIO
            $flat             = "UC";
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
            if ($this->Estudio_Inversion_Model->AddEstudioInversion($flat, $id_est_inv, $txtCodigoUnico, $txtnombres, $listaFuncionC, $listaTipoInversion, $listaNivelEstudio, $lista_unid_form, $lista_unid_ejec, $txadescripcion, $txtMontoInversion, $txtcostoestudio) == false) {
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

     public function AddCoordinadorEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $flat              = "AGREGARCOORDINADOR";
            $id_est_inv        = $this->input->post("id_est_inv");
            $listaResponsables = $this->input->post("listaResponsables");
            $dateFechaAsig     = $this->input->post("dateFechaAsig");
            if ($this->Estudio_Inversion_Model->AddCoordinadorEstudio($flat, $id_est_inv, $listaResponsables, $dateFechaAsig) == false) {
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
            $flat                  = "UC";
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

    
    //añadir documentos ala estudio de invserion
    public function AddDocumentosEstudio()
    {

        if ($this->input->is_ajax_request()) 
        {

            // echo  $txt_Cartera;
            $config['upload_path']   = './uploads/DocumentosInversion/';
            $config['allowed_types'] = 'pdf|doc|xml|docx|PDF|DOC|DOCX|xls|xlsx';
            $config['max_width']     = 1024;
            $config['max_height']    = 768;
            $config['max_size']      = 15000;
            $config['encrypt_name']  = false;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('Documento_invserion')) {

                $error = "ERROR NO SE CARGO EL DOCUMENTO DE INSERSIÓN";
                echo $error;
            } else {

                $txt_id_est_invAdd      = $this->input->post("txt_id_est_invAdd");
                $txt_documentosEstudio  = $this->input->post("txt_documentosEstudio");
                $txt_descripcionEstudio = $this->input->post("txt_descripcionEstudio");
                $Url_documento          = $this->upload->file_name;
                //$error="corrercto";
                if ($this->Estudio_Inversion_Model->AddDocumentosEstudio($txt_id_est_invAdd, $txt_documentosEstudio, $txt_descripcionEstudio, $Url_documento) == false) {
                    echo "1";
                } else {
                    echo "0";
                }

            }
        } else {
            show_404();
        }

    }
    //fin documentos de inversion

    //listar las etapas de los estudios
    public function get_etapas_estudio() //mostra ESTADO INVERSION

    {
        if ($this->input->is_ajax_request()) {
            $id_est_inv = $this->input->post("id_est_inv");
            $data       = $this->Estudio_Inversion_Model->get_etapas_estudio($id_est_inv);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar Documentos de inversion
    public function GetDocumentosEstudio() //mostra ESTADO INVERSION

    {
        if ($this->input->is_ajax_request()) {
            $id_est_inv = $this->input->post('id_est_inv');
            $datos      = $this->Estudio_Inversion_Model->GetDocumentosEstudio($id_est_inv);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //fin listar documentos de inversion

    public function EstudioCoordinadorFunc()
    {
        $listarEstudioCoordinadorFuncion=$this->Estudio_Inversion_Model->EstudioCoordinadorF();
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view('front/Formulacion_Evaluacion/Estudio/index',['listarEstudioCoordinadorFuncion'=>$listarEstudioCoordinadorFuncion]);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
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
