<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarteraInversion extends CI_Controller {

public function __construct(){
      parent::__construct();
     $this->load->model('Model_CarteraInversion');
     $this->load->helper('file');
	}
	public function index()
	{
		$this->_load_layout('Front/Pmi/frmCarteraInversion');
	}
//----------------MANTENIMIENTO DE LOS DATOS DE BRECHAS---------------------	
	//INSERTAR UNA CARTERA DE INVERSION
	function AddCartera()
	 {
	    if ($this->input->is_ajax_request()) 
	    {

							// echo  $txt_Cartera;  
		$config['upload_path']          = './uploads/cartera/';
	    $config['allowed_types']        = 'pdf|doc|xml|docx|PDF|DOC|DOCX|xls|xlsx';
	    $config['max_width']            = 1024;
	    $config['max_height']           = 768;
	    $config['max_size']      = 15000;
        $config['encrypt_name']  = false;

	    $this->load->library('upload',$config);

		if ( ! $this->upload->do_upload('Cartera_Resoluacion'))
			   {
			                	
			        $error="ERROR NO SE CARGARON  LOS DATOS DE LA CARTERA";
			        echo $error;
			   }
			    else
			   {
				                    //$data = array('upload_data' => $this->upload->data());

				                   // $this->load->view('success', $data);
				                	//$url=-$this->upload->$data['file_name'];
				  $dateAñoAperturaCart=$this->input->post("dateAñoAperturaCart");
				  $dateFechaIniCart =$this->input->post("dateFechaIniCart");
				  $dateFechaFinCart =$this->input->post("dateFechaFinCart");
				  $estado=0;
				  $txt_NumResolucionCart =$this->input->post("txt_NumResolucionCart");
				  $Cartera_Resoluacion=$this->upload->file_name;
				                	//$error="corrercto";
				  if($this->Model_CarteraInversion->AddCartera($dateAñoAperturaCart,$dateFechaIniCart,$dateFechaFinCart,$estado,$txt_NumResolucionCart,$Cartera_Resoluacion)==false)
 						{
 							echo "SE REGISTRO LA CARRTERA";
 						}
			        
			      } 						    
				  }
				    else
				    {
				      show_404();
				    }

 	 }

//FIN INSERTAR UNA CARTERA DE INVERSION
    function getCarteraAnio($anio){
    	if ($this->input->is_ajax_request()) 
	      {
	      //$valor="";//para enviar vacia  enmi procedimiento y traer la programación
	      $id_proyecto_filtro="";
	      $año_apertura_actual=$anio;
	      $datos=$this->Model_Programacion->GetProgramacion($id_proyecto_filtro,$año_apertura_actual);
	      echo json_encode($datos);
	      }
	      else
	      {
	        show_404();
      }
    	//$this->_load_layout('Front/Pmi/frmMProyectoInversion');
 	 //OBTENER LA CARTERA ACTUAL SEGUN EL AÑO
    }
    function GetCarteraInvFechAct()
	{
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_CarteraInversion->GetCarteraInvFechAct();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
	function GetCarteraInversion(){
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_CarteraInversion-> GetCarteraInversion();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	  
	}
	function GetCarteraAnios(){
		if ($this->input->is_ajax_request()) 
		{
		$datos=$this->Model_CarteraInversion->GetCarteraAnios();
		echo json_encode($datos);
		}
		else
		{
			show_404();
		}
	}
 	function _load_layout($template)
    {
      $this->load->view('layout/Pmi/header');
      $this->load->view($template);
      $this->load->view('layout/Pmi/footer');
    }

}
