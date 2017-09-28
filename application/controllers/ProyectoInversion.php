<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProyectoInversion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

	public function __construct(){
      parent::__construct();
      $this->load->model('Model_ProyectoInversion');
      $this->load->model('Model_Dashboard_Reporte');
	}
   /*INSERTAR UN PROYECTO EN LA TABLA PROYECTO Y SIMULTANEO EN LA TABLA PROYECTO UBIGEO*/
   function AddProyecto()
   {
      if ($this->input->is_ajax_request()) 
      {
        $cbxUnidadEjecutora=$this->input->post("id_ue");
        $cbxNatI =$this->input->post("id_naturaleza_inv");
        $cbxTipologiaInv =$this->input->post("id_tipologia_inv");
        $cbxTipoInv=$this->input->post("id_tipo_inversion");
        $cbxGrupoFunc =$this->input->post("id_grupo_funcional_inv");
        $cbxNivelGob =$this->input->post("id_nivel_gob");
        $cbxMetaPresupuestal =$this->input->post("id_meta_pres");
        $cbxProgramaPres =$this->input->post("id_programa_pres");
        $txtCodigoUnico =$this->input->post("codigo_unico_pi");
        $txtNombrePip =$this->input->post("nombre_pi");
        $txtCostoPip =$this->input->post("costo_pi");
        $txtDevengado =$this->input->post("devengado_ac_pi");
        $dateFechaInPip ="2017-03-01";
        $dateFechaViabilidad ="2017-03-01";
        $distrito =$this->input->post("distrito");
        $txtDireccionUbigeo ="Direccion";
        $txtLatitud="1.1";
        $txtLongitud="1.2";
        $cbxEstadoCicloInv=$this->input->post("id_estado_ciclo");
        $dateFechaEstCicInv="2017-03-01";
        $cbxRubro=$this->input->post("id_rubro");
        $dateFechaRubro="2017-03-01";
        $cbxModalidadEjec=$this->input->post("id_modalidad_ejec");
        $dateFechaModalidadEjec="2017-03-01";
       if($this->Model_ProyectoInversion->AddProyecto($cbxUnidadEjecutora,$cbxNatI,$cbxTipologiaInv,$cbxTipoInv,$cbxGrupoFunc,$cbxNivelGob,$cbxMetaPresupuestal,$cbxProgramaPres,$txtCodigoUnico,$txtNombrePip,$txtCostoPip,$txtDevengado,$dateFechaInPip,$dateFechaViabilidad,$distrito,$txtDireccionUbigeo,$txtLatitud,$txtLongitud,$cbxEstadoCicloInv,$dateFechaEstCicInv,$cbxRubro,$dateFechaRubro,$cbxModalidadEjec,$dateFechaModalidadEjec) == true)
          echo "Se añadio un proyecto";
        else
          echo "Se añadio  un proyecto";  
      }
      else
      {
        show_404();
      }
   }
 /*FIN INSERTAR UN PROYECTO*/

   
     function GetProyectoInversion()
  	{
  		if ($this->input->is_ajax_request()) 
  		{
  		$datos=$this->Model_ProyectoInversion->ProyectoInversion();
  		echo json_encode($datos);
  		}
  		else
  		{
  			show_404();
  		}
  	}
