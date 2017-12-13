<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Monitoreo extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Producto');
        $this->load->model('Model_Mo_Actividad');
        $this->load->model('Model_Mo_Ejecucion_Actividad');
        $this->load->model('Model_Mo_Monitoreo');
        $this->load->helper('FormatNumber_helper');
    }

    function index()
    {
        if($_POST)
        {

        }
        $idPi = $this->input->get('id_pi');
        $proyecto = $this->Model_Mo_Producto->ProyectoPorId($idPi);
        $producto = $this->Model_Mo_Producto->listaProducto($idPi);       

        foreach ($producto as $key => $value) 
        {
            $value->childActividad = $this->Model_Mo_Actividad->listaActividad($value->id_producto);
            foreach ($value->childActividad as $key => $actividad) 
            {
                $totalEjFisProg = 0;
                $totalEjFisReal = 0;
                $totalEjFinProg = 0;
                $totalEjFinReal = 0;
                $actividad->childProgramacion = $this->Model_Mo_Ejecucion_Actividad->listaEjecucionActividad($actividad->id_actividad);
                foreach ($actividad->childProgramacion  as $key => $programacion)
                {
                    $totalEjFisProg += $programacion->ejec_fisic_prog;
                    $totalEjFinProg += $programacion->ejec_finan_prog;
                    $totalEjFisReal += ($programacion->ejec_fisic_real == NULL ? 0 : $programacion->ejec_fisic_real);
                    $totalEjFinReal += ($programacion->ejec_finan_real == NULL ? 0 : $programacion->ejec_finan_real);
                }
                $actividad->totalEjFisProg = $totalEjFisProg;
                $actividad->totalEjFisReal = $totalEjFisReal;
                $actividad->totalEjFinProg = $totalEjFinProg;
                $actividad->totalEjFinReal = $totalEjFinReal;
            }
        }
        
        $this->load->view('front/Monitoreo/Mo_Monitoreo/index', ['proyecto' => $proyecto, 'producto'=>$producto]);
    }

    function verresultado()
    {
        if ($_POST) 
        {

        }
        $nombreActividad = $this->input->get('nombreActividad');
        $ejecucion = $this->Model_Mo_Ejecucion_Actividad->verprogramacion($this->input->get('idEjecucion'));
        $this->load->view('front/Monitoreo/Mo_Monitoreo/resultado',['actividad'=>$nombreActividad, 'ejecucion' => $ejecucion]);
    }
    function insertar()
    {
        if($_POST)
        {
            $msg = array();

            $data['ejec_fisic_real']=$this->input->post('txtEjFisReal');
            $data['ejec_finan_real']=floatval(str_replace(',','',$this->input->post('txtEjFinReal')));
            $data['fecha_modificacion']=date('Y-m-d');

            $query1=$this->Model_Mo_Ejecucion_Actividad->editar($data,$this->input->post('hdIdEjecucion'));

            $Monitoreo['desc_monitoreo']=$this->input->post('txtResultado');
            $Monitoreo['fecha_registro']=date('Y-m-d');
            $Monitoreo['id_ejecucion']=$this->input->post('hdIdEjecucion');

            $query2=$this->Model_Mo_Monitoreo->insertar($Monitoreo);

            $msg = ($query2 != ''  ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;

        }
    }
}
