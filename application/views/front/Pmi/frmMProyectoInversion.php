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
                                                            <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nueva </button>
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
                                                            <table id="table-proyectoinversion" class="table table-condensed table-striped table-bordered">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">Id</th>
                                                                  <th >Nombre</th>
                                                                  <th >Descripcion</th>
                                                                  <th class="col-sm-1">Mantenimiento</th>
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
          <h4 class="modal-title">PROYECTO</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                             
           
             <form class="form-horizontal " id="form-addBrecha" action="<?php echo  base_url();?>MProyectoInversion/AddProyectoInversion" method="POST" >
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Rubro de ejecucion</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxRubroEjecucion" class="selectpicker" data-live-search="true"  title="Elija Rubro de ejecucion">
                             
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Unidad Ejecutora</span>
                            </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxUnidadEjecutora" class="selectpicker" data-live-search="true"  title="Elija Unidad Ejecutora">
                             
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Naturaleza de inversion</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxNaturalezaInv" class="selectpicker" data-live-search="true"  title="Elija Naturaleza inversion">
                             
                              </select>
                          </div>
                       </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Tipologia de inversion</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="cbxTipologiaInv" class="selectpicker" data-live-search="true"  title="Elija tipologia">
                             
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Estado de ciclo inversion</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija estado inversion">
                             
                              </select>
                          </div>
                       </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Tipo de inversion</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija tipo de inversion">
                             
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Grupo Funcional</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija grupo funcional">
                             
                              </select>
                          </div>
                       </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Nivel de gobierno</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija nivel de gobierno">
                             
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo unico<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Codigo Unico" required="required" type="text">
                          </div>
                      </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre PIP<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre de la pip" required="required" type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Costo PIP<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Costo de la pip" required="required" type="text">
                          </div>
                      </div>
                      <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Devengado<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Devengado" required="required" type="text"  disabled>
                          </div>
                      </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Meta presupuestal</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija meta presupuestal">
                              </select>
                          </div>
                       </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Programacion presupuestal</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select id="" class="selectpicker" data-live-search="true"  title="Elija programacion presupuestal">
                              </select>
                          </div>
                       </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Registro pip<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                          </div>
                      </div>
                        <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha viabilidad pip<span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="date" id="" name="" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                          </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  type="submit" class="btn btn-success"><span class="fa fa-save"></span> Guardar</button>
                          <button  class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"></span> Cancelar</button>
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
<!-- /.fin ventana para registra una nueva brecha-->


<!-- Ventana para modificar una brecha -->
<div class="modal fade" id="VentanaModificarPIP" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Brecha</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                
                <form class="form-horizontal " id="form-ActualizarBrecha" action="<?php echo  base_url();?>index.php/MantenimientoBrecha/UpdateBrecha" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de la brecha<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdBrechaModif" type="hidden" name="txt_IdBrechaModif" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreBrechaU" name="txt_NombreBrechaU" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Descripcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="txtArea_DescBrechaU" name="txtArea_DescBrechaU" required="required" name="textarea" placeholder="Descripcion de la brecha" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- fin ventana para modificar una brecha -->

