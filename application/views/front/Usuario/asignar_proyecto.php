<script type="text/javascript">
function getCheckedProjects(foo) {
  var flat = false;
  <?php foreach($usuario_proyecto as $proyecto) { ?>
    //console.log(<?= $proyecto->id_pi ?>);
    if (<?= $proyecto->id_pi ?> == foo) {
      //console.log(<?= $proyecto->id_pi ?>+" = "+ foo);
      flat = true;
    }
  <?php } ?>
  return flat;
}
console.log("-----");
<?php foreach ($lista as $item): ?>
console.log(getCheckedProjects(<?= $item->id_pi ?>));
<?php endforeach; ?>
</script>
<div class="modal-body">
   <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" id='formUsuario' name="formUsuario"  method="post" onSubmit="return false;"  >
                  <div class="form-group">
                    <div class="table-responsive">
                        <table id="table_asignar_usuario_proyecto"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <td class="col-md-1 col-xs-12"><input type="checkbox" onchange="checkAll(this)" name="" value=""> Todo</td>
                                    <td class="col-md-5 col-xs-12">Nombre De Proyecto</td>
                                    <td class="col-md-1 col-xs-12">Codigo Unico</td>
                                    <td class="col-md-1 col-xs-12">Opcion</td>
                                </tr>
                            </thead>
                            <tbody>
                              <?php foreach($lista as $item){ ?>
                                  <tr>
                                    <td>
                                      <input onclick="getCheckedBoxes('checkbox')" type="checkbox" name="checkbox" value="<?php echo $item->id_pi ?>" >
                                    </td>
                                    <td><?= $item->nombre_pi ?></td>
                                    <td><?= $item->codigo_unico_pi ?></td>
                                    <td>

                                    </td>
                                  </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                    </div>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <p id="result"></p>
                      <input type="hidden" id="id_persona" name="id_persona" value='<?php if(isset($usuario->id_persona)) echo $usuario->id_persona; ?>' />
                      <button type="button" id="sendUsuario" class="btn btn-primary">Guardar cambios </button>
                      <input  id="btnCerrar" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                 </div>
            </form>
        </div>
    </div>
</div>

<script src="<?php echo base_url();?>assets/js/usuario/usuario.js"></script>

<script>

$(document).ready(function()
{
  $('#table_asignar_usuario_proyecto').DataTable(
  {
      "language":idioma_espanol
  });

    <?php if(isset($usuario->id_persona)){ ?>
      $("#formUsuario").attr("action",base_url+"index.php/Usuario/editUsuarioProyecto");
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

$(function()
{
    $("#formUsuario").submit(function(event)
    {
        event.preventDefault();
        var stringMenuUsuario ='';
        var c=0;
        var dat = $("#result").text();
        var b = dat.split(',').map(Number);
        for (var i = 0; i < b.length; i++) {
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
                //window.location.href=base_url+"index.php/Usuario/Proyectos";
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

function checkAll(ele) {
    var checkedNodes = [], message;
    var checkboxes = document.getElementsByTagName('input');
    if (ele.checked) {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name == 'checkbox' ) {
                checkboxes[i].checked = true;
                checkedNodes.push(checkboxes[i].value);
                message = checkedNodes.join(",");
            }
        }
        $("#result").html(message);
    } else {
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == 'checkbox' && checkboxes[i].name == 'checkbox' ) {
                checkboxes[i].checked = false;
                message = "";
            }
        }
        $("#result").html(message);
    }
}
// Pass the checkbox name to the function
function getCheckedBoxes(chkboxName) {
  var checkedNodes = [], message;
  var checkboxes = document.getElementsByName(chkboxName);
  var checkboxesChecked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i]);
        checkedNodes.push(checkboxes[i].value);
        message = checkedNodes.join(",");
     }
  }
  $("#result").html(message);
  // Return the array if it is non-empty, or null
  //return checkboxesChecked.length > 0 ? checkboxesChecked : null;
}


</script>
