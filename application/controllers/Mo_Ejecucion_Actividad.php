<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Ejecucion_Actividad extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('FormatNumber_helper');
        $this->load->model('Model_Mo_Ejecucion_Actividad');
    }

    function Insertar()
    {
        if($_POST)
        {
            $msg = array();

            $existe = count($this->Model_Mo_Ejecucion_Actividad->verificarProgramacion($this->input->post('txtMes'),$this->input->post('txtAnio'),$this->input->post('hdIdActividad')));

            if($existe!=0)
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'Ya existe la Programación para esa fecha y año']);
                echo json_encode($msg);
                exit;
            }

            $c_data['mes_ejec']=$this->input->post('txtMes');
            $c_data['anio_ejec']=$this->input->post('txtAnio');
            $c_data['ejec_fisic_prog']=$this->input->post('txtFisica');
            $c_data['ejec_finan_prog']=floatval(str_replace(',','',$this->input->post('txtFinanc')));
            $c_data['fecha_registro']=date('Y-m-d');
            $c_data['id_actividad']=$this->input->post('hdIdActividad');
            
            $data = $this->Model_Mo_Ejecucion_Actividad->insertar($c_data);

            $msg = ($data != '' || $data != null ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente', 'idProgramacion' => $data ]) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;

        }

        $meses = $this->listaMeses();        
        $idActividad = $this->input->get('idActividad');
        $idPi = $this->input->get('idPi');
        $this->load->view('front/Monitoreo/Mo_Ejecucion_Actividad/insertar', ['idActividad' => $idActividad, 'idPi' => $idPi, 'meses' => $meses]); 
    }

    function editar()
    {
        if($_POST)
        {
            $msg = array();

            $existe = count($this->Model_Mo_Ejecucion_Actividad->verificarProgramacionDiferente($this->input->post('txtMes'),$this->input->post('txtAnio'),$this->input->post('hdIdActividad'),$this->input->post('hdIdEjecucion')));
            if($existe!=0)
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'Ya existe la programacion para ese mes.']);
                echo json_encode($msg);
                exit;
            } 

            $c_data['mes_ejec']=$this->input->post('txtMes');
            $c_data['anio_ejec']=$this->input->post('txtAnio');
            $c_data['ejec_fisic_prog']=$this->input->post('txtFisica');
            $c_data['ejec_finan_prog']=floatval(str_replace(',','',$this->input->post('txtFinanc')));
            $c_data['fecha_modificacion']=date('Y-m-d');

            $data = $this->Model_Mo_Ejecucion_Actividad->editar($c_data,$this->input->post('hdIdEjecucion'));            
            $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron editados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;

        }

        $programacion=$this->Model_Mo_Ejecucion_Actividad->verprogramacion($this->input->get('idEjecucion'));
        $meses = $this->listaMeses();  
        $this->load->view('front/Monitoreo/Mo_Ejecucion_Actividad/editar', ['programacion' => $programacion, 'meses' => $meses]);
    }

    function eliminar()
    {
        $msg = array();
        $data = $this->Model_Mo_Ejecucion_Actividad->eliminar($this->input->post('idEjecucion'));
        $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'La Programación ha sido eliminada con exito']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
        echo json_encode($msg);exit;
    }

    private function listaMeses()
    {
        $array = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre');
        return $array;
    }
}
