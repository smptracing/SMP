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
								<li role="presentation" class="active"><a href="#tab_etapasFE" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Criterio Funcion</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade active in" id="#tab_etapasFE" aria-labelledby="home-tab">
									<div class="row">
										<div class="col-md-12 col-xs-12">
											<div class="x_panel">
											<div class="row">
												<div class="col-md-2 col-xs-2"  style="margin-left: 300px;">
													 <input type="text" class="form-control" placeholder="Ingrese Año" id="textAnio" name="textAnio"  data-inputmask="'mask' : '9999'">
												</div>
												<div class="col-md-3 col-xs-3"  style="margin-left: 50px;">
													 <button type="button" class="btn btn-success">Filtar Por años</button>
												</div>
												<div class="pull-left tableTools-container ">Reportes&nbsp;&nbsp;</div>
											</div>			
											<div class="x_content">
												<table id="table-Presupuesto" class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="100%">
													<thead>
														<tr>
															<td style="width: 1%">Codigo</td>
															<td>Función</td>
															<td style="width: 1%">N° Criterio</td>
															<td style="width: 1%">Opciones</td>
														</tr>
													</thead>
													<tbody>
															<?php foreach($listaCriterioFuncion as $item ){ ?>
													  	<tr>
															<td>
																<?=$item->codigo_funcion?>
													    	</td>
															<td>
																<?=$item->nombre_funcion?>
													    	</td>
													    	<td>
																N° <?=$item->CantCriteriosG?>
													    	</td>
													    	<td style="text-align: left;">
																<button type="button" class="btn btn-primary btn-xs " onclick="paginaAjaxDialogo(null, 'Registro Criterio Generales', { id_funcion:'<?=$item->id_funcion?>', nombre_funcion:'<?=$item->nombre_funcion?>' }, base_url+'index.php/PmiCriterioG/insertar', 'GET', null, null, false, true);"><span class="fa fa-plus-circle"></span>
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
		var myTable=$('#table-Presupuesto').DataTable(
		{
			"language" : idioma_espanol
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

		$('#textAnio').bind('keyup', function(e)
		{
			if(e.keyCode==13)
			{
				var anio=$("#textAnio").val();
				window.location.href=base_url+"index.php/PmiCriterioG/criterioFuncion/"+anio;
			}
		});

	});

</script>