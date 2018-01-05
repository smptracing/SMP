<style>
    .mayuscula
    {
        text-transform: uppercase;
    }
</style>
<div class="right_col" role="main">
          <div class="">

            <div class="clearfix"></div>

            <div class="">
              <div class="col-md-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_title">
                                    <h2><b>PERSONAL</b></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                    </ul>
                                    <div class="clearfix"></div>
                                  </div>
                                  <div class="x_content">


                                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                      <ul id="myTab" class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_Sector" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <b>Personal</b></a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_Entidad" role="tab"  id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Cargo</b> </a>
                                        </li>

                                      </ul>
                                      <div id="myTabContent" class="tab-content">
                                             <!-- /Contenido del Personal -->
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
                                             <!-- /tabla de Personal desde el row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button  type="button" id="btn_nuevoPersonal" class="btn btn-primary " data-toggle="modal" data-target="#VentanaRegistraPersonal" >
                                                                      <span class="fa fa-plus-circle"></span>

                                                                Nuevo
                                                            </button>
                                                          <div class="x_title">

                                                            <div class="clearfix"></div>
                                                          </div>

                                                          <div class="x_content">
                                                            <table id="table-Personal" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                              																<thead>
                              																	<tr>
                                                                  <th>ID</th>
                              																		<th>DNI</th>
                              																		<th>A. Paterno</th>
                              																		<th>A. Materno</th>
                              																		<th>Nombres</th>
                              																		<th>Direción</th>
                              																		<th>Grado académico</th>
                              																		<th>Especialidad</th>
                              																		<th>ACCIONES</th>
                              																	</tr>
                              																</thead>
                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>

                                            </div>
                                         <!-- / fin tabla de Personal desde el row -->
                                        </div>
                                        <!-- /fin del Personal del sector -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_Entidad" aria-labelledby="profile-tab">

                                            <!-- /tabla de division Personal desde el row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn_Nuevadivision" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistracargo">
                                                                <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>
                                                          <div class="x_title">
           
                                                           <div class="clearfix"></div>

                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-cargo" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>Id.Cargo</th>
                                                                  <th>Nombre Cargo</th>
                                                                  <th>ACCIONES</th>
                                                                </tr>
                                                              </thead>

                                                            </table>
                                                          </div>
                                                        </div>
                                                      </div>

                                            </div>
                                         <!-- / fin tabla division Personal desde el row -->
                                        </div>
                                          <!-- / fin panel grupo  Personal desde el row -->
                                        <div role="tabpanel" class="tab-pane fade" id="tab_ServicioPubAsoc" aria-labelledby="profile-tab">
                                             <!-- /tabla de grupo Personal desde el row -->
                                            <div class="row">

                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <button type="button" id="btn_nuevoGrupoPersonal" class="btn btn-primary" data-toggle="modal" data-target="#VentanaRegistraGrupoF">
                                                            <span class="fa fa-plus-circle"></span>
                                                                Nuevo</button>
                                                          <div class="x_title">

                               
                                                            <div class="clearfix"></div>
                                                          </div>
                                                          <div class="x_content">
                                                            <table id="table-listarGrupoPersonal" class="table table-striped table-bordered table-hover" ellspacing="0" width="100%">
                                                              <thead>
                                                                <tr>
                                                                  <th>ID</th>
                                                                  <th>Personal</th>
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
                                         <!-- / fin tabla grupo Personal asociados el row -->
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

<!-- /.ventana para registra nuevo personal -->
<div class="modal fade" id="VentanaRegistraPersonal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registrar Personal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                  <!-- FORULARIO PARA REGISTRAR NUEVO PERSONAL  -->
                <form class="form-horizontal " id="form-addPersonal" action="<?php echo base_url(); ?>Personal/GetPersonal" method="POST">
                    <div id="validarPersonal">

                    <div class="form-group">
                           <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-6">Oficina</label>
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                <select   id="Cbx_Oficina" name="Cbx_Oficina" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true">
                                      </select>
                            </div>
                    </div>
                      <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre  <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_nombrepersonal" name="txt_nombrepersonal" class="mayuscula form-control col-md-7 col-xs-12"  placeholder="Nombre Personal" type="text" maxlength="75">
                        </div>
                      </div>

                        <div class="item form-group">
                        <label class=" mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Paterno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_apellidopaterno" name="txt_apellidopaterno" class="mayuscula form-control col-md-7 col-xs-12"  placeholder="Apellido Paterno" type="text" maxlength="70">
                        </div>
                      </div>

                       <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Materno<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_apellidomaterno" name="txt_apellidomaterno" class="mayuscula form-control col-md-7 col-xs-12"  placeholder="Apellido Materno" type="text" maxlength="70">
                        </div>
                      </div>

                     <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">DNI<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="txt_dni" name="txt_dni" class="mayuscula form-control col-md-7 col-xs-12" placeholder="DNI" maxlength="8" type="text">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Dirección<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_direccion" name="txt_direccion" class="mayuscula form-control col-md-7 col-xs-12" placeholder="Dirección" type="text" maxlength="100">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Celular<span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                          <input id="txt_telefono" name="txt_telefono" class="form-control col-md-7 col-xs-12"  placeholder="Telefono" type="text" maxlength="9">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Correo<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="txt_correo" name="txt_correo" class="form-control col-md-7 col-xs-12" placeholder="Correo" type="email" maxlength="100">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Grado Académico<span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-9 col-xs-6">
                            <select   id="txt_gradoacademico" name="txt_gradoacademico" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true">
                                <option value="">Seleccionar Grado Acádemico</option>
                                <option value="Bachiller">Bachiller</option>
                                <option value="Titulado">Titulado</option>
                                <option value="Magister">Magister</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Tecnico">Tecnico</option>
                            </select>
                        </div>
                      </div>                      
                    <div class="form-group">
                           <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-6">Profesión:</label>
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                     <select   id="Cbx_especialidad" name="Cbx_especialidad" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true">
                                      </select>
                            </div>
                    </div>

                        <div class="item form-group">
                            <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha de registro:<span class="required">*</span>
                            </label>
                               <div class="col-md-3 col-sm-3 col-xs-12">
                                 <input type="date" id="date_fechanac" name="date_fechanac" class="form-control col-md-7 col-xs-5" type="text" max="<?=date('Y-m-d')?>">
                               </div>
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
                            Cerrar
                          </button>
                        </div>
                      </div>
                  
                </form> <!-- FORULARIO PARA REGISTRAR NUEVO Personal  -->
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
<!-- /.fin ventana para registra una nuevO personal-->


