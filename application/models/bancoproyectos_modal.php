<?php
defined('BASEPATH') or exit('No direct script access allowed');
class bancoproyectos_modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();

    }
    //Add ubigeo a un proyecto
    public function Add_ubigeo_proyecto($flat, $id_ubigeo_pi, $id_ubigeo, $txt_id_pip, $direccion, $txt_latitud, $txt_longitud)
    {
        $this->db->query("execute sp_Gestionar_UbigeoPI'" . $flat . "','"
            . $id_ubigeo_pi . "','"
            . $id_ubigeo . "','"
            . $txt_id_pip . "','"
            . $direccion . "','"
            . $txt_latitud . "','"
            . $txt_longitud . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add estado ciclo PI
    public function AddEstadoCicloPI($flat, $id_estado_ciclo_pi, $txt_id_pip_Ciclopi, $Cbx_EstadoCiclo, $dateFechaIniC)
    {
        $this->db->query("execute sp_Gestionar_EstadoCicloPI'" . $flat . "','"
            . $id_estado_ciclo_pi . "','"
            . $txt_id_pip_Ciclopi . "','"
            . $Cbx_EstadoCiclo . "','"
            . $dateFechaIniC . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add Rubro PI
    public function AddRurboPI($flat, $id_rubro_pi, $Cbx_RubroPI, $txt_id_pip_RubroPI, $dateFechaIniC)
    {
        $this->db->query("execute sp_Gestionar_RubroPI'" . $flat . "','"
            . $id_rubro_pi . "','"
            . $Cbx_RubroPI . "','"
            . $txt_id_pip_RubroPI . "','"
            . $dateFechaIniC . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //Add Modalidad Ejecución
    public function AddModalidadEjecPI($flat, $id_modalidad_ejec_pi, $Cbx_ModalidadEjec, $txt_id_pip_ModalidadEjec)
    {
        $this->db->query("execute sp_Gestionar_ModalidadEjecucionPI'" . $flat . "','"
            . $id_modalidad_ejec_pi . "','"
            . $Cbx_ModalidadEjec . "','"
            . $txt_id_pip_ModalidadEjec . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //AGREGAR UN PROYECTO
    public function AddProyectos($flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxMetaPresupuestal, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txtDevengado, $dateFechaInPip, $dateFechaViabilidad, $cbxEstadoCicloInv)
    {
        $this->db->query("execute sp_Gestionar_ProyectoInversion'" . $flat . "','"
            . $id_pi . "','"
            . $cbxUnidadEjecutora . "','"
            . $cbxNatI . "','"
            . $cbxTipologiaInv . "','"
            . $cbxTipoInv . "','"
            . $cbxGrupoFunc . "','"
            . $cbxNivelGob . "','"
            . $cbxMetaPresupuestal . "','"
            . $cbxProgramaPres . "','"
            . $txtCodigoUnico . "','"
            . $txtNombrePip . "','"
            . $txtCostoPip . "','"
            . $txtDevengado . "','"
            . $dateFechaInPip . "','"
            . $dateFechaViabilidad . "','"
            . $cbxEstadoCicloInv . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //FIN AGREGAR UN PROYECTO
    //LISTAR  PIP
    public function GetProyectoInversion($flat)
    {
        $GetProyectoInversion = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetProyectoInversion->num_rows() > 0) {
            return $GetProyectoInversion->result();
        } else {
            return false;
        }
    }
    //LISTAR NO PIP
    public function GetNOPIP($flat)
    {
        $GetNOPIP = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetNOPIP->num_rows() > 0) {
            return $GetNOPIP->result();
        } else {
            return false;
        }
    }
    //listar el ubigeo de acuerdo al proyecto de inversion selcionado
    public function Get_ubigeo_pip($flat, $id_pi)
    {
        $Get_ubigeo_pip = $this->db->query("execute sp_Gestionar_UbigeoPI'" . $flat . "',@id_pi='"
            . $id_pi . "'");
        if ($Get_ubigeo_pip->num_rows() > 0) {
            return $Get_ubigeo_pip->result();
        } else {
            return false;
        }
    }
    //listar general estados de acuerdo al pryecto selecionado
    public function listar_estados($flat, $id_pi)
    {
        $listar_estados = $this->db->query("execute sp_Gestionar_EstadoCicloPI'" . $flat . "',@id_pi='"
            . $id_pi . "'");
        if ($listar_estados->num_rows() > 0) {
            return $listar_estados->result();
        } else {
            return false;
        }
    }
    //listar general estados de acuerdo al pryecto selecionado
    public function listar_rubro()
    {
        $listar_rubro = $this->db->query("execute sp_Rubro_r");
        if ($listar_rubro->num_rows() > 0) {
            return $listar_rubro->result();
        } else {
            return false;
        }
    }
    //listar general de rubro pi
    public function listar_rubro_pi($flat, $id_pi)
    {
        $listar_rubro_pi = $this->db->query("execute sp_Gestionar_RubroPI'" . $flat . "',@id_pi='"
            . $id_pi . "'");
        if ($listar_rubro_pi->num_rows() > 0) {
            return $listar_rubro_pi->result();
        } else {
            return false;
        }
    }
    //listar los estados para poner en el combobox
    public function listar_estado($flat)
    {
        $listar_estado = $this->db->query("execute sp_Gestionar_EstadoCiclo'" . $flat . "'");
        if ($listar_estado->num_rows() > 0) {
            return $listar_estado->result();
        } else {
            return false;
        }
    }
    //listar general modalidad ejecucion PI
    public function listar_modalidad_ejec($flat, $id_pi)
    {
        $listar_modalidad_ejec = $this->db->query("execute sp_Gestionar_ModalidadEjecucionPI'" . $flat . "',@id_pi='"
            . $id_pi . "'");
        if ($listar_modalidad_ejec->num_rows() > 0) {
            return $listar_modalidad_ejec->result();
        } else {
            return false;
        }
    }

}
