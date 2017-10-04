<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title" style="color: black; ">
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Criterio Funcion</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="x_panel">
												<button type="button" class="btn btn-primary " onclick="paginaAjaxDialogo(null, 'Registro Criterio Generales', {  }, base_url+'index.php/PmiCriterioG/insertar', 'GET', null, null, false, true);"  >
													<span class="fa fa-plus-circle"></span>
													Nuevo
												</button>
											</button>
											<div class="x_content">
												<table id="table-Presupuesto" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td style="width: 1%">Codigo</td>
															<td>Función</td>
															<td style="width: 1%">N° Criterio</td>
															<td style="width: 1%">Opciones</td>
														</tr>
													</thead>
													<tbody>
															<?php foreach($listaCriterioFuncion as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->codigo_funcion?>
													    	</td>
															<td>
																<?=$item->nombre_funcion?>
													    	</td>
													    	<td>
																<?=$item->CantCriteriosG?>
													    	</td>
													    	<td style="text-align: left;">
																<button type="button" class="btn btn-primary btn-xs " onclick="paginaAjaxDialogo(null, 'Registro Criterio Generales', {  }, base_url+'index.php/PmiCriterioG/insertar', 'GET', null, null, false, true);"><span class="fa fa-plus-circle"></span>
																</button>
																<button type="button" class="btn btn-primary btn-xs " onclick="paginaAjaxDialogo(null, 'Registro Criterio Específicos', null, base_url+'index.php/PmiCriterioEspecifico/index', 'GET', null, null, false, true);"><span class="fa fa-plus-circle"></span>
																</button>

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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<script>
	$(document).ready(function()
	{
		$('#table-Presupuesto').DataTable(
		{
			"language" : idioma_espanol
		});
	});
</script>