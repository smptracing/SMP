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
						<li role="presentation" class=""><a href="#tab_EstudioCompatibilidad"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Estudio Compatibilidad</b></a>
                        </li>	
                        <li role="presentation" class=""><a href="#tab_Ejecucion"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Ejecucion</b></a>
                        </li>
                         <li role="presentation" class=""><a href="#tab_Modificacion"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Modificacion</b></a>
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
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td class="col-md-2 col-md-2 col-xs-12"></td>
									</tr>
								</thead>
								<tbody>
								<?php foreach($listaExpedienteTecnico as $item){ ?>
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
									  		<button type='button' data-toggle="tooltip" data-original-title="Editar Expediente" class='editar btn btn-primary btn-xs'><i class='ace-icon fa fa-pencil bigger-120' onclick="paginaAjaxDialogo(null, 'Modificar Expediente Técnico',{ id_et: '<?=$item->id_et?>' }, base_url+'index.php/Expediente_Tecnico/editar', 'GET', null, null, false, true);"></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Registro de componentes, metas y partidas"  class='editar btn btn-warning btn-xs' onclick="paginaAjaxDialogo(null, 'Registro de componentes, metas y partidas', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Componente/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-align-left bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Administración de partidas y analítico"   class='editar btn btn-success btn-xs' onclick="paginaAjaxDialogo(null, 'Administración de partidas y analítico', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Detalle_Partida/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-indent bigger-120'></i></button>
											<button type='button' data-toggle="tooltip" data-original-title="Presupuesto analítico"   class='editar btn btn-dark btn-xs' onclick="paginaAjaxDialogo(null, 'Presupuesto analítico', { idExpedienteTecnico : <?=$item->id_et?> }, base_url+'index.php/ET_Presupuesto_Analitico/insertar', 'GET', null, null, false, true);"><i class='ace-icon fa fa-usd bigger-120'></i></button>
											<div class="btn-group">
											<button data-toggle="dropdown" class="btn btn-info dropdown-toggle btn-xs" type="button">Reportes <span class="caret"></span>
												</button>
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
												</ul>
											</div>
											<button onclick="Eliminar(<?=$item->id_et?>);" data-toggle="tooltip" data-original-title="Eliminar Expediente Técnico"   class='eliminarExpediente btn btn-danger btn-xs'><i class="fa fa-trash-o"></i></button>
										</td>
								  	</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					</div>
					</div>

		            <div role="tabpanel" class="tab-pane fade" id="tab_EstudioCompatibilidad" aria-labelledby="profile-tab">
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
										<td>Unidad Ejecutora</td>
										<td>Nombre del proyecto</td>
										<td>Costo Total del proyecto Preinversion</td>
										<td>Costo Total del proyecto Inversion</td>
										<td>Tiempo Ejecucion</td>
										<td>Numero Beneficiarios</td>
										<td class="col-md-2 col-md-2 col-xs-12"></td>
									</tr>
								</thead>	
								<tbody>
								<?php foreach($listaExpedienteTecnicoEtapa as $item1){ ?>
								  	<tr>
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

                    <div role="tabpanel" class="tab-pane fade" id="tab_Ejecucion" aria-labelledby="profile-tab">
                         <!-- /tabla de grupo funcional desde el row -->
                        <div class="row">

                              <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="x_panel">
                                    

                                      <div class="x_title">
                                        <div class="clearfix"></div>
                                      </div>
                                     <!-- <div class="x_content">
											

											<div class="" role="tabpanel" data-example-id="togglable-tabs">
												<ul id="myTab" class="nav nav-tabs" role="tablist">
													<li role="presentation" class="active"> 
														<a href="#tab_Deductivos"  id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">	<b>Deductivos</b>
														</a>
													</li>
													<li role="presentation" class=""><a href="#tab_Adicionales"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Adicionales</b></a>
							                        </li>	
												</ul>

													<div role="tabpanel" class="tab-pane fade active in" id="tab_Deductivos" aria-labelledby="home-tab">
														
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
																				<td>Unidad Ejecutora</td>
																				<td>Nombre del proyecto</td>
																				<td>Costo Total del proyecto Preinversion</td>
																				<td>Costo Total del proyecto Inversion</td>
																				<td>Tiempo Ejecucion</td>
																				<td>Numero Beneficiarios</td>
																				<td class="col-md-2 col-md-2 col-xs-12"></td>
																			</tr>
																		</thead>
								 
																	</table>
																</div>
															</div>
															</div>
															</div>

														<div role="tabpanel" class="tab-pane fade active in" id="tab_Adicionales" aria-labelledby="home-tab">
														
														<div class="row">
															<div class="col-md-12 col-sm-12 col-xs-12">
																<div class="x_panel">
																	<button onclick="BuscarProyectocodigo();" class="btn btn-primary"> NUEVO</button>
																	<div class="x_title">
																		<div class="clearfix"></div>
																	</div>
																	


																</div>
															</div>
														</div>
														</div>


											</div>

                                      </div>-->
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
														<td class="col-md-2 col-md-2 col-xs-12"></td>
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
function()
{
$.ajax({
	url:base_url+"index.php/Expediente_Tecnico/eliminar",
	type:"POST",
	data:{id_et:id_et},
	success:function(respuesta)
	{
		alert(respuesta);
	/*var registros=eval(resp);
	for(var i=0; i<registros.length; i++)
	{
	if(registros[i]["VALOR"]==1)
	{
	swal("",registros[i]["MENSAJE"], "success");

	$('#form-addEntidad')[0].reset();
	$("#VentanaRegistraEntidad").modal("hide");
	}
	else
	{
	swal('',registros[i]["MENSAJE"],'error' )
	}
	/*swal("",  registros[i]["MENSAJE"], "success");*/
	//}

	//alert(respuesta);
	swal("ELIMINADO!", "Se elimino correctamente el expediente técnico.", "success");
	window.location.href='<?=base_url();?>index.php/Expediente_Tecnico/index/';
	renderLoading();
	}
	});
	});
}

</script>