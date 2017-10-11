<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_PuntajeCriterioPi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function PipPriorizar()
    {
        $data=$this->db->query("select * from PROYECTO_INVERSION LEFT JOIN PUNTAJE_CRITERIO_PI ON PROYECTO_INVERSION.id_pi=PUNTAJE_CRITERIO_PI.id_pi LEFT JOIN CRITERIO_ESP on PUNTAJE_CRITERIO_PI.id_criterio=CRITERIO_ESP.id_criterio LEFT JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional left join DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional left join FUNCION on DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion");

        return $data->result();
    }

}