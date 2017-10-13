<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PuntajeCriterioPi extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_PuntajeCriterioPi');
		$this->load->model('Model_CriterioGeneral');
		$this->load->model('Model_CriterioEspecifico');


	}
	public function index($funcion=''){	

		$listarFuncion=$this->Model_PuntajeCriterioPi->FuncionPip();
		$listaPipPriorizar=$this->Model_PuntajeCriterioPi->PipPriorizar($funcion);

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/index',['listaPipPriorizar'=>$listaPipPriorizar,'listarFuncion'=>$listarFuncion,'id_funcion'=>$funcion]);
		$this->load->view('layout/PMI/footer');	
	}

	public function insertar()
	{
		if($_POST)
		{
			$txtIdPi=$this->input->post('txtIdPi');	

			$sumaPesoTotalGeberalCriterio=$this->input->post('sumaPesoTotalGeberal');
			$idcombocriteriogeneral=$this->input->post('combocriteriogeneral');

			$listadoUnicoCGeneral=$this->Model_CriterioGeneral->listadoUnicoCGeneral($idcombocriteriogeneral);

			$porcentajeCriterioGene=((int)$listadoUnicoCGeneral->peso_criterio_gen*(100))/($sumaPesoTotalGeberalCriterio);

			$SumaTotaCriterio=$this->input->post('SumaTotaCriterio');	
			$combocriterioespecif=$this->input->post('combocriterioespecif');

			$fechaA=date("Y-m-d");
			$cadena=explode('-', $fechaA);
			$anio=$cadena[0];

                for($i=0;$i<count($combocriterioespecif);$i++){

                	$CriterioEspecifico=$this->Model_CriterioEspecifico->criterioEspecifico($combocriterioespecif[$i]);

                	$porcentajeCriterioEpe=((int)$CriterioEspecifico->peso*100)/(int)$SumaTotaCriterio;

                	$puntajeFinal=((int)$porcentajeCriterioGene*(int)$porcentajeCriterioEpe)/100;

                	$resuPuntajeCriterio=(int)$CriterioEspecifico->peso*round($puntajeFinal,2);

                	$this->Model_PuntajeCriterioPi->insertar(round($resuPuntajeCriterio,0),$anio,$txtIdPi,$CriterioEspecifico->id_criterio);

                }

            $listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($txtIdPi);
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos registrados correctamente.', 'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip]);exit;

		}

		$fechaA=date("Y-m-d");
		$cadena=explode('-', $fechaA);
		$anio=$cadena[0];

		$id_funcion=$this->input->Get('id_funcion');
		$id_pi=$this->input->Get('id_pi');

		$anio=$cadena[0];
		$listaCritetioGeneral=$this->Model_CriterioGeneral->ListarCriterioGenerales($id_funcion,$anio);
		$sumaPesoTotalGeberal=0;
		foreach ($listaCritetioGeneral as  $value) {
			$sumaPesoTotalGeberal= (int)$sumaPesoTotalGeberal+(int)$value->peso_criterio_gen;
		}

		$listaUnicaProIv=$this->Model_PuntajeCriterioPi->proyectoInvUnico($id_pi);

		 $listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($id_pi);
		$this->load->view('front/Pmi/PuntajeCriterioPi/insertar',['listaUnicaProIv' =>$listaUnicaProIv,'listaCritetioGeneral' => $listaCritetioGeneral,'sumaPesoTotalGeberal' =>$sumaPesoTotalGeberal,'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip,'id_funcion' =>$id_funcion]);

	}

	public function pipPriorizadas(){

		$this->load->view('layout/PMI/header');
		$this->load->view('front/Pmi/PuntajeCriterioPi/pipPriorizadas');
		$this->load->view('layout/PMI/footer');	
	}

	public function eliminarPuntajecriterio()
	{
		$id_pi=$this->input->post('id_pi');
		$id_ptje_criterio=$this->input->post('id_ptje_criterio');
		$this->Model_PuntajeCriterioPi->eliminarPuntajecriterio($id_ptje_criterio);

		$listarPuntajeCriterioPip=$this->Model_PuntajeCriterioPi->listarPuntajePip($id_pi);
		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos Eliminados correctamente.', 'listarPuntajeCriterioPip' => $listarPuntajeCriterioPip]);exit;

	}


	
}
