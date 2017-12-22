<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MetaPip extends CI_Controller
{
/* Mantenimiento de sector entidad Y servicio publico asociado*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MetaPip_Model');
        //   $this->load->model('Ubicacion_Model');
    }
    /* public function GetMeta_Pip()
    {
    if ($this->input->is_ajax_request()) {
    $flat  = "listarpip_formulacion_evaluacion";
    $datos = $this->MetaPip_model->GetMeta_Pip($flat);
    echo json_encode($datos);
    } else {
    show_404();
    }
    }*/

    public function meta_nopip()
    {
        $this->_load_layout_meta_nopip('Front/Pmi/frmMetaNoPip');
    }
    public function _load_layout_meta_nopip($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsMetaNoPip');
    }
    public function meta_pip()
    {
      //$codigo_unico_pi = $this->input->get('codigo_unico_pi');
      $codigo_unico_pi = $this->input->get('codigo_unico_pi');
      if($codigo_unico_pi!='') {
        $year = date('Y');
        $data['listar_montos'] = $this->MetaPip_Model->getDataSiaf($year,$codigo_unico_pi);

           $this->load->view('layout/PMI/header');
           $this->load->view('Front/Pmi/frmMetaPip', $data);
           $this->load->view('layout/PMI/footer');
           $this->load->view('Front/Pmi/js/jsMetaPip');
      } else {
        $this->load->view('layout/PMI/header');
        $this->load->view('Front/Pmi/frmMetaPip');
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsMetaPip');
      }
    }

    // public function meta_pip_modal()
    // {
    //   if($this->input->get('codigo_unico_pi')!='')
    // 	{
    //     $codigo_unico_pi = $this->input->get('codigo_unico_pi');
    //     $year = date('Y');
    //
    //     $data['listar_montos'] = $this->MetaPip_Model->getDataSiaf($year,$codigo_unico_pi);
    //
    //     $this->load->view('Front/Pmi/frmMetaPipModal', $data);
    // 	}
    // 	else
    // 	{
    //     $this->load->view('Front/Pmi/frmMetaPipModal');
    // 	}
    // }

    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsMetaPip');
    }
}
