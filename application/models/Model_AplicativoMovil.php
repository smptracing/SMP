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

    public function listaNoPipPorTipoNoPip($id_tipo_nopip)
    {
        $data=$this->db->query("select * from GRUPO_FUNCIONAL Gfun inner join SECTOR ON Gfun.id_sector=SECTOR.id_sector inner join PROYECTO_INVERSION  ProInv on Gfun.id_grup_funcional=ProInv.id_grupo_funcional 
        inner join UBIGEO_PI on ProInv.id_pi= UBIGEO_PI.id_pi inner join NOPIP np on ProInv.id_pi=np.id_pi inner join  TIPO_NOPIP on np.id_tipo_nopip=TIPO_NOPIP.id_tipo_nopip  where TIPO_NOPIP.id_tipo_nopip='$id_tipo_nopip'");

        return $data->result();
    }

    public function listaTipoNoPip()
    {
        $data = $this->db->query("select * from TIPO_NOPIP");
        
        return $data->result();
    }

    public function listaTotalDeUbicacionesProyecto()
    {
        $dato = $this->db->query("select ProInv.nombre_pi,ProInv.codigo_unico_pi,Gfun.id_grup_funcional,UBIGEO_PI.latitud,UBIGEO_PI.longitud,SECTOR.nombre_sector,SECTOR.id_sector,SECTOR.icono_sector
        from GRUPO_FUNCIONAL Gfun inner join SECTOR ON Gfun.id_sector=SECTOR.id_sector inner join PROYECTO_INVERSION  ProInv on Gfun.id_grup_funcional=ProInv.id_grupo_funcional 
        inner join UBIGEO_PI on ProInv.id_pi= UBIGEO_PI.id_pi");
        
        return $dato->result();
        
    }
    public function busquedaPorCodigoDatosGeneralesPip($codigounico)
    {
       $data = $this->db->query("select * from PROYECTO_INVERSION LEFT join META_PRESUPUESTAL_PI on PROYECTO_INVERSION.id_pi=META_PRESUPUESTAL_PI.id_pi LEFT JOIN DEVENGADO_META ON
         META_PRESUPUESTAL_PI.id_meta_pi=DEVENGADO_META.id_meta_pi WHERE PROYECTO_INVERSION.codigo_unico_pi='".$codigoUnico."' and year(anio_meta_pres)=year(GETDATE())");

        return $data->result()[0];
    }

    public function listapip()
    {
        $data = $this->db->query("select id_pi,FUNCION.nombre_funcion,DIVISION_FUNCIONAL.nombre_div_funcional, GRUPO_FUNCIONAL.nombre_grup_funcional, codigo_unico_pi,  nombre_pi , costo_pi, num_beneficiarios, fecha_registro_pi  from PROYECTO_INVERSION inner join GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN DIVISION_FUNCIONAL ON GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional INNER JOIN FUNCION ON DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion");     
        return $data->result();
    }

}