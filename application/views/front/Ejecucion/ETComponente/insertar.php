<?php
function mostrarMetaAnidada($meta, $idExpedienteTecnico)
{
	$htmlTemp='';

	$htmlTemp.='<li>'.
		html_escape($meta->desc_meta).' <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '.$meta->id_meta.')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('.$meta->id_meta.', this);" style="width: 30px;">'.
		((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '<table><tbody>' : '<ul>');

	if(count($meta->childMeta)==0)
	{
		foreach($meta->childPartida as $key => $value)
		{
			$htmlTemp.='<tr style="color: blue;" class="liPartida">'.
				'<td style="padding-left: 10px;"><b>&#9658;'.html_escape($value->desc_partida).'</b></td>'.
				'<td style="padding-left: 4px;">'.html_escape($value->rendimiento).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.html_escape($value->descripcion).'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.$value->cantidad.'</td>'.
				'<td style="padding-left: 4px;text-align: center;">'.number_format($value->parcial, 2).'</td>'.
				'<td style="padding-left: 4px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('.$value->id_partida.', this);" style="width: 30px;">'.
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : '.$idExpedienteTecnico.', idPartida : '.$value->id_partida.' }, \''.base_url().'index.php/ET_Analisis_Unitario/insertar\', \'get\', null, null, false, true);" style="width: 30px;">'.
				'</td>'.
			'</tr>';
		}
	}

	foreach($meta->childMeta as $key => $value)
	{
		$htmlTemp.=mostrarMetaAnidada($value, $idExpedienteTecnico);
	}

	$htmlTemp.=((count($meta->childMeta)==0 && count($meta->childPartida))>0 ? '</tbody></table>' : '</ul>').
	'</li>';

	return $htmlTemp;
}
?>
<div class="form-horizontal">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Nombre del proyecto de inversión</label>
			<div>
				<textarea name="txtNombreProyectoInversion" id="txtNombreProyectoInversion" rows="3" class="form-control" style="resize: none;resize: vertical;" readonly="readonly"><?=html_escape($expedienteTecnico->nombre_pi)?></textarea>
			</div>
		</div>
	</div>
	<div id="divAgregarComponente" class="row" style="margin-top: 4px;">
		<div class="col-md-9 col-sm-9 col-xs-9">
			<input type="text" class="form-control" id="txtDescripcionComponente" name="txtDescripcionComponente" placeholder="Descripción del componente">
		</div>
		<div class="col-md-3 col-sm-3 col-xs-3">
			<input type="button" class="btn btn-info" value="Agregar componente" onclick="agregarComponente();" style="width: 100%;">
		</div>
	</div>
	<div id="divAgregarPartida" class="row" style="display: none;margin-top: 4px;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<label class="control-label">Descripción partida</label>
			<div>
				<select name="selectDescripcionPartida" id="selectDescripcionPartida" class="form-control"></select>
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-5">
			<label class="control-label">Rendimiento</label>
			<div>
				<input type="text" class="form-control" id="txtRendimientoPartida" name="txtRendimientoPartida">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Unidad</label>
			<div>
				<select id="selectUnidadMedidaPartida" name="selectUnidadMedidaPartida" class="form-control">
					<?php foreach($listaUnidadMedida as $key => $value){ ?>
						<option value="<?=$value->id_unidad?>"><?=$value->descripcion?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Cantidad</label>
			<div>
				<input type="text" class="form-control" id="txtCantidadPartida" name="txtCantidadPartida">
			</div>
		</div>
		<div class="col-md-2 col-sm-2 col-xs-2">
			<label class="control-label">Precio U.</label>
			<div>
				<input type="text" class="form-control" id="txtPrecioUnitarioPartida" name="txtPrecioUnitarioPartida">
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-xs-1">
			<label class="control-label">.</label>
			<div>
				<input type="hidden" id="hdIdListaPartida" name="hdIdListaPartida">
				<input type="button" class="btn btn-info" value="+" onclick="agregarPartida();" style="width: 100%;">
			</div>
		</div>
	</div>
	<hr style="margin-top: 4px;">
	<div class="row" style="height: 300px;overflow-y: scroll;">
		<div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 12px;">
			<ul id="ulComponenteMetaPartida" style="background-color: #f5f5f5;list-style-type: upper-roman;">
				<?php foreach($expedienteTecnico->childComponente as $key => $value){ ?>
					<li>
						<b><?=html_escape($value->descripcion)?></b> <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(<?=$value->id_componente?>, $(this).parent(), '');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente(<?=$value->id_componente?>, this);" style="width: 30px;">
						<ul style="background-color: #f5f5f5;">
							<?php foreach($value->childMeta as $index => $item){ ?>
								<?=mostrarMetaAnidada($item, $expedienteTecnico->id_et);?>
							<?php } ?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
	<hr>
	<div class="row" style="text-align: right;">
		<input type="hidden" id="hdIdET" value="<?=$expedienteTecnico->id_et?>">
		<button class="btn btn-danger" data-dismiss="modal">
			<span class="glyphicon glyphicon-remove"></span>
			Cerrar ventana
		</button>
	</div>
</div>
<script>
	function limpiarArbolCompletoMasOpciones()
	{
		$('#divAgregarPartida').hide();

		$('#ulComponenteMetaPartida').find('li').css({ "background-color" : "#ffffff" });

		limpiarText('divAgregarPartida', []);
	}

	function agregarComponente()
	{
		$('#divAgregarComponente').data('formValidation').resetField($('#txtDescripcionComponente'));

		$('#divAgregarComponente').data('formValidation').validate();

		if(!($('#divAgregarComponente').data('formValidation').isValid()))
		{
			return;
		}

		var existeComponente=false;

		$('#ulComponenteMetaPartida').find('> li > b').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll($('#txtDescripcionComponente').val(), ' ', '').toLowerCase())
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
				text: 'No se puede agregar dos veces el mismo componente.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idET" : $('#hdIdET').val(), "descripcionComponente" : $('#txtDescripcionComponente').val().trim() }, base_url+'index.php/ET_Componente/insertar', 'POST', null, function(objectJSON)
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

			var htmlTemp='<li>'+
				'<b>'+replaceAll(replaceAll($('#txtDescripcionComponente').val().trim(), '<', '&lt;'), '>', '&gt;')+'</b> <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta('+objectJSON.idComponente+', $(this).parent(), \'\');" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarComponente('+objectJSON.idComponente+', this);" style="width: 30px;">'+
				'<ul style="background-color: #f5f5f5;"></ul>'
			'</li>';

			$('#ulComponenteMetaPartida').append(htmlTemp);

			$('#txtDescripcionComponente').val('');

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function eliminarComponente(idComponente, element)
	{
		if(!confirm('Al borrar componente se eliminará todas las metas, sub metas y partidas asociadas. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		paginaAjaxJSON({ "idComponente" : idComponente }, base_url+'index.php/ET_Componente/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$(element).parent().remove();

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function eliminarMeta(idMeta, element)
	{
		if(!confirm('Al borrar meta se eliminará todas las sub metas y partidas asociadas. ¿Realmente desea proseguir con la operación?'))
		{
			return;
		}

		paginaAjaxJSON({ "idMeta" : idMeta }, base_url+'index.php/ET_Meta/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			$(element).parent().remove();

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function agregarMeta(idComponente, elementoPadre, idMetaPadre)
	{
		if($($(elementoPadre).find('> table')[0]).find('> tbody > .liPartida').length>0)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar submeta al mismo nivel que una partida.',
				type: 'error'
			},
			function(){});

			return;
		}

		var descripcionMeta=prompt('Descripción de la meta', '');

		if(descripcionMeta==null || descripcionMeta.trim()=='')
		{
			return;
		}

		var existeMeta=false;

		$($(elementoPadre).find('ul')[0]).find('> li').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll(descripcionMeta, ' ', '').toLowerCase())
			{
				existeMeta=true;

				return false;
			}
		});

		if(existeMeta)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos metas iguales en el mismo nivel.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idComponente" : idComponente, "descripcionMeta" : descripcionMeta.trim(), "idMetaPadre" : idMetaPadre }, base_url+'index.php/ET_Meta/insertar', 'POST', null, function(objectJSON)
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

			var htmlTemp='<li>'+
				replaceAll(replaceAll(descripcionMeta.trim(), '<', '&lt;'), '>', '&gt;')+' <input type="button" class="btn btn-default btn-xs" value="+M" onclick="agregarMeta(\'\', $(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="+P" onclick="renderizarAgregarPartida($(this).parent(), '+objectJSON.idMeta+')" style="width: 30px;"><input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarMeta('+objectJSON.idMeta+', this);" style="width: 30px;">'+
				'<ul style="background-color: #f5f5f5;"></ul>'+
			'</li>';

			$($(elementoPadre).find('ul')[0]).append(htmlTemp);

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	var elementoPadreParaAgregarPartida, metaPadreParaAgregarPartida;

	function renderizarAgregarPartida(elementoPadre, metaPadre)
	{
		limpiarArbolCompletoMasOpciones();
		
		if($($(elementoPadre).find('ul')[0]).find('input[value="+M"]').length)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar partida a una meta antecesora de otra.',
				type: 'error'
			},
			function(){});

			return;
		}

		$('#divAgregarPartida').show(1000);

		$(elementoPadre).css({ "background-color" : "#f5f5f5" });

		elementoPadreParaAgregarPartida=elementoPadre;
		metaPadreParaAgregarPartida=metaPadre;
	}

	function agregarPartida()
	{
		$('#divAgregarPartida').data('formValidation').resetField($('#selectDescripcionPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtRendimientoPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#selectUnidadMedidaPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtCantidadPartida'));
		$('#divAgregarPartida').data('formValidation').resetField($('#txtPrecioUnitarioPartida'));

		$('#divAgregarPartida').data('formValidation').validate();

		if(!($('#divAgregarPartida').data('formValidation').isValid()))
		{
			return;
		}

		var existePartida=false;

		$($(elementoPadreParaAgregarPartida).find('table')[0]).find('> tbody > tr > td > b').each(function(index, element)
		{
			if(replaceAll($(element).text(), ' ', '').toLowerCase()==replaceAll($('#selectDescripcionPartida').find("option:selected").val(), ' ', '').toLowerCase())
			{
				existePartida=true;

				return false;
			}
		});

		if(existePartida)
		{
			swal(
			{
				title: '',
				text: 'No se puede agregar dos partidas iguales en el mismo nivel.',
				type: 'error'
			},
			function(){});

			return;
		}

		paginaAjaxJSON({ "idMeta" : metaPadreParaAgregarPartida, "idUnidad" : $('#selectUnidadMedidaPartida').val().trim(), "descripcionPartida" : $('#selectDescripcionPartida').find("option:selected").val().trim(), "rendimientoPartida" : $('#txtRendimientoPartida').val().trim(), "cantidadPartida" : $('#txtCantidadPartida').val(), "precioUnitarioPartida" : $('#txtPrecioUnitarioPartida').val(), "idListaPartida" : $('#hdIdListaPartida').val() }, base_url+'index.php/ET_Partida/insertar', 'POST', null, function(objectJSON)
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

			var htmlTemp='<tr style="color: blue;" class="liPartida">'+
				'<td style="padding-left: 10px;"><b>&#9658;'+replaceAll(replaceAll($('#selectDescripcionPartida').find("option:selected").val().trim(), '<', '&lt;'), '>', '&gt;')+'</b></td>'+
				'<td style="padding-left: 4px;">'+replaceAll(replaceAll($('#txtRendimientoPartida').val().trim(), '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+replaceAll(replaceAll(objectJSON.descripcionUnidadMedida, '<', '&lt;'), '>', '&gt;')+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+parseFloat(objectJSON.cantidadDetallePartida).toFixed(2)+'</td>'+
				'<td style="padding-left: 4px;text-align: center;">'+parseFloat(objectJSON.precioParcialDetallePartida).toFixed(2)+'</td>'+
				'<td style="padding-left: 4px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="-" onclick="eliminarPartida('+objectJSON.idPartida+', this);" style="width: 30px;">'+
					'<input type="button" class="btn btn-default btn-xs" value="A" onclick="paginaAjaxDialogo(\'otherModal\', \'Análisis presupuestal\', { idET : <?=$expedienteTecnico->id_et?>, idPartida : '+objectJSON.idPartida+' }, \''+base_url+'index.php/ET_Analisis_Unitario/insertar\''+', \'get\', null, null, false, true);" style="width: 30px;">'+
				'</td>'+
			'</tr>';

			if(!($(elementoPadreParaAgregarPartida).find('table').length))
			{
				$($(elementoPadreParaAgregarPartida).find('ul')[0]).replaceWith('<table><tbody></tbody></table>');
			}

			$($(elementoPadreParaAgregarPartida).find('table > tbody')[0]).append(htmlTemp);

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	function eliminarPartida(idPartida, element)
	{
		if(!confirm('Al borrar partida se eliminará todos los datos relacionados a dicha partida. ¿Realmente desea proseguir con la operaición?'))
		{
			return;
		}

		paginaAjaxJSON({ "idPartida" : idPartida }, base_url+'index.php/ET_Partida/eliminar', 'POST', null, function(objectJSON)
		{
			objectJSON=JSON.parse(objectJSON);

			swal(
			{
				title: '',
				text: objectJSON.mensaje,
				type: (objectJSON.proceso=='Correcto' ? 'success' : 'error') 
			},
			function(){});

			var tBodyTemporal=$(element).parent().parent().parent();

			$(element).parent().parent().remove();

			if(!($(tBodyTemporal).find('tr').length))
			{
				$($(tBodyTemporal).parent()[0]).replaceWith('<ul></ul>');
			}

			limpiarArbolCompletoMasOpciones();
		}, false, true);
	}

	$(function()
	{
		limpiarArbolCompletoMasOpciones();

		$('#selectDescripcionPartida').selectpicker({ liveSearch: true }).ajaxSelectPicker(
		{
	        ajax: {
	            url: base_url+'index.php/ET_Lista_Partida/verPorDescripcion',
	            data: { valueSearch : '{{{q}}}' }
	        },
	        locale:
	        {
	            emptyTitle: 'Buscar partida'
	        },
	        preprocessData: function(data)
	        {
	        	var dataForSelect=[];

	        	for(var i=0; i<data.length; i++)
	        	{
	        		dataForSelect.push(
	                {
	                    "value" : data[i].desc_lista_partida,
	                    "text" : data[i].desc_lista_partida,
	                    "data" :
	                    {
	                    	"id-lista-partida" : data[i].id_lista_partida,
	                    	"id-unidad" : data[i].id_unidad
	                    },
	                    "disabled" : false
	                });
	        	}

	            return dataForSelect;
	        },
	        preserveSelected: false
	    });

	    $('#selectDescripcionPartida').on('change', function()
	    {
			var selected=$(this).find("option:selected").val();

			if(selected.trim()!='')
			{
				$('#hdIdListaPartida').val($(this).find("option:selected").data('id-lista-partida'));
				$('#selectUnidadMedidaPartida').val($(this).find("option:selected").data('id-unidad'));
			}
	    });

		$('#divAgregarComponente').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				txtDescripcionComponente:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción del componente" es requerido.</b>'
						}
					}
				}
			}
		});

		$('#divAgregarPartida').formValidation(
		{
			framework: 'bootstrap',
			excluded: [':disabled', ':hidden', ':not(:visible)', '[class*="notValidate"]'],
			live: 'enabled',
			message: '<b style="color: #9d9d9d;">Asegúrese que realmente no necesita este valor.</b>',
			trigger: null,
			fields:
			{
				selectDescripcionPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Descripción partida" es requerido.</b>'
						}
					}
				},
				txtRendimientoPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Rendimiento" es requerido.</b>'
						}
					}
				},
				selectUnidadMedidaPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Unidad" es requerido.</b>'
						}
					}
				},
				txtCantidadPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Cantidad" es requerido.</b>'
						},
						regexp:
	                    {
	                        regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
	                        message: '<b style="color: red;">El campo "Cantidad" debe ser un número.</b>'
	                    }
					}
				},
				txtPrecioUnitarioPartida:
				{
					validators: 
					{
						notEmpty:
						{
							message: '<b style="color: red;">El campo "Precio unitario" es requerido.</b>'
						},
						regexp:
	                    {
	                        regexp: /^(\d+([\.]{1}(\d{1,2})?)?)*$/,
	                        message: '<b style="color: red;">El campo "Precio unitario" debe ser en soles.</b>'
	                    }
					}
				}
			}
		});
	});
</script>