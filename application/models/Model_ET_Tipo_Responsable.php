<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Tipo_Responsable extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
   
    function insertar($flat,$txtDescripcion)
    {
        
        $TipoResponsable=$this->db->query("execute sp_Gestionar_ET_Tipo_Responsable @Opcion='".$flat."',@desc_tipo_responsable_et='".$txtDescripcion."'");

        return true;
    }

    function TipoResponsableListar($flat)
    {
        $data=$this->db->query("execute sp_Gestionar_ET_Tipo_Responsable'".$flat."'");

        return $data->result();
    }
}