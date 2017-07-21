<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Presupuesto_Inv extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_FE_Presupuesto_Inv');
		$this->load->model('Model_FE_Detalle_Gasto');
	}

	public function index($idEstInv)
    {
    	$nombreProyecto=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($idEstInv);
    	$ListarPresupuesto=$this->Model_FE_Presupuesto_Inv->ListarPresupuesto($idEstInv);

        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/index', ['ListarPresupuesto' => $ListarPresupuesto, 'nombreProyectoInv' => $nombreProyecto]);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

	public function insertar()
	{
		if($_POST)
		{			
			$idEstudioInversion=$this->input->post('idEstudioInversion');
			$idSector=$this->input->post('cbx_Sector');
			$txtPliego=$this->input->post('txtPliego');

			$this->Model_FE_Presupuesto_Inv->insertar($idEstudioInversion, $idSector, $txtPliego);

			$data=$this->Model_FE_Presupuesto_Inv->ultimoIdPresupuestoInv();

			$idPresupuestoFE=$data->id;
			$idFuenteFinan=$this->input->post('hdIdFuente');
			$hdCorrelativoMeta=$this->input->post('hdCorrelativoMeta');
			$hdAnio=$this->input->post('hdAnio');
	    	
	    	for($i=0; $i<count($hdAnio); $i++)
	    	{
	    		$this->Model_FE_Presupuesto_Inv->insertarPresupuestoFuente($idPresupuestoFE, $idFuenteFinan[$i], $hdCorrelativoMeta[$i], $hdAnio[$i]);
	    	}

	    	echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.', 'idEstudioInversion' => $idEstudioInversion]);exit;
		}

		$idEstInv=$this->input->get('idEstInv');

		$nombreProyectoInver=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($idEstInv);

		$listarSector=$this->Model_FE_Presupuesto_Inv->listarSector();
		$listarFuenteFinanciamiento=$this->Model_FE_Presupuesto_Inv->listarFuenteFinanciamiento();
		
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/insertar', ['listarSector' => $listarSector,'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento,'nombreProyectoInver' => $nombreProyectoInver]);
	}

	public function verDetalle()
	{
	
		$id_est_inv=$this->input->get('id_est_inv');
		$nombreProyectoInver=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($id_est_inv);

	    $SectorPliego=$this->Model_FE_Presupuesto_Inv->SectorPliego($id_est_inv)[0];

	    $id_detalle_presupuesto=$this->input->get('id');
	    $listaFEDetallePresupuestoT=$this->Model_FE_Presupuesto_Inv->TipoGastoDetallePresupuesto($id_detalle_presupuesto);

	    foreach($listaFEDetallePresupuestoT as $key => $value)
	    {
	    	$value->childFEDetalleGasto=$this->Model_FE_Detalle_Gasto->ListarPorIdDetallePresupuesto($value->id_detalle_presupuesto);
	    }

	    var_dump($listaFEDetallePresupuestoT);exit;

	    $id_presupuesto_fe=$this->input->get('id');
	    $ListarFuente=$this->Model_FE_Presupuesto_Inv->ListarFuente($id_presupuesto_fe);

		$this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/verDetalle',['nombreProyectoInver' => $nombreProyectoInver, 'SectorPliego' => $SectorPliego ,'listaFEDetallePresupuestoT'=>$listaFEDetallePresupuestoT , 'ListarFuente' => $ListarFuente]);
	}


	public function editar()
	{
		if($this->input->post('hdIdPresupuestoFE'))
		{
			$idPresupuestoFE=$this->input->post('hdIdPresupuestoFE');
			$idSector=$this->input->post('cbx_Sector');
			$txtPliego=$this->input->post('txtPliego');

			$Data=$this->Model_FE_Presupuesto_Inv->editar($idPresupuestoFE, $idSector, $txtPliego);

			$this->Model_FE_Presupuesto_Inv->FEPresupuestoFuenteEliminarPorIdPresupuestoFE($idPresupuestoFE);

			$hdIdFuente=$this->input->post('hdIdFuente');
			$hdCorrelativoMeta=$this->input->post('hdCorrelativoMeta');
			$hdAnio=$this->input->post('hdAnio');
	    	
	    	for($i=0; $i<count($hdIdFuente); $i++)
	    	{
	    		$this->Model_FE_Presupuesto_Inv->insertarPresupuestoFuente($idPresupuestoFE, $hdIdFuente[$i], $hdCorrelativoMeta[$i], $hdAnio[$i]);
	    	}

	    	echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos guardados correctamente.', 'idEstudioInversion' => $this->input->post('idEstudioInversion')]);exit;
		}

		$fePresupuestoInv=$this->Model_FE_Presupuesto_Inv->FEPresupuestoInvParaEditar($this->input->post('idPresupuestoFE'));

		$listarSector=$this->Model_FE_Presupuesto_Inv->listarSector();
		$listarFuenteFinanciamiento=$this->Model_FE_Presupuesto_Inv->listarFuenteFinanciamiento();
		$listaFEPresupuestoFuente=$this->Model_FE_Presupuesto_Inv->listarFEPresupuestoFuente($this->input->post('idPresupuestoFE'));
		
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/editar', ['fePresupuestoInv' => $fePresupuestoInv, 'listarSector' => $listarSector, 'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento, 'listaFEPresupuestoFuente' => $listaFEPresupuestoFuente]);
	}

	public function reportePdfDetalleGasto($id_presupuesto_fe){
 	    $this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('DETALLE');
        $pdf->SetTitle('DETALLE PRESUPUESTO');
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

        $pdf->SetFont('freemono', '',8, '', true);
 

        $pdf->AddPage();

        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
        
        
        $FE_Presupuesto_Inv=$this->Model_FE_Presupuesto_Inv->listarPresupuestoInverAfe($id_presupuesto_fe);
        foreach ($FE_Presupuesto_Inv as $Item)
        {
        	$nombreSecto=$Item->nombre_sector;
        	$pliego=$Item->pliego;
        	$ultimaFuente=$Item->ultima_fuente_finan;
        	$corelativoMeta=$Item->correlativo_meta;
        	$porcentaje_imprevisto=$Item->porcentaje_imprevistos;
        	$monto_imprevistos=number_format(($Item->monto_imprevistos),2);
        	$total_presupuesto=number_format(($Item->total_presupuesto),2);
        	$sub_total_presupuesto=$Item->sub_total_presupuesto;
        }

       $opcion="";
        $html = '';
        $html .= "<style type=text/css>";
        //$html .= "th{color: #000000; font-weight: bold; background-color: #B0eC4D ; border: 1px solid #000000}";
       // $html .= "table{background-color: #bbb; }";
        //$html .= "div{background-color: #bbb;margin-top:-1000px }";
        $html .= "td{background-color: #FFFFFF; color: #000000; border: 0px solid #000000}";
        $html .= "</style>";
        $html .= "<h2> </h2>";
        $html .= "<table cellspacing='0' width='50%'>";
        $html .= <<<EOD
<table  cellpadding="7">
    <tr>
         <th colspan="12" ><center><strong>13. AFECTACIÓN PRESUPUESTAL</strong></center></th>
   </tr>
    <tr>
         <th colspan="12" style="background-color:#f5f5f5;">&nbsp;&nbsp;Financiamiento: Recursos ordinarios - Oficina Regional  de Pre Inversión - Gobierno Regional <br>&nbsp;&nbsp;de Apurímac</th>
   </tr>
</table>
<table border="0"  cellpadding="3">
    <tr>
         <th colspan="6" ><center><strong>Cuadro N° 5:Afectación presupuestal</strong></center></th>
   </tr>

</table>
<table border="1"  cellpadding="7">
    <tr>
         <th colspan="6" ><center><strong>SECTOR: </strong></center></th>
         <th colspan="6" ><center><strong>$nombreSecto </strong></center></th>
   </tr>
    <tr>
         <th colspan="6" ><center><strong>PLIEGO: </strong></center></th>
         <th colspan="6" ><center><strong>$pliego</strong></center></th>
   </tr>
   <tr>
         <th colspan="6" ><center><strong>FUENTE DE FINANCIAMIENTO: </strong></center></th>
         <th colspan="6" ><center><strong>$ultimaFuente</strong></center></th>
   </tr>
   <tr>
         <th colspan="6" ><center><strong>CORRELATIVO META:</strong></center></th>
         <th colspan="6" ><center><strong>$corelativoMeta</strong></center></th>
   </tr>
</table>
<table  cellpadding="7">
    <tr>
         <th colspan="12" ><center><strong>14. PRESUPUESTO PARA LA ELABORACIÓN DEL ESTUDIO</strong></center></th>
   </tr>
    <tr>
         <th colspan="12" style="background-color:#f5f5f5;">&nbsp;&nbsp;<strong>14.1 Valoración estimado</strong></th>
   </tr>
   <tr>
         <th colspan="12" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   El valor estimado para la elaboración del perfil, según estudio de mercado y análisis de <br>
          &nbsp;&nbsp; &nbsp; precios unitarios asciende a la suma de .
         </th>
   </tr>
</table>
<table border="0"  cellpadding="0">
    <tr>
         <th colspan="6" ><center><strong></strong></center></th>
   </tr>
</table>
EOD;
$html .= "</table>";
$pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

     
        $FE_DetalleGastoPadres=$this->Model_FE_Presupuesto_Inv->listarDetalleGastoPadres($id_presupuesto_fe);
        $prov="";
        $pliego="";
        $html = '';
			$html .= "<style type=text/css>";
			$html .= "th{color: #000000; font-weight: bold; border: 1px solid #000000;font-size: 12px;}";
			$html .= "table{color:1px solid #000000;}";
			$html .= "header{background-color: #FFFFFF;}";
			$html .= "td{background-color: #FFFFFF; color: #000000; border: 1px solid #000000;font-weight: normal;}";
			$html .= "</style>";
			$html .= "<h2><CENTER>".$prov."</h2><CENTER><h4></h4>";
			$html .= "<table width='10%'>";
			$html .= "<thead><strong><h3>Cuadro N° 6: Valoración  Referencial para la formulación de la PIP</h3></strong><br><br>";
			$html .="<tr><th>DESCRIPCIÓN</th><th>UNIDAD</th><th>CANTIDAD</th><th>COSTO UNIT.</th><th>COSTO TOTAL</th></tr>";
			$html .="</thead>";
		
		foreach($FE_DetalleGastoPadres as $key => $valor) 
		{
			$html.="<tr><th>" .$FE_DetalleGastoPadres[$key]['desc_tipo_gasto']. "</th><th>".$pliego."</th><th>" .$pliego."</th><th >" . $pliego. "</th><th>" .$FE_DetalleGastoPadres[$key]['total_detalle']. "</th></tr>";

			$subInten=$FE_DetalleGastoPadres[$key]['id_detalle_presupuesto'];
			$FE_DetalleGastoHijo=$this->Model_FE_Presupuesto_Inv->listarDetalleGasto($id_presupuesto_fe,$subInten);

			foreach ($FE_DetalleGastoHijo as $key => $valor)
			{
				$html.="<tr>".
					"<td>".$FE_DetalleGastoHijo[$key]['desc_detalle_gasto']."</td>".
					"<td>".$FE_DetalleGastoHijo[$key]['unidad']."</td>".
					"<td>".$FE_DetalleGastoHijo[$key]['cantidad_detalle_gasto']."</td>".
					"<td>".$FE_DetalleGastoHijo[$key]['costo_uni_detalle_gasto']."</td>".
					"<td>".$FE_DetalleGastoHijo[$key]['sub_total_detalle_gasto']."</td>".
				"</tr>";
			}	      	
		}
			$html.="<tr><th width='5mm'> SUB TOTAL" .$pliego. "</th><th>".$pliego."</th><th>" .$pliego."</th><th >" . $pliego. "</th><th>" .$sub_total_presupuesto. "</th></tr>";
			$html.="<tr><th> Imprevistos( $porcentaje_imprevisto % de S.T.)" .$pliego. "</th><th>".$pliego."</th><th>" .$pliego."</th><th >" . $pliego. "</th><th>" .$monto_imprevistos. "</th></tr>";
			$html.="<tr><th> COSTO TOTAL" .$pliego. "</th><th>".$pliego."</th><th>" .$pliego."</th><th >" . $pliego. "</th><th>" .$total_presupuesto. "</th></tr>";

        $html .= "</table>";
    
    $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
                         
    $nombre_archivo = utf8_decode("Presupuesto de ".$prov.".pdf");
    $pdf->Output($nombre_archivo, 'I');
		
	}

}