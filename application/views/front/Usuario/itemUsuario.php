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
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenu" name="cbb_listaMenu[]" multiple=""></select>
                        </div>
                        <div class="col-sm-1" style="padding-top:20px;">
                          <button id="bt_Der" class="btn btn-info" type="button" style="width:100%; text-align:center;"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                          <button id="bt_Izq" type="button" class="btn btn-warning" style="width:100%;margin-top:10px; text-align:center;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenuDestino" name="cbb_listaMenuDestino[]" multiple=""></select>
                        </div>
                  </div> <!--
                  <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Acceso al pip</label>
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenu2" name="cbb_listaMenu2[]" multiple=""></select>
                        </div>
                        <div class="col-sm-1" style="padding-top:20px;">
                          <button id="bt_Der2" class="btn btn-info" type="button" style="width:100%; text-align:center;"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                          <button id="bt_Izq2" type="button" class="btn btn-warning" style="width:100%;margin-top:10px; text-align:center;"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
                        </div>
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenuDestino2" name="cbb_listaMenuDestino2[]" multiple=""></select>
                        </div>
                  </div> -->
                  <div class="form-group" style="text-align: center;">
                      <button type="button" id="sendUsuario" class="btn btn-primary">Registrar Usuario </button>
                      <input  id="btnCerrar" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                 </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/usuario/usuario.js"></script>
<script src="<?php echo base_url();?>assets/js/Helper/jsHelper.js"></script>
<script>
  $(function(){
      $("#cbb_TipoUsuario").change(function(event){
        listaMenu();
        listaMenu2();
        $('#cbb_listaMenuDestino').empty();
        $.getJSON(base_url+"index.php/Usuario/ListarTipoUsuarioMenu/"+$("#cbb_TipoUsuario").val(),function(json){
            $.each(json,function(i){
                $('#cbb_listaMenuDestino').append("<option  value='"+json[i]['id_submenu']+"'>"+json[i]['id_modulo']+": "+json[i]['nombre']+": "+json[i]['nombreSubmenu']+"</option>");
                $("#cbb_listaMenu option[value='"+json[i]['id_submenu']+"']").remove();
            });
        });
      });
      $("#formUsuario").submit(function(event){
        event.preventDefault();
        var stringMenuUsuario ='';
        var stringMenuUsuario2 ='';
        var c=0;
        $("#cbb_listaMenuDestino option").each(function(){
            if(c>0)
              stringMenuUsuario+='-';
            stringMenuUsuario+=$(this).attr('value');
            c++;
        });
        $.ajax({
            url:$("#formUsuario").attr("action"),
            type:$(this).attr('method'),
            data:$(this).serialize()+"&cbb_listaMenuDestino="+stringMenuUsuario,
            success:function(resp){
              swal("",resp, "success");
              $('#table-Usuarios').dataTable()._fnAjaxUpdate();

           }
        });
      });
      $("body").on("click","#sendUsuario",function(e){
          $('#formUsuario').data('formValidation').validate();
          if($('#formUsuario').data('formValidation').isValid()==true){
              $('#formUsuario').submit();
              $('#formUsuario').each(function(){
                this.reset();
              });
              $('.selectpicker').selectpicker('refresh');
              $('#formUsuario').data('formValidation').resetForm();
              $('#formUsuario').off();
              $('#formUsuario').remove();
              $('#formUsuario').empty();
              $('#null').modal('hide');


          }
      });
  });
	$(document).ready(function(){
    <?php
    if(isset($arrayUsuario->id_persona)){
      ?>
      $("#formUsuario").attr("action",base_url+"index.php/Usuario/editUsuario");
      <?php
    }
    else{
      ?>
      $("#formUsuario").attr("action",base_url+"index.php/Usuario/addUsuario");
      <?php
    }
    ?>
    $('#formUsuario').formValidation({
      fields:
      {
        comboPersona:{
          validators:{
            notEmpty:{
              message: '<b style="color: red;">El campo "Persona" es requerido.</b>'
            }
          }
        },
        txt_usuario:{
          validators:{
            notEmpty:{
              message: '<b style="color: red;">El campo "Usuario" es requerido.</b>'
            }
          }
        },
        cbb_TipoUsuario:{
          validators:{
            notEmpty:{
              message: '<b style="color: red;">El campo "Tipo de usuario" es requerido.</b>'
            }
          }
        },
      }
    });
		listaPersonaCombo("<?php if(isset($arrayUsuario->id_persona)) echo $arrayUsuario->id_persona; ?>");
		listatipoUsuario("<?php if(isset($arrayUsuario->id_usuario_tipo)) echo $arrayUsuario->id_usuario_tipo; ?>");
    listaMenu();
    listaMenu2();
    <?php
    if(isset($arrayUsuario->id_persona)){
    ?>
    listaMenuUsuario("<?php echo $arrayUsuario->id_persona; ?>");
    <?php
    }
    ?>


    //$("#comboPersona").val(15);
	});
</script>
