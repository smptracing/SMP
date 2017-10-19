<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AplicativoMovil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Funcion');
	}
    
    public function index()
    {
        $comboboxfuncion=$this->Model_Funcion->GetFuncion();
        //var_dump($comboboxfuncion);exit;
        $this->load->view('front/Aplicativo_Movil/index',['comboboxfuncion'=>$comboboxfuncion]);
    } 


}