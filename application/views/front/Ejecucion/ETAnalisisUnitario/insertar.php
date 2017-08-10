<div class="form-horizontal">
	<?php foreach($listaETAnalisisUnitario as $value){ ?>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<h4 style="color: blue;text-decoration: underline;"><?=$value->desc_recurso?></h4>
				<div id="divFormDetallaAnalisisUnitario<?=$value->id_analisis?>">
					<div class="row">
						<div class="col-md-7 col-sm-7 col-xs-12">
							<label for="control-label">Descripción del insunmo</label>
							<div>
								<select name="selectDescripcionDetalleAnalisis" id="selectDescripcionDetalleAnalisis<?=$value->id_analisis?>" class="form-control"></select>
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cuadrilla</label>
							<div>
								<input type="text" id="txtCuadrilla<?=$value->id_analisis?>" class="form-control" onkeyup="calcularCantidad(<?=$value->id_analisis?>);calcularSubTotal(<?=$value->id_analisis?>);">
							</div>
						</div>
						<div class="col-md-1 col-sm-1 col-xs-12">
							<label for="control-label">Horas</label>
							<div>
								<input type="text" id="txtHoras<?=$value->id_analisis?>" class="form-control" onkeyup="calcularCantidad(<?=$value->id_analisis?>);calcularSubTotal(<?=$value->id_analisis?>);" value="8">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Undidad</label>
							<div>
								<select name="selectUnidadMedida" id="selectUnidadMedida<?=$value->id_analisis?>" class="form-control">
									<?php foreach($listaUnidadMedida as $item){ ?>
										<option value="<?=$item->id_unidad?>"><?=$item->descripcion?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Rendimiento</label>
							<div>
								<input type="text" id="txtRendimiento<?=$value->id_analisis?>" class="form-control" onkeyup="calcularCantidad(<?=$value->id_analisis?>);calcularSubTotal(<?=$value->id_analisis?>);">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">Cantidad</label>
							<div>
								<input type="text" id="txtCantidad<?=$value->id_analisis?>" class="form-control" onkeyup="calcularRendimiento(<?=$value->id_analisis?>);calcularSubTotal(<?=$value->id_analisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Precio unitario</label>
							<div>
								<input type="text" id="txtPrecioUnitario<?=$value->id_analisis?>" class="form-control" onkeyup="calcularSubTotal(<?=$value->id_analisis?>);">
							</div>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<label for="control-label">Sub total</label>
							<div>
								<input type="text" id="txtSubTotal<?=$value->id_analisis?>" class="form-control" readonly="readonly">
							</div>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<label for="control-label">.</label>
							<div>
								<input type="button" class="btn btn-info" value="Agregar" style="width: 100%;" onclick="registrarDetalleAnalisisUnitario(<?=$value->id_analisis?>);">
							</div>
						</div>
					</div>
				</div>
				<div>
					<table id="tableDetalleAnalisisUnitario<?=$value->id_analisis?>" class="table">
						<thead>
							<tr>
								<th>Descripción</th>
								<th>Cuadrilla</th>
								<th>Und.</th>
								<th>Rendimiento</th>
								<th>Cant.</th>
								<th>Precio U.</th>
								<th>Sub total</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($value->childETDetalleAnalisisUnitario as $item){ ?>
								<tr>
									<td><?=$item->desc_detalle_analisis?></td>
									<td><?=$item->cuadrilla?></td>
									<td><?=$item->descripcion?></td>
									<td><?=$item->rendimiento?></td>
									<td><?=$item->cantidad?></td>
									<td><?=$item->precio_unitario?></td>
									<td><?=$item->precio_parcial?></td>
									<td>
										<a href="#" style="color: red;text-decoration: underline;" onclick="eliminarDetalleAnalisisUnitario(<?=$item->id_detalle_analisis_u?>, this);"><b>Eliminar</b></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>
	<hr>
	<div class="row" style="text-align: right;">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	$(function()
	{
		$('[id*="selectDescripcionDetalleAnalisis"]').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/ET_Insumo/verPorDescripcion',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        locale:
	        {
	            emptyTitle: 'Buscar insumo'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];

	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].desc_insumo,
	                    "text" : data[i].desc_insum,
	                    "data" :
	                    {
	                    	"id-unidad" : data[i].id_unidad
	                    },
	                    "disabled" : false
	                });
	        	}

	            return dataForSelect;
	        },
	        preserveSelected: false
	    });

	    $('[id*="selectDescripcionDetalleAnalisis"]').on('change', function()
	    {
			var selected=$(this).find("option:selected").val();

			if(selected.trim()!='')
			{
				$('#selectUnidadMedida').val($(this).find("option:selected").data('id-unidad'));
			}
	    });
	});

	function calcularCantidad(idAnalisisUnitario)
	{
		var cuadrilla=$('#txtCuadrilla'+idAnalisisUnitario).val();
		var horas=$('#txtHoras'+idAnalisisUnitario).val();
		var rendimiento=$('#txtRendimiento'+idAnalisisUnitario).val();
		var cantidad=null;

		if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(horas) && horas.trim()!='' && !isNaN(rendimiento) && rendimiento.trim()!='')
		{
			cantidad=parseFloat(cuadrilla)/(parseFloat(horas)*parseFloat(rendimiento));

			$('#txtCantidad'+idAnalisisUnitario).val(cantidad);
		}
		else
		{
			$('#txtCantidad'+idAnalisisUnitario).val('');
		}
	}

	function calcularRendimiento(idAnalisisUnitario)
	{
		var cuadrilla=$('#txtCuadrilla'+idAnalisisUnitario).val();
		var cantidad=$('#txtCantidad'+idAnalisisUnitario).val();
		var horas=$('#txtHoras'+idAnalisisUnitario).val();
		var rendimiento=null;

		if(!isNaN(cuadrilla) && cuadrilla.trim()!='' && !isNaN(cantidad) && cantidad.trim()!='' && !isNaN(horas) && horas.trim()!='')
		{
			rendimiento=parseFloat(cuadrilla)/(parseFloat(cantidad))/(parseFloat(horas));

			$('#txtRendimiento'+idAnalisisUnitario).val(rendimiento);
		}
		else
		{
			$('#txtRendimiento'+idAnalisisUnitario).val('');
		}
	}

	function calcularSubTotal(idAnalisisUnitario)
	{
		var cantidad=$('#txtCantidad'+idAnalisisUnitario).val();
		var precioUnitario=$('#txtPrecioUnitario'+idAnalisisUnitario).val();
		var subTotal=null;

		if(!isNaN(cantidad) && cantidad.trim()!='' && !isNaN(precioUnitario) && precioUnitario.trim()!='')
		{
			subTotal=cantidad*precioUnitario;

			$('#txtSubTotal'+idAnalisisUnitario).val(subTotal.toFixed(2));
		}
		else
		{
			$('#txtSubTotal'+idAnalisisUnitario).val('');
		}
	}

	function registrarDetalleAnalisisUnitario(idAnalisis)
	{
		var descripcion=$('#selectDescripcionDetalleAnalisis'+idAnalisis).val()==null ? '' : $('#selectDescripcionDetalleAnalisis'+idAnalisis).val();
		var cuadrilla=$('#txtCuadrilla'+idAnalisis).val();
		var unidadMedida=$('#selectUnidadMedida'+idAnalisis).val();
		var rendimiento=$('#txtRendimiento'+idAnalisis).val();
		var cantidad=$('#txtCantidad'+idAnalisis).val();
		var precioUnitario=$('#txtPrecioUnitario'+idAnalisis).val();
		var subTotal=parseFloat(parseFloat(precioUnitario).toFixed(2))*cantidad;

		var existeComponente=false;

		$('#tableDetalleAnalisisUnitario'+idAnalisis+' > tbody').find('tr').each(function(index, element)
		{
			if(replaceAll(descripcion, ' ', '')==replaceAll($($(element).find('td')[0]).text(), ' ', ''))
			{
				existeComponente=true;

				return false;
			}
		});

		if(existeComponente)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos veces el mismo detalle de análisis.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idAnalisis" : idAnalisis, "idUnidad" : unidadMedida, "descripcionDetalleAnalisis" : descripcion.trim(), "cuadrilla" : cuadrilla, "cantidad" : cantidad, "precioUnitario" : precioUnitario, "precioParcial" : subTotal, "rendimiento" : rendimiento }, base_url+'index.php/ET_Detalle_Analisis_Unitario/insertar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			if(objectJSON.proceso=='Error')
			{
				return false;
			}

			var htmlTemp='<tr>'+
				'<td>'+descripcion+'</td>'+
				'<td>'+parseFloat(cuadrilla).toFixed(2)+'</td>'+
				'<td>'+objectJSON.nombreUnidadMedida+'</td>'+
				'<td>'+parseFloat(rendimiento).toFixed(2)+'</td>'+
				'<td>'+parseFloat(cantidad).toFixed(2)+'</td>'+
				'<td>'+parseFloat(precioUnitario).toFixed(2)+'</td>'+
				'<td>'+parseFloat(subTotal).toFixed(2)+'</td>'+
				'<td>'+
					'<a href="#" style="color: red;text-decoration: underline;" onclick="eliminarDetalleAnalisisUnitario('+objectJSON.idDetalleAnalisisUnitario+', this)"><b>Eliminar</b></a>'+
				'</td>'+
			'</tr>';

			$('#tableDetalleAnalisisUnitario'+idAnalisis+' > tbody').append(htmlTemp);

			limpiarText('divFormDetallaAnalisisUnitario'+idAnalisis, ['txtHoras'+idAnalisis]);
		}, false, true);
	}

	function eliminarDetalleAnalisisUnitario(idDetalleAnalisisUnitario, element)
	{
		if(confirm('¿Realmente desea borrar el detalle del análisis unitario?'))
		{
			paginaAjaxJSON({ "idDetalleAnalisisUnitario" : idDetalleAnalisisUnitario }, base_url+'index.php/ET_Detalle_Analisis_Unitario/eliminar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				$(element).parent().parent().remove();
			}, false, true);
		}
	}
</script>