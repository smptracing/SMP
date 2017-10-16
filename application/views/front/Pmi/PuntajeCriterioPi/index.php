<div class="right_col" role="main">
	<div class="">
		<div class="">
			<div class="col-md-12 col-xs-12">
				<div class="x_panel">

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
											<input type="hidden" name="Aniao" id="Aniao" value="<?= $anioActual?>">
											<div class="col-md-3 col-xs-3"  style="margin-left: 100px;">
												<div class="form-group">
									                <div class="input-group"><br/>
														<label class="control-label">ANIO</label>
														<select  id="comboanio" name="comboanio" class="form-control col-md-2 col-xs-2">
														</select>
									                </div>
							            		</div>
											</div>
											<div class="col-md-3 col-xs-3"  style="margin-left: 50px;">
												<div class="form-group">
									                <div class="input-group"><br/>
														<label class="control-label">FUNCION</label>
														<select  id="combofuncion" name="combofuncion" class="form-control col-md-2 col-xs-2">
															<option value="1"> Buscar Función</option>
															<?php foreach($listarFuncion as $item){ ?>
																<option value="<?=$item->id_funcion; ?>" <?=($item->id_funcion==$id_funcion ? 'selected' : '')?>><?= $item->nombre_funcion;?></option>
															<?php } ?>
														</select>
									                </div>
							            		</div>
											</div>
											<div class="form-group"></br>
										                <label class="control-label" for="inputGroup">Reportes </label>
										                <div class="input-group">
														<div class="pull-left tableTools-container ">&nbsp;&nbsp;</div>

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
															<td style="">Año criterio </td>
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
																<?=$item->anio_criterio_gen ?>
													    	</td>
													    	<td>
															<button type="button" class="btn btn-success btn-xs " onclick="paginaAjaxDialogo(null, 'Asignar Prioridad', {id_pi:<?=$item->id_pi?>,id_funcion:<?=$id_funcion?>}, base_url+'index.php/PuntajeCriterioPi/insertar', 'GET', null, null, false, true);"><span class="fa fa-bars"></span>
															</button>
															<!--<button type="button" class="btn btn-success btn-xs " onclick="ReporteCriteriosPorPip(<?=$item->id_funcion?>,<?=$item->anio_criterio_gen?>);"><i class="fa fa-file-pdf-o"></i>
															</button>-->
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

		var myTable=$('#table-pip').DataTable(
		{
			
			"language" : idioma_espanol,
		
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
				"className": "btn btn-white btn-primary btn-bold",
				"pageSize": 'LEGAL',
				orientation: 'landscape',
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
		$('#combofuncion').change('click', function(e)
		{
			//alert('hola');
				var anioPriorizacion=$("#comboanio").val();
				var funcion=$("#combofuncion").val();
				window.location.href=base_url+"index.php/PuntajeCriterioPi/index/"+funcion+'.'+anioPriorizacion;
				anios();
		});
		$('#comboanio').change('click', function(e)
		{
			//alert('hola');
				var anioPriorizacion=$("#comboanio").val();
				var funcion=$("#combofuncion").val();
				window.location.href=base_url+"index.php/PuntajeCriterioPi/index/"+funcion+'.'+anioPriorizacion;
				anios();
		});

		
	});

	function ReporteCriteriosPorPip()
	{
		var dirurl=base_url+"index.php/PuntajeCriterioPi/reporteCriteriosPorCadaPi/"+id_funcion+'.'+anio_criterio_gen;
		        ventana=window.open(dirurl, 'Nombre de la ventana', 'width=1400,height=800');
	}
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