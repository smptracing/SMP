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
    /*$('#txtCostoPip').inputmask("decimal", 
    {
	    radixPoint: ".",
	    groupSeparator: ",",
	    digits: 2,
	    autoGroup: true,
	    rightAlign: false,
	});*/
	$('#form-AddProyectosInversion').formValidation({
        framework: 'bootstrap',
        live: 'enabled',
        trigger: null,
        fields:
        {
            txtCodigoUnico:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Código único" es requerido.</b>'
                }
              }
            },
            cbxEstCicInv_:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Estado" es requerido.</b>'
                }
              }
            },
            txtNombrePip:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Inversión" es requerido.</b>'
                }
              }
            },
            fecha_registro:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Fecha de registro" es requerido.</b>'
                }
              }
            },
            cbxNatI:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Naturaleza" es requerido.</b>'
                }
              }
            },
            cbxNivelGob:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Nivel de Gobierno" es requerido.</b>'
                }
              }
            },
            cbxUnidadEjecutora:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Unidad Ejecutora" es requerido.</b>'
                }
              }
            },
            cbxFuncion:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Función" es requerido.</b>'
                }
              }
            },
            cbxDivFunc:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "División" es requerido.</b>'
                }
              }
            },
            cbxGrupoFunc:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Grupo" es requerido.</b>'
                }
              }
            },
            txtCostoPip:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Costo de inversión" es requerido.</b>'
                },
                regexp:
                {
                    regexp: /(((\d{1,3},)(\d{3},)*\d{3})|(\d{1,3}))\.?\d{1,2}?$/,
                    message: '<b style="color: red;">El campo "Costo de Inversión" debe ser númerico.</b>'
                }
              }
            },
            txt_beneficiarios:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Número de beneficiarios" es requerido.</b>'
                }
              }
            },
            cbxFuenteFinanc:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Fuente de financiamiento" es requerido.</b>'
                }
              }
            },
            cbxRubro:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Rubro" es requerido.</b>'
                }
              }
            },
            cbxModalidadEjec:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Modalidad de Ejecución" es requerido.</b>'
                }
              }
            },
            cbxTipologiaInv:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Tipología de Inversión" es requerido.</b>'
                }
              }
            },
            cbxProgramaPres:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Programa" es requerido.</b>'
                }
              }
            },
            lista_unid_form:{
              validators:{
                notEmpty:{
                  message: '<b style="color: red;">El campo "Unidad Formuladora" es requerido.</b>'
                }
              }
            },     
        }
    });
}); 