<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Funcion extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function GetFuncion()
    {
        $funcion=$this->db->query("execute sp_Funcion_r");        
        return $funcion->result();
    }

    function GetListaFuncion()
    {
        $data=$this->db->query("select f.id_funcion,f.codigo_funcion,f.nombre_funcion from FUNCION f order by f.codigo_funcion asc");
        return $data->result();
    }

    function GetDivisionFuncional($codigoFuncion)
    {
        $data=$this->db->query("select df.id_div_funcional, df.codigo_div_funcional, df.nombre_div_funcional from funcion f inner join DIVISION_FUNCIONAL df on df.id_funcion=f.id_funcion where df.id_funcion = $codigoFuncion order by df.codigo_div_funcional");
        return $data->result();
    }

    function GetGrupoFuncional($idGrupoFuncional)
    {
        $data=$this->db->query("select gf.id_grup_funcional, gf.codigo_grup_funcional, gf.nombre_grup_funcional 
            from DIVISION_FUNCIONAL df inner join GRUPO_FUNCIONAL gf on df.id_div_funcional = gf.id_div_funcional where gf.id_div_funcional = $idGrupoFuncional order by gf.codigo_grup_funcional");
        return $data->result();
    }

    function GetProvincia()
    {
        $data=$this->db->query("select distinct u.provincia from UBIGEO u ");
        return $data->result();
    }

    function getDistrito($provincia)
    {
        $data=$this->db->query("select  u.distrito from ubigeo u where u.provincia = '$provincia'");
        return $data->result();
    }

    function GetProyectos($idFuncion,$idDivisionFuncional,$idGrupoFuncional,$provincia,$distrito,$fecha1,$fecha2)
    {
        $data=$this->db->query("EXEC sp_Modulo_Reportes @id_funcion=$idFuncion, @id_division_funcional=$idDivisionFuncional, @id_grupo_funcional=$idGrupoFuncional, @provincia=$provincia, @distrito=$distrito, @fecha1=$fecha1, @fecha2=$fecha2");
        return $data->result();
    }

    function AddFucion($txt_codigofuncion,$txt_nombrefuncion)
    {
        $this->db->query("execute sp_Funcion_c '".$txt_codigofuncion."','".$txt_nombrefuncion."'");
        if ($this->db->affected_rows() > 0) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function UpdateFuncion($txt_IdfuncionM,$txt_codigofuncionM,$txt_nombrefuncionM)
    {
       $this->db->query("execute sp_Funcion_u'".$txt_IdfuncionM."','".$txt_codigofuncionM."','".$txt_nombrefuncionM."'");
        if ($this->db->affected_rows() > 0) 
          {
            return true;
          }
          else
          {
            return false;
          }

    }

    function FuncionPipListar()
    {
        $ListarFuncionPip=$this->db->query("select FUNCION.nombre_funcion ,count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional INNER JOIN FUNCION on DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion group by FUNCION.nombre_funcion");

        return $ListarFuncionPip->result();
    }

    function FuncionPipMontoTotalListar()
    {
    $data=$this->db->query("select count (nombre_pi)as CantidadPip, sum(costo_pi)as CostoPip from PROYECTO_INVERSION INNER JOIN GRUPO_FUNCIONAL ON PROYECTO_INVERSION.id_grupo_funcional=GRUPO_FUNCIONAL.id_grup_funcional INNER JOIN  DIVISION_FUNCIONAL on GRUPO_FUNCIONAL.id_div_funcional=DIVISION_FUNCIONAL.id_div_funcional INNER JOIN FUNCION on DIVISION_FUNCIONAL.id_funcion=FUNCION.id_funcion");

    return $data->result()[0];
    }

    function EliminarFuncion($id_funcion){
        $this->db->where('id_funcion',$id_funcion);
        $this->db->delete('FUNCION');
        if($this->db->affected_rows()>0){
            return true;
        }
        else{
            return false;
        }
    }
}