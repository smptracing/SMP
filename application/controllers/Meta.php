<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Meta_Model');
    }
    //editar Meta Presupuestal
    public function EditarMetaPresupuestal()
    {
        if ($this->input->is_ajax_request()) {
            $flat                   = "U";
            $txt_id_meta            = $this->input->post("txt_id_meta");
            $metadate               = $this->input->post("txt_anio_meta_m");
            $txt_anio_meta_m        = $metadate . '/01/01';
            $txt_correlativo_meta_m = $this->input->post("txt_correlativo_meta_m");
            $txt_nombre_meta_m      = $this->input->post("txt_nombre_meta_m");
            if ($this->Meta_Model->EditarMetaPresupuestal($flat, $txt_id_meta, $txt_anio_meta_m, $txt_correlativo_meta_m, $txt_nombre_meta_m) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Agregar Meta Presupuestal
    public function AddMeta()
    {
        if ($this->input->is_ajax_request())
        {
            $msg=array();

            $c_data['nombre_meta_pres']=$this->input->post("txt_nombre_meta");

            $query = $this->Meta_Model->AddMeta($c_data);

            if ($query>0)
            {                
                $msg = (['proceso' => 'Correcto', 'mensaje' => 'El registro fue guardado correctamente ']);
            } 
            else
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'ha ocurrido un error inesperado.']);
            
            }
            $this->load->view('front/json/json_view', ['datos' => $msg]);
        } 
        else 
        {
            show_404();
        }
    }
    //Listar programación
    public function listar_meta()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "R";
            $datos = $this->Meta_Model->listar_meta($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    /**/
    //Eliminar meta presupuestal
    public function Eliminar_meta_prepuestal()
    {
        if ($this->input->is_ajax_request()) {
            $flat         = "D";
            $id_meta_pres = $this->input->post("id_meta_pres");
            if ($this->Meta_Model->Eliminar_meta_prepuestal($flat, $id_meta_pres) == true) {
                echo "Se Eliminó  ";
            } else {
                echo "No se Eliminó ";
            }
        } else {
            show_404();
        }

    }
    /*listar correlativo meta*/
    public function listar_correlativo()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Meta_Model->listar_correlativo();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    /*listar meta presupuestal*/
    public function listar_meta_presupuestal()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Meta_Model->listar_meta_presupuestal();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmMeta');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsMeta.php');
    }

}
