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
		$this->load->model("Model_ET_Img");
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
		$listarExpedienteFicha001=$this->Model_ET_Expediente_Tecnico->reporteExpedienteFicha001($Opcion,$id_ExpedienteTecnico);
		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteExpedienteTecnico',["listarExpedienteFicha001" => $listarExpedienteFicha001],true);
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
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/index.php',['listaExpedienteTecnico'=>$listaExpedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function insertar()
	{
       if($_POST)
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


			$this->Model_ET_Expediente_Tecnico->insertar($flat,$txtNombreUe,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioEconomica,$txtResumenProyecto,$txtNumFolio); 
			
			$UltimoExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->UltimoExpedienteTecnico();
			$id_et=$UltimoExpedienteTecnico->id_et;
			
			$comboResponsableElaboracion=$this->input->post('comboResponsableElaboracion');					
			$comboTipoResponsableElaboracion=$this->input->post('comboTipoResponsableElaboracion');
			$comboCargoElaboracion=$this->input->post('comboCargoElaboracion');


			$this->Model_ET_Responsable->insertarET_Epediente($id_et,$comboResponsableElaboracion,$comboTipoResponsableElaboracion,$comboCargoElaboracion);
			/*$txtDNI=$this->input->post('txtDNI');
			$txtRegistroProfesional=$this->input->post('txtRegistroProfesional');
			$txtDireccionElaborador=$this->input->post('txtDireccionElaborador');
			$txtDireccionElaborador=$this->input->post('txtDireccionElaborador');
			$txtTelefElaborador=$this->input->post('txtTelefElaborador');*/
			$ComboResponsableEjecucion=$this->input->post('ComboResponsableEjecucion');	
			$ComboTipoResponsableEjecucion=$this->input->post('ComboTipoResponsableEjecucion');									
			$comboCargoEjecucion=$this->input->post('comboCargoEjecucion');


			$this->Model_ET_Responsable->insertarET_Epediente($id_et,$ComboResponsableEjecucion,$ComboTipoResponsableEjecucion,$comboCargoEjecucion);
			/*$txtProfesionEjecutor=$this->input->post('txtProfesionEjecutor');
			$txtDNIEjecutor=$this->input->post('txtDNIEjecutor');
			$txtRegistroProEjecutor=$this->input->post('txtRegistroProEjecutor');
			$txtDireccionEjecutor=$this->input->post('txtDireccionEjecutor');
			$txtTelefonoEjecutor=$this->input->post('txtTelefonoEjecutor');*/
			$config = array(
				"upload_path" => "./uploads/ImageExpediente",
				'allowed_types' => "jpg|png"
			);
			$variablefile= $_FILES;
			$info = array();
			$files = count($_FILES['imagen']['name']);
			for ($i=0; $i < $files; $i++) 
			{ 
				$_FILES['imagen']['name'] = $variablefile['imagen']['name'][$i];
				$_FILES['imagen']['type'] = $variablefile['imagen']['type'][$i];
				$_FILES['imagen']['tmp_name'] = $variablefile['imagen']['tmp_name'][$i];
				$_FILES['imagen']['error'] = $variablefile['imagen']['error'][$i];
				$_FILES['imagen']['size'] = $variablefile['imagen']['size'][$i];
				$this->upload->initialize($config);
				if ($this->upload->do_upload('imagen'))
				 {
					$this->Model_ET_Img->insertarImgExpediente($UltimoExpedienteTecnico->id_et,$_FILES['imagen']['name']);
				 }
				else
				 {
						$this->db->trans_rollback();
						echo json_encode("Datos No Registrados Correctamente");
				 }
			}
			$this->upload->data();
			$this->db->trans_complete();

			echo json_encode("Datos Registrados Correctamente");

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
			//this->db->trans_start(); 
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

			/*if(count($this->Model_ET_Expediente_Tecnico->ValidarExpedienteTecnico($hdIdExpediente,$txtIdPi))>0)
            {	
            	echo json_encode(['proceso' => 'error', 'mensaje' => 'Este tipo de descripcion ya fue registrado con anterioridad .']);exit;
            }*/

			$this->Model_ET_Expediente_Tecnico->editar($flat,$hdIdExpediente,$txtNombreUe,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRucUE,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncionProgramatica,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio);
			//$this->db->trans_complete();
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos Editados Correctamente.', 'txtDireccionUE' => $txtDireccionUE]);exit;
		}
		$id_et=$this->input->GET('id_et');
		$ExpedienteTecnicoM=$this->Model_ET_Expediente_Tecnico->DatosExpediente($id_et);
		$this->load->view('front/Ejecucion/ExpedienteTecnico/editar',['ExpedienteTecnicoM'=>$ExpedienteTecnicoM]);
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

		$html= $this->load->view('front/Ejecucion/ExpedienteTecnico/reporteMetrado',['MostraExpedienteTecnicoExpe'=>$MostraExpedienteTecnicoExpe], true);
		$this->mydompdf->load_html($html);
		$this->mydompdf->render();
		$this->mydompdf->stream("ReporteMetrado.pdf", array("Attachment" => false));
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
			/*if(count($this->Model_ET_Expediente_Tecnico->VerificarExpedienteAntesEliminar($id_et))>0)
            {	
            	echo json_encode("No es posible eliminar el registro ");
            }*/
			$this->Model_ET_Expediente_Tecnico->eliminar($flat,$id_et);
			echo json_encode($Data);
		}
	}
}