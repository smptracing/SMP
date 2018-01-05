$(document).ready(function(){
    $("#form-AddProyectosInversion").keypress(function(e)
    {
        if(e == 13)
        {
            return false;
        }
    });
    $("#txtCostoPip").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txtCostoPip_m").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_monto_operacion").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });
    $("#txt_monto_mantenimiento").keyup(function(e)
    {
        $(this).val(format($(this).val()));
    });

    $("#form_EditarProyectosInversion").submit(function(event)
    {
        event.preventDefault();
        $('#validarEditarPip').data('formValidation').validate();
        if(!($('#validarEditarPip').data('formValidation').isValid()))
        {
          return;
        }
        $.ajax({
            url:base_url+"index.php/bancoproyectos/update_pip",
            type:$(this).attr('method'),
            data:$(this).serialize(),
            success:function(resp)
            {
                if (resp=='1')
                {
                    swal("ACTUALIZADO","Se actualizó correctamente", "success");
                }
                if (resp=='2')
                {
                    swal("NO SE ACTUALIZÓ","No se actualizó ", "error");
                }
                $('#table_proyectos_inversion').dataTable()._fnAjaxUpdate();
            }
        });
    });

    $("#form_AddOperacionMantenimiento").submit(function(event)
    {
        event.preventDefault();
        $('#validarAddOperacionMantenimiento').data('formValidation').validate();
        if(!($('#validarAddOperacionMantenimiento').data('formValidation').isValid()))
        {
            return;
        }

        var formData=new FormData($("#form_AddOperacionMantenimiento")[0]);

        $.ajax({
            url:base_url+"index.php/bancoproyectos/AddOperacionMantenimiento",
            type:'POST',
            enctype: 'multipart/form-data',
            data:formData,
            cache: false,
            contentType:false,
            processData:false,
            success:function(resp)
            {
                resp = JSON.parse(resp);
                ((resp.proceso=='Correcto') ? swal(resp.proceso,resp.mensaje,"success") : swal(resp.proceso,resp.mensaje,"error"));
                $('#Table_OperacionMantenimiento').dataTable()._fnAjaxUpdate();
                $('#txt_monto_operacion').val("");
                $('#txt_responsable_operacion').val("");
                $('#txt_monto_mantenimiento').val("");
                $('#txt_responsable_mantenimiento').val("");
                $('#fileActaCompromiso').val("");
                //$('#form_AddOperacionMantenimiento')[0].reset();
                //$('#ventana_ver_operacion_mantenimeinto').modal('hide');
            }
        });
    });


});
var format = function(num){
    var str = num.replace("", ""), parts = false, output = [], i = 1, formatted = null;
    if(str.indexOf(".") > 0)
    {
        parts = str.split(".");
        str = parts[0];
    }
    str = str.split("").reverse();
    for(var j = 0, len = str.length; j < len; j++)
    {
        if(str[j] != ",")
        {
            output.push(str[j]);
            if(i%3 == 0 && j < (len - 1))
            {
                output.push(",");
            }
            i++;
        }
    }
    formatted = output.reverse().join("");
    return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
};



