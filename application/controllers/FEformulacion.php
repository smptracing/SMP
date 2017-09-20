<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FEformulacion extends CI_Controller
{
/* Mantenimiento de division funcional y grupo funcional*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('FEformulacion_Modal');
        $this->load->model('Estudio_Inversion_Model');
    }

    public function GetFormulacion()
    {
        if ($this->input->is_ajax_request()) {
            
            $id_est_inve = $this->session->userdata('id_est_inve');
            $idUsuario    = $this->session->userdata('idPersona');
            $dataIdPersona= $this->Estudio_Inversion_Model->UsuarioPersona($idUsuario);
            $idPersona=$dataIdPersona->id_persona;
            $TipoUsuario=$dataIdPersona->cod_usuario_tipo;

           /* if (empty($id_est_inve)) {
                $id_est_inve = '0';
            }
            if ($id_est_inve == 'all') {

                //$id_est_inve = '0';

            }*/
            if($TipoUsuario==01)
            {
                $id_est_inve=0;
                $datos = $this->FEformulacion_Modal->GetFormulacion($id_est_inve,$idPersona,$TipoUsuario);
                echo json_encode($datos);
            }else
            {
                $datos = $this->FEformulacion_Modal->GetFormulacion(48,$idPersona,$TipoUsuario);
                echo json_encode($datos);
            }
            
        } else {
            show_404();
        }
    }
    public function GetFEAprobados()
    {
        if ($this->input->is_ajax_request()) {
            $id_est_inve = $this->session->userdata('id_est_inve');
            if (empty($id_est_inve)) {
                $id_est_inve = '0';
            }
            if ($id_est_inve == 'all') {
                $id_est_inve = '0';
            }
            //$this->session->sess_destroy();
            $datos = $this->FEformulacion_Modal->GetFEAprobados($id_est_inve);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function GetFEViabilizado()
    {
        if ($this->input->is_ajax_request()) {
            $id_est_inve = $this->session->userdata('id_est_inve');
            if (empty($id_est_inve)) {
                $id_est_inve = '0';
            }
            if ($id_est_inve == 'all') {
                $id_est_inve = '0';
            }
            //$this->session->sess_destroy();
            $datos = $this->FEformulacion_Modal->GetFEViabilizado($id_est_inve);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //mostar la vista de lista de proyectos al seleccionar un unico
    public function Feformulacion($id_est_inve)
    {

        $data = array('id_est_inve' => $id_est_inve);
        $this->session->set_userdata($data);
        $this->_load_layout('Front/Formulacion_Evaluacion/frmFormulacion');
    }
    public function Feaprobado($id_est_inve)
    {
        $data = array('id_est_inve' => $id_est_inve);
        $this->session->set_userdata($data);
        $this->_load_layout_jsFormFormulacion('Front/Formulacion_Evaluacion/frmAprobados');
    }
    public function Feviabilizado($id_est_inve)
    {
        $data = array('id_est_inve' => $id_est_inve);
        $this->session->set_userdata($data);
        $this->_load_layout_jsViabilizado('Front/Formulacion_Evaluacion/frmViabilizado');
    }

    public function FeEstudioInversion()
    {
        $data= $this->Estudio_Inversion_Model->GetProyectosEstudio();  
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view('Front/Formulacion_Evaluacion/EstudioInversion/index',['ListaEstudio' => $data]);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

    public function insertar()
    {
        if($_POST)
        {
            /*$txtNombre=$this->input->post("txtNombre");

            if(count($this->Model_ModuloFE->ModuloPorNombre($txtNombre))>0)
            {
                $this->session->set_flashdata('error', 'Este módulo ya fue registrado con anterioridad.');
                return redirect('/Modulo_FE');
            }

            $Data=$this->Model_ModuloFE->insertar($txtNombre);
            $this->session->set_flashdata('correcto', 'Se registró correctamente');
            return redirect('/Modulo_FE');  */
        }
        /*$data= $this->Estudio_Inversion_Model->GetProyectosparaEstudio();  
        $listaNivelEstudio= $this->Estudio_Inversion_Model->get_NivelEstudio();
        $listaTipoEstudio= $this->Estudio_Inversion_Model->get_TipoEstudio();
        return $this->load->view('Front/Formulacion_Evaluacion/EstudioInversion/insertar',['ListaProyectos' => $data , 'listaNivelEstudio' => $listaNivelEstudio, 'listaTipoEstudio' => $listaTipoEstudio]);*/

        $listaNivelEstudio= $this->Estudio_Inversion_Model->get_NivelEstudio();
        $listaTipoEstudio= $this->Estudio_Inversion_Model->get_TipoEstudio();
        $listaUnidadFormuladora = $this->Estudio_Inversion_Model->get_UnidadFormuladora();

        return $this->load->view('Front/Formulacion_Evaluacion/EstudioInversion/insertar',['listaNivelEstudio' => $listaNivelEstudio, 'listaTipoEstudio' => $listaTipoEstudio , 'listaUnidadFormuladora' => $listaUnidadFormuladora]);
    }

    public function getProyectos()
    {
        if ($this->input->is_ajax_request()) 
        {
            $anio=$this->input->post("anio");         
            $data= $this->Estudio_Inversion_Model->GetProyectosparaEstudio($anio);  
            echo json_encode($data);         
        } 
        else 
        {
            show_404();
        }
    }


    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormFormulacion');
    }
    public function _load_layout_jsFormFormulacion($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormAprobados');
    }
    public function _load_layout_jsViabilizado($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
        $this->load->view('Front/Formulacion_Evaluacion/js/jsFormViabilizados');
    }
}
