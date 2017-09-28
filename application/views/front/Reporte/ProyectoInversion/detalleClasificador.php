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
						<h2><b>DETALLE CLASIFICADOR</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
					
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								<div role="tabpanel" class="tab-pane fade active in" id="tab_Sector" aria-labelledby="home-tab">
						
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											 <div id="DetalleClasificador" class="table-responsive">
											<table id="table-DetalleClasificador"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<!--<td>Tipo de transacción</td>
														<td>Generica</td>
														<td>Descripción Generica</td>-->
														<td>Sub generica</td>
														<td>Descripción Sub generica</td>
														<td>Específica </td>
														<td>Descripción Específica</td>
														<td>Específica Det</td>
														<td>Descripción Específica Det</td>
														<td>Ejecución</td>
														<td>Anulacion</td>
														<td>Compromiso</td>
														<td>Devengado</td>
														<td>Girado</td>
														<td>Pagado</td>
														<td>Comprometido Anual</td>
														<td>Certificado</td>
														<td>Ene</td>
														<td>Feb</td>
														<td>Mar</td>
														<td>Abr</td>
														<td>May</td>
														<td>Jun</td>
														<td>Jul</td>
														<td>Agost</td>
														<td>Set</td>
														<td>Oct</td>
														<td>Nov</td>
														<td>Dic</td>

													</tr>
												</thead>
												<tbody>
													<tr><td colspan="26"><?=$listaDetalleClasificadorFijos->tipo_transaccion ?></td></tr>
													<tr><td colspan="26"><?=$listaDetalleClasificadorFijos->generica,' ', $listaDetalleClasificadorFijos->desc_generica ?></td></tr>

													<?php foreach($listaDetalleClasificador as $item ){ ?>
													  	<tr>
															<!--<td>
																<?=$item->tipo_transaccion?>
													    	</td>
													    	<td>
																<?=$item->generica?>
													    	</td>
													    	<td>
																<?=$item->desc_generica?>
													    	</td>-->
													    	<td>
																<?=$item->sub_generica?>
													    	</td>
													    	<td>
																<?=$item->des_sub_generica_det?>
													    	</td>
													    	<td>
																<?=$item->especifica?>
													    	</td>
													    	<td>
																<?=$item->desc_especifica?>
													    	</td>
													    	<td>
																<?=$item->especifica_det?>
													    	</td>
													    	<td>
																<?=$item->desc_especifica_det?>
													    	</td>
													    	<td>
																<?=$item->ejecucion?>
													    	</td>
													    	<td>
																<?=$item->anulacion?>
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
													    	<td>
																<?=$item->comprometido_anual?>
													    	</td>
													    	<td>
																<?=$item->certificado?>
													    	</td>
													    	<td>
																<?=$item->ene?>
													    	</td>
													    	<td>
																<?=$item->feb?>
													    	</td>
													    	<td>
																<?=$item->mar?>
													    	</td>
													    	<td>
																<?=$item->abr?>
													    	</td>
													    	<td>
																<?=$item->may?>
													    	</td>
													    	<td>
																<?=$item->jun?>
													    	</td>
													    	<td>
																<?=$item->jul?>
													    	</td>
													    	<td>
																<?=$item->ago?>
													    	</td>
													    	<td>
																<?=$item->sep?>
													    	</td>
													    	<td>
																<?=$item->oct?>
													    	</td>
													    	<td>
																<?=$item->nov?>
													    	</td>
													    	<td>
																<?=$item->dic?>
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

