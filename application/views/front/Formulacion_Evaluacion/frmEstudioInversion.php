<div class="right_col" role="main">
          <div class="">
<!--Inicio primer panel General-->
      <div class="clearfix"></div>
        <div class="">
          <div class="col-md-12 col-sm-6 col-xs-12">
             <div class="x_panel">
             <!--inicio de pestaña configurtacion-->
                <div class="x_title">
                     <h2><b>ESTUDIO DE INVERSIÓN </b></h2>
                                    
                      <div class="clearfix"></div>
                </div>
              <!--final  de pestaña configurtacion-->
                       <div class="x_content">
                           <div class="" role="tabpanel" data-example-id="togglable-tabs">
                             <!-- Inicio Menus-->
                                <ul id="myTab" class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_EstadoCicloInversion" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span aria-hidden="true"></span>
                                         <strong>Estudio</strong> </a>
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
                                                                <span  aria-hidden="true"></span><strong> Nuevo</strong>
                                                          </button>
                                                          <div class="pull-right tableTools-container-EstudioInversion">
                                                           </div>
                                                                                                                       
                                                      </div>
                                                      <!--inicio de la tabla estado -->
                                                        <!--inicio  de icono de reporte -->
                                                        <div class="clearfix">
                                                           
                                                        </div>
                                                      <!--fin  de icono de reporte -->
                                                      <div class="x_content" >
                                                                <table id="dynamic-table-EstudioInversion" class="table table-striped jambo_table bulk_action" with="100%" >
                                                                    <thead style=" ">
                                                                       <tr>
                                                                       <th style="width: 1%">Código</th>
                                                                       <th style="width: 1%">#</th>
                                                                         <th style="width: 40%"><i class="fa fa-thumb-tack"></i>Nombre</th>
                                                                         <th style="width: 12%"> Función</th>
                                                                         <th style="width: 14%">
                                                                          <i class="fa fa-users"></i>
                                                                         Responsable</th>
                                                                         <th style="width: 12%"> Avance</th>
                                                                         <th style="width: 13%"> Etapa</th>
                                                                         <th style="width: 1%"></th>
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
<div class="modal fade" id="ventanaEstudioInversion" data-backdrop="static" data-keyboard="false" tabindex="-1"role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Registrar Estudio de Inversión</strong> </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
            <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">
                      <!--<div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-8" for="name">Codigo Unico<span class="required">*</span></label>
                          <div class="col-md-6 col-sm-6 col-xs-8">
                            <input id="txtCodigoUnico" name="txtCodigoUnico" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ingrese único " required="required" autocomplete="off" type="text">
                          </div>
                      </div>-->
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
                             
                                      <div class="panel-body">
                                      <form class="form-horizontal " id="form-AddEstudioInversion" action="<?php echo base_url(); ?>Estudio_Inversion/AddEstudioInversion" method="POST">

                                          <div class="col-md-12">
                                          <div class=".col-xs-12 .col-md-10">
                                           <label for="name">Proyecto PMI<span class="required"></span>
                                            </label>
                                                <select   id="listaFuncionC" name="listaFuncionC" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Proyecto...">
                                                </select>
                                          </div>
                                          <div class=".col-xs-7 .col-md-7">
                                           <label for="name">Código Único<span class="required"></span>
                                            </label>
                                                <input id="txtCodigoUnico" name="txtCodigoUnico" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Ingrese único " required="required" autocomplete="off" type="text">
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
                                            <div class="col-md-3">
                                          <br>
                                           <label for="name">.<span class="required"></span>
                                            </label> <br>
                                            <center>
                                                 <button id="btn-GuardarMontoProgramado"  class="btn btn-success">
                               <span  aria-hidden="true"></span><strong>Guardar</strong> </button>
                               <button type="button" class="btn btn-danger" data-dismiss="modal"><strong>Cancelar</strong> </button>

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