<!-- modificar la nuevo personal-->
<div class="modal fade" id="VentanaModificarPersonal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modificar Personal</h4>
        </div>
        <div class="modal-body">
         <div class="row">
            <div class="col-xs-12">
                <form class="mayuscula form-horizontal " id="form-UpdatePersonal" action="<?php echo base_url(); ?>Personal/UpdatePersonal" method="POST">
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_idpersonam" name="txt_idpersonam" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                    </div>
                    <div id="validarEdicionPersonal">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-6">Oficina</label>
                        <div class="mayuscula col-md-6 col-sm-9 col-xs-6">
                            <select id="Cbx_OficinaModificar" name="Cbx_OficinaModificar"  data-live-search="true" >
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txt_nombrepersonalm" name="txt_nombrepersonalm" class="mayuscula form-control col-md-7 col-xs-12"   placeholder="Nombre Personal" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Paterno*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txt_apellidopaternom" name="txt_apellidopaternom" class="mayuscula form-control" placeholder="Apellido Paterno"  type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Apellido Materno*</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txt_apellidomaternom" name="txt_apellidomaternom" class="mayuscula form-control col-md-7 col-xs-12"   placeholder="Apellido Materno" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">DNI*</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="txt_dnim" name="txt_dnim" class="form-control col-md-7 col-xs-12" placeholder="DNI" type="text" maxlength="8">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Dirección</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txt_direccionm" name="txt_direccionm" class="mayuscula form-control col-md-7 col-xs-12" placeholder="Dirección" type="text">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Telefono</label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input id="txt_telefonom" name="txt_telefonom" class="form-control col-md-7 col-xs-12" placeholder="Telefono" type="text" maxlength="9">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Correo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="txt_correom" name="txt_correom" class="form-control col-md-7 col-xs-12" placeholder="Correo" type="text">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Grado Académico</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select   id="txt_gradoacademicom" name="txt_gradoacademicom" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true">
                                <option value="">Seleccionar Grado Acádemico</option>
                                <option value="Bachiller">Bachiller</option>
                                <option value="Titulado">Titulado</option>
                                <option value="Magister">Magister</option>
                                <option value="Doctorado">Doctorado</option>
                                <option value="Tecnico">Tecnico</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                           <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-6">Profesión:</label>
                            <div class="col-md-6 col-sm-9 col-xs-6">
                                     <select   id="txtEspecialidadm" name="txtEspecialidadm" class="selectpicker form-control col-md-12 col-xs-12" data-live-search="true">
                                      </select>
                            </div>
                    </div>
                    <div class="item form-group">
                        <label class="mayuscula control-label col-md-3 col-sm-3 col-xs-12" for="name">Fecha de Registro:*</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <input type="date" id="date_fechanacm" name="date_fechanacm" class="form-control" max="<?=date('Y-m-d')?>">
                        </div>
                    </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button id="send" type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                            <button class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>
                            Cerrar
                            </button>
                        </div>
                    </div>
                </form> <!-- FORULARIO para modificar personal -->
            </div><!-- /.span -->
                 </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
<!-- fin de modificar perosnal-->


<!-- Registar cargo -->
<div class="modal fade" id="VentanaRegistracargo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registar Cargo</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRAR NUEVO CARGO -->
                <form class="form-horizontal form-label-left"  id="form-addcargo" action="<?php echo base_url(); ?>Personal/Addcargo" method="POST">
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Cargo<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_nombrecargo" name="txt_nombrecargo" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
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
                              Cerrar
                            </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA nuevo cargo -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<!-- modificar cargo -->
