<style>
  #table-ProyectoInversionProgramado > tbody > tr > td
  {
    vertical-align: middle;
  }
  #table_proyectos_inversion>tbody>tr>td:nth-child(0n+4)
  {
    text-align: right;
  }
  #Table_OperacionMantenimiento>tbody>tr>td:nth-child(0n+1)
  {
    text-align: right;
  }
  #Table_OperacionMantenimiento>tbody>tr>td:nth-child(0n+3)
  {
    text-align: right;
  }
  .btn-group .btn, .btn-group-vertical .btn {
    margin-bottom: 0;
    margin-right: 0;
    width: 160px !important;
  }
  .btn {
    border-radius: 0px !important;
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
                                    <h2>BANCO DE INVERSIONES</h2>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">
                                    <button id="btn_NuevoPip" name="btn_NuevoPip" style="margin-top: 5px;margin-bottom: 15px;" type="button" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
                                    <div class="table-responsive">
                                        <table id="table_proyectos_inversion" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">#</th>
                                                    <th style="width: 1%">#</th>
                                                    <th style="width: 8%"><i class="fa fa-thumb-tack"></i> Cod. </th>
                                                    <th style="width: 36%"><i class="fa fa-bookmark-o"></i> Nombre</th>
                                                    <th style="width: 12%; text-align: right;"><i class="fa fa-money"></i> Costo</th>
                                                    <th style="width: 12%"> Estado Ciclo</th>
                                                    <th style="width: 12%"> Fecha Registro</th>
                                                    <th style="width: 16%">Opción</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                  </div>
                                </div>
              </div>


          </div>
          <div class="clearfix"></div>
        </div>
     </div>

<!-- modal -->

<!-- /. INICIO VENTANA REGISTRAR PROYECTOS DE INVERSIÓN-->
<div class="modal fade" id="VentanaRegistraPIP" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Registro PIP </h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <form class="form-horizontal " id="form-AddProyectosInversion"   action="<?php echo base_url(); ?>bancoproyectos/AddProyectos" method="POST" onSubmit="return false;" >
                        <div class="row">
                            <div class="col-md-4 form-group" >
                                <label for="name">Estado.<span class="required"></span></label>
                                <select   id="cbxEstCicInv_" name="cbxEstCicInv_" class="form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Estado..." >
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label id="textcodigoIdMensaje" style="color: #0431B4; margin-top: 15px;">El Sistema Generara su Código<span class="required"></span></label>
                                <div class="col-md-9 col-sm-6 col-xs-12 form-group" id="divCodigoIdea">
                                    <label for="name">Codigo Único (Codigo SIAF)<span class="required">*</span></label>
                                    <input id="txtCodigoUnico" name="txtCodigoUnico"  class="form-control col-md-7 col-xs-5" placeholder="Codigo Unico" type="text" maxlength="10">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label class="control-label col-md-1 col-sm-12 col-xs-12" for="name">Inversión<span class="required"></span></label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input id="txtNombrePip" name="txtNombrePip" class="form-control col-md-12 col-xs-5" placeholder="Nombre Inversion" type="text">
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4 form-group">
                        <div class="col-md-11 col-sm-11 col-xs-12">
                        <label  for="textbox"><span class="required">Fecha Registro</span>
                        </label>
                        <input type="date" id="fecha_registro" name="fecha_registro" class="form-control col-md-7 col-xs-5" type="text">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div style="display:true;" class="ct_fechaViabilidad col-md-11 col-sm-11 col-xs-12">
                        <label  for="textbox"><span >Fecha Viabilidad</span>
                        </label>
                        <input type="date" id="fecha_viabilidad" name="fecha_viabilidad" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" type="text">
                        </div>
                        </div>
                        </div>

                        <hr>
                        <div class="row">
                        <div class="col-md-4 form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label  for="name">Naturaleza.<span class="required">*</span>
                        </label>
                        <select id="cbxNatI" name="cbxNatI" class="selectpicker"  title="Elija Naturaleza">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4 form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label  for="textbox"><span class="required">Nivel de Gobierno</span>
                        </label>
                        <select id="cbxNivelGob" name="cbxNivelGob" class="selectpicker"  title="Elija nivel de gobierno">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4 form-group">

                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <label  for="textbox"><span class="required">Unidad Ejecutora</span>
                        </label>
                        <select id="cbxUnidadEjecutora"  name="cbxUnidadEjecutora" class="selectpicker"   title="Elija Unidad Ejecutora">
                        </select>
                        </div>
                        </div>
                        </div>



                        <div class="row">
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label for="name" style="text-align:left">Funcion<span class="required">*</span></label>
                        <select id="cbxFuncion" name="cbxFuncion" class="selectpicker" title="Elija función"></select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label  for="textbox"><span class="required">Division</span></label>
                        <select id="cbxDivFunc" name="cbxDivFunc" class="selectpicker" title="Elija división" disabled="disabled"></select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label for="textbox"><span class="required">Grupo</span></label>
                        <select id="cbxGrupoFunc" name="cbxGrupoFunc" class="selectpicker"  title="Elija grupo" disabled="disabled"></select>
                        </div>
                        </div>
                        </div>

                        <hr>
                        <div class="row">
                        <div class="col-md-4">

                        <div class="col-md-11 col-sm-6 col-xs-12  form-group">
                        <label  for="name">Costo de Inversión<span class="required">*</span>
                        </label>
                        <input type="text" id="txtCostoPip" name="txtCostoPip" class="form-control col-md-7 col-xs-5"  placeholder="0.00" autocomplete="off" maxlength="12">
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="col-md-11 col-sm-6 col-xs-12  form-group">
                        <label for="textbox"><span class="required">Número de beneficiarios</span>
                        </label>
                        <input id="txt_beneficiarios" name="txt_beneficiarios" class="form-control col-md-7 col-xs-7" data-validate-length-range="20" data-validate-words="2" placeholder="Número de beneficiarios"  type="number">
                        </div>
                        </div>
                        <div class="col-md-4">

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label  for="name">Fuente Finan.<span class="required">*</span>
                        </label>
                        <select id="cbxFuenteFinanc" name="cbxFuenteFinanc" class="selectpicker" title="Elija fuente de financiamiento">
                        </select>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-md-4">

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label for="textbox"><span class="required">Rubro Ejecucion</span>
                        </label>
                        <select id="cbxRubro" name="cbxRubro" class="selectpicker"  title="Elija Rubro">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4">

                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label  for="textbox"><span class="required">Modalidad</span>
                        </label>
                         <select id="cbxModalidadEjec" name="cbxModalidadEjec" class="selectpicker"   title="Elija Modalidad de Ejecucion">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label  for="textbox"><span class="required">Tipologia de Inversion</span></label>
                        <select id="cbxTipologiaInv" name="cbxTipologiaInv" class="selectpicker" title="Elija Tipología de Inversión"></select>
                        </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                        <label  for="name">Programa<span class="required">*</span>
                        </label>
                        <select id="cbxProgramaPres" name="cbxProgramaPres" class="selectpicker"  title="Elija Programa presupuestal">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="col-md-6 col-sm-6 col-xs-12  form-group">
                        <label  for="name">Unidad Formuladora<span class="required">*</span>
                        </label>
                        <select id="lista_unid_form" name="lista_unid_form" class="selectpicker"  title="Elija Unidad Formuladora">
                        </select>
                        </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label  for="name">Estado<span class="required"></span>
                                </label>
                                <select id="cbx_estado_pi" name="cbx_estado_pi" class="selectpicker">
                                  <option value='1'>Activo</option>
                                  <option value='0'>Inactivo</option>
                                </select>
                            </div>
                        </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <center>
                        <button type='button' id="sendSave"  class="btn btn-success">
                        <span class="glyphicon glyphicon-floppy-disk"></span>
                        Guardar...
                        </button>
                        <button  class="btn btn-danger"  type="button" data-dismiss="modal">

                        <span class="glyphicon glyphicon-remove"></span>
                        Cerrar
                        </button>
                        </center>
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
<!-- /.FIN VENTANA REGISTRAR PROYECTOS DE INVERSION-->


<!-- /.ventana Asignar  ubicacion geográfica-->
<div class="modal fade" id="venta_ubicacion_geografica" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Ubicación Geográfica </h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_AddUbigeo" action="<?php echo base_url(); ?>bancoproyectos/Get_ubigeo_pip" method="POST">
                    <input id="txt_id_pip" name="txt_id_pip" required="required" type="hidden">
                            <div class="col-xs-12 col-md-12">
                                <label for="name">Proyecto:</label>
                            </div>
                            <textarea class="form-control" rows="2" readonly="readonly" id="nombreProyecto" name="nombreProyecto"></textarea>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="selectpicker form-control" disabled="disabled">
                                        <option value="Apurímac">Apurímac</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select  id="cbx_provincia" name="cbx_provincia" class="selectpicker form-control" title="Elija provincia(s)">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="cbx_distrito" id="cbx_distrito" data-live-search="true"  class="selectpicker form-control" title="Elija distrito"></select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <input id="txt_latitud" name="txt_latitud"  class="form-control" placeholder="Latitud" required="required" type="text">
                                </div>
                                <div class="col-md-4">
                                    <input id="txt_longitud" name="txt_longitud"  class="form-control" placeholder="Longitud" required="required" type="text">
                                </div>
                                <div class="col-md-4">
                                    <input type="file" class="form-control" name="ImgUbicacion">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class=".col-xs-12 .col-md-12">
                                    <label for="name">Mapa:</label>
                                </div>
                                <div class="modal-body">
                                    <div id="gmap"></div>
                                </div>
                                <br>
                                <button id="send" type="submit" class="btn btn-success">
                                    <span class="glyphicon glyphicon-floppy-saved"></span>Agregar
                                </button>
                            </div>
                        <div class="x_panel" style="border: 1px solid #EEEEEE;">
                            <table id="TableUbigeoProyecto_x" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%" >
                                <thead >
                                    <tr>
                                        <th style="width: 20%" >Provincia</th>
                                        <th style="width: 20%" >Distrito</th>
                                        <th style="width: 20%" >Latitud</th>
                                        <th style="width: 20%" >Longitud</th>
                                        <th style="width: 10%" >Imagen</th>
                                        <th style="width: 50%" ></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <center>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-3">
                                    <button  class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-log-out"></span>
                                    Cerrar
                                    </button>
                                </div>
                            </div>
                        </center>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!-- /.fin de  ventana ubicacion geografica-->


<!-- /.ventana registar nuevo estado ciclo-->
<div class="modal fade" id="ventana_ver_estado_ciclo" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Estado Ciclo PI </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form_AddEstadoCiclo"   action="<?php echo base_url(); ?>bancoproyectos/listar_estados" method="POST" >
                        <input id="txt_id_pip_Ciclopi" name="txt_id_pip_Ciclopi" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">

                               <div class="item form-group">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class=".col-xs-12 .col-md-12">
                                            <label for="name">Proyecto:</label>
                                        </div>
                                        <textarea class="form-control" rows="2" readonly="readonly" id="nombreProyectoEstado" name="nombreProyectoEstado"></textarea>
                                        <br>
                                    </div>

                                     <div class="col-md-4">

                                           <label for="name">Estado.<span class="required"></span>
                                            </label>
                                                 <select   id="Cbx_EstadoCiclo" name="Cbx_EstadoCiclo" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Estado...">
                                                </select>
                                    </div>
                                          <div class="col-md-4">

                                           <label for="name">Fecha <span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                                          <div class="col-md-4">
                                             <label for="name">. <span class="required"></span>
                                             </label><BR>
                                             <button id="send" type="submit" class="btn btn-success">
                                             <span class="glyphicon glyphicon-floppy-saved"></span>Agregar
                                             </button>
                                          </div>
                      </div>

                     <div class="ln_solid"></div>
                     <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  id="Table_Estado_Ciclo" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th  ><i class="fa fa-thumb-tack"></i> Estado Ciclo</th>
                         <th  ><i class="fa fa-thumb-tack"></i> Fecha</th>
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
                            Cerrar
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
<!-- /.fin de  ventana gestionar ciclo de inversión-->
<!-- /.ventana registar Rubro-->
<div class="modal fade" id="venta_registar_rubro" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Rubro del Proyecto de Inversión</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal " id="form_AddRubro"   action="<?php echo base_url(); ?>bancoproyectos/listar_rubro" method="POST">
                            <input id="txt_id_pip_RubroPI" name="txt_id_pip_RubroPI" required="required" type="hidden">
                            <div class="item form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class=".col-xs-12 .col-md-12">
                                        <label for="name">Proyecto:</label>
                                    </div>
                                    <textarea class="form-control" rows="2" readonly="readonly" id="nombreProyectoRubro" name="nombreProyectoRubro"></textarea>
                                    <br>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <label for="Cbx_RubroPI" class="control-label">Rubro *</label>
                                    <div class="form-group">
                                        <select id="Cbx_RubroPI" name="Cbx_RubroPI" class="selectpicker form-control" data-live-search="true"  title="Buscar Rubro...">
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <label for="name">Fecha <span class="required"></span>
                                    </label>
                                    <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5"  required="required" type="text" value="<?php echo date("Y-m-d"); ?>" >
                                </div>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <label for="name">. <span class="required"></span>
                                    </label><BR>
                                    <button id="send" type="submit" class="btn btn-success">
                                        <span class="glyphicon glyphicon-floppy-saved"></span>Agregar
                                    </button>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="x_panel" style="background-color: #EEEEEE;">
                                <table  id="Table_RubroPI" class="table   table-hover" >
                                    <thead>
                                        <tr>
                                            <th>Rubro</th>
                                            <th>Fecha</th>
                                            <th>Opción</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <center>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button  class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-log-out"></span> Cerrar
                                        </button>
                                    </div>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- /.fin  ventana registar Rubro-->
<!-- /.Ventana Registar MOdalidad de Ejecucion -->
<div class="modal fade" id="ventanaModalidadEjecucion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Modalidad de Ejecución </h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
              <form class="form-horizontal " id="form_AddModalidadEjec"   action="<?php echo base_url(); ?>bancoproyectos/listar_rubro" method="POST" >
                        <input id="txt_id_pip_ModalidadEjec" name="txt_id_pip_ModalidadEjec" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">

                               <div class="item form-group">
                                    <div class="col-md-12 col-xs-12 col-sm-12">
                                        <div class=".col-xs-12 .col-md-12">
                                            <label for="name">Proyecto:</label>
                                        </div>
                                        <textarea class="form-control" rows="2" readonly="readonly" id="nombreProyectoModalidad" name="nombreProyectoMmodalidad"></textarea>
                                        <br>
                                    </div>
                                     <div class="col-md-4">

                                           <label for="name">Modalidad.<span class="required"></span>
                                            </label>
                                                 <select   id="Cbx_ModalidadEjec" name="Cbx_ModalidadEjec" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true"  title="Buscar Modalidad...">
                                                </select>
                                    </div>
                                          <div class="col-md-4">
                                           <label for="name">Fecha <span class="required"></span>
                                            </label>
                                                  <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>">
                                          </div>
                                          <div class="col-md-4">
                                             <label for="name">. <span class="required"></span>
                                             </label><BR>
                                             <button id="send" type="submit" class="btn btn-success">
                                             <span class="glyphicon glyphicon-floppy-saved"></span>Agregar
                                             </button>
                                          </div>
                      </div>

                     <div class="ln_solid"></div>
                     <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  id="Table_ModalidadPI" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th  >Modalidad Ejecución</th>
                         <th  ></i> Fecha</th>
                         <th  ></i> Opciones</th>
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
                            Cerrar
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
<!-- /.fin  Ventana Registar MOdalidad de Ejecucion-->
<!-- /.Ventana Registar operacion y mantenimiento-->
<div class="modal fade" id="ventana_ver_operacion_mantenimeinto" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Operación y Mantenimiento</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal" id="form_AddOperacionMantenimiento" >
                    <input id="txt_id_pip_OperMant" name="txt_id_pip_OperMant" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                    <div class="item form-group" id="validarAddOperacionMantenimiento">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class=".col-xs-12 .col-md-12">
                                <label for="name">Proyecto:</label>
                            </div>
                            <textarea class="form-control" rows="2" readonly="readonly" class="notValidate" id="nombreProyectoOperacion" name="nombreProyectoOperacion"></textarea><br>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Monto Operación</label>
                                <input  class="form-control" autocomplete="off" id="txt_monto_operacion" name="txt_monto_operacion" type="text">
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <label>Responsable Operación</label>
                                <input type="text" class="form-control" autocomplete="off" id="txt_responsable_operacion" name="txt_responsable_operacion" >
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <label for="name">Fecha <span class="required"></span></label>
                                <input type="date" id="dateFechaIniC" name="dateFechaIniC" class="form-control col-md-6 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text" value="<?php echo date("Y-m-d"); ?>" class="notValidate" disabled="true">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <label>Monto Mantenimiento</label>
                                <input class="form-control" id="txt_monto_mantenimiento" name="txt_monto_mantenimiento" autocomplete="off" type="text">
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <label>Responsable Mantenimiento</label>
                                <input type="text" class="form-control" id="txt_responsable_mantenimiento" name="txt_responsable_mantenimiento" autocomplete="off">
                            </div>
                            <div class="col-md-5 col-sm-6 col-xs-12">
                                <label>Acta de Compromiso:</label>
                                <input type="file" class="form-control" id="fileActaCompromiso" name="fileActaCompromiso" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="item form-group">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <label>.</label><br>
                            <button  id="send" type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-saved"></span> Agregar
                            </button>
                        </div>
                    </div>

                    <div class="ln_solid"></div>
                    <div class="x_panel" style="background-color: #EEEEEE;">
                    <center>
                    <table  id="Table_OperacionMantenimiento" class="table   table-hover" >
                    <thead >
                       <tr>
                         <th></i> #</th>
                         <th style="text-align: right;"> Monto Operación</th>
                         <th> Responsable Operación</th>
                         <th style="text-align: right;"> Monto Mantenimiento</th>
                         <th> Responsable Mantenimiento</th>
                         <th> Acta de Compromiso</th>
                         <th> Fecha Registro</th>
                         <th> Opción</th>
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
                            Cerrar
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
<!-- /.Fin Ventana Registar operacion y mantenimiento-->


<!-- /. INICIO VENTANA EDITAR PROYECTOS DE INVERSIÓN-->
<div class="modal fade" id="venta_editar_proyecto" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Editar proyectos de inversión </h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal " id="form_EditarProyectosInversion"   action="" method="POST" >
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_id_Pip_m" name="txt_id_Pip_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                    </div>
                    <div id="validarEditarPip">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="col-md-7 col-sm-6 col-xs-12">
                                    <label for="name">Codigo Único<span class="required">*</span></label>
                                    <input id="txtCodigoUnico_m" name="txtCodigoUnico_m"  class="form-control col-md-7 col-xs-5" placeholder="Codigo Unico" required="required" type="text" maxlength="10">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label  for="name">Tipo inversión<span class="required">*</span></label>
                                        <select id="cbx_m" name="cbx_m" class="selectpicker" >
                                            <option selected value="1">PIP</option>
                                        </select>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">Ciclo Inversión</span></label>
                                        <select id="cbxEstCicInv_m" name="cbxEstCicInv_m" class="selectpicker"  >
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">

                                    <label class="control-label col-md-1 col-sm-12 col-xs-12" for="name">Inversion<span class="required"></span></label>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <input id="txtNombrePip_m" name="txtNombrePip_m" class="form-control col-md-12 col-xs-5" placeholder="Nombre Inversion" required="required" type="text">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="name">Naturaleza<span class="required">*</span></label>
                                        <select id="cbxNatI_m" name="cbxNatI_m" class="selectpicker"  >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">Nivel de Gobierno</span></label>
                                        <select id="cbxNivelGob_m" name="cbxNivelGob_m" class="selectpicker" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">Unidad Ejecutora</span></label>
                                        <select id="cbxUnidadEjecutora_m"  name="cbxUnidadEjecutora_m" class="selectpicker">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="name" style="text-align:left">Función<span class="required">*</span></label>
                                        <select id="cbxFuncion_m" name="cbxFuncion_m" class="selectpicker" ></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">División</span></label>
                                        <select id="cbxDivFunc_inicio" name="cbxDivFunc_inicio" class="selectpicker"></select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    <label for="textbox"><span class="required">Grupo</span></label>
                                    <select id="cbxGrupoFunc_m" name="cbxGrupoFunc_m" class="selectpicker"></select>
                                </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-11 col-sm-6 col-xs-12">
                                        <label  for="name">Costo de Inversion<span class="required">*</span></label>
                                        <input id="txtCostoPip_m" name="txtCostoPip_m" class="form-control col-md-7 col-xs-5" placeholder="Costo de inversion" required="required" type="text" maxlength="12">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-11 col-sm-6 col-xs-12">
                                        <label for="textbox"><span class="required">Número de beneficiarios</span></label>
                                        <input id="txt_beneficiarios_m" name="txt_beneficiarios_m" class="form-control col-md-7 col-xs-7" placeholder="Número de beneficiarios" required="required" type="number">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="name">Fuente Finan.<span class="required">*</span></label>
                                            <select id="cbxFuenteFinanciamiento_m" name="cbxFuenteFinanciamiento_m" class="selectpicker" >
                                            </select>
                                         </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label for="textbox"><span class="required">Rubro Ejecucion</span></label>
                                        <select id="cbxRubroEjecucion_m" name="cbxRubroEjecucion_m" class="selectpicker" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">Modalidad</span>
                                        </label>
                                        <select id="cbxModalidadEjecucion_m" name="cbxModalidadEjecucion_m" class="selectpicker"  >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="textbox"><span class="required">Tipologia de Inversion</span></label>
                                        <select id="cbxTipologiaInversion_m" name="cbxTipologiaInversion_m" class="selectpicker"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="name">Programa<span class="required">*</span></label>
                                        <select id="cbxProgramaPresupuestal_m" name="cbxProgramaPresupuestal_m" class="selectpicker"  >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="name">Unidad Formuladora<span class="required">*</span>
                                        </label>
                                        <select id="lista_unid_form_m" name="lista_unid_form_m" class="selectpicker" >
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <label  for="name">Estado<span class="required">*</span>
                                        </label>
                                        <select id="cbx_estado_pi_m" name="cbx_estado_pi_m" class="selectpicker">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <center>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                           <button  class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cerrar
                          </button>
                          </center>
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
<!-- /.FIN VENTANA EDITAR PROYECTOS DE INVERSION-->
<script src="<?php echo base_url(); ?>assets/js/PMI/bancoProyectos.js"></script>

<script type="text/javascript">

    function initialize() {
        var myLatlng = new google.maps.LatLng(-13.637,-72.878);
        var myOptions = {
            zoom:7,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
            map = new google.maps.Map(document.getElementById("gmap"), myOptions);
            // marker refers to a global variable
            marker = new google.maps.Marker({
                position: myLatlng,
                map: map
            });

            google.maps.event.addListener(map, "click", function(event) {
                // get lat/lon of click
                var clickLat = event.latLng.lat();
                var clickLon = event.latLng.lng();

                // show in input box
                document.getElementById("txt_latitud").value = clickLat.toFixed(5);
                document.getElementById("txt_longitud").value = clickLon.toFixed(5);

                  var marker = new google.maps.Marker({
                        position: new google.maps.LatLng(clickLat,clickLon),
                        map: map
                     });
            });
    }
    window.onload = function () { initialize() };

    //document.getElementById("txt_latitud").innerHTML = location.lat();
    //document.getElementById("txt_longitud").innerHTML = location.lng();
</script>
<style>
   div#gmap {
          width: 100%;
          height: 300px;
          /*border:double;*/
   }
</style>

<script type="text/javascript">

   $('#textcodigoIdMensaje').hide();

   $("#cbxEstCicInv_").change(function(){//para cargar los distritos

    if($("#cbxEstCicInv_").val()=='1' || $("#cbxEstCicInv_").val()=='2' )
    {

        $('#textcodigoIdMensaje').show();
        $('#divCodigoIdea').hide();
        if($("#cbxEstCicInv_").val()=='1')
        {
             $codigoGenerado='ID-000001';
            $("#txtCodigoUnico").val($codigoGenerado);

        }else {
            $codigoGenerado='FE-000001';
            $("#txtCodigoUnico").val($codigoGenerado);
        }

    }else {

      $('#textcodigoIdMensaje').hide();

      $("#txtCodigoUnico").val("");
      $('#divCodigoIdea').show();
    }


  });
$('.modal').on('hidden.bs.modal', function(){
    $(this).find('form')[0].reset();
});
</script>
