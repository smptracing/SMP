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

    function ListarImagen($id_et)
    {
    	$ListarImagen=$this->db->query("select * from ET_IMG where id_et='".$id_et."'");
        return $ListarImagen->result();
    }

    function EliminarImagen($id_img)
    {
    	$eliminar=$this->db->query("delete ET_IMG where id_img='".$id_img."'");
        return true;
    }
     function buscarImagenId($id_img)
    {
        $listar=$this->db->query("select * from ET_IMG where id_img='".$id_img."' ");
        return $listar->result()[0];
    }
   /* function eliminar($id_et)
	{
		$this->db->query("delete ET_IMG where id_et=".$id_et);

		return true;
	}*/
}