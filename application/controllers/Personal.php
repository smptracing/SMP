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
        if ($this->input->is_ajax_request()) 
        {
            $c_data['id_oficina'] = $this->input->post("Cbx_Oficina");
            $c_data['nombres']= $this->input->post("txt_nombrepersonal");
            $c_data['apellido_p'] = $this->input->post("txt_apellidopaterno");
            $c_data['apellido_m'] =  $this->input->post("txt_apellidomaterno");
            $c_data['dni']= $this->input->post("txt_dni");
            $c_data['direccion'] = $this->input->post("txt_direccion");
            $c_data['telefonos'] = $this->input->post("txt_telefono");
            $c_data['correo']= $this->input->post("txt_correo");
            $c_data['grado_academico'] = $this->input->post("txt_gradoacademico");
            $c_data['especialidad'] = $this->input->post("txt_especialidad");
            $c_data['fecha_nac']= $this->input->post("date_fechanac");
            $c_data['id_esp'] = $this->input->post("Cbx_especialidad");
            $msg = array();

            $q1 = $this->Model_Personal->addPersona($c_data);

            $msg = ($q1>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
            $this->load->view('front/json/json_view', ['datos' => $msg]);
        } 
        else
        {
            show_404();
        }

    }
    public function UpdatePersonal()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "U";
            $id_oficina      = $cbxlistaoficinam      = $this->input->post("Cbx_OficinaModificar");
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
    public function EliminarPersonal()
    {
        if ($this->input->is_ajax_request()) {
            $flag=0;
            $msg="";
            $id_persona = $this->input->post("id_persona");

        if($this->Model_Personal->EliminarPersonal($id_persona)==true){
                $flag=0;
                $msg="registro Eliminado Satisfactoriamente";
            }
            else{
                $flag=1;
                $msg="No se pudo eliminar";
            }
                    $datos['flag']=$flag;
                    $datos['msg']=$msg;
                    echo json_encode($datos);
        }  else {
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
