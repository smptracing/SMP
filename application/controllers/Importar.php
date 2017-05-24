<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importar extends CI_Controller
{
/* Mantenimiento de sector entidad Y servicio publico asociado*/

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Importar_Model');
    }

    public function index()
    {
        $this->_load_layout('Front/Pmi/frmMProyectoInversion');
    }

    public function addImportar()
    {

        //UPLOAD

        $config['upload_path']   = 'uploads/';
        $config['allowed_types'] = 'xls|xlsx|cvs';
        $config['max_size']      = 15000;
        $config['encrypt_name']  = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('archivo')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            //var_dump($data['upload_data']);
            echo "Se subio correctamente el archivo";
            //$this->load->view('upload_success', $data);
        }

        // IMPORTAR
        $this->load->library('Excelfile');
        $file = "uploads/" . $data['upload_data']['file_name'];

        echo $file;

        $obj      = PHPExcel_IOFactory::load($file);
        $cell     = $obj->getActiveSheet()->getCellCollection();
        $arr_data = array();
        // var_dump($cell);
        foreach ($cell as $cl) {
            $column     = $obj->getActiveSheet()->getCell($cl)->getColumn();
            $row        = $obj->getActiveSheet()->getCell($cl)->getRow();
            $data_value = $obj->getActiveSheet()->getCell($cl)->getValue();
            //print_r($data_value);
            if ($row == 1) {
                //echo 'ROW -> '.$row.'<br>';
                //echo 'ROW -> '.$data_value.'<br>';
                $header[$row][$column] = $data_value;

            }
            if ($row > 2) {
                # code...
                // int $i                   = 0;
                $arr_data[$row][$column] = $data_value;

                //$arr_data[3][1] = $nombre;

                // var_dump($arr_data[$row][$column]);
                // echo "---"+$nombre;
                // echo $i++;
                //var_dump($arr_data[$row][$column]);
                //echo "<br>";
            }
        }

        $data['header'] = $header;
        $data['values'] = $arr_data;

        $fecha  = "2008/07/05";
        $fechas = "2006/07/05";
        $anio   = "2017/01/01";

        foreach ($arr_data as $fila) {
            /*
            $distrito = $fila['L'];
            if ( strpos($distrito, '-' ) ) {
            $distrito1 = subtr
            $distrito2 = subtr
            }

            $data_tmp = $fila;
            //posner en L nuevvo string y desplazar el resto
            $this->Importar_Model->addImportar($data_tmp);
             */
            //echo "</BR>";
            //echo $fila;
            $this->Importar_Model->addImportar($fila, $fecha, $fechas);
        }

    }
/*
function _load_layout($template)
{
$this->load->view('layout/PMI/header');
$this->load->view($template);
$this->load->view('layout/PMI/footer');
}
 */
}
