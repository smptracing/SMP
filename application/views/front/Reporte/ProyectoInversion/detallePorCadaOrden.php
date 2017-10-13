<style>
	.modal-dialog
	{
		width: 90%;
		margin: 0;
		margin-left: 5%;
		padding: 0;
	}

	.modal-content
	{
		height: auto;
		min-height: 100%;
		border-radius: 0;
	}
</style>

<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>DETALLE POR CADA NRO ORDEN</b> </h2>
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
									
									<div class="clearfix">
										<div class="pull-right tableTools-container"></div>
									</div>

									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											 <div class="table-responsive" >
											<table id="table-DetallePorCadaOrden"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="2500px">
												<thead>
													<tr>
														<td>codigo item</td>
														<td>Nombre</td>
														<td>Cantidad</td>
														<td>Precio unitario moneda</td>
														<td>Precio total moneda</td>
														<td>Item bien</td>
													</tr>
												</thead>
												<tbody>
														<?php foreach($listaDetallePorCadaOrden as $item ){ ?>
													  	<tr>
													    	<td>
																<?=$item->CODIGO_ITEM?>
													    	</td>
													    	<td>
																<?=$item->NOMBRE_ITEM?>
													    	</td>
													    	<td>
																<?=$item->CANT_ITEM?>
													    	</td>
													    	<td>
																<?=$item->PREC_UNIT_MONEDA?>
													    	</td>
													    	<td>
																<?=$item->PREC_TOT_MONEDA?>
													    	</td>
													    	<td>
																<?=$item->ITEM_BIEN?>
													    	</td>
													  </tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
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
