<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_Gasto_Analitico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model("Model_Tipo_Gasto_Analitico");  
	}
 public function index()
    {
        $listaTipoGastoAnalitico=$this->Model_Tipo_Gasto_Analitico->TipoGastoAnaliticoListar();
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/TipoGastoAnalitico/index',['listaTipoGastoAnalitico'=>$listaTipoGastoAnalitico]);
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {
        if($_POST)
        {
            $txtDescripcion=$this->input->post('txtDescripcion');
            $this->Model_Tipo_Gasto_Analitico->insertar($txtDescripcion);            
            $this->session->set_flashdata('correcto', 'Tipo gasto analitico registrado correctamente.');

            return redirect('/Tipo_Gasto_Analitico');
        }

        return $this->load->view('front/Ejecucion/TipoGastoAnalitico/insertar');
    }

    public function editar()
    {
        if($this->input->post('hdId'))
        {
            $id=$this->input->post('hdId');

            $txtDescripcion=$this->input->post('txtDescripcion');

            $this->Model_Tipo_Gasto_Analitico->editar($id, $txtDescripcion);
            
            $this->session->set_flashdata('correcto', 'Datos guardados correctamente.');

            return redirect('/Tipo_Gasto_Analitico');
        }

        $id=$this->input->get('id');
        $tipogastoanalitico=$this->Model_Tipo_Gasto_Analitico->TipoGastoAnalitico($id)[0];
        return $this->load->view('front/Ejecucion/TipoGastoAnalitico/editar',['tipogastoanalitico'=>$tipogastoanalitico]);       
    }
}