<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioG extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioGeneral');
		$this->load->model('Model_Funcion');
		$this->load->model('Model_CriterioEspecifico');
		$this->load->library('mydompdf');

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

			$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($txtIdFuncion,$txtAnioCriterioG);

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'listaCritetioGeneral' => $listaCritetioGeneral]);exit;
		}

		$anio =$this->input->GET('anio');
		$id_funcion=$this->input->GET('id_funcion');
		$nombre_funcion=$this->input->GET('nombre_funcion');

		$function=$this->Model_Funcion->GetFuncion();

		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio);

		$this->load->view('front/Pmi/CriteriosGenerales/insertar',['function' => $function,'id_funcion' => $id_funcion,'nombre_funcion'=> $nombre_funcion,'listaCritetioGeneral' => $listaCritetioGeneral,'anio' => $anio]);
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
		 	echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos editados  correctamente.', 'id_funcion' => $id_funcion,'anio' => $txtAnioCriterioG]);exit;

		 }

		 $id_criterio_gen=$this->input->get('idCriterioGeneral');
		 $listadoUnicoCGeneral=$this->Model_CriterioGeneral->listadoUnicoCGeneral($id_criterio_gen);

		 $function=$this->Model_Funcion->GetFuncion();

		 $this->load->view('front/Pmi/CriteriosGenerales/modificar',['listadoUnicoCGeneral' => $listadoUnicoCGeneral,'function' => $function,'id_criterio_gen' => $id_criterio_gen]);
	}

	public function eliminar()
	{
		if($_POST)
		{
			$id_criterio_gen=$this->input->post('idCriterioGeneral');
			$id_funcion =$this->input->post('id_funcion');
			$anio_criterio_gen=$this->input->post('anio_criterio_gen');
			$listarCriterioEsp=$this->Model_CriterioGeneral->virificarCriterioEspe($id_criterio_gen);
			if(count($listarCriterioEsp)=='')
			{
				$this->Model_CriterioGeneral->eliminar($id_criterio_gen);
				$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio_criterio_gen);
				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Se elimino el criterio General', 'listaCritetioGeneral' => $listaCritetioGeneral]);exit;
			}else
			{

				$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio_criterio_gen);
				echo json_encode(['proceso' => 'Error', 'mensaje' =>'No es posible eliminar el criterio General,tiene criterios especificos', 'listaCritetioGeneral' => $listaCritetioGeneral]);exit;
			}
			
		}
	}

	public function ReporteCriteriosG($idfuncio_anio)
	{
		$cadena = $idfuncio_anio;
		$array = explode(".", $cadena);

		 $id_funcion=$array[0];
		 $anio_criterio_gen=$array[1];
		
		 $listarfuncion=$this->Model_CriterioEspecifico->listarFuncion($anio_criterio_gen,$id_funcion);
	
		foreach ($listarfuncion as $key => $value) 
			    {

						$value->childCriteriGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($value->id_funcion,$anio_criterio_gen);
						foreach ($value->childCriteriGeneral as $index => $item) 
						{
								$item->childEspecificos=$this->Model_CriterioEspecifico->ListarCriterioEspecifico($item->id_criterio_gen);
						}
					
			    }
		$html= $this->load->view('front/Pmi/CriteriosGenerales/reporteCriteriosGeneralesEspecificos', ["listarfuncionCriterioGeneral" => $listarfuncion], true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper('letter', 'landscape');
		$this->mydompdf->render();
		$this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css

		$this->mydompdf->stream("reporteAnalisisPreciosFF11.pdf", array("Attachment" => false));
	}
	public function index($año=0){
		$listaCriterioGen=$this->Model_CriterioGeneral->CriteriosGenerales();

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/index',['listaCriterioGen'=>$listaCriterioGen]);
		$this->load->view('layout/PMI/footer');	
	}


	public function criterioFuncion($anio=''){
		$listaCriterioFuncion=$this->Model_CriterioGeneral->CriteriosGeneralesPorFuncion($anio);
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/CriteriosGenerales/criteriosFuncion',['listaCriterioFuncion'=>$listaCriterioFuncion,'anio' => $anio]);
		$this->load->view('layout/PMI/footer');	
	}
	
}
