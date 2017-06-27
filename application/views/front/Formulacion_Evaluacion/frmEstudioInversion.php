<div class="right_col" role="main">
          <div class="">
<!--Inicio primer panel General-->
      <div class="clearfix"></div>
        <div class="">
          <div class="col-md-12 col-sm-6 col-xs-12">
             <div class="x_panel">
             <!--inicio de pestaña configurtacion-->
                <div class="x_title">
                     <h2><i class="fa fa-bars"></i> Estudio de Inversión<small></small></h2>
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
                                         Estudio</a>
                                         </li>
                               </ul>
                              <!-- Fin Menus-->
                               <div id="myTabContent" class="tab-content">
                                             <!-- /Inicio Contenido -->
                                           <div role="tabpanel" class="tab-pane fade active in" id="tab_EstadoCicloInversion" aria-labelledby="home-tab">
                                        <!-- /Inicio tabla estado   -->
                                           <div class="row">
                                              <div class="col-md-12 col-sm-12 col-xs-12">
                                              <div class="x_panel">

                                                    <div class="x_title">
                                                           <!-- <h2>Listado de  <small>.</small></h2>-->
                                                          <button type="button" id="btn_nuevoEstInv" class="btn btn-primary" data-toggle="modal" data-target="#ventanaEstudioInversion" >
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
                                                      <!--inicio de la tabla estado -->
                                                        <!--inicio  de icono de reporte -->
                                                        <div class="clearfix">
                                                           <div class="pull-right tableTools-container-EstudioInversion">
                                                           </div>
                                                        </div>
                                                      <!--fin  de icono de reporte -->
                                                      <div class="x_content">
                                                                <table id="dynamic-table-EstudioInversion" class="table table-striped  table-hover" with="100%" >
                                                                    <thead>
                                                                       <tr>
                                                                       <th style="width: 1%">#</th>

                                                                         <th style="width: 40%"><i class="fa fa-thumb-tack"></i> Est. Inv. </th>
                                                                         <th style="width: 14%">
                                                                          <i class="fa fa-users"></i>
                                                                         Reponsable</th>
                                                                         <th style="width: 12%"> Progreso</th>
                                                                         <th style="width: 13%"> Estado</th>
                                                                         <th></th>
                                                                      </tr>
                                                                   </thead>
                                                                </table>
                                                      </div>
                                                      <!--fin de la tabla estado -->
                                           </div>
                                              </div>
                                           </div>
                                        <!-- / fin tabla estado del  desde el row -->
                                        </div>
                                        <!-- /fin del Contenido del estado  -->
                               </div>
                      </div>
             </div>
           </div>
          </div>
      <div class="clearfix"></div>
  <!--fin primer panel General-->
       <hr>
          </div>
          <div class="clearfix"></div>
        </div>
     </div>
<!--- popul para registar estudio de inversion -->
<div class="modal fade" id="ventanaEstudioInversion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Estudio Inversión</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
            <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">
                                      <div class="col-md-2">
                                       <div class=".col-xs-12 .col-md-2">
                                            <label for="name">Codigo Único<span class="required"></span>
                                            </label>
                                                  <input id="txtCodigoUnico" name="txtCodigoUnico"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2" placeholder="Codigo único" required="required" type="text">
                                                  <br>
                                        </div>
                                      </div>
                                    <br>
                          <div class="row ">
                            <div class="col-md-2">
                                       <div class=".col-xs-12 .col-md-2">
                                        </div>
                            </div>
                            <br>
                           <div class="col-md-12">
                                <div class=".col-xs-12 .col-md-12">
                               <div class="panel panel-default">
                               <div class="panel-heading">Datos del PMI</div>
                                      <div class="panel-body">
                                      <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">

                                          <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Proyecto PMI<span class="required"></span>
                                            </label>
                                                <select   id="listaFuncionC" name="listaFuncionC" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">
                                                </select>
                                          </div>
                                          </div>
                                      </div>
                                </div>
                              </div>
                            </div>
                          </div>
                                                    <div class="row ">
                            <div class="col-md-2">
                                       <div class=".col-xs-12 .col-md-2">
                                        </div>
                            </div>
                           <div class="col-md-12">
                                <div class=".col-xs-12 .col-md-12">
                               <div class="panel panel-default">
                              <!-- <div class="panel-heading">Título del panel</div>-->
                                      <div class="panel-body">
                                          <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Nombre de Estudio de Inversión<span class="required"></span>
                                            </label>
                                                  <input id="txtnombres" name="txtnombres"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de Estudio de Inversión" required="required" type="text">
                                          </div>
                                          </div>
                                         <div class="col-md-6">
                                          <br>
                                           <label for="name">Tipo de Estudio<span class="required"></span>
                                            </label>
                                                 <select   id="listaTipoInversion" name="listaTipoInversion" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Tipo de Estudio...">
                                                </select>

                                          </div>
                                          <div class="col-md-6">
                                          <br>
                                           <label for="name">Nivel Estudio<span class="required"></span>
                                            </label>
                                                 <select   id="listaNivelEstudio" name="listaNivelEstudio" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Nivel Estudio...">
                                                </select>
                                            </div>

                                          <div class="col-md-3">
                                          <div class=".col-xs-6 .col-md-12">
                                          <br>
                                           <label for="name">Monto de Inversión<span class="required"></span>
                                            </label>
                                                  <input id="txtMontoInversion" name="txtMontoInversion"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2"  required="required" type="number" step='0.01'  placeholder="0.00">
                                          </div>
                                          </div>

                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Costo del Estudio<span class="required"></span>
                                            </label>
                                                  <input id="txtcostoestudio" name="txtcostoestudio"  class="form-control col-md-1 col-xs-1" data-validate-length-range="6" data-validate-words="2"  required="required" type="number" step='0.01'  placeholder="0.00">
                                          </div>
                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Unidad Formuladora<span class="required"></span>
                                            </label>
                                                  <select   id="lista_unid_form" name="lista_unid_form" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UF...">
                                                </select>
                                          </div>
                                          <div class="col-md-3">
                                          <br>
                                           <label for="name">Unidad Ejecutora<span class="required"></span>
                                            </label>
                                                   <select   id="lista_unid_ejec" name="lista_unid_ejec" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar UE...">
                                                </select>
                                          </div>

                                           <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                          <br>
                                           <label for="name">Descripción del Estudio de Inversión<span class="required"></span>
                                            </label>
                                              <textarea class="form-control" rows="3" name="txadescripcion" id="txadescripcion"></textarea>
                                          </div>
                                          </div>

                                          <div class="col-md-6">
                                          <br>
                                           <label for="name">Reponsable<span class="required"></span>
                                            </label>
                                                 <select   id="listaResponsable" name="listaResponsable" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Responsable...">
                                                </select>
                                          </div>
                                           <div class="col-md-3">
                                          <br>
                                           <label for="name">Fecha de Asignación<span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaAsig" name="dateFechaAsig" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>

                                            <div class="col-md-3">
                                          <br>
                                           <label for="name">.<span class="required"></span>
                                            </label> <br>
                                            <center>
                                                 <button id="btn-GuardarMontoProgramado"  class="btn btn-success">
                               <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Guardar</button>
                               <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>

                               </center>
                                          </div>
                                       </div>
                                </div>
                              </div>
                            </div>
                          </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- fin popul para crear un nuevo estudio de inversión -->







