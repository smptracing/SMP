<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.3.1026/styles/kendo.common.min.css" />
<link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.default.min.css" rel="stylesheet" />
<div class="modal-body">
   <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" id='formUsuario' name="formUsuario"  method="post" onSubmit="return false;"  >
                  <div class="form-group">
                          <label class="col-sm-3 control-label no-padding-right"  for="form-field-1-1">Buscar Persona</label>
                          <div class="col-sm-6">
                               <select
                      class="form-control input-sm"
                                id="comboPersona" name="comboPersona"  title="Buscar persona" >
                               </select>
                          </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right"  for="form-field-1-1">Usuario </label>
                      <div class="col-sm-6">
                        <input type="text" id="txt_usuario" name="txt_usuario" placeholder="Nombre Usuario" class="form-control" autocomplete="off" value='<?php if(isset($arrayUsuario->usuario)) echo $arrayUsuario->usuario; ?>' />
                        <input type="hidden" id="idPersona" name="idPersona" value='<?php if(isset($arrayUsuario->id_persona)) echo $arrayUsuario->id_persona; ?>' />
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tipo de Usuario </label>
                    <div class="col-sm-6">
                      <select  class="form-control input-sm" id="cbb_TipoUsuario" name="cbb_TipoUsuario">

                       </select>
                    </div>
                  </div>
                  <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estado </label>
                        <div class="col-sm-6">
                               <select  id="cbb_estado" name="cbb_estado" class="form-control input-sm">
                               <option value='1'> Activo </option>
                               <option value='0'> Inactivo </option>
                               </select>
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Contraseña</label>
                        <div class="col-sm-3">
                          <input type="password" id="txt_contrasenia" name="txt_contrasenia" placeholder="Contraseña" class="form-control" />
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Acceso al menú</label>
                    <div class="col-sm-9">
                      <div class="demo-section k-content">
                          <div>
                              <div id="treeview"></div>
                          </div>
                          <div style="padding-top: 2em; display: none;">
                              <h4>Status</h4>
                              <p id="result">No nodes checked.</p>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <button type="button" id="sendUsuario" class="btn btn-primary">Registrar Usuario </button>
                      <input  id="btnCerrar" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                 </div>
            </form>
        </div>
    </div>
</div>

<style>
    #treeview .k-sprite {
        background-image: url("http://demos.kendoui.com/content/web/treeview/coloricons-sprite.png");
    }

    .rootfolder { background-position: 0 0; }
    .folder     { background-position: 0 -16px; }
    .pdf        { background-position: 0 -32px; }
    .html       { background-position: 0 -48px; }
    .image      { background-position: 0 -64px; }
</style>

<script src="<?php echo base_url();?>assets/js/usuario/usuario.js"></script>

<script>

var definido = $('#idPersona').val();
var menuUsuarioId = [], menuUsuarioHome = [];

$(function()
{
    if(definido!='')
    {
        $.ajax(
        {
            url: base_url+'index.php/Usuario/listaUrlAsignado',
            type: 'POST',
            data:
            {
               id_persona : definido
            },
            cache: false,
            async: false
        }).done(function(objectJSON)
        {
            objectJSON = JSON.parse(objectJSON);
            menuUsuarioHome.push(objectJSON);
        }).fail(function()
        {
            swal('Error', 'Error no controlado.', 'error');
        });
    }
});

function compara(json)
{
    var bool = false;
    if(menuUsuarioHome.length>0)
    {
        for (var i = 0; i < menuUsuarioHome[0].length; i++)
        {
            if (json == menuUsuarioHome[0][i].id_menu)
            {
                bool = true;
            }
        }
    }
    return bool;
}

