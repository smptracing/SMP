<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PmiCriterioEspecifico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Model_CriterioEspecifico');
	}
	public function index()
	{	
		$id_criterio_gen=$this->input->GET('id_criterio_gen');

		$nombre_criterio_gen=$this->input->GET('nombre_criterio_gen');


		$listaCriterioEspec=$this->Model_CriterioEspecifico->ListarCriterioEspecifico($id_criterio_gen);

		$this->load->view('front/Pmi/CriteriosEspecificos/index',['id_criterio_gen' => $id_criterio_gen,'nombre_criterio_gen'=> $nombre_criterio_gen,'listaCriterioEspec' => $listaCriterioEspec]);		
	}

	public function editar()
	{
		if($this->input->post('hdId'))
        {
            $this->db->trans_start(); 
	            $id=$this->input->post('hdId');
	            $txtcriterioespecifico=$this->input->post('txtcriterioespecifico');
	            $txtpeso=$this->input->post('txtpeso');

	        $this->Model_CriterioEspecifico->editar($id,$txtcriterioespecifico,$txtpeso);
            $this->db->trans_complete();


           echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Datos actualizados correctamente.']);exit;  
        }
        $id=$this->input->get('id');
        $CriterioEspecifico=$this->Model_CriterioEspecifico->criterioEspecifico($id);
		
		return $this->load->view('front/Pmi/CriteriosEspecificos/editar',['CriterioEspecifico'=>$CriterioEspecifico]); 
	}
	
}
