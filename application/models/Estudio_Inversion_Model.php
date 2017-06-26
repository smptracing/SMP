<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Estudio_Inversion_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    public function get_EstudioInversion()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $sql = "select ee.id_est_inv, nombre_est_inv, pe.id_persona, (pe.nombres +' '+pe.apellido_p +' '+ pe.apellido_m) as nombres,  fecha, denom_etapas_fe\n"
            . "	from ETAPA_ESTUDIO ee inner join (select id_est_inv, max(fecha_estado) fees from ETAPA_ESTUDIO\n"
            . "	group by id_est_inv) ll on ee.id_est_inv = ee.id_est_inv and ee.fecha_estado = ll.fees \n"
            . "	inner join ETAPAS_FE efe on ee.id_etapa_fe = efe.id_etapa_fe \n"
            . "	inner join ESTUDIO_INVERSION ei on ei.id_est_inv = ee.id_est_inv\n"
            . "	inner join RESPONSABLE_ESTUDIO re on re.id_est_inv = ei.id_est_inv\n"
            . "	inner join PERSONA pe on pe.id_persona = re.id_persona";

        $EstudioInversion = $this->db->query($sql);
        if ($EstudioInversion->num_rows() > 0) {
            return $EstudioInversion->result();
        } else {
            return false;
        }
    }

    public function get_listaproyectos()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $EstudioInversion = $this->db->query("select PROYECTO_INVERSION.id_pi,PROYECTO_INVERSION.codigo_unico_pi,PROYECTO_INVERSION.nombre_pi,TIPO_INVERSION.nombre_tipo_inversion from PROYECTO_INVERSION inner join TIPO_INVERSION on PROYECTO_INVERSION.id_tipo_inversion=TIPO_INVERSION.id_tipo_inversion");
        if ($EstudioInversion->num_rows() > 0) {
            return $EstudioInversion->result();
        } else {
            return false;
        }
    }

    public function get_UnidadFormuladora()
    {
        //  $EstadoCicloInversion = $this->db->query("execute get");
        $unidadformuladora = $this->db->query("  select id_uf,nombre_uf from UNIDAD_FORMULADORA");
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
    public function AddEstudioInversion($flat, $id_est_inv, $txtCodigoUnico, $txtnombres, $listaFuncionC, $listaTipoInversion, $listaNivelEstudio, $lista_unid_form, $lista_unid_ejec, $txadescripcion, $txtMontoInversion, $txtcostoestudio, $listaResponsables, $dateFechaAsig)
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
            . $txtcostoestudio . "', '"
            . $listaResponsables . "', '"
            . $dateFechaAsig . "' "

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

}
