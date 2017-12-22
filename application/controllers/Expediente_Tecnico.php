<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expediente_Tecnico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Expediente_Tecnico');
		$this->load->model('Model_ET_Analisis_Unitario');
		$this->load->model('Model_ET_Componente');
		$this->load->model('Model_ET_Meta');
		$this->load->model('Model_ET_Partida');
		$this->load->model('Model_Personal');
		$this->load->model("Model_ET_Tipo_Responsable");
		$this->load->model("Model_ET_Responsable");
		$this->load->model("Cargo_Modal");
		$this->load->model("Model_ET_Presupuesto_Analitico");
		$this->load->model("Model_ET_Img");
		$this->load->model('Model_ET_Etapa_Ejecucion');
		$this->load->model('Model_ET_Presupuesto_Ejecucion');
		$this->load->model('Model_Personal');
		$this->load->model('Model_ET_Detalle_Partida');
		$this->load->model('Model_ET_Detalle_Analisis_Unitario');
		$this->load->model('Model_ET_Tarea');
		$this->load->model('Model_ET_Mes_Valorizacion');
		$this->load->model('Model_Unidad_Medida');
		$this->load->model('Model_DetSegOrden');
		$this->load->model('Model_ModalidadE');
		$this->load->model('FuenteFinanciamiento_Model');
		//$this->load->model('Model_DetSegValorizacion');
		$this->load->library('mydompdf');
		$this->load->helper('FormatNumber_helper');
	}

	function _load_layout($template, $data)
	{
		$this->load->view('layout/Ejecucion/header');
		$this->load->view($template, $data);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function reportePdfExpedienteTecnico()
	{
		$id_ExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$responsableElaboracion=$this->Model_Personal->ResponsableExpedieteElaboracion($id_ExpedienteTecnico);

		$responsableEjecucion=$this->Model_Personal->ResponsableExpedieteEjecucion($id_ExpedienteTecnico);

		$Opcion="ReporteFichaTecnica01";

		$ImagenesExpediente=$this->Model_ET_Expediente_Tecnico->ET_Img($id_ExpedienteTecnico);

		$listarExpedienteFicha001=$this->Model_ET_Expediente_Tecnico->reporteExpedienteFicha001($Opcion,$id_ExpedienteTecnico);

		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteExpedienteTecnico',["listarExpedienteFicha001" => $listarExpedienteFicha001, "ImagenesExpediente" =>$ImagenesExpediente,"responsableElaboracion" => $responsableElaboracion,"responsableEjecucion" => $responsableEjecucion],true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper("A4", "portrait");
		$this->mydompdf->render();
		$this->mydompdf->set_base_path('./assets/css/dompdf.css');
		$this->mydompdf->stream("ReporteExpedienteTecnico.pdf", array("Attachment" => false));
	}

	public function index()
	{
		$flat="LISTARETAPA";
		$id_etapa_et="1";
		$listaExpedienteTecnicoElaboracion=$this->Model_ET_Expediente_Tecnico->ExpedienteListarElaboracion($flat,$id_etapa_et);

		$listaETExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ListarExpedienteTecnico();
		foreach($listaETExpedienteTecnico as $key => $value)
		{
			$value->primeraETTarea=$this->Model_ET_Tarea->primeraETTareaPorIdET($value->id_et);
			$value->ultimaETTarea=$this->Model_ET_Tarea->ultimaETTareaPorIdET($value->id_et);

			$value->existeGantt=false;

			if($value->primeraETTarea!=null)
			{
				$value->existeGantt=true;
			}
		}
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/index.php',['listaExpedienteTecnicoElaboracion'=>$listaExpedienteTecnicoElaboracion,'listaETExpedienteTecnico'=>$listaETExpedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function monitorCoordinador()
	{
		$flat="LISTARETAPA";
		$id_etapa_et="1";
		//$listaExpedienteTecnicoElaboracion=$this->Model_ET_Expediente_Tecnico->ExpedienteListarElaboracion($flat,$id_etapa_et);

		$listaETExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteListarElaboracion($flat,$id_etapa_et);

		foreach($listaETExpedienteTecnico as $key => $value)
		{
			$value->primeraETTarea=$this->Model_ET_Tarea->primeraETTareaPorIdET($value->id_et);
			$value->ultimaETTarea=$this->Model_ET_Tarea->ultimaETTareaPorIdET($value->id_et);

			$value->existeGantt=false;

			if($value->primeraETTarea!=null)
			{
				$value->existeGantt=true;
			}
		}
		$this->_load_layout('front/Ejecucion/ExpedienteTecnico/monitorcoordinador.php', ['listaETExpedienteTecnico' => $listaETExpedienteTecnico]);

	}
	public function ejecucion()
	{
		$listaEjecucion = $this->Model_ET_Expediente_Tecnico->ListarExpedientePorEtapa(3);
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/ejecucion.php',['listaEjecucion' => $listaEjecucion]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function insertar()
	{
       if($_POST)
		{
	       $this->db->trans_start();

	        $Etapa_Ejecucion='Elaboración de expediente técnico';
	        $nombreEtapa=$this->Model_ET_Etapa_Ejecucion->BuscarNombreEtapaEjecucion($Etapa_Ejecucion);
	        $id_etapa_et=$nombreEtapa->id_etapa_et;

			$flat  = "INSERTAR";
			$txtIdPi=$this->input->post('txtIdPi');
			$txtNombreUe=$this->input->post('txtNombreUe');
			$txtDireccionUE=$this->input->post('txtDireccionUE');
			$txtUbicacionUE=$this->input->post('txtUbicacionUE');
			$txtTelefonoUE=$this->input->post('txtTelefonoUE');
			$txtRuc=$this->input->post('txtRuc');
			$txtUbicacionPip=$this->input->post('txtUbicacionPip');
			$txtCodigoUnico=$this->input->post('txtCodigoUnico');
			$txtCostoTotalPreInversion=floatval(str_replace(",","",$this->input->post("txtCostoTotalPreInversion")));
			$txtCostoDirectoPre=floatval(str_replace(",","",$this->input->post('txtCostoDirectoPre')));
			$txtCostoIndirectoPre=floatval(str_replace(",","",$this->input->post('txtCostoIndirectoPre')));
			$txtCostoTotalInversion=floatval(str_replace(",","",$this->input->post('txtCostoTotalInversion')));
			$txtCostoDirectoInversion=floatval(str_replace(",","",$this->input->post('txtCostoDirectoInversion')));
			$txtGastosGenerales=floatval(str_replace(",","",$this->input->post('txtGastosGenerales')));
			$txtGastosSupervision=floatval(str_replace(",","",$this->input->post('txtGastosSupervision')));
			$txtFuncion=$this->input->post('txtFuncion');
			$txtPrograma=$this->input->post('txtPrograma');
			$txtSubPrograma=$this->input->post('txtSubPrograma');
			$txtFuncionProgramatica=$txtFuncion."/".$txtPrograma."/".$txtSubPrograma;
			$txtProyecto=$this->input->post('txtProyecto');
			$txtComponente=$this->input->post('txtComponente');
			$txtMeta=$this->input->post('txtMeta');
			$txtFuenteFinanciamiento=$this->input->post('txtFuenteFinanciamiento');
			$txtModalidadEjecucion=$this->input->post('txtModalidadEjecucion');
			$txtTiempoEjecucionPip=$this->input->post('txtTiempoEjecucionPip');
			$txtNumBeneficiarios=$this->input->post('txtNumBeneficiarios');
			$txtUrlDocAprobacion=$this->input->post('url');
			$txtFechaAprobacion=$this->input->post('txtFechaAprobacion');
			$txtSituacioActual=$this->input->post('hdtxtSituacioActual');
			$txtSituacioEconomica=$this->input->post('hdtxtSituacioEconomica');
			$txtResumenProyecto=$this->input->post('hdtxtResumenProyecto');
			$txtNumFolio=$this->input->post('txtNumFolio');
			$etapa_et=$id_etapa_et;

			$this->Model_ET_Expediente_Tecnico->insertar($flat,$txtNombreUe,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtFechaAprobacion,$txtSituacioActual,$txtSituacioEconomica,$txtResumenProyecto,$txtNumFolio,$etapa_et);

			$UltimoExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico();
			$id_et=$UltimoExpedienteTecnico->id_et;

			$config['upload_path']   = './uploads/ResolucioExpediente/';
	        $config['allowed_types'] = '*';
	        $config['max_width']     = 2000;
	        $config['max_height']    = 2000;
	        $config['max_size']      = 50000;
	        $config['encrypt_name']  = false;
	        $config['file_name'] =$id_et;
	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);
			$this->upload->do_upload('Documento_Resolucion');

			$comboResponsableElaboracion=$this->input->post('comboResponsableElaboracion');
			$comboTipoResponsableElaboracion=$this->input->post('comboTipoResponsableElaboracion');
			$comboCargoElaboracion=$this->input->post('comboCargoElaboracion');

			$this->Model_ET_Responsable->insertarET_Epediente($id_et,$comboResponsableElaboracion,$comboTipoResponsableElaboracion,$comboCargoElaboracion);

			$ComboResponsableEjecucion=$this->input->post('ComboResponsableEjecucion');
			$ComboTipoResponsableEjecucion=$this->input->post('ComboTipoResponsableEjecucion');
			$comboCargoEjecucion=$this->input->post('comboCargoEjecucion');

			$this->Model_ET_Responsable->insertarET_Epediente($id_et,$ComboResponsableEjecucion,$ComboTipoResponsableEjecucion,$comboCargoEjecucion);

			$config = array(
				"upload_path" => "./uploads/ImageExpediente",
				'allowed_types' => "jpg|png"
			);
			$variablefile= $_FILES;
			$info = array();
			$files = count($_FILES['imagen']['name']);
			$this->session->set_flashdata('correcto', 'Expediente Tecnico registrado correctamente.');
			if($files>1)
			{
				for ($i=0; $i < $files; $i++)
				{
					$idImageExp=$this->Model_ET_Expediente_Tecnico->Ultimo_Img();
					$_FILES['imagen']['name'] = $variablefile['imagen']['name'][$i];
					$_FILES['imagen']['type'] = $variablefile['imagen']['type'][$i];
					$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
					$_FILES['imagen']['error'] = $variablefile['imagen']['error'][$i];
					$_FILES['imagen']['size'] = $variablefile['imagen']['size'][$i];
					$dato=(string)$_FILES['imagen']['name'];
					$nombre=explode('.',$dato);
					$_FILES['imagen']['name'] =$idImageExp->id_img.'.'.$nombre[1];
					$this->upload->initialize($config);
					if ($this->upload->do_upload('imagen'))
					 {
						$this->Model_ET_Img->insertarImgExpediente($hdIdExpediente,($idImageExp->id_img.'.'.$nombre[1]));
					 }
					else
					 {
							return redirect('/Expediente_Tecnico');
					 }
				}
			}
			$this->db->trans_complete();

			echo json_encode("Se registro Correctamente el Expediente Técnico");
		}
		if($this->input->get('buscar')=="true")
		{

			$listarCargo=$this->Cargo_Modal->getcargo();
			$opcion  = "001";//Responsable de elaboración
  			$listaTipoResponsableElaboracion=$this->Model_ET_Tipo_Responsable->NombreTipoResponsable($opcion);

  			$opcion  = "002";
  			$listaTipoResponsableEjecucion=$this->Model_ET_Tipo_Responsable->NombreTipoResponsable($opcion);

			$listarPersona=$this->Model_Personal->listarPersona();
			$codigo_unico_pi=$this->input->get('CodigoUnico');
			$Listarproyectobuscado=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoBuscar($codigo_unico_pi);
			$listaModalidadEjecucion=$this->Model_ModalidadE->GetModalidadE();
			$listaFuenteFinanciamiento=$this->FuenteFinanciamiento_Model->get_FuenteFinanciamiento();
			$this->load->view('front/Ejecucion/ExpedienteTecnico/insertar',['Listarproyectobuscado'=>$Listarproyectobuscado,'listarPersona' =>$listarPersona,'listaTipoResponsableElaboracion' => $listaTipoResponsableElaboracion,'listaTipoResponsableEjecucion' => $listaTipoResponsableEjecucion,'listarCargo' =>$listarCargo,'listaModalidadEjecucion' => $listaModalidadEjecucion , 'listaFuenteFinanciamiento' => $listaFuenteFinanciamiento]);
		}
	}

	function editar()
	{
		if($this->input->post('hdIdExpediente'))
		{
			$url=(string)$this->input->post('Editurl');
			if($url!='')
			{
			$this->db->trans_start();
			$id_etxI= $this->input->post('hdIdExpediente');
			if (file_exists("uploads/ResolucioExpediente/".$id_etxI.'.docx'))
       			{
				   	unlink("uploads/ResolucioExpediente/".$id_etxI.'.docx');
				}
				if (file_exists("uploads/ResolucioExpediente/".$id_etxI.'.pdf'))
       			{
				   	unlink("uploads/ResolucioExpediente/".$id_etxI.'.pdf');
				}
			}
			$config['upload_path']   = './uploads/ResolucioExpediente/';
	        $config['allowed_types'] = '*';
	        $config['max_width']     = 2000;
	        $config['max_height']    = 2000;
	        $config['max_size']      = 50000;
	        $config['encrypt_name']  = false;

	        $config['file_name']	 = $this->input->post('hdIdExpediente');
	        $this->load->library('upload', $config);
			$this->upload->do_upload('Documento_Resolucion');
			$flat ="EDITAR";
			$hdIdExpediente=$this->input->post('hdIdExpediente');
			$txtNombreUe=$this->input->post('txtNombreUe');
			$txtDireccionUE=$this->input->post('txtDireccionUE');
			$txtUbicacionUE=$this->input->post('txtUbicacionUE');
			$txtTelefonoUE=$this->input->post('txtTelefonoUE');
			$txtRucUE=$this->input->post('txtRucUE');

			$txtCostoTotalPreInversion=floatval(str_replace(",","",$this->input->post('txtCostoTotalPreInversion')));
			$txtCostoDirectoPre=floatval(str_replace(",","",$this->input->post('txtCostoDirectoPre')));
			$txtCostoIndirectoPre=floatval(str_replace(",","",$this->input->post('txtCostoIndirectoPre')));
			$txtCostoTotalInversion=floatval(str_replace(",","",$this->input->post('txtCostoTotalInversion')));
			$txtCostoDirectoInversion=floatval(str_replace(",","",$this->input->post('txtCostoDirectoInversion')));
			$txtGastosGenerales=floatval(str_replace(",","",$this->input->post('txtGastosGenerales')));
			$txtGastosSupervision=floatval(str_replace(",","",$this->input->post('txtGastosSupervision')));

			$txtFuncion=$this->input->post('txtFuncion');
			$txtPrograma=$this->input->post('txtPrograma');
			$txtSubPrograma=$this->input->post('txtSubPrograma');
			$txtFuncionProgramatica=$txtFuncion."/".$txtPrograma."/".$txtSubPrograma;
			$txtProyecto=$this->input->post('txtProyecto');
			$txtComponente=$this->input->post('txtComponente');
			$txtMeta=$this->input->post('txtMeta');
			$txtFuenteFinanciamiento=$this->input->post('txtFuenteFinanciamiento');
			$txtModalidadEjecucion=$this->input->post('txtModalidadEjecucion');
			$txtTiempoEjecucionPip=$this->input->post('txtTiempoEjecucionPip');
			$txtNumBeneficiarios=$this->input->post('txtNumBeneficiarios');
			$opcion="BuscarExpedienteID";
			$urlTemp=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$hdIdExpediente);
			if($url!='')
			{
				$urlD=$this->input->post('Editurl');
			}else
			{
				$urlD=$urlTemp->url_doc_aprobacion_et;
			}
			$txtSituacioActual=$this->input->post('txtSituacioActual');
			$txtSituacioDeseada=$this->input->post('txtSituacioDeseada');
			$txtContribucioInterv=$this->input->post('txtContribucioInterv');
			$txtFechaAprobacion=$this->input->post('txtFechaAprobacion');
			$txtNumFolio=$this->input->post('txtNumFolio');

			$this->Model_ET_Expediente_Tecnico->editar($flat,$hdIdExpediente,$txtNombreUe,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRucUE,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$urlD,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio,$txtFechaAprobacion);


			$id_tipo_responsableElabo=$this->input->post('id_tipo_responsableElabo');
			$comboCargoElaboracion =$this->input->post('comboCargoElaboracion');
			$comboResponsableElaboracion =$this->input->post('comboResponsableElaboracion');

			$this->Model_ET_Expediente_Tecnico->EditarResponsableElabor($id_tipo_responsableElabo,$comboCargoElaboracion,$comboResponsableElaboracion);

			$id_tipo_responsableEjecucion=$this->input->post('id_tipo_responsableEjecucion');
			$comboCargoEjecucion =$this->input->post('comboCargoEjecucion');
			$ComboResponsableEjecucion =$this->input->post('ComboResponsableEjecucion');

			$this->Model_ET_Expediente_Tecnico->EditarResponsableEjecucion($id_tipo_responsableEjecucion,$comboCargoEjecucion,$ComboResponsableEjecucion);


			$config = array(
				"upload_path" => "./uploads/ImageExpediente",
				'allowed_types' => "jpg|png"
			);
			$variablefile= $_FILES;
			$info = array();
			$files = count($_FILES['imagen']['name']);
			$this->session->set_flashdata('correcto', 'Expediente Tecnico modificado correctamente.');
			if($files>1)
			{
				for ($i=0; $i < $files; $i++)
				{
					$idImageExp=$this->Model_ET_Expediente_Tecnico->Ultimo_Img();
					$_FILES['imagen']['name'] = $variablefile['imagen']['name'][$i];
					$_FILES['imagen']['type'] = $variablefile['imagen']['type'][$i];
					$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
					$_FILES['imagen']['error'] = $variablefile['imagen']['error'][$i];
					$_FILES['imagen']['size'] = $variablefile['imagen']['size'][$i];
					$dato=(string)$_FILES['imagen']['name'];
					$nombre=explode('.',$dato);
					$_FILES['imagen']['name'] =$idImageExp->id_img.'.'.$nombre[1];
					$this->upload->initialize($config);
					if ($this->upload->do_upload('imagen'))
					 {
						$this->Model_ET_Img->insertarImgExpediente($hdIdExpediente,($idImageExp->id_img.'.'.$nombre[1]));
					 }
					else
					 {
							return redirect('/Expediente_Tecnico');
					 }
				}
			}
			$this->db->trans_complete();

			return redirect('/Expediente_Tecnico/verdetalle/'.$hdIdExpediente);
		}

		$id_et=$this->input->GET('id_et');
		$listaimg=$this->Model_ET_Img->ListarImagen($id_et);
		$listarUResponsableERespoElabo=$this->Model_ET_Expediente_Tecnico->listarUResponsableERespoElaboracion($id_et);
		$listarUResponsableERespoEjecucion=$this->Model_ET_Expediente_Tecnico->listarUResponsableERespoEjecucion($id_et);

		$listarCargo=$this->Cargo_Modal->getcargo();
		$opcion  = "001";
		$listaTipoResponsableElaboracion=$this->Model_ET_Tipo_Responsable->NombreTipoResponsable($opcion);

		$opcion  = "002";
		$listaTipoResponsableEjecucion=$this->Model_ET_Tipo_Responsable->NombreTipoResponsable($opcion);

		$listarPersona=$this->Model_Personal->listarPersona();

		$ExpedienteTecnicoM=$this->Model_ET_Expediente_Tecnico->DatosExpediente($id_et);

		$listaModalidadEjecucion=$this->Model_ModalidadE->GetModalidadE();
		$listaFuenteFinanciamiento=$this->FuenteFinanciamiento_Model->get_FuenteFinanciamiento();

		return $this->load->view('front/Ejecucion/ExpedienteTecnico/editar',['ExpedienteTecnicoM'=>$ExpedienteTecnicoM, 'listaimg'=>$listaimg,'listarCargo' => $listarCargo,'listaTipoResponsableElaboracion' => $listaTipoResponsableElaboracion,'listaTipoResponsableEjecucion' => $listaTipoResponsableEjecucion,'listarPersona'=>$listarPersona,'listarUResponsableERespoElabo' =>$listarUResponsableERespoElabo,'listarUResponsableERespoEjecucion' =>$listarUResponsableERespoEjecucion, 'listaModalidadEjecucion' => $listaModalidadEjecucion , 'listaFuenteFinanciamiento' => $listaFuenteFinanciamiento ]);
	}

    /*function registroBuscarProyecto()
    {
		$CodigoUnico=$this->input->get('inputValue');
		$Registrosproyectobuscos=$this->Model_ET_Expediente_Tecnico->ProyectoViable($CodigoUnico);
		echo  json_encode($Registrosproyectobuscos);
    }*/
    function registroBuscarProyecto()
    {
		$CodigoUnico=$this->input->get('inputValue');
		$Registrosproyectobuscos=$this->Model_ET_Expediente_Tecnico->ExpedienteContarRegistros($CodigoUnico);
		echo  json_encode($Registrosproyectobuscos);
    }

	function reportePdfMetrado()
	{
		$id_ExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$opcion="BuscarExpedienteID";
		$MostraExpedienteNombre=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);
		$MostraExpedienteTecnicoExpe=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);

	    $MostraExpedienteTecnicoExpe->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($id_ExpedienteTecnico);

	    foreach ($MostraExpedienteTecnicoExpe->childComponente as $key => $value)
	    {
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);
			foreach ($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidada($item);
			}
	    }
		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteMetrado',['MostraExpedienteTecnicoExpe'=>$MostraExpedienteTecnicoExpe,'MostraExpedienteNombre' =>$MostraExpedienteNombre], true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->render();
		$this->mydompdf->stream("ReporteMetrado.pdf", array("Attachment" => false));
	}

	function reportePresupuestoFF05($id_ExpedienteTecnico)
	{
		$opcion="BuscarExpedienteID";
		$MostraExpedienteNombre=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);
		$MostraExpedienteTecnicoExpe=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);

	    $MostraExpedienteTecnicoExpe->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($id_ExpedienteTecnico);

	    foreach ($MostraExpedienteTecnicoExpe->childComponente as $key => $value)
	    {
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);
			foreach ($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidada($item);
			}
	    }

		$this->load->view('front/Ejecucion/ExpedienteTecnico/reportePresupuestoFF05',['MostraExpedienteTecnicoExpe'=>$MostraExpedienteTecnicoExpe,'MostraExpedienteNombre' =>$MostraExpedienteNombre], true);

	}
	public function reportePdfPresupuestoAnalitico()
	{
		$id_et = isset($_GET['id_et']) ? $_GET['id_et'] : null;
        $opcion="BuscarExpedienteID";
		$MostraExpedienteNombre=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_et);

		$flat  = "R";
		$PresupuestoEjecucionListar=$this->Model_ET_Presupuesto_Ejecucion->PresupuestoEjecucionListar($flat);

		/*$flat="REPORTEPRESUPUESTOANALITICO1";
		$litarPresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->listarPresupuestoAnalitico($flat,$id_et);*/

		foreach ($PresupuestoEjecucionListar as $key => $value)
		{
			$value->ChilpresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoDetalles($id_et,$value->id_presupuesto_ej);
			foreach ($value->ChilpresupuestoAnalitico as $key  => $Itemp)
			{
				$Itemp->ChilCostoDetallePartida=$this->Model_ET_Detalle_Partida->CostoDetallePartida($Itemp->id_analitico);//costo directo
			}
		}
        $this->load->library('mydompdf');
        $html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePdfPresupuestoAnalitico',['MostraExpedienteNombre' => $MostraExpedienteNombre,'PresupuestoEjecucionListar' =>$PresupuestoEjecucionListar], true);
        $this->mydompdf->load_html($html);
        $this->mydompdf->set_paper('letter', 'landscape');
        $this->mydompdf->render();
        $this->mydompdf->stream("reportePdfPresupuestoAnalitico.pdf", array("Attachment" => false));
    }

    public function reportePdfAnalisisPrecioUnitarioFF11()
	{
		$id_et = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$etExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($id_et);

		$etExpedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($etExpedienteTecnico->id_et);

		foreach($etExpedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaParaReporteFF11($item);
			}
		}

		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteAnalisisPreciosFF11', ["etExpedienteTecnico" => $etExpedienteTecnico], true);

		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper("A4", "portrait");
		$this->mydompdf->render();
		$this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css

		$this->mydompdf->stream("reporteAnalisisPreciosFF11.pdf", array("Attachment" => false));
    }

	public function reportePdfPresupuestoFF05()
	{
		$id_ExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$opcion="BuscarExpedienteID";
		$MostraExpedienteNombre=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);
		$MostraExpedienteTecnicoExpe=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_ExpedienteTecnico);

	    $MostraExpedienteTecnicoExpe->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($id_ExpedienteTecnico);

	    foreach ($MostraExpedienteTecnicoExpe->childComponente as $key => $value)
	    {
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);
			foreach ($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaReporteF005($item);
			}
	    }


		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePresupuestoFF05',['MostraExpedienteTecnicoExpe'=>$MostraExpedienteTecnicoExpe,'MostraExpedienteNombre' => $MostraExpedienteNombre], true);
		$this->mydompdf->set_paper('latter','landscape');
		$this->mydompdf->load_html($html);
		$this->mydompdf->render();
		$this->mydompdf->stream("reportePresupuestoFF05.pdf", array("Attachment" => false));
	}

	public function valorizacionEjecucionProyecto()
	{
		$idExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

		foreach($expedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaParaValorizacion($item);

			}
		}

		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/valorizacionEjecucionProyecto', ['expedienteTecnico' => $expedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function reportePdfValorizacionEjecucion()
	{
		$idExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

		foreach($expedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaParaValorizacion($item);
			}
		}

		$html = $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePdfValorizacionEjecucion',['expedienteTecnico'=>$expedienteTecnico],true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper("A4", "landscape");
		$this->mydompdf->render();
		$this->mydompdf->stream("reporteValorizacionEjecucion.pdf", array("Attachment" => false));
    }


