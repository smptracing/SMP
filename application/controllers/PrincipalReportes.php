<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalReportes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Dashboard_Reporte');
        $this->load->helper('FormatNumber_helper');

    }

    public function PrincipalReportes()
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view('Reportes');
        $this->load->view('layout/Reportes/footer');

    }

    public function GetAprobadosEstudio()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->GetAprobadosEstudio();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function NaturalezaInversionMontos()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->NaturalezaInversionMontos();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipFuenteFinancimiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipFuenteFinancimiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    public function MontoPipFuenteFinanciamiento()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipFuenteFinanciamiento();
            echo json_encode($datos);
        } else
        show_404();
    }
    
    public function CantidadPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipModalidad();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function MontoPipModalidad()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->MontoPipModalidad();
            
            foreach ($datos as $key => $value) 
            {
                $value->Monto = a_number_format($value->Monto, 2, '.',",",0);
            }

            echo json_encode($datos);
        } else
        show_404();
    }
    public function CantidadPipRubro()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipRubro();
            echo json_encode($datos);
        } else
        show_404();
    }

    public function CantidadPipProvincia()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_Dashboard_Reporte->CantidadPipProvincia();
            foreach ($datos as $key => $Itemp) {
               $numpip[$key]=$Itemp->Cantidadpip;
            }
            echo json_encode($numpip);
        } else
        show_404();
    }

    public function GrafEstInfFinanciera()
    { 
       
        if ($this->input->is_ajax_request()) {
            $CodigoUnico=$this->input->get('codigounico');
            $datos = $this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($CodigoUnico);
            $var1=[];
            foreach ($datos as $key => $Itemp) {
                $anio[]=$Itemp->ano_eje;
                $devengado[]=$Itemp->devengado;
                $pim[]=$Itemp->pim;
            }
            $var1[]=$anio;
            $var1[]=$devengado;
            $var1[]=$pim;
          

            echo json_encode($var1);
        } else
        show_404();
    }

  public function GrafAvanceFinanciero()
    { 
       
        if ($this->input->is_ajax_request()) {
            $CodigoUnico=$this->input->get('codigounico');
            $datos = $this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($CodigoUnico);
            $var1=[];
            foreach ($datos as $key => $Itemp) {
                $anio[]=$Itemp->ano_eje;
                //$avance_financiero[]=$Itemp->avance_financiero;
                $ejecucion[]=$Itemp->ejecucion;
                $compromiso[]=$Itemp->compromiso;
                $certificado[]=$Itemp->monto_certificado;
                $devengado[]=$Itemp->devengado;
                $girado[]=$Itemp->girado;
                $pagado[]=$Itemp->pagado;
            }
            $var1[]=$anio;
            $var1[]=$ejecucion;
            $var1[]=$compromiso;
            $var1[]=$certificado;
            $var1[]=$devengado;
            $var1[]=$girado;
            $var1[]=$pagado;
           // $var1[]=$avance_financiero;

            echo json_encode($var1);
        } else
        show_404();
    }

    public function FuncionNumeroPip()
    {
        if ($this->input->is_ajax_request()) 
        {
            $datos = $this->Model_Dashboard_Reporte->FuncionNumeroPip();
            echo json_encode($datos);
        } 
        else
        show_404();
    }

    function BuscadorPipPorCodigoReporte()
    {
            $CodigoUnico=$this->input->get('codigounico');
            $BuscarPipCodigoReporte=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($CodigoUnico); //BUSCAR PIP
      
            //$devengado=[$BuscarPipCodigoReporte->pia_meta_pres,$BuscarPipCodigoReporte->pim_acumulado,$BuscarPipCodigoReporte->devengado_acumulado];
            echo  json_encode($BuscarPipCodigoReporte);
    }

    function  DatosParaEstadisticaAnualProyecto()
    {
        $codigounico=$this->input->POST('codigounico');
        $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPip($codigounico);

        $data->costo_actual = a_number_format($data->costo_actual, 2, '.',",",3);
        $data->costo_expediente = a_number_format($data->costo_expediente, 2, '.',",",3);
        $data->costo_viabilidad = a_number_format($data->costo_viabilidad, 2, '.',",",3);
        $data->ejecucion_ano_anterior = a_number_format($data->ejecucion_ano_anterior, 2, '.',",",3);

        echo  json_encode($data);
        exit;
    }

    function DatosEjecucionPresupuestal()
    {
        $codigounico=$this->input->POST('codigounico');
        $datos=$this->Model_Dashboard_Reporte->ReporteEjecucionPresupuestal($codigounico);

        foreach ($datos as $key => $data) 
        {
            $data->costo_actual = a_number_format($data->costo_actual, 2, '.',",",3);
            $data->costo_expediente = a_number_format($data->costo_expediente, 2, '.',",",3);
            $data->costo_viabilidad = a_number_format($data->costo_viabilidad, 2, '.',",",3);
            $data->ejecucion_ano_anterior = a_number_format($data->ejecucion_ano_anterior, 2, '.',",",3);
        }

        echo  json_encode($datos);
    }

    function DatosCorrelativoMeta()
    {
        $codigounico=$this->input->POST('codigounico');
        $datos=$this->Model_Dashboard_Reporte->ReporteCorrelativoMeta($codigounico);
        foreach ($datos as $key => $data) 
        {
            $data->pia = a_number_format($data->pia, 2, '.',",",3);
            $data->pim = a_number_format($data->pim, 2, '.',",",3);
            $data->pim_acumulado = a_number_format($data->pim_acumulado, 2, '.',",",3);
            $data->ejecucion = a_number_format($data->ejecucion, 2, '.',",",3);
            $data->compromiso = a_number_format($data->compromiso, 2, '.',",",3);
            $data->devengado = a_number_format($data->devengado, 2, '.',",",3);
            $data->girado = a_number_format($data->girado, 2, '.',",",3);
            $data->pagado = a_number_format($data->pagado, 2, '.',",",3);
            $data->monto_certificado = a_number_format($data->monto_certificado, 2, '.',",",3);
            $data->monto_comprometido_anual = a_number_format($data->monto_comprometido_anual, 2, '.',",",3);
            $data->monto_precertificado = a_number_format($data->monto_precertificado, 2, '.',",",3);
        }
        echo  json_encode($datos);
    }

    function  ReporteDevengadoPiaPimPorPipGraficos()
    {
            $codigounico=$this->input->GET('codigounico');
            $data=$this->Model_Dashboard_Reporte->ReporteDevengadoPiaPimPorPipGraficos($codigounico);
            echo  json_encode($data);
    }

    function DetalleMensualizado()
    {
        $correlativoMeta=$this->input->GET('meta');
        $anioMeta=$this->input->GET('anio');
        $listaDetalleMensualizado=$this->Model_Dashboard_Reporte->DetalleMensualizadoMeta($correlativoMeta,$anioMeta);
        $listaDetalleMensualizadoEst=$this->Model_Dashboard_Reporte->DetalleMensualizadoMetaEst($correlativoMeta,$anioMeta);
        $this->load->view('front/Reporte/ProyectoInversion/detalle',['listaDetalleMensualizado'=>$listaDetalleMensualizado,'listaDetalleMensualizadoEst'=>$listaDetalleMensualizadoEst,'correlativoMeta'=>$correlativoMeta,'anioMeta'=>$anioMeta]);
        //$this->load->view('front/Reporte/ProyectoInversion/detalle');
    }

     function DetalleMensualizadoFuenteFinan()
    {
        $correlativoMeta=$this->input->GET('meta');
        $anioMeta=$this->input->GET('anio');
       
        $listaDetalleMensualizadoFuenteFinan=$this->Model_Dashboard_Reporte->DetalleMensualizadoMetaFuente($correlativoMeta,$anioMeta);

        $listaDetalleMensualizadoFuenteFinanDatosG=$this->Model_Dashboard_Reporte->DetalleMensualizadoMetaFuenteDatosG($correlativoMeta,$anioMeta);
        $this->load->view('front/Reporte/ProyectoInversion/DetalleMensualizadoFuenteFinan',['listaDetalleMensualizadoFuenteFinan'=>$listaDetalleMensualizadoFuenteFinan,'listaDetalleMensualizadoFuenteFinanDatosG'=>$listaDetalleMensualizadoFuenteFinanDatosG,'correlativoMeta'=>$correlativoMeta,'anioMeta'=>$anioMeta]);
        //$this->load->view('front/Reporte/ProyectoInversion/detalle');
    }

    function DetalleAnalitico()
    {  
        $anio=$this->input->GET('anio');
        $codigounico=$this->input->GET('codigounico');
        $listaDetalleAnaliticoAvancFinE=$this->Model_Dashboard_Reporte->ReporteDetalleAnaliticoFinancieroE($anio,$codigounico);
        $listaDetalleAnaliticoAvancFin=$this->Model_Dashboard_Reporte->ReporteDetalleAnaliticoFinanciero($anio,$codigounico);
        //var_dump($listaDetalleAnaliticoAvancFin);exit;
        $this->load->view('front/Reporte/ProyectoInversion/detalleAnalitico',['listaDetalleAnaliticoAvancFin'=> $listaDetalleAnaliticoAvancFin,'listaDetalleAnaliticoAvancFinE'=>$listaDetalleAnaliticoAvancFinE]);
    }
    function DetalleClasificador()
    {
        ini_set('xdebug.var_display_max_depth', 100);
        ini_set('xdebug.var_display_max_children', 256);
        ini_set('xdebug.var_display_max_data', 1024);

        $anio=$this->input->GET('anio');
        $codigounico=$this->input->GET('codigounico');

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
                                $arrayMensual = [];

                                if($sextoCodigoTemp==$value5->especifica_det || $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->especifica!=substr($value5->especifica_det, 0, strlen($temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->especifica)))
                                {
                                    continue;
                                }

                                $sextoCodigoTemp=$value5->especifica_det;

                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]=new stdClass();

                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->especifica_det=$value5->especifica_det;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->desc_especifica_det=$value5->desc_especifica_det;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->ene=$value5->ene;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->feb=$value5->feb;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->mar=$value5->mar;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->abr=$value5->abr;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->may=$value5->may;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->jun=$value5->jun;                     
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->jul=$value5->jul;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->ago=$value5->ago;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->sep=$value5->sep;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->oct=$value5->oct;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->nov=$value5->nov;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->dic=$value5->dic;  
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->devengado=$value5->devengado;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->compromiso=$value5->compromiso;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->girado=$value5->girado;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->pagado=$value5->pagado;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->comprometido_anual=$value5->comprometido_anual;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->certificado=$value5->certificado;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->ejecucion=$value5->ejecucion;
                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->anulacion=$value5->anulacion;

                                $arrayMensual[]=$value5->ene;
                                $arrayMensual[]=$value5->feb;
                                $arrayMensual[]=$value5->mar;
                                $arrayMensual[]=$value5->abr;
                                $arrayMensual[]=$value5->may;
                                $arrayMensual[]=$value5->jun;
                                $arrayMensual[]=$value5->jul;
                                $arrayMensual[]=$value5->ago;
                                $arrayMensual[]=$value5->sep;
                                $arrayMensual[]=$value5->oct;
                                $arrayMensual[]=$value5->nov;
                                $arrayMensual[]=$value5->dic;

                                $sumatoriaAcumuladaAnual = [];

                                foreach ($arrayMensual as $key => $value) 
                                {
                                    if(!isset($sumatoriaAcumuladaAnual[$key]))
                                    {
                                        $sumatoriaAcumuladaAnual[]=0;
                                    }
                                    $sumatoriaAcumuladaAnual[$key]+=($value+($key>0 ?  $sumatoriaAcumuladaAnual[$key-1]  : 0));
                                }

                                $temp[$key0]->child[$key1]->child[$key2]->child[$key3]->child[$key4]->child[$key5]->sumatoriaAcumuladaAnual=$sumatoriaAcumuladaAnual;


                            }
                        }
                    }
                }
            }
        }

        $this->load->view('front/Reporte/ProyectoInversion/detalleClasificador',['listaDetalleClasificador'=>$listaDetalleClasificador,'temp'=>$temp]);
    }
    public function GrafDetalleMensualizado()
    { 
       
        if ($this->input->is_ajax_request()) {
            $correlativoMeta=$this->input->GET('meta');
            $anioMeta=$this->input->GET('anio');
            $datos=$this->Model_Dashboard_Reporte->DetalleMensualizadoMeta($correlativoMeta,$anioMeta);
            
            $a_ejecucion = 0;
            $a_compromiso = 0;
            $a_certificado = 0;
            $a_devengado = 0;
            $a_girado = 0;
            $a_pagado= 0;

            $var1=[];
            foreach ($datos as $key => $Itemp) 
            {
                if($Itemp->mes_eje=="01")
                    {$nombre[]="Ene";}
                if($Itemp->mes_eje=="02")
                    {$nombre[]="Feb";}
                if($Itemp->mes_eje=="03")
                    {$nombre[]="Mar";}
                if($Itemp->mes_eje=="04")
                    {$nombre[]="Abr";}
                if($Itemp->mes_eje=="05")
                    {$nombre[]="May";}
                if($Itemp->mes_eje=="06")
                    {$nombre[]="Jun";}
                if($Itemp->mes_eje=="07")
                    {$nombre[]="Jul";}
                if($Itemp->mes_eje=="08")
                    {$nombre[]="Ago";}
                if($Itemp->mes_eje=="09")
                    {$nombre[]="Set";}
                if($Itemp->mes_eje=="10")
                    {$nombre[]="Oct";}
                if($Itemp->mes_eje=="11")
                    {$nombre[]="Nov";}
                if($Itemp->mes_eje=="12")
                    {$nombre[]="Dic";}

              

                $a_ejecucion += $Itemp->ejecucion;                
                $ejecucion[]= a_number_format($a_ejecucion, 2, '.',",",0);

                $a_compromiso += $Itemp->compromiso;               
                $compromiso[]= a_number_format($a_compromiso, 2, '.',",",0);

                 $a_certificado += $Itemp->certificado;               
                $certificado[]= a_number_format($a_certificado, 2, '.',",",0);

                $a_devengado += $Itemp->devengado;               
                $devengado[]= a_number_format($a_devengado, 2, '.',",",0);

                $a_girado+= $Itemp->girado;               
                $girado[]=a_number_format($a_girado, 2, '.',",",0);

                $a_pagado += $Itemp->pagado;               
                $pagado[]=a_number_format($a_pagado, 2, '.',",",0);

               
            }

            $var1[]=$nombre;
            $var1[]=$ejecucion;
            $var1[]=$compromiso;
            $var1[]=$certificado;
            $var1[]=$devengado;
            $var1[]=$girado;
            $var1[]=$pagado;

            echo json_encode($var1);
        } else
        show_404();
    }

    function ConsolidadoAvanceFisicoFinan()
    {
        $anio=$this->input->POST('anio');
        $data=$this->Model_Dashboard_Reporte->ReporteConsolidadoAvanceFisicoFinan($anio);
        
        $this->load->view('front/Reporte/ProyectoInversion/seguimientoCertificado');

    }
     function detalladoMensualizadoConceptoClasificador()
    {
        $correlativoMeta=$this->input->GET('meta');
        $anioMeta=$this->input->GET('anio');
       
        $listaPorOrden=$this->Model_Dashboard_Reporte->DetallePorOrden($correlativoMeta,$anioMeta);  
        $this->load->view('front/Reporte/ProyectoInversion/DetalleConcepto',['listaPorOrden'=>$listaPorOrden]);

    }

    function detallePedidoCompraMeta()
    {
        $correlativoMeta=$this->input->GET('meta');
        $anioMeta=$this->input->GET('anio');

        $listaDetallePorPedidoCompraMeta=$this->Model_Dashboard_Reporte->DetallePedidoCompraMeta($correlativoMeta,$anioMeta); 

        $this->load->view('front/Reporte/ProyectoInversion/detallePedidoCompraMeta',['listaDetallePorPedidoCompraMeta'=>$listaDetallePorPedidoCompraMeta]);
    }

    function detallePorCadaPedido()
    {
        $nropedido=$this->input->GET('nropedido');
        $anio=$this->input->GET('anio');
        $tipopedido=$this->input->GET('tipopedido');
        $tipobien=$this->input->GET('tipobien');
        $listadetalleporcadapedido=$this->Model_Dashboard_Reporte->DetallePorCadaPedido($nropedido,$anio,$tipopedido,$tipobien);  
        $this->load->view('front/Reporte/ProyectoInversion/detallePorCadaPedido',['listadetalleporcadapedido'=>$listadetalleporcadapedido]);
    }

    function detalleOrdenExpSiaf()
    {
        $anio=$this->input->GET('anio');
        $expsiaf=$this->input->GET('expsiaf');
        $listadetalleOrdenExpSiaf=$this->Model_Dashboard_Reporte->DetalleOrdenExpedSiaf($anio,$expsiaf);  
        $this->load->view('front/Reporte/ProyectoInversion/detalleOrdenExpSiaf.php',['listadetalleOrdenExpSiaf'=>$listadetalleOrdenExpSiaf]);
    }
    
    function detallePorCadaNumOrden()
    {
        $anio=$this->input->GET('anio');
        $tipobien=$this->input->GET('tipobien');
        $numorden=$this->input->GET('numorden');
        $tipoppto=$this->input->GET('tipoppto');
        $listaDetallePorCadaOrden=$this->Model_Dashboard_Reporte->DetallePorCadaNumOrden($anio,$tipobien,$numorden,$tipoppto);
        
        $this->load->view('front/Reporte/ProyectoInversion/detallePorCadaOrden.php',['listaDetallePorCadaOrden'=>$listaDetallePorCadaOrden]);
    }
    public function _load_layout($template)
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view($template);
        $this->load->view('layout/Reportes/footer');
    }

}


