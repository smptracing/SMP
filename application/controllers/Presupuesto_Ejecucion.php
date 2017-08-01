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
    	$listaPresupuestoEjecucion=$this->Model_Presupuesto_Ejecucion->PresupuestoEjecucionListar();
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/PresupuestoEjecucion/index',['listaPresupuestoEjecucion'=>$listaPresupuestoEjecucion]);
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {

    	if($_POST)
        {
            $txtDescripcion=$this->input->post('txtDescripcion');
            $this->Model_Presupuesto_Ejecucion->insertar($txtDescripcion);            
            $this->session->set_flashdata('correcto', 'Presupuesto en Ejecucion registrado correctamente.');

            return redirect('/Presupuesto_Ejecucion');
        }

        $this->load->view('front/Ejecucion/PresupuestoEjecucion/insertar');
    }

    function editar()
    {
        
        if($this->input->post('hdId'))
        {
            $id=$this->input->post('hdId');

            $txtDescripcion=$this->input->post('txtDescripcion');

            $this->Model_Presupuesto_Ejecucion->editar($id, $txtDescripcion);
            
            $this->session->set_flashdata('correcto', 'Datos guardados correctamente.');

            return redirect('/Presupuesto_Ejecucion');
        }
        $id=$this->input->get('id');
        $presupuestoejecucion=$this->Model_Presupuesto_Ejecucion->PresupuestoEjecucion($id)[0];
        
        return $this->load->view('front/Ejecucion/PresupuestoEjecucion/editar',['presupuestoejecucion'=>$presupuestoejecucion]); 
    }

}