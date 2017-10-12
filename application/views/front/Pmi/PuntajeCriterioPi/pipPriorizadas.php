<div class="right_col" role="main">
	<div class="">
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title" style="color: black; ">
						
					</div>
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Pip Priorizadas</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
										<br>
									<div class="row">
										<div class="col-md-3 col-xs-3"  style="margin-left: 300px;">
													<div class="form-group">
										                <label class="control-label" for="inputGroup">Buscar PIP por Año Priorizado</label>
										                <div class="input-group">
															<input type="text" class="form-control" placeholder="Ingrese Año Priorizado" id="textAnio" name="textAnio" value="" data-inputmask="'mask' : '9999'">
										                    <span class="input-group-addon">
										                        <i class="fa fa-search"></i>
										                    </span>
										                </div>
								            		</div>
												</div>
										<div class="col-md-12 col-xs-12">
						
											<div class="x_content">
												<table id="table-pippriorizadas" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td style="width:5%">Código</td>
															<td style="width:40%">Proyecto</td>
															<td style="width:5%">Prioridad</td>
															<td style="width:15%">Función</td>
															<td style="width:5%">Opciones</td>
														</tr>
													</thead>
													<tbody>
										
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
		$('#table-pippriorizadas').DataTable(
		{
			"language" : idioma_espanol
		});

	});

	
</script>