<div class="right_col" role="main">
    <div class="">
    <div class="clearfix"></div>
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2> Meta Presupuestal<small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana_registrar_meta" ><span class="fa fa-plus-circle"></span> Nuevo</button>
                                <div class="x_title">
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="table_metas_presupuestales" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                        <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                            <tr>
                                                <th style="width: 1%">#</th>
                                                <th style="width: 62%"> Nombre de la meta</th>
                                                <th style="width: 8%">Opción</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<!-- /.ventana para registra meta presupuestal-->
<div class="modal fade" id="ventana_registrar_meta" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Meta Presupuestal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA meta prespuestal-->
                <form class="form-horizontal form-label-left"  id="form_AddMeta" action="<?php echo base_url(); ?>Meta/AddMeta" method="POST" >
                    <div id="validarMeta">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nombre de la Meta*
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txt_nombre_meta" name="txt_nombre_meta" placeholder="Nombre de la meta" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>

                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cerrar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA META PRESUPUESTAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<div class="modal fade" id="ventana_editar_meta_presupuestal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar Meta Presupuestal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                <form class="form-horizontal form-label-left"  id="form_EditMetaPresupuestal" action="<?php echo base_url(); ?>Meta/EditarMetaPresupuestal" method="POST" >

                   <div id="validarMetaM">
                <input id="txt_id_meta" name="txt_id_meta" class="form-control col-md-7 col-xs-12"  type="text" style="visibility:hidden">


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nombre de la Meta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txt_nombre_meta_m" name="txt_nombre_meta_m" placeholder="Nombre de la meta" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>

                      </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA META PRESUPUESTAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });

$(function()
{
    $('#validarMeta').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
           txt_nombre_meta:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Nombre" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 99,
                        message: '<b style="color: red;">El campo "Nombre" no puede exceder los 99 cáracteres.</b>'
                    }
                }
            }
        }
    });

    $('#validarMetaM').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
           txt_nombre_meta_m:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Nombre" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 99,
                        message: '<b style="color: red;">El campo "Nombre" no puede exceder los 99 cáracteres.</b>'
                    }
                }
            }
        }
    });
});


</script>