<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalReportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Dashboard_Reporte');
    }

    public function PrincipalReportes()
    {

        $this->_load_layout('Reportes');

    }


    public function GetAprobadosEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->GetAprobadosEstudio();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function NaturalezaInversionMontos()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->NaturalezaInversionMontos();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipFuenteFinancimiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipFuenteFinancimiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    public function MontoPipFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipFuenteFinanciamiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    
    public function CantidadPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipModalidad();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function MontoPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipModalidad();
            echo json_encode($datos);
        } else
        show_404();
    }
    public function CantidadPipRubro()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipRubro();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipProvincia()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipProvincia();
            foreach ($datos as $key => $Itemp) {
               $numpip[$key]=$Itemp->Cantidadpip;
            }
            echo json_encode($numpip);
        } else
        show_404();
    }

    public function FuncionNumeroPip()
    {
        if ($this->input->is_ajax_request()) 
        {
            $datos = $this->Model_Dashboard_Reporte->FuncionNumeroPip();
            echo json_encode($datos);
        } 
        else
        show_404();
    }

    function BuscadorPipPorCodigoReporte()
    {
            $CodigoUnico=$this->input->get('codigounico');
            $BuscarPipCodigoReporte=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($CodigoUnico); //BUSCAR PIP
      
            //$devengado=[$BuscarPipCodigoReporte->pia_meta_pres,$BuscarPipCodigoReporte->pim_acumulado,$BuscarPipCodigoReporte->devengado_acumulado];
            echo  json_encode($BuscarPipCodigoReporte);
    }

    function  DatosParaEstadisticaAnualProyecto()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($codigounico);
        echo  json_encode($data);
    }

    function DatosEjecucionPresupuestal()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteEjecucionPresupuestal($codigounico);
        echo  json_encode($data);
    }

    function  ReporteDevengadoPiaPimPorPipGraficos()
    {
            $codigounico=$this->input->GET('codigounico');
            $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPipGraficos($codigounico);
            echo  json_encode($data);
    }

    public function _load_layout($template)
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view($template);
        $this->load->view('layout/Reportes/footer');
    }

}


