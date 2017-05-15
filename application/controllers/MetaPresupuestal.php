<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MetaPresupuestal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_MetaPresupuestal');
    }
    public function index()
    {
        $this->_load_layout('Front/ADMINISTRACION/frmInformacionPresupuestal');
    }
//---------------------MANTENIMIENTOS DE RUBRO DE EJECUCION-------------------------------------
    //AGREGAR UN RUBRO DE EJECUCION
    public function AddMetaP()
    {
        if ($this->input->is_ajax_request()) {
            $txt_NombreMetaP  = $this->input->post("txt_NombreMetaP");
            $date_AnioMetaP  = $this->input->post("date_AnioMetaP");
            $text_Pim  = $this->input->post("text_Pim");
            $text_NumeroMeta  = $this->input->post("text_NumeroMeta");
            $text_Devengado  = $this->input->post("text_Devengado");
            if ($this->Model_MetaPresupuestal->AddMetaP($txt_NombreMetaP, $date_AnioMetaP, $text_Pim, $text_NumeroMeta ,$text_Devengado) == true) {
                echo "Se añadio un meta presupuestal";
            } else {
                echo "No se añadio meta presupuestal";
            }

        } else {
            show_404();
        }

    }
//FIN DE AGREGAR UN RUBRO DE EJECUCION

/* LISTAR RUBROS DE EJECUCION*/
    public function GetMetaP()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_MetaPresupuestal->GetMetaP();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
//FIN LISTAR RUBROS DE EJECUCION

    //ACTUALIZAR O MODIFICAR DATOS DE LOS RUBROS
    public function UpdateMetaP()
    {
        if ($this->input->is_ajax_request()) {
            $txt_IdMetaPModif   = $this->input->post("txt_IdMetaPModif");
            $txt_NombreMetaPU  = $this->input->post("txt_NombreMetaPU");
            $date_AnioMetaPU  = $this->input->post("date_AnioMetaPU");
            $text_PimU  = $this->input->post("text_PimU");
            $text_NumeroMetaU  = $this->input->post("text_NumeroMetaU");
            $text_DevengadoU  = $this->input->post("text_DevengadoU");
            if ($this->Model_MetaPresupuestal->UpdateMetaP($txt_IdMetaPModif,$txt_NombreMetaPU,$date_AnioMetaPU,$text_PimU,$text_NumeroMetaU,$text_DevengadoU) == false) {
                echo "Se actualizo correctamente la meta presupuestal";
            } else {
                echo "No Se actualizo correctamente la meta presupuestal";
            }
        } else {
            show_404();
        }
    }
//FIN ACTUALIZAR O MODIFICAR DATOS DE LOS RUBROS DE EJECUCION
    //----------------------FIN MANTENIMIENTOS DE RUBRO DE EJECUCION--------------------------------------------

    public function _load_layout($template)
    {
        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view($template);
        $this->load->view('layout/ADMINISTRACION/footer');
    }

}
