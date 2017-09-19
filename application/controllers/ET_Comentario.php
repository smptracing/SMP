<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Comentario extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Comentario');
		$this->load->model('Model_ET_Especialista_Tarea');
		$this->load->model('Model_ET_Archivo');
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				$idPersonaTemp=$this->session->userdata('idPersona');

				$idTareaET=$this->input->post('idTareaET');
				$descComentario=$this->input->post('descComentario');
				$fechaComentario=date('Y-m-d H:i:s');
				$archivosComentario=$this->input->post('archivosComentario');

				$etEspecialistaTarea=$this->Model_ET_Especialista_Tarea->EspecialistaTareaPorIdTareaYIdPersona($idTareaET, $idPersonaTemp);

				if($etEspecialistaTarea==null)
				{
					$this->db->trans_rollback();

					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ud. no puede realizar comentarios porque no fue asignado a esta actividad.']);exit;
				}

				$this->Model_ET_Comentario->insertar($idTareaET, $etEspecialistaTarea->id_especialista_tarea, $descComentario, $fechaComentario);

				$ultimoETComentario=$this->Model_ET_Comentario->ultimoETComentario();

				// $this->Model_ET_Archivo->insertar($ultimoETComentario->id_et_comentario, '', date('Y-m-d H:i:s'), '');

				// $ultimoETArchivo=$this->Model_ET_Archivo->ultimoETArchivo();

				// $config['upload_path']='./uploads/ArchivoComentarioTareaGanttET';
				// $config['allowed_types']='*';
				// $config['max_width']=2000;
				// $config['max_height']=2000;
				// $config['max_size']=50000;
				// $config['encrypt_name']=false;
				// $config['file_name']=$ultimoETArchivo->id_et_archivo;

				// $this->load->library('upload', $config);
				
				// $this->upload->initialize($config);
				
				// $this->upload->do_upload('file0');

				// $tempDataFile=$this->upload->data();

				// $this->Model_ET_Documento_Ejecucion->actualizarExtension($etDocumentoEjecucion->id_doc_ejecucion, explode('.', $tempDataFile['file_ext'])[1]);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Comentario realizado correctamente.', 'etComentario' => $ultimoETComentario]);exit;
			}

			$idTareaET=$this->input->get('idTareaET');

			$listaETComentario=$this->Model_ET_Comentario->ETComentarioPorIdTareaET($idTareaET);

			return $this->load->view('front/Ejecucion/ETComentario/insertar', ['idTareaET' => $idTareaET, 'listaETComentario' => $listaETComentario]);
		}
	}

	public function eliminar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				$idETComentario=$this->input->post('idETComentario');

				$this->Model_ET_Comentario->eliminar($idETComentario);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Comentario eliminado correctamente.']);exit;
			}
		}
	}
}
?>