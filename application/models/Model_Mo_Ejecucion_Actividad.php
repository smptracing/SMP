<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Mo_Ejecucion_Actividad extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	function insertar($data)
	{
		$this->db->insert('MO_EJECUCION_ACTIVIDAD',$data);
		return $this->db->insert_id();
	}

	function editar($ejecucion,$idEjecucion)
	{
		$this->db->set($ejecucion);
		$this->db->where('id_ejecucion', $idEjecucion);
		$this->db->update('MO_EJECUCION_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function listaEjecucionActividad($idActividad)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result();
	}

	function verprogramacion($id_ejecucion)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_ejecucion',$id_ejecucion);
		return $this->db->get()->result()[0];
	} 

	function eliminar($idEjecucion)
	{
		$this->db->where('id_ejecucion',$idEjecucion);
		$this->db->delete('MO_EJECUCION_ACTIVIDAD');
		return $this->db->affected_rows();
	}

	function verificarProgramacion($mes,$anio,$idActividad)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.mes_ejec',$mes);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.anio_ejec',$anio);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_actividad',$idActividad);
		return $this->db->get()->result();
	}

	function verificarProgramacionDiferente($mes,$anio,$idActividad,$idProgramacion)
	{
		$this->db->select('MO_EJECUCION_ACTIVIDAD.*');
		$this->db->from('MO_EJECUCION_ACTIVIDAD');
		$this->db->where('MO_EJECUCION_ACTIVIDAD.mes_ejec',$mes);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.anio_ejec',$anio);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_actividad',$idActividad);
		$this->db->where('MO_EJECUCION_ACTIVIDAD.id_ejecucion !=',$idProgramacion);
		return $this->db->get()->result();
	}

	function sumatoriaEjecucion($idActividad)
	{
		$query = $this->db->query("select sum(ejec_fisic_prog) as AcumFisProg, sum(ejec_fisic_real) as AcumFisReal, sum(ejec_finan_prog) as AcumFinProg, sum(ejec_finan_real) as AcumFinReal from mo_ejecucion_actividad ea where id_actividad = $idActividad");
		return  $query->result();
	}

	function actividadMensual($idActividad,$mes)
	{
		$query = $this->db->query("select ejec_fisic_prog, ejec_finan_prog, ejec_fisic_real, ejec_finan_real from mo_ejecucion_actividad where id_actividad = $idActividad and mes_ejec = '$mes'");
		return  $query->result();
	}

}