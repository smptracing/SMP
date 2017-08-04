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
		$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('DETALLE');
        $pdf->SetTitle('FICHA TECNICA DEL PROYECTO');
        $pdf->SetSubject('');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->setFontSubsetting(true);
		$pdf->SetFont('times', '', 10); 
		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);
        $pdf->AddPage();

        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        
        ini_set('memory_limit', '8192M');
        $opcion="";
	    $prov="";
	    $contenido="";
	    $pdf->Write(10, 'FORMATO FF -01', '', 0, 'C', true, 0, false, false, 0);
	    $pdf->Write(10, 'FICHA TECNICA DE PROYECTO ', '', 0, 'C', true, 0, false, false, 0);
	    $pdf->Ln(1);
		$pdf->SetFont('times','', 9);        
		$pdf->Cell(80, 5,'1   Nombre de la Unidad Ejecutora', 1, 'C', 1,2);
		$pdf->Cell(110, 5,$id_ExpedienteTecnico, 1, 'C', 1, 2);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				1.2   Distrito/Provincia/Departamento', 1, 'C', 1,3);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 3);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				1.3   Teléfono', 1, 'C', 1,4);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 4);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				1.4   RUC', 1, 'C', 1,5);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 5);
		$pdf->Ln();

		$pdf->Cell(80, 5,'2   Nombre del Proyecto', 1, 'C', 1,6);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 6);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				2.1  Ubicación distrital donde se plantea su ejecución', 1, 'C', 1,7);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 7);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				2.2   Codigo único', 1, 'C', 1,8);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 8);
		$pdf->Ln();

		$pdf->Cell(80, 5,'3   Costo Total Proyecto(Pre Invesión)', 1, 'C', 1,9);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 9);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				3.1  Costo Directo', 1, 'C', 1,10);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 10);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				3.2   Costo Indirecto', 1, 'C', 1,11);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 11);
		$pdf->Ln();

		$pdf->Cell(80, 5,'4   Costo Total Proyecto(Invesión)', 1, 'C', 1,12);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 12);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				4.1  Costo Directo', 1, 'C', 1,13);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 13);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				4.2   Costo General', 1, 'C', 1,14);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 14);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				4.2   Gasto de Supervisión', 1, 'C', 1,15);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();

		$pdf->Cell(80, 5,'5   Costo Total Proyecto(Invesión)', 1, 'C', 1,12);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 12);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.1  FUNCIÓN', 1, 'C', 1,13);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 13);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.2   PROGRAMA', 1, 'C', 1,14);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 14);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.3   SUB PROGRAMA', 1, 'C', 1,15);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.4   PROYECTO', 1, 'C', 1,15);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.5  COMPONENTE', 1, 'C', 1,13);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 13);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.6   META', 1, 'C', 1,14);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 14);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.7   FUENTE DE FINANCIAMIENTO', 1, 'C', 1,15);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				5.8   MODALIDAD DE EJECUCIÓN', 1, 'C', 1,15);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();

		$pdf->Cell(80, 5,'6   Tiempo de Ejecución del Proyecto', 1, 'C', 1,16);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 15);
		$pdf->Ln();

		$pdf->Cell(80, 5,'7   Número de Beneficiario Indirecto del Proyecto', 1, 'C', 1,16);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 16);
		$pdf->Ln();

		$pdf->Cell(80, 5,'8   Nombre del Responsable de la Elavoración del Proyecto', 1, 'C', 1,17);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 17);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				8.1  Profesíon', 1, 'C', 1,18);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 18);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				8.2   DNI', 1, 'C', 1,19);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 19);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				8.3   Registro Profesíon N°', 1, 'C', 1,20);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 20);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				8.4   Dirección', 1, 'C', 1,21);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 21);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				8.5  Teléfono', 1, 'C', 1,22);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 22);
		$pdf->Ln();

		$pdf->Cell(80, 5,'9   Nombre del Responsable de la Ejecución del proyecto', 1, 'C', 1,23);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 23);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				9.1  Profesíon', 1, 'C', 1,24);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 24);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				9.2   DNI', 1, 'C', 1,25);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 25);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				9.3   Registro Profesíon N°', 1, 'C', 1,26);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 26);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				9.4   Dirección', 1, 'C', 1,27);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 27);
		$pdf->Ln();
		$pdf->Cell(80, 5,'				9.5  Teléfono', 1, 'C', 1,28);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 28);
		$pdf->Ln();
		$left_column = '10 Sustento para la presentación del proyecto '."\n".'     10.1   Decripción de la Presentación del proyecto'."\n".
						'       Contenido ........sdsdsdsssdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdssdsdsdsssdsdsdsd dsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds
						sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsds

						.'."\n";
		$pdf->MultiCell(190, 10, $left_column."\n", 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->Ln();
		
		$pdf->SetDisplayMode('fullpage', 'SinglePage', 'UseNone');
		$pdf->SetFont('times', '', 10);
		$pdf->AddPage('P', 'A4');
		$left_column = '10 Sustento para la presentación del proyecto '."\n".'     10.1   Decripción de la Presentación del proyecto'."\n".'[LEFT COLUMN] left column left column left column lef column left cleft column lefleft column left column lef column left cleft column left column lef column left ct column lef column left column'."\n";
		$pdf->MultiCell(190, 0, $left_column, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->Ln();
		$left_column = '10 Sustento para la presentación del proyecto '."\n".'     10.1   Decripción de la Presentación del proyecto'."\n".'[LEFT COLUMN] left column left column left column lef column left cleft column lefleft column left column lef column left cleft column left column lef column left ct column lef column left column'."\n";
		$pdf->MultiCell(190, 0, $left_column, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);

		$pdf->Ln();
		$left_column = '10 Sustento para la presentación del proyecto '."\n".'     10.1   Decripción de la Presentación del proyecto'."\n".'[LEFT COLUMN] left column left column left column lef column left cleft column lefleft column left column lef column left cleft column left column lef column left ct column lef column left column'."\n";
		$pdf->MultiCell(190, 0, $left_column, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);

			$pdf->Ln();
		$left_column = '14 Fotografias(04 mínimo) '."\n".'					Estado actual <img src="images/logo_example.png" border="0" height="41" width="41" align="top" />'."\n";
		$pdf->MultiCell(190, 0, $left_column, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
		

		$pdf->lastPage();

	    $nombre_archivo = utf8_decode("Ficha Técnica del Proyecto".$prov.".pdf");
	    $pdf->Output($nombre_archivo, 'I');
	}

	public function index()
	{
		$listaExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListar();
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/index.php',['listaExpedienteTecnico'=>$listaExpedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function insertar()
	{
		if($_POST)
		{
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
			$txtResponsableElaboracion=$this->input->post('txtResponsableElaboracion');
			$txtUrlDocAprobacion=$this->input->post('txtUrlDocAprobacion');
			$txtDNI=$this->input->post('txtDNI');
			$txtRegistroProfesional=$this->input->post('txtRegistroProfesional');
			$txtDireccionElaborador=$this->input->post('txtDireccionElaborador');
			$txtTelefElaborador=$this->input->post('txtTelefElaborador');
			$txtDireccionElaborador=$this->input->post('txtDireccionElaborador');
			$txtProfesionEjecutor=$this->input->post('txtProfesionEjecutor');
			$txtDNIEjecutor=$this->input->post('txtDNIEjecutor');
			$txtRegistroProEjecutor=$this->input->post('txtRegistroProEjecutor');
			$txtDireccionEjecutor=$this->input->post('txtDireccionEjecutor');
			$txtTelefonoEjecutor=$this->input->post('txtTelefonoEjecutor');
			$txtSituacioActual=$this->input->post('txtSituacioActual');
			$txtSituacioDeseada=$this->input->post('txtSituacioDeseada');
			$txtContribucioInterv=$this->input->post('txtContribucioInterv');
			$txtNumFolio=$this->input->post('txtNumFolio');

			$this->Model_ET_Expediente_Tecnico->insertar($flat,$txtIdPi,$txtDireccionUE,$txtUbicacionUE,$txtTelefonoUE,$txtRuc,$txtCostoTotalPreInversion,$txtCostoDirectoPre,$txtCostoIndirectoPre,$txtCostoTotalInversion,$txtCostoDirectoInversion,$txtGastosGenerales,$txtGastosSupervision,$txtFuncion,$txtPrograma,$txtSubPrograma,$txtProyecto,$txtComponente,$txtMeta,$txtFuenteFinanciamiento,$txtModalidadEjecucion,$txtTiempoEjecucionPip,$txtNumBeneficiarios,$txtUrlDocAprobacion,$txtSituacioActual,$txtSituacioDeseada,$txtContribucioInterv,$txtNumFolio); 
			echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos registrados correctamente.']);exit;  
		}

			//$this->load->view('front/Ejecucion/ExpedienteTecnico/insertar');

			//BUSCAR EL PROYECTO DE INVERSION
			$codigo_unico_pi=$this->input->get('CodigoUnico');
			$Listarproyectobuscado=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoBuscar($codigo_unico_pi); //BUSCAR PIP
			$this->load->view('front/Ejecucion/ExpedienteTecnico/insertar',['Listarproyectobuscado'=>$Listarproyectobuscado]);
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

	
}