<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Programacion extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      //AGREGAR UN PROYECTO
      function AddProgramacion($cbxCartera,$cbxBrecha,$txtProyectoInvers,$txtMontoProg,$dateAñoProg,$txtPrioridadProg,$txtMontoOpeMan,$txtTipo)
        {
           $this->db->query("execute sp_Programacion_c'".$cbxCartera."','".$cbxBrecha."','".$txtProyectoInvers."','".$txtMontoProg."','".$dateAñoProg."','".$txtPrioridadProg."','".$txtMontoOpeMan."','".$txtTipo."'");
            if ($this->db->affected_rows() > 0) 
              {
                return true;
              }
              else
              {
                return false;
              }
        }
    //FIN AGREGAR UN PROYECTO
}