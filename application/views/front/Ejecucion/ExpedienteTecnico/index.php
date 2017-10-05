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
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"> 
							<a href="#tab_Sector"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">	<b>Expediente</b>
							</a>
						</li>
						 <li role="presentation" class=""><a href="#tab_Monitoreo"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Monitoreo de ET</b></a>
                        </li>
					</ul>
				<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="x_panel">
							<button onclick="BuscarProyectocodigo();" class="btn btn-primary"> NUEVO</button>
							<div class="x_title">
								<div class="clearfix"></div>
							</div>
							<table id="table-ExpedienteTecnico" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td class="col-md-1 col-xs-12">Unidad Ejecutora</td>
										<td class="col-md-4 col-xs-12">Nombre del proyecto</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Preinversion</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Inversion</td>
										<td class="col-md-1 col-xs-12">Tiempo Ejecucion</td>
										<td class="col-md-1 col-xs-12">Numero Beneficiarios</td>
										<td class="col-md-3 col-xs-12"></td>
									</tr>
								</thead>
								<tbody>
								<?php foreach($listaExpedienteTecnicoElaboracion as $item){ ?>
								  	<tr>
										 <td>
											<?= $item->nombre_ue?>
										</td>
										<td>
											<?= $item->nombre_pi?>
										</td>
										<td>
											S/. <?= $item->costo_total_preinv_et?> 
										</td>
										<td>
											S/. <?= $item->costo_total_inv_et?>
										</td>
										<td>
											<?= $item->tiempo_ejecucion_pi_et?>
										</td>
										<td>
											<?= $item->num_beneficiarios?>
										</td>
										<td>


											<ul class="nav nav-pills" role="tablist">
							                    <li role="presentation" class="dropdown">
							                      	<!--<a id="drop4" href="#" class="btn btn-info dropdown-toggle btn-xs" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">Acciones<span class="caret"></span>
							                        </a>-->
							                        <button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button"> Acciones<span class="caret"></span></button>
							                      	<ul id="menu6" class="dropdown-menu animated fadeInDown" role="menu">							                        	
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Asignación de especialistas requeridos', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_PER_REQ/insertar', 'GET', null, null, false, true); return false;"> Asignar Personal	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/ET_Tarea/index/<?=$item->id_et?>', '_blank'); return false;"> Gestionar Actividades	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" class="editar" onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true); return false;" >Componentes, Metas y Partidas	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true); return false;"> Presupuesto Analítico	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#"  onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true); return false;"> 		Enviar E.T. a la siguiente etapa	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Visto Bueno del E.T.', { id_ExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/Expediente_Tecnico/vistoBueno','GET', null, null, false, true); return false;"> 	Dar Visto Bueno	
								                        	</a>
								                        </li>
								                        <li>
							                        		<a role="menuitem" tabindex="-1" href="#" onclick="window.open(base_url+'index.php/Expediente_Tecnico/valorizacionEjecucionProyecto/<?=$item->id_et?>', '_blank'); return false;"> Valorización de 			Ejecución.	
								                        	</a>
								                        </li>
							                        	<li role="presentation" class="divider"></li>
							                        	<li>
								                        	<a role="menuitem" tabindex="-1" href="#" onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);return false;">Editar Expediente Técnico 	
								                        	</a> 
							                        	</li>
							                        	<li>
							                        		<a role="menuitem" tabindex="-1" class='eliminarExpediente' href="#" onclick="Eliminar(<?=$item->id_et?>);return false;"> Eliminar Expediente Técnico 	
								                        	</a>
								                        </li>
							                      	</ul>
							                    </li>
							                    <li role="presentation" class="dropdown">
								                    <button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Reportes <span class="caret"></span></button>		

													<ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">
														<li role="presentation">
															<a role="menuitem" tabindex="-1" title='Ficha tecnica de expediente tecnico'  href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$item->id_et);?>" target="_blank">Expediente Técnico 001</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" title='Reporte Metrados'  href="<?= site_url('Expediente_Tecnico/reportePdfMetrado/'.$item->id_et);?>" target="_blank">Metrado</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" title='Presupuesto Resumen'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoFF05/'.$item->id_et);?>" target="_blank">Formato FF-05</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" title='Reporte de Presupuesto Analitico'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoAnalitico/'.$item->id_et);?>" target="_blank">Presupuesto Analitico</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" title='Reporte de AnalisiS de precios unitarios'  href="<?= site_url('Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11/'.$item->id_et);?>" target="_blank">Formato FF-11</a>
														</li>
													</ul>
							                    </li>
							                    <li role="presentation" class="dropdown">
							                      	<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button"> Detalle Expediente <span class="caret"></span></button>
							                      	<ul id="menu2" class="dropdown-menu animated fadeInDown" role="menu" aria-labelledby="drop5">
														<li role="presentation">
															<a role="menuitem" tabindex="-1" title='Listar Responsable'  onclick="paginaAjaxDialogo(null, 'Listar Responsables del Expediente Técnico',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/ResponsableExpediente', 'POST', null, null, false, true);" >Responsable</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" title='Documentos adjuntados'  onclick="paginaAjaxDialogo(null, 'Listar Documentos',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/DocumentoExpediente', 'GET', null, null, false, true);" >Documentos</a>
														</li>
														<li role="presentation">
														<a role="menuitem" tabindex="-1" onclick="paginaAjaxDialogo(null, 'Detalle de expediente técnico',{id_et:'<?=$item->id_et?>'}, base_url+'index.php/Expediente_Tecnico/DetalleExpediente', 'POST', null, null, false, true);" >Detalle Expediente</a>
														</li>
													</ul>
							                     
							                    </li>
							                  </ul>



									  		<!--<button type='button' data-toggle="tooltip" data-original-title="Personal" class='btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Asignación de especialistas requeridos', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_PER_REQ/insertar', 'GET', null, null, false, true);"><i class="glyphicon glyphicon-user"></i></button>
									  		<button type='button' data-toggle="tooltip" data-original-title="Gestionar actividades" class='btn btn-success btn-xs' onclick="window.open(base_url+'index.php/ET_Tarea/index/<?=$item->id_et?>', '_blank');"><i class="glyphicon glyphicon-fullscreen"></i></button>
									  		<button type='button' data-toggle="tooltip" data-original-title="Editar Expediente" class='editar btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-pencil bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Registro de componentes, metas y partidas"  class='editar btn btn-warning btn-xs' onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-align-left bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Presupuesto analítico"   class='editar btn btn-dark btn-xs' onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-usd bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Enviar E.T. a la siguiente etapa"   class='btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true);"><i class='ace-icon fa fa-arrow-right bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Dar Visto Bueno del E.T."   class='btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Visto Bueno del E.T.', { id_ExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/Expediente_Tecnico/vistoBueno', 'GET', null, null, false, true);"><i class="fa fa-check"></i></button>
											<button type="button" data-toggle="tooltip" data-original-title="Valororización de ejecución del proyecto" class="btn btn-success btn-xs" onclick="window.open(base_url+'index.php/Expediente_Tecnico/valorizacionEjecucionProyecto/<?=$item->id_et?>', '_blank');"><i class="fa fa-align-justify"></i></button>
											<button onclick="Eliminar(<?=$item->id_et?>);" data-toggle="tooltip" data-original-title="Eliminar Expediente Técnico"   class='eliminarExpediente btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button>
											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Reportes <span class="caret"></span></button>
												<ul role="menu"  class="dropdown-menu">
													<li>
														<a title='Ficha tecnica de expediente tecnico'  href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$item->id_et);?>" target="_blank">Expediente Técnico 001</a>
													</li>
													<li>
														<a title='Reporte Metrados'  href="<?= site_url('Expediente_Tecnico/reportePdfMetrado/'.$item->id_et);?>" target="_blank">Metrado</a>
													</li>
													<li>
													<a  title='Presupuesto Resumen'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoFF05/'.$item->id_et);?>" target="_blank">Formato FF-05</a>
													</li>
													<li>
														<a title='Reporte de Presupuesto Analitico'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoAnalitico/'.$item->id_et);?>" target="_blank">Presupuesto Analitico</a>
													</li>
													<li>
														<a title='Reporte de AnalisiS de precios unitarios'  href="<?= site_url('Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11/'.$item->id_et);?>" target="_blank">Formato FF-11</a>
													</li>
												</ul>
											</div>
											
											<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Detalle Expediente <span class="caret"></span>
												</button>
												<ul role="menu"  class="dropdown-menu">
													<li>
														<a title='Listar Responsable'  onclick="paginaAjaxDialogo(null, 'Listar Responsables del Expediente Técnico',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/ResponsableExpediente', 'POST', null, null, false, true);" >Responsable</a>
													</li>
													<li>
														<a title='Documentos adjuntados'  onclick="paginaAjaxDialogo(null, 'Listar Documentos',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/DocumentoExpediente', 'GET', null, null, false, true);" >Documentos</a>
													</li>
													<li>
														<a title='Detalle de expediente técnico'  onclick="paginaAjaxDialogo(null, 'Detalle de expediente técnico',{id_et:'<?=$item->id_et?>'}, base_url+'index.php/Expediente_Tecnico/DetalleExpediente', 'POST', null, null, false, true);" >Detalle Expediente</a>
													</li>
												</ul>
											</div>-->

										</td>
								  	</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
					</div>

							
                        <div role="tabpanel" class="tab-pane fade" id="tab_Monitoreo" aria-labelledby="profile-tab">
                         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                  
                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                      
                                      				<table id="tableExpedienteTecnico" class="table table-striped">
														<thead>
															<th style="text-align: center;">Código único</th>
															<th>Nombre PI</th>
															<th style="text-align: center;">Inicio/Fin</th>
															<th></th>
														</thead>
														<tbody>
															<?php foreach($listaETExpedienteTecnico as $key => $value){ ?>
																<tr>
																	<td style="text-align: center;"><?=$value->codigo_unico_pi?></td>
																	<td><?=html_escape($value->nombre_pi)?></td>
																	<td style="text-align: center;width: 150px;"><?=($value->existeGantt ? substr($value->primeraETTarea->fecha_inicio_tarea, 0, 10).'/'.substr($value->ultimaETTarea->fecha_final_tarea, 0, 10) : '')?></td>
																	<td>
																		<?php if($value->existeGantt){ ?>
																			<?php if(substr($value->primeraETTarea->fecha_inicio_tarea, 0, 10)<=date('Y-m-d') && substr($value->ultimaETTarea->fecha_final_tarea, 0, 10)>=date('Y-m-d')){ ?>
																				<div style="background-color: #58aaff;border-radius: 20px;display: inline-block;height: 20px;width: 20px;" title="En proceso"></div>
																			<?php } ?>
																			<?php if(substr($value->primeraETTarea->fecha_inicio_tarea, 0, 10)>date('Y-m-d')){ ?>
																				<div style="background-color: #12b112;border-radius: 20px;display: inline-block;height: 20px;width: 20px;" title="En espera"></div>
																			<?php } ?>
																			<?php if(substr($value->ultimaETTarea->fecha_final_tarea, 0, 10)<date('Y-m-d')){ ?>
																				<div style="background-color: #bdbdc4;border-radius: 20px;display: inline-block;height: 20px;width: 20px;" title="Fuera de fecha"></div>
																			<?php } ?>
																		<?php } else{ ?>
																			<div style="background-color: #12b112;border-radius: 20px;display: inline-block;height: 20px;width: 20px;" title="Sin cronograma"></div>
																		<?php } ?>
																	</td>
																</tr>
															<?php } ?>
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
function BuscarProyectocodigo()
{
	swal({
	  title: "Buscar",
	  text: "Proyecto: Ingrese Código Único del proyecto",
	  type: "input",
	  showCancelButton: true,
	  closeOnConfirm: false,
	  inputPlaceholder: "Ingrese Codigo Unico"
	}, function (inputValue) {
	
	if (inputValue === "")
	  {
	  	swal.showInputError("Ingresar codigo!");
    	return false
	  }
	 else 
	 {
			event.preventDefault();
			$.ajax({
				"url":base_url+"index.php/Expediente_Tecnico/registroBuscarProyecto",
				type:"GET", 
				data:{inputValue:inputValue},
				cache:false,
				success:function(resp){
					var ProyetoEncontrado=eval(resp);
					if(ProyetoEncontrado.length==1){
							var buscar="true";
							paginaAjaxDialogo(null, 'Registrar Expediente Técnico',{CodigoUnico:inputValue,buscar:buscar}, base_url+'index.php/Expediente_Tecnico/insertar', 'GET', null, null, false, true);
	  						swal("Correcto!", "Se Encontro el Proyecto: " + inputValue, "success");
					}else{
							swal.showInputError("No se encontro el  Codigo Unico. Intente Nuevamente!");
	    					return false
					}
					
				}
			});
		}

	});
}

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