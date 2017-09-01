<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Estudio_Inversion_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function UsuarioPersona($idUsuario)
    {
        $listarPersonaUsuario = $this->db->query("select * from USUARIO  inner join PERSONA  
                                on USUARIO.id_persona=PERSONA.id_persona 
                                where  USUARIO.id_usuario='".$idUsuario."' ");
         return $listarPersonaUsuario ->result()[0]; 

    }
    public function get_EstudioInversion($idPersona,$TipoUsuario)
    {
        if($TipoUsuario==1)
        {
          $listar_estudio_persona='listar_estudio_completo';
        }
        else
        {
          $listar_estudio_persona='listar_estudio_persona';
        }
        
        $EstudioInversion = $this->db->query("EXEC sp_ListarEstudioInversion @opcion='".$listar_estudio_persona."', @id_persona='".$idPersona."' ");
        if ($EstudioInversion->num_rows() > 0) {
            return $EstudioInversion->result();
        } else {
            return false;
        }
    }

    public function get_listaproyectos()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $EstudioInversion = $this->db->query(" select        PROYECTO_INVERSION.id_pi, PROYECTO_INVERSION.codigo_unico_pi , PROYECTO_INVERSION.nombre_pi
                            FROM  TIPOLOGIA_INVERSION RIGHT OUTER JOIN
                            PROYECTO_INVERSION INNER JOIN
                            META_PRESUPUESTAL_PI ON PROYECTO_INVERSION.id_pi = META_PRESUPUESTAL_PI.id_pi INNER JOIN
                            META_PRESUPUESTAL ON META_PRESUPUESTAL_PI.id_meta_pres = META_PRESUPUESTAL.id_meta_pres INNER JOIN
                            CORRELATIVO_META ON META_PRESUPUESTAL_PI.id_correlativo_meta = CORRELATIVO_META.id_correlativo_meta INNER JOIN
                            (SELECT        id_pi, MAX(id_meta_pi) AS fe_meta FROM META_PRESUPUESTAL_PI AS META_PRESUPUESTAL_PI_1
                            GROUP BY id_pi) AS fe_meta_pi ON META_PRESUPUESTAL_PI.id_meta_pi = fe_meta_pi.fe_meta LEFT OUTER JOIN
                            PROGRAMA_PRESUPUESTAL ON PROYECTO_INVERSION.id_programa_pres = PROGRAMA_PRESUPUESTAL.id_programa_pres LEFT OUTER JOIN
                            NIVEL_GOBIERNO ON PROYECTO_INVERSION.id_nivel_gob = NIVEL_GOBIERNO.id_nivel_gob ON 
                            TIPOLOGIA_INVERSION.id_tipologia_inv = PROYECTO_INVERSION.id_tipologia_inv LEFT OUTER JOIN
                            UNIDAD_EJECUTORA ON PROYECTO_INVERSION.id_ue = UNIDAD_EJECUTORA.id_ue LEFT OUTER JOIN
                            TIPO_INVERSION ON PROYECTO_INVERSION.id_tipo_inversion = TIPO_INVERSION.id_tipo_inversion LEFT OUTER JOIN
                            UNIDAD_FORMULADORA ON PROYECTO_INVERSION.id_uf = UNIDAD_FORMULADORA.id_uf LEFT OUTER JOIN
                            NATURALEZA_INVERSION ON PROYECTO_INVERSION.id_naturaleza_inv = NATURALEZA_INVERSION.id_naturaleza_inv LEFT OUTER JOIN
                            DIVISION_FUNCIONAL INNER JOIN
                            GRUPO_FUNCIONAL ON DIVISION_FUNCIONAL.id_div_funcional = GRUPO_FUNCIONAL.id_div_funcional INNER JOIN
                            FUNCION ON DIVISION_FUNCIONAL.id_funcion = FUNCION.id_funcion ON 
                            PROYECTO_INVERSION.id_grupo_funcional = GRUPO_FUNCIONAL.id_grup_funcional
                            where PROYECTO_INVERSION.id_pi in (select distinct id_pi from programacion inner join CARTERA_INVERSION on PROGRAMACION.id_cartera = CARTERA_INVERSION.id_cartera where year(año_apertura_cartera) = 2017)
                            and TIPO_INVERSION.nombre_tipo_inversion = 'PIP' ");
        if ($EstudioInversion->num_rows() > 0) {
            return $EstudioInversion->result();
        } else {
            return false;
        }
    }

    public function get_UnidadFormuladora()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $unidadformuladora = $this->db->query("select id_uf,nombre_uf from UNIDAD_FORMULADORA");
        if ($unidadformuladora->num_rows() > 0) {
            return $unidadformuladora->result();
        } else {
            return false;
        }
    }

    public function get_UnidadEjecutora()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $unidadejecutora = $this->db->query("  select id_ue,nombre_ue from UNIDAD_EJECUTORA");
        if ($unidadejecutora->num_rows() > 0) {
            return $unidadejecutora->result();
        } else {
            return false;
        }
    }
    public function get_persona()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $persona = $this->db->query("select PERSONA.id_persona,CONCAT(PERSONA.nombres,' ',PERSONA.apellido_p) as nombres_apell  from PERSONA");
        if ($persona->num_rows() > 0) {
            return $persona->result();
        } else {
            return false;
        }
    }

    public function get_TipoEstudio()
    {
        $TipoEstudio = $this->db->query("select id_tipo_est,nombre_tipo_est from TIPO_ESTUDIO");
        if ($TipoEstudio->num_rows() > 0) {
            return $TipoEstudio->result();
        } else {
            return false;
        }
    }
    public function get_NivelEstudio()
    {
        $NivelEstudio = $this->db->query("select id_nivel_estudio,denom_nivel_estudio from NIVEL_ESTUDIO");
        if ($NivelEstudio->num_rows() > 0) {
            return $NivelEstudio->result();
        } else {
            return false;
        }
    }
    public function get_etapasFE()
    {
        $etapa = $this->db->query("select id_etapa_fe,denom_etapas_fe from ETAPAS_FE");
        if ($etapa->num_rows() > 0) {
            return $etapa->result();
        } else {
            return false;
        }
    }
    public function get_cargo()
    {
        $cargo = $this->db->query("select id_cargo,desc_cargo from Cargo");
        if ($cargo->num_rows() > 0) {
            return $cargo->result();
        } else {
            return false;
        }
    }
    //actualizar el campo en seguiimiento igual 0
    public function AddEtapaEstudio($flat, $id_etapa_estudio, $id_est_inv, $listaretapasFE_M, $dateFechaIniC, $dateFechaIniF, $txtAvanceFisico, $txadescripcion)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $EtapaEstudio = $this->db->query("execute sp_Gestionar_EstapaEstudio'"
            . $flat . "','"
            . $id_etapa_estudio . "', '"
            . $id_est_inv . "', '"
            . $listaretapasFE_M . "', '"
            . $dateFechaIniC . "', '"
            . $dateFechaIniF . "', '"
            . $txtAvanceFisico . "', '"
            . $txadescripcion . "' ");
        if ($EtapaEstudio->num_rows() > 0) {
            return $EtapaEstudio->result();
        } else {
            return false;
        }
    }
    public function AddEstudioInversion($flat, $id_est_inv, $txtCodigoUnico, $txtnombres, $listaFuncionC, $listaTipoInversion, $listaNivelEstudio, $lista_unid_form, $lista_unid_ejec, $txadescripcion, $txtMontoInversion, $txtcostoestudio)
    {
        $EstudioInversion = $this->db->query("execute sp_Gestionar_EstudioInversion'"
            . $flat . "','"
            . $id_est_inv . "','"
            . $txtCodigoUnico . "','"
            . $txtnombres . "', '"
            . $listaFuncionC . "', '"
            . $listaTipoInversion . "', '"
            . $listaNivelEstudio . "', '"
            . $lista_unid_form . "', '"
            . $lista_unid_ejec . "', '"
            . $txadescripcion . "', '"
            . $txtMontoInversion . "', '"
            . $txtcostoestudio . "' "

        );

        if ($EstudioInversion->num_rows() > 0) {
            return $EstudioInversion->result();
        } else {
            return false;
        }
    }
    public function AddResponsableEstudio($flat, $id_est_inv, $listaResponsables, $dateFechaAsig)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $ResponsableEstudio = $this->db->query("execute sp_Gestionar_RespondableEstudio'"
            . $flat . "','"
            . $id_est_inv . "', '"
            . $listaResponsables . "', '"
            . $dateFechaAsig . "' ");
        if ($ResponsableEstudio->num_rows() > 0) {
            return $ResponsableEstudio->result();
        } else {
            return false;
        }
    }

    public function AddAsiganarPersona($flat, $Cbx_Persona, $Cbx_Cargo, $txt_IdEtapa_Estudio_p, $txadescripcion)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $AsiganarPersona = $this->db->query("execute sp_Gestionar_AsignarPersona'"
            . $flat . "','"
            . $Cbx_Persona . "', '"
            . $Cbx_Cargo . "', '"
            . $txt_IdEtapa_Estudio_p . "', '"
            . $txadescripcion . "' ");
        if ($AsiganarPersona->num_rows() > 0) {
            return $AsiganarPersona->result();
        } else {
            return false;
        }
    }
    public function AddCoordinadorEstudio($flat, $Cbx_Persona, $Cbx_Cargo, $txt_IdEtapa_Estudio_p, $txadescripcion)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $coordinadorEstudio = $this->db->query("execute sp_Gestionar_AsignarPersona'"
            . $flat . "','"
            . $Cbx_Persona . "', '"
            . $Cbx_Cargo . "', '"
            . $txt_IdEtapa_Estudio_p . "', '"
            . $txadescripcion . "' ");
        if ($coordinadorEstudio->num_rows() > 0) {
            return $coordinadorEstudio->result();
        } else {
            return false;
        }
    }

    public function AddEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion)
    {

        $this->db->query("execute SP_Gestionar_EstadoCiclo'" . $flat . "','" . $txt_IdEstadoCicloInversion . "', '" . $txt_NombreEstadoCicloInversion . "','" . $txt_DescripcionEstadoCicloInversion . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function EliminarEstadoCicloInversion($flat, $txt_IdEstadoCicloInversion, $txt_NombreEstadoCicloInversion, $txt_DescripcionEstadoCicloInversion)
    {

        $this->db->query("execute SP_Gestionar_EstadoCiclo'" . $flat . "','" . $txt_IdEstadoCicloInversion . "', '" . $txt_NombreEstadoCicloInversion . "','" . $txt_DescripcionEstadoCicloInversion . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function UpdateEstadoCicloInversion($flat, $txt_IdEstadoCicloInversionM, $txt_NombreEstadoCicloInversionM, $txt_DescripcionEstadoCicloInversionM)
    {

        $this->db->query("execute SP_Gestionar_EstadoCiclo'" . $flat . "','" . $txt_IdEstadoCicloInversionM . "', '" . $txt_NombreEstadoCicloInversionM . "','" . $txt_DescripcionEstadoCicloInversionM . "' ");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function AddDocumentosEstudio($txt_id_est_invAdd, $txt_documentosEstudio, $txt_descripcionEstudio, $Url_documento)
    {
        $this->db->query("execute sp_DocumentoInversion_r '" . $txt_id_est_invAdd . "','" . $txt_documentosEstudio . "', '" . $txt_descripcionEstudio . "','" . $Url_documento . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    //ver las etpas de estudio
    public function get_etapas_estudio($txtIdEtapaEstudio_v)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $veretapasestudio = $this->db->query("execute sp_ListarEtapasEstudio'"
            . $txtIdEtapaEstudio_v . "'");
        if ($veretapasestudio->num_rows() > 0) {
            return $veretapasestudio->result();
        } else {
            return false;
        }
    }

    public function GetDocumentosEstudio($id_est_inv)
    {
        $documentos = $this->db->query("select id_documento,id_est_inv,nombre_documento,desc_documento,url_documento from DOCUMENTOS_INVERSION where id_est_inv=$id_est_inv");
        if ($documentos->num_rows() > 0) {
            return $documentos->result();
        } else {
            return false;
        }
    }
    public function get_listaproyectosCargar($id_Pi)
      {
          $opcion="obtenerdatosporpipdelabusquedaproyectoinversion";
          $EstudioInversionCargar = $this->db->query("execute  sp_Gestionar_ProyectoInversion @Opcion='".$opcion."',@id_pi='".$id_Pi."'");
          if ($EstudioInversionCargar->num_rows() > 0) 
          {
              return $EstudioInversionCargar->result();
          }
      }

}
