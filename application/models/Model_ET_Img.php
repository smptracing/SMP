<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ET_Img extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    function insertarImgExpediente($id_et,$urlImge)
    {
        $this->db->query("insert into ET_IMG(id_et,desc_img) values('".$id_et."','".$urlImge."') ");
        return true;
    }

}