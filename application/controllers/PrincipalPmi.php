<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrincipalPmi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_DashboardPmi');
    }

    public function pmi()
    {
        $this->_load_layout('pmi');
    }
    //Listar prioridad
    public function get_cantidad_costo_tipo_pi()
    {
        if ($this->input->is_ajax_request()) 
        {
            $Opcion = "cantidad_costo_tipo_pi";
            $anio   = $this->input->post("anio");
            $data   = $this->Model_DashboardPmi->get_cantidad_costo_tipo_pi($Opcion, $anio);
            foreach ($data as $key => $value) 
            {
                $value->SumaTotal = $this->a_number_format((floatval($data[0]->SumaCosto) + floatval($data[1]->SumaCosto)) , 2, '.',",",3);  
                $value->SumaCosto = $this->a_number_format($value->SumaCosto , 2, '.',",",3);
            }         
            echo json_encode($data);
        }
        else 
        {
            show_404();
        }
    }

    public function MontoProgramado()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->MontoProgramado();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }
    public function EstadisticaPipProvinc()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaPipProvinc();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }

    /*public function EstadisticaMontoPipProvincias()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaMontoPipProvincias();
            echo json_encode($datos);
        } else {
            show_404();
        }
    }*/
    public function EstadisticaMontoPipProvincias()
    {
     if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaMontoPipProvincias();
            foreach ($datos as $key => $Itemp) {
               $MontopipProvincias[$key]=$Itemp->MontoProyecto;
            }
            echo json_encode($MontopipProvincias);
        } else
        show_404();
    }
    public function EstadisticaPipEstadoCiclo()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaPipEstadoCiclo();
            echo json_encode($datos);
        } else {
            show_404();
        }

    }
    public function EstadisticaMontoPipCicloInversion()
    {
       if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->EstadisticaMontoPipCicloInversion();
            foreach ($datos as $key => $Itemp) {
               $MontopipCiclo[$key]=$Itemp->MontoProyecto;
            }
            echo json_encode($MontopipCiclo);
        } else
        show_404();
    }

    public function GetDatosUbicacion()
    {
        if ($this->input->is_ajax_request()) {
            $datos = $this->Model_DashboardPmi->GetDatosUbicacion();
            echo json_encode($datos);
        } else {
            show_404();
        }

    }

    public function _load_layout($template)
    {
        $this->load->view('layout/PMI/header');
        $this->load->view($template);
        $this->load->view('layout/PMI/footer');
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

}
