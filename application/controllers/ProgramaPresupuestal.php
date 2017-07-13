<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProgramaPresupuestal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_ProgramaPresupuestal');
    }
    public function index()
    {
        $this->_load_layout('Front/ADMINISTRACION/frmInformacionPresupuestal');
    }
//---------------------MANTENIMIENTOS DE PROGRAMA PRESUPUESTAL-------------------------------------
    //AGREGAR UN PROGRAMA PRESUPUESTAL
    public function AddProgramaP()
    {
        if ($this->input->is_ajax_request()) {
            $txt_NombreProgramaP  = $this->input->post("txt_NombreProgramaP");
            if ($this->Model_ProgramaPresupuestal->AddProgramaP($txt_NombreProgramaP) == true) {
                echo "Se añadio un programa presupuestal";
            } else {
                echo "No se añadio  un programa presupuestal";
            }

        } else {
            show_404();
        }
    }
//FIN DE PROGRAMA PRESUPUESTAL
/* LISTAR PROGRAMA PRESUPUESTAL*/
    public function GetProgramaP()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_ProgramaPresupuestal->GetProgramaP();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
//FIN LISTAR PROGRAMA PRESUPUESTAL
    //ACTUALIZAR O MODIFICAR DATOS DE PROGRAMA PRESUPUESTAL
    public function UpdateProgramaP()
    {
        if ($this->input->is_ajax_request()) {
            $txt_IdProgramaPModif   = $this->input->post("txt_IdProgramaPModif");
            $txt_NombreProgramaPU  = $this->input->post("txt_NombreProgramaPU");
            if ($this->Model_ProgramaPresupuestal->UpdateProgramaP($txt_IdProgramaPModif,$txt_NombreProgramaPU) == false) {
                echo "Se actualizo correctamente la programa presupuestal";
            } else {
                echo "No Se actualizo correctamente la programa presupuestal";
            }
            echo $txt_NombreProgramaPU;
            
        } else {
            show_404();
        }
    }
//FIN ACTUALIZAR O MODIFICAR DATOS DE PROGRAMA PRESUPUESTAL
//---FIN MANTENIMIENTOS DE PROGRAMA PRESUPUESTAL-------

    public function _load_layout($template)
    {
        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view($template);
        $this->load->view('layout/ADMINISTRACION/footer');
    }

}