<!-- /.ventana para asignar COORDINADO-->
<div class="modal fade" id="ventanaasiganarpersona" role="dialog">
    <div class="modal-dialog ">
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
                                           <label for="name">Responsable<span class="required"></span>
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
    <div class="modal-dialog ">
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
          Documentos de Estudio </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                          <form class="form-horizontal " id="form-AddDocumentosEstudio"   action="<?php echo base_url(); ?>Estudio_Inversion/AddDocumentosEstudio" method="POST" >
                                    <div class="item form-group">
                                              <input id="txt_id_est_invAdd" name="txt_id_est_invAdd" class="form-control col-md-7 col-xs-12"  type="hidden">
                                      </div>
                                       <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Nombre </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <input  id="txt_documentosEstudio" name="txt_documentosEstudio" placeholder="Nombre del Documento"class="form-control col-md-6 col-xs-5"  type="text" >
                                         </div>
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Descripción </label>
                                            <div class="col-md-9 col-sm-9 col-xs-12">
                                                  <input id="txt_descripcionEstudio" name="txt_descripcionEstudio" placeholder="Descripción de documento" class="form-control col-md-12 col-xs-12" type="text">
                                          </div>
                                          </div>

                                          <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-3 col-xs-12">Subir Documento</label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                <input type="file" name="Documento_invserion">
                                                </div>
                                          </div>
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
                                           <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h4>
                                                Entregables
                                              </h4>
                                            </div>
                                                  <table id="table-Documento" class="table">

                                                  </table>
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

<!-- /. INICIO VENTANA VER ETAPAS DE UN ESTUDIO-->
<div class="modal fade" id="ventana_ver_etapas_estudio" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Ver Etapas Estudio</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal "   action="<?php echo base_url(); ?>Estudio_Inversion/get_etapas_estudio" method="POST" >

              <!-- <div class="item form-group">
                        <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txtIdEtapaEstudio_v" name="txtIdEtapaEstudio_v" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="text">
                        </div>
                      </div>
                </div>
              <div class="item form-group">
                                     <div class="col-md-4">

                                           <label for="name">Estado.<span class="required"></span>
                                            </label>
                                                 <select   id="Cbx_EstadoFE" name="Cbx_EstadoFE" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Estado FE...">
                                                </select>
                                    </div>
                                          <div class="col-md-4">

                                           <label for="name">Fecha <span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>" disabled="true">
                                          </div>
                                          <div class="col-md-4">
                                            <label for="name">. <span class="required"></span>
                                            </label><BR>
                                             <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-saved"></span>Agregar
                          </button>
                                          </div>
                      </div>
                      -->
                     <div class="ln_solid"></div>
                     <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  style="width:100%;" id="table_etapas_estudio" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th style="width: 1%"><i class="fa fa-thumb-tack"></i> ESTADO </th>
                         <th style="width: 2%"><i class="fa fa-calendar"></i>
                        </th>
                         <th style="width: 10%" ><i class="fa fa-thumb-tack"></i> Etapa</th>
                         <th style="width: 50%"><i class="fa fa-thumb-tack"></i> Observación
                        </th>
                         <th style="width: 10%"><i class="fa fa-calendar"></i> Fecha Inicio
                        </th>
                        <th style="width: 10%"><i class="fa fa-calendar"></i> Fecha Final
                        </th>
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
<!-- /.FIN VENTANA VER ETAPAS DE UN ESTYUDIO-->
<?php
  $sessionTempo=$this->session->flashdata('correcto');

  if($sessionTempo){ ?>
    <script>
      swal('','<?=$sessionTempo?>', "success");
    </script>
<?php } ?>
<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });
  $(function()
  {
    $('#form-AddEstudioInversion').formValidation(
    {
      framework: 'bootstrap',
      excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
      live: 'enabled',
      message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
      trigger: null,
      fields:
      {
        txtnombres:
        {
          validators:
          {
            notEmpty:
            {
              message: '<b style="color: red;">El campo "Descripción" es requerido.</b>'
            }
          }
        }
      }
    });
  });
</script>