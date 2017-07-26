<div class="right_col" role="main">
    <div class="">

        <div class="clearfix"></div>

        <div class="">
            <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><b> OFICINAS </b></h2>
                        <ul class="nav navbar-right panel_toolbox">
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">


                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs" role="tablist">

                                <li role="presentation" class="active">
                                    <a href="#tab_Sector" id="home-tab" role="tab"
                                                                          data-toggle="tab" aria-expanded="true"> 
                                        <b>Gerencias</b></a>
                                </li>
                                <li role="presentation" class>
                                    <a href="#tab_Entidad" role="tab" id="profile-tab1"
                                     data-toggle="tab" aria-expanded="false">  
                                    <b>Sub Gerencias</b></a>
                                </li>
                                <li role="presentation" class>
                                    <a href="#tab_ServicioPubAsoc" role="tab"
                                                                    id="profile-tab2" data-toggle="tab"
                                                                    aria-expanded="false"> 
                                        <b>Oficinas</b></a>
                                </li>
                            </ul>
                            <div id="myTabContent" class="tab-content">
                                <!-- /Contenido de funcion -->
                                <div role="tabpanel" class="tab-pane fade active in" id="tab_Sector"
                                     aria-labelledby="home-tab">
                                    <!-- /tabla de funcion desde el row -->
                                    <div class="row">

                                        <div class="col-md-12 col-xs-12">
                                            <div class="x_panel">
                                                <button type="button" class="btn btn-primary " data-toggle="modal"
                                                        data-target="#VentanaRegistraGerencia"><span
                                                            class="fa fa-plus-circle"> </span> Nuevo
                                                </button>
                                                 <div class="x_title">
                                                     <!-- <h2>Listado de  Tipo NO PIP<small>.</small></h2>-->
                                                       
                                                           <div class="clearfix"></div>
                                                      </div>
                                                <div class="x_content">

                                                    <table id="table-Gerencia"
                                                           class="table table-striped table-bordered table-hover" ellspacing="0" width="100%"
                                                           cellspacing="0" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>GERENCIA</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- / fin tabla de funcion desde el row -->
                                </div>
                                <!-- /fin del funcion del sector -->
                                <div role="tabpanel" class="tab-pane fade" id="tab_Entidad"
                                     aria-labelledby="profile-tab">


                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                        
                                                <button type="button" id="btn_NuevaSubGerencia" class="btn btn-primary"
                                                        data-toggle="modal" data-target="#VentanaRegistraSubGerencia">
                                                    <span class="fa fa-plus-circle"></span>
                                                    Nuevo
                                                </button>
                                                 <div class="x_title">
                                                     <!-- <h2>Listado de  Tipo NO PIP<small>.</small></h2>-->
                                                       
                                                           <div class="clearfix"></div>
                                                      </div>
                                                <div class="x_content">
                                                <div class="x_content">
                                                    <table id="table-SubGerencia"
                                                           class="table table-striped table-bordered table-hover"
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>ID SUBGERENCIA</th>
                                                            <th>ID GERENCIA</th>
                                                            <th>GERENCIA</th>
                                                            <th>SUB GERENCIA</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                        </thead>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div role="tabpanel" class="tab-pane fade" id="tab_ServicioPubAsoc"
                                     aria-labelledby="profile-tab">

                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                                <button type="button" id="btn_nuevoOficina"
                                                        class="btn btn-primary" data-toggle="modal"
                                                        data-target="#VentanaRegistraOficina">
                                                    <span class="fa fa-plus-circle"></span>
                                                    Nuevo
                                                </button>
                                                 <div class="x_title">
                                                     <!-- <h2>Listado de  Tipo NO PIP<small>.</small></h2>-->
                                                       
                                                           <div class="clearfix"></div>
                                                      </div>
                                                <div class="x_content">
                                                    <table id="table-Oficina"
                                                           class="table table-striped table-bordered table-hover"
                                                           width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th>ID OFICINA</th>
                                                            <th>ID SUBGERENCIA</th>
                                                            <th>OFICINA</th>
                                                            <th>SUB GERENCIA</th>
                                                            <th>GERENCIA</th>
                                                            <th>ACCIONES</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- / fin tabla grupo funcional asociados el row -->
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



<!-- /.ventana para registra funcion -->
<div class="modal fade" id="VentanaRegistraGerencia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"> <!--add Gerencia-->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar Gerencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                        <form class="form-horizontal " id="form-addGerencia"
                              action="<?php echo base_url(); ?>Gerencia/GetGerencia" method="POST">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion
                                    Gerencia <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_denominacion_gerencia" name="txt_denominacion_gerencia"
                                           class="form-control col-md-7 col-xs-12"
                                           placeholder="Ingrese aqui" required="required"
                                           type="text">
                                </div>
                            </div>
                            <!--<div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Función <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_nombrefuncion" name="txt_nombrefuncion"
                                           class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" placeholder="Nombre Funcion" required="required"
                                           type="text">
                                </div>
                            </div>-->
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                    </div>
                    <!-- /.span -->
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div> *Son campos obligatorios</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.fin ventana para registra una nueva funcion-->


