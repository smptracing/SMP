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
	
		$id_est_inv=$this->input->get('id');
		$nombreProyectoInver=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($id_est_inv);

	    $SectorPliego=$this->Model_FE_Presupuesto_Inv->SectorPliego($id_est_inv)[0];

	    $id_detalle_presupuesto=$this->input->get('iddetallePresupuesto');
	    $listaFEDetallePresupuestoT=$this->Model_FE_Presupuesto_Inv->TipoGastoDetallePresupuesto($id_detalle_presupuesto);

	    foreach($listaFEDetallePresupuestoT as $key => $value)
	    {
	    	$value->childFEDetalleGasto=$this->Model_FE_Detalle_Gasto->ListarPorIdDetallePresupuesto($value->id_detalle_presupuesto);
	    }

	   //var_dump($listaFEDetallePresupuesto);exit;

	    $id_presupuesto_fe=$this->input->get('idPresupuestoFE');
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

	public function reportePdfPresupuesto(){

		$this->load->library('Pdf');
        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('DETALLE');
        $pdf->SetTitle('DETALLE DE PROYECTOS');
        $pdf->SetSubject('PROYECTO EN CARTERA');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
 		
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config_alt.php de libraries/config
       /* $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' :', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));*/
       // $pdf->setFooterData($tc = array(0, 64, 0), $lc = array(0, 64, 128));
 
// datos por defecto de cabecera, se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 		
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// se pueden modificar en el archivo tcpdf_config.php de libraries/config
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//relación utilizada para ajustar la conversión de los píxeles
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
 
// ---------------------------------------------------------
// establecer el modo de fuente por defecto
        $pdf->setFontSubsetting(true);
 
// Establecer el tipo de letra
 
//Si tienes que imprimir carácteres ASCII estándar, puede utilizar las fuentes básicas como
// Helvetica para reducir el tamaño del archivo.
        $pdf->SetFont('freemono', '',8, '', true);
 
// Añadir una página
// Este método tiene varias opciones, consulta la documentación para más información.
        $pdf->AddPage();
 
//fijar efecto de sombra en el texto
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));
 
