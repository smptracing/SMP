<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_AplicativoMovil extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function listadoProyectoGrupoFuncional($id_grup_funcional)
    {
        $dato = $this->db->query("select ProInv.nombre_pi,ProInv.codigo_unico_pi,Gfun.id_grup_funcional,UBIGEO_PI.latitud,UBIGEO_PI.longitud,SECTOR.nombre_sector,SECTOR.id_sector,SECTOR.icono_sector
        from GRUPO_FUNCIONAL Gfun inner join SECTOR ON Gfun.id_sector=SECTOR.id_sector inner join PROYECTO_INVERSION  ProInv on Gfun.id_grup_funcional=ProInv.id_grupo_funcional 
        inner join UBIGEO_PI on ProInv.id_pi= UBIGEO_PI.id_pi  WHERE Gfun.id_grup_funcional='$id_grup_funcional' ");
        
        return $dato->result();
        
    }
    public function listarNoPip()
    {
        $data = $this->db->query("select * from TIPO_NOPIP");
        
        return $data->result();
    }

}
