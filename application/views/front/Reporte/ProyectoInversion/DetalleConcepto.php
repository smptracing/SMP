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
				<h2><b>DATOS GENERALES Y DETALLE POR ORDEN DE PEDIDOS</b> </h2>
				<?php $anio=0 ?>
				<?php foreach($listaPorOrden as $item ){ ?>
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
								<th></th>
								<th>Exp Siaf | Nro Orden</th>
								<th>Concepto</th>
								<th>Sub total S/.</th>
								<th>Total Igv S/.</th>
								<th>Total Fact S/.</th>
								<th>Tipo bien</th>
								<th>Fecha de orden</th>
								<th>Doc referencia</th>
								<th>Exp Siga</th>

								<th>Proveedor</th>
								<th>Dirección</th>
								<th>Giro General</th>
								<th>Nro Ruc</th>
								<th>Teléfonos</th>
								<th>CCI</th>
								<th>Teléfono Fax</th>
								<th>Año Eje</th>
								<th>Tipo Ppto</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($listaPorOrden as $item ){ ?>
							<tr>
								<td></td>
								<td>    
								<button type="button" class="DetalleOrdenExpeSiaf btn btn-primary btn-xs" onclick="detalleordenexpsiaf(<?= (int)$item->ANO_EJE?>,<?= (int)$item->EXP_SIAF?>);"><?=$item->EXP_SIAF?><i class='ace-icon bigger-120'></i></button>
								<button type="button" class="DetalleOrdenExpeSiaf btn btn-success btn-xs" onclick="detalleporcadanumorden(<?= (int)$item->ANO_EJE?>,'<?=$item->TIPO_BIEN?>',<?=(int)$item->NRO_ORDEN?>,<?=(int)$item->TIPO_PPTO?>);"><?=$item->NRO_ORDEN?><i class='ace-icon bigger-120'></i></button>    
								</td>
								<td>
								<?=$item->CONCEPTO?>
								</td>
								<td style="text-align:right">
								<?=number_format($item->SUBTOTAL_SOLES,2)?>
								</td>
								<td style="text-align:right">
								<?=number_format($item->SUBTOTAL_SOLES,2)?>
								</td>
								<td style="text-align:right">
								<?=number_format($item->TOTAL_FACT_SOLES,2)?>
								</td>
								<td>
								<?=$item->TIPO_BIEN?>
								</td>
								<td>
								<?=$item->FECHA_ORDEN?>
								</td>
								<td>
								<?=$item->DOCUM_REFERENCIA?>
								</td>
								<td>
								<?=$item->EXP_SIGA?>
								</td>
								<td>
								<?=$item->NOMBRE_PROV?>
								</td>
								<td>
								<?=$item->DIRECCION?>
								</td>
								<td>
								<?=$item->GIRO_GENERAL?>
								</td>
								<td>
								<?=$item->NRO_RUC?>
								</td>
								<td>
								<?=$item->TELEFONOS?>
								</td>
								<td>
								<?=$item->CCI?>
								</td>
								<td>
								<?=$item->TELEFONO_FAX?>
								</td>
								<td>
								<?=$item->ANO_EJE?>
								</td>
								<td>
								<?=$item->TIPO_PPTO?>
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
</script>





