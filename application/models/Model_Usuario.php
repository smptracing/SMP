<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Usuario extends CI_Model
{
          public function __construct()
          {
              parent::__construct();
          }
        function GetUsuario()
        {
            $Usuario=$this->db->query("execute sp_usuario_r");
            if($Usuario->num_rows()>0)
             {
              return $Usuario->result();
             }else
             {
              return false;
             }
        }
        function AddUsuario($id_persona,$txt_usuario,$cbb_TipoUsuario,$activo,$txt_contrasenia,$fech_reg,$fech_mod,$fech_elim,$usr_reg,$usr_mod,$usr_elim,$fl_elim)
        {
		        $this->db->query("execute sp_usuario_c'".$id_persona."','".$txt_usuario."','".$cbb_TipoUsuario."','".$activo. "','".$txt_contrasenia."','".$fech_reg."','".$fech_mod."','".$fech_elim."','".$usr_reg."','".$usr_mod."','".$usr_elim."','".$fl_elim."'");
		        if ($this->db->affected_rows() > 0) {
		            return true;
		        } else {
		            return false;
		        }
        }
        
      
}