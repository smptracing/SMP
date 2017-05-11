<div class="right_col" role="main">
          <div class="">

<!--Inicio primer panel General-->
      <div class="clearfix"></div>
        <div class="">
          <div class="col-md-12 col-sm-6 col-xs-12">
             <div class="x_panel">
             <!--inicio de pestaña configurtacion-->
                <div class="x_title">
                     <h2><i class="fa fa-bars"></i> Ciclo de Inversión<small></small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>

                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                      <div class="clearfix"></div>
                </div>
              <!--final  de pestaña configurtacion-->
                       <div class="x_content">
                           <div class="" role="tabpanel" data-example-id="togglable-tabs">
                             <!-- Inicio Menus-->
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_EstadoCicloInversion" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                                         Estado de Ciclo Inversión</a>
                                         </li>
                               </ul>
                              <!-- Fin Menus-->
                               <div id="myTabContent" class="tab-content">
                                             <!-- /Inicio Contenido del estado ciclo de inversionn -->
                                           <div role="tabpanel" class="tab-pane fade active in" id="tab_EstadoCicloInversion" aria-labelledby="home-tab">
                                        <!-- /Inicio tabla estado  ciclo de inversion desde el row -->
                                           <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">

                                                    <div class="x_title">
                                                           <!-- <h2>Listado de  Ciclo Inversión<small>.</small></h2>-->
                                                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegEstadoCicloInversion" >
                                                                <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span> Nuevo
                                                          </button>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                            </ul>
                                                           <div class="clearfix"></div>
                                                      </div>
                                                      <!--inicio de la tabla estado ciclo de inversion -->
                                                        <!--inicio  de icono de reporte -->
                                                        <div class="clearfix">
                                                           <div class="pull-right tableTools-container-EstadoCicloInversion">
                                                           </div>
                                                        </div>
                                                      <!--fin  de icono de reporte -->
                                                      <div class="x_content">
                                                                <table id="dynamic-table-EstadoCicloInversion" class="table table-striped table-bordered table-hover" with="100%" >
                                                                    <thead>
                                                                       <tr>
                                                                         <th class="center">
                                                                          <label class="pos-rel">
                                                                           <input type="checkbox" class="ace" />
                                                                           <span class="lbl"></span>
                                                                          </label>
                                                                         </th>
                                                                         <th>ID CICLO</th>
                                                                         <th>NOMBRE CICLO</th>
                                                                         <th class="hidden-480">DESCRIPCION CICLO</th>
                                                                         <th></th>
                                                                      </tr>
                                                                   </thead>
                                                                </table>
                                                      </div>
                                                      <!--fin de la tabla estado ciclo de inversion -->
                                           </div>
                                              </div>
                                           </div>
                                        <!-- / fin tabla estado del ciclo dede inversion desde el row -->
                                        </div>
                                        <!-- /fin del Contenido del estado del ciclo de Inversion -->
                               </div>
                      </div>
             </div>
           </div>
          </div>
      <div class="clearfix"></div>
  <!--fin primer panel General-->

        </div>
     </div>



<!-- /.ventana para registra una nueva estado ciclo de inversion-->
<div class="modal fade" id="VentanaRegEstadoCicloInversion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Estado Ciclo de Inversión</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-AddEstadoCicloInversion"   action="<?php echo base_url(); ?>EstadoCicloInversion/AddEstadoCicloInversion" method="POST" >
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreEstadoCicloInversion" name="txt_NombreEstadoCicloInversion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripción
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DescripcionEstadoCicloInversion" name="txt_DescripcionEstadoCicloInversion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripción"  type="text">
                        </div>
                      </div>
                           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success" >
                          <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                           Guardar</button>
                          <button type="button" value="Borrar información"  class="btn btn-danger"  data-dismiss="modal"  >
                          <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                           Cancelar</button>
                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para registra una estado ciclo de inversion-->

<!-- /.ventana para modificar una  estado ciclo de inversion-->
<div class="modal fade" id="VentanaEditEstadoCicloInversion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Estado Ciclo de Inversión</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-EditEstadoCicloInversion"   action="<?php echo base_url(); ?>EstadoCicloInversion/get_EstadoCicloInversion" method="POST" >

               <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_IdEstadoCicloInversionM" name="txt_IdEstadoCicloInversionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>


                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreEstadoCicloInversionM" name="txt_NombreEstadoCicloInversionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre " required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripccion
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DescripcionEstadoCicloInversionM" name="txt_DescripcionEstadoCicloInversionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripccion " type="text">
                        </div>
                      </div>
                               <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <button id="send" type="submit" class="btn btn-success" >
                          <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                           Guardar</button>
                          <button type="button" value="Borrar información"  class="btn btn-danger"  data-dismiss="modal"  >
                          <span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
                           Cancelar</button>
                        </div>
                      </div>
                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para modificar una estado ciclo de inversion-->



