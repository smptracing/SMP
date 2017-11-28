<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
		$this->load->model('Model_Usuario');
		$this->load->model('Model_Personal');

	}
	function ListarTipoUsuarioMenu($tipo)
	{

        $datos = $this->Model_Usuario->ListarTipoUsuarioMenu($tipo);
        echo json_encode($datos);
	}
	function ListarTipoUsuario()
	{
        if ($this->input->is_ajax_request()) 
        {
            $datos = $this->Model_Usuario->ListarTipoUsuario();
            echo json_encode($datos);
        } 
        else 
        {
            show_404();
        }
	}
	function GetUsuario()
	{
        if ($this->input->is_ajax_request())
        {
            $datos = $this->Model_Usuario->GetUsuario();
            echo json_encode($datos);
        } 
        else 
        {
            show_404();
        }
	}

	function AddUsuario()
	{
	    if ($this->input->is_ajax_request())
	    {
	      $id_persona=$this->input->post("comboPersona");
	      $txt_usuario =$this->input->post("txt_usuario");
	      $txt_contrasenia =sha1($this->input->post("txt_contrasenia"));
	      $cbb_TipoUsuario =$this->input->post("cbb_TipoUsuario");
	      $cbb_listaMenuDestino =$this->input->post("cbb_listaMenuDestino");

	      if($this->Model_Usuario->AddUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario,$cbb_listaMenuDestino) == true)
		       echo "Se añadio un nuevo usuario";
		  else
		       echo "Error... no se grabaron los datos del Usuario.";
		}
	     else
	     {
	      show_404();
	     }
 	}
 	function editUsuario()
 	{
	    if ($this->input->is_ajax_request())
	    {
	      $id_persona=$this->input->post("comboPersona");
	      $txt_usuario =$this->input->post("txt_usuario");
	      if($this->input->post("txt_contrasenia")!='')
	      	$txt_contrasenia =sha1($this->input->post("txt_contrasenia"));
	      else
	      	$txt_contrasenia='';
	      $cbb_TipoUsuario =$this->input->post("cbb_TipoUsuario");
	      $cbb_listaMenuDestino =$this->input->post("cbb_listaMenuDestino");
	      $cbb_estado =$this->input->post("cbb_estado");
	      if($this->Model_Usuario->editUsuario($id_persona,$txt_usuario,$txt_contrasenia,$cbb_TipoUsuario,$cbb_listaMenuDestino,$cbb_estado) == true)
		       echo "Se modificó el usuario";
		  else
		       echo "Error... no se grabaron los datos del Usuario.";
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
    function itemUsuario()
    {
    	if($this->input->get('id_persona')!='')
    	{
    		$data['arrayUsuario']=$this->Model_Usuario->getUsuario($this->input->get('id_persona'))[0];
			$this->load->view('Front/Usuario/itemUsuario',$data);
    	}
    	else
    	{
			$this->load->view('Front/Usuario/itemUsuario');
    	}

	}
	function accesodenegado()
	{

		$this->load->view('Front/Usuario/acceso_denegado');
	}

}
