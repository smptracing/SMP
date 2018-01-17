<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PipProgramados extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PipProgramados_Model');        
        $this->load->helper('FormatNumber_helper');
    }
    //PIP
    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipProgramadosFormulacionEvaluacion()
    {
        if ($this->input->is_ajax_request()) {
            $flat = "listarpip_formulacion_evaluacion_programado";
           // para realizar una prueba con  $anio="2018";
            $anio = $this->input->post("anio");
          /*  if ($anio=="") {
                $anio=
              $data = $this->PipProgramados_Model->GetPipProgramadosFormulacionEvaluacion($flat, $anio);
            }*/
              $data = $this->PipProgramados_Model->GetPipProgramadosFormulacionEvaluacion($flat, $anio);  
            
         /*   foreach ($data as $key => $value) 
            {
                $value->Inv_2019 = a_number_format($value->Inv_2019 , 2, '.',",",3);
                $value->Inv_2020 = a_number_format($value->Inv_2020 , 2, '.',",",3);
                $value->Inv_2021 = a_number_format($value->Inv_2021 , 2, '.',",",3);
            }
            */
            echo json_encode(array('data' => $data));
        } else {
            show_404();
        }
    }
    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipProgramadosEjecucion()
    {
        if ($this->input->is_ajax_request()) 
        {
            $flat = "listarpip_ejecucion_programado";
            $anio = $this->input->post("anio");
            $data = $this->PipProgramados_Model->GetPipProgramadosEjecucion($flat, $anio);
          /*  foreach ($data as $key => $value) 
            {
                $value->Inv_2018 = a_number_format($value->Inv_2018 , 2, '.',",",3);
                $value->Inv_2019 = a_number_format($value->Inv_2019 , 2, '.',",",3);
                $value->Inv_2020 = a_number_format($value->Inv_2020 , 2, '.',",",3);
                $value->OyM_2018 = a_number_format($value->OyM_2018 , 2, '.',",",3);
                $value->OyM_2019 = a_number_format($value->OyM_2019 , 2, '.',",",3);
                $value->OyM_2020 = a_number_format($value->OyM_2020 , 2, '.',",",3);
            }*/
            echo json_encode(array('data' => $data));
        } 
        else 
        {
            show_404();
        }
    }

    //Listar proyectos programadsos en formulacion y evaluación
    public function GetPipOperacionMantenimiento()
    {
        if ($this->input->is_ajax_request()) 
        {
            $flat = "listarpip_operacionmantenimiento_programado";
            $anio = $this->input->post("anio");
            $data = $this->PipProgramados_Model->GetPipOperacionMantenimiento($flat, $anio);
           /* foreach ($data as $key => $value) 
            {
                $value->OpeMa_2018 = a_number_format($value->OpeMa_2018 , 2, '.',",",3);
                $value->OpeMa_2019 = a_number_format($value->OpeMa_2019 , 2, '.',",",3);
                $value->OpeMa_2020 = a_number_format($value->OpeMa_2020 , 2, '.',",",3);
            }*/
            echo json_encode(array('data' => $data));
        } 
        else 
        {
            show_404();
        }
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmpipprogramados');
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
        $this->load->view('Front/Pmi/js/jsPipProgramados.php');
    }

}
