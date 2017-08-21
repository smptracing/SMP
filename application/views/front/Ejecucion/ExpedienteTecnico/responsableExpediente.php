<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2><b>TIPO DE RESPONSABLE</b> </h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
		
							<div id="myTabContent" class="tab-content">
								<!-- /Contenido del sector -->
								
									<!-- /tabla de sector desde el row -->
									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											
													<div class="x_content">
														<table id="table-ResponsableExpediente"  class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
															<thead>
																<tr>
																	<td>Tipo de responsable</td>
																	<td>Responsable</td>
																	<td>Grado Académico</td>
																	<td>Especialidad</td>
																	
																</tr>
															</thead>
															<tbody>
															<?php foreach($listaResponsableExpediente as $item ){ ?>
															  	<tr>
																	<td>
																		<?=$item->desc_tipo_responsable_et?>
															    	</td>
															    	<td>
																		<?=$item->Responsable?>
															    	</td>
																	<td>
																		<?=$item->grado_academico?>
															    	</td>
															    	<td>
																		<?=$item->especialidad?>
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
		<div class="clearfix"></div>
	</div>
</div>

<script>

</script>