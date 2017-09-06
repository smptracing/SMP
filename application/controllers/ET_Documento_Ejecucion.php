<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Documento_Ejecucion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("Model_ET_Documento_Ejecucion");
	}

	public function insertar()
	{
		$this->db->trans_start();

		$idTareaET=$this->input->post('idTareaET');

		$this->Model_ET_Documento_Ejecucion->insertar($idTareaET, date('Y-m-d'), '');

		$etDocumentoEjecucion=$this->Model_ET_Documento_Ejecucion->ultimoETDocumentoEjecucion();

		$config['upload_path']='./uploads/DocumentoTareaGanttET';
		$config['allowed_types']='*';
		$config['max_width']=2000;
		$config['max_height']=2000;
		$config['max_size']=50000;
		$config['encrypt_name']=false;
		$config['file_name']=$etDocumentoEjecucion->id_doc_ejecucion;

		$this->load->library('upload', $config);
		
		$this->upload->initialize($config);
		
		$this->upload->do_upload('file0');

		$tempDataFile=$this->upload->data();

		$this->Model_ET_Documento_Ejecucion->actualizarExtension($etDocumentoEjecucion->id_doc_ejecucion, explode('.', $tempDataFile['file_ext'])[1]);

		$this->db->trans_complete();

		echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Archivo subido correctamente.']);exit;
	}
}