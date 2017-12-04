<div class="modal-body">
   <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" id='formUsuario' name="formUsuario"  method="post" onSubmit="return false;"  >
                  <div class="form-group">
                    <div class="table-responsive">
                        <table id="table_usuario_proyecto"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td class="col-md-1 col-xs-12"><input type="checkbox" onchange="checkAll(this)" name="" value=""> Todo</td>
                                    <td class="col-md-7 col-xs-12">Nombre De Proyecto</td>
                                    <td class="col-md-4 col-xs-12">Codigo Unico</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($lista as $item){ ?>
                                  <tr>
                                    <td>
                                      <input onclick="getCheckedBoxes('checkbox')" type="checkbox" name="checkbox" value="<?php echo $item->id_pi ?>">
                                    </td>
                                    <td><?php $item->id_pi ?> - <?= $item->nombre_pi ?></td>
                                    <td><?= $item->codigo_unico_pi ?></td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                        </table>
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

<script src="<?php echo base_url();?>assets/js/usuario/usuario.js"></script>

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

});
</script>
