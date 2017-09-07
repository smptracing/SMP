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
        function AddUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario,$cbb_listaMenuDestino)
        {
		        $query=$this->db->query("execute sp_usuario_c'".$id_persona."','".$txt_usuario."','".$txt_contrasenia."','".$cbb_TipoUsuario."'");
                //if($this->db->affected_rows()>0){
                if($query){
                    $arrayMenuUsuario=explode("-",$cbb_listaMenuDestino);
                    for($i=0;$i<count($arrayMenuUsuario);$i++){
                        $this->db->close();
                        $this->db->query("insert into ACCESS_MENU(id_menu,id_persona) values(".$arrayMenuUsuario[$i].",".$id_persona.");");
                    }
                    return true;
		        } 
                else {
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