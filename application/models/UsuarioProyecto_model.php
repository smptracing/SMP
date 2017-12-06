<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsuarioProyecto_model extends CI_Model {

  public function __construct()	{
    $this->load->database();
  }

  public function get_usuario_proyecto($id) {
    $data = $this->db->query("select * from USUARIO_PROYECTO where id_persona = $id");
    return $data->result();
    /*
    if($id) {
      $query = $this->db->get_where('USUARIO_PROYECTO', array('id_persona' => $id));
      return $query->row_array();
    }
    else {
      return FALSE;
    }*/
  }

}
