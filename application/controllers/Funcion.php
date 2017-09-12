<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Funcion extends CI_Controller {/* Mantenimiento de sector entidad Y servicio publico asociado*/

    public function __construct(){
        parent::__construct();
        $this->load->model('Model_Funcion');
    }

     public function index()
    {
        $listaNumPipFuncion=$this->Model_Funcion->FuncionPipListar();
        $this->load->view('layout/Reportes/header');
        $this->load->view('front/Reporte/Funcion/index',['listaNumPipFuncion'=>$listaNumPipFuncion]);
        $this->load->view('layout/Reportes/footer');
    }
    public function CadenaFuncional()
    {
        $this->load->view('layout/Reportes/header');
        $this->load->view('front/Reporte/CadenaFuncional/index');
        $this->load->view('layout/Reportes/footer');
    }

    function GetFuncion()
    {
        if ($this->input->is_ajax_request()) 
        {
            $datos=$this->Model_Funcion->GetFuncion();
            echo json_encode($datos);
        }
        else
        {
            show_404();
        }
    }

    function GetListaFuncion()
    {
        $datos=$this->Model_Funcion->GetListaFuncion();
        echo json_encode($datos);
    }

    function GetDivisionFuncional()
    {
        $idFuncion=$this->input->post('idFuncion');
        $datos=$this->Model_Funcion->GetDivisionFuncional($idFuncion);
        echo json_encode($datos);
    }
    function GetGrupoFuncional()
    {
        $idDivisionFuncional=$this->input->post('idDivisionFuncional');
        $datos=$this->Model_Funcion->GetGrupoFuncional($idDivisionFuncional);
        echo json_encode($datos);
    }
    function GetProvincia()
    {
        $datos=$this->Model_Funcion->GetProvincia();
        echo json_encode($datos);
    }
    function GetDistrito()
    {
        $provincia=$this->input->post('provincia');
        $datos=$this->Model_Funcion->GetDistrito($provincia);
        echo json_encode($datos);
        exit;
    }
    function ProyectosPorCadenaFuncional()
    {
        if ($this->input->is_ajax_request()) 
        {
            $idFuncion = $this->input->post('idFuncion');
            $idDivisionFuncional = $this->input->post('idDivisionFuncional');
            $idGrupoFuncional = $this->input->post('idGrupoFuncional');
            $provincia = $this->input->post('idProvincia');
            $distrito = $this->input->post('idDistrito');
            $deFecha = $this->input->post('deFecha');
            $aFecha = $this->input->post('aFecha');

            $idFuncion=(($idFuncion=='' || $idFuncion==null) ? 'NULL' : $idFuncion);
            $idDivisionFuncional=(($idDivisionFuncional=='' || $idDivisionFuncional==null) ? 'NULL' : $idDivisionFuncional);
            $idGrupoFuncional=(($idGrupoFuncional=='' || $idGrupoFuncional==null) ? 'NULL' : $idGrupoFuncional);
            $provincia=(($provincia=='' || $provincia==null) ? 'NULL' : "'".$provincia."'");
            $distrito=(($distrito=='' || $distrito==null) ? 'NULL' : "'".$distrito."'");
            $fecha1=(($deFecha=='' || $deFecha==null) ? 'NULL' : "'".$deFecha."'");
            $fecha2=(($aFecha=='' || $aFecha==null) ? 'NULL' : "'".$aFecha."'");

            $datos=$this->Model_Funcion->GetProyectos($idFuncion,$idDivisionFuncional,$idGrupoFuncional,$provincia,$distrito,$fecha1,$fecha2);

            $totalBeneficiarios=0;
            foreach ($datos as $key => $value) 
            {
                $totalBeneficiarios += ($value->num_beneficiarios=='NULL' ? 0 : $value->num_beneficiarios);
                $value->num_beneficiarios = $this->a_number_format($value->num_beneficiarios , 2, '.',",",3);
                $value->costo_pi = $this->a_number_format($value->costo_pi , 2, '.',",",3);
            }
            $totalBeneficiarios = $this->a_number_format($totalBeneficiarios , 2, '.',",",3);
            $this->load->view('front/Reporte/CadenaFuncional/tablaFuncion',['listaProyectos'=>$datos, 'totalBeneficiarios' => $totalBeneficiarios]);
        }
        else
        {
            show_404();
        }
    }


    function AddFucion()
    {
        if ($this->input->is_ajax_request()) 
        {
            $txt_codigofuncion =$this->input->post("txt_codigofuncion");
            $txt_nombrefuncion =$this->input->post("txt_nombrefuncion");
            if($this->Model_Funcion->AddFucion($txt_codigofuncion,$txt_nombrefuncion) == true)
                echo "Se añadio una función";
            else
                echo "Se añadio  una función";  
        }
        else
        {
            show_404();
        }

    }

    function UpdateFuncion()
    {
        if ($this->input->is_ajax_request()) 
        {
            $txt_IdfuncionM =$this->input->post("txt_IdfuncionM");
            $txt_codigofuncionM =$this->input->post("txt_codigofuncionM");
            $txt_nombrefuncionM =$this->input->post("txt_nombrefuncionM");

            if($this->Model_Funcion->UpdateFuncion($txt_IdfuncionM,$txt_codigofuncionM,$txt_nombrefuncionM) == true)
                echo "Se actualizao  la función";
            else
                echo "Se actualizo la  función";  
        }
        else
        {
            show_404();
        }

    }
    function a_number_format($number_in_iso_format, $no_of_decimals=3, $decimals_separator='.', $thousands_separator='', $digits_grouping=3)
    {
        // Check input variables
        if (!is_numeric($number_in_iso_format)){
            error_log("Warning! Wrong parameter type supplied in my_number_format() function. Parameter \$number_in_iso_format is not a number.");
            return false;
        }
        if (!is_numeric($no_of_decimals)){
            error_log("Warning! Wrong parameter type supplied in my_number_format() function. Parameter \$no_of_decimals is not a number.");
            return false;
        }
        if (!is_numeric($digits_grouping)){
            error_log("Warning! Wrong parameter type supplied in my_number_format() function. Parameter \$digits_grouping is not a number.");
            return false;
        }
        
        
        // Prepare variables
        $no_of_decimals = $no_of_decimals * 1;
        
        
        // Explode the string received after DOT sign (this is the ISO separator of decimals)
        $aux = explode(".", $number_in_iso_format);
        // Extract decimal and integer parts
        $integer_part = $aux[0];
        $decimal_part = isset($aux[1]) ? $aux[1] : '';
        
        // Adjust decimal part (increase it, or minimize it)
        if ($no_of_decimals > 0){
            // Check actual size of decimal_part
            // If its length is smaller than number of decimals, add trailing zeros, otherwise round it
            if (strlen($decimal_part) < $no_of_decimals){
                $decimal_part = str_pad($decimal_part, $no_of_decimals, "0");
            } else {
                $decimal_part = substr($decimal_part, 0, $no_of_decimals);
            }
        } else {
            // Completely eliminate the decimals, if there $no_of_decimals is a negative number
            $decimals_separator = '';
            $decimal_part       = '';
        }
        
        // Format the integer part (digits grouping)
        if ($digits_grouping > 0){
            $aux = strrev($integer_part);
            $integer_part = '';
            for ($i=strlen($aux)-1; $i >= 0 ; $i--){
                if ( $i % $digits_grouping == 0 && $i != 0){
                    $integer_part .= "{$aux[$i]}{$thousands_separator}";
                } else {
                    $integer_part .= $aux[$i];            
                }
            }
        }
        
        $processed_number = "{$integer_part}{$decimals_separator}{$decimal_part}";
        return $processed_number;
    }


    function _load_layout($template)
    {
        $this->load->view('layout/ADMINISTRACION/header');
        $this->load->view($template);
        $this->load->view('layout/ADMINISTRACION/footer');
    }

}
