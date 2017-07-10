<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
      $this->load->model("Login_model");

	}
 
 public function ingresar(){
  if ($this->input->is_ajax_request()) {

       $usuario=$this->input->post("txt_usuario");
       $Password=sha1($this->input->post("Password"));
       $resp = $this->Login_model->login($usuario,$Password);
          if($resp)
                {
                    $data = [
                    "usuario" => $resp->usuario,
                    "login" => TRUE
                    ];    
                    $this->session->set_userdata($data);
                }
                else
                {
                  echo "error";
                }
    }
    else
    {
      show_404();
    }
 }
	public function cerrar()
	 {
	  $this->session->sess_destroy();
	  redirect('login', 'refresh');
	 }
	public function index()
	{
	    if($this->session->userdata('login'))
	    {
	      redirect(site_url('Inicio/'));
	    }
   			 else
	    {
	      $this->load->view('front/usuario/frm_login');

	    }
   }


}
