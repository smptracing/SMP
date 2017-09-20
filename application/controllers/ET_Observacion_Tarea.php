<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ET_Observacion_Tarea extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_ET_Observacion_Tarea');
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
				$descObservacionTarea=$this->input->post('descObservacionTarea');
				$fechaObservacionTarea=date('Y-m-d H:i:s');

				$etPerReq=$this->Model_ET_Per_Req->ETPerReqCraetPorIdETYIdPersona($idTareaET, $idPersonaTemp);

				if($etPerReq==null)
				{
					$this->db->trans_rollback();

					echo json_encode(['proceso' => 'Error', 'mensaje' => 'Ud. no puede realizar observación porque no es CRAET de este proyecto.']);exit;
				}

				$this->Model_ET_Observacion_Tarea->insertar($idTareaET, $etPerReq->id_per_req, $descObservacionTarea, $fechaObservacionTarea, false);

				$ultimoETObservacion=$this->Model_ET_Observacion_Tarea->ultimoETObservacion();

				$config['upload_path']='./uploads/ArchivoObservacionTareaGanttET';
				$config['allowed_types']='*';
				$config['max_width']=2000;
				$config['max_height']=2000;
				$config['max_size']=50000;
				$config['encrypt_name']=false;

				foreach($_FILES as $key => $value)
				{
					$this->Model_ET_Archivo_Obs->insertar($ultimoETObservacion->id_observacion_tarea, $value['name'], date('Y-m-d H:i:s'), explode('.', $value['name'])[count(explode('.', $value['name']))-1]);

					$ultimoETArchivoObs=$this->Model_ET_Archivo_Obs->ultimoETArchivoObs();

					$config['file_name']=$ultimoETArchivoObs->id_archivo_obs;

					$this->load->library('upload', $config);
					
					$this->upload->initialize($config);
					
					$this->upload->do_upload($key);
				}

				$ultimoETObservacion->childETArchivoObs=$this->Model_ET_Archivo_Obs->ETArchivoObsPorIdETObservacionTarea($ultimoETObservacion->id_observacion_tarea);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Observación realizada correctamente.', 'etObservacionTarea' => $ultimoETObservacion]);exit;
			}

			$idTareaET=$this->input->get('idTareaET');

			$listaETObservacionTarea=[];

			return $this->load->view('front/Ejecucion/ETObservacionTarea/insertar', ['idTareaET' => $idTareaET, 'listaETObservacionTarea' => $listaETObservacionTarea]);
		}
	}
}
?>