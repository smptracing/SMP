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
						<h2><b>DETALLE POR CADA PEDIDO</b> </h2>
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
									
									<div class="clearfix">
										<div class="pull-right tableTools-container"></div>
									</div>

									<div class="row">  
										<div class="col-md-12 col-sm-12 col-xs-12">
											 <div class="table-responsive" >
											<table id="table-DetallePorCadaPedido"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="2500px">
												<thead>
													<tr>
														<td>Tipo bien</td>
														<td>Tipo Pedido</td>
														<td>Nro Pedido</td>
														<td>Secuencia</td>
														<td>Cant. solicitada</td>
														<td>Cant. Aprobada</td>
														<td>Cant. Atendida</td>
														<td>Precio unitario</td>
														<td>Valor total </td>
														<td>Fecha conformidad</td>
														<td>Fecha cuadro</td>
														<td>Fecha registro</td>
														<td>Fecha pecosa</td>
														<td>Fecha aprobado</td>
														<td>Clasificador</td>
														<td>Nombre Clasificador</td>
													</tr>
												</thead>
												<tbody>
														<?php foreach($listadetalleporcadapedido as $item ){ ?>
													  	<tr>
															
													    	<td>
																<?=$item->TIPO_BIEN?>
													    	</td>
													    	<td>
																<?=$item->TIPO_PEDIDO?>
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
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<script>

$(document).ready(function()
	{
		var myTable=$('#table-DetallePedido').DataTable(
		{
			"language":idioma_espanol,
            "searching": true,
             "info":     true,
            "paging":   true,
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
			
			})   

</script>
