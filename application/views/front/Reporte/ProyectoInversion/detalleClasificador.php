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
											<table id="table-DetalleClasificador" border="1" cellspacing="0" width="100%">
												<thead>
													<tr style="text-align:center">
														<td bgcolor="#D6EAF8">Clasificadores</td>
														<td bgcolor="#D6EAF8">En</td>
														<td bgcolor="#D6EAF8">Feb</td>
														<td bgcolor="#D6EAF8">Mar</td>
														<td bgcolor="#D6EAF8">Abr</td>
														<td bgcolor="#D6EAF8">May</td>
														<td bgcolor="#D6EAF8">Jun</td>
														<td bgcolor="#D6EAF8">Jul</td>
														<td bgcolor="#D6EAF8">Agost</td>
														<td bgcolor="#D6EAF8">Set</td>
														<td bgcolor="#D6EAF8">Oct</td>
														<td bgcolor="#D6EAF8">Nov</td>
														<td bgcolor="#D6EAF8">Dic</td>
														<td bgcolor="#D6EAF8">D</td>
														<td bgcolor="#D6EAF8">C</td>
														<td bgcolor="#D6EAF8">G</td>
														<td bgcolor="#D6EAF8">P</td>
														<td bgcolor="#D6EAF8">Comprom Anu.</td>
														<td bgcolor="#D6EAF8">Cert</td>
														<td bgcolor="#D6EAF8">Ejec</td>
														<td bgcolor="#D6EAF8">Anul</td>
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
																			<td style="text-align:right">
																			<?= number_format($value5->ene,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->feb,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->mar,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->abr,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->may,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->jun,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->jul,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->ago,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->sep,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->oct,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->nov,2) ?> 
																			</td>
																			<td style="text-align:right">
																			<?= number_format($value5->dic,2) ?> 
																			</td>
																			<td style="text-align:right">
																				<?= number_format($value5->devengado,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																				<?= number_format($value5->compromiso,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																				<?= number_format($value5->girado,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																				<?= number_format($value5->pagado,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																				<?= number_format($value5->comprometido_anual,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																	    		<?= number_format($value5->certificado,2)?>
																		
																	    	</td>
																	    	<td style="text-align:right">
																				<?=number_format($value5->ejecucion,2) ?>
																	    	</td>
																	    	<td style="text-align:right">
																				<?=number_format($value5->anulacion,2) ?>
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
											<br>
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

