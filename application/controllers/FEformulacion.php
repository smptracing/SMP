<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FEformulacion extends CI_Controller {/* Mantenimiento de division funcional y grupo funcional*/

	public function __construct(){
      parent::__construct();
	}
	public function ver_FEformulacion()
	{
		$this->_load_layout('Front/Formulacion_Evaluacion/frmFormulacion');
	}
	function _load_layout($template)
    {
        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view($template);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

}
