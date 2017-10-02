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
						<h2><b>ANALÍTICO DEL AVANCE FINANCIERO</b> </h2>
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
											
											<table id="table-DetalleAnaliticoAvance" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>

													<tr>
														<td>Prod/Proy. Cat.Pptal. Act/AI/Obr Fun. Div.Fn. Finalidad Meta A Gen</td>
													</tr>
												</thead>
												<tbody>
													

													<?php if($listaDetalleAnaliticoAvancFinE ==false){?>
														<tr>
														<td>Prod/Proy. Cat.Pptal. Act/AI/Obr Fun. Div.Fn. Finalidad Meta A Gen</td>
														</tr>
												
														<?php  }else { ?>
														<tr>
														<td><?=$listaDetalleAnaliticoAvancFinE->act_proy ,' ',$listaDetalleAnaliticoAvancFinE->proyecto;?>  </td>
											
														</tr>
			
														<tr>
															<td><?=$listaDetalleAnaliticoAvancFinE->meta,' ', $listaDetalleAnaliticoAvancFinE->proyecto;?></td>
														</tr>
														<tr>
															<td><?=$listaDetalleAnaliticoAvancFinE->programa,' ', $listaDetalleAnaliticoAvancFinE->programa_nombre;?>  </td>
														</tr>
														<tr>
															<td><?=$listaDetalleAnaliticoAvancFinE->sub_programa,' ', $listaDetalleAnaliticoAvancFinE->sub_programa_nombre;?>  </td>
														</tr>
														<tr>
															<td><?=$listaDetalleAnaliticoAvancFinE->funcion,' ', $listaDetalleAnaliticoAvancFinE->funcion_nombre;?>  </td>	
														</tr>
													<?php  } ?>
												
												</tbody>
										
											</table>
										</div>
									
									</div>

									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											
											<table id="table-DetalleAnalitico" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
												<thead>

													<tr>
														<td>Finalidad</td>
														<td>Presupuesto</td>
														<td>Modificación</td>
														<td>Pim Acumulado</td>
														<td>Ejecución</td>
														<td>Compromiso</td>
														<td>Certificado</td>
														<td>Devengado</td>
														<td>Girado</td>
														<td>Pagado</td>
													</tr>
												</thead>
												<tbody>

													<?php foreach($listaDetalleAnaliticoAvancFin as $item ){ ?>
													
													  <tr>
															<td>
																<?=$item->finalidad,' ',$item->finalidad_nombre?>
													    	</td>
													    	<td><?=$item->presupuesto?></td>
													    	<td><?=$item->modificacion?></td>
															<td><?=$item->pim_acumulado?></td>
															<td><?=$item->ejecucion?></td>
															<td><?=$item->compromiso?></td>
															<td><?=$item->certificado?></td>
															<td><?=$item->devengado?></td>
															<td><?=$item->girado?></td>
															<td><?=$item->pagado?></td>
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
		<div class="clearfix"></div>
	</div>
</div>

<script>

</script>