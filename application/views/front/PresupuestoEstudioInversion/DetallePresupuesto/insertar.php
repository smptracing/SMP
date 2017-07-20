<form class="form-horizontal"  id="form-addDetallePresupuesto" action="<?php echo base_url();?>index.php/FE_Detalle_Presupuesto/insertar" method="POST">
		<h4 style="margin-bottom: 0px;">Datos generales</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<h6 style="margin-bottom: 0px;">Detalle de Gasto</h6>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<input type="text" class="form-control" name="TxtestudioInversion" value="" id="TxtestudioInversion" autocomplete="off" disabled="disabled">
				<input type="hidden" class="form-control" name="idEstudioInversion"  value="" id="idEstudioInversion" autocomplete="off">
			</div>
		</div>
		<h4 style="margin-bottom: 0px;">Detalle de Gasto</h4>
		<hr style="margin: 2px;margin-bottom: 5px;">
		<div class="row" id="divPresupuestoFuente">
			<div class="col-md-8 col-sm-6 col-xs-12">
				<label>Tipo de Gasto</label>
				<select id="cbxTipoGato" name="cbxTipoGato" value="Seleccione Tipo De Gasto" class="form-control notValidate" required="">
					<option value="1"> tipo gastoto 1</option>
					<option value="2"> tipo gastoto 2</option>
				</select>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<label>.</label>
				<input type="button" id="btnAgregarTipoGasto" class="btn btn-success form-control" value="Agregar">
			</div>
		</div>
		<div>
			<div id="DetallePresupestoFormulacion">
				<div id="AreaDetallePF" class="col-xs-3">
					<ul id="pestanaDetallePF" class="nav nav-tabs tabs-left">
					<ul>
				</div>
				<div id="AreaContenidoDetallePF" class="col-xs-9">
					<div id="contePestanaDetallePF" class="tab-content">
				    </div>
				</div>
			<div>
		<div>
			<table id="table-FEDetalleGasto" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
				<thead>
					<tr>
						<td>Descripción</td>
						<td>Costo U.</td>
						<td>Total</td>
						<td></td>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
		</div>
		<div class="row" style="text-align: right;">
			<button type="submit" class="btn btn-success">Registrar fuente de finan.</button>
			<button  class="btn btn-danger" data-dismiss="modal">Cancelar</button>
		</div>
</form>															

<script>
	$("#btnAgregarTipoGasto").on('click', function(event)
	{
		var idTap=$("#cbxTipoGato").val();
		var htmlTempPestania='<li class="">'+ 
				                '<a href="#'+idTap+'" data-toggle="tab"> '+idTap+' </a> '+
			                  '</li>'

		$('#DetallePresupestoFormulacion > #AreaDetallePF > #pestanaDetallePF ').append(htmlTempPestania);

		var htmlTempContenido='<div class="tab-pane" id="'+idTap+'">' + 
								   '<div>' +
								   		'<h6 style="margin-bottom: 0px;">Detalle de Gasto</h6>'+
								   		'<div class="row">'+
									   		'<div class="col-md-8 col-sm-8 col-xs-12">'+
									   		    '<input type="text" class="form-control" name="txtDetalleDescripcion" value="" id="txtDetalleDescripcion" autocomplete="off">'+
									   		'</div>'+
									   		'<div class="col-md-4 col-sm-4 col-xs-12">'+
									   		    '<input type="text" class="form-control" name="cbx_estudioInversion" value="" id="cbx_estudioInversion" autocomplete="off">'+
									   		'</div>'+
									   	'</div>'+
									   	'<div class="row">'+
									   		'<div class="col-md-5 col-sm-4 col-xs-12">'+
									   		    '<div class="col-md-12 col-sm-12 col-xs-12">'+
									   		    '<h6 style="margin-bottom: 0px;">Cantidad</h6>'+
									   		     	'<input type="text" class="form-control" name="txtDetalleCantidadGasto" value="" id="txtDetalleCantidadGasto" autocomplete="off">'+
									   			'</div>'+
									   		'</div>'+
									   		'<div class="col-md-5 col-sm-4 col-xs-12">'+
									   		    '<div class="col-md-12 col-sm-12 col-xs-12">'+
									   		    '<h6 style="margin-bottom: 0px;">Costo U</h6>'+
									   		     	'<input type="text" class="form-control" name="txtDetalleCostoUnitario" value="" id="txtDetalleCostoUnitario" autocomplete="off">'+
									   			'</div>'+
									   		'</div>'+
									   		'<div class="col-md-2 col-sm-2 col-xs-12">'+
									   		    '<div class="col-md-12 col-sm-12 col-xs-12">'+
									   		    '<h6 style="margin-bottom: 0px;">Total</h6>'+
									   		     	'<input type="text" class="form-control" name="txtDetalleCostoTotal" value="" id="txtDetalleCostoTotal" autocomplete="off">'+
									   			'</div>'+
									   		'</div>'+
									   	'</div>'+
									   	'<div class="row" style="text-align: center;">'+
									   			'<div class="col-md-12 col-sm-12 col-xs-12">'+
									   		    '<div class="col-md-12 col-sm-12 col-xs-12">'+
									   		    '<h6 style="margin-bottom: 0px;text-align: center; "></h6>'+
									   		      '<input type="button" id="btnAgregarDetalleGato" class="btn btn-success form-control" value="Agregar">'+
									   			'</div>'+
									   		'</div>'+
									   	'</div>'+
								   '<div>'+
			                  '</div>'

		$('#DetallePresupestoFormulacion > #AreaContenidoDetallePF > #contePestanaDetallePF ').append(htmlTempContenido);

	});
	$("#btnAgregarDetalleGato").on('click', function(event)
		{
			alert("hola");
			var htmlTempDetalle='<tr>'+
				'<td><input type="hidden" value='+$('#txtDescripcionFuente').val()+' name="hdDescripcionFuente[]"> '+$('#txtDescripcionFuente').val()+'</td>'+
				'<td><input type="hidden" value='+$('#txtCorelativoMeta').val()+' name="hdCorrelativoMeta[]">'+$('#txtCorelativoMeta').val()+'</td>'+
				'<td><input type="hidden" value='+$('#txtAnio').val()+' name="hdAnio[]">'+$('#txtAnio').val()+'</td>'+
				'<td><a href="#" onclick="$(this).parent().parent().remove();">Eliminar</a></td>'+
			'</tr>'
			$('#table-FEDetalleGasto > tbody').append(htmlTempDetalle);

		});

</script>