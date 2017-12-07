<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mo_Actividad extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Mo_Actividad');
        $this->load->model('Model_Unidad_Medida');
    }

    function Insertar()
    {
        if($_POST)
        {
            $msg = array();

            $existe = count($this->Model_Mo_Actividad->verificarActividad($this->input->post('hdIdProducto'),$this->input->post('txtActividad')));
            if($existe!=0)
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'Ya existe esa actividad.']);
                echo json_encode($msg);
                exit;
            }

            $c_data['desc_actividad'] = $this->input->post('txtActividad');
            $c_data['uni_medida'] = $this->input->post('txtUnidad');
            $c_data['fecha_inicio'] = $this->input->post('txtFechaInicio');
            $c_data['fecha_fin'] = $this->input->post('txtFechaFin');
            $c_data['meta'] = $this->input->post('txtMeta');
            $c_data['id_producto'] =  $this->input->post('hdIdProducto');

            $data = $this->Model_Mo_Actividad->insertar($c_data);            

            $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron registrados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;
        }

        $idPi = $this->input->get('idPi');
        $idProducto = $this->input->get('idProducto');
        $listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
        $this->load->view('front/Monitoreo/Mo_Actividad/insertar',['listaUnidadMedida' => $listaUnidadMedida, 'idPi' => $idPi, 'idProducto'=>$idProducto ]); 
    }

    function editar()
    {
        if($_POST)
        {
            $msg = array();

            $existe = count($this->Model_Mo_Actividad->verificarActividadDiferente($this->input->post('hdIdProducto'),$this->input->post('hdIdActividad'),$this->input->post('txtActividad')));
            if($existe!=0)
            {
                $msg = (['proceso' => 'Error', 'mensaje' => 'Ya existe esa actividad.']);
                echo json_encode($msg);
                exit;
            }

            $c_data['desc_actividad'] = $this->input->post('txtActividad');
            $c_data['uni_medida'] = $this->input->post('txtUnidad');
            $c_data['fecha_inicio'] = $this->input->post('txtFechaInicio');
            $c_data['fecha_fin'] = $this->input->post('txtFechaFin');
            $c_data['meta'] = $this->input->post('txtMeta');

            $data = $this->Model_Mo_Actividad->editar($c_data,$this->input->post('hdIdActividad'));            
            $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'los datos fueron editados correctamente']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));

            echo json_encode($msg);exit;
        }

        $idPi = $this->input->get('idPi');
        $actividad = $this->Model_Mo_Actividad->actividadId($this->input->get('idActividad'));
        $listaUnidadMedida=$this->Model_Unidad_Medida->UnidadMedidad_Listar();
        $this->load->view('front/Monitoreo/Mo_Actividad/editar',['listaUnidadMedida' => $listaUnidadMedida, 'idPi' => $idPi, 'actividad'=>$actividad ]);
    }

    function eliminar()
    {
        $msg = array();
        $data = $this->Model_Mo_Actividad->eliminar($this->input->post('idActividad'));
        $msg = ($data > 0 ? (['proceso' => 'Correcto', 'mensaje' => 'La actividad fue eliminada']) : (['proceso' => 'Error', 'mensaje' => 'Ha ocurrido un error inesperado.']));
        echo json_encode($msg);exit;
    }
}
