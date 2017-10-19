<div class="right_col" role="main">
	<div>
		<div class="clearfix"></div>
		<div class="col-md-12 col-xs-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><b>EJECUCIÓN</b></h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
				<div class="" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"> 
							<a href="#tab_EstudioCompatibilidad"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">	<b>Estudio de Compatibilidad</b>
							</a>
						</li>
					
                        <li role="presentation" class=""><a href="#tab_Ejecucion_Deductivos"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Ejecucion Deductivos</b></a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_Ejecucion_Adicional"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Ejecucion Adicionales</b></a>
                        </li>
                         <li role="presentation" class=""><a href="#tab_Modificacion"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Modificacion</b></a>
                        </li>
					</ul>
				<div id="myTabContent" class="tab-content">
				<div role="tabpanel" class="tab-pane fade active in" id="tab_EstudioCompatibilidad" aria-labelledby="home-tab">
			
					         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                  
                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                      
							<table id="table-Compatibilidad" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<!--<td class="col-md-1 col-xs-12">Detalle</td>-->
										<td class="col-md-2 col-xs-12">Unidad Ejecutora</td>
										<td class="col-md-5 col-xs-12">Nombre del proyecto</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Preinversion</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Inversion</td>
										<td class="col-md-1 col-xs-12">Tiempo Ejecucion</td>
										<td class="col-md-1 col-xs-12">Numero Beneficiarios</td>
										<td class="col-md-1 col-xs-12"></td>
									</tr>
								</thead>	
								<tbody>
								<?php foreach($listaExpedienteTecnicoEtapa as $item1){ ?>
								  	<tr>
								  		<!--<td>
								  			<a href="<?= site_url('Expediente_Tecnico/verdetalle/'.$item1->id_pi);?>" role="button" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> <?= $item1->codigo_unico_pi?></a>
								  		</td>-->
										<td>
											<?= $item1->nombre_ue?>
										</td>
										<td>
											<?= $item1->nombre_pi?>
										</td>
										<td>
											S/. <?= $item1->costo_total_preinv_et?> 
										</td>
										<td>
											S/. <?= $item1->costo_total_inv_et?>
										</td>
										<td>
											<?= $item1->tiempo_ejecucion_pi_et?>
										</td>
										<td>
											<?= $item1->num_beneficiarios?>
										</td>
										<td>
									  		<button type='button' data-toggle="tooltip" data-original-title="Editar Expediente" class='editar btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$item1->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-pencil bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Registro de componentes, metas y partidas"  class='editar btn btn-warning btn-xs' onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$item1->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-align-left bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Administración de partidas y analítico"   class='editar btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Administración de partidas y analítico', { idExpedienteTecnico : <?=$item1->id_et?> }, base_url+'index.php/ET_Detalle_Partida/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-indent bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Presupuesto analítico"   class='editar btn btn-dark btn-xs' onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$item1->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-usd bigger-120'></i></button>
											<button onclick="Eliminar(<?=$item1->id_et?>);" data-toggle="tooltip" data-original-title="Eliminar Expediente Técnico"   class='eliminarExpediente btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Enviar E.T. a la siguiente etapa"   class='btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item1->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true);"><i class='ace-icon fa fa-arrow-right bigger-120'></i></button>
										</td>

					
								  	</tr>
								<?php } ?>
								</tbody>							
							</table>

                                      </div>
                                    </div>
                                  </div>

                        </div>

				</div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_Ejecucion_Deductivos" aria-labelledby="profile-tab">
                         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                  
                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                      
							<table id="table-Ejecucion_Deductivos" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td></td>
									</tr>
								</thead>	
								<tbody>
									<?php foreach($listaExpedienteEjecucionDeductivo as $item3){ ?>
									  	<tr>
											<td>
												<?= $item3->nombre_ue?>
											</td>
											<td>
												<?= $item3->nombre_pi?>
											</td>
											<td>
												S/. <?= $item3->costo_total_preinv_et?> 
											</td>
											<td>
												S/. <?= $item3->costo_total_inv_et?>
											</td>
											<td>
												<?= $item3->tiempo_ejecucion_pi_et?>
											</td>
											<td>
												<?= $item3->num_beneficiarios?>
											</td>
											<td>
												<button type='button' data-toggle="tooltip" data-original-title="Editar Expediente" class='editar btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$item3->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-pencil bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Registro de componentes, metas y partidas"  class='editar btn btn-warning btn-xs' onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$item3->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-align-left bigger-120'></i></button>
											<!--<button type='button' data-toggle="tooltip" data-original-title="Administración de partidas y analítico"   class='editar btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Administración de partidas y analítico', { idExpedienteTecnico : <?=$item3->id_et?> }, base_url+'index.php/ET_Detalle_Partida/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-indent bigger-120'></i></button>-->
											<button type='button' data-toggle="tooltip" data-original-title="Presupuesto analítico"   class='editar btn btn-dark btn-xs' onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$item3->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-usd bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Enviar E.T. a la siguiente etapa"   class='btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item3->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true);"><i class='ace-icon fa fa-arrow-right bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Dar Visto Bueno del E.T."   class='btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Visto Bueno del E.T.', { id_ExpedienteTecnico : <?=$item3->id_et?> }, base_url+'index.php/Expediente_Tecnico/vistoBueno', 'GET', null, null, false, true);"><i class="fa fa-check"></i></button>

											<div class="btn-group">
												<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Reportes <span class="caret"></span></button>
												<ul role="menu"  class="dropdown-menu">
													<li>
														<a title='Ficha tecnica de expediente tecnico'  href="<?= site_url('Expediente_Tecnico/reportePdfExpedienteTecnico/'.$item3->id_et);?>" target="_blank">Expediente Técnico 001</a>
													</li>
													<li>
														<a title='Reporte Metrados'  href="<?= site_url('Expediente_Tecnico/reportePdfMetrado/'.$item3->id_et);?>" target="_blank">Metrado</a>
													</li>
													<li>
													<a  title='Presupuesto Resumen'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoFF05/'.$item3->id_et);?>" target="_blank">Formato FF-05</a>
													</li>
													<li>
														<a title='Reporte de Presupuesto Analitico'  href="<?= site_url('Expediente_Tecnico/reportePdfPresupuestoAnalitico/'.$item3->id_et);?>" target="_blank">Presupuesto Analitico</a>
													</li>
													<li>
														<a title='Reporte de AnalisiS de precios unitarios'  href="<?= site_url('Expediente_Tecnico/reportePdfAnalisisPrecioUnitarioFF11/'.$item3->id_et);?>" target="_blank">Formato FF-11</a>
													</li>
												</ul>
											</div>
											<button onclick="Eliminar(<?=$item3->id_et?>);" data-toggle="tooltip" data-original-title="Eliminar Expediente Técnico"   class='eliminarExpediente btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button>
											<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Detalle Expediente <span class="caret"></span>
												</button>
												<ul role="menu"  class="dropdown-menu">
													<li>
														<a title='Listar Responsable'  onclick="paginaAjaxDialogo(null, 'Listar Responsables del Expediente Técnico',{ id_et: '<?=$item3->id_et?>' }, base_url+'index.php/Expediente_Tecnico/ResponsableExpediente', 'POST', null, null, false, true);" >Responsable</a>
													</li>
													<li>
														<a title='Documentos adjuntados'  onclick="paginaAjaxDialogo(null, 'Listar Documentos',{ id_et: '<?=$item3->id_et?>' }, base_url+'index.php/Expediente_Tecnico/DocumentoExpediente', 'GET', null, null, false, true);" >Documentos</a>
													</li>
													<li>
														<a title='Detalle de expediente técnico'  onclick="paginaAjaxDialogo(null, 'Detalle de expediente técnico',{id_et:'<?=$item3->id_et?>'}, base_url+'index.php/Expediente_Tecnico/DetalleExpediente', 'POST', null, null, false, true);" >Detalle Expediente</a>
													</li>
												</ul>
											</div>
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

					

                    <div role="tabpanel" class="tab-pane fade" id="tab_Ejecucion_Adicional" aria-labelledby="profile-tab">
                         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                  
                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
                                      
							<table id="table-Ejecucion-Adicional" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
								<thead>
									<tr>
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td></td>
									</tr>
								</thead>	
								<tbody>
									<?php foreach($listaExpedienteEjecucionAdicional as $item4){ ?>
									  	<tr>
											 <td>
												<?= $item4->nombre_ue?>
											</td>
											<td>
												<?= $item4->nombre_pi?>
											</td>
											<td>
												S/. <?= $item4->costo_total_preinv_et?> 
											</td>
											<td>
												S/. <?= $item4->costo_total_inv_et?>
											</td>
											<td>
												<?= $item4->tiempo_ejecucion_pi_et?>
											</td>
											<td>
												<?= $item4->num_beneficiarios?>
											</td>
											<td>
												<button type='button' data-toggle="tooltip" data-original-title="Enviar E.T. a la siguiente etapa"   class='btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item4->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true);"><i class='ace-icon fa fa-arrow-right bigger-120'></i></button>
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

 

					<div role="tabpanel" class="tab-pane fade" id="tab_Modificacion" aria-labelledby="profile-tab">
                         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                     

                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                      <div class="x_content">
											
											<table id="table-Modificacion" style="text-align: center;" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Unidad Ejecutora</td>
														<td>Nombre del proyecto</td>
														<td>Costo Total del proyecto Preinversion</td>
														<td>Costo Total del proyecto Inversion</td>
														<td>Tiempo Ejecucion</td>
														<td>Numero Beneficiarios</td>
														<td></td>
													</tr>
												</thead>	
												<tbody>
												<?php foreach($listaExpedienteTecnicoModificacion as $item2){ ?>
												  	<tr>
														 <td>
															<?= $item2->nombre_ue?>
														</td>
														<td>
															<?= $item2->nombre_pi?>
														</td>
														<td>
															S/. <?= $item2->costo_total_preinv_et?> 
														</td>
														<td>
															S/. <?= $item2->costo_total_inv_et?>
														</td>
														<td>
															<?= $item2->tiempo_ejecucion_pi_et?>
														</td>
														<td>
															<?= $item2->num_beneficiarios?>
														</td>
														<td>
															<button type='button' data-toggle="tooltip" data-original-title="Enviar E.T. a la siguiente etapa"   class='btn btn-primary btn-xs' onclick="paginaAjaxDialogo(null, 'Seleccionar etapa de ejecución para la clonación', { idExpedienteTecnico : <?=$item2->id_et?> }, base_url+'index.php/Expediente_Tecnico/clonar', 'POST', null, null, false, true);"><i class='ace-icon fa fa-arrow-right bigger-120'></i></button>
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