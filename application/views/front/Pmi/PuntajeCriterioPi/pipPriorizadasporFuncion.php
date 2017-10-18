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
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Pip Priorizadas por función</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
										<br>
									<div class="row">
										<input type="hidden" name="Aniao" id="Aniao" value="<?=$anioActual?>">
										<div class="col-md-3 col-xs-3"  style="margin-left: 100px;">
											<div class="form-group">
								                <div class="input-group"><br/>
													<label class="control-label">AÑO</label>
													<select  id="comboanio" name="comboanio" class="form-control col-md-2 col-xs-2">
													</select>
								                </div>
						            		</div>
										</div>
										<div class="col-md-3 col-xs-3"  style="margin-left: 150px;">
											<div class="form-group">
								                <div class="input-group"><br/>
													<label class="control-label">FUNCIÓN</label>
													<select  id="combofuncion" name="combofuncion" class="form-control col-md-2 col-xs-2">
														<option value="1"> Buscar Función</option>
													
															<?php foreach($PipFuncion as $item){ ?>
																<option value="<?=$item->id_funcion; ?>"  <?=($item->id_funcion==$id_funcion ? 'selected' : '')?>    ><?= $item->nombre_funcion;?></option>
															<?php } ?>

											
													</select>
								                </div>
						            		</div>
										</div>

										

										<div class="col-md-12 col-xs-12">
						
											<div class="x_content">
												<table id="table-pippriorizadasporfuncion" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td style="width:5%">Código</td>
															<td style="width:40%">Proyecto</td>
															<td style="width:5%">Prioridad</td>
															<td style="width:5%">Puntaje</td>
															<td style="width:15%">Función</td>
															<td style="width:5%">Opciones</td>
														</tr>
													</thead>
													<tbody>
													<?php $i=0; foreach($listarPipPriorizadaPorCadaFuncion as $item ){  ?>
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
																<?=$item->puntaje?>
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
		anios();
		var valor=$("#Aniao").val();
		$("#comboanio option[value="+valor+"]").attr("selected", true);

		$('#table-pippriorizadasporfuncion').DataTable(
		{
			"language" : idioma_espanol
		});

		$('#combofuncion').change('click', function(e)
		{
			//alert('hola');
				var anioPriorizacion=$("#comboanio").val();
				var funcion=$("#combofuncion").val();
				window.location.href=base_url+"index.php/PuntajeCriterioPi/pipPriorizadasPorFuncion/"+funcion+'.'+anioPriorizacion;
				anios();
		});
		$('#comboanio').change('click', function(e)
		{
				var anioPriorizacion=$("#comboanio").val();
				var funcion=$("#combofuncion").val();
				window.location.href=base_url+"index.php/PuntajeCriterioPi/pipPriorizadasPorFuncion/"+funcion+'.'+anioPriorizacion;
				anios();
		});


	});
	function anios()
	{
		var aniosI=2016;
		var html;
		for (var i =0; i <=2100; i++) {
			html +='<option value="'+(parseInt(aniosI)+parseInt(i))+'">'+(parseInt(aniosI)+parseInt(i))+'</option>';
		}
		$("#comboanio").append(html);

	}
	
</script>