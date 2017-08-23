<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Componente extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Expediente_Tecnico');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Componente');
		$this->load->model('Model_ET_Meta');
		$this->load->model('Model_ET_Partida');
	}

	private function updateNumerationComponent($idExpedienteTecnico)
	{
		$numberRoman=[0 => 'I', 1 => 'II', 2 => 'III', 3 => 'IV', 4 => 'V', 5 => 'VI', 6 => 'VII', 7 => 'VIII', 8 => 'IX', 9 => 'X', 10 => 'XI', 11 => 'XII', 12 => 'XIII', 13 => 'XIV', 14 => 'XV', 15 => 'XVI', 16 => 'XVII', 17 => 'XVIII', 18 => 'XIX', 19 => 'XX', 20 => 'XXI', 21 => 'XXII', 22 => 'XXIII', 23 => 'XXIV', 24 => 'XXV', 25 => 'XXVI', 26 => 'XXVII', 27 => 'XXVIII', 28 => 'XXIX', 29 => 'XXX', 30 => 'XXXI', 31 => 'XXXII', 32 => 'XXXIII', 33 => 'XXXIV', 34 => 'XXXV', 35 => 'XXXVI', 36 => 'XXXVII', 37 => 'XXXVIII', 38 => 'XXXIX', 39 => 'XL', 40 => 'XLI', 41 => 'XLII', 42 => 'XLIII', 43 => 'XLIV', 44 => 'XLV', 45 => 'XLVI', 46 => 'XLVII', 47 => 'XLVIII', 48 => 'XLIX', 49 => 'L', 50 => 'LI', 51 => 'LII', 52 => 'LIII', 53 => 'LIV', 54 => 'LV', 55 => 'LVI', 56 => 'LVII', 57 => 'LVIII', 58 => 'LIX', 59 => 'LX', 60 => 'LXI', 61 => 'LXII', 62 => 'LXIII', 63 => 'LXIV', 64 => 'LXV', 65 => 'LXVI', 66 => 'LXVII', 67 => 'LXVIII', 68 => 'LXIX', 69 => 'LXX', 70 => 'LXXI', 71 => 'LXXII', 72 => 'LXXIII', 73 => 'LXXIV', 74 => 'LXXV', 75 => 'LXXVI', 76 => 'LXXVII', 77 => 'LXXVIII', 78 => 'LXXIX', 79 => 'LXXX', 80 => 'LXXXI', 81 => 'LXXXII', 82 => 'LXXXIII', 83 => 'LXXXIV', 84 => 'LXXXV', 85 => 'LXXXVI', 86 => 'LXXXVII', 87 => 'LXXXVIII', 88 => 'LXXXIX', 89 => 'XC', 90 => 'XCI', 91 => 'XCII', 92 => 'XCIII', 93 => 'XCIV', 94 => 'XCV', 95 => 'XCVI', 96 => 'XCVII', 97 => 'XCVIII', 98 => 'XCIX', 99 => 'C'];

		$listaETComponente=$this->Model_ET_Componente->ETComponentePorIdET($idExpedienteTecnico);

		foreach($listaETComponente as $key => $value)
		{
			$this->Model_ET_Componente->updateNumeracionPorIdComponente($value->id_componente, $numberRoman[$key]);

			$listaETMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($listaETMeta as $index => $item)
			{
				$this->Model_ET_Meta->updateNumeracionPorIdMeta($item->id_meta, ($key+1).'.'.($index+1));

				$this->updateNumerationMetaAndChild($item, ($key+1).'.'.($index+1));
			}
		}
	}

	private function updateNumerationMetaAndChild($meta, $numeracionMetaActual)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);

			foreach($meta->childPartida as $key => $value)
			{
				$this->Model_ET_Partida->updateNumeracionPorIdPartida($value->id_partida, $numeracionMetaActual.'.'.($key+1));
			}

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->Model_ET_Meta->updateNumeracionPorIdMeta($value->id_meta, $numeracionMetaActual.'.'.($key+1));

			$this->updateNumerationMetaAndChild($value, $numeracionMetaActual.'.'.($key+1));
		}
	}

	public function insertar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idET=$this->input->post('idET');
			$descripcionComponente=$this->input->post('descripcionComponente');

			if(count($this->Model_ET_Componente->ETComponentePorIdETAndDescripcion($idET, $descripcionComponente))>0)
			{
				$this->db->trans_rollback();

				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo componente.']);exit;
			}

			$this->Model_ET_Componente->insertar($idET, $descripcionComponente);

			$ultimoIdComponente=$this->Model_ET_Componente->ultimoId();

			$this->updateNumerationComponent($idET);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Componente registrado correctamente.', 'idComponente' => $ultimoIdComponente]);exit;
		}

		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($this->input->get('idExpedienteTecnico'));
		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

		$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

		foreach($expedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidada($item);
			}
		}

		$this->load->view('front/Ejecucion/ETComponente/insertar.php', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida]);
	}

	public function editarDescComponente()
	{
		$idComponente=$this->input->post('idComponente');
		$descripcionComponente=$this->input->post('descripcionComponente');

		if($this->Model_ET_Componente->existsDiffIdComponenteAndSameDescripcion($idComponente, $descripcionComponente))
		{
			$this->db->trans_rollback();

			echo json_encode(['proceso' => 'Error', 'mensaje' => 'Nombre del componente existente.']);exit;
		}

		$this->Model_ET_Componente->updateDescComponente($idComponente, trim($descripcionComponente));

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Cambios guardados correctamente.']);exit;
	}

	private function obtenerMetaAnidada($meta)
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

		$idExpedienteTecnico=$this->Model_ET_Componente->ETComponentePorIdComponente($idComponente)->id_et;

		$this->Model_ET_Componente->eliminar($idComponente);

		$this->updateNumerationComponent($idExpedienteTecnico);

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
	}
}