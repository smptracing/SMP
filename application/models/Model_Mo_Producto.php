<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Producto extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function buscarProyecto($codigoUnico)
	{
		$this->db->select('PROYECTO_INVERSION.*');
		$this->db->from('PROYECTO_INVERSION');
		$this->db->where('PROYECTO_INVERSION.codigo_unico_pi',$codigoUnico);
		return $this->db->get()->result()[0];
	}
}