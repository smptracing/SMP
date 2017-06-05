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
                                        <li role="presentation"  class="active"><a  href="#tab_brecha" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>Proyecto Inversion</a>
                                        </li>
                                         <!--<li role="presentation" class=""><a  href="#tab_programacion" id="profile-tab" role="tab" data-toggle="tab" aria-expanded="true"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Programación</a>
                                        </li>-->
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                           <!-- /panel de brechas desde el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button id="btn-NuevoProyectoI" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraPIP">  <span class="fa fa-plus-circle"></span> Nuevo </button>
                                                            <button id="btn-Importar" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaImportar">  <span class="fa fa-plus-circle"></span> Importar Excel </button>
                                                            
                                                          <div class="x_title">
                                                
            
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                              <div style="background:#f5f7fa">             
                                                                    <input type="hidden" id="Aniocartera" value="<?php echo $this->session->userdata('AnioC'); ?>">
                                                                    <center>
                                                                    CARTERAS:Cartera <?php echo $this->session->userdata('AnioC'); ?> <select id="cbCartera" name="cbCartera"  class="selectpicker" data-live-search="true" >
                                                                    </select>
                                                                    <button id="MostrarCarteraAnios">Mostar Cartera</button>
                                                                  </center>
                                                              </div>
                                                        <table id="table-ProyectoInversionProgramado" class="table table-striped table-bordered table-hover table-responsive display  compact " ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">Id</th>
                                                                  <th class="col-sm-1"><center>Código Único</center></th>
                                                                  <th class="col-sm-1"><center>Ciclo de Inversión</center></th>                                                                  
                                                                  <th class="col-sm-1"><center>Inversión</center></th>
                                                                  <th class="col-sm-1"><center>Prioridad</center></th>   
                                                                  <th class="col-sm-1"><center>Brecha</center></th>                                                               
                                                                  <th class="col-sm-1"><center><div id="programacion1">2018</center></div></th>
                                                                  <th class="col-sm-1"><center><div id="programacion2">2019</center></div></th>
                                                                  <th class="col-sm-1"><center><div id="programacion3">2020</center></div></th>

                                                                  <th class="col-sm-1"><center><div id="programacion1">2018</center></div></th>
                                                                  <th class="col-sm-1"><center><div id="programacion2">2019</center></div></th>
                                                                  <th class="col-sm-1"><center><div id="programacion3">2020</center></div></th>

                                                                  <th class="col-sm-1"><center> Tipo de Inversión</center></th>
                                                                  <th class="col-sm-1"><center>Tipología</center></th>
                                                                  <th class="col-sm-1"><center>Naturaleza</center></th>
                                                                  <th class="col-sm-1"><center>Nivel de Gobierno</center></th>
                                                                  <th class="col-sm-1"><center>U.Ejecutora</center></th>
                                                                  <th class="col-sm-1"><center>Provincias</center></th>

                                                                  <th class="col-sm-1"><center>Ubicación</center></th>
                                                                  <th class="col-sm-1">Función</th>
                                                                  <th class="col-sm-1">División Funcional</th>
                                                                  <th class="col-sm-1">Grupo Funcional</th>
                                                                  <th class="col-sm-1">Costo Inversión</th>
                                                                  <th class="col-sm-1">PIM Año Actual</th>
                                                                  <th class="col-sm-1">Servicio</th>
                                                                  <th class="col-sm-1">Brecha Asociada</th>
                                                                  <th class="col-sm-1">Programa pres</th>
                                                                  <th class="col-sm-1">Fecha Registro</th>
                                                                  <th class="col-sm-1">Fecha Viabilidad</th>
                                                                 
                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>
                                                              
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de brechas desde el row -->
                                                <form action="<?php echo base_url('index.php/ReporteProgramacion/action');?>" method="POST" >

                                                  <button  type="submit" class="btn btn-primary">  <span class="fa fa-file-text"></span> Exportar exel</button>
                                                                  
                                                </form>

                                        </div>
                                           <!-- / fin panel de brechas desde el row -->
                                          
                                          <div role="tabpanel" class="tab-pane fade" id="tab_programacion" aria-labelledby="profile-tab">
                           
                                              <div class="x_content">
                                                            <table id="table-modificarprogramacion" class="ui celled table nowrap" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th class="col-sm-1">ID CARTERA</th>
                                                                  <th class="col-sm-1">AÑO APERTURA CARTERA</th>
                                                                  <th class="col-sm-1">ID BRECHA</th>
                                                                  <th class="col-sm-1">BRECHA</th>
                                                                  <th class="col-sm-1">ID PROYECTO</th>                                                                 
                                                                  <th class="col-sm-1">NOMBRE DE INVERSIÓN</th>
                                                                  <th class="col-sm-1">MONTO PROGRAMADO</th>
                                                                  <th class="col-sm-1">AÑO PROGRAMADO</th>
                                                                  <th class="col-sm-1">PRIORIDAD</th>
                                                                  <th class="col-sm-1">MONTO OPERACIÓN Y MANTENIMIENTO</th>
                                                                  <th class="col-sm-1"></th>
                                                                </tr>
                                                              </thead>      
                                                            </table>
                                                          </div>
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
        
