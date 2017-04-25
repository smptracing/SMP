<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarteraPip extends CI_Controller {

public function __construct(){
		parent::__construct();
        $this->load->Model('Model_cartera');
		
	}

	public function index()
	{
		$data=array(
        "ada"=>"hola",
        "adsda"=>"hamely",
        )
        $this->_load_layout('Front/Pmi/frm_CarteraPip',$data);
	}
	
function _load_layout($template)
    {
      $this->load->view('layout/header');
      $this->load->view('layout/menu');
      $this->load->view($template);
      $this->load->view('layout/footer');
    }
public function johanFUncion($value='datos')
{
	# yo estoy comentando
}

}
