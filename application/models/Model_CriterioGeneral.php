<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_criterioGeneral extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	function CriteriosGenerales()
	{
		$data=$this->db->query("select * from CRITERIO_GEN inner join FUNCION on CRITERIO_GEN.id_funcion=FUNCION.id_funcion");

		return $data->result();
	}
	function CriteriosGeneralesPorFuncion()
	{
		$data=$this->db->query("select FUNCION.id_funcion,codigo_funcion,nombre_funcion,COUNT(nombre_criterio_gen) AS CantCriteriosG FROM CRITERIO_GEN INNER JOIN FUNCION ON CRITERIO_GEN.id_funcion=FUNCION.id_funcion group by nombre_funcion,FUNCION.id_funcion,codigo_funcion");

		return $data->result();
	}

}