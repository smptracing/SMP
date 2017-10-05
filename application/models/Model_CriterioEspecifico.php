<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_CriterioEspecifico extends CI_Model
{
	public function __construct()
	{
		parent::__construct();

	}

	function ListarCriterioEspecifico($id_criterio_gen)
	{
		$opcion="ListarCriteriosEspecificos";
		$data=$this->db->query("execute sp_Gestionar_CriterioEspecifico  @opcion='".$opcion."',@id_criterio_gen=$id_criterio_gen");

		return $data->result();
	}
	
	function editar($id,$txtcriterioespecifico,$txtpeso)
	{
		$opcion="editar";
		$data=$this->db->query("execute sp_Gestionar_CriterioEspecifico  @opcion='".$opcion."',@id_criterio='".$id."',@nombre_criterio='".$txtcriterioespecifico."',@peso='".$txtpeso."'");

        return true;
	}

	function criterioEspecifico($id)
    {
        $data=$this->db->query("select * from CRITERIO_ESP where id_criterio='".$id."'");

         return $data->result()[0];
    }

    function insertar($txtIdCriterioG,$txtNombreCriterioEspecifico,$txtpeso)
    {
    	$opcion="insertar";
		$data=$this->db->query("execute sp_Gestionar_CriterioEspecifico @opcion='".$opcion."', @id_criterio_gen='".$txtIdCriterioG."',@nombre_criterio='".$txtNombreCriterioEspecifico."',@peso='".$txtpeso."'");

		return $data->result();
    }

    function CriterioEspecificoData($txtNombreCriterioEspecifico)
    {
        $data=$this->db->query("select * from CRITERIO_ESP where replace(nombre_criterio, ' ', '')=replace('".$txtNombreCriterioEspecifico."', ' ', '')");

        return $data->result();
    }

}