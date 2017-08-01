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
        $flat  = "R";
        $listaTipoGastoAnalitico=$this->Model_Tipo_Gasto_Analitico->TipoGastoAnaliticoListar($flat);
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/TipoGastoAnalitico/index',['listaTipoGastoAnalitico'=>$listaTipoGastoAnalitico]);
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {
        if($_POST)
        {
            $flat  = "C";
            $txtDescripcion=$this->input->post('txtDescripcion');

            if(count($this->Model_Tipo_Gasto_Analitico->EtTipoGastoPorDescripcion($txtDescripcion))>0)
            {
                echo json_encode(['proceso' => 'Error', 'mensaje' => 'Este tipo de gasto de ejecución ya fue registrado con anterioridad.']);exit; 
            }
            
            $this->Model_Tipo_Gasto_Analitico->insertar($flat,$txtDescripcion);            
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos registrados correctamente.']);exit;  
        }

        return $this->load->view('front/Ejecucion/TipoGastoAnalitico/insertar');
    }

    public function editar()
    {
        if($this->input->post('hdId'))
        {
            $flat  = "U";
            $id=$this->input->post('hdId');

            $txtDescripcion=$this->input->post('txtDescripcion');
            if(count($this->Model_Tipo_Gasto_Analitico->EtTipoGastoPorDescripcionDiffId($id, $txtDescripcion))>0)
            {
                echo json_encode(['proceso' => 'Error', 'mensaje' => 'Este presupuesto de ejecución ya fue registrado con anterioridad.']);exit;  
            }

            $this->Model_Tipo_Gasto_Analitico->editar($flat,$id,$txtDescripcion);
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos actualizados correctamente.']);exit; 
        }

        $id=$this->input->get('id');
        $tipogastoanalitico=$this->Model_Tipo_Gasto_Analitico->TipoGastoAnalitico($id)[0];
        return $this->load->view('front/Ejecucion/TipoGastoAnalitico/editar',['tipogastoanalitico'=>$tipogastoanalitico]);       
    }
}