<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Ejecucion_Actividad extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('FormatNumber_helper');
    }

    function Insertar()
    {
        if($_POST)
        {

        }

        $meses = $this->listaMeses();
        
        $idActividad = $this->input->get('idActividad');
        $idPi = $this->input->get('idPi');
        $this->load->view('front/Monitoreo/Mo_Ejecucion_Actividad/insertar', ['idActividad' => $idActividad, 'idPi' => $idPi, 'meses' => $meses]); 
    }
    private function listaMeses()
    {
        $array = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
        return $array;
    }
}
