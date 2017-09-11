<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Usuario extends CI_Model
{
	      public function __construct()
	      {
	          parent::__construct();
	      }
        function getUsuario($idPersona=FALSE){
            if($idPersona==FALSE){
                $Usuario=$this->db->query("execute sp_usuario_r");
                if($Usuario->num_rows()>0){
                  return $Usuario->result();
                }
                else{
                  return false;
                }
            }
            else{
                $Usuario=$this->db->query("select * from USUARIO where id_persona=".$idPersona.";");
                if($Usuario->num_rows()>0){
                    return $Usuario->result();
                }
                else{
                    return false;
                }
            }
        }
        function AddUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario,$cbb_listaMenuDestino)
        {
		        $query=$this->db->query("execute sp_usuario_c'".$id_persona."','".$txt_usuario."','".$txt_contrasenia."','".$cbb_TipoUsuario."'");
                if($query){
                    if($cbb_listaMenuDestino!=''){
                        $arrayMenuUsuario=explode("-",$cbb_listaMenuDestino);
                        for($i=0;$i<count($arrayMenuUsuario);$i++){
                            $this->db->close();
                            $this->db->query("insert into ACCESS_MENU(id_menu,id_persona) values(".$arrayMenuUsuario[$i].",".$id_persona.");");
                        }
                    }
                    return true;
		        } 
                else {
		            return false;
		        }
        }
        function editUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario,$cbb_listaMenuDestino,$cbb_estado)
        {
            if($txt_contrasenia=='')
                $query=$this->db->query("update USUARIO set id_persona='".$id_persona."',usuario='".$txt_usuario."',id_usuario_tipo='".$cbb_TipoUsuario."',activo=".$cbb_estado." WHERE id_persona='".$id_persona."'");
            else
                $query=$this->db->query("update USUARIO set id_persona='".$id_persona."',contrasenia='".$txt_contrasenia."',usuario='".$txt_usuario."',id_usuario_tipo='".$cbb_TipoUsuario."',activo=".$cbb_estado." WHERE id_persona='".$id_persona."'");
            if($query){
                $this->db->close();
                $this->db->query("delete from ACCESS_MENU where id_persona=".$id_persona.";");
                if($cbb_listaMenuDestino!=''){
                    $arrayMenuUsuario=explode("-",$cbb_listaMenuDestino);
                    for($i=0;$i<count($arrayMenuUsuario);$i++){
                        $this->db->close();
                        $this->db->query("insert into ACCESS_MENU(id_menu,id_persona) values(".$arrayMenuUsuario[$i].",".$id_persona.");");
                    }   
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