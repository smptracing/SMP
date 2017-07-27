<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presupuesto_Ejecucion extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
 public function index()
    {
        $this->load->view('layout/Ejecucion/header');
        $this->load->view('front/Ejecucion/PresupuestoEjecucion/index');
        $this->load->view('layout/Ejecucion/footer');
    }
    public function insertar()
    {

         $this->load->view('front/Ejecucion/PresupuestoEjecucion/insertar');
    }

}