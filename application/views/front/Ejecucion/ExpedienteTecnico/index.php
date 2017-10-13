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
						<!--<li role="presentation" class=""><a href="#tab_Monitoreo"  role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <b>Monitoreo de ET</b></a>
                        </li>-->
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
										<td class="col-md-1 col-xs-12">Detalle</td>
										<td class="col-md-2 col-xs-12">Unidad Ejecutora</td>
										<td class="col-md-5 col-xs-12">Nombre del proyecto</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Preinversion</td>
										<td class="col-md-1 col-xs-12">Costo Total del proyecto Inversion</td>
										<td class="col-md-1 col-xs-12">Tiempo Ejecucion</td>
										<td class="col-md-1 col-xs-12">Numero Beneficiarios</td>
										
									</tr>
								</thead>
								<tbody>
								<?php foreach($listaExpedienteTecnicoElaboracion as $item){ ?>
								  	<tr>
								  		<td>
								  			<a href="<?= site_url('Expediente_Tecnico/verdetalle/'.$item->id_pi);?>" role="button" class="btn btn-success btn-sm"><span class="fa fa-eye"></span> <?= $item->codigo_unico_pi?></a>
								  				
								  		</td>
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
								  	</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				</div>
				<!--<div role="tabpanel" class="tab-pane fade" id="tab_Monitoreo" aria-labelledby="profile-tab">
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
                </div>-->

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
</script>