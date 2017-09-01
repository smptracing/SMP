<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Presupuesto_Analitico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Expediente_Tecnico');
		$this->load->model('Model_ET_Presupuesto_Ejecucion');
		$this->load->model('Model_ET_Presupuesto_Analitico');
	}

	public function insertar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idClasificador=$this->input->post('idClasificador');
			$hd_id_et=$this->input->post('hd_id_et');
			$idPresupuestoEjecucion=$this->input->post('idPresupuestoEjecucion');

			if(count($this->Model_ET_Presupuesto_Analitico->verificarPresupuestoAnaliticoTipoClasi($hd_id_et,$idClasificador,$idPresupuestoEjecucion))>0)
			{
				$this->db->trans_rollback();
				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo Clasificador con el mismo Tipo.']);exit;
			}

			$opcion="INSERTAR";
			$dataListarAnalitico=$this->Model_ET_Presupuesto_Analitico->insertar($opcion,$idClasificador,$hd_id_et,$idPresupuestoEjecucion);

			$flat  = "R";
			$PresupuestoEjecucionListar=$this->Model_ET_Presupuesto_Ejecucion->PresupuestoEjecucionListar($flat);
			
			foreach ($PresupuestoEjecucionListar as $key => $value)
			{
				$value->ChilpresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoDetalles($hd_id_et,$value->id_presupuesto_ej);
			}
			$this->db->trans_complete();
			echo json_encode($PresupuestoEjecucionListar);exit;
		}

		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($this->input->get('idExpedienteTecnico'));
		
		$flat  = "R";
		$PresupuestoEjecucionListar=$this->Model_ET_Presupuesto_Ejecucion->PresupuestoEjecucionListar($flat);

		$opcion="LISTAR";
		$PresupuestoAnaliticoListar=$this->Model_ET_Presupuesto_Analitico->listar($opcion,$this->input->get('idExpedienteTecnico'));

		foreach ($PresupuestoEjecucionListar as $key => $value) 
		{
			$value->ChilpresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoDetalles($this->input->get('idExpedienteTecnico'),$value->id_presupuesto_ej);
		}

		$this->load->view('front/Ejecucion/ETPresupuestoAnalitico/insertar.php', ['expedienteTecnico' => $expedienteTecnico,'PresupuestoEjecucionListar' => $PresupuestoEjecucionListar,'PresupuestoAnaliticoListar' => $PresupuestoAnaliticoListar]);
	}

	public function eliminar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idClasiAnalitico=$this->input->post('idClasiAnalitico');
			if(count($this->Model_ET_Presupuesto_Analitico->VerificarAnalisisUnitario($idClasiAnalitico))>0)
			{
				$this->db->trans_rollback();
				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede eliminar el Clasificador ya se encuentra asociado en el modulo de  Analisis Unitario']);exit;
			}

			$PresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->eliminar($idClasiAnalitico);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Presupuesto analítico eliminada correctamente.']);exit;
		}

		$this->load->view('Front/Ejecucion/ETPartida/insertar');
	}

}