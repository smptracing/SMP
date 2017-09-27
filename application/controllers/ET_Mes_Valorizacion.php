<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ET_Mes_Valorizacion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model("Model_ET_Mes_Valorizacion");
	}

	public function insertar()
	{
		if($this->input->is_ajax_request())
		{
			if($_POST)
			{
				$this->db->trans_start();

				$idDetallePartida=$this->input->post('idDetallePartida');
				$numeroMes=$this->input->post('numeroMes');
				$cantidad=$this->input->post('cantidad');
				$precio=$this->input->post('precio');

				$this->Model_ET_Mes_Valorizacion->insertar($idDetallePartida, 'NULL', $numeroMes, $cantidad, $precio);

				$this->db->trans_complete();

				echo json_encode(['proceso' => 'Correcto']);exit;
			}
		}
	}
}