<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EstadoEtapa_FE extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_EstadoEtapa_FE');
    }
    public function GetEstadoEtapa_FE()
    {
        if ($this->input->is_ajax_request()) {
            $flat                   = "R";
            $id_estado              = "0";
            $txt_IdEtapa_Estudio_FE = $this->input->post("id_etapa_estudio");
            $data                   = $this->Model_EstadoEtapa_FE->GetEstadoEtapa_FE($flat, $id_estado, $txt_IdEtapa_Estudio_FE);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

    //REGISTRAR NUEVA
    public function AddEstadoEtapa_FE()
    {
        if ($this->input->is_ajax_request()) 
        {
            $msg=array();

            $c_data['id_estado']=$this->input->post("Cbx_EstadoFE");
            $c_data['id_etapa_estudio']=$this->input->post("txt_IdEtapa_Estudio_FE");
            $c_data['fecha']=date('d-m-Y H:i:s');

            $q1=$this->Model_EstadoEtapa_FE->AddEstadoEtapa_FE($c_data);

            $msg = ($q1>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
            $this->load->view('front/json/json_view', ['datos' => $msg]);

            /*$flat                   = "C";
            $Cbx_EstadoFE           = $this->input->post("Cbx_EstadoFE");
            $txt_IdEtapa_Estudio_FE = $this->input->post("txt_IdEtapa_Estudio_FE");
            if ($this->Model_EstadoEtapa_FE->AddEstadoEtapa_FE($flat, $Cbx_EstadoFE, $txt_IdEtapa_Estudio_FE) == false) {
                echo "1";
            } else {
                echo "2";
            }*/
        } 
        else 
        {
            show_404();
        }
    }

    //FIN CONTROLADOR PARA AGREGAR ETAPAS DE FORMULACION Y EVALUACION EN UNA TABLA
    public function index()
    {
        $this->_load_layout('Front/Formulacion_Evaluacion/frmEstadoEtapa_FE');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
