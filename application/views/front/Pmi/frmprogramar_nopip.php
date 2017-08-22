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
                                        <li role="presentation"  class="active"><a  href="#tab_nopip" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> NO PIP</a>
                                         </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                          <!-- /panel de PROYECTOS desde el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_nopip" aria-labelledby="home-tab">
                                             <!-- /tabla de PROYECTOS desde el row -->
                                            <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                          <div class="row" class="container-fluid">
                                                          <div class="col-md-4">
                                                               </div>
                                                          </div>
                                                      <div class="x_content">
                                                        <table id="table_NoPip" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                   <thead style="background-color: #5A738E;color:#FFFFFF; ">
                                                        <tr>
                                                          <th style="width: 1%">#</th>
                                                          <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Cod. </th>
                                                          <th style="width: 46%"><i class="fa fa-bookmark-o"></i> Nombre</th>
                                                          <th style="width: 8%"><i class="fa fa-money"></i> Costo</th>
                                                          <th style="width: 12%"> Tipo NO PIP</th>
                                                          <th style="width: 12%"> Estado</th>
                                                        <th style="width: 6%">Programar</th>
                                                        </tr>
                                                      </thead>


                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                            </div>
                                        </div>
                                        <!--FIN PANEL DE  Formulacion y evalucion-->

                                      </div>
                                    </div>
                                  </div>
                                </div>
              </div>


          </div>
          <div class="clearfix"></div>
        </div>
     </div>

<!-- modal -->
<!-- /.Ventana Programar-->
<div class="modal fade" id="Ventana_Programar" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Programar No PIP</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form_AddProgramacion"   action="<?php echo base_url(); ?>bancoproyectos/Get_OperacionMantenimiento" method="POST" >

                        <input id="txt_id_pip_programacion" name="txt_id_pip_programacion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                             <div class="item form-group">
                               <div class="col-md-2 col-sm-6 col-xs-12">
                               <label>Cartera</label>
                                    <select  id="Cbx_AnioCartera" selected name="Cbx_AnioCartera" class="selectpicker"></select>
                                    <!--<input type="text" id="Aniocartera" value="<?=(isset($anio) ? $anio : date('Y'))?>">-->
                                </div>
                              </div>
                               <div class="item form-group">
                               <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>Código Único</label>
                                      <input  class="form-control" id="txt_codigo_unico_pi" name="txt_codigo_unico_pi" type="text" disabled="disabled">
                                    </div>
                                  <div class="col-md-9 col-sm-6 col-xs-12">
                                      <label>Nombre del Proyecto</label>
                                      <input  class="form-control" id="txt_nombre_proyecto" name="txt_nombre_proyecto" type="text" disabled="disabled">
                                    </div>
                                   <div class="col-md-2 col-sm-6 col-xs-12">
                                      <label>Costo del Proyecto</label>
                                      <input  class="form-control" id="txt_costo_proyecto" name="txt_costo_proyecto" type="number" disabled="disabled">
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                      <label>Brecha </label>
                                      <select id="cbxBrecha" name="cbxBrecha" class="selectpicker"   title="Elija Brecha" required="required">
                                      </select>
                                    </div>
                                 </div>
                              <h6><i class="fa fa-money"></i><b> Meta Presupuestal</b></h6>
                              <div class="item form-group">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <center><label>PIA</label></center>
                                      <input  class="form-control" id="txt_pia" name="txt_pia" type="number" required="required" value="0.00" disabled="disabled">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <center><label>PIM</label></center>
                                      <input  class="form-control" id="txt_pim" name="txt_pim" type="number" required="required" value="0.00"  disabled="disabled">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <center><label>Devengado</label></center>
                                      <input  class="form-control" id="txt_devengado" name="txt_devengado" type="number" required="required" value="0.00"  disabled="disabled">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <center><label>Prioridad</label></center>
                                      <input  class="form-control" id="txt_prioridad" name="txt_prioridad" type="number" required="required">
                                    </div>
                                 </div>
                              <h6><i class="fa fa-list"></i><b> Monto Programación</b></h6>
                               <div class="item form-group">
                                   <div class="col-md-3 col-sm-6 col-xs-12">
                                      <CENTER><label>Año 1</label></CENTER>
                                      <input  class="form-control" id="txt_anio1" name="txt_anio1" type="number" required="required">
                                    </div>
                                <!--<div class="col-md-3 col-sm-6 col-xs-12">
                                      <CENTER><label>Año 2</label></CENTER>
                                      <input  class="form-control" id="txt_anio2" name="txt_anio2" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <CENTER><label>Año 3</label></CENTER>
                                      <input  class="form-control" id="txt_anio3" name="txt_anio3" type="number" required="required">
                                    </div>-->

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>.</label><br>
                                       <button  id="send" type="submit" class="btn btn-success">
                                             <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                        </button>
                                    </div>
                                 </div>


                     <div class="ln_solid"></div>
                     <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  id="Table_Programar" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th  ><i></i> #</th>
                         <th  ><i></i> Cartera</th>
                         <th  ><i></i> Brecha</th>
                         <th  ><i></i> Año Programado</th>
                         <th  ><i></i> Monto Programado</th>
                         <th  ><i></i> Prioridad</th>
                         <th  ><i></i> Opción</th>
                      </tr>
                    </thead>
                    </table>
                    </center>
                    </div>
                    <center>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                           <button  class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-log-out"></span>
                            Cancelar
                          </button>
                        </div>
                      </div>
                      </center>

                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.Fin Ventana programar-->
