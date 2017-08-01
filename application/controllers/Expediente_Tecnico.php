<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Expediente_Tecnico extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	function _load_layout($template)
	{
		$this->load->view('layout/Ejecucion/header');
		$this->load->view($template);
		$this->load->view('layout/Ejecucion/footer');
	}
	public function reportePdfEcpedienteTecnico()
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
        $pdf->AddPage();
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        
        ini_set('memory_limit', '8192M');
        $opcion="";
	    $prov="";
	    $contenido="";
	    $pdf->Write(10, 'FORMATO FF -01', '', 0, 'C', true, 0, false, false, 0);
	    $pdf->Write(10, 'FICHA TECNICA DE PROYECTO', '', 0, 'C', true, 0, false, false, 0);
	    $pdf->Ln(1);
		$pdf->SetFont('times','', 9);        
		$pdf->Cell(80, 5,'1   Nombre de la Unidad Ejecutora', 1, 'C', 1,2);
		$pdf->Cell(110, 5,'', 1, 'C', 1, 2);
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
		
	    $nombre_archivo = utf8_decode("Ficha Técnica del Proyecto".$prov.".pdf");
	    $pdf->Output($nombre_archivo, 'I');
	}

	public function index()
	{
		$this->_load_layout('front/Ejecucion/ExpedienteTecnico/index.php');
	}
}