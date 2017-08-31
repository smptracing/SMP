<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  	public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model");
  	}

    public function muestralog()
    {
        if($this->session->userdata('nombreUsuario'))
        {
            redirect('Inicio');
        }
        else
        {
           $this->singin();
        }
    }

    public function singin()
    {
        $this->load->view('front/usuario/frm_login');
    }

    public function ingresar()
    {
        $usuario = $this->input->post('txtUsuario');
        $password = sha1($this->input->post('txtPassword'));
        $query = $this->Login_model->login($usuario, $password);       
        if($query->num_rows() > 0) 
        {
            $usuario = $query->row();
            $datosSession = array('nombreUsuario' => $usuario->usuario,
                                  'idUsuario' => $usuario->id_usuario,                                  
                                  'tipoUsuario' => $usuario->tipo);
            $this->session->set_userdata($datosSession);
            redirect('Inicio');
        }
        else
        {
            $this->muestralog();
        }  
    } 

    public function logout()
    {
        $datosSession = array('nombreUsuario' => '',
                              'idUsuario' => '',                                  
                              'tipoUsuario' => '');
        $this->session->set_userdata($datosSession);
        $this->session->sess_destroy();
        redirect('Login/muestralog');
    } 


}