<!-- modal -->


<!-- /.ventana para registra un nuevo PIP -->     
<div class="modal fade" id="VentanaRegistraPIP" role="dialog" data-backdrop="static">
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
                            <li role="presentation" class="active"><a href="#first" aria-controls="first" role="tab" data-toggle="tab">PROYECTO DE INVERSIÓN</a></li>
                            <li role="presentation"><a href="#second" aria-controls="second" role="tab" data-toggle="tab">PROGRAMACIÓN</a></li>
                            <!-- Nav tabs <li role="presentation"><a href="#third" aria-controls="third" role="tab" data-toggle="tab">OTROS</a></li>-->
                          </ul>
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active fade in" id="first">
                                   <form class="form-horizontal " id="form-addProyectoInversion" action="<?php echo  base_url();?>MProyectoInversion/AddProyectoInversion" method="POST" >
                                   <br>

                                    <div class="row">
                                      <div class="col-md-6">
                                       <div class="col-md-7 col-sm-6 col-xs-12">
                                            <label for="name">Codigo Único<span class="required">*</span>
                                            </label>
                                                  <input id="txtCodigoUnico" name="txtCodigoUnico"  class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Codigo Unico" required="required" type="text">
                                             </div>
                                      </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label  for="name">Tipo inversion<span class="required">*</span>
                                        </label>
                                            <select id="cbxTipoInv" name="cbxTipoInv" class="selectpicker" data-live-search="true"  title="Elija tipo de inversion">
                                            </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <label for="textbox"><span class="required">Ciclo de Inversion</span>
                                        </label>
                                             <select id="cbxEstadoCicloInv" name="cbxEstadoCicloInv" class="selectpicker" data-live-search="true"  title="Elija el estado ciclo de inversion">
                                               </select>
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <label  for="textbox"><span class="required">Tipologia de Inversion</span>
                                                </label>
                                               <select id="cbxTipologiaInv" name="cbxTipologiaInv" class="selectpicker" data-live-search="true"  title="Elija tipologia">
                                               </select>
                                            </div>
                                      </div>
                              </div>
                           
                                    <hr>
                                 <div class="row">

                                      <div class="col-md-12">
                              
                                        <label class="control-label col-md-1 col-sm-12 col-xs-12" for="name">Inversion<span class="required"></span>
                                        </label>
                                         <div class="col-md-12 col-sm-12 col-xs-12">
                                          <input id="txtNombrePip" name="txtNombrePip"  height="20´px" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre Inversion" required="required" type="text">
                                            <!--<textarea  id="txtNombrePip" name="txtNombrePip" class="form-control" data-validate-length-range="6" data-validate-words="2" placeholder="Nombre Inversion"></textarea>-->
                                        </div>
                                      </div>
                                     
                                 </div>
                              <hr>
                               <div class="row">
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label  for="name">Naturaleza<span class="required">*</span>
                                        </label>
                                            <select id="cbxNatI" name="cbxNatI" class="selectpicker" data-live-search="true"  title="Elija Naturaleza">
                                            </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <label  for="textbox"><span class="required">Nivel de Gobierno</span>
                                        </label>
                                            <select id="cbxNivelGob" name="cbxNivelGob" class="selectpicker" data-live-search="true"  title="Elija nivel de gobierno">
                                            </select>
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <label  for="textbox"><span class="required">Unidad Ejecutora</span>
                                                </label>
                                                <select id="cbxUnidadEjecutora"  name="cbxUnidadEjecutora" class="selectpicker" data-live-search="true"  title="Elija Unidad Ejecutora">
                                                </select>
                                            </div>
                                      </div>
                              </div>
 
                               <div class="row">

                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="name">Departamento<span class="required">*</span>
                                        </label>
                                             <select id="departamento" name="departamento" class="selectpicker" data-live-search="true"  title="Seleccione un Departamento">

                                              </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <label for="textbox"><span class="required">Provincia</span>
                                        </label>
                                              <select  id="provincia"  name="provincia" class="selectpicker" multiple title="Seleccione una o mas provincias" data-live-search="true">
                                              </select>
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <label  for="textbox"><span class="required">Distrito</span>
                                              </label>
                                              <select name="distrito" id="distrito"  class="selectpicker"  multiple title="Seleccione una o distritos">
                                              </select>
                                              <input type="hidden" id="distritosM" name="distritosM" multiple title="Seleccione Provincia" data-live-search="true">
                                            </div>
                                      </div>
                              </div>

                               <div class="row">
                               
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label for="name" style="text-align:left">Funcion<span class="required">*</span>
                                        </label>
                                             <select id="cbxFuncion" name="cbxFuncion" class="selectpicker" data-live-search="true"  title="Elija una funcion">
                                             </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <label  for="textbox"><span class="required">Division</span>
                                        </label>
                                               <select id="cbxDivFunc" name="cbxDivFunc" class="selectpicker" data-live-search="true"  title="Elija division funcional">
                                            </select>
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                          <label for="textbox"><span class="required">Grupo</span>
                                        </label>
                                                <select id="cbxGrupoFunc" name="cbxGrupoFunc" class="selectpicker" data-live-search="true"  title="Elija grupo funcional">
                                            </select>
                                            </div>
                                      </div>
                              </div>
                     
                                  <hr>
                                   <div class="row">
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-11 col-sm-6 col-xs-12">
                                            <label  for="name">Costo de Inversion<span class="required">*</span>
                                        </label>
                                            <input id="txtCostoPip" name="txtCostoPip" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Costo de inversion" required="required" type="text">
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-11 col-sm-6 col-xs-12">
                                             <label for="textbox"><span class="required">Devengado</span>
                                             </label>
                                             <input id="txtDevengado" name="txtDevengado" class="form-control col-md-7 col-xs-7" data-validate-length-range="6" data-validate-words="2" placeholder="Devengado" required="required" type="text">
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <label  for="textbox"><span class="required">PIM</span>
                                                </label>
                                                 <select id="cbxMetaPresupuestal" name="cbxMetaPresupuestal" class="selectpicker" data-live-search="true"  title="Elija PIM">  
                                                 </select>
                                            </div>
                                      </div>
                              </div>
 
                                  <div class="row">
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label  for="name">Fuente Finan.<span class="required">*</span>
                                            </label>
                                            <select id="cbxFuenteFinanc" name="cbxFuenteFinanc" class="selectpicker" data-live-search="true"  title="Elija fuente de financiamiento">
                                            </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                             <label for="textbox"><span class="required">Rubro Ejecucion</span>
                                             </label>
                                              <select id="cbxRubro" name="cbxRubro" class="selectpicker" data-live-search="true"  title="Elija Rubro">
                                              </select>
                                            </div>
                                      </div>
                                       <div class="col-md-4">
                         
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                               <label  for="textbox"><span class="required">Modalidad</span>
                                                </label>
                                                 <select id="cbxModalidadEjec" name="cbxModalidadEjec" class="selectpicker" data-live-search="true"  title="Elija Modalidad de Ejecucion">
                                                </select>
                                            </div>
                                      </div>
                              </div>
                               <div class="row">
                                      <div class="col-md-4">
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label  for="name">Programa<span class="required">*</span>
                                            </label>
                                              <select id="cbxProgramaPres" name="cbxProgramaPres" class="selectpicker" data-live-search="true"  title="Elija Programa presupuestal">
                                            </select>
                                         </div>
                                      </div>
                                      <div class="col-md-4">
                                      
                                        
                                      </div>
                                       <div class="col-md-4">
                         
                                      </div>
                              </div>

                            <!--
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
                                        
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Direccion Ubigeo<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="txtDireccionUbigeo" name="txtDireccionUbigeo" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Direccion Ubigeo" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Latitud<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="txtLatitud" name="txtLatitud" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Latitud" required="required" type="text">
                                          </div>
                                        </div>
                                        <div class="item form-group">
                                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Longitud<span class="required">*</span>
                                          </label>
                                          <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="txtLongitud" name="txtLongitud" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Longitud" required="required" type="text">
                                          </div>
                                        </div>
                              
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha estado ciclo<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="date" id="dateFechaEstCicInv" name="dateFechaEstCicInv" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                            </div>
                                        </div>
                                      
                                         <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Fuente Financiamiento<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="date" id="dateFechaFuenteFinanc" name="dateFechaFuenteFinanc" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                            </div>
                                        </div>
                                         
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha Modalidad Ejecucion<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                              <input type="date" id="dateFechaModalidadEjec" name="dateFechaModalidadEjec" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" required="required" type="text">
                                            </div>
                                        </div>   -->
                                    <div class="ln_solid"></div>
                                     
                                  </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="second">

                                <form class="form-horizontal " id="form-addProgramacion" action="<?php echo  base_url();?>Programacion/AddProgramacion" method="POST" >
                                 
                                     <div class="item form-group">
                                         <!-- <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Cartera</span>
                                          </label>-->
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <input type="hidden" id="txtCartera" name="txtCartera" class="form-control col-md-5 col-xs-5" >
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="textidCartera" name="textidCartera" type="hidden" class="form-control col-md-7 col-xs-5" >
                                        </div>
         
                                        </div>
                                     </div>
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Brecha</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxBrechaP" name="cbxBrechaP" class="selectpicker" data-live-search="true"  title="Elija brecha">
                                            </select>
                                        </div>
                                     </div>
                                      <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">Servicio Publico Asociado</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="cbxServicioP" name="cbxServicioP" class="selectpicker" data-live-search="true"  title="Elija Servicio Publico">
                                            </select>
                                        </div>
                                     </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Proyecto de Inversion<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="txtProyectoInversUlt" name="txtProyectoInversUlt" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Proyecto de inversion" required="required" type="text" disabled>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <input id="textidpip" name="textidpip" type="hidden" class="form-control col-md-7 col-xs-5" >
                                        </div>
                                    </div>                               
                                     <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Monto programado<span class="required">*</span>
                                        </label>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                          <button id="btn-ProgramarMontos" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaMontoProgramado"> >> Agregar</button>
                                        </div>
                                    </div>
         
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prioridad programado<span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                          <input id="txtPrioridadProg" name="txtPrioridadProg" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Prioridad Programada" required="required" type="text">
                                        </div>
                                    </div>
                                    <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Monto de operacion y mantenimiento<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <button id="btn-ProgramarOperacMante" type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaMontoOperacionMant"> >> Agregar</button>
                                        </div>
                                    </div>
                                   <!-- <div class="item form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tipo<span class="required">*</span>
                                        </label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                          <input id="txtTipo" name="txtTipo" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="Tipo" required="required" type="text">
                                        </div>
                                    </div>-->
                                    <table id="table-Programacion" class="table table-striped table-bordered table-hover table-responsive" ellspacing="0" width="100%">
                                                              
                                   </table>   
                                     <span></span><div class="col-md-6 col-md-offset-3">
                                        <button  type="submit" class="btn btn-success" >
                                          <span class="glyphicon glyphicon-floppy-saved " aria-hidden="true"></span>
                                           FINALIZAR</button>
                                     </div> 

                                  </form>
                                    
                                                                      
                            </div>
                         
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
<!-- /.fin ventana para registra una PIP-->


