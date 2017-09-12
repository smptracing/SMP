<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Especialidad_Tarea extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insertar($idEspecialidad, $idPersona, $idTareaET)
	{
		$this->db->query("exec sp_Gestionar_ETEspecialidadTarea @opcion='insertar', @idEspecialidad=$idEspecialidad, @idPersona=$idPersona, @idTareaET=$idTareaET");

		return true;
	}
}