<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_PMI_ubicacion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function insertar($id,$img)
    {
      $this->db->query("insert into UBIGEO_PI_IMG(id_ubigeo_pi,url_img) values ($id,'".$img."')");
      return true;
    
    }

    public function ultipoUbigeoPEI()
    {
         $data=$this->db->query("select max(id_ubigeo_pi) as id_ubigeo_pi from UBIGEO_PI ");
         return $data->result()[0];

    }


}
