<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioG extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioGeneral');
		$this->load->model('Model_Funcion');
	}
	public function insertar()
	{
		if($_POST)
		{
			$txtNombreCriterio=$this->input->post('txtNombreCriterio');
			$txtAnioCriterioG=$this->input->post('txtAnioCriterioG');
			$txtPesoCriterioG=$this->input->post('txtPesoCriterioG');
			$txtIdFuncion=$this->input->post('txtIdFuncion');
			$this->Model_CriterioGeneral->insert($txtNombreCriterio,$txtPesoCriterioG,$txtAnioCriterioG,$txtIdFuncion);

			$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($txtIdFuncion);

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'listaCritetioGeneral' => $listaCritetioGeneral]);exit;
		}

		$id_funcion=$this->input->GET('id_funcion');
		$nombre_funcion=$this->input->GET('nombre_funcion');

		$function=$this->Model_Funcion->GetFuncion();

		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion);

		$this->load->view('front/Pmi/CriteriosGenerales/insertar',['function' => $function,'id_funcion' => $id_funcion,'nombre_funcion'=> $nombre_funcion,'listaCritetioGeneral' => $listaCritetioGeneral]);
	}

	public function editar()
	{
		 if($_POST)
		 {

		 	$hdIdcriterioGeneral=$this->input->post('hdIdcriterioGeneral');
		 	$txtNombreCriterio=$this->input->post('txtNombreCriterio');
		 	$txtPesoCriterioG=$this->input->post('txtPesoCriterioG');
			$txtAnioCriterioG=$this->input->post('txtAnioCriterioG');
			$listaCritetioGeneral=$this->Model_CriterioGeneral->Editar($hdIdcriterioGeneral,$txtNombreCriterio,$txtPesoCriterioG,$txtAnioCriterioG);
			
		 	$id_funcion=$this->input->post('cbx_funcion');
		 	echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos editados  correctamente.', 'id_funcion' => $id_funcion]);exit;

		 }

		 $id_criterio_gen=$this->input->get('idCriterioGeneral');
		 $listadoUnicoCGeneral=$this->Model_CriterioGeneral->listadoUnicoCGeneral($id_criterio_gen);

		 $function=$this->Model_Funcion->GetFuncion();

		 $this->load->view('front/Pmi/CriteriosGenerales/modificar',['listadoUnicoCGeneral' => $listadoUnicoCGeneral,'function' => $function]);
	}
	public function index(){
		$listaCriterioGen=$this->Model_CriterioGeneral->CriteriosGenerales();
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/index',['listaCriterioGen'=>$listaCriterioGen]);
		$this->load->view('layout/PMI/footer');	
	}


	public function criterioFuncion(){
		$listaCriterioFuncion=$this->Model_CriterioGeneral->CriteriosGeneralesPorFuncion();
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/criteriosFuncion',['listaCriterioFuncion'=>$listaCriterioFuncion]);
		$this->load->view('layout/PMI/footer');	
	}
	
}
