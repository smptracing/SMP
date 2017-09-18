<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>DETALLE MENSUAL DE LA META</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
					
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
									<!-- /tabla de sector desde el row -->
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											<table id="table-DetalleMensualizado"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Nombre</td>
														<td>Mes</td>
														<td>Ejecución</td>
														<td>Compromiso</td>
														<td>Devengado</td>
														<td>Girado</td>
														<td>Pagado</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetalleMensualizado as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->nombre?>
													    	</td>
													    	<td>
																<?=$item->mes_eje?>
													    	</td>
													    	<td>
																<?=$item->ejecucion?>
													    	</td>
													    	<td>
																<?=$item->compromiso?>
													    	</td>
													    	<td>
																<?=$item->devengado?>
													    	</td>
													    	<td>
																<?=$item->girado?>
													    	</td>
													    	<td>
																<?=$item->pagado?>
													    	</td>
													  </tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
										<!-- / fin tabla de sector desde el row -->
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
