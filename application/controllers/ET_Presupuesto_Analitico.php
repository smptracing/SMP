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
		/*$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Componente');
		$this->load->model('Model_ET_Meta');
		$this->load->model('Model_ET_Partida');*/

	}

	public function insertar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idClasificador=$this->input->post('idClasificador');
			$hd_id_et=$this->input->post('hd_id_et');
			$idPresupuestoEjecucion=$this->input->post('idPresupuestoEjecucion');

			/*if(count($this->Model_ET_Componente->ETComponentePorIdETAndDescripcion($idET, $descripcionComponente))>0)
			{
				$this->db->trans_rollback();

				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo componente.']);exit;
			}*/
			$opcion="INSERTAR";
			$dataListarAnalitico=$this->Model_ET_Presupuesto_Analitico->insertar($opcion,$idClasificador,$hd_id_et,$idPresupuestoEjecucion);

			$opcion="LISTAR";
			$PresupuestoAnaliticoListar=$this->Model_ET_Presupuesto_Analitico->listar($opcion,$hd_id_et);
			$this->db->trans_complete();

			echo json_encode($PresupuestoAnaliticoListar);exit;
		}

		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($this->input->get('idExpedienteTecnico'));
		
		$flat  = "R";
		$PresupuestoEjecucionListar=$this->Model_ET_Presupuesto_Ejecucion->PresupuestoEjecucionListar($flat);

		$opcion="LISTAR";
		$PresupuestoAnaliticoListar=$this->Model_ET_Presupuesto_Analitico->listar($opcion,$this->input->get('idExpedienteTecnico'));

		$this->load->view('front/Ejecucion/ETPresupuestoAnalitico/insertar.php', ['expedienteTecnico' => $expedienteTecnico,'PresupuestoEjecucionListar' => $PresupuestoEjecucionListar,'PresupuestoAnaliticoListar' => $PresupuestoAnaliticoListar]);
	}

	/*private function obtenerMetaAnidada($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->obtenerMetaAnidada($value);
		}
	}

	public function eliminar()
	{
		$this->db->trans_start();

		$idComponente=$this->input->post('idComponente');

		$listaMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($idComponente);

		foreach($listaMeta as $key => $value)
		{
			$this->eliminarMetaAnidada($value);
		}

		$this->Model_ET_Componente->eliminar($idComponente);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Componente eliminado correctamente.']);exit;
	}

	private function eliminarMetaAnidada($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		foreach($temp as $key => $value)
		{
			$this->eliminarMetaAnidada($value);
		}

		if(count($temp)==0)
		{
			$this->Model_ET_Partida->eliminarPorIdMeta($meta->id_meta);
		}

		$this->Model_ET_Meta->eliminar($meta->id_meta);
	}*/
}