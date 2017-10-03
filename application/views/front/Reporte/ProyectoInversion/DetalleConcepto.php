<script src="<?php echo base_url(); ?>assets/vendors/echarts/dist/echarts-all-3.js"></script>
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
						<h2><b>DATOS GENERALES Y DETALLE POR ORDEN DE PEDIDOS</b> </h2>
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
					                        	<table id="table-DatoGenerales"  class="table-hover" cellspacing="0" width="100%">
												<tr>
													<td>Año</td>
													<td>MES_CALEND</td>
													<td>NRO_ORDEN</td>
													<td>DOCUM_REFERENCIA</td>
													<td>CLASIFICAD</td>
													<td>CONCEPTO</td>
													<td>FECHA_ORDEN</td>
													<td>TIPO_BIEN</td>
													<td>SUBTOTAL_MONEDA</td>
													<td>TOTAL_IGV_MONEDA</td>
													<td>TOTAL_FACT_MONEDA</td>
													<td>SUBTOTAL_SOLES</td>
													<td>TOTAL_IGV_SOLES</td>
													<td>TOTAL_FACT_SOLES</td>
													<td>EXP_SIAF</td>
													<td>EXP_SIGA</td>
													<td>NRO_CERTIFICA</td>			
												 </tr>
<!--
													    	ANO_EJE	MES_CALEND	NRO_ORDEN	DOCUM_REFERENCIA	CLASIFICAD	CONCEPTO	FECHA_ORDEN	TIPO_BIEN	SUBTOTAL_MONEDA	TOTAL_IGV_MONEDA	TOTAL_FACT_MONEDA	SUBTOTAL_SOLES	TOTAL_IGV_SOLES	TOTAL_FACT_SOLES	EXP_SIAF	EXP_SIGA	NRO_CERTIFICA
													    	-->
												<body>
													
													<?php foreach($listaDetallePorOrden as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->ANO_EJE?>
													    	</td>
													    	<td>
																<?=$item->MES_CALEND?>
													    	</td>
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
																<?=$item->FECHA_ORDEN?>
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
																<?=$item->TOTAL_FACT_MONEDA?>
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
													
												</body>
											
											</table>

					                        </div>

						                </div>
						        	</div>
									<br>
									
									
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
