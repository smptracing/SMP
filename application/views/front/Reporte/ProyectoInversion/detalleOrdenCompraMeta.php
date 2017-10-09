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
						<h2><b>DETALLE DE PEDIDOS DE COMPRAS POR META</b> </h2>
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
														<td>Nro Orden</td>
														<td>Referencia</td>
														<td>Clasificador</td>
														<td>Concepto</td>
														<td>Tipo de bien</td>
														<td>Sub total de moneda</td>
														<td>Total igv moneda</td>
														<td>Total Fact moneda</td>
														<td>Sub total</td>
														<td>Total igv soles </td>
														<td>Total Fact soles</td>
														<td>Exp Siaf</td>
														<td>Exp Siga</td>
														<td>Nro Certificado</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetallePorOrdenCompraMeta as $item ){ ?>
													  	<tr>
													    	<td>
																<?=$item->NRO_ORDEN?>
													    	</td>
													    	<td>
																<?=$item->DOCUM_REFERENCIA?>
													    	</td>
													    	<td>
																<?=$item->CLASIFICAD?>
													    	</td>
													    	<td>
																<?=$item->CONCEPTO?>
													    	</td>
													    	<td>
																<?=$item->TIPO_BIEN?>
													    	</td>
													    	<td>
																<?=$item->SUBTOTAL_MONEDA?>
													    	</td>
													    	<td>
																<?=$item->TOTAL_IGV_MONEDA?>
													    	</td>
													    	<td>
																<?=$item->TOTAL_FACT_MONEDA?>
													    	</td>
													    	<td>
																<?=$item->SUBTOTAL_SOLES?>
													    	</td>
													    	<td>
																<?=$item->TOTAL_IGV_SOLES?>
													    	</td>
													    	<td>
																<?=$item->TOTAL_FACT_SOLES?>
													    	</td>
													    	<td>
																<?=$item->EXP_SIAF?>
													    	</td>
													    	<td>
																<?=$item->EXP_SIGA?>
													    	</td>
													    	<td>
																<?=$item->NRO_CERTIFICA?>
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
