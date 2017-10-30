<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Analisis_Unitario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Recurso');
		$this->load->model('Model_ET_Presupuesto_Analitico');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_ET_Etapa_Ejecucion');
		$this->load->model('Model_ET_Detalle_Partida');
		$this->load->model('Model_ET_Analisis_Unitario');
		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
	}

	public function insertar()
	{
		if($_POST)
		{
			$this->db->trans_start();

			$idAnalitico=$this->input->post('idAnalitico');
			$idRecurso=$this->input->post('idRecurso');
			$idDetallePartida=$this->input->post('idDetallePartida');

			if($this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdDetallePartidaAndIdRecurso($idDetallePartida, $idRecurso)!=null)
			{
				$this->db->trans_rollback();

				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede agregar dos veces el mismo recurso para el análisis unitario.']);exit;
			}

			$this->Model_ET_Analisis_Unitario->insertar(($idAnalitico==null || $idAnalitico=='') ? 'NULL' : $idAnalitico, $idRecurso, $idDetallePartida);

			$idAnalisis=$this->Model_ET_Analisis_Unitario->ultimoId();

			$partidaCompleta=$this->partidaEstaCompleta($idDetallePartida);

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Análisis unitario registrado correctamente.', 'idAnalisis' => $idAnalisis, 'idAnalitico' => $idAnalitico, 'partidaCompleta' => $partidaCompleta]);exit;
		}

		$idPartida=$this->input->get('idPartida');

		$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();

		$etEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucionPorDescEtaoaET('Elaboración de expediente técnico');
		$etDetallePartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartidaAndIdEtapaET($idPartida, $etEtapaEjecucion->id_etapa_et);
		$listaETAnalisisUnitario=$this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdDetallePartida($etDetallePartida->id_detalle_partida);

		foreach($listaETAnalisisUnitario as $key => $value)
		{
			$value->childETDetalleAnalisisUnitario=$this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisis($value->id_analisis);
		}

		$listaETRecurso=$this->Model_ET_Recurso->RecursoListar('R');
		$listaETPresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoPorIdET($this->input->get('idET'));

		$this->load->view('Front/Ejecucion/ETAnalisisUnitario/insertar', ['etDetallePartida' => $etDetallePartida, 'listaUnidadMedida' => $listaUnidadMedida, 'listaETAnalisisUnitario' => $listaETAnalisisUnitario, 'listaETRecurso' => $listaETRecurso, 'listaETPresupuestoAnalitico' => $listaETPresupuestoAnalitico, 'idPartida' => $idPartida]);
	}
	public function insertarinsumo()
	{
		if($_POST)
		{
			$idUnidad=$this->input->post('listaUnidadMedida');
			$descripcionInsumo=$this->input->post('txtInsumo');
			$data=$this->Model_Unidad_Medida->insertarInsumo($idUnidad, $descripcionInsumo);
			if($data==true)
			{
				echo "1";
			}
			else
			{
				echo "0";
			}			
		}
		else
		{
			$listaUnidadMedida = $this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$this->load->view('Front/Ejecucion/ETAnalisisUnitario/insertarinsumo',['listaUnidadMedida' => $listaUnidadMedida]);
		}		
	}

	public function insertarDetalleAnalisisUnitario()
	{
		if($_POST)
		{
			$this->db->trans_start();
			$idAnalisis=$this->input->post('idAnalisis');
			$descripcion=$this->input->post('txtInsumo');
			$cuadrilla=$this->input->post('txtCuadrilla');
			$unidad=$this->input->post('txtUnidad');
			$rendimiento=$this->input->post('txtRendimiento');
			$cantidad=$this->input->post('txtCantidad');
			$precioUnitario=$this->input->post('txtPrecioUnitario');

			$cuadrilla=(($cuadrilla=='' || $cuadrilla==null) ? 'NULL' : $cuadrilla);
			$rendimiento=(($rendimiento=='' || $rendimiento==null) ? 'NULL' : $rendimiento);


			if($unidad!="")
			{
				$data = $this->Model_Unidad_Medida->validarInsumo($unidad);
				$idUnidad=$data->id_unidad;
			}
			
			if($this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisisAndDescDetalleAnalisis($idAnalisis, $descripcion)!=null)
			{
				$this->db->trans_rollback();

				echo "0";

			}
			else
			{
				$this->Model_ET_Detalle_Analisis_Unitario->insertar($idAnalisis, $idUnidad, $descripcion, $cuadrilla, $cantidad, $precioUnitario, $rendimiento);

				$this->db->trans_complete();

				echo "1";

			}	
		}
		else
		{
			$idAnalisis=$this->input->get('id_AnalisisUnitario');
			$Partida = $this->Model_ET_Detalle_Partida->partidaAnaliticoEt($idAnalisis);
			$idET = $this->config->item('variableExpedienteTecnico');
			$listaUnidadMedida = $this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$listaInsumoNivel1 = $this->Model_Unidad_Medida->listaInsumoNivel1();
			foreach ($listaInsumoNivel1 as $key => $value) 
			{
				$value->hasChild = (count($this->Model_Unidad_Medida->listaInsumoporNivel($value->CodInsumo, ($value->Nivel+1)))==0 ? false : true);
			}
			$this->load->view('Front/Ejecucion/ETAnalisisUnitario/insertardetalleanalisisunitario',['idAnalisis'=>$idAnalisis,'listaUnidadMedida'=>$listaUnidadMedida,'partida' =>$Partida, 'listaNivel1' => $listaInsumoNivel1 , 'idET'=>$idET ]);
		}		
	}

	public function eliminar()
	{
		$this->db->trans_start();

		$idAnalisis=$this->input->post('idAnalisis');
		$idDetallePartida=$this->input->post('idDetallePartida');

		$this->Model_ET_Analisis_Unitario->eliminar($idAnalisis);

		$partidaCompleta=$this->partidaEstaCompleta($idDetallePartida);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Análisis unitario eliminado correctamente.', 'partidaCompleta' => $partidaCompleta]);exit;
	}

	public function actualizarAnalitico()
	{
		$idAnalisis=$this->input->post('idAnalisis');
		$idAnalitico=$this->input->post('idAnalitico');
		$idDetallePartida=$this->input->post('idDetallePartida');

		$idAnalitico=($idAnalitico=='' || $idAnalitico==null ? 'NULL' : $idAnalitico);

		$this->Model_ET_Analisis_Unitario->actualizarAnalitico($idAnalisis, $idAnalitico);

		$partidaCompleta=$this->partidaEstaCompleta($idDetallePartida);

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Analítico guardado correctamente.', 'partidaCompleta' => $partidaCompleta]);exit;
	}

	private function partidaEstaCompleta($idDetallePartida)
	{
		$partidaCompleta=true;

		$listaETAnalisisUnitario=$this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdDetallePartida($idDetallePartida);

		foreach($listaETAnalisisUnitario as $key => $value)
		{
			if($value->id_analitico==null)
			{
				$partidaCompleta=false;

				break;
			}
		}

		if(count($listaETAnalisisUnitario)==0)
		{
			$partidaCompleta=false;
		}

		return $partidaCompleta;
	}

	public function cargarNivel()
	{
		$codigoInsumo=$this->input->post('codigoInsumo');
		$nivel=$this->input->post('nivel');
		$data=$this->Model_Unidad_Medida->listaInsumoporNivel($codigoInsumo, $nivel);

		foreach($data as $key => $value)
		{
			$value->hasChild=(count($this->Model_Unidad_Medida->listaInsumoporNivel($value->CodInsumo, ($value->Nivel+1)))==0 ? false : true);
		}
		echo json_encode($data);exit;
	}
}