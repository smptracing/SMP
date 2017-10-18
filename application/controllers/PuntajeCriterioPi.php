<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntajeCriterioPi extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_PuntajeCriterioPi');
		$this->load->model('Model_CriterioGeneral');
		$this->load->model('Model_CriterioEspecifico');
		$this->load->library('mydompdf');


	}
	public function index($cadena=''){	

		
		if($cadena=='')
		{
			$fechaA=date("Y-m-d");
			$cadena=explode('-', $fechaA);
			$anioActual=$cadena[0];
			$funcion=11;
			$listarFuncion=$this->Model_PuntajeCriterioPi->FuncionPip();
			$listaPipPriorizar=$this->Model_PuntajeCriterioPi->PipPriorizar($funcion,$anioActual);
			$this->load->view('layout/PMI/header');
			$this->load->view('front/Pmi/PuntajeCriterioPi/index',['listaPipPriorizar'=>$listaPipPriorizar,'listarFuncion'=>$listarFuncion,'id_funcion'=>$funcion,'anioActual' => $anioActual]);
			$this->load->view('layout/PMI/footer');	
		}else{
			$listarFuncion=$this->Model_PuntajeCriterioPi->FuncionPip();
			$cadena=explode('.', $cadena);
			$funcion=$cadena[0];
			$anio=$cadena[1];
			$listaPipPriorizar=$this->Model_PuntajeCriterioPi->PipPriorizar($funcion,$anio);
			$this->load->view('layout/PMI/header');
			$this->load->view('front/Pmi/PuntajeCriterioPi/index',['listaPipPriorizar'=>$listaPipPriorizar,'listarFuncion'=>$listarFuncion,'id_funcion'=>$funcion,'anioActual' => $anio]);
			$this->load->view('layout/PMI/footer');	

		}
		
	}

	public function insertar()
	{
		if($_POST)
		{
			
			
			$anio=$this->input->post('anioPriorizacion');	

			$txtIdPi=$this->input->post('txtIdPi');	

			$sumaPesoTotalGeberalCriterio=$this->input->post('sumaPesoTotalGeberal');
			$idcombocriteriogeneral=$this->input->post('combocriteriogeneral');

			$listadoUnicoCGeneral=$this->Model_CriterioGeneral->listadoUnicoCGeneral($idcombocriteriogeneral);

			$porcentajeCriterioGene=((int)$listadoUnicoCGeneral->peso_criterio_gen*(100))/($sumaPesoTotalGeberalCriterio);

			$SumaTotaCriterio=$this->input->post('SumaTotaCriterio');	
			$combocriterioespecif=$this->input->post('combocriterioespecif');

			/*$fechaA=date("Y-m-d");
			$cadena=explode('-', $fechaA);
			$anio=$cadena[0];*/
			//$contarCriterioNoInse=count($combocriterioespecif);
			$contadorRegistro=0;
			$contadorNoRegistro=0;
                for($i=0;$i<count($combocriterioespecif);$i++){

                	if(count($this->Model_PuntajeCriterioPi->contarRegistrosDeUnCriterio($combocriterioespecif[$i],$anio,$txtIdPi))==0)
                	{
                		$CriterioEspecifico=$this->Model_CriterioEspecifico->criterioEspecifico($combocriterioespecif[$i]);

	                	$porcentajeCriterioEpe=((int)$CriterioEspecifico->peso*100)/(int)$SumaTotaCriterio;

	                	$puntajeFinal=((int)$porcentajeCriterioGene*(int)$porcentajeCriterioEpe)/100;

	                	$resuPuntajeCriterio=(int)$CriterioEspecifico->peso*round($puntajeFinal,2);

	                	$this->Model_PuntajeCriterioPi->insertar(round($resuPuntajeCriterio,0),$anio,$txtIdPi,$CriterioEspecifico->id_criterio);
	                	$contadorRegistro =(int)$contadorRegistro +1;
                	}else{

                		$contadorNoRegistro =(int)$contadorNoRegistro +1;
                	}
                	

                }

            $listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($txtIdPi,$anio);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Total Datos a Registra: '.count($combocriterioespecif).'.Registrados: '.$contadorRegistro.' No Registrados '.$contadorNoRegistro.' Por ser Repetidos los  Criterios Especificos.', 'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip]);exit;

		}

		$anio=$this->input->Get('anioActualPriorizacion');

		$id_funcion=$this->input->Get('id_funcion');
		$id_pi=$this->input->Get('id_pi');

		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio);
		$sumaPesoTotalGeberal=0;
		foreach ($listaCritetioGeneral as  $value) {
			$sumaPesoTotalGeberal= (int)$sumaPesoTotalGeberal+(int)$value->peso_criterio_gen;
		}

		$listaUnicaProIv=$this->Model_PuntajeCriterioPi->proyectoInvUnico($id_pi);

		$listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($id_pi,$anio);
		$this->load->view('front/Pmi/PuntajeCriterioPi/insertar',['listaUnicaProIv' =>$listaUnicaProIv,'listaCritetioGeneral' => $listaCritetioGeneral,'sumaPesoTotalGeberal' =>$sumaPesoTotalGeberal,'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip,'id_funcion' =>$id_funcion,'anio' => $anio]);

	}

	public function pipPriorizadas($anio=''){

		$listaPipPriorizadasPorAño=$this->Model_PuntajeCriterioPi->PipPriorizadasPorAño($anio);
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/pipPriorizadas',['listaPipPriorizadasPorAño'=>$listaPipPriorizadasPorAño,'anio' => $anio]);
		$this->load->view('layout/PMI/footer');	
	}

	public function pipPriorizadasPorFuncion()
	{
		$listarPipPorFuncion=$this->Model_PuntajeCriterioPi->FuncionPip();
		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/pipPriorizadasporFuncion',['listarPipPorFuncion'=>$listarPipPorFuncion]);
		$this->load->view('layout/PMI/footer');	
	}

	public function eliminarPuntajecriterio()
	{
		$anio=$this->input->post('anio');
		$id_pi=$this->input->post('id_pi');
		$id_ptje_criterio=$this->input->post('id_ptje_criterio');
		$this->Model_PuntajeCriterioPi->eliminarPuntajecriterio($id_ptje_criterio);

		$listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($id_pi,$anio);
		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos Eliminados correctamente.', 'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip]);exit;

	}

	public function reporteCriteriosPorCadaPi($idfuncion_anio)
	{
		$cadena = $idfuncion_anio;
		$array = explode(".", $cadena);

		 $id_funcion=$array[0];
		 $anio_criterio_gen=$array[1]; 

		$html= $this->load->view('front/Pmi/PuntajeCriterioPi/reporteCriteriosPorCadaPip');
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper('letter', 'landscape');
		$this->mydompdf->render();
		$this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css

		$this->mydompdf->stream("reporteCriteriosPorCadaPip.pdf", array("Attachment" => false));
	}

	
}
