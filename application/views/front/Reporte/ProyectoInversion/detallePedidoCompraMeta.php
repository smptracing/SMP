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
<div class="row">
	<div class="col-md-12 col-xs-12" style="height:600px;overflow:scroll;overflow-x: hidden;">
		<div class="x_panel">
			<div class="x_title">
				<h2><b>DETALLE DE PEDIDOS DE COMPRAS POR META</b> </h2>
				<?php $anio=0 ?>
				<?php foreach($listaDetallePorPedidoCompraMeta as $item ){ ?>
					<tr>
						<td>
							<?php  $anio = $item->ANO_EJE ;?>
						</td>	    	
					</tr>
				<?php } ?>				
				<div class="clearfix"></div>
				<label>AÑO :<?php  echo $anio ?></label>
			</div>
			<div class="x_content">
				<div class="table-responsive">
					<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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


														</tr>
														<?php } ?>
													</tbody>
													</table>					
				</div>
			</div>
		</div>
	</div>	
</div>

<script>
	$(document).ready(function()
	{
		$('#datatable-responsive').DataTable(
		{
			"language":idioma_espanol,
			"ordering":  false
		});
	});

	function detalleordenexpsiaf(anio,expsiaf)
	{
		paginaAjaxDialogo(1, 'Detalle de Expediente Siaf por Orden de Compra',{anio:anio,expsiaf:expsiaf}, base_url+'index.php/PrincipalReportes/detalleOrdenExpSiaf', 'GET', null, null, false, true);	
	}

	function detalleporcadanumorden(anio,tipobien,numorden,tipoppto)
	{
		paginaAjaxDialogo(2, 'Detalle por cada N° Orden',{anio:anio,tipobien:tipobien,numorden:numorden,tipoppto:tipoppto}, base_url+'index.php/PrincipalReportes/detallePorCadaNumOrden', 'GET', null, null, false, true);	
	}


	function detallepedidoPip(nropedido,anio,tipopedido,tipobien)
	{
		paginaAjaxDialogo(1, 'Detalle por pedido',{nropedido:nropedido,anio:anio,tipopedido:tipopedido,tipobien:tipobien}, base_url+'index.php/PrincipalReportes/detallePorCadaPedido', 'GET', null, null, false, true);	
	}
</script>



