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
		$listaExpedienteTecnico=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoListar();
		$this->load->view('layout/Ejecucion/header');
		$this->load->view('front/Ejecucion/ExpedienteTecnico/index.php',['listaExpedienteTecnico'=>$listaExpedienteTecnico]);
		$this->load->view('layout/Ejecucion/footer');
	}

	public function insertar()
	{
		
       if($_POST)
		{
	        $config['upload_path']   = './uploads/ResolucioExpediente/';
	        $config['allowed_types'] = '*';
	        $config['max_width']     = 2000;
	        $config['max_height']    = 2000;
	        $config['max_size']      = 50000;
	        $config['encrypt_name']  = false;
	        $this->load->library('upload', $config);
			if (!$this->upload->do_upload('Documento_Resolucion')) {

			                $error = "ERROR NO SE CARGO EL DOCUMENTO DE EXPEDIENTE TÉCNICO";
			                echo $error;
			 }else
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
					$txtUrlDocAprobacion=$this->upload->file_name;//$this->input->post('txtUrlDocAprobacion');
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
		 }

		

			if($this->input->get('buscar')=="true")
			{
				$listarPersona=$this->Model_Personal->listarPersona();
				$codigo_unico_pi=$this->input->get('CodigoUnico');
				$Listarproyectobuscado=$this->Model_ET_Expediente_Tecnico->ExpedienteTecnicoBuscar($codigo_unico_pi); //BUSCAR PIP
				$this->load->view('front/Ejecucion/ExpedienteTecnico/insertar',['Listarproyectobuscado'=>$Listarproyectobuscado,'listarPersona' =>$listarPersona]);
			}
			
	}

	function editar()
	{
		$this->load->view('front/Ejecucion/ExpedienteTecnico/editar');
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

	
}