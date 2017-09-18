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

	public function ETComentarioPorIdTareaET($idTareaET)
	{
		$data=$this->db->query("select * from ET_COMENTARIO as ETC inner join ET_ESPECIALISTA_TAREA as ETET on ETC.id_especialista_tarea=ETET.id_especialista_tarea inner join ET_PER_REQ as ETPR on ETET.id_per_req=ETPR.id_per_req inner join PERSONA P on ETPR.id_persona=P.id_persona inner join ESPECIALIDAD as E on ETET.id_esp=E.id_esp where ETC.id_tarea_et=$idTareaET");

		return $data->result();
	}
}