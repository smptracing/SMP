<?php
defined('BASEPATH') or exit('No direct script access allowed');
class bancoproyectos_modal extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        // $this->db->free_db_resource();
        $this->load->helper('file');
        $this->load->database();
    }

    public function BuscarProyectoSiaf($CodigoSiaf)
    {
        $Opcion='listar_datos_proyecto_importacion';
        $data=$this->db->query("execute sp_Gestionar_SIAF   @codigo_snip ='".$CodigoSiaf."',  @Opcion='" .$Opcion. "'");
        return $data->result();
    }

    public function InsertarUbigeo_Pi($ubigeoPi) 
    {
        $this->db->insert('UBIGEO_PI', $ubigeoPi);
        return array(
            'filasAfectadas' => $this->db->affected_rows(),
            'ultimoId' => $this->db->insert_id(),
        );
        //return $this->db->affected_rows();
        //return $this->db->affected_rows();
    }


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
    public function AgregarRubro($rubroPi)
    {
        $this->db->set($rubroPi);
        $this->db->insert('RUBRO_PI');
        return $this->db->affected_rows();
    }

    public function AgregarModalidadEjecucionPip($modalidadPi)
    {
        $this->db->set($modalidadPi);
        $this->db->insert('MODALIDAD_EJECUCION_PI');
        return $this->db->affected_rows();
    }

    // AGREGAR UN PROYECTO
    public function AddProyectos($flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $lista_unid_form, $cbx_estado, $cbxEstCicInv_,
        $cbxRubro, $cbxModalidadEjec)
    {
        $proyecto = $this->db->query("select * from PROYECTO_INVERSION where codigo_unico_pi ='$txtCodigoUnico'");
        if ($proyecto->num_rows() >= 1)
        {
            return false;
        }
        else
        {
           $q = $this->db->query("execute sp_Gestionar_ProyectoInversion
                @Opcion='" . $flat . "',
                @id_pi='" . $id_pi . "',
                @id_ue='" . $cbxUnidadEjecutora . "',
                @id_naturaleza_inv='" . $cbxNatI . "',
                @id_tipologia_inv='" . $cbxTipologiaInv . "',
                @id_tipo_inv='" . $cbxTipoInv . "',
                @id_grupo_funcional='" . $cbxGrupoFunc . "',
                @id_nivel_gob='" . $cbxNivelGob . "',
                @id_programa_pres='" . $cbxProgramaPres . "',
                @codigo_unico_pi='" . $txtCodigoUnico . "',
                @nombre_pi='" . $txtNombrePip . "',
                @costo_pi='" . $txtCostoPip . "',
                @num_beneficiarios='" . $txt_beneficiarios . "',
                @fecha_registro_pi='" . $dateFechaInPip . "',
                @fecha_viabilidad_pi='" . $dateFechaViabilidad . "',
                @id_uf='" . $lista_unid_form . "',
                @estado_pi='" . $cbx_estado . "',
                @id_estado_ciclo='" . $cbxEstCicInv_ . "',
                @id_rubro='" . $cbxRubro . "',
                @id_modalidad_ejec='" . $cbxModalidadEjec . "'");

            return $q;
        }
    }

/***********************************************************************************************************************************/


    // public function AddProyectos($flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $lista_unid_form, $cbx_estado, $cbxEstCicInv_,
    //     $cbxRubro, $cbxModalidadEjec)
    // {
    //     $proyecto = $this->db->query("select codigo_unico_pi from PROYECTO_INVERSION where codigo_unico_pi ='$txtCodigoUnico'");
    //     if ($proyecto->num_rows() >= 1)
    //     {
    //         return 7;
    //     }
    //     else
    //     {
                // $sp = "sp_Gestionar_ProyectoInversion ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?";

                // $params = array(
                // 'Opcion' => $flat,
                // 'id_pi' => $id_pi,
                // 'id_ue' => $cbxUnidadEjecutora,
                // 'id_naturaleza_inv' => $cbxNatI,
                // 'id_tipologia_inv' => $cbxTipologiaInv,
                // 'id_tipo_inv' => $cbxTipoInv,
                // 'id_grupo_funcional' => $cbxGrupoFunc,
                // 'id_nivel_gob' => $cbxNivelGob,
                // 'id_programa_pres' => $cbxProgramaPres,
                // 'codigo_unico_pi' => $txtCodigoUnico,
                // 'nombre_pi' => $txtNombrePip,
                // 'costo_pi' => $txtCostoPip,
                // 'num_beneficiarios' => $txt_beneficiarios,
                // 'fecha_registro_pi' => $dateFechaInPip,
                // 'fecha_viabilidad_pi' => $dateFechaViabilidad,
                // 'id_uf' => $lista_unid_form,
                // 'estado_pi' => $cbx_estado,
                // 'id_estado_ciclo' => $cbxEstCicInv_,
                // 'id_rubro' => $cbxRubro,
                // 'id_modalidad_ejec' => $cbxModalidadEjec);

                // $q = $this->db->query($sp,$params);

                // $q = $this->db->query("sp_Gestionar_ProyectoInversion
                // N'{$flat}', N'{$id_pi}', N'{$cbxUnidadEjecutora}',
                // N'{$cbxNatI}', N'{$cbxTipologiaInv}', N'{$cbxTipoInv}',
                // N'{$cbxGrupoFunc}', N'{$cbxNivelGob}', N'{$cbxProgramaPres}',
                // N'{$txtCodigoUnico}', N'{$txtNombrePip}', N'{$txtCostoPip}',
                // N'{$txt_beneficiarios}', N'{$dateFechaInPip}',
                // N'{$dateFechaViabilidad}', N'{$lista_unid_form}',
                // N'{$cbx_estado}', N'{$cbxEstCicInv_}', N'{$cbxRubro}',
                // N'{$cbxModalidadEjec}'");

    //             $this->db->insert('pescador', $data);
    //             return $this->db->affected_rows() > 0;

    //     }
    // }
/***********************************************************************************************************************************/

    //FIN AGREGAR UN PROYECTO

    //AGREGAR UN PROYECTO
    public function AddNoPip($flat, $id_pi, $cbxUnidadEjecutora, $cbxNatI, $cbxTipologiaInv, $cbxTipoInv, $cbxGrupoFunc, $cbxNivelGob, $cbxProgramaPres, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $dateFechaInPip, $dateFechaViabilidad, $cbx_estado, $cbxEstCicInv_, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_i)
    {
        $this->db->query("execute sp_Gestionar_ProyectoInversion
            @Opcion='" . $flat . "',
            @id_pi='" . $id_pi . "',
            @id_ue='" . $cbxUnidadEjecutora . "',
            @id_naturaleza_inv='" . $cbxNatI . "',
            @id_tipologia_inv='" . $cbxTipologiaInv . "',
            @id_tipo_inv='" . $cbxTipoInv . "',
            @id_grupo_funcional='" . $cbxGrupoFunc . "',
            @id_nivel_gob='" . $cbxNivelGob . "',
            @id_programa_pres='" . $cbxProgramaPres . "',
            @codigo_unico_pi='" . $txtCodigoUnico . "',
            @nombre_pi='" . $txtNombrePip . "',
            @costo_pi='" . $txtCostoPip . "',
            @num_beneficiarios='" . $txt_beneficiarios . "',
            @fecha_registro_pi='" . $dateFechaInPip . "',
            @fecha_viabilidad_pi='" . $dateFechaViabilidad . "',
            @estado_pi='" . $cbx_estado . "',
            @id_estado_ciclo='" . $cbxEstCicInv_ . "',
            @id_rubro='" . $cbxRubro . "',
            @id_modalidad_ejec='" . $cbxModalidadEjec . "',
            @id_tipo_nopip='" . $Cbx_TipoNoPip_i . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //FIN AGREGAR UN PROYECTO
    //EDITAR UN PROYECTO PIP
    public function update_no_pip($flat, $id_pi, $cbxUnidadEjecutora, $cbx_tipo_no_pip_m, $cbxGrupoFunc, $cbxNivelGob, $txtCodigoUnico, $txtNombrePip, $txtCostoPip, $txt_beneficiarios, $cbx_tipo_inversion, $cbxEstado_pi, $cbxRubro, $cbxModalidadEjec, $Cbx_TipoNoPip_m)
    {
        $this->db->query("execute sp_Gestionar_ProyectoInversion
            @Opcion='" . $flat . "',
            @id_pi='" . $id_pi . "',
            @id_ue='" . $cbxUnidadEjecutora . "',
            @id_tipo_inv='" . $cbx_tipo_no_pip_m . "',
            @id_grupo_funcional='" . $cbxGrupoFunc . "',
            @id_nivel_gob='" . $cbxNivelGob . "',
            @codigo_unico_pi='" . $txtCodigoUnico . "',
            @nombre_pi='" . $txtNombrePip . "',
            @costo_pi='" . $txtCostoPip . "',
            @num_beneficiarios='" . $txt_beneficiarios . "',
            @estado_pi='" . $cbxEstado_pi . "',
            @id_estado_ciclo='" . $cbx_tipo_inversion . "',
            @id_rubro='" . $cbxRubro . "',
            @id_modalidad_ejec='" . $cbxModalidadEjec . "',
            @id_tipo_nopip='" . $Cbx_TipoNoPip_m . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //FIN EDITAR UN PROYECTO PIP
    //EDITAR UN PROYECTO PIP
    public function update_pip($flat, $txt_id_Pip_m, $cbxUnidadEjecutora_m, $cbxNatI_m, $cbxTipologiaInversion_m, $cbxGrupoFunc_m, $cbxNivelGob_m, $cbxProgramaPresupuestal_m, $txtCodigoUnico_m, $txtNombrePip_m, $txtCostoPip_m, $txt_beneficiarios_m, $lista_unid_form_m, $cbx_estado_pi_m, $cbxEstCicInv_m, $cbxRubroEjecucion_m, $cbxModalidadEjecucion_m)
    {
        $this->db->query("execute sp_Gestionar_ProyectoInversion
            @Opcion='" . $flat . "',
            @id_pi='" . $txt_id_Pip_m . "',
            @id_ue='" . $cbxUnidadEjecutora_m . "',
            @id_naturaleza_inv='" . $cbxNatI_m . "',
             @id_tipologia_inv='" . $cbxTipologiaInversion_m . "',
            @id_grupo_funcional='" . $cbxGrupoFunc_m . "',
            @id_nivel_gob='" . $cbxNivelGob_m . "',
            @id_programa_pres='" . $cbxProgramaPresupuestal_m . "',
            @codigo_unico_pi='" . $txtCodigoUnico_m . "',
            @nombre_pi='" . $txtNombrePip_m . "',
            @costo_pi='" . $txtCostoPip_m . "',
            @num_beneficiarios='" . $txt_beneficiarios_m . "',
            @id_uf='" . $lista_unid_form_m . "',
            @estado_pi='" . $cbx_estado_pi_m . "',
            @id_estado_ciclo='" . $cbxEstCicInv_m . "',
            @id_rubro='" . $cbxRubroEjecucion_m . "',
            @id_modalidad_ejec='" . $cbxModalidadEjecucion_m . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    //FIN EDITAR UN PROYECTO PIP
    //LISTAR  PIP
    // public function GetProyectoInversion($flat)
    // {
    //     $GetProyectoInversion = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
    //         . $flat . "'");
    //     if ($GetProyectoInversion->num_rows() > 0) {
    //         return $GetProyectoInversion->result();
    //     } else {
    //         return false;
    //     }
    // }

//LLAMAR PROCEDIMIENTO ALMACENADO SANITIZADO
/*******************************************************************************************************************/

    public function GetProyectoInversion($flat)
    {
        $sp = "sp_Gestionar_ProyectoInversion ?";

        $params = array(
        'PARAM_1' => $flat);

        $q = $this->db->query($sp,$params);

        return $q->result();

    }

/*******************************************************************************************************************/


    //LISTAR NO PIP
    public function GetNOPIP($flat)
    {
        $GetNOPIP = $this->db->query("execute sp_Gestionar_ProyectoInversion'"
            . $flat . "'");
        if ($GetNOPIP->num_rows() > 0) 
        {
            return $GetNOPIP->result();
        } 
        else 
        {
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
    public function eliminarUbigeo($id_ubigeo_pi)
    {
         $flat='D';
         $this->db->query("execute sp_Gestionar_UbigeoPI @opcion = '".$flat . "', @id_ubigeo_pi ='".$id_ubigeo_pi. "'");
         return true;

    }

    public function idUbigeoPI($id_ubigeo_pi)
    {

         $data=$this->db->query("select * from UBIGEO_PI where id_ubigeo_pi=$id_ubigeo_pi ");

         return $data->result()[0];


    }
    public function actualizar_ubigeo_proyecto($id_ubigeo_pi,$id_ubigeo,$txt_latitudEditar,$txt_longitudEditar)
    {
         $flat='U';
         $this->db->query("execute sp_Gestionar_UbigeoPI @opcion = '".$flat . "', @id_ubigeo_pi  ='".$id_ubigeo_pi. "' , @id_ubigeo='".$id_ubigeo."' , @latitud ='".$txt_latitudEditar."' , @longitud='".$txt_longitudEditar."' ");
         return true;
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
        $listar_modalidad_ejec = $this->db->query("execute sp_Gestionar_ModalidadEjecucionPI'"
            . $flat . "',@id_pi='"
            . $id_pi . "'");
        if ($listar_modalidad_ejec->num_rows() > 0) {
            return $listar_modalidad_ejec->result();
        } else {
            return false;
        }
    }
    //listar provincia
    public function listar_provincia($flat)
    {
        $listar_provincia = $this->db->query("execute sp_Gestionar_UbigeoPI @opcion='" . $flat . "'");
        if ($listar_provincia->num_rows() > 0) {
            return $listar_provincia->result();
        } else {
            return false;
        }
    }
    //listar provincia
    public function listar_distrito($flat, $nombre_distrito)
    {
        $listar_distrito = $this->db->query("execute sp_Gestionar_UbigeoPI @opcion='"
            . $flat . "',@provincia_filtro_lista='"
            . $nombre_distrito . "'");
        if ($listar_distrito->num_rows() > 0) {
            return $listar_distrito->result();
        } else {
            return false;
        }
    }
    //Add no pip tipo
    public function AddTipoNoPip($flat, $id_tipo_NoPip, $Cbx_TipoNoPip, $txt_id_pip_Tipologia)
    {
        $this->db->query("execute sp_Gestionar_NoPip'" . $flat . "','"
            . $id_tipo_NoPip . "','"
            . $Cbx_TipoNoPip . "','"
            . $txt_id_pip_Tipologia . "'");
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //listar tipo no pip
    public function Get_TipoNoPip($flat, $id_pi)
    {
        $Get_TipoNoPip = $this->db->query("execute sp_Gestionar_NoPip
            @opcion='" . $flat . "',
            @id_pi='" . $id_pi . "'");
        if ($Get_TipoNoPip->num_rows() > 0) {
            return $Get_TipoNoPip->result();
        } else {
            return false;
        }
    }

    public function AgregarOperacionyMantenimiento($operacionPi)
    {
        $this->db->insert('OPERACION_MANTENIMIENTO_PI', $operacionPi);
        return $this->db->insert_id();
    }
    
    //listar Operacion Mantenimiento
    public function Get_OperacionMantenimiento($flat, $id_pi)
    {
        $Get_TipoNoPip = $this->db->query("execute sp_Gestionar_OperacionMantenimientoPI
            @opcion='" . $flat . "',
            @id_pi='" . $id_pi . "'");
        if ($Get_TipoNoPip->num_rows() > 0)
        {
            return $Get_TipoNoPip->result();
        }
        else
        {
            return false;
        }
    }

    public function eliminarOperacionMantenimiento($id_operacion_mantenimiento_pi)
    {
        $this->db->where('id_operacion_mantenimiento_pi', $id_operacion_mantenimiento_pi);
        $this->db->delete('OPERACION_MANTENIMIENTO_PI');

        return $this->db->affected_rows();
    }

    public function getOperacionyMantenimiento($id_operacion_mantenimiento_pi)
    {
        $this->db->select('OPERACION_MANTENIMIENTO_PI.*');
        $this->db->from('OPERACION_MANTENIMIENTO_PI');
        $this->db->where('OPERACION_MANTENIMIENTO_PI.id_operacion_mantenimiento_pi ',$id_operacion_mantenimiento_pi);
        $query = $this->db->get();
        return $query->result()[0];

    }
    

    public function eliminarrubroPI($id_rubro_pi)
    {
         $flat='D';
         $this->db->query("execute sp_Gestionar_RubroPI @opcion = '".$flat . "', @id_rubro_pi ='".$id_rubro_pi. "'");
         return true;

    }

    public function getBancoProyecto() {
        return $this->db->get('PROYECTO_INVERSION')->result();
    }
}