// reporte expediente tecnico ejecucion 007

    public function reportePdfEjecucion007()
	{
		$idExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

		foreach($expedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaParaValorizacion($item);
			}
		}

		$html = $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePdfEjecucion007',['expedienteTecnico'=>$expedienteTecnico],true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper("A4", "portrait");
		$this->mydompdf->render();
		$this->mydompdf->stream("reporteValorizacionEjecucion.pdf", array("Attachment" => false));
    }







	private function obtenerMetaAnidadaReporteF005($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartidaMontoff05($meta->id_meta);

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->obtenerMetaAnidadaReporteF005($value);
		}
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

	private function obtenerMetaAnidadaParaValorizacion($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);


			foreach($meta->childPartida as $key => $value)
			{
				$value->childDetallePartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartidaParaValorizacion($value->id_partida);

				$value->childDetallePartida->childMesValorizacion=$this->Model_ET_Mes_Valorizacion->ETMesValorizacionPorIdDetallePartida($value->childDetallePartida->id_detalle_partida);

			}

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->obtenerMetaAnidadaParaValorizacion($value);
		}
	}

	private function obtenerMetaAnidadaParaReporteFF11($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);

			foreach($meta->childPartida as $key => $value)
			{
				$value->childDetallePartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartida($value->id_partida);

				foreach($value->childDetallePartida as $index => $item)
				{
					$item->childAnalisisUnitario=$this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdDetallePartida($item->id_detalle_partida);

					foreach ($item->childAnalisisUnitario as $k => $v)
					{
						$v->childDetalleAnalisisUnitario=$this->Model_ET_Detalle_Analisis_Unitario->ETDetalleAnalisisUnitarioPorIdAnalisis($v->id_analisis);
					}
				}
			}

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->obtenerMetaAnidadaParaReporteFF11($value);
		}
	}

	public function eliminar()
	{
		if ($this->input->is_ajax_request())
	    {
			$flat="ELIMINAR";
			$id_et=$this->input->post('id_et');

			if((count($this->Model_ET_Expediente_Tecnico->VerificarComponenteExpedienteAntesEliminar($id_et))>0) || (count($this->Model_ET_Expediente_Tecnico->VerificarETPresupuestoAnaliticoExpedienteAntesEliminar($id_et))>0) || (count($this->Model_ET_Expediente_Tecnico->VerificarETTareaGantt($id_et))>0) )
            {
            	echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede eliminar este expediente.']);exit;
            }
           	else
           	{
           		$eliminarImg=$this->Model_ET_Expediente_Tecnico->ET_Img($id_et);
           		foreach ($eliminarImg as $value)
           		{
           			if (file_exists("uploads/ImageExpediente/".$value->desc_img))
           			{
					   	unlink("uploads/ImageExpediente/".$value->desc_img);
					}else
					{

					}
           		}
           		if($this->Model_ET_Expediente_Tecnico->eliminar($flat,$id_et)==true)
	            {

	            	//echo json_encode("correcto se elimino");
	            	echo json_encode(['proceso' => 'correcto', 'mensaje' => 'El registro fue eliminado correctamente.']);exit;
	            }
           	}
		}
	}

	public function ResponsableExpediente()
	{
		$flat="LISTAREXPEDIENTERESPONSABLE";
		$id_et=$this->input->post('id_et');

		$listaResponsableExpediente=$this->Model_ET_Expediente_Tecnico->ListarResponsableExpediente($flat,$id_et);
		//var_dump($listaResponsableExpediente);exit;
		$this->load->view('front/Ejecucion/ExpedienteTecnico/responsableExpediente.php',['listaResponsableExpediente'=>$listaResponsableExpediente]);

	}

	public function DocumentoExpediente()
	{
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($this->input->get('id_et'));

		$id_et=$this->input->get('id_et');
		$ListarDocumentoExpediente=$this->Model_ET_Expediente_Tecnico->ListarDocumentoExpediente($id_et);
		$this->load->view('front/Ejecucion/ExpedienteTecnico/documentoExpediente.php',['ListarDocumentoExpediente'=>$ListarDocumentoExpediente,'expedienteTecnico' => $expedienteTecnico,'id_et' => $id_et]);
	}

	public function DetalleExpediente()
	{
		$id_et=$this->input->post('id_et');
		$detalleExpediente=$this->Model_ET_Expediente_Tecnico->DetalleExpediente($id_et);
		$this->load->view('front/Ejecucion/ExpedienteTecnico/detalleExpediente.php',["detalleExpediente" => $detalleExpediente]);
	}

	public function vistoBueno()
	{
		if($_POST)
        {
            $darvistobueno=$this->input->post('id_et');
            $vistoBueno=$this->Model_ET_Expediente_Tecnico->darvistobueno($darvistobueno);
            echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dar visto bueno correcto.']);exit;
        }

		$id_ExpedienteTecnico=$this->input->GET('id_ExpedienteTecnico');
		$expedienteVistoBueno=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($id_ExpedienteTecnico);
		$this->load->view('front/Ejecucion/ExpedienteTecnico/modalParaVistoBueno',['expedienteVistoBueno'=>$expedienteVistoBueno]);
	}

	public function clonar()
	{
		if($_POST)
		{
			$idExpedienteTecnico=$this->input->post('idExpedienteTecnico');
			$idEtapaExpedienteTecnico=$this->input->post('idEtapaExpedienteTecnico');
			$txtUrlDocAprobacion=$this->input->post('url');
			$txtFechaAprobacion=$this->input->post('txtFechaAprobacion');

			if($idExpedienteTecnico!=null && $idEtapaExpedienteTecnico!=null)
			{
				$this->db->trans_start();

				$etExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);

				if($etExpedienteTecnico->estado_revision!=1)
				{
					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Aún no se ha dado el visto bueno a este expediente técnico para proceder con el pase de etapa.']);exit;
				}

				if($etExpedienteTecnico->id_etapa_et==$idEtapaExpedienteTecnico)
				{
					echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede clonar expediente técnico para la misma etapa.']);exit;
				}

				if($this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoPorIdETPadre($etExpedienteTecnico->id_et)!=null)
				{
					echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede clonar dos veces de un mismo expediente técnico.']);exit;
				}

				$listaETComponente=$this->Model_ET_Componente->ETComponentePorIdET($etExpedienteTecnico->id_et);

				foreach($listaETComponente as $key => $value)
				{
					$listaETMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

					foreach($listaETMeta as $index => $item)
					{
						if($this->analisisUnitarioSinAnalitico($item))
						{
							echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede clonar expediente técnico porque existen análisis unitarios sin asignación de analítico.']);exit;
						}
					}
				}

				/*aca de sube el documento de apribacion y se edita la fecha de aprobacion*/

				$config['upload_path']   = './uploads/ResolucioExpediente/';
		        $config['allowed_types'] = '*';
		        $config['max_width']     = 2000;
		        $config['max_height']    = 2000;
		        $config['max_size']      = 50000;
		        $config['encrypt_name']  = false;
		        $config['file_name'] =$idExpedienteTecnico;
		        $this->load->library('upload', $config);
		        $this->upload->initialize($config);
				$this->upload->do_upload('fileResolucion');

				$this->Model_ET_Expediente_Tecnico->AprobarExpediente($txtUrlDocAprobacion, $txtFechaAprobacion, $idExpedienteTecnico);

				$this->Model_ET_Expediente_Tecnico->clonar($etExpedienteTecnico->id_et, $idEtapaExpedienteTecnico);

				$idUltimoExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico()->id_et;

				$listaETImgOrigen=$this->Model_ET_Img->ListarImagen($etExpedienteTecnico->id_et);
				$listaETImgDestino=$this->Model_ET_Img->ListarImagen($idUltimoExpedienteTecnico);

				foreach($listaETImgOrigen as $key => $value)
				{
					$nombreImgTemp=$listaETImgDestino[$key]->id_img.'.'.(explode('.', $value->desc_img)[count(explode('.', $value->desc_img))-1]);

					$this->Model_ET_Img->updateDescImagePorIdImg($listaETImgDestino[$key]->id_img, $nombreImgTemp);

					if(file_exists('./uploads/ImageExpediente/'.$value->desc_img))
					{
						copy('./uploads/ImageExpediente/'.$value->desc_img, './uploads/ImageExpediente/'.$nombreImgTemp);
					}
				}

				if(file_exists('./uploads/ResolucioExpediente/'.$etExpedienteTecnico->id_et.'.'.$etExpedienteTecnico->url_doc_aprobacion_et))
				{
					copy('./uploads/ResolucioExpediente/'.$etExpedienteTecnico->id_et.'.'.$etExpedienteTecnico->url_doc_aprobacion_et, './uploads/ResolucioExpediente/'.$idUltimoExpedienteTecnico.'.'.$etExpedienteTecnico->url_doc_aprobacion_et);
				}

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Clonación de expediente en la etapa seleccionada realizado correctamente.']);exit;
			}
		}
		else
		{
			$listaETEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucion_Listar('R');

			$idExpedienteTecnico= $this->input->get('idExpedienteTecnico');

			$ExpedienteTecnico = $this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);

			$fechaAprobacion = '';

			if($ExpedienteTecnico->url_doc_aprobacion_et!=null && $ExpedienteTecnico->fecha_aprobacion != null)
			{
				$fechaAprobacion = $ExpedienteTecnico->fecha_aprobacion;
			}

			return $this->load->view('front/Ejecucion/ExpedienteTecnico/modalParaClonar', ['idExpedienteTecnico' => $idExpedienteTecnico, 'listaETEtapaEjecucion' => $listaETEtapaEjecucion,'fechaAprobacion' => $fechaAprobacion]);
		}


	}

	private function analisisUnitarioSinAnalitico($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);

			foreach($meta->childPartida as $key => $value)
			{
				if(count($this->Model_ET_Analisis_Unitario->ETAnalisisUnitarioPorIdPartidaFromDetallePartida($value->id_partida))>0)
				{
					return true;
				}
			}

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			if($this->analisisUnitarioSinAnalitico($value))
			{
				return true;
			}
		}

		return false;
	}
	public function verdetalle()
	{
		$id_et = isset($_GET['id_et']) ? $_GET['id_et'] : null ;
		$this->config->set_item('variableExpedienteTecnico', $id_et);
		$ExpedienteTecnicoElaboracion=$this->Model_ET_Expediente_Tecnico->ExpedienteListarElaboracionPorId($id_et);
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/verdetalle', [ 'ExpedienteTecnicoElaboracion' => $ExpedienteTecnicoElaboracion ]);
		$this->load->view('layout/Ejecucion/footer');
	}
	public function PeriodoEjecucion()
	{
		if ($_POST)
		{
			$id_et=$this->input->post('hdIdEt');
			$fechaInicio=$this->input->post('txtFechaInicio');
			$fechaFin=$this->input->post('txtFechaFin');

			if($fechaInicio>$fechaFin)
			{
				echo json_encode(['proceso' => 'Error', 'mensaje' => 'La Fecha de Inicio no puede ser mayor a la Fecha de Fin']);exit;
			}

			$ts1 = strtotime($fechaInicio);
			$ts2 = strtotime($fechaFin);
			$year1 = date('Y', $ts1);
			$year2 = date('Y', $ts2);
			$month1 = date('m', $ts1);
			$month2 = date('m', $ts2);
			$numerodemeses = (($year2 - $year1) * 12) + ($month2 - $month1);
			$data=$this->Model_ET_Expediente_Tecnico->PeriodoEjecucion($fechaInicio, $fechaFin, $id_et,$numerodemeses);

			if($data)
			{
				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Se agregó el periodo de Ejecucion correctamente.']);exit;
			}
			else
			{
				echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']);exit;
			}
			
		}
		else
		{
			$id_et=$this->input->get('id_et');
			$expedienteTecnico = $this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($id_et);
			$this->load->view('front/Ejecucion/ExpedienteTecnico/periododeejecucion',['ExpedienteTecnico' => $expedienteTecnico ]);
		}

	}
	public function CalcularNumeroMeses()
	{
		$fechaInicio = $this->input->post('txtFecha1');
		$fechaFin = $this->input->post('txtFecha2');
		$ts1 = strtotime($fechaInicio);
		$ts2 = strtotime($fechaFin);
		$year1 = date('Y', $ts1);
		$year2 = date('Y', $ts2);
		$month1 = date('m', $ts1);
		$month2 = date('m', $ts2);
		$numerodemeses = (($year2 - $year1) * 12) + ($month2 - $month1);
		echo json_encode(['numerodemeses' => $numerodemeses]); exit;

	}
	public function ListarPartida($id_et)
	{
		$listaPartida = $this->Model_ET_Expediente_Tecnico->listarPartidaporEt($id_et);
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/listarpartida',['listaPartida' => $listaPartida]);
		$this->load->view('layout/Ejecucion/footer');
	}
	public function AsignarOrden()
	{
		if ($_POST)
		{
			$idPartida=$this->input->post('hdIdPartida');
			$numeroOrden=$this->input->post('txtNumeroOrden');
			$concepto=$this->input->post('txtConceptoOrden');
			$data = $this->Model_DetSegOrden->insertar($idPartida,$numeroOrden,$concepto);
			if ($data==true)
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
			$idPartida=$this->input->get('id_partida');
			$partida=$this->Model_ET_Expediente_Tecnico->DetallePartida($idPartida);
			$listaOrden = $this->Model_DetSegOrden->listarOrdenPorPartida($idPartida);
			$this->load->view('front/Ejecucion/ExpedienteTecnico/asignarorden',['partida' => $partida,'listaOrden' =>$listaOrden ]);
		}

	}
	public function registroBuscarMeta()
    {
    	$CodigoUnico=$this->input->get('txtCodigoUnico');
		$txtOrden=$this->input->get('inputValue');
		$listaAcumuladoMeta = $this->Model_DetSegOrden->listarAcumuladoMeta($CodigoUnico);
		$ultimaMeta = '';
		$anio = date('Y');
		foreach ($listaAcumuladoMeta as $key => $value)
		{
			if ($value->ano_eje == $anio)
			{
				$ultimaMeta = $value->meta;
			}
		}
		$orden = $this->Model_DetSegOrden->buscarOrden($anio,$ultimaMeta,$txtOrden);
		echo json_encode($orden);
    }
    public function ControlMetrado($idExpedienteTecnico)
    {
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		if($expedienteTecnico->id_etapa_et == 1)
		{
			show_404();
		}
		else
		{
			$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);
			$countValorizacionDiaria  = $this->Model_DetSegOrden->sumatoriaValorizacion();

			foreach($expedienteTecnico->childComponente as $key => $value)
			{
				$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);
				foreach($value->childMeta as $index => $item)
				{
					$this->obtenerMetaAnidadaParaValorizacion($item);
				}
			}

			$this->load->view('layout/Ejecucion/header');
			$this->load->view('front/Ejecucion/EControlMetrado/controlmetrado', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida,'countValorizacionDiaria' => $countValorizacionDiaria]);
			$this->load->view('layout/Ejecucion/footer');
		}

    }
    public function AsignarValorizacion()
	{
		if ($_POST)
		{
			$idDetallePartida=$this->input->post('hdIdDetallePartida');
			$cantidad=$this->input->post('txtCantidad');
			$fechadia=$this->input->post('txtFecha');
			$fecha = date('Y-m-d H:i:s');

			$DetallePartida = $this->Model_ET_Detalle_Partida->ETPDetallePartida($idDetallePartida);
			$subtotal = $cantidad * $DetallePartida->precio_unitario;
			$listaPartida = $this->Model_DetSegOrden->listarValorizacionPorDetallePartida($idDetallePartida);

			$cantidadTotaldePartidas=0;

			foreach ($listaPartida as $key => $value)
			{
				$cantidadTotaldePartidas+=$value->cantidad;
			}
			if (($cantidadTotaldePartidas+$cantidad) > $DetallePartida->cantidad)
			{
				echo "3";
			}
			else
			{
				$data = $this->Model_DetSegOrden->insertar($fecha, $cantidad, $subtotal, $fechadia,$idDetallePartida);
				if ($data==true)
				{
					echo "1";
				}
				else
				{
					echo "0";
				}
			}
		}
		else
		{
			$fechaActual=date('Y-m-d');

			$idDetallePartida=$this->input->get('id_DetallePartida');
			$idExpedienteTecnico=$this->input->get('idExpediente');

			$DetallePartida = $this->Model_ET_Detalle_Partida->ETPDetallePartida($idDetallePartida);
			$listaValorizacion = $this->Model_DetSegOrden->listarValorizacionPorDetallePartida($idDetallePartida);
			$this->load->view('front/Ejecucion/EControlMetrado/valorizacionpartida', ['DetallePartida' => $DetallePartida, 'fecha' => $fechaActual, 'listaValorizacion' => $listaValorizacion,'idExpedienteTecnico' => $idExpedienteTecnico]);
		}

	}
	public function eliminarValorizacionPartida()
	{
		$id_detSegValorizacion =$this->input->get('idDetSegValorizacion');
		$data = $this->Model_DetSegOrden->eliminar($id_detSegValorizacion);
		if ($data==true)
		{
			echo "1";
		}
		else
		{
			echo "0";
		}
	}
	public function ValorizacionFisicaMetrado($idExpedienteTecnico)
	{
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		if($expedienteTecnico->id_etapa_et == 1)
		{
			show_404();
		}
		else
		{
			$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

			foreach($expedienteTecnico->childComponente as $key => $value)
			{
				$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

				foreach($value->childMeta as $index => $item)
				{
					$this->obtenerMetaAnidadaParaValorizacionFisica($item);
				}
			}
			$this->load->view('layout/Ejecucion/header');
			$this->load->view('front/Ejecucion/EControlMetrado/valorizacionfisica', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida]);
			$this->load->view('layout/Ejecucion/footer');
		}
	}

	public function reportePdfValorizacionFisica()
	{
		$idExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$mesActual =  strftime("%B");
		$mes = $this->mes($mesActual);

		if($expedienteTecnico->id_etapa_et == 1)
		{
			show_404();
		}
		else
		{
			$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

			foreach($expedienteTecnico->childComponente as $key => $value)
			{
				$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

				foreach($value->childMeta as $index => $item)
				{
					$this->obtenerMetaAnidadaParaValorizacionFisica($item);
				}
			}

			$html = $this->load->view('front/Ejecucion/EControlMetrado/reportepdfvalorizacionfisica', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida , 'mes' => $mes],true);
			$this->mydompdf->load_html($html);
			$this->mydompdf->set_paper("A4", "landscape");
			$this->mydompdf->render();
			$this->mydompdf->stream("reporteValorizacionFisica.pdf", array("Attachment" => false));
		}
	}

	public function reportePdfResumenValorizacionFisica($idExpedienteTecnico)
	{
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$mesActual =  strftime("%B");
		$mes = $this->mes($mesActual);

		if($expedienteTecnico->id_etapa_et == 1)
		{
			show_404();
		}
		else
		{
			$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);

			foreach($expedienteTecnico->childComponente as $key => $value)
			{
				$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

				foreach($value->childMeta as $index => $item)
				{
					$this->obtenerMetaAnidadaParaValorizacionFisica($item);
				}
			}
			$this->load->view('front/Ejecucion/EControlMetrado/reportepdfresumenvalorizacionfisica', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida , 'mes' => $mes]);

			/*$html = $this->load->view('front/Ejecucion/EControlMetrado/reportepdfvalorizacionfisica', ['expedienteTecnico' => $expedienteTecnico, 'listaUnidadMedida' => $listaUnidadMedida , 'mes' => $mes],true);
			$this->mydompdf->load_html($html);
			$this->mydompdf->set_paper("A4", "landscape");
			$this->mydompdf->render();
			$this->mydompdf->stream("reporteValorizacionFisica.pdf", array("Attachment" => false));*/
		}
	}

	public function reportePdfInformeMensual()
	{
		$idExpedienteTecnico = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);
		$mesActual =  strftime("%B");
		$mes = $this->mes($mesActual);

		if($expedienteTecnico->id_etapa_et == 1)
		{
			show_404();
		}
		else
		{
			$listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
			$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);
			$mesActual=   date('m');
			$partidaPeriodo  = $this->Model_DetSegOrden->PartidasEjecutadasPeriodo($mesActual);
			/*foreach($expedienteTecnico->childComponente as $key => $value)
			{
				$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

				foreach($value->childMeta as $index => $item)
				{
					$this->obtenerMetaAnidadaParaValorizacionFisica($item);
				}
			}*/
			//$this->load->view('front/Ejecucion/EControlMetrado/formatoFE02', ['expedienteTecnico' => $expedienteTecnico, 'mes' => $mes, 'partidaPeriodo' => $partidaPeriodo]);

			$html = $this->load->view('front/Ejecucion/EControlMetrado/formatoFE02', ['expedienteTecnico' => $expedienteTecnico, 'mes' => $mes, 'partidaPeriodo' => $partidaPeriodo],true);
			$this->mydompdf->load_html($html);
			$this->mydompdf->set_paper("A4", "portrait");
			$this->mydompdf->render();
			$this->mydompdf->stream("reporteValorizacionFisica.pdf", array("Attachment" => false));
		}
	}
	public function ReporteEstadistico()
	{
		$id_et = isset($_GET['id_et']) ? $_GET['id_et'] : null;
		$expedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($id_et);
		$expedienteTecnico->childComponente=$this->Model_ET_Componente->ETComponentePorIdET($expedienteTecnico->id_et);
		foreach($expedienteTecnico->childComponente as $key => $value)
		{
			$value->childMeta=$this->Model_ET_Meta->ETMetaPorIdComponente($value->id_componente);

			foreach($value->childMeta as $index => $item)
			{
				$this->obtenerMetaAnidadaParaValorizacion($item);

			}
		}
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/Reporte/estadisticasejecucion', ['expedienteTecnico' => $expedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}


	private function obtenerMetaAnidadaParaValorizacionFisica($meta)
	{
		$temp=$this->Model_ET_Meta->ETMetaPorIdMetaPadre($meta->id_meta);

		$meta->childMeta=$temp;

		if(count($temp)==0)
		{
			$meta->childPartida=$this->Model_ET_Partida->ETPartidaPorIdMeta($meta->id_meta);
			foreach($meta->childPartida as $key => $value)
			{
				$fechaActual = date('Y-m-d');
				$mesActual=   date('m');
				$ultimaFechaMesPasado = new DateTime($fechaActual);
				$ultimaFechaMesPasado->modify('last day of previous month');

				$value->childDetallePartida=$this->Model_ET_Detalle_Partida->ETDetallePartidaPorIdPartidaParaValorizacion($value->id_partida);

				$value->childDetallePartida->childDetSegValorizacion=$this->Model_DetSegOrden->valorizadaActual($value->childDetallePartida->id_detalle_partida, $mesActual);

				$value->childDetallePartida->childDetSegValorizacionAnterior=$this->Model_DetSegOrden->valorizadoAnterior($value->childDetallePartida->id_detalle_partida, $ultimaFechaMesPasado->format('Y-m-d'));
			}

			return false;
		}

		foreach($meta->childMeta as $key => $value)
		{
			$this->obtenerMetaAnidadaParaValorizacionFisica($value);
		}
	}

	private function Mes($mes)
	{
		$mesenespaniol = '';
		if ($mes=="January") $mesenespaniol="Enero";
		if ($mes=="February") $mesenespaniol="Febrero";
		if ($mes=="March") $mesenespaniol="Marzo";
		if ($mes=="April") $mesenespaniol="Abril";
		if ($mes=="May") $mesenespaniol="Mayo";
		if ($mes=="June") $mesenespaniol="Junio";
		if ($mes=="July") $mesenespaniol="Julio";
		if ($mes=="August") $mesenespaniol="Agosto";
		if ($mes=="September") $mesenespaniol="Setiembre";
		if ($mes=="October") $mesenespaniol="Octubre";
		if ($mes=="November") $mesenespaniol="Noviembre";
		if ($mes=="December") $mesenespaniol="Diciembre";
		return $mesenespaniol;
	}

}
