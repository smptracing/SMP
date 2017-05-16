<div class="right_col" role="main">
          <div class="">
            <div class="page-title">

            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i>PROYECTO DE INVERSION<small>VENTANA PRINCIPAL</small></h2>
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
                                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a  href="#tab_brecha" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Proyecto Inversion</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                           <!-- /panel de brechas desde el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
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
                                                            <table id="table-ProyectoInversion" class="table table-striped table-bordered table-hover table-responsive" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th class="col-sm-1">PROYECTO DE INVERSIÓN</th>
                                                                  <th class="col-sm-1">CÓDIGO ÚNICO</th>
                                                                  <th class="col-sm-1">COSTO </th>
                                                                  <th class="col-sm-1">DEVENGADO </th>
                                                                  <th class="col-sm-1">FECHA REGISTRO</th>
                                                                  <th class="col-sm-1">FECHA VIABILIDAD</th>

                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de brechas desde el row -->
                                        </div>
                                           <!-- / fin panel de brechas desde el row -->
                                          
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Indicador" aria-labelledby="profile-tab">
                           

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
        
<!-- /.ventana para registra un nuevo PIP -->     
<div class="modal fade" id="VentanaRegistraPIP" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">PROYECTO DE INVERSION</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                      
                             <div class="wizard" role="tabpanel">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab"><span class="step_no">PROYECTO DE INVERSIÓN</span></a></li>
                            <li role="presentation"><a href="#second" aria-controls="second" role="tab" data-toggle="tab">PROGRAMACIÓN</a></li>
                            <li role="presentation"><a href="#third" aria-controls="third" role="tab" data-toggle="tab">OTROS</a></li>
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="first">
                                   <form class="form-horizontal " id="form-addProyectoInversion" action="<?php echo  base_url();?>MProyectoInversion/AddProyectoInversion" method="POST" >
                                 
                                     <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Unidad Ejecutora</span>
                                          </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxUnidadEjecutora"  name="cbxUnidadEjecutora" class="selectpicker" data-live-search="true"  title="Elija Unidad Ejecutora">
                                            
                                            </select>
                                        </div>
                                     </div>
                                       <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Tipologia de inversion</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxNatI" name="cbxNatI" class="selectpicker" data-live-search="true"  title="Elija tipologia">
                                                 <option value="1">Naturalez</option>
                                                 <option value="2">NATURALEZ2</option>
                                            </select>
                                        </div>
                                     </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Tipologia de inversion</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxTipologiaInv" name="cbxTipologiaInv" class="selectpicker" data-live-search="true"  title="Elija tipologia">
                                                 <option value="1">Tipologia 1</option>
                                                 <option value="2">Tipologia 2</option>
                                            </select>
                                        </div>
                                     </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Tipo de inversion</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxTipoInv" name="cbxTipoInv" class="selectpicker" data-live-search="true"  title="Elija tipo de inversion">
                                                 <option value="1">Tipo de inversion 1</option>
                                                 <option value="2">Tipo de inversion 2</option>
                                            </select>
                                    </div>
                                     </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Grupo Funcional</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxGrupoFunc" name="cbxGrupoFunc" class="selectpicker" data-live-search="true"  title="Elija grupo funcional">
                                                 <option value="1">Grupo Funcional 1</option>
                                                 <option value="2">Grupo Funcional 2</option>
                                            </select>
                                        </div>
                                     </div>
                                         <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Nivel de gobierno</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxNivelGob" name="cbxNivelGob" class="selectpicker" data-live-search="true"  title="Elija nivel de gobierno">
                                                 <option value="1">Gobierno 1</option>
                                                 <option value="2">Gobierno 2</option>
                                            </select>
                                        </div>
                                     </div>
                                        <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Meta Presupuestal</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxMetaPresupuestal" name="cbxMetaPresupuestal" class="selectpicker" data-live-search="true"  title="Elija Meta Presupuestal">
                                                 <option value="1">Meta 1</option>
                                                 <option value="2">Meta 2</option>
                                            </select>
                                        </div>
                                     </div>
                                        <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Programa presupuestal</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxProgramaPres" name="cbxProgramaPres" class="selectpicker" data-live-search="true"  title="Elija Programa presupuestal">
                                                 <option value="1">Programa 1</option>
                                                 <option value="2">Programa 2</option>
                                            </select>
                                        </div>
                                     </div>
                                  
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo unico<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtCodigoUnico" name="txtCodigoUnico" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Codigo Unico" required="required" type="text">
                                        </div>
                                    </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre PIP<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtNombrePip" name="txtNombrePip" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de la pip" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Costo PIP<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtCostoPip" name="txtCostoPip" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Costo de la pip" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Devengado<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtDevengado" name="txtDevengado" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Devengado" required="required" type="text">
                                        </div>
                                    </div>
                            
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Registro pip<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="date" id="dateFechaInPip" name="dateFechaInPip" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                        </div>
                                    </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha viabilidad pip<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="date" id="dateFechaViabilidad" name="dateFechaViabilidad" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                        </div>
                                     </div>

                                    <div class="ln_solid"></div>
                                     <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success" >
                                          <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                           Guardar</button>
                                     </div>
                                  </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="second">

                                <form class="form-horizontal " id="form-addProgramacion" action="<?php echo  base_url();?>MProyectoInversion/AddProyectoInversion" method="POST" >
                                 
                                     <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Cartera</span>
                                          </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxCartera"  name="cbxCartera" class="selectpicker" data-live-search="true"  title="Elija Cartera de Inversion">
                                            
                                            </select>
                                        </div>
                                     </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Brecha</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxBrecha" name="cbxBrecha" class="selectpicker" data-live-search="true"  title="Elija brecha">
                                            </select>
                                        </div>
                                     </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proyecto de Inversion<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtProyectoInvers" name="txtProyectoInvers" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Proyecto de inversion" required="required" type="text" disabled>
                                        </div>
                                    </div>                               
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Monto programado<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtMontoProg" name="txtMontoProg" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Monto Programado" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Año programado<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input type="date" id="dateAñoProg" name="dateAñoProg" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                        </div>
                                    </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prioridad programado<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtPrioridadProg" name="txtPrioridadProg" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Prioridad Programada" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Monto de operacion y mantenimiento<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtMontoOpeMan" name="txtMontoOpeMan" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Monto de Operacion y Mantenimiento" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtTipo" name="txtTipo" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Tipo" required="required" type="text">
                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                     <div class="col-md-6 col-md-offset-3">
                                        <button id="send" type="submit" class="btn btn-success" >
                                          <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
                                           Guardar</button>
                                     </div>
                                  </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="third">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</div>
                          </div>
                        </div> 
           
                    </div>
           </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva brecha-->
<!-- /.VER PROYECTO DETALLADO-->     
<div class="modal fade" id="VerDetalleProyectoInversion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <CENTER><H4><strong>DETALLE DE PROYECTO DE INVERSIÓN</strong></H4></CENTER>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="table-responsive">          
                <table id="table-detalleProyectoInversion" class="table table-bordered table-hover table-sm" width="100%" >
                  
                </table>
          </div>
        </div>
        <div class="modal-footer">
        <button id="btn-NuevoProyectoI" type="button" class="btn btn-success">  <span class="fa fa-print"></span> IMPRIMIR</button>
        <button  data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.VER DETALLE DE PROYECTO->