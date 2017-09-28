<style>
	.modal-dialog
	{
		width: 100%;
		margin: 0;
		margin-left: 0%;
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
									<div>
										
										<!--<?php foreach ($temp as  $value) {?>
											<?= $value->cod_tt; ?>
											<?php foreach ($value->child as $key =>  $a) {?>
											<?= $a->generica; ?>
			
											<?php } ?>
										<?php } ?>-->

									</div>
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											 <div id="DetalleClasificador" class="table-responsive" style="font-size:9.5px">
											<table id="table-DetalleClasificador" cellspacing="0" width="100%">
												<thead>
													<tr>
														<td>Datos</td>
														<td>En</td>
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
														<td>D</td>
														<td>C</td>
														<td>G</td>
														<td>P</td>
														<td>Comprom Anu.</td>
														<td>Cert</td>
														<td>Ejec</td>
														<td>Anul</td>
													</tr>
												</thead>
												<tbody>
												
											<?php foreach ($temp as  $value) {?>
												<tr>
													<td colspan="21">
														<?= $value->cod_tt,' ', $value->tipo_transaccion; ?>
													</td>
											
												</tr>
													<?php foreach ($value->child as $key =>  $value1) {?>
													<tr>
														<td colspan="21">
														<?='&nbsp&nbsp&nbsp', $value1->generica,' ',$value1->desc_generica ; ?>
														</td>
													
													</tr>
														<?php foreach ($value1->child as $key =>  $value2) {?>
														<tr>
															<td colspan="21">
															<?='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', $value2->sub_generica,' ',$value2->desc_sub_generica ; ?>
															</td>
														
														</tr>

															<?php foreach ($value2->child as $key =>  $value3) {?>
															<tr>
																<td colspan="21">
																<?='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', $value3->sub_generica_det,' ',$value3->des_sub_generica_det ; ?>
																</td>
															
															</tr>

																<?php foreach ($value3->child as $key =>  $value4) {?>
																	<tr>
																		<td colspan="21">
																		<?='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', $value4->especifica,' ',$value4->desc_especifica ; ?>
																		</td>
																	
																	</tr>
																	
																	<?php foreach ($value4->child as $key =>  $value5) {?>
																		<tr>
																			<td>
																			<?='&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp', $value5->especifica_det,' ',$value5->desc_especifica_det ; ?>
																			</td>
																			<td>
																			<?= $value5->ene; ?> 
																			</td>
																			<td>
																			<?= $value5->feb; ?> 
																			</td>
																			<td>
																			<?= $value5->mar; ?> 
																			</td>
																			<td>
																			<?= $value5->abr; ?> 
																			</td>
																			<td>
																			<?= $value5->may; ?> 
																			</td>
																			<td>
																			<?= $value5->jun; ?> 
																			</td>
																			<td>
																			<?= $value5->jul; ?> 
																			</td>
																			<td>
																			<?= $value5->ago; ?> 
																			</td>
																			<td>
																			<?= $value5->sep; ?> 
																			</td>
																			<td>
																			<?= $value5->oct; ?> 
																			</td>
																			<td>
																			<?= $value5->nov; ?> 
																			</td>
																			<td>
																			<?= $value5->dic; ?> 
																			</td>
																			<td>
																				<?=$value5->devengado; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->compromiso; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->girado; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->pagado; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->comprometido_anual; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->certificado; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->ejecucion; ?>
																	    	</td>
																	    	<td>
																				<?=$value5->anulacion; ?>
																	    	</td>
																		</tr>

																	<?php } ?>
																	
																<?php } ?>

															<?php } ?>

														<?php } ?>

													<?php } ?>
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

