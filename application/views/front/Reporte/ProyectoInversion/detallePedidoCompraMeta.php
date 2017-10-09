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
											 <div class="table-responsive" >
											<table id="table-DetalleMensualizado"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Tipo bien</td>
														<td>Tipo Pedido</td>
														<td>Nro Pedido</td>
														<td>Fecha Pedido</td>
														<td>Motivo pedido</td>
														<td>Estado</td>
														<td>Fecha Aprobado</td>
														<td>Fecha Atendido</td>
														<td>Fecha Registro </td>
														<td>Equipo Registro</td>
														<td>Fecha Registro visto bueno</td>
														<td>Equipo Registro visto bueno</td>
														<td>Personal</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetallePorPedidoCompraMeta as $item ){ ?>
													  	<tr>
															
													    	<td>
																<?=$item->TIPO_BIEN?>
													    	</td>
													    	<td>
																<?=$item->TIPO_PEDIDO?>
													    	</td>
													    	<td>
																<?=$item->NRO_PEDIDO?>
													    	</td>
													    	<td>
																<?=$item->FECHA_PEDIDO?>
													    	</td>
													    	<td>
																<?=$item->MOTIVO_PEDIDO?>
													    	</td>
											
													    	<td>
																<?=$item->ESTADO?>
													    	</td>
															<td>
																<?=$item->FECHA_APROB?>
													    	</td>
													    	<td>
																<?=$item->FECHA_ATENC?>
													    	</td>
													    	<td>
																<?=$item->FECHA_REG?>
													    	</td>
													    	
													    	<td>
																<?=$item->EQUIPO_REG?>
													    	</td>
													    	<td>
																<?=$item->fecha_reg_vb?>
													    	</td>
													    	<td>
																<?=$item->equipo_reg_vb?>
													    	</td>
													    	<td>
																<?=$item->personal?>
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
