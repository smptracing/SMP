<div class="form-horizontal">
	<div id="divInsertarAnalisisUnitario" class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="control-label">Recurso</label>
			<div>
				<select name="selectRecurso" id="selectRecurso" class="form-control">
					<?php foreach($listaETRecurso as $value){ ?>
						<option value="<?=$value->id_recurso.','.$value->desc_recurso?>"><?=$value->desc_recurso?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<label for="control-label">Presupuesto analítico (Clasificador)</label>
			<div>
				<select name="selectPresupuestoAnalitico" id="selectPresupuestoAnalitico" class="form-control">
					<?php foreach($listaETPresupuestoAnalitico as $value){ ?>
						<option value="<?=$value->id_analitico?>"><?=$value->desc_clasificador?></option>
					<?php } ?>
				</select>
			</div>
		</div>
	</div>
	<div id="divPresupuestoParaEjecucion" class="row">
		<div class="col-md-8 col-sm-8 col-xs-12">
			<label for="control-label">Presupuesto para ejecuión</label>
			<div>
				<input type="text" id="txtPresupuestoEjecucion" class="form-control" readonly="readonly">
			</div>
		</div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<label for="control-label">.</label>
			<div>
				<input type="button" class="btn btn-info" value="Agregar recurso para A.U." style="width: 100%;" onclick="registrarAnalisisUnitario();">
			</div>
		</div>
	</div>
	<hr style="margin: 4px;">
	<div id="divListaAnalisisUnitario">
		<?php foreach($listaETAnalisisUnitario as $value){ ?>
			<div class="panel-group" style="margin: 2px;">
				<div class="panel panel-default">
					<div class="panel-heading" data-toggle="collapse" href="#collapse<?=$value->id_analisis?>" style="cursor: pointer;">
						<h4 class="panel-title">
							<a><?=$value->desc_recurso?></a>
						</h4>
					</div>
					<div id="collapse<?=$value->id_analisis?>" class="panel-collapse collapse">
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div id="divFormDetallaAnalisisUnitario<?=$value->id_analisis?>" style="padding: 4px;">
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<input type="button" class="btn btn-danger btn btn-xs" value="Eliminar este análisis unitario" onclick="eliminarAnalisisUnitario(<?=$value->id_analisis?>, this);">
										</div>
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
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<hr style="margin-top: 4px;">
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
		$('#selectRecurso').selectpicker({ liveSearch: true });
		$('#selectPresupuestoAnalitico').selectpicker({ liveSearch: true });

		$('#selectPresupuestoAnalitico').on('change', function()
	    {
			var selected=$(this).find("option:selected").val();

			if(selected.trim()!='')
			{
				$('#txtPresupuestoEjecucion').val(selected.substring(selected.indexOf(','), selected.length));
			}
			else
			{
				$('#txtPresupuestoEjecucion').val(null);
			}
	    });

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
				$('#selectUnidadMedida'+$(this).attr('id').substring(32)).val($(this).find("option:selected").data('id-unidad'));
			}
	    });

	    $('#divInsertarAnalisisUnitario').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				selectRecurso:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Recurso" es requerido.</b>'
						}
					}
				}
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

	function registrarAnalisisUnitario()
	{
		$('#divInsertarAnalisisUnitario').data('formValidation').resetField($('#selectRecurso'));

		$('#divInsertarAnalisisUnitario').data('formValidation').validate();

		if(!($('#divInsertarAnalisisUnitario').data('formValidation').isValid()))
		{
			return;
		}

		var recurso=$('#selectRecurso').val();
		var idRecurso=recurso.substring(0, recurso.indexOf(','));
		var descripcionRecurso=recurso.substring(recurso.indexOf(',')+1, recurso.length);
		var idAnalitico=$('#selectPresupuestoAnalitico').val();

		var existeComponente=false;

		$('#divListaAnalisisUnitario').find('> .panel-group > .panel-default > .panel-heading > h4 > a').each(function(index, element)
		{
			if(replaceAll(descripcionRecurso, ' ', '')==replaceAll($(element).text(), ' ', ''))
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

		paginaAjaxJSON({ "idAnalitico" : idAnalitico, "idRecurso" : idRecurso, "idDetallePartida" : <?=$etDetallePartida->id_detalle_partida?> }, base_url+'index.php/ET_Analisis_Unitario/insertar', 'POST', null, function(objectJSON)
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

			var htmlTemp='<div class="panel-group" style="margin: 2px;">'+
				'<div class="panel panel-default">'+
					'<div class="panel-heading" data-toggle="collapse" href="#collapse'+objectJSON.idAnalisis+'" style="cursor: pointer;">'+
						'<h4 class="panel-title">'+
							'<a>'+descripcionRecurso+'</a>'+
						'</h4>'+
					'</div>'+
					'<div id="collapse'+objectJSON.idAnalisis+'" class="panel-collapse collapse">'+
						'<div class="row">'+
							'<div class="col-md-12 col-sm-12 col-xs-12">'+
								'<div id="divFormDetallaAnalisisUnitario'+objectJSON.idAnalisis+'" style="padding: 4px;">'+
									'<div class="row">'+
										'<div class="col-md-12 col-sm-12 col-xs-12">'+
											'<input type="button" class="btn btn-danger btn btn-xs" value="Eliminar este análisis unitario" onclick="eliminarAnalisisUnitario('+objectJSON.idAnalisis+', this);">'+
										'</div>'+
										'<div class="col-md-7 col-sm-7 col-xs-12">'+
											'<label for="control-label">Descripción del insunmo</label>'+
											'<div>'+
												'<select name="selectDescripcionDetalleAnalisis" id="selectDescripcionDetalleAnalisis'+objectJSON.idAnalisis+'" class="form-control"></select>'+
											'</div>'+
										'</div>'+
										'<div class="col-md-2 col-sm-2 col-xs-12">'+
											'<label for="control-label">Cuadrilla</label>'+
											'<div>'+
												'<input type="text" id="txtCuadrilla'+objectJSON.idAnalisis+'" class="form-control" onkeyup="calcularCantidad('+objectJSON.idAnalisis+');calcularSubTotal('+objectJSON.idAnalisis+');">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-1 col-sm-1 col-xs-12">'+
											'<label for="control-label">Horas</label>'+
											'<div>'+
												'<input type="text" id="txtHoras'+objectJSON.idAnalisis+'" class="form-control" onkeyup="calcularCantidad('+objectJSON.idAnalisis+');calcularSubTotal('+objectJSON.idAnalisis+');" value="8">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-2 col-sm-2 col-xs-12">'+
											'<label for="control-label">Undidad</label>'+
											'<div>'+
												'<select name="selectUnidadMedida" id="selectUnidadMedida'+objectJSON.idAnalisis+'" class="form-control">';

													<?php foreach($listaUnidadMedida as $item){ ?>
														htmlTemp+='<option value="<?=$item->id_unidad?>"><?=$item->descripcion?></option>';
													<?php } ?>

												htmlTemp+='</select>'+
											'</div>'+
										'</div>'+
									'</div>'+
									'<div class="row">'+
										'<div class="col-md-2 col-sm-2 col-xs-12">'+
											'<label for="control-label">Rendimiento</label>'+
											'<div>'+
												'<input type="text" id="txtRendimiento'+objectJSON.idAnalisis+'" class="form-control" onkeyup="calcularCantidad('+objectJSON.idAnalisis+');calcularSubTotal('+objectJSON.idAnalisis+');">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-2 col-sm-2 col-xs-12">'+
											'<label for="control-label">Cantidad</label>'+
											'<div>'+
												'<input type="text" id="txtCantidad'+objectJSON.idAnalisis+'" class="form-control" onkeyup="calcularRendimiento('+objectJSON.idAnalisis+');calcularSubTotal('+objectJSON.idAnalisis+');">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3 col-sm-3 col-xs-12">'+
											'<label for="control-label">Precio unitario</label>'+
											'<div>'+
												'<input type="text" id="txtPrecioUnitario'+objectJSON.idAnalisis+'" class="form-control" onkeyup="calcularSubTotal('+objectJSON.idAnalisis+');">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-3 col-sm-3 col-xs-12">'+
											'<label for="control-label">Sub total</label>'+
											'<div>'+
												'<input type="text" id="txtSubTotal'+objectJSON.idAnalisis+'" class="form-control" readonly="readonly">'+
											'</div>'+
										'</div>'+
										'<div class="col-md-2 col-sm-2 col-xs-12">'+
											'<label for="control-label">.</label>'+
											'<div>'+
												'<input type="button" class="btn btn-info" value="Agregar" style="width: 100%;" onclick="registrarDetalleAnalisisUnitario('+objectJSON.idAnalisis+');">'+
											'</div>'+
										'</div>'+
									'</div>'+
								'</div>'+
								'<div>'+
									'<table id="tableDetalleAnalisisUnitario'+objectJSON.idAnalisis+'" class="table">'+
										'<thead>'+
											'<tr>'+
												'<th>Descripción</th>'+
												'<th>Cuadrilla</th>'+
												'<th>Und.</th>'+
												'<th>Rendimiento</th>'+
												'<th>Cant.</th>'+
												'<th>Precio U.</th>'+
												'<th>Sub total</th>'+
												'<th></th>'+
											'</tr>'+
										'</thead>'+
										'<tbody>'+
										'</tbody>'+
									'</table>'+
								'</div>'+
							'</div>'+
						'</div>'+
					'</div>'+
				'</div>'+
			'</div>';

			$('#divListaAnalisisUnitario').append(htmlTemp);

			$('#selectDescripcionDetalleAnalisis'+objectJSON.idAnalisis).selectpicker({ liveSearch: true }).ajaxSelectPicker(
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

		    $('#selectDescripcionDetalleAnalisis'+objectJSON.idAnalisis).on('change', function()
		    {
				var selected=$(this).find("option:selected").val();

				if(selected.trim()!='')
				{
					$('#selectUnidadMedida'+$(this).attr('id').substring(32)).val($(this).find("option:selected").data('id-unidad'));
				}
		    });

			limpiarText('divPresupuestoParaEjecucion', []);
		}, false, true);
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

	function eliminarAnalisisUnitario(idAnalisis, element)
	{
		if(confirm('¿Realmente desea borrar todo este análisis unitario?'))
		{
			paginaAjaxJSON({ "idAnalisis" : idAnalisis }, base_url+'index.php/ET_Analisis_Unitario/eliminar', 'POST', null, function(objectJSON)
			{
				objectJSON=JSON.parse(objectJSON);

				swal(
				{
					title: '',
					text: objectJSON.mensaje,
					type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
				},
				function(){});

				$(element).parent().parent().parent().parent().parent().parent().parent().parent().remove();
			}, false, true);
		}
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