<!-- /.Ventana presupuestal-->
<div class="modal fade" id="Ventana_Meta_Presupuestal_PI" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Meta Presupuestal PI</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form_AddMeta_Pi"   action="<?php echo base_url(); ?>bancoproyectos/Get_OperacionMantenimiento" method="POST" >

                        <input id="txt_id_pip_programacion_mp" name="txt_id_pip_programacion_mp" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                              <div class="item form-group">
                               <div class="col-md-2 col-sm-6 col-xs-12">
                                      <label>Año</label>
                                      <input id="txt_anio_meta" name="txt_anio_meta" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Año" required="required" type="number"  value="2017">
                                    </div>
                              </div>
                               <div class="item form-group">
                               <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>Código Único</label>
                                      <input  class="form-control" id="txt_codigo_unico_pi_mp" name="txt_codigo_unico_pi_mp" type="text" disabled="disabled">
                                    </div>
                                  <div class="col-md-9 col-sm-6 col-xs-12">
                                      <label>Nombre del Proyecto</label>
                                      <input  class="form-control" id="txt_nombre_proyecto_mp" name="txt_nombre_proyecto_mp" type="text" disabled="disabled">
                                    </div>
                                   <div class="col-md-3 col-sm-8 col-xs-12">
                                      <label>Costo del Proyecto</label>
                                      <input  class="form-control" id="txt_costo_proyecto_mp" name="txt_costo_proyecto_mp" type="number" disabled="disabled">
                                    </div>

                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                      <label>Meta Presupuestal</label>
                                      <select id="cbx_meta_presupuestal" name="cbx_meta_presupuestal" class="selectpicker" data-live-search="true" title="Elija Meta">
                                      </select>
                                    </div>
                                    <div class="col-md-4 col-sm-8 col-xs-12">
                                      <label>Correlativo Meta </label>
                                      <select id="cbx_Meta" name="cbx_Meta" class="selectpicker" data-live-search="true" title="Elija Meta">
                                      </select>
                                    </div>
                                 </div>
                              <div class="item form-group">
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>PIA</label>
                                      <input  class="form-control" id="txt_pia" name="txt_pia" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>PIM</label>
                                      <input  class="form-control" id="txt_pim" name="txt_pim" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>Certificado</label>
                                      <input  class="form-control" id="txt_certificado" name="txt_certificado" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>compromiso</label>
                                      <input  class="form-control" id="txt_compromiso" name="txt_compromiso" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>Devengado</label>
                                      <input  class="form-control" id="txt_devengado" name="txt_devengado" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>Girado</label>
                                      <input  class="form-control" id="txt_girado" name="txt_girado" type="number" required="required">
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                      <label>.</label><br>
                                       <button  id="send" type="submit" class="btn btn-success">
                                             <span class="glyphicon glyphicon-floppy-saved"></span> Guardar
                                        </button>
                                    </div>
                                 </div>


                     <div class="ln_solid"></div>
                     <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  id="Table_meta_pi" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th  ><i class="fa fa-thumb-tack"></i> #</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Año </th>
                         <th  ><i class="fa fa-thumb-tack"></i> PIA</th>
                         <th  ><i class="fa fa-thumb-tack"></i> PIM</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Certificación</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Compromiso</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Devengado</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Girado</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Opción</th>
                      </tr>
                    </thead>
                    </table>
                    </center>
                    </div>
                    <center>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                           <button  class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-log-out"></span>
                            Cancelar
                          </button>
                        </div>
                      </div>
                      </center>

                    </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
</div>
<!-- /.Fin Ventana meta presupuestal-->
