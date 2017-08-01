<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CronogramaValorizacion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_CronogramaValorizacion');
	}

	public function index()
    {
      	$opcion="R";
      	$CronogramaValorizaciones=$this->Model_CronogramaValorizacion->CronogramaValorizacion_Listar($opcion);
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('Front/Ejecucion/CronogramaValorizacion/index',['CronogramaValorizaciones'=>$CronogramaValorizaciones]);
        $this->load->view('layout/Ejecucion/footer');
    }
	public function insertar()
	{
		if($_POST)
		{
			$option="C";
			$txtCronogramaValorizacion=$this->input->post('txtCronogramaValorizacion');
			if(count($this->Model_CronogramaValorizacion->ValidarCronogramaValorizacion($txtCronogramaValorizacion))>0)
            {
            	echo json_encode(['proceso' => 'error', 'mensaje' => 'Este dato fue registrado con anterioridado.']);exit;
            }

			$this->Model_CronogramaValorizacion->insertar($option,$txtCronogramaValorizacion);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'txtCronogramaValorizacion' => $txtCronogramaValorizacion]);exit;
		}
		$this->load->view('Front/Ejecucion/CronogramaValorizacion/insertar');
	}
	public function editar()
	{
		if($this->input->post('hdIdCronogramaValorizacion'))
		{	
			$option="U";
			$hdIdCronogramaValorizacion=$this->input->POST('hdIdCronogramaValorizacion');
			$txtCronogramaValorizacion=$this->input->POST('txtCronogramaValorizacion');
			if(count($this->Model_CronogramaValorizacion->ValidarDescripcionEtapaEditar($hdIdCronogramaValorizacion,$txtCronogramaValorizacion))>0)
            {
            	echo json_encode(['proceso' => 'error', 'mensaje' => 'Este tipo de gasto ya fue registrado con anterioridad .']);exit;
            }
			$CronogramaValoracion=$this->Model_CronogramaValorizacion->editar($option,$hdIdCronogramaValorizacion,$txtCronogramaValorizacion);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos Editados Correctamente.', 'txtCronogramaValorizacion' => $hdIdCronogramaValorizacion]);exit;

		}
		$id_valorizacion=$this->input->GET('id_valorizacion');
		$CronogramaValoracion=$this->Model_CronogramaValorizacion->NombreCronogranmaValoracion($id_valorizacion);
	    $this->load->view('Front/Ejecucion/CronogramaValorizacion/editar',['CronogramaValoracion'=>$CronogramaValoracion]);
	}
	
}