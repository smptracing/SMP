<div class="right_col" role="main">
          <div class="">


            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Meta Presupuestal<small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">

                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_meta_presupuestal"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  Meta Presupuestal</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_meta_presupuestal" aria-labelledby="profile-tab">
                                             <!-- /tabla de eservicios publicos asociados desde el row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventana_registrar_meta" >
                                                            <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>

                                                          <div class="x_title">
                                                            <ul class="nav navbar-right panel_toolbox">

                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>

                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>

                                                            </ul>
                                                            <div class="clearfix"></div>


                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table_metas_presupuestales" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                      <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                        <tr>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Año </th>
                                                          <th style="width: 21%"><i class="fa fa-bookmark-o"></i> Número de meta</th>
                                                          <th style="width: 62%"> Nombre de la meta</th>
                                                        <th style="width: 8%">Opción</th>
                                                        </tr>
                                                      </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                  </div>

                                            </div>
                                         <!-- / fin tabla servicios publicos asociados el row -->
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
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Año Meta </span>
                            </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                              <input id="txt_anio_meta" name="txt_anio_meta" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Año" required="required" type="number"  value="2017">
                          </div>
                       </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Correlativo Meta<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="txt_correlativo_meta" name="txt_correlativo_meta" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Correlativo Meta" required="required" type="number" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nombre de la Meta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txt_nombre_meta" name="txt_nombre_meta" placeholder="Nombre de la meta" class="form-control col-md-7 col-xs-12"></textarea>
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
<!-- /.fin ventana para registrar meta presupuestal->

<!-- /.ventana para editar meta presupuestal-->
<div class="modal fade" id="ventana_editar_meta_presupuestal" role="dialog">
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
                <form class="form-horizontal form-label-left"  id="form_EditMetaPresupuestal" action="<?php echo base_url(); ?>Meta/EditarMetaPresupuestal" method="POST" >
                <input id="txt_id_meta" name="txt_id_meta" class="form-control col-md-7 col-xs-12"  type="text"  >
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Año Meta </span>
                            </label>
                          <div class="col-md-2 col-sm-6 col-xs-12">
                              <input id="txt_anio_meta_m" name="txt_anio_meta_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Año" required="required" type="number"  value="2017">
                          </div>
                       </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Correlativo Meta<span class="required">*</span>
                        </label>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                          <input id="txt_correlativo_meta_m" name="txt_correlativo_meta_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Correlativo Meta" required="required" type="number" >
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Nombre de la Meta <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txt_nombre_meta_m" name="txt_nombre_meta_m" placeholder="Nombre de la meta" class="form-control col-md-7 col-xs-12"></textarea>
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
<!-- /.fin ventana para editar meta presupuestal->