$(function()
{
    $("body").on("click","#sendSave",function(e)
    {
        $('#form-AddProyectosInversion').data('formValidation').resetField($('#txtCostoPip'));
	    $('#form-AddProyectosInversion').data('formValidation').validate();
	    if($('#form-AddProyectosInversion').data('formValidation').isValid()==true)
        {
	        $('#form-AddProyectosInversion').submit();
	        $('#form-AddProyectosInversion').each(function()
            {
	          this.reset();
	        });
	        $('.selectpicker').selectpicker('refresh');
	        $('#form-AddProyectosInversion').data('formValidation').resetForm();
	    }
    });
    $("body").on("change","#cbxEstCicInv_",function(e)
    {
        if($("#cbxEstCicInv_").val()=='1' || $("#cbxEstCicInv_").val()=='2')
        {
            $(".ct_fechaViabilidad").css("display","none");
        }
        else
        {
            $(".ct_fechaViabilidad").css("display","");
        }
    });

	$('#form-AddProyectosInversion').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txtCodigoUnico:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Código único" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[0-9]+$/,
                        message: '<b style="color: red;">El campo "Código único" debe contener solo números.</b>'
                    }
                }
            },
            cbxEstCicInv_:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Estado" es requerido.</b>'
                    }
                }
            },
            txtNombrePip:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Inversión" es requerido.</b>'
                    },
                    stringLength:
                    {
                         max: 500,
                        message: '<b style="color: red;">El campo "Nombre de Proyecto" debe tener como máximo 500 caracteres.</b>'
                    }
                }
            },
            fecha_registro:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de registro" es requerido.</b>'
                    }
                }
            },
            cbxNatI:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Naturaleza" es requerido.</b>'
                    }
                }
            },
            cbxNivelGob:
            {
                validators:
                {
                    notEmpty:
                    {
                    message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                    }
                }
            },
            cbxUnidadEjecutora:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                    }
                }
            },
            cbxFuncion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                    }
                }
            },
            cbxDivFunc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "División" es requerido.</b>'
                    }
                }
            },
            cbxGrupoFunc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Grupo" es requerido.</b>'
                    }
                }
            },
            txtCostoPip:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Costo de inversión" es requerido.</b>'
                    },
                        regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Costo de Inversión" debe ser númerico.</b>'
                    },
                    stringLength:
                    {
                         max: 15,
                        message: '<b style="color: red;">El campo "Costo de inversión" debe tener como máximo 12 caracteres.</b>'
                    }

                }
            },
            txt_beneficiarios:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Número de beneficiarios" es requerido.</b>'
                    },
                    between: {
                        min: 1,
                        max: 999999999,
                        message: "<b style='color: red;'>El valor debe estar entre 0 y 999'999,999</b>"
                    }
                }
            },
            cbxFuenteFinanc:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fuente de financiamiento" es requerido.</b>'
                    }
                }
            },
            cbxRubro:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Rubro" es requerido.</b>'
                    }
                }
            },
            cbxModalidadEjec:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Modalidad de Ejecución" es requerido.</b>'
                    }
                }
            },
            cbxTipologiaInv:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipología de Inversión" es requerido.</b>'
                    }
                }
            },
            lista_unid_form:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Formuladora" es requerido.</b>'
                    }
                }
            },
            cbxProgramaPres:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Programa Presupuestal" es requerido.</b>'
                    }
                }
            }
        }
    });

    $('#validarEditarPip').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúreseeee que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txtCodigoUnico_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Código único" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[0-9]+$/,
                        message: '<b style="color: red;">El campo "Código único" debe contener solo números.</b>'
                    }
                }
            },
            cbx_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipo de inversión" es requerido.</b>'
                    }
                }
            },
            cbxEstCicInv_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Ciclo de inversión" es requerido.</b>'
                    }
                }
            },
            txtNombrePip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre de inversión" es requerido.</b>'
                    },
                    stringLength:
                    {
                         max: 500,
                        message: '<b style="color: red;">El campo "Nombre de Proyecto" debe tener como máximo 500 caracteres.</b>'
                    }
                }
            },
            fecha_viabilidad_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de Viabilidad" es requerido.</b>'
                    }
                }
            },
            cbxNatI_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Naturaleza" es requerido.</b>'
                    }
                }
            },
            cbxNivelGob_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                    }
                }
            },
            cbxUnidadEjecutora_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                    }
                }
            },
            cbxFuncion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                    }
                }
            },
            cbxDivFunc_inicio:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "División Funcional" es requerido.</b>'
                    }
                }
            },
            cbxGrupoFunc_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Grupo Funcional" es requerido.</b>'
                    }
                }
            },
            txtCostoPip_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Costo de inversión" es requerido.</b>'
                    },
                        regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Costo de Inversión" debe ser númerico.</b>'
                    },
                    stringLength:
                    {
                        max: 15,
                        message: '<b style="color: red;">El campo "Costo de inversión" debe tener como máximo 12 caracteres.</b>'
                    }

                }
            },
            txt_beneficiarios_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Número de beneficiarios" es requerido.</b>'
                    },
                    between: {
                        min: 1,
                        max: 999999999,
                        message: "<b style='color: red;'>El valor debe estar entre 0 y 999'999,999</b>"
                    }
                }
            },
            cbxTipologiaInversion_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Tipologia de inversión" es requerido.</b>'
                    }
                }
            },
            cbxProgramaPresupuestal_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Programa Presupuestal" es requerido.</b>'
                    }
                }
            },
            lista_unid_form_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Unidad Formuladora" es requerido.</b>'
                    }
                }
            },
            cbx_estado_pi_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Estado" es requerido.</b>'
                    }
                }
            }
        }
    });

    $('#validarAddOperacionMantenimiento').formValidation({
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúreseeee que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            txt_monto_operacion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Monto de Operación" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Monto de Operación" debe ser númerico.</b>'
                    }
                }
            },
            txt_responsable_operacion:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Responsable de Operación" es requerido.</b>'
                    }
                }
            },
            txt_monto_mantenimiento:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Monto de Mantenimiento" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                        message: '<b style="color: red;">El campo "Monto de Mantenimiento" debe ser númerico.</b>'
                    }
                }
            },
            txt_responsable_mantenimiento:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Responsable de Mantenimiento" es requerido.</b>'
                    }
                }
            }
        }
    });
});
