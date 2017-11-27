<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  	public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_model");
        $this->load->helper('FormatNumber_helper');
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
    public function recuperarMenu($usuario){
        if($this->input->is_ajax_request())
        {

            $Datos=$this->Login_model->recuperarMenu($usuario);
            echo json_encode($Datos);
        }
        else
        {
            show_404();
        }
    }
    public function ingresar()
    {
      $arrContextOptions=array(
          "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      );

      $form_response=$this->input->post('g-recaptcha-response');
      $url="https://www.google.com/recaptcha/api/siteverify";
      $secretkey="6LcA-jkUAAAAAEw9rvEb_J_H15v_fWTo0pDPLTBi";

      $response=file_get_contents($url."?secret=".$secretkey.
      "&response=".$form_response."&remoteip=".$_SERVER["REMOTE_ADDR"], false, stream_context_create($arrContextOptions));

      $data = json_decode($response);

      // if (isset($data->success) && $data->success=="true") {
        $usuario = $this->input->post('txtUsuario');
        $password = sha1($this->input->post('txtPassword'));
        $query = $this->Login_model->login($usuario, $password);
        if($query->num_rows() > 0)
        {
            $usuario = $query->row();
            $datosSession = array('nombreUsuario' => $usuario->usuario,
                                  'idUsuario' =>'',
                                  'idPersona' => $usuario->id_persona,
                                  'tipoUsuario' => $usuario->id_usuario_tipo,
                                  'desc_usuario_tipo' => $usuario->desc_usuario_tipo,
                                  'cod_usuario_tipo' => $usuario->cod_usuario_tipo
                                  );
            $this->session->set_userdata($datosSession);
            $result = $this->Login_model->recuperarMenu($usuario->id_persona);
            $this->session->set_userdata('menuUsuario',$result);
            $result = $this->Login_model->recuperarMenu(0);
            $this->session->set_userdata('menu',$result);
            /*
            if ($usuario->cod_usuario_tipo == '04' ) {
              $this->db2 = $this->load->database('seconddb', TRUE);
            }*/

            redirect('Inicio');
        }
        else
        {
            $this->session->set_flashdata('error', 'Usuario y/o Contraseña Incorrrecto');
            $this->muestralog();
        }
      // } else {
      //       $this->session->set_flashdata('error', 'Llenar Captcha');
      //       $this->muestralog();
      // }
    }
    public function logout()
    {
        $datosSession = array('nombreUsuario' => '',
                              'idUsuario' => '',
                              'idPersona' => '',
                              'tipoUsuario' => '');
        $this->session->set_userdata($datosSession);
        $this->session->sess_destroy();
        redirect('Login/muestralog');
    }
}
