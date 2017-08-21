<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expediente_Tecnico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_ET_Expediente_Tecnico');
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
		$this->load->model('Model_ET_Analisis_Unitario');
		$this->load->library('mydompdf');
	}

	function _load_layout($template)
	{
		$this->load->view('layout/Ejecucion/header');
		$this->load->view($template);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function reportePdfExpedienteTecnico($id_ExpedienteTecnico)
	{
		$Opcion="ReporteFichaTecnica01";
		$ImagenesExpediente=$this->Model_ET_Expediente_Tecnico->ET_Img($id_ExpedienteTecnico);
		$listarExpedienteFicha001=$this->Model_ET_Expediente_Tecnico->reporteExpedienteFicha001($Opcion,$id_ExpedienteTecnico);
		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteExpedienteTecnico',["listarExpedienteFicha001" => $listarExpedienteFicha001, "ImagenesExpediente" =>$ImagenesExpediente],true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->set_paper("A4", "portrait");
		$this->mydompdf->render();
		$this->mydompdf->set_base_path('./assets/css/dompdf.css'); //agregar de nuevo el css
		$this->mydompdf->stream("ReporteExpedienteTecnico.pdf", array("Attachment" => false));
	}

	public function index()
	{
		$flat="LISTAR";
		$listaExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListar($flat);

		$flat1="LISTARETAPA";
		$id_etapa_et="2";
		$listaExpedienteTecnicoEtapa=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListarEtapa($flat1,$id_etapa_et);

		$flat="LISTARETAPA";
		$id_etapa_et="3";
		$listaExpedienteEjecucionDeductivo=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListarEtapa($flat,$id_etapa_et);

		$flat="LISTARETAPA";
		$id_etapa_et="4";
		$listaExpedienteEjecucionAdicional=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListarEtapa($flat,$id_etapa_et);

		$flat2="LISTARETAPA";
		$id_etapa_et="5";
		$listaExpedienteTecnicoModificacion=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListarEtapa($flat1,$id_etapa_et);
		//var_dump($listaExpedienteTecnicoModificacion);exit;
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/index.php',['listaExpedienteTecnico'=>$listaExpedienteTecnico,'listaExpedienteTecnicoEtapa'=>$listaExpedienteTecnicoEtapa,'listaExpedienteTecnicoModificacion'=>$listaExpedienteTecnicoModificacion,'listaExpedienteEjecucionDeductivo'=>$listaExpedienteEjecucionDeductivo,'listaExpedienteEjecucionAdicional'=>$listaExpedienteEjecucionAdicional]);
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

	        $config['upload_path']   = './uploads/ResolucioExpediente/';
	        $config['allowed_types'] = '*';
	        $config['max_width']     = 2000;
	        $config['max_height']    = 2000;
	        $config['max_size']      = 50000;
	        $config['encrypt_name']  = false;
	        $this->load->library('upload', $config);
			$this->upload->do_upload('Documento_Resolucion');
		
			$flat  = "INSERTAR";
			$txtIdPi=$this->input->post('txtIdPi');
			$txtNombreUe=$this->input->post('txtNombreUe');
			$txtDireccionUE=$this->input->post('txtDireccionUE');
			$txtUbicacionUE=$this->input->post('txtUbicacionUE');
			$txtTelefonoUE=$this->input->post('txtTelefonoUE');
			$txtRuc=$this->input->post('txtRuc');
			$txtNombrePip=$this->input->post('txtNombrePip');
			$txtUbicacionPip=$this->input->post('txtUbicacionPip');
			$txtCodigoUnico=$this->input->post('txtCodigoUnico');
			$txtCostoTotalPreInversion=$this->input->post('txtCostoTotalPreInversion');
			$txtCostoDirectoPre=$this->input->post('txtCostoDirectoPre');
			$txtCostoIndirectoPre=$this->input->post('txtCostoIndirectoPre');
			$txtCostoTotalInversion=$this->input->post('txtCostoTotalInversion');
			$txtCostoDirectoInversion=$this->input->post('txtCostoDirectoInversion');
			$txtGastosGenerales=$this->input->post('txtGastosGenerales');
			$txtGastosSupervision=$this->input->post('txtGastosSupervision');
			$txtFuncionProgramatica=$this->input->post('txtFuncionProgramatica');
			$txtFuncion=$this->input->post('txtFuncion');
			$txtPrograma=$this->input->post('txtPrograma');
			$txtSubPrograma=$this->input->post('txtSubPrograma');
			$txtProyecto=$this->input->post('txtProyecto');
			$txtComponente=$this->input->post('txtComponente');
			$txtMeta=$this->input->post('txtMeta');
			$txtFuenteFinanciamiento=$this->input->post('txtFuenteFinanciamiento');
			$txtModalidadEjecucion=$this->input->post('txtModalidadEjecucion');
			$txtTiempoEjecucionPip=$this->input->post('txtTiempoEjecucionPip');
			$txtNumBeneficiarios=$this->input->post('txtNumBeneficiarios');
			$txtUrlDocAprobacion=$this->upload->file_name;//$this->input->post('txtUrlDocAprobacion');
			$txtSituacioActual=$this->input->post('hdtxtSituacioActual');
			$txtSituacioEconomica=$this->input->post('hdtxtSituacioEconomica');
			$txtResumenProyecto=$this->input->post('hdtxtResumenProyecto');
			$txtNumFolio=$this->input->post('txtNumFolio');
			$etapa_et=$id_etapa_et;

			$this->Model_ET_Expediente_Tecnico->insertar($flat,$txtNombreUe,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioEconomica,$txtResumenProyecto,$txtNumFolio,$etapa_et); 
			
			$UltimoExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico();
			$id_et=$UltimoExpedienteTecnico->id_et;
			
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
				$_FILES['imagen']['name'] =$idImageExp->id_img.'.'.$nombre[1];//(string)($idImageExp->id_img.'.'.$nombre[1].'.'.$nombre[1]);// $variablefile['imagen']['name'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('imagen'))
				 {
					$this->Model_ET_Img->insertarImgExpediente($UltimoExpedienteTecnico->id_et,($idImageExp->id_img.'.'.$nombre[1]));
				 }
				else
				 {
						$this->db->trans_rollback();

						$error = "ERROR NO SE CARGO LAS FOTOS DE EXPEDIENTE TÉCNICO";
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

  			$opcion  = "002";//
  			$listaTipoResponsableEjecucion=$this->Model_ET_Tipo_Responsable->NombreTipoResponsable($opcion);
			
			$listarPersona=$this->Model_Personal->listarPersona();
			$codigo_unico_pi=$this->input->get('CodigoUnico');
			$Listarproyectobuscado=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoBuscar($codigo_unico_pi); //BUSCAR PIP
			$this->load->view('front/Ejecucion/ExpedienteTecnico/insertar',['Listarproyectobuscado'=>$Listarproyectobuscado,'listarPersona' =>$listarPersona,'listaTipoResponsableElaboracion' => $listaTipoResponsableElaboracion,'listaTipoResponsableEjecucion' => $listaTipoResponsableEjecucion,'listarCargo' =>$listarCargo]);
		}			
	}

	function editar()
	{
		if($this->input->post('hdIdExpediente'))
		{	
			$this->db->trans_start(); 

	        $config['upload_path']   = './uploads/ResolucioExpediente/';
	        $config['allowed_types'] = '*';
	        $config['max_width']     = 2000;
	        $config['max_height']    = 2000;
	        $config['max_size']      = 50000;
	        $config['encrypt_name']  = false;
	        $this->load->library('upload', $config);
			$this->upload->do_upload('Documento_Resolucion');

			$flat ="EDITAR";

			$hdIdExpediente=$this->input->post('hdIdExpediente');
			//$txtIdPi=$this->input->post('txtIdPi');
			$txtNombreUe=$this->input->post('txtNombreUe');
			$txtDireccionUE=$this->input->post('txtDireccionUE');
			$txtUbicacionUE=$this->input->post('txtUbicacionUE');
			$txtTelefonoUE=$this->input->post('txtTelefonoUE');
			$txtRucUE=$this->input->post('txtRucUE');
			$txtCostoTotalPreInversion=$this->input->post('txtCostoTotalPreInversion');
			$txtCostoDirectoPre=$this->input->post('txtCostoDirectoPre');
			$txtCostoIndirectoPre=$this->input->post('txtCostoIndirectoPre');
			$txtCostoTotalInversion=$this->input->post('txtCostoTotalInversion');
			$txtCostoDirectoInversion=$this->input->post('txtCostoDirectoInversion');
			$txtGastosGenerales=$this->input->post('txtGastosGenerales');
			$txtGastosSupervision=$this->input->post('txtGastosSupervision');
			$txtFuncionProgramatica=$this->input->post('txtFuncionProgramatica');
			$txtFuncion=$this->input->post('txtFuncion');
			$txtPrograma=$this->input->post('txtPrograma');
			$txtSubPrograma=$this->input->post('txtSubPrograma');
			$txtProyecto=$this->input->post('txtProyecto');
			$txtComponente=$this->input->post('txtComponente');
			$txtMeta=$this->input->post('txtMeta');
			$txtFuenteFinanciamiento=$this->input->post('txtFuenteFinanciamiento');
			$txtModalidadEjecucion=$this->input->post('txtModalidadEjecucion');
			$txtTiempoEjecucionPip=$this->input->post('txtTiempoEjecucionPip');
			$txtNumBeneficiarios=$this->input->post('txtNumBeneficiarios');
			$txtSituacioActual=$this->input->post('txtSituacioActual');
			$txtSituacioDeseada=$this->input->post('txtSituacioDeseada');
			$txtContribucioInterv=$this->input->post('txtContribucioInterv');
			$txtNumFolio=$this->input->post('txtNumFolio');
	
			$this->Model_ET_Expediente_Tecnico->editar($flat,$hdIdExpediente,$txtNombreUe,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRucUE,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio);
			
			//$UltimoExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico();
			//$id_et=$UltimoExpedienteTecnico->id_et;

			$this->session->set_flashdata('correcto', 'Expediente Tecnico modificado correctamente.');
			$config = array(
				"upload_path" => "./uploads/ImageExpediente",
				'allowed_types' => "jpg|png"
			);
			$variablefile= $_FILES;
			$info = array();
			$files = count($_FILES['imagen']['name']);
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
				$_FILES['imagen']['name'] =$idImageExp->id_img.'.'.$nombre[1];//(string)($idImageExp->id_img.'.'.$nombre[1].'.'.$nombre[1]);// $variablefile['imagen']['name'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('imagen'))
				 {
					$this->Model_ET_Img->insertarImgExpediente($hdIdExpediente,($idImageExp->id_img.'.'.$nombre[1]));
				 }
				else
				 {
						$this->db->trans_rollback();

						$error = "ERROR NO SE CARGO LAS FOTOS DE EXPEDIENTE TÉCNICO";
				 }
			}
			$this->db->trans_complete();
			//echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos Editados Correctamente.', 'txtDireccionUE' => $txtDireccionUE]);exit;
			return redirect('/Expediente_Tecnico');
		}
		
		$id_et=$this->input->GET('id_et');
		$listaimg=$this->Model_ET_Img->ListarImagen($id_et);

  		/*$eliminarImg=$this->Model_ET_Expediente_Tecnico->ET_Img($id_et);
        foreach ($eliminarImg as $value) 
        {
            unlink("uploads/ImageExpediente/".$value->desc_img);
        }
        if($this->Model_ET_Img->EliminarImagen($id_et)==true)
        {   
            echo json_encode("correcto se elimino");
        }*/

		$ExpedienteTecnicoM=$this->Model_ET_Expediente_Tecnico->DatosExpediente($id_et);
		return $this->load->view('front/Ejecucion/ExpedienteTecnico/editar',['ExpedienteTecnicoM'=>$ExpedienteTecnicoM, 'listaimg'=>$listaimg]);
	}

    function registroBuscarProyecto()
    {
    		$CodigoUnico=$this->input->get('inputValue');
			$Registrosproyectobuscos=$this->Model_ET_Expediente_Tecnico->ExpedienteContarRegistros($CodigoUnico); //BUSCAR PIP
			echo  json_encode($Registrosproyectobuscos);
    }

	function reportePdfMetrado($id_ExpedienteTecnico)
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
	public function reportePdfPresupuestoAnalitico($id_et)
	{		
        $opcion="BuscarExpedienteID";
		$MostraExpedienteNombre=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoSelectBuscarId($opcion,$id_et);

		$flat="REPORTEPRESUPUESTOANALITICO";
		$litarPresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->listarPresupuestoAnalitico($flat,$id_et);
		//$litarPresupuestoAnalitico=$this->Model_ET_Presupuesto_Analitico->ETPresupuestoAnaliticoPorIdET($flat,$id_et);

        $this->load->library('mydompdf');
        $html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePdfPresupuestoAnalitico',['MostraExpedienteNombre' => $MostraExpedienteNombre,'litarPresupuestoAnalitico' =>$litarPresupuestoAnalitico], true);
        $this->mydompdf->load_html($html);
        $this->mydompdf->set_paper('letter', 'landscape');
        $this->mydompdf->render();
        $this->mydompdf->stream("reportePdfPresupuestoAnalitico.pdf", array("Attachment" => false));
    }
	public function reportePdfPresupuestoFF05($id_ExpedienteTecnico)
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
		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reportePresupuestoFF05',['MostraExpedienteTecnicoExpe'=>$MostraExpedienteTecnicoExpe,'MostraExpedienteNombre' => $MostraExpedienteNombre], true);
		$this->mydompdf->set_paper('latter','landscape');
		$this->mydompdf->load_html($html);
		$this->mydompdf->render();
		$this->mydompdf->stream("reportePresupuestoFF05.pdf", array("Attachment" => false));
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
		if ($this->input->is_ajax_request()) 
	    {
			$flat="ELIMINAR";
			$id_et=$this->input->post('id_et');

			if((count($this->Model_ET_Expediente_Tecnico->VerificarComponenteExpedienteAntesEliminar($id_et))>0) || (count($this->Model_ET_Expediente_Tecnico->VerificarETPresupuestoAnaliticoExpedienteAntesEliminar($id_et))>0) || (count($this->Model_ET_Expediente_Tecnico->VerificarETTareaGantt($id_et))>0) )
            {	
            	echo json_encode('No se puede eliminar este expediente tecnico.');exit;
            }
           	else
           	{
           		$eliminarImg=$this->Model_ET_Expediente_Tecnico->ET_Img($id_et);
           		foreach ($eliminarImg as $value) 
           		{
           			if (file_exists("uploads/ImageExpediente/'".$value->desc_img."'"))
           			{ 
					   	unlink("uploads/ImageExpediente/".$value->desc_img);
					}else
					{ 
					   
					} 
           		}
           		if($this->Model_ET_Expediente_Tecnico->eliminar($flat,$id_et)==true)
	            {	//$img=$this->Model_ET_Img->eliminarimg()
	            	
	            	echo json_encode("correcto se elimino");
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
		$this->load->view('front/Ejecucion/ExpedienteTecnico/documentoExpediente.php',['ListarDocumentoExpediente'=>$ListarDocumentoExpediente,'expedienteTecnico' => $expedienteTecnico]);	
	}
	
	public function DetalleExpediente()
	{
		$id_et=$this->input->post('id_et');
		$detalleExpediente=$this->Model_ET_Expediente_Tecnico->DetalleExpediente($id_et);
		//var_dump($detalleExpediente);exit;
		$this->load->view('front/Ejecucion/ExpedienteTecnico/detalleExpediente.php',["detalleExpediente" => $detalleExpediente]);	
	}

	public function clonar($idExpedienteTecnico=null, $idEtapaExpedienteTecnico=null)
	{
		$idExpedienteTecnico=$this->input->post('idExpedienteTecnico');
		$idEtapaExpedienteTecnico=$this->input->post('idEtapaExpedienteTecnico');

		if($idExpedienteTecnico!=null && $idEtapaExpedienteTecnico!=null)
		{
			$this->db->trans_start();

			$etExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnico($idExpedienteTecnico);

			if($etExpedienteTecnico->id_etapa_et==$idEtapaExpedienteTecnico)
			{
				echo json_encode(['proceso' => 'Error', 'mensaje' => 'No se puede clonar expediente técnico para la misma etapa.']);exit;
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

			$this->Model_ET_Expediente_Tecnico->clonar($etExpedienteTecnico->id_et, $idEtapaExpedienteTecnico);

			$listaETImgOrigen=$this->Model_ET_Img->ListarImagen($etExpedienteTecnico->id_et);
			$listaETImgDestino=$this->Model_ET_Img->ListarImagen($this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico()->id_et);

			foreach($listaETImgOrigen as $key => $value)
			{
				$nombreImgTemp=$listaETImgDestino[$key]->id_img.'.'.(explode('.', $value->desc_img)[count(explode('.', $value->desc_img))-1]);

				$this->Model_ET_Img->updateDescImagePorIdImg($listaETImgDestino[$key]->id_img, $nombreImgTemp);

				if(file_exists('./uploads/ImageExpediente/'.$value->desc_img))
				{
					copy('./uploads/ImageExpediente/'.$value->desc_img, './uploads/ImageExpediente/'.$nombreImgTemp);
				}
			}

			$this->db->trans_complete();

			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Clonación de expediente en la etapa seleccionada realizado correctamente.']);exit;
		}

		$listaETEtapaEjecucion=$this->Model_ET_Etapa_Ejecucion->ETEtapaEjecucion_Listar('R');

		return $this->load->view('front/Ejecucion/ExpedienteTecnico/modalParaClonar', ['idExpedienteTecnico' => $idExpedienteTecnico, 'listaETEtapaEjecucion' => $listaETEtapaEjecucion]);
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
}