<!--PROGRAMAR MONTOS PROGRAMADOS Y MONTOS DE OPERACION Y MANTENIMIENTO -->
    <!--ventana montos programados -->
    <div class="modal fade" id="VentanaMontoProgramado" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">MONTOS PROGRAMADOS</h4>
            </div>
            <div class="modal-body">
             <div class="row">
                        <div class="col-xs-12">
                                            <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal form-label-left " id="formMontoProgramado" name="formMontoProgramado">
                           <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">AÑO PROGRAMADO </span>
                                </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="AnioProgramado"  name="AnioProgramado">
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">MONTO<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="txt_MontoProgramado" name="txt_MontoProgramado"  class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Monto Programado" required="required" type="text" >
                              </div>
                            </div>

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="btn-GuardarMontoProgramado"  class="btn btn-success">
                               <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Guardar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

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
    <!-- fin ventana montos programados -->

    <!-- ventana para programar montos de operacion y mantenimiento -->
    <div class="modal fade" id="VentanaMontoOperacionMant" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">MONTOS DE OPERACION Y MANTENIMIENTO</h4>
            </div>
            <div class="modal-body">
             <div class="row">
                        <div class="col-xs-12">
                                            <!-- PAGE CONTENT BEGINS -->
                        <form class="form-horizontal form-label-left " id="formMontoProgramado" name="formMontoProgramado" >
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">AÑO PROGRAMADO </span>
                                </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="text" id="AnioProgramadoOpeMant"  name="AnioProgramadoOpeMant" >
                              </div>
                            </div>
                            <div class="item form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">MONTO<span class="required">*</span>
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="txt_MontoOperacionMante" name="txt_MontoOperacionMante" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  placeholder="Monto de operacion/mantenimiento" required="required" type="text" >
                               </div>
                            </div>

                         

                          <div class="ln_solid"></div>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                               <button id="btn-GuardarMontoOperaMant"  class="btn btn-success">
                               <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>Guardar</button>
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

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
     <!-- ventana para programar montos de operacion y mantenimiento -->