$.getJSON(base_url+"index.php/Login/recuperarMenu/0",function(json)
{
    var json2 = [];
    var subMenu = [];
    var pmi = [], fe = [], e =[], sm = [], p = [];

    $.each(json,function(i)
    {
        if(json[i]['id_modulo']=='PMI')
        {
            pmi.push(
            {
                id:  json[i]['id_submenu'],
                text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu'],
                spriteCssClass: "html",
                checked: compara(json[i]['id_submenu'])
            });
        }
        if(json[i]['id_modulo']=='FE')
        {
            fe.push(
            {
                id:  json[i]['id_submenu'],
                text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu'],
                spriteCssClass: "html",
                checked: compara(json[i]['id_submenu'])
            });
        }
        if(json[i]['id_modulo']=='E')
        {
            e.push(
            {
                id:  json[i]['id_submenu'],
                text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu'],
                spriteCssClass: "html",
                checked: compara(json[i]['id_submenu'])
            });
        }
        if(json[i]['id_modulo']=='SM')
        {
            sm.push(
            {
                id:  json[i]['id_submenu'],
                text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu'],
                spriteCssClass: "html",
                checked: compara(json[i]['id_submenu'])
            });
        }
        if(json[i]['id_modulo']=='P')
        {
            p.push(
            {
                id:  json[i]['id_submenu'],
                text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu'],
                spriteCssClass: "html",
                checked: compara(json[i]['id_submenu'])
            });
        }
        subMenu[0]=pmi;
        subMenu[1]=fe;
        subMenu[2]=e;
        subMenu[4]=sm;
        subMenu[6]=p;
        if (json[i]['id_modulo'] == "HOME")
        {
            json2.push(
            {
                id: json[i]['id_submenu'],
                text: json[i]['nombreSubmenu'],
                expanded: false,
                spriteCssClass: "folder",
                items: subMenu[i],
                checked: compara(json[i]['id_submenu'])
            });
        }
    });
    $("#treeview").kendoTreeView(
    {
        checkboxes:
        {
            checkChildren: false
        },
        check: onCheck,
        dataSource: json2
    });

});
function checkedNodeIds(nodes, checkedNodes)
{
    for (var i = 0; i < nodes.length; i++)
    {
        if (nodes[i].checked)
        {
            checkedNodes.push(nodes[i].id);
        }
        if (nodes[i].hasChildren)
        {
            checkedNodeIds(nodes[i].children.view(), checkedNodes);
        }
    }
}
function onCheck()
{
    var checkedNodes = [],
        treeView = $("#treeview").data("kendoTreeView"),
        message;

    checkedNodeIds(treeView.dataSource.view(), checkedNodes);
    if (checkedNodes.length > 0)
    {
        message = checkedNodes.join(",");
    } else
    {
        message = "No nodes checked.";
    }
    $("#result").html(message);
}
</script>

<script>
$(function()
{
    $("#formUsuario").submit(function(event)
    {
        event.preventDefault();
        var stringMenuUsuario ='';
        var c=0;
        var dat = $("#result").text();
        var b = dat.split(',').map(Number);
        for (var i = 0; i < b.length; i++)
        {
            if(c>0)
                    stringMenuUsuario+='-';
            stringMenuUsuario+=b[i];
            c++;
        }
        $.ajax({
            url:$("#formUsuario").attr("action"),
            type:$(this).attr('method'),
            data:$(this).serialize()+"&cbb_listaMenuDestino="+stringMenuUsuario,
            success:function(resp)
            {
                swal("",resp, "success");
                window.location.href=base_url+"index.php/Usuario";
            }
        });
    });

    $("body").on("click","#sendUsuario",function(e)
    {
        $('#formUsuario').data('formValidation').validate();
        if($('#formUsuario').data('formValidation').isValid()==true)
        {
            $('#formUsuario').submit();
            $('#formUsuario').each(function()
            {
                this.reset();
            });
            $('.selectpicker').selectpicker('refresh');
            $('#formUsuario').data('formValidation').resetForm();
            $('#formUsuario').off();
            $('#formUsuario').remove();
            $('#formUsuario').empty();
            $('#modalTemp').modal('hide');
        }
    });
});

$(document).ready(function()
{
    <?php if(isset($arrayUsuario->id_persona)){ ?>
      $("#formUsuario").attr("action",base_url+"index.php/Usuario/editUsuario");
    <?php }
    else { ?>
      $("#formUsuario").attr("action",base_url+"index.php/Usuario/addUsuario");
    <?php } ?>
    $('#formUsuario').formValidation({
        fields:
        {
            comboPersona:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Persona" es requerido.</b>'
                    }
                }
            },
            txt_usuario:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Usuario" es requerido.</b>'
                    }
                }
            },
            cbb_TipoUsuario:
            {
                validators:
                {
                    notEmpty:
                    {
                    message: '<b style="color: red;">El campo "Tipo de usuario" es requerido.</b>'
                }
            }
        },
    }
});
listaPersonaCombo("<?php if(isset($arrayUsuario->id_persona)) echo $arrayUsuario->id_persona; ?>");
listatipoUsuario("<?php if(isset($arrayUsuario->id_usuario_tipo)) echo $arrayUsuario->id_usuario_tipo; ?>");
});
</script>
