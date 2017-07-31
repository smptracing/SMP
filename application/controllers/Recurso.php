<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recurso extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model("Model_Recurso");   
	}
 public function index()
    {
        $listaRecurso=$this->Model_Recurso->RecursoListar();
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/Recurso/index',['listaRecurso' => $listaRecurso]);
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {
        if($_POST)
        {
            $txtDescripcion=$this->input->post('txtDescripcion');
            $this->Model_Recurso->insertar($txtDescripcion);            
            $this->session->set_flashdata('correcto', 'Recurso registrado correctamente.');

            return redirect('/Recurso');
        }

        return $this->load->view('front/Ejecucion/Recurso/insertar');

    }
    public function editar()
    {
        if($this->input->post('hdId'))
        {
            $id=$this->input->post('hdId');

            $txtDescripcion=$this->input->post('txtDescripcion');

            $this->Model_Recurso->editar($id, $txtDescripcion);
            
            $this->session->set_flashdata('correcto', 'Datos guardados correctamente.');

            return redirect('/Recurso');
        }

        $id=$this->input->get('id');
        $recurso=$this->Model_Recurso->Recurso($id)[0];
        return $this->load->view('front/Ejecucion/Recurso/editar',['recurso'=>$recurso]);       
    }
}