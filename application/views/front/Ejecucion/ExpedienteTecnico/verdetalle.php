
<link href="<?php echo base_url(); ?>assets/li/css/layout.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/li/css/menu.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/li/js/script.js"></script>
<style>
	.btn.btn-app{
		background-color: #f2f5f7;
		color:#001f3f;
	}
	.menuPrincipal
	{
		background-color: #001f3f;
		color: #73879c; 
		font-size: 15px;

	}
	.nav>li>a
	{
    	color: white;
	}
	.nav .open>a, .nav .open>a:focus, .nav .open>a:hover 
	{
    	background-color: #26576f;
    	color: white;
	}
	.nav>li>a:hover 
	{
    	padding: 13px 15px 12px;
    	background-color: #26576f;
    	color: white;

	}
	.dropdown:hover{
		background-color: #001f3f;
	}
	.subMenu >li>a:hover{
		background-color: #001f3f;
		color:white;
	}
	.subMenu >li>a
	{
		padding: 5px 5px;
		color:#001f3f;
		font-size: 13px;
	}

</style>
<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>
						<?php 
						if($ExpedienteTecnicoElaboracion[0]->id_etapa_et == 1)
						{ ?>
							Expediente Técnico
						<?php } ?>
						<?php 
						if($ExpedienteTecnicoElaboracion[0]->id_etapa_et == 3)
						{ ?>
							Proyecto en Ejecución
						<?php } ?>						
					</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<p></p>
                  	<ul class="nav nav-pills menuPrincipal" role="tablist">
                    	<li role="presentation" class="dropdown" style="font-size: 15px; color: red;">
                      		<a id="drop4" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">	Expediente Técnico<span class="caret"></span>
                            </a>
                      		<ul id="menu6" class="dropdown-menu subMenu" role="menu">
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
                      		<a id="drop5" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> Mantenimiento<span class="caret"></span>
                            </a>
                      		<ul id="menu2" class="dropdown-menu subMenu" role="menu" aria-labelledby="drop5">
                      			<li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Asignación de especialistas requeridos', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/ET_PER_REQ/insertar', 'GET', null, null, false, true); return false;"> Asignar Personal	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#"  onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true); return false;"> Enviar E.T. a la siguiente etapa	
		                        	</a>
		                        </li>
		                        <li role="presentation">
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Visto Bueno del E.T.', { id_ExpedienteTecnico : <?=$ExpedienteTecnicoElaboracion[0]->id_et?> }, base_url+'index.php/Expediente_Tecnico/vistoBueno','GET', null, null, false, true); return false;"> Dar Visto Bueno	
		                        	</a>
		                        </li>
		                        <li role="presentation">
		                        	<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Agregar Periodo de Ejecucion',{ id_et: '<?=$ExpedienteTecnicoElaboracion[0]->id_et?>' }, base_url+'index.php/Expediente_Tecnico/PeriodoEjecucion', 'GET', null, null, false, true);return false;"> Periodo de Ejecución	
		                        	</a> 
	                        	</li>
                      		</ul>
                    	</li><li role="presentation" class="dropdown">
                      		<a id="drop6" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> Operaciones <span class="caret"></span>
                            </a>
                      		<ul id="menu2" class="dropdown-menu subMenu" role="menu" aria-labelledby="drop5">
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
	                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/Expediente_Tecnico/valorizacionEjecucionProyecto/<?=$ExpedienteTecnicoElaboracion[0]->id_et?>', '_blank'); return false;"> Cronogramación
		                        	</a>
			                    </li>

		                        <?php if($ExpedienteTecnicoElaboracion[0]->id_etapa_et == 2 || $ExpedienteTecnicoElaboracion[0]->id_etapa_et == 3)
		                        { ?>
			                         <li role="presentation">
		                        		<a role="menuitem" tabindex="-1" href="<?= site_url('Expediente_Tecnico/ControlMetrado/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target='_blank'); return false;">Ejecución diaria de Metrados
			                        	</a>
			                        </li>
			                        <li role="presentation">
		                        		<a role="menuitem" tabindex="-1" href="<?= site_url('Expediente_Tecnico/ValorizacionFisicaMetrado/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target='_blank'); return false;">Valorizacion Mensual
			                        	</a>
			                        </li>
		                        <?php } ?>
		                        
                      		</ul>
                    	</li><li role="presentation" class="dropdown">
                      		<a id="drop7" href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false"> Detalle Expendiente <span class="caret"></span>
                            </a>
                      		<ul id="menu3" class="dropdown-menu subMenu" role="menu" aria-labelledby="drop6">
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
                    <br><br>
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Codigo:
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->codigo_unico_pi?>">
                        </div>
                     </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control col-md-7 col-xs-12" readonly="readonly" rows="4"><?= trim($ExpedienteTecnicoElaboracion[0]->nombre_pi);?>
                          </textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Unidad Ejecutora: </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->nombre_ue?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto PreInversion: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=a_number_format($ExpedienteTecnicoElaboracion[0]->costo_total_preinv_et,2,'.',",",3)?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Costo Total del Proyecto Inversion: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=a_number_format($ExpedienteTecnicoElaboracion[0]->costo_total_inv_et,2,'.',",",3)?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tiempo de Ejecucion: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->tiempo_ejecucion_pi_et?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Numero de Beneficiarios: 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input readonly="readonly" type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" value="<?=$ExpedienteTecnicoElaboracion[0]->num_beneficiarios?>">
                        </div>
                      </div>
                      <div class="ln_solid"></div>

                    </form>
                    <div class="row">
                    	<div class="col-md-12" style="text-align: center; display: inline-block;">
                    		<div>
			                    <h6><code>Formatos de Expediente Técnico</code>.</h6>
								<a class="btn btn-app"  data-toggle="tooltip" title="Ficha Técnica del Proyectos" href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank" >
									<i class="fa fa-file-pdf-o"></i> Formarto FF-01
								</a>                  		
								<a class="btn btn-app"  data-toggle="tooltip" title="Presupuesto Resumen"  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoFF05/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> Formato FF-05
								</a>                     		
								<a class="btn btn-app" data-toggle="tooltip" title="Cuadro de Presupuesto Analítico General" href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoAnalitico/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> Formato FF-06
								</a>                     		
								<a class="btn btn-app"  data-toggle="tooltip" title="Sustentación de Metrados" href="<?= site_url('Expediente_Tecnico/reportePdfMetrado/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> Formato FF-10
								</a>                     		
								<a class="btn btn-app"  data-toggle="tooltip" title="Análisis de Costos Unitarios" href="<?= site_url('Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> Formato FF-11
								</a> 
								<a class="btn btn-app"  data-toggle="tooltip" title="Cronograma Valorizado de Ejecución del Proyecto" href="<?= site_url('Expediente_Tecnico/reportePdfValorizacionEjecucion/'.$ExpedienteTecnicoElaboracion[0]->id_et);?>" target="_blank">
									<i class="fa fa-file-pdf-o"></i> Formato FF-15
								</a>
							</div>                     		
                    	</div>
                    </div>                  		
                </div>
			</div>
		</div>
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