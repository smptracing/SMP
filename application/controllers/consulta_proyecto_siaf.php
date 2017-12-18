<?php
class consulta_proyecto_siaf extends CI_Controller
{
	public function __constructor()
	{
		parent::__construct();
		$this->load->model('model_consulta_siaf');
	}
	public function index()
	{
		$this->load->model('model_consulta_siaf');
		$dato = $this->model_consulta_siaf->Reporte_proyecto_siaf('2017','2187136');
		//var_dump("data");
		// $data = array(
		// 				'titulo' => 'mis reportes',
		// 				'consulta' => $this->consultas_model->get_reporte()
		// 			);
		/*
		echo "<pre>";
		var_dump($dato);
		echo "<pre>";*/

		$this->load->view('front/Pmi/frmMetaPip',$dato);
	}
	

}
?>