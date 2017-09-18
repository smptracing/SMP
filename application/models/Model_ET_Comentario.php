<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Comentario extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idTareaET, $idEspecialistaTarea, $descComentario, $fechaComentario)
	{
		$this->db->query("exec sp_Gestionar_ETComentario @opcion='insertar', @idTareaET=$idTareaET, @idEspecialistaTarea=$idEspecialistaTarea, @descComentario='$descComentario', @fechaComentario='$fechaComentario'");

		return true;
	}
}