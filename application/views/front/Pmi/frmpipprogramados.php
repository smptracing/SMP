<style>
  #table-ProyectoInversionProgramado > tbody > tr > td
  {
    vertical-align: middle;
  }
  #table_formulacion_evaluacion>tbody>tr>td:nth-child(0n+6)
  {
    text-align: right;
  }
  #table_formulacion_evaluacion>tbody>tr>td:nth-child(0n+7)
  {
    text-align: right;
  }
  #table_formulacion_evaluacion>tbody>tr>td:nth-child(0n+8)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+6)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+7)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+8)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+9)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+10)
  {
    text-align: right;
  }
  #table_ejecucion>tbody>tr>td:nth-child(0n+11)
  {
    text-align: right;
  }
  #table_operacion_mantenimiento>tbody>tr>td:nth-child(0n+7)
  {
    text-align: right;
  }
   #table_operacion_mantenimiento>tbody>tr>td:nth-child(0n+8)
  {
    text-align: right;
  }
   #table_operacion_mantenimiento>tbody>tr>td:nth-child(0n+9)
  {
    text-align: right;
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
                                    <h2>PROYECTOS<small></small></h2>
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
                                        <li role="presentation"  class="active"><a onclick=$("#Cbx_AnioCartera_").trigger("change");  href="#tab_brecha" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Formulación y Evaluación</a>
                                        </li>
                                        <li role="presentation" class=""><a onclick=$("#Cbx_AnioCartera_Ejecucion").trigger("change");  href="#tab_Ejecución" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Ejecución</a>
                                        </li>
                                        <li role="presentation" class=""><a onclick=$("#Cbx_AnioCartera_operacion_mant").trigger("change"); href="#tab_OperacionMantenimiento" role="tab" id="" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Operación y Mantenimiento</a>
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
                                                            <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-4">
                                                                     <div class="col-md-4">
                                                                        <a href="<?php echo site_url('CarteraInversion/'); ?>"><i ></i> <h6>Cartera :</h6></a>
                                                                     </div>
                                                                     <div class="col-md-2">
                                                                          <select  id="Cbx_AnioCartera_" selected name="Cbx_AnioCartera_"  class="selectpicker"></select>
                                                                          <input type="hidden" id="Aniocartera" value="<?=(isset($anio) ? $anio : date('Y'))?>">
                                                                    </div>
                                                              </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="table_formulacion_evaluacion" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                   <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                      <tr style="border:none;">
                                                            <th colspan="6" style="width: 88%"></th>
                                                            <th colspan="3" style="width: 12%; text-align:center;">PROGRAMACION</th>
                                                      </tr>
                                                      <tr>
                                                                  <th style="width: 1%">Id</th>
                                                                  <th style="width: 5%">Cód único</th>
                                                                  <th style="width: 5%">Ciclo de Inversión</th>
                                                                  <th style="width: 30%">Inversión</th>
                                                                  <th style="width: 4%">Prioridad</th>
                                                                  <th style="width: 4%">Brecha</th>
                                                                  <th style="width: 4%"><span class="lb_anio1"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio2"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio3"></span></th>
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
                                                            <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-4">
                                                                     <div class="col-md-4">
                                                                        <a href="<?php echo site_url('CarteraInversion/'); ?>"><i ></i> <h6>Cartera :</h6></a>
                                                                     </div>
                                                                     <div class="col-md-2">
                                                                          <select  id="Cbx_AnioCartera_Ejecucion" selected name="Cbx_AnioCartera_Ejecucion"  class="selectpicker"></select>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="table_ejecucion" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                   <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                      <tr style="border:none;">
                                                            <th colspan="6" style="width: 88%"></th>
                                                            <th colspan="3" style="width: 12%; text-align:center;">PROGRAMACION</th>
                                                             <th colspan="3" style="width: 12%; text-align:center;">OPERACION Y MANTENIMIENTO</th>
                                                      </tr>
                                                      <tr>
                                                                  <th style="width: 1%">Id</th>
                                                                  <th style="width: 5%">Cód único</th>
                                                                  <th style="width: 5%">Ciclo de Inversión</th>
                                                                  <th style="width: 30%">Inversión</th>
                                                                  <th style="width: 4%">Prioridad</th>
                                                                  <th style="width: 4%">Brecha</th>
                                                                  <th style="width: 4%"><span class="lb_anio1"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio2"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio3"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio1"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio2"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio3"></span></th>
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
                                                            <div class="col-md-4">
                                                              </div>
                                                              <div class="col-md-4">
                                                                     <div class="col-md-4">
                                                                        <a href="<?php echo site_url('CarteraInversion/'); ?>"><i ></i> <h6>Cartera :</h6></a>
                                                                     </div>
                                                                     <div class="col-md-2">
                                                                          <select  id="Cbx_AnioCartera_operacion_mant" selected name="Cbx_AnioCartera_operacion_mant"  class="selectpicker"></select>
                                                                    </div>
                                                              </div>
                                                          </div>
                                                      <div class="x_content">
                                              <table id="table_operacion_mantenimiento" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                   <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                      <tr style="border:none;">
                                                            <th colspan="6" style="width: 88%"></th>
                                                            <th colspan="3" style="width: 12%; text-align:center;">OPERACION Y MANTENIMIENTO</th>
                                                      </tr>
                                                      <tr>
                                                                  <th style="width: 1%">Id</th>
                                                                  <th style="width: 5%">Cód único</th>
                                                                  <th style="width: 5%">Ciclo de Inversión</th>
                                                                  <th style="width: 30%">Inversión</th>
                                                                  <th style="width: 4%">Prioridad</th>
                                                                  <th style="width: 4%">Brecha</th>
                                                                  <th style="width: 4%"><span class="lb_anio1"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio2"></span></th>
                                                                  <th style="width: 4%"><span class="lb_anio3"></span></th>
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
