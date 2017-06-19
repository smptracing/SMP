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
        $consulta = $this->db->query('SELECT provincia, count(provincia) AS Cantidadpip FROM UBIGEO_PI INNER JOIN PROYECTO_INVERSION ON UBIGEO_PI.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN UBIGEO ON UBIGEO.id_ubigeo=UBIGEO_PI.id_ubigeo  WHERE UBIGEO.provincia IS NOT NULL GROUP BY provincia');
        return $consulta->result();
    }

    function EstadisticaMontoPipProvincias()
    {
        $consulta = $this->db->query('SELECT provincia, count(provincia) AS Cantidad,SUM(costo_pi) AS MontoProyecto FROM UBIGEO_PI INNER JOIN PROYECTO_INVERSION ON UBIGEO_PI.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN UBIGEO ON UBIGEO.id_ubigeo=UBIGEO_PI.id_ubigeo  WHERE PROYECTO_INVERSION.codigo_unico_pi<>UBIGEO_PI.id_pi GROUP BY provincia');
        return $consulta->result();
    }

    function EstadisticaPipEstadoCiclo()
    {
        $sql = "--15 proyectos y solo creo que 3 estan en estado_ciclo\n"
            . "declare @total int\n"
            . "set @total = (select count(id_estado_ciclo) from ESTADO_CICLO_PI)\n"
            . "SELECT dbo.ESTADO_CICLO.nombre_estado_ciclo, count(ESTADO_CICLO_PI.id_pi) AS Num_Proyectos, @total as Num_Total\n"
            . "FROM            dbo.PROYECTO_INVERSION INNER JOIN\n"
            . "                         dbo.ESTADO_CICLO_PI ON dbo.PROYECTO_INVERSION.id_pi = dbo.ESTADO_CICLO_PI.id_pi INNER JOIN\n"
            . "                         dbo.ESTADO_CICLO ON dbo.ESTADO_CICLO_PI.id_estado_ciclo = dbo.ESTADO_CICLO.id_estado_ciclo\n"
            . "GROUP BY dbo.ESTADO_CICLO.id_estado_ciclo, dbo.ESTADO_CICLO.nombre_estado_ciclo";

        $consulta = $this->db->query($sql);
        return $consulta->result();
    }

    /*function news_get_by_id ( $news_id )
    {

        $this->db->select('*');
        $this->db->select("DATE_FORMAT( date, '%d.%m.%Y' ) as date_human",  FALSE );
        $this->db->select("DATE_FORMAT( date, '%H:%i') as time_human",      FALSE );


        $this->db->from('news');

        $this->db->where('news_id', $news_id );


        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $row = $query->row_array();
            return $row;
        }

    }*/
}