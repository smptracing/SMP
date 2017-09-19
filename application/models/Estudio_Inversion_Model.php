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
        $listarPersonaUsuario = $this->db->query("SELECT top 1 USUARIO.id_persona,  USUARIO.usuario, PERSONA.id_persona, CONCAT(PERSONA.nombres, ' ', PERSONA.apellido_p, ' ', PERSONA.apellido_m) AS nombresCompleto, 
                                                    USUARIO_TIPO.desc_usuario_tipo, 
                                                    USUARIO_TIPO.cod_usuario_tipo
                                                    FROM   PERSONA inner join USUARIO on PERSONA.id_persona = usuario.id_persona      
                                                    INNER JOIN USUARIO_TIPO ON USUARIO.id_usuario_tipo = USUARIO_TIPO.id_usuario_tipo
                                                    WHERE  USUARIO.id_persona='".$idUsuario."' ");
         return $listarPersonaUsuario ->result()[0]; 

    }
    public function get_EstudioInversion($idPersona,$TipoUsuarioCodigo)
    {
        if($TipoUsuarioCodigo=='01')
        {
          $listar_estudio_persona='listar_estudio_completo';

            $EstudioInversion = $this->db->query("EXEC sp_ListarEstudioInversion @opcion='".$listar_estudio_persona."' ");
                if ($EstudioInversion->num_rows() > 0) {
                    return $EstudioInversion->result();
                } else {
                    return false;
                }
        }
        else
        {
          $listar_estudio_persona='listar_estudio_persona';

            $EstudioInversion = $this->db->query("EXEC sp_ListarEstudioInversion @opcion='".$listar_estudio_persona."', @id_persona='".$idPersona."' ");
                if ($EstudioInversion->num_rows() > 0) {
                    return $EstudioInversion->result();
                } else {
                    return false;
                }
        }
        
        
    }

    public function get_listaproyectos($NombreEstadoFormulacionEvalu)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
         $EstudioInversion = $this->db->query("select MAX(id_prog)as id_prog, año_apertura_cartera, 
                                                nombre_tipo_inversion,ESTADO_CICLO.id_estado_ciclo, nombre_estado_ciclo, PROYECTO_INVERSION.id_pi, 
                                                nombre_pi FROM ESTADO_CICLO inner join ESTADO_CICLO_PI ON ESTADO_CICLO.id_estado_ciclo=ESTADO_CICLO_PI.id_estado_ciclo 
                                                INNER JOIN PROYECTO_INVERSION on ESTADO_CICLO_PI.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN PROGRAMACION on 
                                                PROYECTO_INVERSION.id_pi=PROGRAMACION.id_pi INNER JOIN CARTERA_INVERSION ON CARTERA_INVERSION.id_cartera=PROGRAMACION.id_cartera
                                                inner join TIPO_INVERSION ON PROYECTO_INVERSION.id_tipo_inversion=TIPO_INVERSION.id_tipo_inversion
                                                where year(año_apertura_cartera)=year(GETDATE()) and TIPO_INVERSION.nombre_tipo_inversion='PIP' 
                                                AND nombre_estado_ciclo='".$NombreEstadoFormulacionEvalu."' GROUP BY año_apertura_cartera, nombre_tipo_inversion,
                                                ESTADO_CICLO.id_estado_ciclo, nombre_estado_ciclo, PROYECTO_INVERSION.id_pi, nombre_pi");
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
        $unidadejecutora = $this->db->query("select id_ue,nombre_ue from UNIDAD_EJECUTORA");
        if ($unidadejecutora->num_rows() > 0) {
            return $unidadejecutora->result();
        } else {
            return false;
        }
    }
    public function get_persona($idPersona)
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $opcion='listar_persona_exepto';
        $persona = $this->db->query("EXEC sp_Gestionar_Persona @opcion='".$opcion."', @id_persona='".$idPersona."' ");
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

    public function GetProyectosEstudio()
    {
        $datos = $this->db->query("select * from estudio_inversion");    
        if ($datos->num_rows() > 0) 
        {
            return $datos->result();
        } 
        else 
        {
            return false;
        }
    }

    public function GetProyectosparaEstudio()
    {
        //$datos = $this->db->query("select * from proyecto_inversion py inner join estado_ciclo_pi ec on py.id_pi=ec.id_pi where ec.id_estado_ciclo = 1 or ec.id_estado_ciclo = 2 or ec.id_estado_ciclo = 3");
        $datos = $this->db->query("select MAX(id_prog)as id_prog, año_apertura_cartera, 
        nombre_tipo_inversion,ESTADO_CICLO.id_estado_ciclo, nombre_estado_ciclo, PROYECTO_INVERSION.id_pi, 
        nombre_pi FROM ESTADO_CICLO inner join ESTADO_CICLO_PI ON ESTADO_CICLO.id_estado_ciclo=ESTADO_CICLO_PI.id_estado_ciclo 
        INNER JOIN PROYECTO_INVERSION on ESTADO_CICLO_PI.id_pi=PROYECTO_INVERSION.id_pi INNER JOIN PROGRAMACION on 
        PROYECTO_INVERSION.id_pi=PROGRAMACION.id_pi INNER JOIN CARTERA_INVERSION ON CARTERA_INVERSION.id_cartera=PROGRAMACION.id_cartera
        inner join TIPO_INVERSION ON PROYECTO_INVERSION.id_tipo_inversion=TIPO_INVERSION.id_tipo_inversion
        where year(año_apertura_cartera)=year(GETDATE()) and TIPO_INVERSION.nombre_tipo_inversion='PIP' 
        AND nombre_estado_ciclo='FORMULACION Y EVALUACION' or nombre_estado_ciclo= 'IDEA' or nombre_estado_ciclo='VIABLE' GROUP BY año_apertura_cartera, nombre_tipo_inversion,
        ESTADO_CICLO.id_estado_ciclo, nombre_estado_ciclo, PROYECTO_INVERSION.id_pi, nombre_pi");
        

        if ($datos->num_rows() > 0) 
        {
            return $datos->result();
        } 
        else 
        {
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

    public function EstudioCoordinadorF()
    {
        $data=$this->db->query("select PIP.codigo_unico_pi,EI.nombre_est_inv,
                                STUFF(
                                     (
                                 SELECT ','+provincia AS [text()]
                                 FROM dbo.UBIGEO_PI ubp
                                      INNER JOIN UBIGEO ub ON ubp.id_ubigeo = ub.id_ubigeo
                                 WHERE ubp.id_pi = PIP.id_pi
                                 ORDER BY ub.id_ubigeo FOR XML PATH('')
                                ), 1, 1, '') AS provincia, PIP.costo_pi ,N.denom_nivel_estudio,avance_entregbale 
                                 from ESTUDIO_INVERSION EI INNER JOIN PROYECTO_INVERSION PIP on EI.id_pi=PIP.id_pi inner join NIVEL_ESTUDIO N on EI.id_nivel_estudio=N.id_nivel_estudio left join UF_ENTREGABLE UFE ON EI.id_est_inv=UFE.id_est_inv LEFT JOIN UF_MODULO_ENTREGABLE UFM ON UFE.id_entregable=UFM.id_entregable");

        return $data->result();
    }
}
