<form class="form-horizontal"  id="form-addDetallePresupuesto" action="<?php echo base_url();?>index.php/FE_Detalle_Presupuesto/insertar" method="POST">
		<h4 style="margin-bottom: 0px;">Datos generales</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<label>Detalle gasto</label>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="TxtestudioInversion" value="" id="TxtestudioInversion" autocomplete="off" disabled="disabled">
				<input type="hidden" class="form-control" name="idEstudioInversion"  value="" id="idEstudioInversion" autocomplete="off">
			</div>
		</div>
		<h4 style="margin-bottom: 0px;">Detalle de Gasto</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row">
			<div class="col-md-9 col-sm-6 col-xs-12">
				<label>Tipo de Gasto</label>
				<select id="cbxTipoGasto" name="cbxTipoGasto" value="Seleccione Tipo De Gasto" class="form-control notValidate" required="">
					<option value="1,Tipo gastoto 1">Tipo gastoto 1</option>
					<option value="2,Tipo gastoto 2">Tipo gastoto 2</option>
				</select>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarTipoGasto" class="btn btn-success form-control" value="Agregar">
			</div>
		</div>
		<div class="row">
			<div>
				<div id="DetallePresupestoFormulacion">
					<div id="AreaDetallePF" class="col-xs-3">
						<ul id="pestanaDetallePF" class="nav nav-tabs tabs-left"><ul>
					</div>
					<div id="AreaContenidoDetallePF" class="col-xs-9" style="border: 1px solid #999999;">
						<div id="contePestanaDetallePF" class="tab-content"></div>
					</div>
				</div>
			</div>
		</div>
		<hr>
		<div class="row" style="text-align: right;">
			<button type="submit" class="btn btn-success">Guardar detalle del presupuesto</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>															

