<div class="right_col" role="main">
	<div class="">
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">
					<div class="x_content">
						<div class="" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Pip Priorizadas</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
											<div class="row"> <br/>
												<div class="col-md-3 col-xs-3" style="margin-left: 200px;position: absolute;margin-top: 7px;">
													Buscar PIP por Año Priorizado
						            			</div>
						            			<div class="col-md-3 col-xs-3"  style="margin-left: 300px;">
													<select  id="PipPriorizadoAnio" name="PipPriorizadoAnio" class="form-control" class="selectpicker" data-width="75%" data-live-search="true"></select>
						            			</div>
						            			<div class="col-md-3 col-xs-3"  style="margin-left: 460px;margin-top: -35px;">
													 <div class="pull-right tableTools-container"> Reportes </div>
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
															<td style="width:5%">Puntaje</td>
															<td style="width:15%">Función</td>
															<td style="width:5%">Opciones</td>
														</tr>
													</thead>
													<tbody>
													<?php $i=0; foreach($listaPipPriorizadasPorAño as $item ){  ?>
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
		$('#PipPriorizadoAnio').selectpicker('refresh');
		anios();
		var myTable=$('#table-pippriorizadas').DataTable(
		{
			"language":idioma_espanol,
			"searching": true,
			"info":     true,
			"paging":   true,
			"order": [[ 3, "DESC" ]],
		});

		$("#PipPriorizadoAnio").change(function(){
			var anio=$("#PipPriorizadoAnio").val();
			window.location.href=base_url+"index.php/PuntajeCriterioPi/pipPriorizadas/"+anio;
		});

		$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
				} );
				myTable.buttons().container().appendTo( $('.tableTools-container') );


	
	});

	function anios()
		{
			
			var aniosI=2015;

			var html;
			var itn=1;
			html +='<option value=""> Buscar Años </option>';
			for (var i=2015; i<=2050; i++) {
				
				html +='<option value="'+(parseInt(aniosI)+parseInt(itn))+'"> '+(parseInt(aniosI)+parseInt(itn))+' </option>';
				itn++;
			}
			var anio='<?= $anio;?>';
			$("#PipPriorizadoAnio").append(html);
			$('#PipPriorizadoAnio option[value='+anio+']').prop('selected', true);
			$('#PipPriorizadoAnio').selectpicker('refresh');


		}

	
</script>