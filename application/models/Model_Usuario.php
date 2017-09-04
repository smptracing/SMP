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
        function AddUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario)
        {
		        $this->db->query("execute sp_usuario_c'".$id_persona."','".$txt_usuario."','".$txt_contrasenia."','".$cbb_TipoUsuario."'");
		        if ($this->db->affected_rows() > 0) {
		            return true;
		        } else {
		            return false;
		        }
        }
        function ListarTipoUsuario()
        {
        	$ListarTipoUsuario=$this->db->query("select* from USUARIO_TIPO");
            if($ListarTipoUsuario->num_rows()>0)
             {
              return $ListarTipoUsuario->result();
             }else
             {
              return false;
             }	
        }
      
}