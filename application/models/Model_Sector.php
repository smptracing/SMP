<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Sector extends CI_Model
{
           public function __construct()
          {
              parent::__construct();
            // $this->db->free_db_resource();

          }
      /*inicio sector*/
        function GetSector()
        {
            $sector=$this->db->query("execute sp_Sector_r");//listar sector
            if($sector->num_rows()>0)
             {
              return $sector->result();
             }else
             {
              return false;
             }
   
        }
        function AddSector($txt_NombreSector)
        {
           $mensaje=$this->db->query("execute sp_Sector_c '".$txt_NombreSector."'");
             if($mensaje->num_rows()>0)
             {
              return $mensaje->result();
             }
             else
              {
                return false;
              }

        }
        //modifica los sectores
    function UpdateSector($id_sector,$nombre_sector)
    {
       $this->db->query("execute sp_Sector_u '".$id_sector."','".$nombre_sector."'");
        if ($this->db->affected_rows() > 0) 
          {
            return true;
          }
          else
          {
            return false;
          }

    }
  
    function EliminarSector($id_sector){
    	return true;
    }

    function SectorPipListar()
    {
        $ListarSectorPip=$this->db->query("select sector.nombre_sector, COUNT(nombre_pi) as CantidadPip, sum(costo_pi)AS CostoPip from PROYECTO_INVERSION inner join GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional  INNER JOIN sector ON grupo_funcional.id_sector=sector.id_sector group by sector.nombre_sector");

        return $ListarSectorPip->result();
    }

	function SectorPipMontoTotalListar()
	{
	    $ListarCostoTotalSectorPip=$this->db->query("select  COUNT(nombre_pi) as TotalPip ,sum(costo_pi)AS CostoTotal from PROYECTO_INVERSION inner join GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional  INNER JOIN sector ON grupo_funcional.id_sector=sector.id_sector");

	    return $ListarCostoTotalSectorPip->result()[0];
	}

}