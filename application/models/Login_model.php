<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	function login($usuario, $password)
	{
        $this->db->select('*');
        $this->db->from('USUARIO');
        $this->db->join('USUARIO_TIPO', 'USUARIO_TIPO.id_usuario_tipo=USUARIO.id_usuario_tipo', 'INNER');
        $this->db->where('usuario', $usuario);
        $this->db->where('contrasenia', $password);
        $this->db->where('activo', 1);
        return $this->db->get();
    }
    function recuperarMenu($usuario)
	{
        $query=$this->db->query("EXEC sp_recuperarMenuUsuario ".$usuario);
        $result=$query->result_array();
        return $result;

    }
}
