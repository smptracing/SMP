<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bancoproyectos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bancoproyectos_modal');
        $this->load->helper('FormatNumber_helper');
        $this->load->model('Model_PMI_ubicacion');

/******************************************************************/

        $this->load->model('Model_ProyectoInversion');
        $this->load->model('ESTADO_CICLO_PI_MODEL');
        $this->load->model('Model_RubroE');
        $this->load->model('Model_ModalidadE');

        $this->load->helper('Fecha_helper');

/******************************************************************/


/******************************************************************/

    }
    public function AddProyectos()
    {
        if ($this->input->is_ajax_request()) 
        {
            //proyecto_inversion
            $c_data['id_ue'] = $this->input->post("cbxUnidadEjecutora");
            $c_data['id_naturaleza_inv'] = $this->input->post("cbxNatI");
            $c_data['id_tipologia_inv'] = $this->input->post("cbxTipologiaInv");
            $c_data['id_tipo_inversion'] = 1;
            $c_data['id_grupo_funcional'] = $this->input->post("cbxGrupoFunc");
            $c_data['id_nivel_gob'] = $this->input->post("cbxNivelGob");
            $c_data['id_programa_pres'] = $this->input->post("cbxProgramaPres");
            $c_data['codigo_unico_pi'] = $this->input->post("txtCodigoUnico");
            $c_data['nombre_pi'] = $this->input->post("txtNombrePip");
            $c_data['costo_pi'] = floatval(str_replace(",","",$this->input->post("txtCostoPip")));
            $c_data['num_beneficiarios'] = $this->input->post("txt_beneficiarios");
            $c_data['fecha_registro_pi'] = date('Y-m-d h:i:s');
            $c_data['fecha_viabilidad_pi'] = $this->input->post("fecha_viabilidad");
            $c_data['id_uf'] = $this->input->post("lista_unid_form");
            $c_data['estado_pi'] = 1;

            //estado_ciclo_pi
           

            //rubro_pi
            $e_data['id_rubro'] = $this->input->post("cbxRubro");

            //modalidad_ejecucion_pi
            $f_data['id_modalidad_ejec'] = $this->input->post("cbxModalidadEjec");

            //flag and msg variables
            $flag = 0;
            $msg = [];

            //Let's start the fire
            $q1 = $this->Model_ProyectoInversion->Insert_pi_pip($c_data);

             if( $q1 > 0){

                //INSERT estado_ciclo_pi
                $d_data['id_pi'] = $q1;
                 $d_data['id_estado_ciclo'] = $this->input->post("cbxEstCicInv_");
                $d_data['fecha_estado_ciclo_pi'] = date('Y-m-d h:i:s');
                if($this->ESTADO_CICLO_PI_MODEL->Insertar_ciclo($d_data) == FALSE){
                    $flag = 1;
                    $msg[] = 'Error: x001ci';
                }

                //INSERT rubro_pi
                $e_data['id_pi'] = $q1;
                $e_data['fecha_rubro_pi'] = date('Y-m-d h:i:s');
                if($this->Model_RubroE->Insertar_rubro($e_data) == 0){
                    $flag = 1;
                    $msg[] = 'Error: x001r';
                }

                //INSERT modalidad_ejecucion_pi
                $f_data['id_pi'] = $q1;
                $f_data['fecha_modalidad_ejec_pi'] = date('Y-m-d h:i:s');
                if($this->Model_ModalidadE->Insertar_modalidade($f_data) == FALSE){
                    $flag = 1;
                    $msg[] = 'Error: x001m';
                }
            }
            else
            {
                $flag = 1;
                $msg[] = 'Error x00q1';
            }


            $datos['flag'] = $flag;
            $datos['msg'] = $msg;
            // $datos['res'] = $q1;
            $data['datos'] = $datos;
            $this->load->view('front/json/json_view', $data);

        } 
        else 
        {
            show_404();
        }
    }
    /*INSERTAR UN NO PIP*/
    public function AddNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                = "IPCNOPIP";
            $id_pi               = "0";
            $cbxUnidadEjecutora  = $this->input->post("cbxUnidadEjecutora");
            $cbxNatI             = null;
            $cbxTipologiaInv     = null;
            $cbxTipoInv          = 2;
            $cbxGrupoFunc        = $this->input->post("cbxGrupoFunc");
            $cbxNivelGob         = $this->input->post("cbxNivelGob");
            $cbxProgramaPres     = null;
            $txtCodigoUnico      = $this->input->post("txtCodigoUnico");
            $txtNombrePip        = $this->input->post("txtNombrePip");
            $txtCostoPip         = floatval(str_replace(",", "", $this->input->post('txtCostoPip')));
            //$txtCostoPip         = $this->input->post("txtCostoPip");
            $txt_beneficiarios   = $this->input->post("txt_beneficiarios");
            $dateFechaInPip      = date('Y-m-d H:i:s');
            $dateFechaViabilidad = $this->input->post("fecha_viabilidad");
            $cbx_estado          = $this->input->post("cbx_estado");
            $cbxEstCicInv_       = $this->input->post("cbxEstCicInv_");
            $cbxRubro            = $this->input->post("cbxRubro");
            $cbxModalidadEjec    = $this->input->post("cbxModalidadEjec");
            $Cbx_TipoNoPip_i     = $this->input->post("Cbx_TipoNoPip_i");
            if ($this->bancoproyectos_modal->AddNoPip(
                $flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $cbx_estado, $cbxEstCicInv_, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_i) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    /*FIN INSERTAR UN PROYECTO*/
/* EDITAR PROYECTO NO PIP*/
    public function update_no_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "U_IPCNOPIP";
            $id_pi              = $this->input->post("txt_idNo_Pip");
            $cbxUnidadEjecutora = $this->input->post("cbxUnidadEjecutora_m");
            $cbx_tipo_no_pip_m = $this->input->post("cbx_tipo_no_pip_m");
            $cbxGrupoFunc      = $this->input->post("cbxGrupoFunc_m");
            $cbxNivelGob       = $this->input->post("cbxNivelGob_m");
            $txtCodigoUnico    = $this->input->post("txtCodigoUnico_m");
            $txtNombrePip      = $this->input->post("txtNombrePip_m");
            $txtCostoPip       = floatval(str_replace(",", "", $this->input->post('txtCostoPip_m')));
            $txt_beneficiarios = $this->input->post("txt_beneficiarios_m");
            $cbx_tipo_inversion = $this->input->post("cbxEstCicInv_m");
            $cbxEstado_pi       = $this->input->post("cbx_estado_m");
            $cbxRubro           = $this->input->post("cbxRubroEjecucion_m");
            $cbxModalidadEjec   = $this->input->post("cbxModalidadEjecucion_m");
            $Cbx_TipoNoPip_m    = $this->input->post("Cbx_TipoNoPip_m");
            if ($this->bancoproyectos_modal->update_no_pip(
                $flat, $id_pi, $cbxUnidadEjecutora, $cbx_tipo_no_pip_m, $cbxGrupoFunc, $cbxNivelGob, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $cbx_tipo_inversion, $cbxEstado_pi, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_m) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //update pip
    public function update_pip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                      = "U_IPCPIP";
            $txt_id_Pip_m              = $this->input->post("txt_id_Pip_m");
            $cbxUnidadEjecutora_m      = $this->input->post("cbxUnidadEjecutora_m");
            $cbxNatI_m                 = $this->input->post("cbxNatI_m");
            $cbxTipologiaInversion_m   = $this->input->post("cbxTipologiaInversion_m");
            $cbxGrupoFunc_m            = $this->input->post("cbxGrupoFunc_m");
            $cbxNivelGob_m             = $this->input->post("cbxNivelGob_m");
            $cbxProgramaPresupuestal_m = $this->input->post("cbxProgramaPresupuestal_m");
            $txtCodigoUnico_m          = $this->input->post("txtCodigoUnico_m");
            $txtNombrePip_m            = $this->input->post("txtNombrePip_m");
            $txtCostoPip_m             = floatval(str_replace(",","",$this->input->post("txtCostoPip_m")));
            $txt_beneficiarios_m       = $this->input->post("txt_beneficiarios_m");
            $fecha_viabilidad_m      = $this->input->post("fecha_viabilidad_m");
            $lista_unid_form_m       = $this->input->post("lista_unid_form_m");
            $cbx_estado_pi_m         = $this->input->post("cbx_estado_pi_m");
            $cbxEstCicInv_m          = $this->input->post("cbxEstCicInv_m");
            $cbxRubroEjecucion_m     = $this->input->post("cbxRubroEjecucion_m");
            $cbxModalidadEjecucion_m = $this->input->post("cbxModalidadEjecucion_m");
            if ($this->bancoproyectos_modal->update_pip(
                $flat, $txt_id_Pip_m, $cbxUnidadEjecutora_m, $cbxNatI_m, $cbxTipologiaInversion_m, $cbxGrupoFunc_m, $cbxNivelGob_m, $cbxProgramaPresupuestal_m, $txtCodigoUnico_m, $txtNombrePip_m, $txtCostoPip_m, $txt_beneficiarios_m,$fecha_viabilidad_m,  $lista_unid_form_m, $cbx_estado_pi_m, $cbxEstCicInv_m, $cbxRubroEjecucion_m, $cbxModalidadEjecucion_m) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }

//listar proyectos de inversion
    public function GetProyectoInversion()
    {
        if ($this->input->is_ajax_request())
        {
            $flat  = "LISTARPIP";
            $datos = $this->bancoproyectos_modal->GetProyectoInversion($flat);
            foreach ($datos as $key => $value)
            {
                $value->fecha_viabilidad_pi=date('d/m/Y', strtotime($value->fecha_viabilidad_pi));
                $value->fecha_viable=$value->fecha_registro_pi;
                $value->costo_pi = a_number_format($value->costo_pi , 2, '.',",",3);                
            }
            echo json_encode($datos);
        }
        else
        {
            show_404();
        }
    }
    //listar estado de un proyecto
    public function listar_estados()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_estados";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_estados($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar rubro pi tabla intermedia
    public function listar_rubro_pi()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_rubro_pi";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_rubro_pi($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //listar modalidad de ejecucion
    public function listar_modalidad_ejec()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_modalidades";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->listar_modalidad_ejec($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }

    public function eliminarModalidadPi()
    {
        if ($this->input->is_ajax_request())
        {
            $msg = array();

            $id_rubro_pi=$this->input->post("id_modalidad");
            $data=$this->bancoproyectos_modal->eliminarModalidadPi($id_rubro_pi);
            $msg=($data>0 ? (['proceso' => 'Correcto', 'mensaje' => 'Se elimino Correctamente la Modalidad de Ejecución']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado']));

            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }

        public function eliminarEstadoCiclo()
    {
        if ($this->input->is_ajax_request())
        {
            $msg = array();

            $id_estado_ciclo_pi=$this->input->post("id_estado_ciclo_pi");
            $data=$this->bancoproyectos_modal->eliminarEstadoCiclo($id_estado_ciclo_pi);
            $msg=($data>0 ? (['proceso' => 'Correcto', 'mensaje' => 'Se elimino Correctamente el Estado']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado']));

            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }
    //listar Rubro
    public function listar_rubro()
    {
        if ($this->input->is_ajax_request()) {
            $data = $this->bancoproyectos_modal->listar_rubro();
            echo json_encode($data);
        } else {
            show_404();
        }
    }
    //listar  de los estados de un py para poner en el combobox
    public function listar_estado()
    {
        if ($this->input->is_ajax_request())
        {
            $flat  = "R";
            $datos = $this->bancoproyectos_modal->listar_estado($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //listar ubigeo de un proyecto
    public function Get_ubigeo_pip()
    {
        if ($this->input->is_ajax_request())
        {
            $flat  = "listar_ubigeo";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_ubigeo_pip($flat, $id_pi);
            echo json_encode(array('data' => $data));
        }
        else
        {
            show_404();
        }
    }

    public function  eliminarUbigeo ()
    {
        if ($this->input->is_ajax_request())
        {
            $id_ubigeo_pi = $this->input->post("id_ubigeo_pi");

            $this->bancoproyectos_modal->eliminarUbigeo($id_ubigeo_pi);

            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Se elimino Correctamente el ubigeo.']);exit;

        } else {
            show_404();
        }
    }

    public function editarUbicacionGeografica()
    {
        if($_POST)
        {
            /*$this->db->trans_start();
            $opcion="U";
            $hdIdClasificadro=$this->input->post('hdIdClasificadro');
            $txtNumeroClasi=$this->input->post('txtNumeroClasi');
            $txtDescripcionClasi=$this->input->post('txtDescripcionClasi');
            $txtDetalleClasi=$this->input->post('txtDetalleClasi');
            if(count($this->Model_ET_Clasificador->ValidarClasificadorEtapaEditar($hdIdClasificadro,$txtDescripcionClasi))>0)
            {
                echo json_encode(['proceso' => 'error', 'mensaje' => 'Este tipo de descripcion ya fue registrado con anterioridad .']);exit;
            }
            $this->Model_ET_Clasificador->editar($opcion,$hdIdClasificadro,$txtNumeroClasi,$txtDescripcionClasi,$txtDetalleClasi);
            $this->db->trans_complete();
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos Editados Correctamente.', 'txtNumeroClasi' => $txtNumeroClasi]);exit;*/

        }
        $flat  = "listar_provincia";
        $provincias = $this->bancoproyectos_modal->listar_provincia($flat);

        $id_ubigeo_pi=$this->input->GET('id_ubigeo_pi');

        $detalleUbigeoPi =$this->bancoproyectos_modal->idUbigeoPI($id_ubigeo_pi);

        $id_ubigeo=$detalleUbigeoPi->id_ubigeo;

        $UbicacionPipProvinciDistrito=$this->Model_PMI_ubicacion->ListarPipProvinciDistrito($id_ubigeo);

        //$id_ubigeo_pi=$this->input->GET('id_ubigeo_pi');
       // $ETClasificador=$this->Model_ET_Clasificador->nombreClasificador($id_clasificador);
        $this->load->view('Front/Pmi/UbicacionPI/editar',['provincias' => $provincias,'detalleUbigeoPi'  => $detalleUbigeoPi, 'UbicacionPipProvinciDistrito' => $UbicacionPipProvinciDistrito]);
    }

    public function Add_ubigeo_proyecto()
    {
        if ($this->input->is_ajax_request())
        {
            $flag = 1;

            $c_data['id_ubigeo'] = $this->input->post("cbx_distrito");
            $c_data['id_pi']= $this->input->post("txt_id_pip");
            $c_data['direccion_ubigeo_pi'] = "NULL";
            $c_data['latitud'] = $this->input->post("txt_latitud");
            $c_data['longitud'] = $this->input->post("txt_longitud");

            $q1 = $this->bancoproyectos_modal->InsertarUbigeo_Pi($c_data);
            $datos = array();
            $msg = array();
            if($q1['filasAfectadas']>0)
            {
                $flag = 0;
                $config['upload_path']   = './uploads/ImgUbicacionProyecto/';
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']      = '2000';
                $config['max_width']     ='2024';
                $config['max_height']    = '2008';
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                $datos['q2'] = 1;
                if($this->upload->do_upload('ImgUbicacion'))
                {
                    $file_info = $this->upload->data();
                    $imagen = $file_info['file_name'];
                    $d_data['id_ubigeo_pi'] = $q1['ultimoId'];
                    $d_data['url_img']= $imagen;
                    $q2 = $this->Model_PMI_ubicacion->insertarUbigeoPiImg($d_data);
                    if($q2>0)
                    {
                        $datos['q2'] = 0;
                    }
                }
            }

            if($flag == 1)
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']);
            }
            if($flag==0 && $datos['q2'] == 0)
            {
                $msg = (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']);
            }
            if($flag==0 && $datos['q2'] == 1)
            {
               $msg = (['proceso' => 'Advertencia', 'mensaje' => 'ha ocurrido un error al subir la imagen ']);
            }
            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }

    public function Editar_ubigeo_proyecto()
    {


            $config['upload_path']   = './uploads/ImgUbicacionProyecto/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']      = '2000';
            $config['max_width']     ='2024';
            $config['max_height']    = '2008';
            $this->load->library('upload', $config);

            $this->upload->initialize($config);
             if (!$this->upload->do_upload('ImgUbicacionEditar')) {

                    $id_ubigeo_pi =  $this->input->post("txt_id_id_ubigeo_pi");
                    $id_ubigeo    = $this->input->post("cbx_distritoEditar");
                    $txt_latitudEditar  = $this->input->post("txt_latitudEditar");
                    $txt_longitudEditar = $this->input->post("txt_longitudEditar");
                    $this->bancoproyectos_modal->actualizar_ubigeo_proyecto($id_ubigeo_pi,$id_ubigeo , $txt_latitudEditar, $txt_longitudEditar);

              } else {

                    $id_ubigeo_pi =  $this->input->post("txt_id_id_ubigeo_pi");
                    $id_ubigeo    = $this->input->post("cbx_distritoEditar");
                    $txt_latitudEditar  = $this->input->post("txt_latitudEditar");
                    $txt_longitudEditar = $this->input->post("txt_longitudEditar");
                    $file_info = $this->upload->data();
                    $imagen = $file_info['file_name'];

                    if ($this->bancoproyectos_modal->actualizar_ubigeo_proyecto($id_ubigeo_pi,$id_ubigeo , $txt_latitudEditar, $txt_longitudEditar) == true) {


                        $dataId=$this->Model_PMI_ubicacion->id_ubigeo_pi_img($id_ubigeo_pi);
                        //var_dump($id_ubigeo_pi);
                        $this->Model_PMI_ubicacion->actualizar($dataId->id_ubigeo_pi_img,$imagen);

                        echo $id_ubigeo_pi;
                    }
            }


    }

    //Agregar estado ciclo
    public function AddEstadoCicloPI()
    {
        if ($this->input->is_ajax_request()) {
            $flat               = "C";
            $id_estado_ciclo_pi = "0";
            $txt_id_pip_Ciclopi = $this->input->post("txt_id_pip_Ciclopi");
            $Cbx_EstadoCiclo    = $this->input->post("Cbx_EstadoCiclo");
            $dateFechaIniC      = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddEstadoCicloPI($flat, $id_estado_ciclo_pi, $txt_id_pip_Ciclopi, $Cbx_EstadoCiclo, $dateFechaIniC) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //Agregar RUBRO PI
    public function AddRurboPI()
    {
        if ($this->input->is_ajax_request())
        {
            $c_data['id_rubro'] = $this->input->post("Cbx_RubroPI");
            $c_data['id_pi']= $this->input->post("txt_id_pip_RubroPI");
            $c_data['fecha_rubro_pi'] = $this->input->post("dateFechaIniC");
            $msg = array();
            $q1 = $this->bancoproyectos_modal->AgregarRubro($c_data);

            $msg = ($q1>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }

    public function AddModalidadEjecPI()
    {
        if ($this->input->is_ajax_request())
        {
            $c_data['id_modalidad_ejec'] = $this->input->post("Cbx_ModalidadEjec");
            $c_data['id_pi']= $this->input->post("txt_id_pip_ModalidadEjec");
            $c_data['fecha_modalidad_ejec_pi'] = date("Y-m-d H:i:s");
            $msg = array();

            $q1 = $this->bancoproyectos_modal->AgregarModalidadEjecucionPip($c_data);

            $msg = ($q1>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }
    //listar  de los estados de un py para poner en el combobox
    public function listar_provincia()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_provincia";
            $datos = $this->bancoproyectos_modal->listar_provincia($flat);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //listar modalidad de ejecucion
    public function listar_distrito()
    {
        if ($this->input->is_ajax_request()) {
            $flat            = "listar_distrito";
            $nombre_distrito = $this->input->post("nombre_distrito");
            $datos           = $this->bancoproyectos_modal->listar_distrito($flat, $nombre_distrito);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //------------------------------------------------------------  NO PIP
    //listar proyectos de inversion
    public function GetNOPIP()
    {
        if ($this->input->is_ajax_request())
        {
            $flat  = "LISTARNOPIP";
            $datos = $this->bancoproyectos_modal->GetNOPIP($flat);
            if(!$datos)
            {
                echo json_encode($datos);exit;
            }
            foreach ($datos as $key => $value)
            {
                $value->costo_pi = a_number_format($value->costo_pi , 2, '.',",",3);
            }
            echo json_encode($datos);exit;

        }
        else
        {
            show_404();
        }
    }
    //Agregar estado ciclo
    public function AddTipoNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat                 = "C";
            $id_tipo_NoPip        = "0";
            $txt_id_pip_Tipologia = $this->input->post("txt_id_pip_Tipologia");
            $Cbx_TipoNoPip        = $this->input->post("Cbx_TipoNoPip");
            // $dateFechaIniC            = $this->input->post("dateFechaIniC"); //esta campo se esta registrando en la base de datos
            if ($this->bancoproyectos_modal->AddTipoNoPip($flat, $id_tipo_NoPip, $Cbx_TipoNoPip, $txt_id_pip_Tipologia) == false) {
                echo "1";
            } else {
                echo "2";
            }

        } else {
            show_404();
        }
    }
    //listar los no pip con por tipos
    public function Get_TipoNoPip()
    {
        if ($this->input->is_ajax_request()) {
            $flat  = "listar_tipo_nopip";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_TipoNoPip($flat, $id_pi);
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    /*OPERACION Y MANTENIEMIENTO*/
    //listar operacion mantenimiento
    public function Get_OperacionMantenimiento()
    {

        if ($this->input->is_ajax_request())
        {
            $flat  = "listar_operacion_mantenimiento";
            $id_pi = $this->input->post("id_pi");
            $data  = $this->bancoproyectos_modal->Get_OperacionMantenimiento($flat, $id_pi);
            foreach ($data as $key => $value)
            {
                $value->monto_operacion = a_number_format($value->monto_operacion , 2, '.',",",3);
                $value->monto_mantenimiento = a_number_format($value->monto_mantenimiento , 2, '.',",",3);
            }
            echo json_encode(array('data' => $data));
        }
        else
        {
            show_404();
        }
    }

    //eliminar op y mant
    public function eliminarOperacionMantenimiento()
    {
        if ($this->input->is_ajax_request())
        {
            $id_operacion_mantenimiento_pi = $this->input->post("id_operacion_mantenimiento_pi");
            $extension = $this->bancoproyectos_modal->getOperacionyMantenimiento($id_operacion_mantenimiento_pi)->urlArchivo;
            $data = $this->bancoproyectos_modal->eliminarOperacionMantenimiento($id_operacion_mantenimiento_pi);
            $msg = array();
            if($data>0)
            {
                if (file_exists("uploads/ActaCompromisoOperacionyMantenimiento/".$id_operacion_mantenimiento_pi.".".$extension))
                {
                    unlink("uploads/ActaCompromisoOperacionyMantenimiento/".$id_operacion_mantenimiento_pi.".".$extension);
                }
                $msg = ($data>0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

                $this->load->view('front/json/json_view', ['datos' => $msg]);
            }
        }
        else
        {
            show_404();
        }
    }

    public function AddOperacionMantenimiento()
    {
        if ($this->input->is_ajax_request())
        {
            $nombreArchivo = $_FILES['fileActaCompromiso']['name'];
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

            $this->db->trans_start();

            $c_data['id_pi']=$this->input->post("txt_id_pip_OperMant");
            $c_data['monto_operacion']=floatval(str_replace(",","",$this->input->post("txt_monto_operacion")));
            $c_data['monto_mantenimiento']=floatval(str_replace(",","",$this->input->post("txt_monto_mantenimiento")));
            $c_data['responsable_operacion']=$this->input->post("txt_responsable_operacion");
            $c_data['responsable_mantenimiento']=$this->input->post("txt_responsable_mantenimiento");
            $c_data['urlArchivo']=$extension;

            $ultimoId = $this->bancoproyectos_modal->AgregarOperacionyMantenimiento($c_data);

            if($nombreArchivo != '' || $nombreArchivo != null)
            {
                $config['upload_path'] = './uploads/ActaCompromisoOperacionyMantenimiento/';
                $config['allowed_types'] = '*';
                $config['max_size'] = 50000;
                $config['max_width'] = 2000;
                $config['max_height'] = 2000;
                $config['file_name'] = $ultimoId;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('fileActaCompromiso'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('front/json/json_view',['datos' => $error]);
                }
            }

            $this->db->trans_complete();

            $msg = array();

            $msg = ($ultimoId != '' ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
            $this->load->view('front/json/json_view', ['datos' => $msg]);
        }
        else
        {
            show_404();
        }
    }

    public function BuscarProyectoSiaf()
    {

        $data  = $this->bancoproyectos_modal->BuscarProyectoSiaf($this->input->post('codigo'));
        echo json_encode($data);exit;

    }

    public function NoPip()
    {
        $this->_load_layout_NoPip('Front/Pmi/frmbancoproyectosNoPip');
    }
    public function _load_layout_NoPip($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsNoPip');
    }
    public function index()
    {
        $this->_load_layout('Front/Pmi/frmbancoproyectos');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsPip');
    }
    public function eliminarrubroPI()
    {
        if ($this->input->is_ajax_request())
        {
            $id_rubro_pi = $this->input->post("id_rubro_pi");

            $this->bancoproyectos_modal->eliminarrubroPI($id_rubro_pi);

            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Se elimino Correctamente el ubigeo.']);exit;

        } else {
            show_404();
        }
    }


}
