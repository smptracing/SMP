<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_ET_Responsable extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();
          }
        function insertarET_Epediente($id_et,$ComboResponsableEjecucion,$ComboTipoResponsableEjecucion,$comboCargoEjecucion)
        {
            $estado_responsable_et=1;
            $mensaje1=$this->db->query("insert into ET_RESPONSABLE(id_et,id_persona,id_tipo_responsable_et,id_cargo,estado_responsable_et)values('".$id_et."','".$ComboResponsableEjecucion."','".$ComboTipoResponsableEjecucion."','".$comboCargoEjecucion."','".$estado_responsable_et."')");
            return true;
        }      
}