<!-- /.FIN PARA PROGRAMAR MONTOS PROGRAMADOS Y MONTOS DE OPERACION Y MANTENIMIENTO -->
<!-- PARA LISTAR LA PROGRAMACION EN HORIZONTAL CADA UNA -->
<div id="VerDetallehorizontal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content" id="ProgramacionHorizontal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detalle de programación</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="table-responsive">    

              <table id="DetalleProgramacionHori" style="overflow-y:scroll;" class="table table-bordered table-hover table-striped table-inverse table-sm" ellspacing="0" width="100%">
                
              </table>
              
        </div>
      </div>    
    

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerra</button>
      </div>
    </div>

  </div>
</div>
<!-- FIN PARA LISTAR LA PROGRAMACION EN HORIZONTAL CADA UNA -->

<!-- /.Inicio Modificar  proyecto programado-->

<div class="modal fade" id="ModificarProgramacion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <CENTER><H4><strong>ACTUALIZAR DE PROGRAMACIÓN</strong></H4></CENTER>
        </div>
            <div class="modal-body">
                 <div class="row">
                   <div class="col-xs-12">
                   <!-- PAGE CONTENT BEGINS -->
                              <form class="form-horizontal" id="form-ActualizarProgramacion"  method="POST">
                                           
                                          <div class="item form-group">
                                                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textbox"><span class="required">CARTERA</span>
                                                  </label>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input id="txtCarteraM" name="txtCarteraM" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="text" disabled>
                                                  </div>
                                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                                      <input id="texIdeProyecto" name="texIdeProyecto" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="hidden">
                                                  </div>
                                           </div>
                                          <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">MONTO PROGRAMADO<span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="txtMontoProgramado" name="txtMontoProgramado" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2" placeholder="MONTO PROGRAMADO" required="required" type="text">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">AÑO PROGRAMACIÓN<span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="txtañoProgramado" name="txtañoProgramado" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">PRIORIDAD PROGRAMACIÓN<span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="txtPrioridad" name="txtPrioridad" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">MONTO OPERACION Y MANTENIMIENTO <span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="txtOperacioMantenimiento" name="txtOperacioMantenimiento" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                                              </div>
                                          </div>
                                          <div class="item form-group">
                                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">TIPO PROGRAMACIÓN <span class="required">*</span>
                                              </label>
                                              <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input id="txtTipoProgramacion" name="txtTipoProgramacion" class="form-control col-md-7 col-xs-5" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                                              </div>
                                          </div>
                                              <div class="form-group">
                                                  <div class="col-md-6 col-md-offset-3">
                                                        <button  type="submit" class="btn btn-success">
                                                          <span class="glyphicon glyphicon-floppy-disk"></span>
                                                          Actualizar
                                                        </button>
                                                        <button data-dismiss="modal" class="btn btn-danger">
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
 </div>