<div class="modal fade" id="Ventanaupdatecargo" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Registar Cargo</h4>
        </div>
        <div class="modal-body">
         <div class="row">
                <div class="col-xs-12">
                 <!-- FORMULARIO PARA REGISTRAR NUEVO CARGO -->
                <form class="form-horizontal form-label-left"  id="form-updatecargo" action="<?php echo base_url(); ?>Personal/Addcargo" method="POST">
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="txt_idcargo_m" name="txt_idcargo_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  placeholder="ID" required="required" type="hidden">
                        </div>
                      </div>
                      <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nombre Cargo<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input id="txt_nombrecargo_m" name="txt_nombrecargo_m" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"  required="required" type="text">
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
                              Cerrar
                            </button>
                        </div>
                      </div>
                </form><!-- FORMULARIO FIN PARA REGISTRA nuevo cargo -->
            </div><!-- /.span -->
        </div><!-- /.row -->
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>

<script>
  $('.modal').on('hidden.bs.modal', function(){ 
    $(this).find('form')[0].reset(); //para borrar todos los datos que tenga los input, textareas, select.
    $("label.error").remove();  //lo utilice para borrar la etiqueta de error del jquery validate
  });

$(function()
{
    $('#validarPersonal').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            Cbx_Oficina:
            {
                validators:
                {               
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Oficina" es requerido.</b>'
                    }
                }
            },
            txt_nombrepersonal:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Nombre" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Nombre" no puede exceder los 75 cáracteres.</b>'
                    }
                }
            },
            txt_apellidopaterno:
            {
                validators:
                {               
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Apellido Paterno" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Apellido Paterno" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Apellido Paterno" no puede exceder los 70 cáracteres.</b>'
                    }
                }
            },
            txt_apellidomaterno:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Apellido Materno" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Apellido Materno" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Apellido Materno" no puede exceder los 70 cáracteres.</b>'
                    }
                }
            },
            txt_dni:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "DNI" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^([0-9]){8}$/,
                        message: '<b style="color: red;">El campo "Dni" es un numero de 8 dígitos.</b>'
                    }
                }
            },
            txt_correo:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        message: '<b style="color: red;">El campo "Correo electronico" no es un correo electronico.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Correo electronico" no puede exceder los 100 cáracteres.</b>'
                    }
                }

            },
            txt_telefono:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /^[0-9]{9}$/,
                        message: '<b style="color: red;">El campo "Telefono" requiere carácteres numéricos.</b>'
                    },
                   stringLength:
                    {
                        min: 5,
                        max: 9,
                        message: '<b style="color: red;">El campo "Teléfono" debe contener entre 5 y 9 carácteres numéricos.</b>'
                    }
                }
            },
            date_fechanac:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de Nacimiento" es requerido.</b>'
                    }
                }
            }
        }
    });

    $('#validarEdicionPersonal').formValidation(
    {
        framework: 'bootstrap',
        excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
        live: 'enabled',
        message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
        trigger: null,
        fields:
        {
            Cbx_OficinaModificar:
            {
                validators:
                {               
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Oficina" es requerido.</b>'
                    }
                }
            },
            txt_nombrepersonalm:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Nombre" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Nombre" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Nombre" no puede exceder los 75 cáracteres.</b>'
                    }
                }
            },
            txt_apellidopaternom:
            {
                validators:
                {               
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Apellido Paterno" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Apellido Paterno" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Apellido Paterno" no puede exceder los 70 cáracteres.</b>'
                    }
                }
            },
            txt_apellidomaternom:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Apellido Materno" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^[a-zA-Z\s]+$/,
                        message: '<b style="color: red;">El campo "Apellido Materno" es solo texto.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Apellido Materno" no puede exceder los 70 cáracteres.</b>'
                    }
                }
            },
            txt_dnim:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "DNI" es requerido.</b>'
                    },
                    regexp:
                    {
                        regexp: /^([0-9]){8}$/,
                        message: '<b style="color: red;">El campo "Dni" es un numero de 8 dígitos.</b>'
                    }
                }
            },
            txt_correom:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        message: '<b style="color: red;">El campo "Correo electronico" no es un correo electronico.</b>'
                    },
                    stringLength:
                    {
                        max: 75,
                        message: '<b style="color: red;">El campo "Correo electronico" no puede exceder los 100 cáracteres.</b>'
                    }
                }

            },
            txt_telefonom:
            {
                validators:
                {
                    regexp:
                    {
                        regexp: /^[0-9]{9}$/,
                        message: '<b style="color: red;">El campo "Telefono" requiere 9 dígitos.</b>'
                    }
                }
            },
            date_fechanacm:
            {
                validators:
                {
                    notEmpty:
                    {
                        message: '<b style="color: red;">El campo "Fecha de Nacimiento" es requerido.</b>'
                    }
                }
            }
        }
    });
});


</script>


