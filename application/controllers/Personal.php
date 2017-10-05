<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personal extends CI_Controller
{
/* Mantenimiento de Personal entidad Y servicio publico asociado*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Personal');
        $this->load->model('Cargo_Modal');
    }

    /* Pagina principal de la vista entidad Y servicio publico asociado */
    public function index()
    {
        $this->_load_layout('Front/Administracion/frmPersonal');
    }

   
    public function GetPersonal()
    {
        if($this->input->is_ajax_request())
        {
            $skip=$this->input->post('start');
            $numberRow=$this->input->post('length');
            $valueSearch=$this->input->post('search[value]');
            
            $datos=$this->Model_Personal->GetPersonal('R', $skip, $numberRow, $valueSearch);
            $cantidadDatos=$this->Model_Personal->CountPersonalParaPaginacion('X', $valueSearch);

            echo '{ "recordsTotal" : '.$cantidadDatos[0]->cantidad.', "recordsFiltered" : '.$cantidadDatos[0]->cantidad.', "data" : '.json_encode($datos).' }';
        }
        else
        {
            show_404();
        }
    }
     public function ListarPersonal()
    {
        if($this->input->is_ajax_request())
        {
            
            $Datos=$this->Model_Personal->ListarPersonalUsuario();
            echo json_encode($Datos);    
        }
        else
        {
            show_404();
        }
    }

    public function getcargo()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Cargo_Modal->getcargo();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //REGISTRAR NUEVA
    public function addcargo()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "C";
            $idcargo         = "0";
            $txt_nombrecargo = $this->input->post("txt_nombrecargo");
            if ($this->Cargo_Modal->addcargo($flat, $idcargo, $txt_nombrecargo) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }
    //REGISTRAR NUEVA
    public function updatecargo()
    {
        if ($this->input->is_ajax_request()) {
            $flat              = "U";
            $txt_idcargo_m     = $this->input->post("txt_idcargo_m");
            $txt_nombrecargo_m = $this->input->post("txt_nombrecargo_m");
            if ($this->Cargo_Modal->updatecargo($flat, $txt_idcargo_m, $txt_nombrecargo_m) == false) {
                echo "1";
            } else {
                echo "2";
            }
        } else {
            show_404();
        }
    }

    public function AddPersonal()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "C";
            $id_oficina      = $Cbx_Oficina      = $this->input->post("Cbx_Oficina");
            $nombres         = $txt_nombrepersonal         = $this->input->post("txt_nombrepersonal");
            $apellido_p      = $txt_apellidopaterno      = $this->input->post("txt_apellidopaterno");
            $apellido_m      = $txt_apellidomaterno      = $this->input->post("txt_apellidomaterno");
            $dni             = $txt_dni             = $this->input->post("txt_dni");
            $direccion       = $txt_direccion       = $this->input->post("txt_direccion");
            $telefonos       = $txt_telefono       = $this->input->post("txt_telefono");
            $correo          = $txt_correo          = $this->input->post("txt_correo");
            $grado_academico = $txt_gradoacademico = $this->input->post("txt_gradoacademico");
            $especialidad    = $txt_especialidad    = $this->input->post("txt_especialidad");
            $Cbx_especialidad= $Cbx_especialidad    = $this->input->post("Cbx_especialidad");
            $fecha_nac       = $date_fechanac       = $this->input->post("date_fechanac");

            if ($this->Model_Personal->AddPersonal($flat, $id_oficina, $nombres, $apellido_p, $apellido_m, $dni, $direccion, $telefonos, $correo, $grado_academico, $especialidad,$Cbx_especialidad, $fecha_nac) == false) {
                echo "Se añadio un  Personal";
            } else {
                echo "NO Se añadio  un Personal";
            }

        } else {
            show_404();
        }

    }
    public function UpdatePersonal()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "U";
            $id_oficina      = $cbxlistaoficinam      = $this->input->post("cbxlistaoficinam");
            $nombres         = $txt_nombrepersonalm         = $this->input->post("txt_nombrepersonalm");
            $apellido_p      = $txt_apellidopaternom      = $this->input->post("txt_apellidopaternom");
            $apellido_m      = $txt_apellidomaternom      = $this->input->post("txt_apellidomaternom");
            $dni             = $txt_dnim             = $this->input->post("txt_dnim");
            $direccion       = $txt_direccionm       = $this->input->post("txt_direccionm");
            $telefonos       = $txt_telefonom       = $this->input->post("txt_telefonom");
            $correo          = $txt_correom          = $this->input->post("txt_correom");
            $grado_academico = $txt_gradoacademicom = $this->input->post("txt_gradoacademicom");
            $especialidad    = $txt_especialidadm    = $this->input->post("txt_especialidadm");
            $fecha_nac       = $date_fechanacm       = $this->input->post("date_fechanacm");

            if ($this->Model_Personal->UpdatePersonal($flat, $id_oficina, $nombres, $apellido_p, $apellido_m, $dni, $direccion, $telefonos, $correo, $grado_academico, $especialidad, $fecha_nac) == false) {
                echo "Se actualizo correctamente el Personal";
            } else {
                echo "NO Se actualizo correctamente el Personal";
            }

        } else {
            show_404();
        }

    }
    /*fin Personal*/
    public function BuscarPersonaCargo()
    {
        if ($this->input->is_ajax_request()) {
            $text_buscarPersona = 'Formulador';
            $skip=$this->input->post('start');
            $numberRow=$this->input->post('length');
            $valueSearch=$this->input->post('search[value]');

            $datos = $this->Model_Personal->BuscarPersonaCargo($text_buscarPersona,$skip,$numberRow,$valueSearch);
            $CantidadData=$this->Model_Personal->CountPaginacionPersonaCargo($text_buscarPersona,$skip,$numberRow,$valueSearch);
            echo '{ "recordsTotal" : '.$CantidadData[0]->cantidad.', "recordsFiltered" : '.$CantidadData[0]->cantidad.', "data" : '.json_encode($datos).' }';
        } else {
            show_404();
        }

    }
/* Personal para actividad*/
    public function BuscarPersonaActividad()
    {
        if ($this->input->is_ajax_request()) {
            $skip        =$this->input->post('start');
            $numberRow   =$this->input->post('length');
            $valueSearch =$this->input->post('search[value]');
            $datos        = $this->Model_Personal->BuscarPersonaActividad($skip, $numberRow, $valueSearch);
            $CantidadData = $this->Model_Personal->CountPaginacionPersonaActividad($skip, $numberRow, $valueSearch);
            echo '{ "recordsTotal" : '.$CantidadData[0]->cantidad.', "recordsFiltered" : '.$CantidadData[0]->cantidad.', "data" : '.json_encode($datos).' }'; 

        } else {
            show_404();
        }

    }

    public function GetEspecilidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Personal->GetEspecilidad();
            echo json_encode($datos);
        } else {
            show_404();
        } 
    }
/* fin Personal actividad*/

    public function _load_layout($template)
    {
        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view($template);
        $this->load->view('layout/ADMINISTRACION/footer');
    }

    //cargo
    //-----------------------------------------------------------------------------------------------------------

}
