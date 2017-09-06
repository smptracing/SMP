<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FEActividadEntregable extends CI_Controller
{
/* Mantenimiento de division funcional y grupo funcional*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_FEActividadEntregable');

    }

    public function get_Actividades()
    {
        if ($this->input->is_ajax_request()) {
            $id_en = $this->input->post('id_en');
            $datos = $this->Model_FEActividadEntregable->get_Actividades($id_en);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }


    //mostra vance de la actividad
    public function MostrarAvance()
    {
        if ($this->input->is_ajax_request()) {
            $txt_id_entregable = $this->input->post('txt_id_entregable');
            $datos             = $this->Model_FEActividadEntregable->get_Actividades($txt_id_entregable);
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    //fin mostrar el abance  de la actividad

    public function Add_Actividades()
    {
        if ($this->input->is_ajax_request()) {
            $opcion                 = "c";
            $id_act                 = "0";
            $txt_id_entregable      = $this->input->post("txt_id_entregable");
            $txt_nombre_act         = $this->input->post("txt_nombre_act");
            $txt_valoracionEAc      = $this->input->post("txt_valoracionEAc");
            $txt_AvanceEAc          = 0;
            $txt_observacio_EntreAc = $this->input->post("txt_observacio_EntreAc");
            $txt_ActividadColor     = $this->input->post("txt_ActividadColor");

            $FechaActividad     = $this->input->post("FechaActividad");
            $Fechas = explode("-",$FechaActividad);
            
            $data = $this->Model_FEActividadEntregable->Add_Actividades($opcion,$id_act, $txt_id_entregable,$txt_nombre_act,$Fechas[0],$Fechas[1],$txt_valoracionEAc,$txt_AvanceEAc,$txt_observacio_EntreAc,$txt_ActividadColor);
            echo json_encode(['id_entregable'=>$txt_id_entregable]);exit;
        } else {
            show_404();
        }
    }

    public function Update_Actividades()
    {
        if ($this->input->is_ajax_request()) {
            $opcion                  = "u";
            $tx_IdActividad          = $this->input->post("tx_IdActividad");
            $txt_idEntregable        = $this->input->post("txt_idEntregable");
            $txt_NombreActividadAc   = $this->input->post("txt_NombreActividadAc");
            $txt_fechaActividadIAc   = $this->input->post("txt_fechaActividadIAc");
            $txt_fechaActividadfAc   = $this->input->post("txt_fechaActividadfAc");
            $txt_valorizacionEAct    = $this->input->post("txt_valorizacionEAct");
            $txt_avanceEAct          = $this->input->post("txt_avanceEAct");
            $txt_observacio_EntreAct = $this->input->post("txt_observacio_EntreAct");
            $txt_ActividadColorAc    = $this->input->post("txt_ActividadColorAc");

            $FechaActividadCalendar    = $this->input->post("FechaActividadCalendar");
            $FechasCalendar=explode('-',$FechaActividadCalendar);
            
            if ($this->Model_FEActividadEntregable->Update_Actividades($opcion,$tx_IdActividad,$txt_idEntregable,$txt_NombreActividadAc,$FechasCalendar[0],$FechasCalendar[1],$txt_valorizacionEAct,$txt_avanceEAct,$txt_observacio_EntreAct,$txt_ActividadColorAc) == false) {
                echo "Se actualizo una Actividad ";
            } else {
                echo " Se actualizo una Actividad ";
            }

        } else {
            show_404();
        }
    }
    public function CalcularAvanceActividad()
    {
//calcula el avance de la actividad asociado a un entregable
        if ($this->input->is_ajax_request()) {
            $tx_IdActividad   = $this->input->post("tx_IdActividad");
            $txt_idEntregable = $this->input->post("txt_idEntregable");
            $data             = $this->Model_FEActividadEntregable->CalcularAvanceActividad($tx_IdActividad,$txt_idEntregable);
            echo json_encode($data);

        } else {
            show_404();
        }
    }

    public function VerValoracionRestanteActividad()
    {
      if ($this->input->is_ajax_request()) {
            $id_entregable = $this->input->post('id_entregable');
            $datos             = $this->Model_FEActividadEntregable->VerValoracionRestanteActividad($id_entregable);
            echo json_encode($datos);
        } else {
            show_404();
        }  
    }

    //asignacion de personal
    public function AsignacionPersonalActividad()
    {
        if ($this->input->is_ajax_request()) {
            $Opcion                    = 'C';
            $txt_idActividadCronograma = $this->input->post("txt_idActividadCronograma");
            $txt_idPersonaActividad    = $this->input->post("txt_idPersonaActividad");
            $txt_AsigPersonalActividad = $this->input->post("txt_AsigPersonalActividad"); //fecha de asiganacion del responsable a actividad
            if ($this->Model_FEActividadEntregable->AsignacionPersonalActividad($Opcion,$txt_idActividadCronograma,$txt_idPersonaActividad,$txt_AsigPersonalActividad) == false) {
                echo "SE ASIGNO  UN NUEVO RESPONSABLE A LA ACTIVIDAD ";
            } else {
                echo "NO SE ASIGNO  UN NUEVO RESPONSABLE A LA ACTIVIDAD";
            }

        } else {
            show_404();
        }

    }
    //fin asignacion de personal
    public function ObservacionActividad()
    {
         if ($this->input->is_ajax_request()) 
         {
            
            $tx_IdActividadObser     = $this->input->post('tx_IdActividadObser');
            $txt_desco_obs           = $this->input->post('txt_desco_obs');
            $txt_fechaLevantaminetoObse     = $this->input->post('txt_fechaLevantaminetoObse');
            
            $config['upload_path']          = './uploads/cartera/';
            $config['allowed_types']        = 'pdf|doc|xml|docx|PDF|DOC|DOCX|xls|xlsx';
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['max_size']             = 15000;
            $config['encrypt_name']         = false;

            $this->load->library('upload',$config);
            if (! $this->upload->do_upload('Cartera_Resoluacion'))
               {
                                
                    $error="ERROR NO SE CARGO EL DOCUMENTO";
                    echo $error;
               }
                else
               {
                    
                    echo json_encode($txt_fechaLevantaminetoObse);
               }
         } 
    }

      public function ActualizarActividadEntregable()
    {
        /*if ($this->input->is_ajax_request()) 
        {
            $tx_idActividadEntregable =$this->input->post("tx_idActividadEntregable");
            $txt_idEntregableEstudio =$this->input->post("txt_idEntregableEstudio");
            $txt_NombreActividadEntreg =$this->input->post("txt_NombreActividadEntreg");
            $txt_fechaActividadInicial =$this->input->post("txt_fechaActividadInicial");
            $txt_fechaActividadfinal =$this->input->post("txt_fechaActividadfinal");
            $txt_valorizacionAct =$this->input->post("txt_valorizacionAct");
            $txt_avanceActividad =$this->input->post("txt_avanceActividad");
                if($this->Model_FEActividadEntregable->ActualizarActividad($txt_IdActividadEntregable,$txt_idEntregableEstudio,$txt_NombreActividadEntreg,$txt_fechaActividadfinal,$txt_valorizacionAct,$txt_avanceActividad) == false)
                echo "Se actualizo correctamente la actividad";
                else
                echo "No Se actualizo correctamente la actividad"; 
        }
        else
        {
            show_404();
        }*/
         if ($this->input->is_ajax_request()) {
            $opcion                  = "u";
            $tx_IdActividad          = $this->input->post("tx_IdActividad");
            $txt_idEntregable        = $this->input->post("txt_idEntregable");
            $txt_NombreActividadAc   = $this->input->post("txt_NombreActividadAc");
            $txt_fechaActividadIAc   = $this->input->post("txt_fechaActividadIAc");
            $txt_fechaActividadfAc   = $this->input->post("txt_fechaActividadfAc");
            $txt_valorizacionEAct    = $this->input->post("txt_valorizacionEAct");
            $txt_avanceEAct          = $this->input->post("txt_avanceEAct");
            $txt_observacio_EntreAct = $this->input->post("txt_observacio_EntreAct");
            $txt_ActividadColorAc    = $this->input->post("txt_ActividadColorAc");

            $FechaActividadCalendar    = $this->input->post("FechaActividadCalendar");
            $FechasCalendar=explode('-',$FechaActividadCalendar);
            
            if ($this->Model_FEActividadEntregable->Update_Actividades($opcion,$tx_IdActividad,$txt_idEntregable,$txt_NombreActividadAc,$FechasCalendar[0],$FechasCalendar[1],$txt_valorizacionEAct,$txt_avanceEAct,$txt_observacio_EntreAct,$txt_ActividadColorAc) == false) {
                echo "Se actualizo una Actividad ";
            } else {
                echo " Se actualizo una Actividad ";
            }

        } else {
            show_404();
        }
     
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
