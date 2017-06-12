<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrincipalPmi extends CI_Controller {
public function __construct(){
      parent::__construct();
      $this->load->model('Model_DashboardPmi');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function pmi()
	{
		$this->_load_layout('pmi');
	}
	 function EstadisticaPipProvinc()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_DashboardPmi->EstadisticaPipProvinc();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	function _load_layout($template)
    {
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }
}