<!-- /.Fin Modificar proyecto prgramado-->
<!--.ventana importar-->
<div class="modal fade" id="VentanaImportar" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>
          Importar Cartera</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
            <form class="form-horizontal" id="form-Importar"   action="<?php echo base_url(); ?>Importar/addImportar" method="POST">

                      <div class="item form-group">
                         <center><input type="file" id="archivo" name="archivo" required></center>
                      </div>
                           <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button name="cmdbuscar"   type="submit" class="btn btn-success" >
                            <span class="glyphicon glyphicon-floppy-saved" aria-hidden="true">
                            </span>
                             Importar
                          </button>
-
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
<!-- /.fin importar-->


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

                <table id="table-detalleProyectoInversion" class="table table-bordered table-hover table-sm" width="100%" border="0"  cellpadding="10" >
                  
                </table>
   
                <table id="table-detalleProgramacion" class="table table-bordered table-hover table-sm" width="100%" >
                  
                </table>
          </div>
        </div>
        <div class="modal-footer">
          <form action="<?php echo base_url('index.php/ReporteProgramacion/PdfProyectoProgramado');?>" method="POST" >
            IDE PROYECTO<input type="text" id="CodigoProgramacion" name="CodigoProgramacion"> 
          <button type="submit" class="btn btn-success">  <span class="fa fa-print"></span>IMPRIMIR</button>
          <button  data-dismiss="modal" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cancelar</button>  
          </form>                
        </div>
      </div>
    </div>
  </div>
<!-- /.VER DETALLE DE PROYECTO->
<!- /.VER EN VERTICAR DETALLE DE CADA PROYECTO-->   


 
