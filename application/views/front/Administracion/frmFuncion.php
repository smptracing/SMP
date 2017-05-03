<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mantenimiento Funcion</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Memu </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                      </li>
                                      <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                          <li><a href="#">Settings 1</a>
                                          </li>
                                          <li><a href="#">Settings 2</a>
                                          </li>
                                        </ul>
                                      </li>
                                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                                      </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_Sector" class="fa fa-book" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Funcion</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_Entidad" role="tab" class="fa fa-book" id="profile-tab" data-toggle="tab" aria-expanded="false">Division Funcional</a>
                                        </li>
                                         <li role="presentation" class=""><a href="#tab_ServicioPubAsoc" class="fa fa-book" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Grupo Funcional</a>
                                        </li>
                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                             <!-- /Contenido del funcion -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
                                             <!-- /tabla de funcion desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraFuncion" >
                                                                      <span class="glyphicon glyphicon-book"></span>

                                                                Nueva Función
                                                            </button>
                                                          <div class="x_title">
                                                            <h2>Listado de Funciones</h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-Funcion" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>Id Funcion</th>
                                                                  <th>Codigo del Función</th>
                                                                  <th>Nombre de Función </th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de funcion desde el row -->
                                        </div>
                                        <!-- /fin del funcion del sector -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Entidad" aria-labelledby="profile-tab">
                                          
                                            <!-- /tabla de division funcional desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn_Nuevadivision" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraDivisionF" >
                                                                <span class="glyphicon glyphicon-book"></span>
                                                                Nueva Division Funcional</button>
                                                          <div class="x_title">
                                                            <h2>Listado de Divisiones Funcionales </h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-DivisionF" class="table table-striped table-bordered" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>Id</th>
                                                                  <th>FUNCION</th>
                                                                  <th>CODIGO DIVISION FUNCIONAL</th>
                                                                  <th>NOBRE DE DIVISION FUNCIONAL</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>

                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla division funcional desde el row -->                                    
                                        </div>
                                          <!-- / fin panel grupo  funcional desde el row -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_ServicioPubAsoc" aria-labelledby="profile-tab">
                                             <!-- /tabla de grupo funcional desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn_nuevoGrupoFuncional" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraGrupoF" >
                                                            <span class="glyphicon glyphicon-book"></span>
                                                                Nuevo Grupo funcional</button>
                                                          <div class="x_title">
                                                            <h2>Listado de Grupo Funcional</h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-listarGrupoFuncional" class="table table-striped table-bordered " ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>Id</th>
                                                                  <th>Codigo GL</th>
                                                                  <th>Nombre GL </th>
                                                                  <th>Codigo DF</th>
                                                                  <th>Nombre DF</th>
                                                                  <th>Sector</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              </tbody>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla grupo funcional asociados el row --> 
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
        
<!-- /.ventana para registra funcion -->			
<div class="modal fade" id="VentanaRegistraFuncion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Funcion</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                <form class="form-horizontal " id="form-addFuncion" action="<?php echo  base_url();?>MFuncion/GetFuncion" method="POST">

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo Funcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_codigofuncion" name="txt_codigofuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo Funcion" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Funcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_nombrefuncion" name="txt_nombrefuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Funcion" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva funcion-->


<!-- /.ventana para registra una nuevo dision funcional-->			
<div class="modal fade" id="VentanaRegistraDivisionF" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nueva Division Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                <form class="form-horizontal form-label-left"  id="form-AddDivisionFuncion" action="<?php echo  base_url();?>MFuncion/AddDivisionFucion" method="POST">

                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo Division funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_CodigoDfuncional" name="txt_CodigoDfuncional" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo Division funcional" required="required" type="text">
                            </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Division funcional<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_Nombre_DFuncional" name="txt_Nombre_DFuncional" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Division funcional" required="required" type="text">
                            </div>
                      </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Funcion1</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaFuncionC" name="listaFuncionC" class="selectpicker" data-live-search="true"  title="Buscar Funcion...">
                                 </select>
                            </div>
                    </div>       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva DIVISION  FUNCIONAL-->

<!-- /.ventana para registra grupo funcional-->			
<div class="modal fade" id="VentanaRegistraGrupoF" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo grupo funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO GRUPO FUNCIONAL-->
                <form class="form-horizontal form-label-left" id="form-AddGrupoFuncional" action="<?php echo  base_url();?>MFuncion/AddGrupoFuncional" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo  Grupo funcional <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_codigoGfuncion" name="txt_codigoGfuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo  Grupo funcional" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Grupo Funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_nombreGfuncion" name="txt_nombreGfuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Grupo Funcional " required="required" type="text">
                            </div>
                        </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Division Funcional</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecDivisionFF" name="SelecDivisionFF" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar Division funcional...">

                                 </select>
                            </div>
                    </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6"> Sector </label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecSector" name="SelecSector" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar Division funcional...">
                                        
                                 </select>
                            </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO GRUPO FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- /.ventana para modificar grupo funcional-->     
<div class="modal fade" id="VentanaUpdateGrupoF" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar grupo funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO GRUPO FUNCIONAL-->
                <form class="form-horizontal form-label-left" id="form-UpadataGrupoFuncional" action="<?php echo  base_url();?>MFuncion/UpdateGrupoFuncional" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo  Grupo funcional <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_idGfuncionF" name="txt_idGfuncionF" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo  Grupo funcional" required="required" type="hidden">
                          <input id="txt_codigoGfuncionF" name="txt_codigoGfuncionF" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo  Grupo funcional" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Grupo Funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="txt_nombreGfuncionF" name="txt_nombreGfuncionF" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Grupo Funcional " required="required" type="text">
                            </div>
                        </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Division Funcional</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecDivisionFFF" name="SelecDivisionFFF" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar Division funcional...">

                                 </select>
                            </div>
                    </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6"> Sector </label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecSectorF" name="SelecSectorF" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar Division funcional...">
                                        
                                 </select>
                            </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO GRUPO FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- modificar la funcion-->
<div class="modal fade" id="VentanaModificarFuncion" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Funcion</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                <form class="form-horizontal " id="form-ModificarFuncion" action="<?php echo  base_url();?>MFuncion/GetFuncion" method="POST">

                      <div class="item form-group">
                         
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo Funcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_IdfuncionM" name="txt_IdfuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   required="required" type="text">
                            </div>
                          <input id="txt_codigofuncionM" name="txt_codigofuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Funcion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_nombrefuncionM" name="txt_nombrefuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!-- fin de modificar la funcion-->
<!-- modificar division  funcional-->

<div class="modal fade" id="VentanaUpdateDivisionF" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Division Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                <form class="form-horizontal form-label-left"  id="form-UpdateDivisionFuncion" action="<?php echo  base_url();?>MFuncion/UpdateDivisionFucion" method="POST">
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo Division funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="id_DfuncionalM" name="id_DfuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="hidden">

                              <input id="txt_CodigoDfuncionalM" name="txt_CodigoDfuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                            </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Division funcional<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_Nombre_DFuncionalM" name="txt_Nombre_DFuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                            </div>
                      </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Funcion</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaFuncionCM" name="listaFuncionCM" class="selectpicker" data-live-search="true"  title="Buscar Funcion...">
                                 </select>
                            </div>
                    </div>       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- fin para modificar division  funcional-->



