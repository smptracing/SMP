<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title" style="color: black; ">
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Criterio</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="x_panel">
												
											</button>
											<div class="x_title">
												<ul class="nav navbar-right panel_toolbox">
													<li>
														<a class="collapse-link">
															<i class="fa fa-chevron-up"></i>
														</a>
													</li>
													<li>
														<a class="close-link">
															<i class="fa fa-close"></i>
														</a>
													</li>
												</ul>
												<div class="clearfix"></div>
											</div>
											<div class="col-md-3 col-xs-3"  style="margin-left: 300px;">
												<div class="form-group">
									                <div class="input-group">
														<label class="control-label">Seleccionar función</label>
														<select  id="combofuncion" name="combofuncion" class="form-control col-md-2 col-xs-2">
															<?php foreach($listarFuncion as $item){ ?>
																<option value="<?=$item->id_funcion; ?>"><?= $item->nombre_funcion;?></option>
															<?php } ?>
														</select>
									                </div>
							            		</div>
											</div>
											<div class="x_content">
												<table id="table-pip" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td>Código</td>
															<td>Proyecto</td>
															<td>Prioridad</td>
															<td>Función</td>
															<td class="col-md-2 col-md-2 col-xs-12">Opciones</td>
														</tr>
													</thead>
													<tbody>
													<?php foreach($listaPipPriorizar as $item ){ ?>
													  	<tr>
													    	<td>
																<?=$item->codigo_unico_pi?>
													    	</td>
													    	<td>
																<?=$item->nombre_pi?>
													    	</td>
													    	<td>
																
													    	</td>
													    	<td>
																<?=$item->nombre_funcion?>
													    	</td>
													    	<td>
															
													    	</td>
											

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
		</div>
	</div>
	<div class="clearfix"></div>
</div>
</div>
<script>
	$(document).ready(function()
	{
		$('#table-pip').DataTable(
		{
			"language" : idioma_espanol
		});
	});
</script>