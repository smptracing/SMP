<link rel="stylesheet" href="http://kendo.cdn.telerik.com/2017.3.1026/styles/kendo.common.min.css" />
<link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.default.min.css" rel="stylesheet" />
<!--<link href="//cdn.kendostatic.com/2013.1.319/styles/kendo.default.mobile.min.css" rel="stylesheet" />-->

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
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Acceso al menú</label>
                    <div class="col-sm-9">
                      <div class="demo-section k-content">
                          <div>
                              <h4>Estructura</h4>
                              <div id="treeview"></div>
                          </div>
                          <div style="padding-top: 2em;">
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
<script src="<?php echo base_url();?>assets/js/Helper/jsHelper.js"></script>

<script>

var menuUsuarioId = [];
$.getJSON(base_url +"index.php/Login/recuperarMenu/"+<?php echo $arrayUsuario->id_persona; ?>, function(json) {
  $.each(json,function(i){
    if(json[i]['id_padre_home']==22) {
      menuUsuarioId.push(json[i].id_submenu);
    }
  });
});

$.getJSON(base_url+"index.php/Login/recuperarMenu/0",function(json){
  var json2 = [];
  var subMenu = [];
  var count = 0;
  var item = [];

function compara(json, menuUsuarioId) {
  var bool = false;
    for (var i = 0; i < json.length; i++) {
      if (json[i].id_submenu == menuUsuarioId) {
        console.log(json[i].id_submenu+" = "+menuUsuarioId);
        bool = true;
      }
    }
    return bool;
}

    $.each(json,function(i){
          if(json[i]['id_padre_home']==22) {
            item.push({ id:  json[i]['id_submenu'],
              text: json[i]['id_modulo']+": "+json[i]['nombre']+": "+ json[i]['nombreSubmenu']+" - "+json[i]['id_submenu'],
              spriteCssClass: "html",
              checked: compara(json,menuUsuarioId[count])
            });
            count++;
          }

          subMenu[0]=item;

        if (json[i]['id_modulo'] == "HOME") {
        json2.push(
          {
              id: json[i]['id_submenu'], text: json[i]['nombreSubmenu'], expanded: true, spriteCssClass: "folder", items: subMenu[i]
          }
        );
      }
    });

        $("#treeview").kendoTreeView({
            checkboxes: {
                checkChildren: true
            },

            check: onCheck,

            dataSource: [{
                id: 1, text: "Inicio", expanded: true, spriteCssClass: "rootfolder", items: json2
            }]
        });

});
        // function that gathers IDs of checked nodes
        function checkedNodeIds(nodes, checkedNodes) {
            for (var i = 0; i < nodes.length; i++) {
                if (nodes[i].checked) {
                    checkedNodes.push(nodes[i].id);
                }

                if (nodes[i].hasChildren) {
                    checkedNodeIds(nodes[i].children.view(), checkedNodes);
                }
            }
        }

        // show checked node IDs on datasource change
        function onCheck() {
            var checkedNodes = [],
                treeView = $("#treeview").data("kendoTreeView"),
                message;

            checkedNodeIds(treeView.dataSource.view(), checkedNodes);

            if (checkedNodes.length > 0) {
                message = "IDs of checked nodes: " + checkedNodes.join(",");
            } else {
                message = "No nodes checked.";
            }

            $("#result").html(message);
        }
  </script>

<script>
  $(function(){
      $("#cbb_TipoUsuario").change(function(event){
        listaMenu();
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
