<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Unidad_Medida extends CI_Model
{
			public function __construct()
			{
			  parent::__construct();
			}
			function UnidadMedidad_Listar()
			{
				$UnidadMedidad=$this->db->query("execute sp_UnidadMedida_Listar");
			    return $UnidadMedidad->result();
			} 
			function insertar($txt_descripcion)
			{
				  $UnidadMedidad=$this->db->query("execute sp_UnidadMedida_Insertar '".$txt_descripcion."'");
			      if($UnidadMedidad->num_rows()>0)
	              {
	              	  return true;
	              }
	              else
	              {
	              	  return false;
	              }
			} 
			
}