// Establecemos el contenido para imprimir


        $html = '';
        $html .= "<style type=text/css>";
        //$html .= "th{color: #000000; font-weight: bold; background-color: #B0eC4D ; border: 1px solid #000000}";
       // $html .= "table{background-color: #bbb; }";
        //$html .= "div{background-color: #bbb;margin-top:-1000px }";
        $html .= "td{background-color: #FFFFFF; color: #000000; border: 1px solid #000000}";
        $html .= "</style>";
        $html .= "<h2> </h2>";
        $html .= "<div>";
        $html .= "<table cellspacing='0' width='50%'>";
        foreach ($ProyectoProgramado as $rows) 
        {
               
         $html .= <<<EOD

<form method="post" action="http://localhost/printvars.php" enctype="multipart/form-data">
<table border="1"  cellpadding="7">

    <tr>
         <th colspan="12" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><strong>DETALLE DE PROYECTOS DE INVERSIÓN</strong></center></th>
   </tr>
    <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;DATOS DEL PROYECTOS DE INVERSIÓN</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
    <tr>
         <th colspan="6"><strong><i>Código Único </i></strong></th>
         <th colspan="6">$codigo_unico_pi</th>
   </tr>
   <tr>
   <th colspan="6"><strong><i>Nombre del Proyecto</i></strong></th>
       <th colspan="6">$nombre_pi</th>
   </tr>
     <tr>
     <th colspan="6"><strong><i>Fecha Registro</i></strong></th>
         <th colspan="6">$fecha_registro_pi</th>
   </tr>
   <tr>
   <th colspan="6"><strong><i>Fecha de viabilidad</i></strong></th>
       <th colspan="6">$fecha_viabilidad_pi</th>
   </tr>
    <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;LOCALIZACIÓN DEL PROYECTO</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
     <tr>
         <th colspan="6">Departamento</th>
         <th colspan="6">$departamento</th>
   </tr>
   <tr>
       <th colspan="6">Provincia</th>
       <th colspan="6">$provincia</th>
   </tr>
   <tr>
       <th colspan="6">Distrito</th>
       <th colspan="6">$distrito</th>
   </tr>
   <tr>
         <th colspan="12" style="background-color:#f5f5f5;">&nbsp;&nbsp;RESPONSABILIDAD FUNCIONAL DEL PROGRAMA DE INVERSION</th>
   </tr>
    <tr>
         <th colspan="6">Función</th>
         <th colspan="6">$codigo_funcion:$nombre_funcion</th>
   </tr>
   <tr>
       <th colspan="6">División Funcional</th>
       <th colspan="6">$codigo_div_funcional:$nombre_div_funcional</th>
   </tr>
   <tr>
       <th colspan="6">Grupo Funcional</th>
       <th colspan="6">$codigo_grup_funcional:$nombre_grup_funcional</th>
   </tr>
   <tr>
       <th colspan="6">Sector</th>
       <th colspan="6">$nombre_sector</th>
   </tr>
      <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;Tipologia de inversion</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
   <tr>
       <th colspan="6">Naturaleza de Inversion</th>
       <th colspan="6">$nombre_naturaleza_inv</th>
   </tr>
    <tr>
       <th colspan="6">Tipologia de inversion </th>
       <th colspan="6">$nombre_tipologia_inv </th>
   </tr>
   <tr>
       <th colspan="6">Tipo de Inversion</th>
       <th colspan="6">$nombre_tipo_inversion</th>
   </tr>
   <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;META PRESUPUESTAL</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
    <tr>
         <th colspan="6"></th>
         <th colspan="6">Nombre Meta Presupuestal</th>
   </tr>
   <tr>
       <th colspan="6">Año Meta Presupuestal</th>
       <th colspan="6"></th>
   </tr>
   <tr>
       <th colspan="6">PIM</th>
       <th colspan="6">$pim_meta_pres</th>
   </tr>
   <tr>
       <th colspan="6">N° Meta Presupuestal</th>
       <th colspan="6"></th>
   </tr>
    <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;UNIDAD EJECUTORA</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
   <tr>
       <th colspan="6">Unidad Ejecutora</th>
        <th colspan="6">$nombre_ue</th>
   </tr>
    <tr>
       <th colspan="6">Modalidad de Ejecucion</th>
       <th colspan="6"></th>
   </tr>
   <tr>
       <th colspan="6">Nivel de Gobierno</th>
       <th colspan="6"></th>
   </tr>
     <tr>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;INFORMACION PRESUPUESTAL</th>
         <th colspan="6" style="background-color:#f5f5f5;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
   </tr>
   <tr>
       <th colspan="6">Fuente de financiamiento</th>
       <th colspan="6"></th>
   </tr>
    <tr>
       <th colspan="6">Rubro de Ejecucion</th>
       <th colspan="6"></th>
   </tr>
   <tr>
       <th colspan="3">Programación</th>
       <th colspan="3">$Inv_2018</th>
       <th colspan="3">$Inv_2019</th>
       <th colspan="3">$Inv_2020</th>
   </tr>
    <tr>
       <th colspan="3">Programación Operación y Mantenimineto</th>
       <th colspan="3"></th>
       <th colspan="3"></th>
       <th colspan="3"></th>
   </tr>
</table>
</form>
EOD;
            

        }

        $html .= "</table>";
        $html .= "</div>";
// Imprimimos el texto con writeHTMLCell()
        $pdf->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);
 
// ---------------------------------------------------------
// Cerrar el documento PDF y preparamos la salida
// Este método tiene varias opciones, consulte la documentación para más información.
        $nombre_archivo = utf8_decode("Reporte de comprobante ".$opcion.".pdf");
        $pdf->Output($nombre_archivo, 'I');

	}

}