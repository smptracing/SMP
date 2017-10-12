<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_PuntajeCriterioPi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function PipPriorizar($funcion)
    {
        $data=$this->db->query("select PRV.id_pi,PRV.codigo_unico_pi,PRV.nombre_pi,PRV.costo_pi,Pc.puntaje_criterio,FUNCION.id_funcion,FUNCION.nombre_funcion from PROYECTO_INVERSION PRV  LEFT JOIN PUNTAJE_CRITERIO_PI Pc ON 
                                PRV.id_pi=Pc.id_pi LEFT JOIN CRITERIO_ESP on
                                Pc.id_criterio=CRITERIO_ESP.id_criterio LEFT JOIN GRUPO_FUNCIONAL 
                                ON PRV.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional left join 
                                DIVISION_FUNCIONAL on
                                GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional left join FUNCION on
                                DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion   where FUNCION.id_funcion='".$funcion."'");

        return $data->result();
    }
    function FuncionPip()
    {
    	$data=$this->db->query("select * from FUNCION");

        return $data->result();
    }
    function proyectoInvUnico($id_pi)
    {
        $data=$this->db->query("select proI.id_pi,proI.codigo_unico_pi,proI.nombre_pi  from PROYECTO_INVERSION proI where id_pi='".$id_pi."' ");

        return $data->result()[0];
    }

}