<script>
	$("#btnAgregarTipoGasto").on('click', function(event)
	{
		var posicionTemporal=$("#cbxTipoGasto").val().indexOf(',');
		var idTab=$("#cbxTipoGasto").val().substring(0, posicionTemporal);
		var nombreTab=$("#cbxTipoGasto").val().substring(posicionTemporal+1, $("#cbxTipoGasto").val().lenght);

		var htmlTempPestania='<li id="pestaniaTabPaneDetalleGasto'+idTab+'">'+
			'<a href="#tabPaneDetalleGasto'+idTab+'" data-toggle="tab"> '+nombreTab+' </a>'+
		'</li>';

		$('#DetallePresupestoFormulacion > #AreaDetallePF > #pestanaDetallePF ').append(htmlTempPestania);

		var htmlTempContenido='<div class="tab-pane" id="tabPaneDetalleGasto'+idTab+'">' + 
									'<div class="row">'+
							   			'<div class="col-md-12 col-sm-12 col-xs-12" style="text-align: left;">'+
							   				'<input type="button" class="btn btn-danger btn-xs" value="Eliminar todo el detalle" onclick="removerPanel('+idTab+');" style="margin: 2px;margin-left: 0px;">'+
							   			'</div>'+
							   			'<div class="col-md-12 col-sm-12 col-xs-12">'+
							   				'<h5>'+nombreTab+'</h5>'+
							   			'</div>'+
							   		'</div>'+
							   		'<hr style="margin-bottom: 4px;margin-top: 0px;">'+
							   		'<div class="row">'+
							   			'<div class="col-md-8 col-sm-8 col-xs-8">'+
								   			'<labe>Descripción</label></h6>'+
									   		'<input type="text" id="txtDescripcionDetalleGasto'+idTab+'" class="form-control" autocomplete="off">'+
								   		'</div>'+
								   		'<div class="col-md-4 col-sm-4 col-xs-4">'+
								   			'<labe>Undidad</label></h6>'+
									   		'<select id="selectIdUnidad'+idTab+'" class="form-control">'+
												'<option value="1,Unidad m. 1">Unidad m. 1</option>'+
												'<option value="2,Unidad m. 2">Unidad m. 2</option>'+
											'</select>'+
								   		'</div>'+
								   	'</div>'+
								   	'<div class="row">'+
							   			'<div class="col-md-4 col-sm-4 col-xs-4">'+
								   			'<labe>Cantidad</label></h6>'+
									   		'<input type="text" id="txtCantidadDetalleGasto'+idTab+'" class="form-control" autocomplete="off" onkeyup="calcularSubTotalDetalleGasto('+idTab+');">'+
								   		'</div>'+
								   		'<div class="col-md-4 col-sm-4 col-xs-4">'+
								   			'<labe>Costo U.</label></h6>'+
									   		'<input type="text" id="txtCostoUnitarioDetalleGasto'+idTab+'" class="form-control" autocomplete="off" onkeyup="calcularSubTotalDetalleGasto('+idTab+');">'+
								   		'</div>'+
								   		'<div class="col-md-4 col-sm-4 col-xs-4">'+
								   			'<labe>Total</label></h6>'+
									   		'<input type="text" id="txtSubTotalDetalleGasto'+idTab+'" class="form-control" autocomplete="off" readonly="readonly">'+
								   		'</div>'+
								   	'</div>'+
								   	'<div class="row" style="margin-top: 7px">'+
								   		'<div class="col-md-12 col-sm-12 col-xs-12">'+
							   				'<input type="button" class="btn btn-success form-control" value="Agregar" onclick="agregarDetalleGasto('+idTab+');">'+
							   			'</div>'+
								   	'</div>'+
								   	'<hr>'+
								   	'<table id="tableDetalleGasto'+idTab+'" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">'+
										'<thead>'+
											'<tr>'+
												'<th>Descripción</th>'+
												'<th>Unidad</th>'+
												'<th>C.</th>'+
												'<th>C. U.</th>'+
												'<th>Total</th>'+
												'<th></th>'+
											'</tr>'+
										'</thead>'+
										'<tbody></tbody>'+
									'</table>'+
			                  '</div>';

		$('#DetallePresupestoFormulacion > #AreaContenidoDetallePF > #contePestanaDetallePF ').append(htmlTempContenido);

	});

	function removerPanel(idTab)
	{
		$('#pestaniaTabPaneDetalleGasto'+idTab).remove();
		$('#tabPaneDetalleGasto'+idTab).remove();
	}

	function calcularSubTotalDetalleGasto(idTab)
	{
		var cantidadTemp=$('#txtCantidadDetalleGasto'+idTab).val();
		var costoUnitarioTemp=$('#txtCostoUnitarioDetalleGasto'+idTab).val();

		var temp=(cantidadTemp*costoUnitarioTemp).toFixed(2);

		$('#txtSubTotalDetalleGasto'+idTab).val(isNaN(temp) ? '' : temp);
	}

	function agregarDetalleGasto(idTab)
	{
		var posicionTemporal=$('#selectIdUnidad'+idTab).val().indexOf(',');
		var idUnidadMedidaTemporal=$('#selectIdUnidad'+idTab).val().substring(0, posicionTemporal);
		var nombreUnidadMedidaTemporal=$('#selectIdUnidad'+idTab).val().substring(posicionTemporal+1, $('#selectIdUnidad'+idTab).val().lenght);

		var htmlTempDetalle='<tr>'+
			'<td><input type="hidden">'+$('#txtDescripcionDetalleGasto'+idTab).val()+'</td>'+
			'<td><input type="hidden">'+nombreUnidadMedidaTemporal+'</td>'+
			'<td><input type="hidden">'+$('#txtCantidadDetalleGasto'+idTab).val()+'</td>'+
			'<td><input type="hidden">'+$('#txtCostoUnitarioDetalleGasto'+idTab).val()+'</td>'+
			'<td><input type="hidden">'+$('#txtSubTotalDetalleGasto'+idTab).val()+'</td>'+
			'<td><a href="#" onclick="$(this).parent().parent().remove();">Eliminar</a></td>'+
		'</tr>';
		
		$('#tableDetalleGasto'+idTab+' > tbody').append(htmlTempDetalle);

		limpiarText('tabPaneDetalleGasto'+idTab, []);
	}

</script>