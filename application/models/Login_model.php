<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($usuario,$Password){

		$resultados = $this->db->query("select usuario from USUARIO WHERE usuario='".$usuario."'  and contrasenia='".$Password."' ");
		if ($resultados->num_rows()>0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

}