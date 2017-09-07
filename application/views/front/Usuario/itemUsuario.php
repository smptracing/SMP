<div class="modal-body">
   <div class="row">
        <div class="col-xs-12">
            <form class="form-horizontal" id="form-AddUsuario"  enctype="multipart/form-data" role="form" method="post" onSubmit="return false;" >
                  <div class="form-group">
                         <label class="col-sm-3 control-label no-padding-right"  for="form-field-1-1">Buscar Persona</label>
                          <div class="col-sm-6">
                               <select  class="form-control input-sm" id="comboPersona" name="comboPersona"  title="Buscar persona" >
                               </select>                    
                         </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right"  for="form-field-1-1">Usuario </label>
                      <div class="col-sm-6">
                        <input type="text" id="txt_usuario" name="txt_usuario" placeholder="Nombre Usuario" class="form-control" autocomplete="off" />
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tipo de Usuario </label>
                    <div class="col-sm-6">
                      <select  class="form-control input-sm" id="cbb_TipoUsuario" name="cbb_TipoUsuario">
                        
                       </select>                    
                    </div>
                  </div>
                  <div class="form-group">
                       <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Estado </label>
                        <div class="col-sm-6">
                               <select  class="form-control input-sm">
                               <option values="1"> Activo </option>  
                               <option values="0"> Inactivo </option>  
                               </select>                    
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Contraseña</label>
                        <div class="col-sm-3">
                          <input type="password" id="txt_contrasenia" name="txt_contrasenia" placeholder="Contraseña" class="form-control" />
                        </div>
                  </div>
                  <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Acceso al menú</label>
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenu" name="cbb_listaMenu[]" multiple=""></select>
                        </div>
                        <div class="col-sm-1" style="padding-top:20px;">
                          <button id="bt_Der" type="button" style="width:100%; text-align:center;">></button>
                          <button id="bt_Izq" type="button" style="width:100%; text-align:center;"><</button>
                        </div>
                        <div class="col-sm-4">
                          <select style="height:130px;width:100%;" id="cbb_listaMenuDestino" name="cbb_listaMenuDestino[]" multiple=""></select>
                        </div>
                  </div>
                  <div class="form-group" style="text-align: center;">
                      <button type="submit"  class="btn btn-primary">Registrar Usuario </button>
                      <input  id="btnCerrar" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                 </div>
            </form>
        </div>
    </div>
</div>
<script src="<?php echo base_url();?>assets/js/usuario/usuario.js"></script>
<script src="<?php echo base_url();?>assets/js/Helper/jsHelper.js"></script>
<script>
	$(document).ready(function(){
		listaPersonaCombo();
		listatipoUsuario();
		listaMenuUsuario("<?php echo $id_persona; ?>");
        listaMenu();
	}); 
</script>