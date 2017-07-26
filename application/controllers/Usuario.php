<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model('Model_Usuario');
		
	}
	function GetUsuario(){
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Usuario->GetUsuario();
            echo json_encode($datos);
        } else {
            show_404();
        }

	}
	 function AddUsuario()
	 {
	    if ($this->input->is_ajax_request()) 
	    {
	      $id_persona=15;
	      $txt_usuario =$this->input->post("txt_usuario");
	      $cbb_TipoUsuario =$this->input->post("cbb_TipoUsuario");
	      $activo =1;
	      $txt_contrasenia =sha1($this->input->post("txt_contrasenia"));
	      $fech_reg = "";
		  $fech_mod = "";
		  $fech_elim = "";
		  $usr_reg ="";
		  $usr_mod ="";
		  $usr_elim ="";
		  $fl_elim ="";
	    
	     if($this->Model_Usuario->AddUsuario($id_persona,$txt_usuario,$cbb_TipoUsuario,$activo,$txt_contrasenia,$fech_reg,$fech_mod,$fech_elim,$usr_reg,$usr_mod,$usr_elim,$fl_elim) == true)
		       echo "Se añadio un nuevo usuario";
		      else
		      echo "Se añadio  un nuevo usuario";  
		 } 
	     else
	     {
	      show_404();
	      }
	  
 	 }


	public function index()
	{
		
		$this->_load_layout('Front/Usuario/frm_usuario');
	}
	
function _load_layout($template)
    {
      $this->load->view('layout/USUARIO/header');
      $this->load->view($template);
      $this->load->view('layout/USUARIO/footer');
    }

}
