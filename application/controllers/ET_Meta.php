<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Meta extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Meta');
		$this->load->model('Model_ET_Partida');
	}

	public function insertar()
	{
		$this->db->trans_start();

		$idComponente=$this->input->post('idComponente');
		$idMetaPadre=$this->input->post('idMetaPadre');
		$descripcionMeta=$this->input->post('descripcionMeta');

		if(count($this->Model_ET_Meta->ETMetaPorIdComponenteOrIdMetaPadreAndDescMeta($idComponente, $idMetaPadre, $descripcionMeta))>0)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos metas iguales en el mismo nivel.']);exit;
		}

		if($idComponente=='' && count($this->Model_ET_Partida->ETPartidaPorIdMeta($idMetaPadre))>0)
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar submeta al mismo nivel que una partida.']);exit;
		}

		$this->Model_ET_Meta->insertar(($idComponente=='' ? null : $idComponente), ($idMetaPadre=='' ? null : $idMetaPadre), $descripcionMeta);

		$ultimoIdMeta=$this->Model_ET_Meta->ultimoId();

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Meta registrada correctamente.', 'idMeta' => $ultimoIdMeta]);exit;
	}

	public function editarDescMeta()
	{
		$idMeta=$this->input->post('idMeta');
		$descripcionMeta=$this->input->post('descripcionMeta');

		$etMetaTemp=$this->Model_ET_Meta->ETMetaPorIdMeta($idMeta);

		if($this->Model_ET_Meta->existsDiffIdMetaAndSameDescripcion($etMetaTemp->id_componente, $idMeta, $etMetaTemp->id_meta_padre, $descripcionMeta))
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'Nombre de la meta existente.']);exit;
		}

		$this->Model_ET_Meta->updateDescMeta($idMeta, trim($descripcionMeta));

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Cambios guardados correctamente.']);exit;
	}

	public function eliminar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idMeta=$this->input->post('idMeta');

			$meta=$this->Model_ET_Meta->ETMetaPorIdMeta($idMeta);

			$this->eliminarMetaAnidada($meta);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Meta eliminada correctamente.']);exit;
		}

		$this->load->view('Front/Ejecucion/ETPartida/insertar');
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
	}
}