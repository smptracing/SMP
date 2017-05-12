<div class="right_col" role="main">
          <div class="">

<!--Inicio segundo panel General-->
      <div class="clearfix"></div>
        <div class="">
          <div class="col-md-12 col-sm-6 col-xs-12">
             <div class="x_panel">
             <!--inicio de pestaña configurtacion-->
                <div class="x_title">
                     <h2><i class="fa fa-bars"></i> Información Presupuestal <small></small></h2>
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

                                         <li role="presentation" class="active"><a href="#tab_FuenteFinanciamiento" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
                                         Fuente de Financiamiento</a>
                                         </li>
                                         
                                </ul>
                              <!-- Fin Menus-->
                                      <div id="myTabContent" class="tab-content">

                                         <!-- /Inicio del Contenido de fuente de financiamiento -->
                                        <div role="tabpanel" <div role="tabpanel" class="tab-pane fade active in"  id="tab_FuenteFinanciamiento" aria-labelledby="profile-tab">
                                        <!-- /Inicio tabla de fuente financiamiento desde el row -->
                                           <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">
                                                    <div class="x_title">
                                                          <!--  <h2>Listado de  Fuente de Financiamiento<small>.</small></h2>-->
                                                            <button type="button" id="btn-FuenteFinanciamiento" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegFuenteFinanciamiento" >
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
                                                      <!--inicio de la tabla fuente de financiamiento -->
                                                        <!--inicio  de icono de reporte -->
                                                        <div class="clearfix">
                                                           <div class=" pull-right tableTools-container-FuenteFinanciamiento">
                                                           </div>
                                                        </div>
                                                      <!--fin  de icono de reporte -->
                                                      <div class="x_content">
                                                                <table id="dynamic-table-FuenteFinanciamiento" class="table table-striped table-bordered table-hover" width="100%">
                                                                    <thead>
                                                                       <tr>
                                                                         <th class="center">
                                                                          <label class="pos-rel">
                                                                           <input type="checkbox" class="ace" />
                                                                           <span class="lbl"></span>
                                                                          </label>
                                                                         </th>
                                                                         <th>ID</th>
                                                                         <th>RUBRO</th>
                                                                         <th>NOMBRE FFTO</th>
                                                                         <th >ACRONIMO FFTO</th>
                                                                         <th class="hidden-480">DESCRIPCION</th>
                                                                         <th></th>
                                                                      </tr>
                                                                   </thead>

                                                                </table>
                                                      </div>
                                                      <!--fin de la tabla fuente de finaciamiento -->
                                           </div>
                                              </div>
                                           </div>
                                        <!-- / fin tabla fuente de financiamiento desde el row -->
                                        </div>
                                        <!-- /fin del Contenido fuente de financiamiento -->
                                    </div>
                               </div>
                      </div>
             </div>
           </div>
          </div>
      <div class="clearfix"></div>
  <!--fin segundo panel General-->
        </div>
     </div>


<!-- /.ventana para registra una fuente finanaciamietno-->
<div class="modal fade" id="VentanaRegFuenteFinanciamiento" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Fuente Financiamiento</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-AddFuenteFinanciamiento"   action="<?php echo base_url(); ?>FuenteFinanciamiento/AddFuenteFinanciamiento" method="POST" >
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreFuenteFinanciamiento" name="txt_NombreFuenteFinanciamiento" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre" required="required" type="text">
                        </div>
                      </div>
                          <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Acronimo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_AcronimoFuenteFinanciamiento" name="txt_AcronimoFuenteFinanciamiento" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Acronimo " type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripción
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DescripcionFuenteFinanciamiento" name="txt_DescripcionFuenteFinanciamiento" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripción"  type="text">
                        </div>
                      </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox">Rubro<span class="required">*</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxRubroEjecucion" name="cbxRubroEjecucion" class="selectpicker" data-live-search="true" required="required" title="Buscar Funcion...">
                              </select>
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
          <center>*  Son campos obligatorios.</center>
        </div>
      </div>
    </div>
</div>
<!-- /.fin ventana para registra fuente financiamiento-->

<!-- /.ventana para modificar fuente de financimeito-->
<div class="modal fade" id="VentanaEditFuenteFinanciamiento" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Fuente Financiamiento</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-EditFuenteFinanciamiento"   action="<?php echo base_url(); ?>FuenteFinanciamiento/get_FuenteFinanciamiento" method="POST" >

               <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_IdFuenteFinanciamientoM" name="txt_IdFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre FFTO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreFuenteFinanciamientoM" name="txt_NombreFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre " required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Acronimo FFTO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_AcronimoFuenteFinanciamientoM" name="txt_AcronimoFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre " required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Descripccion FFTO <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DescripcionFuenteFinanciamientoM" name="txt_DescripcionFuenteFinanciamientoM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Descripccion " required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox">Rubro<span class="required">*</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxRubroEjecucionM" name="cbxRubroEjecucionM" required="required" class="selectpicker" data-live-search="true"  title="Buscar Funcion...">
                              </select>
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
<!-- /.fin ventana para modificar fuente de financiamietno-->










