<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EXPEDIENTE TÉCNICO</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<p></p>
                  	<ul class="nav nav-pills" role="tablist">
                    	<li role="presentation" class="dropdown">
                      		<a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">	Acciones
                                <span class="caret"></span>
                            </a>
                      		<ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">
                        		<li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Asignación de especialistas requeridos', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/ET_PER_REQ/insertar', 'GET', null, null, false, true); return false;"> Asignar Personal	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/ET_Tarea/index/<?=$ExpedienteTecnicoElaboracion[0]->id_et?>', '_blank'); return false;"> Gestionar Actividades
	                        		</a>
		                        </li>
                        		<li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" class="editar" onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true); return false;" >Componentes, Metas y Partidas	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true); return false;"> Presupuesto Analítico	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#"  onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true); return false;"> 		Enviar E.T. a la siguiente etapa	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Visto Bueno del E.T.', { id_ExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/Expediente_Tecnico/vistoBueno','GET', null, null, false, true); return false;"> 	Dar Visto Bueno	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/Expediente_Tecnico/valorizacionEjecucionProyecto/<?=$ExpedienteTecnicoElaboracion[0]->id_et?>', '_blank'); return false;"> Valorización de 			Ejecución.	
		                        	</a>
		                        </li>
	                        	<li role="presentation" class="divider"></li>
	                        	<li role="presentation">
		                        	<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$ExpedienteTecnicoElaboracion[0]->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);return false;">Editar Expediente Técnico 	
		                        	</a> 
	                        	</li>
	                        	<li  role="presentation">
	                        		<a role="menuitem" tabindex="-1" class='eliminarExpediente' href="#" onclick="Eliminar(<?=$ExpedienteTecnicoElaboracion[0]->id_et?>);return false;"> Eliminar Expediente Técnico 	
		                        	</a>
		                        </li>

                    		</ul>
                    	</li>
                    	<li role="presentation" class="dropdown">
                      		<a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> Reportes <span class="caret"></span>
                            </a>
                      		<ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">
                      			<li role="presentation">
									<a role="menuitem" tabindex="-1" title='Ficha tecnica de expediente tecnico'  href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">Expediente Técnico 001</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" title='Reporte Metrados'  href="<?= site_url('Expediente_Tecnico/reportePdfMetrado/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">Metrado</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" title='Presupuesto Resumen'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoFF05/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">Formato FF-05</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" title='Reporte de Presupuesto Analitico'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoAnalitico/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">Presupuesto Analitico</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" title='Reporte de AnalisiS de precios unitarios'  href="<?= site_url('Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">Formato FF-11</a>
								</li>
                      		</ul>
                    	</li>
                    	<li role="presentation" class="dropdown">
                      		<a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> Detalle Expendiente <span class="caret"></span>
                            </a>
                      		<ul id="menu3" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop6">
                      			<li role="presentation">
									<a role="menuitem" tabindex="-1" title='Listar Responsable'  onclick="paginaAjaxDialogo(null, 'Listar Responsables del Expediente Técnico',{ id_et: '<?=$ExpedienteTecnicoElaboracion[0]->id_et?>' }, base_url+'index.php/Expediente_Tecnico/ResponsableExpediente', 'POST', null, null, false, true);" >Responsable</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" title='Documentos adjuntados'  onclick="paginaAjaxDialogo(null, 'Listar Documentos',{ id_et: '<?=$ExpedienteTecnicoElaboracion[0]->id_et?>' }, base_url+'index.php/Expediente_Tecnico/DocumentoExpediente', 'GET', null, null, false, true);" >Documentos</a>
								</li>
								<li role="presentation">
								<a role="menuitem" tabindex="-1" onclick="paginaAjaxDialogo(null, 'Detalle de expediente técnico',{id_et:'<?=$ExpedienteTecnicoElaboracion[0]->id_et?>'}, base_url+'index.php/Expediente_Tecnico/DetalleExpediente', 'POST', null, null, false, true);" >Detalle Expediente</a>
								</li>                        
                      		</ul>
                    	</li>
                 	</ul>
                  	<br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->codigo_unico_pi?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly" rows="5">
                          	<?= trim($ExpedienteTecnicoElaboracion[0]->nombre_pi);?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Ejecutora</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->nombre_ue?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto PreInversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_preinv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto Inversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_inv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Ejecucion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->tiempo_ejecucion_pi_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Beneficiarios<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->num_beneficiarios?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
				</div>
			</div>
			<div class="x_panel">
                  <div class="x_title">
                    <h2>Button App Design</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p>Add the class <code>.btn .btn-app</code> tag</p>
                    <a class="btn btn-app" data-toggle="tooltip" title="Editar E.T.">
                      <i class="fa fa-edit"></i> Editar
                    </a>
                    <a class="btn btn-app" data-toggle="tooltip" title="Eliminar E.T.">
                      <i class="fa fa-trash"></i> Eliminar
                    </a>
                    <a class="btn btn-app" data-toggle="tooltip" title="Asignar Personal">
                      <i class="fa fa-user-plus"></i> Personal
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Gestionar Actividades" >
                      <i class="fa fa-calendar-o"></i> Actividades
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Registrar Componentes, Metas y Partidas">
                      <i class="fa fa-edit"></i> Registrar
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Presupuesto  Analitico">
                      <i class="fa fa-money"></i> Presupuesto
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Enviar E.T. a la siguiente etapa">
                      <i class="fa fa-send"></i> Enviar E.T.
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Dar visto bueno">
                      <i class="fa fa-check-square"></i> visto bueno
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Valorizacion de Ejecucion">
                      <i class="fa fa-list-ol"></i> Valorizacion
                    </a>
                    <!--<a class="btn btn-app"  data-toggle="tooltip" title="Expediente Tecnico 001">
                      <i class="fa fa-play"></i> Expediente Tecnico 001
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Metrado">
                      <i class="fa fa-pause"></i> Metrado
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Formato FF-05">
                      <i class="fa fa-save"></i> Formato FF-05
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Presupuesto Analitico">
                      <i class="fa fa-bullhorn"></i> Presupuesto Analitico
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Formato FF-11">
                      <i class="fa fa-repeat"></i> Formato FF-11
                    </a>-->
                    <a class="btn btn-app"  data-toggle="tooltip" title="Responsable">
                      <i class="fa fa-user"></i> Responsable
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Documentos">
                      <i class="fa fa-file"></i> Documentos
                    </a>
                    <a class="btn btn-app"  data-toggle="tooltip" title="Detalle Expediente">
                      <i class="fa fa-list"></i> Detalle
                    </a>
                    <!--<a class="btn btn-app dropdown-toggle"  data-toggle="dropdown" role="button" aria-expanded="false">
                      <i class="fa fa-envelope"></i> Detalle
                      <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settingsdsds 1</a>
                          </li>
                          <li><a href="#">Settinsdsdgs 2</a>
                          </li>
                        </ul>
                    </a>-->
                    <!--<ul class="nav panel_toolbox">
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
                    <div class="btn-group">
                      <button type="button" class="btn btn-danger">Reportes</button>
                      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a>
                        </li>
                        <li><a href="#">Another action</a>
                        </li>
                        <li><a href="#">Something else here</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a>
                        </li>
                      </ul>
                    </div>-->


                    <br /><br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->codigo_unico_pi?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly" rows="5">
                          	<?= trim($ExpedienteTecnicoElaboracion[0]->nombre_pi);?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Ejecutora</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->nombre_ue?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto PreInversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_preinv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto Inversion <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->costo_total_inv_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Ejecucion<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->tiempo_ejecucion_pi_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Beneficiarios<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->num_beneficiarios?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
                    


                    </div>

                 
                </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php
$sessionTempCorrecto=$this->session->flashdata('correcto');
$sessionTempError=$this->session->flashdata('error');

if($sessionTempCorrecto){ ?>
	<script>
	$(document).ready(function()
	{
		swal('','<?=$sessionTempCorrecto?>', "success");
	});
	</script>
<?php }

if($sessionTempError){ ?>
<script>
	$(document).ready(function()
	{
	swal('','<?=$sessionTempError?>', "error");
	});
</script>
<?php } ?>
<script>


$(document).ready(function()
{
	$('#table-ExpedienteTecnico').DataTable(
	{
		"language":idioma_espanol
	});

});


$(document).ready(function()
{
	$('#table-Compatibilidad').DataTable(
	{
		"language":idioma_espanol
	});

});
$(document).ready(function()
{
	$('#table-Modificacion').DataTable(
	{
		"language":idioma_espanol
	});

});

$(document).ready(function()
{
	$('#table-Ejecucion_Deductivos').DataTable(
	{
		"language":idioma_espanol
	});

});
$(document).ready(function()
{
	$('#table-Ejecucion-Adicional').DataTable(
	{
		"language":idioma_espanol
	});

});
$(document).ready(function()
{
	$('#tableExpedienteTecnico').DataTable(
	{
		"language":idioma_espanol
	});

});
function Eliminar(id_et)
{
	swal({
		title: "Esta seguro que desea eliminar el Expediente Técnico, ya que se eliminara también los responsables y sus imagenes?",
		text: "",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "SI,ELIMINAR",
		closeOnConfirm: false
	},
	function(){$.ajax({url:base_url+"index.php/Expediente_Tecnico/eliminar",type:"POST",data:{id_et:id_et},success:function(respuesta)
			{
				swal("ELIMINADO!", "Se elimino correctamente el expediente técnico.", "success");
				window.location.href='<?=base_url();?>index.php/Expediente_Tecnico/index/';
				renderLoading();
			}
		});
	});
}
</script>