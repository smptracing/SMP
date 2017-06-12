<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_DashboardPmi extends CI_Model
{
           public function __construct()
          {
              parent::__construct();

          }

      function EstadisticaPipProvinc()
        {
   $consulta= $this->db->query('select provincia, count(provincia) AS Cantidadpip from UBIGEO_PI INNER JOIN PROYECTO_INVERSION ON UBIGEO_PI.id_pi=PROYECTO_INVERSION.id_pi inner join UBIGEO on UBIGEO.id_ubigeo=UBIGEO_PI.id_ubigeo  where UBIGEO.provincia is not null group by provincia');
    return $consulta->result();

        } 
//FIN LISTAR UNA BRECHA
       
}