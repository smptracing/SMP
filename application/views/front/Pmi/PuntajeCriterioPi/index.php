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
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Criterio</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="col-md-3 col-xs-3"  style="margin-left: 300px;">
												<div class="form-group">
									                <div class="input-group"><br/>
														<label class="control-label">Seleccionar función</label>
														<select  id="combofuncion" name="combofuncion" class="form-control col-md-2 col-xs-2">
															<?php foreach($listarFuncion as $item){ ?>
																<option value="<?=$item->id_funcion; ?>" <?=($item->id_funcion==$id_funcion ? 'selected' : '')?>><?= $item->nombre_funcion;?></option>
															<?php } ?>
														</select>
									                </div>
							            		</div>
											</div>
											<div class="x_content">
												<table id="table-pip" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
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
													<?php $i=0; foreach($listaPipPriorizar as $item ){  ?>
													  	<tr>
													    	<td>
																<?=$item->codigo_unico_pi?>
													    	</td>
													    	<td>
																<?=$item->nombre_pi?>
													    	</td>
													    	<td>
																<?php if($item->puntaje==null){ echo 'na'; }else{$i++; echo $i;} ?>
													    	</td>
													    	<td>
																<?=$item->nombre_funcion?>
													    	</td>
													    	<td>
															<button type="button" class="btn btn-success btn-xs " onclick="paginaAjaxDialogo(10, 'Asignar Prioridad', {id_pi:<?=$item->id_pi?>,id_funcion:<?=$id_funcion?>}, base_url+'index.php/PuntajeCriterioPi/insertar', 'GET', null, null, false, true);"><span class="fa fa-bars"></span>
															</button>
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

		$('#combofuncion').change('click', function(e)
		{
			//alert('hola');
				var funcion=$("#combofuncion").val();
				window.location.href=base_url+"index.php/PuntajeCriterioPi/index/"+funcion;
			
		});
	});


		
</script>