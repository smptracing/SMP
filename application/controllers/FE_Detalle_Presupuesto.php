<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Detalle_Presupuesto extends CI_Controller
{
	public function __construct()
	{
    	parent::__construct();

    	$this->load->model('Model_Unidad_Medida');
    	$this->load->model('Model_FE_Tipo_Gasto');
	}

	public function insertar()
	{
		if($_POST)
		{
			
		}

		$listaTipoGasto=$this->Model_FE_Tipo_Gasto->ListarTipoGasto();
		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
		
	    $this->load->view('Front/PresupuestoEstudioInversion/DetallePresupuesto/insertar', ['listaTipoGasto' => $listaTipoGasto, 'listaUnidadMedida' => $listaUnidadMedida]);
	}
}