//ULTIMO RPOYECTO DE INVERSION
        function GetProyectoInversionUltimo()
    {
      if ($this->input->is_ajax_request()) 
      {
      $datos=$this->Model_ProyectoInversion->GetProyectoInversionUltimo();
      echo json_encode($datos);
      }
      else
      {
        show_404();
      }
    }

    //FIN ULTIO POYECTO DE INVERSION
     function BuscarProyectoInversion()
    {
      if ($this->input->is_ajax_request()) 
      {
       $Id_ProyectoInver = $this->input->post("Id_ProyectoInver");
       $datos=$this->Model_ProyectoInversion->BuscarProyectoInversion($Id_ProyectoInver);
      echo json_encode($datos);
      }
      else
      {
        show_404();
      }
    }
    
    public function index()
    {
      $this->_load_layout('Front/Pmi/frmMProyectoInversion');
    } 


    public function ReporteBuscadorPorPip()
    {
	    $this->load->view('layout/Reportes/header');
	    $this->load->view('front/Reporte/ProyectoInversion/index');
	    $this->load->view('layout/Reportes/footer');
    }


    public function ReportePrueba()
    {
		ini_set('xdebug.var_display_max_depth', 100);
		ini_set('xdebug.var_display_max_children', 256);
		ini_set('xdebug.var_display_max_data', 1024);

		$anio='2017';
        $codigounico='275116';

        $listaDetalleClasificador=$this->Model_Dashboard_Reporte->ReporteDetalleClasificador($anio,$codigounico);

        $temp=[];

        $primerCodigoTemp=null;

        foreach($listaDetalleClasificador as $key0 => $value0)
        {
        	if($primerCodigoTemp==$value0->cod_tt)
        	{
        		continue;
        	}

        	$primerCodigoTemp=$value0->cod_tt;

        	$temp[$key0]=new stdClass();

        	$temp[$key0]->cod_tt=$value0->cod_tt;
        	$temp[$key0]->tipo_transaccion=$value0->tipo_transaccion;

        	$temp[$key0]->child=[];

        	$segundoCodigoTemp=null;

        	foreach($listaDetalleClasificador as $key1 => $value1)
        	{
        		if($segundoCodigoTemp==$value1->generica || $temp[$key0]->cod_tt!=substr($value1->generica, 0, strlen($temp[$key0]->cod_tt)))
		    	{
		    		continue;
		    	}

		    	$segundoCodigoTemp=$value1->generica;

        		$temp[$key0]->child[$key1]=new stdClass();

        		$temp[$key0]->child[$key1]->generica=$value1->generica;
        		$temp[$key0]->child[$key1]->desc_generica=$value1->desc_generica;

        		$temp[$key0]->child[$key1]->child=[];

	        	$tercerCodigoTemp=null;

	        	foreach($listaDetalleClasificador as $key2 => $value2)
	        	{
	        		if($tercerCodigoTemp==$value2->sub_generica || $temp[$key0]->child[$key1]->generica!=substr($value2->sub_generica, 0, strlen($temp[$key0]->child[$key1]->generica)))
			    	{
			    		continue;
			    	}

			    	$tercerCodigoTemp=$value2->sub_generica;

	        		$temp[$key0]->child[$key1]->child[$key2]=new stdClass();

	        		$temp[$key0]->child[$key1]->child[$key2]->sub_generica=$value2->sub_generica;
	        		$temp[$key0]->child[$key1]->child[$key2]->desc_sub_generica=$value2->desc_sub_generica;

	        		$temp[$key0]->child[$key1]->child[$key2]->child=[];

		        	$cuartoCodigoTemp=null;

		        	foreach($listaDetalleClasificador as $key3 => $value3)
		        	{
		        		if($cuartoCodigoTemp==$value3->sub_generica_det || $temp[$key0]->child[$key1]->child[$key2]->sub_generica!=substr($value3->sub_generica_det, 0, strlen($temp[$key0]->child[$key1]->child[$key2]->sub_generica)))
				    	{
				    		continue;
				    	}

				    	$cuartoCodigoTemp=$value3->sub_generica_det;

		        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]=new stdClass();

		        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->sub_generica_det=$value3->sub_generica_det;
		        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->des_sub_generica_det=$value3->des_sub_generica_det;

		        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child=[];

			        	$quintoCodigoTemp=null;

			        	foreach($listaDetalleClasificador as $key4 => $value4)
			        	{
			        		if($quintoCodigoTemp==$value4->especifica || $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->sub_generica_det!=substr($value4->especifica, 0, strlen($temp[$key0]->child[$key1]->child[$key2]->child[$key3]->sub_generica_det)))
					    	{
					    		continue;
					    	}

					    	$quintoCodigoTemp=$value4->especifica;

			        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]=new stdClass();

			        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->especifica=$value4->especifica;
			        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->desc_especifica=$value4->desc_especifica;

			        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child=[];

				        	$sextoCodigoTemp=null;

				        	foreach($listaDetalleClasificador as $key5 => $value5)
				        	{
				        		if($sextoCodigoTemp==$value5->especifica_det || $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->especifica!=substr($value5->especifica_det, 0, strlen($temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->especifica)))
						    	{
						    		continue;
						    	}

						    	$sextoCodigoTemp=$value5->especifica_det;

				        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]=new stdClass();

				        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->especifica_det=$value5->especifica_det;
				        		$temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->desc_especifica_det=$value5->desc_especifica_det;
				        	}
			        	}
		        	}
	        	}
        	}
        }

        var_dump($temp);exit;
    }
    public function ReporteBuscadorPorAnio($anio=2017)
    {
      $data=$this->Model_Dashboard_Reporte->ReporteConsolidadoAvanceFisicoFinan($anio);
      //var_dump($data);exit;
      $this->load->view('layout/Reportes/header');
      $this->load->view('front/Reporte/ProyectoInversion/seguimientoCertificado',['Consolidado' => $data,'anio' =>$anio]);
      $this->load->view('layout/Reportes/footer');
    }

    function _load_layout($template)
    {
      $this->load->view('layout/PMI/header');
      $this->load->view($template);
      $this->load->view('layout/PMI/footer');
    }

}