<!-- /.ventana Registrar Sub Gerencia-->
<div class="modal fade" id="VentanaRegistraSubGerencia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar Sub Gerencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORMULARIO REGISTRAR SUB GERENCIA -->
                        <form class="form-horizontal form-label-left" id="form-AddSubGerencia"
                              action="<?php echo base_url(); ?>SubGerencia/AddSubGerencia"
                              method="POST">


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion Sub
                                    Gerencia<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_denom_subgerencia" name="txt_denom_subgerencia"
                                           class="form-control col-md-7 col-xs-12"
                                           placeholder="Denominacion Sub Gerencia" required="required"
                                           type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">GERENCIA </label>
                                <div class="col-md-6 col-sm-9 col-xs-6">
                                    <select id="listaGerenciaC" name="listaGerenciaC" class="selectpicker"
                                            data-live-search="true" title="Seleccione Gerencia">
                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                    </div>
                    <!-- /.span -->
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /.fin ventana para registra una nueva DIVISION  FUNCIONAL-->

<!-- OFICINA #######################################-->
<div class="modal fade" id="VentanaRegistraOficina" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar Nueva Oficina</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORMULARIO PARA REGISTRA OFICINA-->
                        <form class="form-horizontal form-label-left" id="form-AddOficina"
                              action="<?php echo base_url(); ?>Oficina/AddOficina"
                              method="POST">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion Oficina
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_denom_oficina" name="txt_denom_oficina"
                                           class="form-control col-md-7 col-xs-12"
                                           placeholder="Denominacion Oficina" required="required"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6"> Sub Gerencia </label>
                                <div class="col-md-6 col-sm-9 col-xs-6">
                                    <select id="listaSubGerencia" name="listaSubGerencia" class="selectpicker"
                                            data-live-search="true" data-live-search-style="begins"
                                            title="Seleccione Sub Gerencia">

                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button data-dismiss="modal" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>

                                </div>
                            </div>
                        </form>
                        <!-- FORMULARIO FIN PARA REGISTRA NUEVO GRUPO FUNCIONAL -->
                    </div>
                    <!-- /.span -->
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- /.ventana para modificar grupo funcional-->

<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- modificar la funcion-->
<div class="modal fade" id="VentanaModificarGerencia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar Gerencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                        <form class="form-horizontal " id="form-ModificarGerencia"
                              action="<?php echo base_url(); ?>Gerencia/GetGerencia" method="POST">

                            <div class="item form-group">

                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Denominacion <span
                                            class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="txt_id_gerencia_m" name="txt_id_gerencia"
                                               class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                               data-validate-words="2"
                                               required="required" type="hidden">
                                    </div>
                                    <input id="txt_denom_gerencia_m" name="txt_denominacion_gerencia"
                                           class="form-control col-md-7 col-xs-12" required="required"
                                           type="text">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">

                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                    </div>
                    <!-- /.span -->
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- fin de modificar la funcion-->

<div class="modal fade" id="VentanaUpdateSubGerencia" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar Sub Gerencia</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORMULARIO PARA REGISTRA NUEVO GRUPO FUNCIONAL-->
                        <form class="form-horizontal form-label-left" id="form-ModificarSubGerencia"
                              action="<?php echo base_url(); ?>SubGerencia/UpdateSubGerencia"
                              method="POST">

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion Sub Gerencia
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_id_subgerencia_m" name="txt_id_subgerencia_m"
                                           class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2" placeholder="id subgerencia"
                                           required="required" type="hidden">
                                    <input id="txt_denom_subgerencia_m" name="txt_denom_subgerencia_m"
                                           class="form-control col-md-7 col-xs-12" required="required"
                                           type="text">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Gerencia</label>
                                <div class="col-md-6 col-sm-9 col-xs-6">
                                    <select id="listaGerenciaCM" name="listaGerenciaCM" class="selectpicker"
                                            data-live-search="true">

                                    </select>
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<!-- modificar division  funcional-->

<div class="modal fade" id="VentanaUpdateOficina" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modificar Oficina</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <!-- FORMULARIO PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                        <form class="form-horizontal form-label-left" id="form-UpdateOficina"
                              action="<?php echo base_url(); ?>Oficina/UpdateOficina"
                              method="POST">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion Oficina <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_id_oficina_m" name="txt_id_oficina_m"
                                           class="form-control col-md-7 col-xs-12" data-validate-length-range="6"
                                           data-validate-words="2"
                                           required="required" type="hidden">

                                    <input id="txt_denom_oficina_m" name="txt_denom_oficina_m"
                                           class="form-control col-md-7 col-xs-12" required="required"
                                           type="text">
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-6">Sub Gerencia</label>
                                <div class="col-md-6 col-sm-9 col-xs-6">
                                    <select id="listaSubGerenciaM" name="listaSubGerenciaM" class="selectpicker"
                                            data-live-search="true" data-placeholder="Seleccione Sub">
                                    </select>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button id="send_oficina" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-disk"></span>
                                        Guardar
                                    </button>
                                    <button data-dismiss="modal" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                    </div>
                    <!-- /.span -->
                </div>
                <!-- /.row -->
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- fin para modificar division  funcional-->
<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });
</script>
