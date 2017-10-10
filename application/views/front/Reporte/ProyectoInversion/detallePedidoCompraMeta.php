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
						<h2><b>DETALLE DE PEDIDOS DE COMPRAS POR META</b> </h2>
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
											<table id="table-DetallePedido"  class="table table-striped jambo_table bulk_action  table-hover" cellspacing="0" width="2500px">
												<thead>
													<tr>
														<td>Tipo bien</td>
														<td>Tipo Pedido</td>
														<td>Nro Pedido</td>
														<td>Fecha Pedido</td>
														<td>Motivo pedido</td>
														<td>Estado</td>
														<td>Fecha Aprobado</td>
														<td>Fecha Atendido</td>
														<td>Fecha Registro </td>
														<td>Equipo Registro</td>
														<td>Fecha Registro visto bueno</td>
														<td>Equipo Registro visto bueno</td>
														<td>Personal</td>
														<td>ver</td>
													</tr>
												</thead>
												<tbody>
													<?php foreach($listaDetallePorPedidoCompraMeta as $item ){ ?>
													  	<tr>
															
													    	<td>
																<?=$item->TIPO_BIEN?>
													    	</td>
													    	<td>
																<?=$item->TIPO_PEDIDO?>
													    	</td>
													    	<td>
																
				<button type="button" class="clasificador btn btn-primary btn-xs" onclick="detallepedidoPip(<?= (int)$item->NRO_PEDIDO?>,<?= (int)$item->ANO_EJE?>,<?= (int)$item->TIPO_PEDIDO?>,'<?=$item->TIPO_BIEN?>');"><?=$item->NRO_PEDIDO?><i class='ace-icon bigger-120'></i></button>

													    	</td>
													    	<td>
																<?=$item->FECHA_PEDIDO?>
													    	</td>
													    	<td>
																<?=$item->MOTIVO_PEDIDO?>
													    	</td>
											
													    	<td>
																<?=$item->ESTADO?>
													    	</td>
															<td>
																<?=$item->FECHA_APROB?>
													    	</td>
													    	<td>
																<?=$item->FECHA_ATENC?>
													    	</td>
													    	<td>
																<?=$item->FECHA_REG?>
													    	</td>
													    	
													    	<td>
																<?=$item->EQUIPO_REG?>
													    	</td>
													    	<td>
																<?=$item->fecha_reg_vb?>
													    	</td>
													    	<td>
																<?=$item->equipo_reg_vb?>
													    	</td>
													    	<td>
																<?=$item->personal?>
													    	</td>
													    	<td>
													    		<button type="button" class="btn btn-primary btn-xs " onclick="EditarCriterioGeneral()"><i class="fa fa-pencil"></i></button>
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
			
			});
function detallepedidoPip(nropedido,anio,tipopedido,tipobien)
	{
		paginaAjaxDialogo(null, 'Detalle por pedido',{nropedido:nropedido,anio:anio,tipopedido:tipopedido,tipobien:tipobien}, base_url+'index.php/PrincipalReportes/detallePorCadaPedido', 'GET', null, null, false, true);	
	}
</script>

