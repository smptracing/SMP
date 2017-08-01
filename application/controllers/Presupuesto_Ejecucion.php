<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuesto_Ejecucion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Model_Presupuesto_Ejecucion");   
	}
 public function index()
    {
        $flat  = "R";
    	$listaPresupuestoEjecucion=$this->Model_Presupuesto_Ejecucion->PresupuestoEjecucionListar($flat);
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/PresupuestoEjecucion/index',['listaPresupuestoEjecucion'=>$listaPresupuestoEjecucion]);
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {

    	if($_POST)
        {
            $flat  = "C";
            $txtDescripcion=$this->input->post('txtDescripcion');
            if(count($this->Model_Presupuesto_Ejecucion->EtPresupuestoEjecucionPorDescripcion($txtDescripcion))>0)
            {
                echo json_encode(['proceso' => 'Error', 'mensaje' => 'Este presupuesto de ejecución ya fue registrado con anterioridad.']);exit; 
            }
            $this->Model_Presupuesto_Ejecucion->insertar($flat,$txtDescripcion); 
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos registrados correctamente.']);exit;           
        }

        $this->load->view('front/Ejecucion/PresupuestoEjecucion/insertar');
    }

    function editar()
    {
        
        if($this->input->post('hdId'))
        {
            $flat  = "U";
            $id=$this->input->post('hdId');

            $txtDescripcion=$this->input->post('txtDescripcion');

            if(count($this->Model_Presupuesto_Ejecucion->EtPresupuestoEjecucionPorDescripcionDiffId($id, $txtDescripcion))>0)
            {
                echo json_encode(['proceso' => 'Error', 'mensaje' => 'Este presupuesto de ejecución ya fue registrado con anterioridad.']);exit; 
            }
            $this->Model_Presupuesto_Ejecucion->editar($flat,$id,$txtDescripcion);
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos actualizados correctamente.']);exit;  
        }
        $id=$this->input->get('id');
        $presupuestoejecucion=$this->Model_Presupuesto_Ejecucion->PresupuestoEjecucion($id)[0];
        
        return $this->load->view('front/Ejecucion/PresupuestoEjecucion/editar',['presupuestoejecucion'=>$presupuestoejecucion]); 
    }

    function eliminar()
    {
       
        if ($this->input->is_ajax_request()) 
        {
            $opcion="D";
            $id=$this->input->post('id_presupuesto_ej');
            $this->Model_Presupuesto_Ejecucion->eliminar($opcion,$id);
            echo json_encode($Data);
        }
    }   
}