<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Cadena Funcional </h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_Sector" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Función</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_Entidad" role="tab"  id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span>  División Funcional</a>
                                        </li>
                                         <li role="presentation" class=""><a href="#tab_ServicioPubAsoc"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Grupo Funcional</a>
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
                                                                      <span class="fa fa-plus-circle"></span>
                                                                Nuevo
                                                            </button>
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

                                                            <table id="table-Funcion" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID </th>
                                                                  <th style="width: 8%">CODIGO FUNCION</th>
                                                                  <th style="width: 68%">NOMBRE FUNCION</th>
                                                                  <th style="width: 8%">ACCIONES</th>
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
                                                            <button type="button" id="btn_Nuevadivision" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraDivisionF">
                                                                <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>
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
                                                            <table id="table-DivisionF" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID</th>
                                                                  <th>ID FUNCION</th>
                                                                  <th>FUNCION</th>
                                                                  <th>CODIGO DIVISION FUNCIONAL</th>
                                                                  <th>NOBRE DE DIVISION FUNCIONAL</th>
                                                                  <th>ACCIONES</th>
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
                                                            <button type="button" id="btn_nuevoGrupoFuncional" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraGrupoF">
                                                            <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>
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
                                                            <table id="table-listarGrupoFuncional" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID</th>
                                                                  <th>CODIGO GRUPO FUNCIONAL</th>
                                                                  <th>NOMBRE GRUPO FUNCIONAL </th>
                                                                  <th>ID DIVISION FUNCIONAL </th>
                                                                  <th>CODIGO DIVISION FUNCIONAL</th>
                                                                  <th>NOMBRE DIVISION FUNCIONAL</th>
                                                                  <th>ID SECTOR</th>
                                                                  <th>SECTOR</th>
                                                                  <th>ACCIONES</th>
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
<div class="modal fade" id="VentanaRegistraFuncion"  data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nueva Función</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                <form class="form-horizontal " id="form-addFuncion" action="<?php echo  base_url();?>Funcion/GetFuncion" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código Función <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_codigofuncion" name="txt_codigofuncion" class="form-control col-md-7 col-xs-12" data-inputmask="'mask':'99'" data-validate-length-range="2" data-validate-words="2"  placeholder="Código Función" required="required" type="text"> 
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Función <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_nombrefuncion" name="txt_nombrefuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Función" required="required" type="text">
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
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
            </div><!-- /.span -->
          </div><!-- /.row -->
        </div>
        <div class="modal-footer">
               <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <div> *Son campos obligatorios </div>
                        </div>
                </div>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva funcion-->


<!-- /.ventana para registra una nuevo dision funcional-->			
<div class="modal fade" id="VentanaRegistraDivisionF" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nueva División Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                <form class="form-horizontal form-label-left"  id="form-AddDivisionFuncion" action="<?php echo  base_url();?>DivisionFuncional/AddDivisionFucion" method="POST">

                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo División funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_CodigoDfuncional" name="txt_CodigoDfuncional" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  data-inputmask="'mask':'999'" placeholder="Codigo Division funcional" required="required" type="text" >
                            </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre División funcional<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_Nombre_DFuncional" name="txt_Nombre_DFuncional" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre Division funcional" required="required" type="text">
                            </div>
                      </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Función</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaFuncionC" name="listaFuncionC" class="selectpicker" data-live-search="true"  title="Elegir o buscar función">
                                 </select>
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
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva DIVISION  FUNCIONAL-->

<!-- /.ventana para registra grupo funcional-->			
<div class="modal fade" id="VentanaRegistraGrupoF" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Grupo Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO GRUPO FUNCIONAL-->
                <form class="form-horizontal form-label-left" id="form-AddGrupoFuncional" action="<?php echo  base_url();?>GrupoFuncional/AddGrupoFuncional" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código  Grupo Funcional <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_codigoGfuncion" name="txt_codigoGfuncion" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" data-inputmask="'mask':'9999'" placeholder="Código  Grupo Funcional" required="required" type="text">
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
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">División Funcional</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecDivisionFF" name="SelecDivisionFF" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar División Funcional">

                                 </select>
                            </div>
                    </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6"> Sector </label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecSector" name="SelecSector" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Buscar Sector">
                                        
                                 </select>
                            </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                           <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button  data-dismiss="modal" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO GRUPO FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- /.ventana para modificar grupo funcional-->     
<div class="modal fade" id="VentanaUpdateGrupoF" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Grupo Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO GRUPO FUNCIONAL-->
                <form class="form-horizontal form-label-left" id="form-UpadataGrupoFuncional" action="<?php echo  base_url();?>GrupoFuncional/UpdateGrupoFuncional" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Codigo  Grupo Funcional <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_idGfuncionF" name="txt_idGfuncionF" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Codigo  Grupo funcional" required="required" type="hidden">
                          <input id="txt_codigoGfuncionF" name="txt_codigoGfuncionF" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   data-inputmask="'mask':'9999'" required="required" type="text">
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
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">División Funcional</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecDivisionFFF" name="SelecDivisionFFF" class="selectpicker" data-live-search="true" >

                                 </select>
                            </div>
                    </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6"> Sector </label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="SelecSectorF" name="SelecSectorF" class="selectpicker" data-live-search="true" >
                                        
                                 </select>
                            </div>
                    </div>

                    <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO GRUPO FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nuevo grupo funcional-->
<!-- modificar la funcion-->
<div class="modal fade" id="VentanaModificarFuncion" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Función</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
                <form class="form-horizontal " id="form-ModificarFuncion" action="<?php echo  base_url();?>Funcion/GetFuncion" method="POST">

                      <div class="item form-group">
                         
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código Función <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_IdfuncionM" name="txt_IdfuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   required="required" type="hidden">
                            </div>
                          <input id="txt_codigofuncionM" name="txt_codigofuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   required="required"  data-inputmask="'mask':'99'" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Función <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_nombrefuncionM" name="txt_nombrefuncionM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">

                          <button id="send" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
                        </div>
                      </div>
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO FUNCION  -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<!-- fin de modificar la funcion-->
<!-- modificar division  funcional-->

<div class="modal fade" id="VentanaUpdateDivisionF" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar División Funcional</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
                <form class="form-horizontal form-label-left"  id="form-UpdateDivisionFuncion" action="<?php echo  base_url();?>DivisionFuncional/UpdateDivisionFucion" method="POST">
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Código División Funcional <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="id_DfuncionalM" name="id_DfuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="hidden">

                              <input id="txt_CodigoDfuncionalM" name="txt_CodigoDfuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  data-inputmask="'mask':'999'" required="required" type="text">
                            </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre División Funcional<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_Nombre_DFuncionalM" name="txt_Nombre_DFuncionalM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                            </div>
                      </div>
                    <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Función</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaFuncionCM" name="listaFuncionCM" class="selectpicker" data-live-search="true" >
                                 </select>
                            </div>
                    </div>       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                              <button id="send" type="submit" class="btn btn-success">
                                <span class="glyphicon glyphicon-floppy-disk"></span>
                                Guardar
                              </button>
                              <button data-dismiss="modal" class="btn btn-danger">
                               <span class="glyphicon glyphicon-remove"></span>
                              Cancelar
                            </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA DIVISION FUNCIONAL -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- fin para modificar division  funcional-->

<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });
</script>
