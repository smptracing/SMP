<style>
  #table-ProyectoInversionProgramado > tbody > tr > td
  {
    vertical-align: middle;
  }
</style>
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">

            </div>
            <div class="clearfix"></div>
            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i>PROYECTOS<small></small></h2>
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
                                        <li role="presentation"  class="active"><a  href="#tab_brecha" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Formulación y Evaluación</a>
                                        </li>
                                        <li role="presentation" class=""><a  href="#tab_Ejecución" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Ejecución</a>
                                        </li>
                                        <li role="presentation" class=""><a  href="#tab_OperacionMantenimiento" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Operación y Mantenimiento</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                          <!-- /panel de PROYECTOS desde el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de PROYECTOS desde el row -->
                                            <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                          <div class="row" class="container-fluid">

                                                                <div class="col-md-1">
                                                                    <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
                                                                </div>

                                                              <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-3">
                                                                     <div class="col-md-4">
                                                                        <a href="<?php echo site_url('CarteraInversion/'); ?>"><i class="fa fa-suitcase"></i>Cartera</a>
                                                                     </div>
                                                                     <div class="col-md-8">
                                                                          <select  id="cbCartera" class="form-control" name="cbCartera"></select>
                                                                          <input type="hidden" id="Aniocartera" value="<?=(isset($anio) ? $anio : date('Y'))?>">
                                                                    </div>
                                                              </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="table_formulacion_evaluacion" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                   <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                        <tr>
                                                          <th style="width: 1%">Id</th>
                                                          <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Cod. </th>
                                                          <th style="width: 46%"><i class="fa fa-bookmark-o"></i> Nombre</th>
                                                          <th style="width: 8%"><i class="fa fa-money"></i> Costo</th>
                                                          <th style="width: 12%"> Estado Ciclo</th>

                                                        </tr>
                                                      </thead>


                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                        </div>
                                        <!--FIN PANEL DE  Formulacion y evalucion-->
                                      <!-- /panel ejecucion-->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Ejecución" aria-labelledby="home-tab">
                                             <!-- /tabla de ejecucion desde el row -->
                                              <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                          <div class="row" class="container-fluid">

                                                                <div class="col-md-1">
                                                                    <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
                                                                </div>
                                                                <div class="col-md-4">
                                                               </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="table_ejecucion" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                     <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                        <tr>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Cod. </th>
                                                          <th style="width: 38%"><i class="fa fa-bookmark-o"></i> Nombre</th>
                                                          <th style="width: 12%"><i class="fa fa-money"></i> Costo</th>
                                                          <th style="width: 12%"> Estado Ciclo</th>
                                                          <th style="width: 12%"> Estado</th>
                                                        <th style="width: 8%">Opción</th>
                                                        </tr>
                                                      </thead>

                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                         <!-- / fin tabla ejecucion -->
                                        </div>
                                           <!-- / fin  panel ejecucion-->
                                            <!-- /panel funcionamiento-->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_OperacionMantenimiento" aria-labelledby="home-tab">
                                             <!-- /tabla de funcionamiento desde el row -->
                                              <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                          <div class="row" class="container-fluid">

                                                                <div class="col-md-1">
                                                                    <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
                                                                </div>
                                                                <div class="col-md-4">
                                                               </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="Table_funcionamiento" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                     <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                        <tr>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Cod. </th>
                                                          <th style="width: 38%"><i class="fa fa-bookmark-o"></i> Nombre</th>
                                                          <th style="width: 12%"><i class="fa fa-money"></i> Costo</th>
                                                          <th style="width: 12%"> Estado Ciclo</th>
                                                          <th style="width: 12%"> Estado</th>
                                                        <th style="width: 8%">Opción</th>
                                                        </tr>
                                                      </thead>

                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                         <!-- / fin tabla funcionamiento -->
                                        </div>
                                           <!-- / fin  panel funcionamiento-->
                                      </div>
                                    </div>
                                  </div>
                                </div>
              </div>


          </div>
          <div class="clearfix"></div>
        </div>
     </div>
