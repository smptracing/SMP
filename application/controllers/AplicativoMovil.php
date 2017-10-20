<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AplicativoMovil extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        $this->load->model('Model_Funcion');
        $this->load->model('Model_DashboardPmi');
        $this->load->model('Model_AplicativoMovil');
	}
    
    public function listadoProyectoGrupoFuncional()
    {
           $id_grup_funcional=$this->input->post('id_grup_funcional');
           $listaProyectoGrupoFuncional=$this->Model_AplicativoMovil->listadoProyectoGrupoFuncional($id_grup_funcional);
           $listaTotaProyecto= array();
           foreach ($listaProyectoGrupoFuncional as $key => $Itemp) {
               $listaTotaProyecto[$key]=[$Itemp->nombre_pi.'Codigo<a href="https://www.google.com/">'.$Itemp->latitud.' </a></h6>',$Itemp->latitud,$Itemp->longitud,$Itemp->icono_sector];
            }
           echo json_encode($listaTotaProyecto);

    }
    public function index()
    {
        $comboboxfuncion=$this->Model_Funcion->GetFuncion();
        //var_dump($comboboxfuncion);exit;
        $this->load->view('front/Aplicativo_Movil/index',['comboboxfuncion'=>$comboboxfuncion]);
    } 

     public function listaTotalDeUbicacionesProyecto()
    {
        if ($this->input->is_ajax_request()) {
            $listaTotaProyecto= array();
            $datos = $this->Model_AplicativoMovil->listaTotalDeUbicacionesProyecto();
            foreach ($datos as $key => $Itemp) {
               $listaTotaProyecto[$key]=[$Itemp->nombre_pi.'Codigo<a href="https://www.google.com/">'.$Itemp->latitud.' </a></h6>',$Itemp->latitud,$Itemp->longitud,$Itemp->icono_sector];
            }
            echo json_encode($listaTotaProyecto);
        } else {
            show_404();
        }

    }


}