<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_Gasto_FE extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	$this->load->model('Model_TipoGastoFE');
	}

	public function index()
	{
		$ListaTipoGastoFE=$this->Model_TipoGastoFE->ListarTipoGastoFE();
		
		$this->load->view('layout/Formulacion_Evaluacion/header');
		$this->load->view('Front/PresupuestoEstudioInversion/TipoGastoFE/index', ['ListaTipoGastoFE' => $ListaTipoGastoFE]);
		$this->load->view('layout/Formulacion_Evaluacion/footer');
	}

	public function insertar()
	{
		if($_POST)
		{
			$txt_descripcion_tipo =$this->input->post("txt_descripcion_tipo");

	    	$Data=$this->Model_TipoGastoFE->insertar($txt_descripcion_tipo);

	    	$this->session->set_flashdata('correcto', 'Se registró correctamente');

	    	return redirect('/Tipo_Gasto_FE'); 	
		}

	    return $this->load->view('Front/PresupuestoEstudioInversion/TipoGastoFE/insertar');
	}
	
	public function editar()
	{
		if($this->input->post('hdId'))
		{
			$id=$this->input->post("hdId");
			$txt_descripcion_tipo=$this->input->post("txt_descripcion_tipo");

	    	$Data=$this->Model_TipoGastoFE->editar($id,$txt_descripcion_tipo);

	    	$this->session->set_flashdata('correcto', 'Se modificó correctamente');

	    	return redirect('/Tipo_Gasto_FE'); 	
		}

		$id=$this->input->post('id');

		$TipoGastoFE=$this->Model_TipoGastoFE->TipoGastoFE($id)[0];
	    
	    return $this->load->view('Front/PresupuestoEstudioInversion/TipoGastoFE/editar',['TipoGastoFE'=>$TipoGastoFE]);		
	}

	function _load_layout($template)
    {
		$this->load->view('layout/Formulacion_Evaluacion/header');
		$this->load->view($template);
		$this->load->view('layout/Formulacion_Evaluacion/footer');
    }
}