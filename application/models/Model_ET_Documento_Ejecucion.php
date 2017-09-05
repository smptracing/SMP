<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ET_Documento_Ejecucion extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function ETDocumentoEjecucionPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_DOCUMENTO_EJECUCION where id_tarea_et=".$idTareaET);

		return $data->result();
	}
}
?>