<!-- /.ventana para asignar responsable a estudio de inversión-->
<div class="modal fade" id="ventanaasiganarpersona" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Asignar Responsable </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-AddResponsableEstudio"   action="<?php echo base_url(); ?>Estudio_Inversion/AddResponsableEstudio" method="POST" >

                       <div class="item form-group">

    <div class="item form-group">
                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="id_est_inv" name="id_est_inv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>
                </div>
                                       <div class="col-md-8">
                                          <br>
                                           <label for="name">Reponsable<span class="required"></span>
                                            </label>
                                                 <select   id="listaResponsables" name="listaResponsables" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Responsable...">
                                                </select>
                                          </div>
                                           <div class="col-md-4">
                                          <br>
                                           <label for="name">Fecha de Asignación<span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaAsig" name="dateFechaAsig" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                      </div>
                   <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                           <button  class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
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
<!-- /.fin de ventana para asignar repsonsable a edtudio de inversión-->
<!-- /.ventana para asignar etapa de estudio -->
<div class="modal fade" id="ventanaEtapaEstudio" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Etapa de Estudio </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form-AddEtapaEstudio"   action="<?php echo base_url(); ?>Estudio_Inversion/AddEtapaEstudio" method="POST" >
              <div class="item form-group">
                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_id_est_inv" name="txt_id_est_inv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>
                </div>
                      <div class="item form-group">
                                     <div class="col-md-4">

                                           <label for="name">Etapas FE<span class="required"></span>
                                            </label>
                                                 <select   id="listaretapasFE_M" name="listaretapasFE_M" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Etapas FE...">
                                                </select>
                                    </div>
                                    </div>
                            <div class="item form-group">
                                      <div class="col-md-4">

                                           <label for="name">Fecha Inicio<span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                                         <div class="col-md-4">
                                           <label for="name">Fecha Final<span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniF" name="dateFechaIniF" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                                          <div class="col-md-4">
                                           <label for="name">Avance Físico<span class="required"></span>
                                            </label>
                                                  <input id="txtAvanceFisico" name="txtAvanceFisico"  class="form-control col-md-12 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Avance Físico" required="required" type="text" value="0.0"disabled>
                                          </div>
                                        <!--     <div class="col-md-6">
                                          <br>
                                           <label for="name">Fecha Estado<span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniCart" name="dateFechaIniCart" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                          </div>-->
                                         <div class="col-md-12">
                                         <br>
                                           <label for="name">Recomendaciones<span class="required"></span>
                                            </label>
                                                  <textarea class="form-control" rows="3" name="txadescripcion" id="txadescripcion"></textarea>
                                          </div>
                      </div>
                     <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                           <button  class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
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
<!-- /.fin de  ventana para asignar etapa de estudio-->

<!-- /.ventana para la asiganacion de documentos en los entregables -->
<div class="modal fade" id="VentanaDocumentosEstudio" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Documentos de Estudio sf</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                          <form class="form-horizontal " id="form-AddEtapaEstudio"   action="<?php echo base_url(); ?>Estudio_Inversion/AddEtapaEstudio" method="POST" >
                                    <div class="item form-group">
                                              <div class="item form-group">
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input id="txt_id_est_inv" name="txt_id_est_inv" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
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
                                           <button  class="btn btn-danger" data-dismiss="modal">
                                             <span class="glyphicon glyphicon-remove"></span>
                                            Cancelar
                                          </button>
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
<!-- /.ventana para la asiganacion de documentos en los entregables -->