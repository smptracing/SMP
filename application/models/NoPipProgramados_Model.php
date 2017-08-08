<?php
defined('BASEPATH') or exit('No direct script access allowed');
class NoPipProgramados_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //listar formulacion y evaluacion del primer modulo PMI
    public function GetNoPipProgramados($flat, $anio)
    {
        $GetNoPipProgramados = $this->db->query("execute sp_ListarProyectoInversionNoPipProgramado'"
            . $flat . "','"
            . $anio . "' ");
        if ($GetNoPipProgramados->num_rows() > 0) {
            return $GetNoPipProgramados->result();
        } else {
            return false;
        }
    }

}
