
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mantenimiento Usuarios </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i>USUARIOS<small>VENTANA PRINCIPAL</small></h2>
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
                                        <li role="presentation" class="active"><a class="fa fa-book" href="#tab_brecha" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Usuario</a>
                                        </li>
                                        <li role="presentation" class=""><a class="fa fa-book" href="#tab_Indicador" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Permisos</a>
                                        </li>
                                        <li role="presentation" class=""><a class="fa fa-book" href="#tab_BrechaIndicador" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Menus</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                           <!-- /panel de brechas desde el row -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraUsuario"> <span class="fa fa-file-o"></span> Nuevo Usuario</button>
                                                          <div class="x_title">
                                                            <h2>Listado de  <small>Usuarios</small></h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-UnidadEjecutora" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                              <thead>
                                                                 <tr>
                                                                  <th>ID </th>
                                                                  <th>NOMBRE USUARIO </th>
                                                                  <th>APELLIDO USUARIO</th>
                                                                  <th>TIPO USUARIO</th>
                                                                  <th>CORREO</th>
                                                                  <th>Permisos</th>
                                                                 </tr>  
                                                              </thead>
                                                           <tbody>
                                                               <tr>
                                                                <th scope="row">1</th>
                                                                <td>Carlos</td>
                                                                <td>roman</td>
                                                                <td>Evaluador</td>
                                                                <td>carlos@gmail.com</td>
                                                                <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaAsignarPermiso">Asignar Permisos</button><!-- /.boton de la ventana Asignar Permisos -->
                                                                </td>
                                                             </tr>
                                                            </tbody>
                                                          </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de brechas desde el row -->
                                        </div>
                                           <!-- / fin panel de brechas desde el row -->
                                          
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Indicador" aria-labelledby="profile-tab">
                                            <!-- / panel de indicador desde el row -->
                                             <div role="tabpanel" class="tab-pane fade active in" id="tab_brecha" aria-labelledby="home-tab">
                                             <!-- /tabla de brechas desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraIndicador"><span class="fa fa-file-o"></span> Nuevo Permisos</button>
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
                                                            
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de indicador desde el row -->
                                        </div>
                                           <!-- / fin panel de indicador  -->
                                            
                                            
                                            
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab_BrechaIndicador" aria-labelledby="profile-tab">
                                          <p>Menu </p>
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
        
<div class="modal fade" id="VentanaRegistraUsuario" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Usuario</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" role="form">
                  

                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Id Usuario</label>

                    <div class="col-sm-2">
                      <input type="text" id="form-field-1-1" placeholder="Id Usuario" class="form-control" />
                    </div>
                  </div>
                                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Nombre del Usuario</label>

                    <div class="col-sm-6">
                      <input type="text" id="form-field-1-1" placeholder="Nombre del Usuario" class="form-control" />
                    </div>
                  </div>
                                     <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Apellido del Usuario</label>

                    <div class="col-sm-6">
                      <input type="text" id="form-field-1-1" placeholder="Apellido del Usuario" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tipo de Usuario </label>

                    <div class="col-sm-6">
                      <select  class="form-control input-sm">
                       <option> Formulador </option>  
                       <option> Evaluador </option> 
                       <option> Encargado de la PMI</option>  
                       <option> Ejecutor</option>
                       <option> Resisdente</option>
                                            <option> Registrador</option>
                       </select>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Correo </label>

                    <div class="col-sm-6">
                      <input type="text" id="form-field-1-1" placeholder="Correo electronico" class="form-control" />
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Contraseña</label>

                    <div class="col-sm-3">
                      <input type="text" id="form-field-1-1" placeholder="Contraseña" class="form-control" />
                    </div>
                  </div>
                                    <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estado </label>

                    <div class="col-sm-6">
                      <select  class="form-control input-sm">
                       <option> Activo </option>  
                       <option> Inactivo </option>  
                       </select>                    
                    </div>
                  </div>
                                    <div class="form-group">
                                        <center><input type="reset" class="btn btn-default" value="Limpiar Formulario">
                                        <button type="submit" class="btn btn-primary">Registrar Usuario </button></center>
                                    </div>
                  <div class="space-4"></div>
                    
                   </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra un usuario-->
      
<!-- /.ventana para asignar permisos a un usuario --> 

<div class="modal fade" id="VentanaAsignarPermiso" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Asignar Permisos</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                    <div class="col-xs-12">
                                        <!-- PAGE CONTENT BEGINS -->
                                <form class="form-horizontal" role="form">
                                    
                                    
                                    <table class="table table-bordered table-condensed table-hover  table-striped table-condensed">
                                         <thead>
                                            <tr><th colspan="3"><p class="text-center">PERMISOS POR USUARIO</p></th></tr>

                                            <tr>
                                                <th>#</th>
                                                <th>MENU</th>
                                                <th>PERMISOS</th>          
                                            </tr>  
                                        </thead>
                                            
                                        <body>
                                        
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1">PMI</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Criterios</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Evaluacion de pip por criterios</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Cartera Pip</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> FORMULACION</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Formulacion del Pip</label>
                                                    </div>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1"> EVALUACION</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Evaluacion del Pip</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1">EJECUCION</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Unidad Ejecutora</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Ejecutor</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Ejecucion</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Correlativo Meta</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1">LIQUIDACION</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Liquidacion</label>
                                                    </div> 
                                                </td>
                                            </tr>
                                        
                                             <tr>
                                                <td>4</td>
                                                <td>
                                                    <label class="col-sm-2 control-label no-padding-left" for="form-field-1-1">ESTADISTICAS</label>
                                                </td>
                                                <td>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Estadisticas del PMI</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Estadisticas de Formulacion</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Estadisticas de Ejecucion</label>
                                                    </div>
                                                    <div class="checkbox">
                                                            <label><input type="checkbox" value="">Estadisticas de Liquidacion</label>
                                                    </div>
                                                </td>
                                            </tr>
                                        </body>
                                    </table>
                                   
                                   
                                    <div class="form-group">
                                        <center><input type="reset" class="btn btn-default" value="Limpiar Formulario">
                                        <button type="submit" class="btn btn-primary">guardar permisos </button></center>
                                    </div>
                  <div class="space-4"></div>
                    
                   </form>
                        </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.FIN ventana para asignar permisos a un usuario --> 