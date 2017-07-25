<div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-xs-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Sector </h2>
                                    <ul class="nav navbar-right panel_toolbox">

                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">
                                        <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Sector
                                        
                                        </a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_Entidad" role="tab"  id="profile-tab" data-toggle="tab" aria-expanded="false"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Entidad</a>
                                        </li>

                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                             <!-- /Contenido del sector -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
                                             <!-- /tabla de sector desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button"  class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraSector" >
                                                                      <span class="fa fa-plus-circle"></span>
                                                                Nuevo </button>
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
                                                            <table id="table-sector"  class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th style="width: 91%">NOMBRE SECTOR</th>
                                                                  <th style="width: 9%">ACCIONES</th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla de sector desde el row -->
                                        </div>
                                        <!-- /fin del Contenido del sector -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Entidad" aria-labelledby="profile-tab">
                                          
                                            <!-- /tabla de entidad desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="Btn_entidad" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraEntidad" >
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
                                                            <table id="table-entidad" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">ID</th>
                                                                  <th>ID_SECTOR</th>
                                                                  <th>NOMBRE SECTOR</th>
                                                                  <th>NOMBRE ENTIDAD</th>
                                                                  <th>DENOMINACION  ENTIDAD</th>
                                                                  <th class="col-sm-1">ACCIONES</th>
                                                                </tr>
                                                              </thead>

                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla entidad desde el row -->                                    
                                        </div>
                                          <!-- / fin panel entidad desde el row -->
                                      
                                      </div>
                                    </div>

                                  </div>
                                </div>
              </div>

             
          </div>
          <div class="clearfix"></div>
        </div>
     </div>
        
<!-- /.ventana para registra un nuevo sector-->			
<div class="modal fade" id="VentanaRegistraSector" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Sector</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO SECTOR  -->
                <form class="form-horizontal " id="form-addSector" action="<?php echo  base_url();?>Sector/AddSector" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Sector <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreSector" name="txt_NombreSector" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre del sector" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>

                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO SECTOR  -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">

        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nuevo sector-->


<!-- /.ventana para registra una nueva entidad-->			
<div class="modal fade" id="VentanaRegistraEntidad" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nueva Entidad</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVA ENTIDAD -->
                <form class="form-horizontal form-label-left" id="form-addEntidad" action="<?php echo  base_url();?>MSectorEntidadSpu/AddEntidad" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Entidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreEntidad" name="txt_NombreEntidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre de la entidad" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominación Entidad <span class="required">*</span>
                          </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DenominacionEntidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="txt_DenominacionEntidad" placeholder="Denominacion entidad" required="required" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                           <label class="control-label col-md-3 col-sm-3 col-xs-6">Seleccionar un sector</label>  
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select id="listaSector" name="listaSector" class="selectpicker" data-live-search="true" title="selecciones Sector">
  
                                 </select>
                            </div>
                    </div> 
                    
       
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="btn_addEntidad" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA ENTIDAD -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva entidad-->



<!-- /.fin ventana para registra una nueva entidad-->
<!-- /.fin ventana para registra una nueva entidad-->

<!--- popul para modificar la centana de modificarsector -->
<div class="modal fade" id="VentanaModificarSector" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Sector</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal " id="form-ActulizarSector" action="<?php echo  base_url();?>Sector/UpdateSector" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Modificar El sector<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_IdModificar" type="hidden" name="txt_IdModificar" type="text">
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_NombreSectorM" name="txt_NombreSectorM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>
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



<!-- fin popul para modificar la ventana de modificarsector -->
<!--- popul para modificar la ventana de modificar Entidad -->
<div class="modal fade" id="VentanaModificarEntidad" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Entidad</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA MODIFICAR LA ENTIDAD-->
                <form class="form-horizontal " id="form-ActulizarEntidad" action="<?php echo  base_url();?>MSectorEntidadSpu/UpdateEntidad" method="POST" >
                      <div class="form-group">
                             
                             <label class="control-label col-md-3 col-sm-3 col-xs-6">Seleccionar nuevo sector</label>  
                              <div class="col-md-6 col-sm-9 col-xs-6">
                                  <select id="listaSectorModificar" name="listaSectorModificar" class="selectpicker" data-live-search="true" title="selecciones Sector">
    
                                   </select>
                              </div>
                      </div> 
                      <div class="item form-group">
                          
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre entidad<span class="required">*</span>
                        </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                      <input id="txt_IdModificarEntidar"  name="txt_IdModificarEntidar" type="hidden">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input id="txt_NombreEntidadM" name="txt_NombreEntidadM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
                            </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominación entidad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DenominacionEntidadM" name="txt_DenominacionEntidadM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"   required="required" type="text">
                        </div>
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          
                          <button  type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                          <button type="submit" class="btn btn-danger" data-dismiss="modal">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancelar
                          </button>

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



<!-- fin popul para modificar la ventana de modificarentidaa -->




