<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FE_Presupuesto_Inv extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Model_FE_Presupuesto_Inv');
	}

	public function index($idEstInv)
    {
    	$nombreProyecto=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($idEstInv);
    	$ListarPresupuesto=$this->Model_FE_Presupuesto_Inv->ListarPresupuesto($idEstInv);

        $this->load->view('layout/Formulacion_Evaluacion/header');
        $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/index', ['ListarPresupuesto' => $ListarPresupuesto, 'nombreProyectoInv' => $nombreProyecto]);
        $this->load->view('layout/Formulacion_Evaluacion/footer');
    }

	public function insertar()
	{
		if($_POST)
		{			
			$idEstudioInversion=$this->input->post('idEstudioInversion');
			$idSector=$this->input->post('cbx_Sector');
			$txtPliego=$this->input->post('txtPliego');

			$this->Model_FE_Presupuesto_Inv->insertar($idEstudioInversion, $idSector, $txtPliego);

			$data=$this->Model_FE_Presupuesto_Inv->ultimoIdPresupuestoInv();

			$idPresupuestoFE=$data->id;
			$idFuenteFinan=$this->input->post('hdIdFuente');
			$hdCorrelativoMeta=$this->input->post('hdCorrelativoMeta');
			$hdAnio=$this->input->post('hdAnio');
	    	
	    	for($i=0; $i<count($hdAnio); $i++)
	    	{
	    		$this->Model_FE_Presupuesto_Inv->insertarPresupuestoFuente($idPresupuestoFE, $idFuenteFinan[$i], $hdCorrelativoMeta[$i], $hdAnio[$i]);
	    	}

	    	echo json_encode(['proceso' => 'Correcto', 'mensaje' => 'Dastos registrados correctamente.']);exit;
		}

		$idEstInv=$this->input->get('idEstInv');

		$nombreProyectoInver=$this->Model_FE_Presupuesto_Inv->nombreProyectoInvPorId($idEstInv);

		$listarSector=$this->Model_FE_Presupuesto_Inv->listarSector();
		$listarFuenteFinanciamiento=$this->Model_FE_Presupuesto_Inv->listarFuenteFinanciamiento();
		
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/insertar', ['listarSector' => $listarSector,'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento,'nombreProyectoInver' => $nombreProyectoInver]);
	}

	public function editar()
	{
		if($this->input->post('hdIdPresupuestoFE'))
		{
			$idPresupuestoFE=$this->input->post('hdIdPresupuestoFE');
			$idSector=$this->input->post('cbx_Sector');
			$txtPliego=$this->input->post('txtPliego');

			$Data=$this->Model_FE_Presupuesto_Inv->editar($idPresupuestoFE, $idSector, $txtPliego);

			$this->Model_FE_Presupuesto_Inv->FEPresupuestoFuenteEliminarPorIdPresupuestoFE($idPresupuestoFE);

			$hdIdFuente=$this->input->post('hdIdFuente');
			$hdCorrelativoMeta=$this->input->post('hdCorrelativoMeta');
			$hdAnio=$this->input->post('hdAnio');
	    	
	    	for($i=0; $i<count($hdIdFuente); $i++)
	    	{
	    		$this->Model_FE_Presupuesto_Inv->insertarPresupuestoFuente($idPresupuestoFE, $hdIdFuente[$i], $hdCorrelativoMeta[$i], $hdAnio[$i]);
	    	}

	    	$this->session->set_flashdata('correcto', 'Datos guardados correctamente.');

	    	return redirect('/FE_Presupuesto_Inv/index/'.$this->input->post('idEstudioInversion'));
		}

		$fePresupuestoInv=$this->Model_FE_Presupuesto_Inv->FEPresupuestoInvParaEditar($this->input->post('idPresupuestoFE'));

		$listarSector=$this->Model_FE_Presupuesto_Inv->listarSector();
		$listarFuenteFinanciamiento=$this->Model_FE_Presupuesto_Inv->listarFuenteFinanciamiento();
		$listaFEPresupuestoFuente=$this->Model_FE_Presupuesto_Inv->listarFEPresupuestoFuente($this->input->post('idPresupuestoFE'));
		
	    $this->load->view('Front/PresupuestoEstudioInversion/FEPresupuesto/editar', ['fePresupuestoInv' => $fePresupuestoInv, 'listarSector' => $listarSector, 'listarFuenteFinanciamiento' => $listarFuenteFinanciamiento, 'listaFEPresupuestoFuente' => $listaFEPresupuestoFuente]);
	}
}