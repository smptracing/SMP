<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mantenimiento</h3>
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
              <div class="col-md-12 col-xs-12 col-xs-12">
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
                                        <li role="presentation" class="active"><a href="#tab_Sector" class="fa fa-book" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">SECTOR</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_Entidad" role="tab" class="fa fa-book" id="profile-tab" data-toggle="tab" aria-expanded="false">ENTIDAD</a>
                                        </li>
                                         <li role="presentation" class=""><a href="#tab_ServicioPubAsoc" class="fa fa-book" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">SERVICIO PUBLICO ASOCIADO</a>
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
                                                                      <span class="glyphicon glyphicon-book"></span>
                                                                Nueva Sector </button>
                                                          <div class="x_title">
                                                            <h2>Listado de Sectores</h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-sector"  class="table table-striped table-bordered" cellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">Id</th>
                                                                  <th class="">Nombre del Sector</th>
                                                                  <th class="col-sm-2"></th>
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
                                                                <span class="glyphicon glyphicon-book"></span>
                                                                Nueva Entidad</button>
                                                          <div class="x_title">
                                                            <h2>Listado de  Entidades</h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-entidad" class="table table-striped table-bordered" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th class="col-sm-1">Id</th>
                                                                  <th>Nombre Sector</th>
                                                                  <th>Nombre Entidad</th>
                                                                  <th>Denominacion Entidad</th>
                                                                  <th class="col-sm-1"></th>
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
                                        <div role="tabpanel" class="tab-pane fade" id="tab_ServicioPubAsoc" aria-labelledby="profile-tab">
                                             <!-- /tabla de eservicios publicos asociados desde el row -->
                                            <div class="row">  
                                            
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraServicioAsociado" >
                                                            <span class="glyphicon glyphicon-book"></span>
                                                                Nuevo Servicio Asociado</button>
                                                          <div class="x_title">
                                                            <h2>Listado de Servicio Publico Asociado</h2>
                                                              
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                
                                                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                              </li>
                                                              
                                                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                              </li>
                                                                
                                                            </ul>
                                                              
                                                            <div class="clearfix"></div>
                                                              
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-ServicioAsociado" class="table table-striped table-bordered " ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>Id</th>
                                                                  <th>Servicio Público Asociado</th>
                                                                  <th></th>
                                                                </tr>
                                                              </thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>
                                                     
                                            </div>
                                         <!-- / fin tabla servicios publicos asociados el row --> 
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
                <form class="form-horizontal " id="form-addSector" action="<?php echo  base_url();?>MSectorEntidadSpu/AddSector" method="POST" >

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
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO SECTOR  -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                          <input id="txt_NombreEntidad" name="txt_NombreEntidad" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="Nombre del sector" required="required" type="text">
                        </div>
                      </div>
                       <div class="item form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion Entidad <span class="required">*</span>
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
                          <button type="submit" class="btn btn-primary">
                             <span class="glyphicon glyphicon-remove"></span>
                            Cancel
                          </button>
                          <button id="btn_addEntidad" type="submit" class="btn btn-success">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                            Guardar
                          </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVA ENTIDAD -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva entidad-->

<!-- /.ventana para registra una nuevo servicio publico asociado-->			
<div class="modal fade" id="VentanaRegistraServicioAsociado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Servicio Publico Asociado</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal form-label-left"  id="form-addServicioAsociado" action="<?php echo  base_url();?>MSectorEntidadSpu/AddServicioAsociado" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de Servicio Publico Asociado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">

                        <textarea id="textarea_servicio_publicoA"  name="textarea_servicio_publicoA" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de Servicio Publico Asociado" required="required" type="text"></textarea>
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
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para registra una nueva entidad-->
<!-- /.ventana para actualizar  servicio publico asociado-->     
<div class="modal fade" id="UpdateServicioAsociado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Actualizar Servicio Publico Asociado</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal form-label-left"  id="form-UpdateServicioAsociado" action="<?php echo  base_url();?>MSectorEntidadSpu/UpdateServicioAsociado" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de Servicio Publico Asociado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="id_servicio_publicoA" name="id_servicio_publicoA" type="hidden">
                        <textarea id="textarea_servicio_publicoAA"  name="textarea_servicio_publicoAA" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de Servicio Publico Asociado" required="required" type="text"></textarea>
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
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<!-- /.fin ventana para actualizar un servicio publico asociado-->
<!-- /.fin ventana para registra una nueva entidad-->
<!-- /.ventana para registra una nuevo servicio publico asociado-->     
<div class="modal fade" id="VentanaRegistraServicioAsociado" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Nuevo Servicio Publico Asociado</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRA NUEVO SERVICIO ASOCIADO-->
                <form class="form-horizontal form-label-left"  id="form-addServicioAsociado" action="<?php echo  base_url();?>MSectorEntidadSpu/AddServicioAsociado" method="POST" >

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre de Servicio Publico Asociado <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea_servicio_publicoA"  name="textarea_servicio_publicoA" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Nombre de Servicio Publico Asociado" required="required" type="text"></textarea>
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
                </form><!-- FORMULARIO FIN PARA REGISTRA NUEVO SERVICIO ASOCIADO -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
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
                <form class="form-horizontal " id="form-ActulizarSector" action="<?php echo  base_url();?>MSectorEntidadSpu/UpdateSector" method="POST" >

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
                                      <input id="txt_IdModificarEntidar" type="type" name="txt_IdModificarEntidar" type="text">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                               <input id="txt_NombreEntidadM" name="txt_NombreEntidadM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
                            </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Denominacion entidad<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_DenominacionEntidadM" name="txt_DenominacionEntidadM" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name"  required="required" type="text">
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



<!-- fin popul para modificar la ventana de modificarentidaa -->




